<?php
namespace App\Facade;
/**
 * Created by PhpStorm.
 * User: lihongwei
 * Date: 2020-11-27
 * Time: 18:02
 */
use Goods\Rpc\Attr\HelloWorldIf;

class Attr implements HelloWorldIf
{
    public function sayHello($name)
    {
        return json_encode([
            'this is server return'. $name
        ]);
    }
}