<?php

class City{             //מחלקה של ערים של סטודנטים 
     
    protected $cityCode; //תכונות של מחלקה 
    protected $cityName;




    //getters&&setters
    public function getCityid()
    {
        return $this->cityCode;
    }
    public function setCity($id)
    {
        $this->cityCode=$id;
    }
    public function getCityName()
    {
        return $this->cityName;
    }
    public function setCityName($name)
    {
        $this->cityName=$name;
    }
    
}


?>