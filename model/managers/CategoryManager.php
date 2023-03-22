<?php

namespace Model\Managers;

use App\Manager;
use App\DAO;

class CategoryManager extends Manager{

    protected $className = "Model\Entities\Category";
    protected $tableName = "category";

    public function __construct(){
        parent::connect();
    }
}