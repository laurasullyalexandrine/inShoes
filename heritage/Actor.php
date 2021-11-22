<?php

class Actor {
    // protected est la troisième et dernière option pour la visibilité 
    // d'une propriété 
    // protected permet de donner acces à cette propriété en lecture et en écriture
    // à toute autre classe qui hériterait de Actor
    protected $name;

    public function __construct($name) {
            $this->name = $name;
    }

    public function sayHello() {
        echo __CLASS__.'<br>';
        echo 'Hello my name is '. $this->name . '<br>';
    }

    /**
    * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    
}

