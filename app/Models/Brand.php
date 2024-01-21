<?php

namespace Models;

use Core\Models\Entity;

class Brand extends Entity
{
    protected static string $table = "brands";
    
    public $id;
    public $name;
    public $description;

}