<?php namespace Daison\Admin\App\Models;

class Searcher
{
  private $table;
  private $rules;

  private $sort;
  private $order;

  public function __construct($table)
  {
    $this->table = new $table();
  }

  public function rules($rules)
  {
    $this->rules = $rules;

    return $this;
  }

  public function getOrder()
  {
    return $this->order;
  }

  public function getSort()
  {
    return $this->sort;
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

  public function processSorting()
  {
    $this->sort = \Input::get('sort', 'id');
    $this->order = \Input::get('order', 'asc');
    if ($this->sort == '') {
      $this->sort = 'id';
    }
    if ($this->order == '') {
      $this->order = 'asc';
    }

    $this->table = $this->table->orderBy($this->sort, $this->order);

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
    $this->processSorting();

    return $this->table;
  }
}
