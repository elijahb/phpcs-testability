<?php

class FirstClass
{
    public function method()
    {

    }
}

class SecondClass
{
    public $first;

    public function __construct()
    {
        $this->first = new FirstClass();
    }
}

class ThirdClass
{
    public $second;

    public function __construct()
    {
        $this->second = new SecondClass();
    }
}

class SomeClass
{
    public function myMethod(ThirdClass $third)
    {
        $third->second->first->method();
        $third->first($this->second->method());
    }
}
