<?php

class Persons{//מחלקה סטודנטים
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $cityCode;
    protected $carcode;
    protected $username;
    protected $userPassword;
 //getters && setters
    public function getid()
    {
        return $this->id;
    }
    public function setid($id)
    {
        $this->id=$id;
    }
    public function getfirstName()
    {
        return $this->firstName;
    }
    public function setfirstName($firstName)
    {
        $this->firstName=$firstName;
    }
    public function setlastName($lastName)
    {
        $this->lastName=$lastName;
    }
    public function getlastName()
    {
        return $this->lastName;
    }
    public function setcarcode($carcode)
    {
        $this->carcode=$carcode;
    }
    public function getcarcode()
    {
        return $this->carcode;
    }
    public function getcityCode()
    {
        return $this->cityCode;
    }
    public function setcityCode($cityCode)
    {
        $this->cityCode=$cityCode;
    }
    public function getusername()
    {
        return $this->username;
    }
    public function setusername($username)
    {
        $this->username=$username;
    }
    public function getuserPassword()
    {
        return $this->userPassword;
    }
    public function setuserPassword($userPassword)
    {
        $this->userPassword=password_hash($userPassword,PASSWORD_DEFAULT); //שמירת את סיסמה מוצפנת
    }
    
   
    


    

}

?>