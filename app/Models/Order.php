<?php

namespace Models;

use Core\Models\Entity;
 
class Order extends Entity {
    protected static string $table = 'orders';
    public $id;
    public $user_id;
    public $order_date;
    public $products;
    public $status;
}
