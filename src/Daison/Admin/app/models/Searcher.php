<?php namespace Daison\Admin\App\Models;

class Searcher
{
  private $table;
  private $rules;

  public function __construct($table)
  {
    $this->table = $table;
  }

  public function rules($rules)
  {
    $this->rules = $rules;

    return $this;
  }

  public function filter($filter)
  {
    // echo '<pre>';
    // dd($filter);

    foreach ($filter as $key => $val) {
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
          $this->table->where($key, 'like', '%'.$val);
        break;

        case 'like%':
          $this->table->where($key, 'like', $val.'%');
        break;

        case 'like':
        case '%like%':
          $this->table->where($key, 'like', '%'.$val.'%');
        break;

        case '=':
        case '>':
        case '<':
          $this->table->where($key, $condition, $val);
        break;


        break;
      }
    }

    return $this;
  }

  public function getFilteredTable()
  {
    return $this->table;
  }
}
