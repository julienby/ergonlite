<?php

namespace MyLibrary;

class MyClass {
    
    private string $name ;
    
    public function __construct($name) {
        $this->name = "default";
    }

    public function set_name($name) {
        // Votre logique ici
        $this->name = $name ;
        return $this ;
    }
    
    public function captitalize() {
        return "-->" . $this->name . "<--" ;
    }
}

