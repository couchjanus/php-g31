<?php
namespace Models;

use Core\Models\Entity;
// 
class Product extends Entity
{
  protected static string $table = 'products';
  public $id;
  public $name;
  public $description;
  public $price;
  public $image;
  public $status;
  public $badge_id;
  public $category_id;
  public $brand_id;
}