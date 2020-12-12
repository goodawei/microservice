<?php


error_reporting(E_ALL);
require_once __DIR__.'/Thrift/ClassLoader/ThriftClassLoader.php';

use Thrift\ClassLoader\ThriftClassLoader;

$GEN_DIR = realpath(dirname(__FILE__)).'/gen-php';
$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift',__DIR__);
$loader->registerNamespace('example',$GEN_DIR);
$loader->register();

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TFramedTransport;
use Thrift\Transport\TSocket;
use example\Data;
use example\format_dataClient;

try {
    $socket = new TSocket('localhost',8080);
    $transport = new TFramedTransport($socket);
    $protocol = new TBinaryProtocol($transport);

    $client = new format_dataClient($protocol);

    $transport->open();

    $data = new Data();
    $data->text = 'World!';

    $res = $client->do_format($data);
    var_dump($res);

    $transport->close();
} catch (\Exception $e) {
    print 'TException:'.$e->getMessage().PHP_EOL;
}
