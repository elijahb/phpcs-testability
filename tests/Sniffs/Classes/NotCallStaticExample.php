<?php

class SomeClass {

    public static $staticProperty;

    public static function staticMethod()
    {

    }

}

class SomeOtherClass {

    public function someMethod() {

        SomeClass::$staticProperty = 'test';

        SomeClass::staticMethod();

        SomeClass::class;
    }

}
