<?php

namespace Model\Entities;

use App\Entity;

final class User extends Entity {

    private $id;
    private $pseudo;
    private $avatar;
    private $email;
    private $password;
    private $signUpDate;
    private $role;


    public function __construct($data){
        $this->hydrate($data);
    }


    /**
     * Get the value of pseudo
     */ 
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */ 
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }




    /**
     * Get the value of avatar
     */ 
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set the value of avatar
     *
     * @return  self
     */ 
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }




    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }




    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }




    /**
     * Get the value of signUpDate
     */ 
    public function getSignUpDate()
    {
        return $this->signUpDate;
    }

    /**
     * Set the value of signUpDate
     *
     * @return  self
     */ 
    public function setSignUpDate($signUpDate)
    {
        $this->signUpDate = $signUpDate;

        return $this;
    }



    
    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {

        $this->role = json_encode($role);

        return $this;
    }

    public function hasRole($role)
    {

        $result = $this->role == $role;

        return $result;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}