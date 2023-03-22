<?php

namespace Model\Entities;

use App\Entity;

final class Category extends Entity{

    private $id_category;
    private $nameCategory;

    public function __construct($data){
        $this->hydrate($data);
    }

    
    /**
     * Get the value of id_category
     */ 
    public function getId_category()
    {
        return $this->id_category;
    }

    /**
     * Set the value of id_category
     *
     * @return  self
     */ 
    public function setId_category($id_category)
    {
        $this->id_category = $id_category;

        return $this;
    }

    /**
     * Get the value of nameCategory
     */ 
    public function getNameCategory()
    {
        return $this->nameCategory;
    }

    /**
     * Set the value of nameCategory
     *
     * @return  self
     */ 
    public function setNameCategory($nameCategory)
    {
        $this->nameCategory = $nameCategory;

        return $this;
    }
}