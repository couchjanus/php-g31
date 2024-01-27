<?php

namespace Models;

use Core\Models\Entity;

class Section extends Entity
{
    protected static string $table = "sections";
    
    public $id;
    public $name;
}