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
    echo "<h3 style='color:lightgreen'>Costructor and Destructor</h3>";
    class employee
    {
        public $name;
        public $salary;
        public function __construct($name, $salary)
        {
            $this->name = $name;
            $this->salary = $salary;
        }
        public function intro()
        {
            echo "Something about {$this->name} and their salary is {$this->salary}";
        }
        public function __destruct()
        {
            echo "Destruct function executed!<br>";
        }
    }
    class webmob extends employee
    {
        public $address;
        public function __construct()
        {
            // $this->name = $name;
            // $this->salary = $salary;
            // $this->address = $address;
        }
        public function message()
        {
            echo "are you employeed? <br>";
            $this->intro();
        }
    }

    $anuj = new webmob("Anuj", 80000);
    $anuj->message();
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
    echo "<h3 style='color:lightgreen'>Inheritance</h3>";
    ?>
</body>

</html>
Date: 14/03/2022
Project: WMT Internal
- learnt and implemented oops concepts like classes/objects, constructor, destructor, access modifiers,inheritance, constants.