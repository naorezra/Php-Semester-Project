<?php

class Cars{   //מחלקה של רכבים של סטודנטים
   

    protected $CarName; // תכונות המחלקה
    protected $Carcode;
  
   
 //getters&&setters 
    public function getCarName()
    {
        return $this->CarName;
    }
    public function setCarName($CarName)
    {
        $this->CarName=$CarName;
    }

    public function getCarcode()
    {
        return $this->Carcode;
    }
    public function setCarcode($Carcode)
    {
        $this->Carcode=$Carcode;
    }
    
}


?>