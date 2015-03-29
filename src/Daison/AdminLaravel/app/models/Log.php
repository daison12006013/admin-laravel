<?php namespace Daison\AdminLaravel\App\Models;

class Log extends \Eloquent
{
  const TYPE_INFO = 'info';
  const TYPE_ERROR = 'info';

  protected $table = 'log';
  protected $fillable = [
    'actor_id',
    'type',
    'details',
    'order_id',
    'product_id',
    'cart_id',
    'prescription_id',
    'doctor_id',
    'customer_id',
  ];

  public function standardInfo($type, $user_id, $message)
  {
    $this->create([
      'type' => $type,
      'actor_id' => $user_id,
      'details' => $message,
    ]);

    return $this;
  }


}