<?php 

class CommandParameter {
    private string $name;
    private string|int|float $value;
 
    public function __construct($name, $value) {
        $this->name = $name;
        $this->value = $value;
    }
 
    public function getName():string {
        return $this->name;
    }
 
    public function getValue():string|int|float {
        return $this->value;
    }
 }
