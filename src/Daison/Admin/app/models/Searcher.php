<?php namespace Daison\Admin\App\Models;

class Searcher
{
  private $table;
  private $rules;

  // By Default we use the 'id'
  private $sort_key = 'id';
  private $order_by = 'asc';

  public function __construct($table = null)
  {
    if ($table != null) {
      $this->table = new $table();
    }
  }

  public function rules($rules)
  {
    $this->rules = $rules;

    return $this;
  }

  public function getSortKey()
  {
    return $this->sort_key;
  }

  public function getOrderBy()
  {
    return $this->order_by;
  }

  public function filter()
  {
    if (! \Input::get('search')) {
      return false;
    }

    foreach (\Input::get('search') as $key => $val) {
      if (empty($val)) {
        continue;
      }

      if (! isset($this->rules[$key])) {
        $this->table->where($key, '=', $val);
        continue;
      }

      switch ($condition = $this->rules[$key]) {
        case false:
          continue 2;
        break;

        case '%like':
          $this->table = $this->table->where($key, 'like', '%'.$val);
        break;

        case 'like%':
          $this->table = $this->table->where($key, 'like', $val.'%');
        break;

        case 'like':
        case '%like%':
          $this->table = $this->table->where($key, 'like', '%'.$val.'%');
        break;

        case '=':
        case '>':
        case '<':
          $this->table = $this->table->where($key, $condition, $val);
        break;


        break;
      }
    }

    return $this;
  }

  public function setDefaultSortKey($sort_key)
  {
    $this->sort_key = $sort_key;

    return $this;
  }

  public function sortAndOrder($request)
  {
    if (strlen(@$request['sort']) != 0) {
      $this->sort_key = \Input::get('sort');
    }

    $this->order_by = (@$request['order'] == 'desc') ? 'desc' : 'asc';
    $this->table = $this->table->orderBy($this->sort_key, $this->order_by);

    return $this;
  }

  public function parseUrl($modify = null)
  {
    $all = \Input::all();

    // Modify input values;
    if (count($modify)) {
      foreach ($modify as $key => $val) {
        array_set($all, $key, $val);
      }
    }


    $url_arr = [];

    // get the search
    if (isset($all['search'])) {
      foreach ($all['search'] as $key => $val) {
        $url_arr['search' . '[' . $key . ']'] = $val; 
      }
    }

    // get the remaining
    foreach ($all as $key => $val)  {
      if (is_array($val)) {
        continue;
      }

      $url_arr[$key] = $val;
    }

    return http_build_query($url_arr);
  }

  public function getOrderReverse()
  {
    $ret = 'asc';
    if ($this->order == $ret) {
      $ret = 'desc';
    }

    return $ret;
  }

  public function getTable()
  {
    return $this->table;
  }

  public function setTable($table)
  {
    $this->table = $table;
  }
}
