<?php 

    require("./classStart.php");

    // $meal = new Entree("라면",array("진라면","물"));
    // echo $meal->getName();
    

    namespace Value;
    
    class Ingredient{
        protected $name;
        protected $price;

        public function __construct($name, $price){
            $this->name = $name;
            $this->price = $price;
        }

        public function getName(){
            return $this->name;
        }

        public function getPrice(){
            return $this->price;
        }

        public function setPrice($price){
            $this->price = $price;
        }
    }

    class PricedEntree extends Entree {
        public function __construct($name, $ingredients){
            parent::__construct($name, $ingredients);
            foreach ($ingredients as $ingredient) {
                if(!$ingredient instanceof Ingredient){
                    throw new Exception("$ingredients 의 원소는 Ingredient의 객체여야 합니다.");
                }
            }
        }

        public function returnTotalPrice(){
            $price = 0;
            foreach ($this->ingredients as $ingredient) {
                $price += $ingredient->getPrice();
            }
            return $price;
        }
    }
    
    use \Value\Ingredient as ingredi;