<?php

namespace Models;

use Core\Models\Entity;

class Category extends Entity
{
    protected static string $table = "categories";
    
    public $id;
    public $name;
    
    public $section_id;
    public $cover;
}