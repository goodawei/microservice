<?php
namespace Services\HelloWorld;

class HelloWorldHandler implements HelloWorldIf {
    public function sayHello($name)
    {
        print_r($name.PHP_EOL);
        return "Hello $name";
    }
}
