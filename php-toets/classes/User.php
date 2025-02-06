<?php
class User
{
    public $id;
    public $email;
    public $password;
    public $role;


    public function __construct()
    {
        settype($this->id, 'integer');
    }
}