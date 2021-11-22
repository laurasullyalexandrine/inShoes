<?php

class AgentSecret extends Actor {
    
    private $gadget;

    public function __construct($name, $gadget) {
            $this->name = $name;
            $this->gadget = $gadget;
    }

    public function saySecretAgentHello() {
        $this->sayHello();
        echo __CLASS__.'<br>';
        echo 'Hello i\'am Bond... '. $this->name . ' and i own an '.$this->gadget.' !<br>';
        
    }
}

