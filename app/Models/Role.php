<?php
namespace Models;

use Core\Models\Entity;

class Role extends Entity {
  protected static string $table = 'roles';
  public $id;
  public $name;
}
