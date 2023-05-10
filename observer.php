<?php

interface Subject{
    public function attach(SplObserver $observer);
    public function detach(SplObserver $observer);
    public function notify($data);
}

interface Observer{
    public function update(Subject $subject);
}

class Computer implements Subject{
    public $state;
    private $obs= array();
    private $data;

    public function __construct($st){
        $this->state = $st;
       // $this->obs = new \SplObjectStorage();
    }
    public function getData(){
        return $this->data;
    }
    public function attach(\SplObserver $observer){
        $this->obs[] = $observer;
    }
    public function detach(\SplObserver $observer){
        $key = array_search($observer,$this->obs, true);
        if($key !== false){
            unset($this->obs[$key]);
        }
    }
    public function notify($data){
        foreach($this->obs as $observ){
            $observ->update($this);
        }
    }
    
    public function connectedInfo($data){
        $this->data =$data;
        $this->notify($data);
    }


}
//User is using the computer
class User implements Observer{
    private $identity;
    public function __construct($identity){
        $this->identity = $identity;
    }
    public function update(Subject $subject){
        echo $this->identity." is connected to desktop ".$subject->getData();
    }
}

$computer = new Computer("DESKT0911");

$user1 = new User("stdt1");
$user2 = new User("stdt2");

$computer->attach($user1);
$computer->connectedInfo("User connected");
$computer->attach($user2);
$computer->connectedInfo("User connected with a phone");
$computer->detach($user1);




?>