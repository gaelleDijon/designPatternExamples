<?php
class Car{
    private $consoEss, $marque, $couleur;

    public function __construct($conso, $marque, $couleur)
    {
        $this->consoEss = $conso;//consommation essence pour 100km
        $this->marque = $marque;
        $this->couleur = $couleur;
       
    }
    public function getConsoEss(){
        return $this->consoEss;
    }
    public function getMarque(){
        return $this->marque;
    }
    public function getCouleur(){
        return $this->couleur;
    }
    
    public function contact($state){
        $s = 0;//contact non enclenché
        if($state = 0){
            $s = 1;//enclenche le contact
        }
       return $s; 
    }
    public function plein($qtite){
        $conso = $this->getConsoEss();
        $d = ($qtite*100)/$conso;
        //le plein effectué avec $qtite litres durera $d km
        return $d;
    }
    
}
class ElectricCar{
    private  $consoElec, $marque, $couleur;
    public function __construct($conso, $marque, $couleur)
    {
        $this->consoElec = $conso;//consommation electricite pour 100km
        $this->marque = $marque;
        $this->couleur = $couleur;
    }
    public function getConsoElec(){
        return $this->consoElec;
    }
    public function getMarque(){
        return $this->marque;
    }
    public function getCouleur(){
        return $this->couleur;
    }
    public function allumer($state){
        $s = 0;//éteint
        if($state == 0){
            $s = 1;//allume
        }
       return $s; 
    }
    public function charge($qtite){
        $conso = $this->getConsoElec();
        $d = ($qtite*100)/$conso;
        //la batterie a chargé $qtite de temps, en fonction de la consommation, elle durera $d km
        return $d;
    }
}   

class CarAdapter implements Car{
    private $elecCar; 
    public function __construct(ElectricCar $elecCar){
        $this->elecCar = $elecCar;
    }
    public function plein($qtite){
        $this->elecCar->charge($qtite);
    }
    public function contact($etat){
        $this->elecCar->allumer($etat);
    }
}

$caro = new Car(50, "Kia", "rouge");

$care = new ElectricCar(400, "Hunday", "bleu");
$carAdapt = new CarAdapter($care);
$carAdapt->plein(40);

?>