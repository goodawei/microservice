<?php
/**
 * Created by PhpStorm.
 * User: lihongwei
 * Date: 2020-11-27
 * Time: 18:58
 */

error_reporting(E_ALL);

define('THRIFT_ROOT', __DIR__);

require_once  THRIFT_ROOT.'/Thrift/ClassLoader/ThriftClassLoader.php';
require_once __DIR__ . '/vendor/autoload.php';

use App\Facade\Api;
use Thrift\ClassLoader\ThriftClassLoader;
use Goods\Rpc\Attr\HelloWorldIf;
use Goods\Rpc\Tag\TagServiceIf;

$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift', THRIFT_ROOT);
$loader->register();

$client = new Api();

//$order = $client->client(HelloWorldIf::class);
//$sum = $order->sayHello('dddd');
//var_dump($sum);

$tag = $client->client(TagServiceIf::class);
$ret = $tag->name('php');
var_dump($ret);


$tag = $client->client(TagServiceIf::class);
$ret = $tag->save('java');
var_dump($ret);


$tag = $client->client(TagServiceIf::class);
$ret = $tag->get('ddd');
var_dump($ret);