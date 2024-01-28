<?php

namespace Models;

use Core\Models\Entity;

class Badge extends Entity
{
    protected static string $table = "badges";
    
    public $id;
    public $title;
    public $type;

}