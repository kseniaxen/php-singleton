<?php

class Director{
    private static $instances = [];
    public $name;
    public $lastname;

    private function __construct() {  }

    protected function __clone() { }

    private function __wakeup () {}

    public static function getInstance(): Director
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

    function getName() {return $this->name;}

    function getLastname() {return $this->lastname;}

    function getNameAndLastname() {
      return $this->getName() . ', ' . $this->getLastname(). "\n";
    }

    function setName($name) {
        $this->name = $name;
    }
    function setLastname($lastname) {
        $this->lastname = $lastname;
    }
}

$s1 = Director::getInstance();
$s1->setName("Name1");
$s1->setLastname("Lastname1");
$s2 = Director::getInstance();
if ($s1 === $s2) {
   echo $s1->getNameAndLastname();
   echo $s2->getNameAndLastname();
    echo "Singleton works, both variables contain the same instance.";
} else {
    echo "Singleton failed, variables contain different instances.";
}

//$s3 = new Director;

?>