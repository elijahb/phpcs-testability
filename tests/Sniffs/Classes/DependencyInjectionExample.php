<?php

class MyService {

}

class OtherClass {

    public function someMethod() {
        $service = new MyService();

        throw new \Exception();
    }

}


