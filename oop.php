<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP concepts</title>
</head>

<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    echo "<h3 style='color:lightgreen'>Classes and Objects</h3>";
    class Fruit
    {
        public $names;
        public $color;
        public $weight;

        function set_name($name)
        {
            $this->name = $name;
        }
        function get_name()
        {
            return $this->name;
        }
        function set_color($color)
        {
            $this->color = $color;
        }
        function get_color()
        {
            return $this->color;
        }
    }

    $apple = new Fruit();
    $apple->set_name('Apple');
    $apple->set_color('Red');
    echo "Name: " . $apple->get_name();
    echo "<br>";
    echo "Color: " .  $apple->get_color();
    echo "<br>";
    echo "<h3 style='color:lightgreen'>Costructor, Destructor, Inheritance, Constants</h3>";
    class employee
    {
        public $name;
        public $salary;
        public function __construct($name, $salary)
        {
            $this->name = $name;
            $this->salary = $salary;
        }
        final public function intro()
        {
            echo "Something about {$this->name} and their salary is {$this->salary}";
        }
        public function __destruct()
        {
            echo "Destruct function executed!<br>";
            echo self::STRING;
        }
        const STRING = "Just accessing constant<br>";
    }
    class webmob extends employee
    {
        public $address;
        public function __construct($name, $salary, $address)
        {
            $this->name = $name;
            $this->salary = $salary;
            $this->address = $address;
        }
        public function message()
        {
            echo "are you employeed? <br>";
            $this->intro();
        }
    }
    echo employee::STRING;
    $WebMob = new webmob("Anuj", 80000, "some");
    $WebMob->message();
    // $panchal = new employee("Panchal", 90000);
    // echo "Salary of Anuj is $anuj->salary <br>";
    // echo "Salary of Panchal is $panchal->salary";
    echo "<br>";
    echo "<h3 style='color:lightgreen'>Access Modifiers</h3>";

    $mango = new Fruit();
    $mango->names = 'Mango';
    $mango->colors = 'Yellow';
    $mango->weights = '300';
    echo $mango->names . "<br>";
    echo "<h3 style='color:lightgreen'>Abstract Class</h3>";
    abstract class Car
    {
        public $name;
        public function __construct($name)
        {
            $this->name = $name;
        }
        abstract public function intro(): string;
    }

    class Audi extends Car
    {
        public function intro(): string
        {
            return "Choose German quality! I'm an $this->name!";
        }
    }

    class Volvo extends Car
    {
        public function intro(): string
        {
            return "Proud to be Swedish! I'm a $this->name!";
        }
    }

    class Citroen extends Car
    {
        public function intro(): string
        {
            return "French extravagance! I'm a $this->name!";
        }
    }

    $audi = new audi("Audi");
    echo $audi->intro();
    echo "<br>";

    $volvo = new volvo("Volvo");
    echo $volvo->intro();
    echo "<br>";

    $citroen = new citroen("Citroen");
    echo $citroen->intro();

    echo "<h3 style='color:lightgreen'>Traits</h3>";
    trait messages
    {
        public function msg1()
        {
            echo "message 1 is message me<br>";
        }
        public function msg2()
        {
            echo "message 2 is message me<br>";
        }
    }
    class manual
    {
        use messages;
    }
    $obj = new manual();
    $obj->msg1() . "<br>";
    $obj->msg2() . "<br>";

    echo "<h3 style='color:lightgreen'>Static Methods and Properties</h3>";
    class greeting
    {
        public static $numeric = 58;
        public static function warning()
        {
            echo "This is a warning using static methods<br>";
            echo self::$numeric . '<br>';
        }
        // public function __construct()
        // {
        //     // self::warning();
        // }
    }
    class temporary extends greeting
    {
        public static function alert()
        {
            greeting::warning();
            return parent::$numeric;
        }
    }
    echo temporary::$numeric . '<br>';
    $tmp_obj = new greeting();
    $tmp_obj2 = new temporary();
    $tmp_obj2->alert();
    // greeting::warning();
    echo "Welcome: " . $_POST['name'] . "<br>";
    echo "Your email address is: " . $_POST["email"] . "<br>";
    ?>
</body>

</html>
Date: 15/03/2022
Project: WMT Training
-learnt and implemented the oops concepts like abstract classes, traits, static methods and properties.
-learnt form handling and form validation.