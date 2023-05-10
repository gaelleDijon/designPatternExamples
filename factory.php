<?php
abstract class Animal{
    private $name;
    private $birth;
    protected $type;
    public function birth($b){
        $y = $b - date('Y', strtotime(`-$b year`));
        return "Born in".$b." is ".$y."year";
    }
    abstract public function walk();
    abstract public function eat();

}

class Cat implements Animal{
    private $name, $birth;
    protected $type ;

    public function __construct($n, $b, $t="cat"){
        $this->name = $n;
        $this->birth = $b;
        $this->type = $t; 
    }

    public function walk(){
        return "walking";
        
    }
    public function eat(){
        return "catfish";
    }
    
}
class Duck implements Animal {
    private $name, $birth;
    protected $type;

    public function __construct($n, $b, $t="duck"){
        $this->name = $n;
        $this->birth = $b;
        $this->type = $t; 
    }

    public function walk(){
        return "floating";
    }
    public function eat(){
        return "fish and chips";
    }
}
class Fish implements Animal {
    private $name, $birth;
    protected $type;

    public function __construct($n, $b, $t= "fish"){
        $this->name = $n;
        $this->birth = $b;
        $this->type = $t; 
    }
    public function walk(){
        return "swiming";
    }
    public function eat(){
        return "sand";
    }
}

class AnimalFactory{

}