<?php

include Client::class;

class User{

    //Properties (attributes)

    public $name = 'Joe';
    public $surname;
    public $id;



    //Methodes (functions)
    public function func(){
        print "Hello";
    }
}

//Instance
$user = new User();
$user -> name;
$user -> func();

$client = new Client(1, "John", "john@email.com");

$client ->getId();