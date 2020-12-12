<?php
/**
 * Created by PhpStorm.
 * User: lihongwei
 * Date: 2020-11-27
 * Time: 17:41
 */

error_reporting(E_ALL);

define('THRIFT_ROOT', __DIR__);
require_once  THRIFT_ROOT.'/Thrift/ClassLoader/ThriftClassLoader.php';
require_once __DIR__ . '/vendor/autoload.php';

use Thrift\ClassLoader\ThriftClassLoader;

$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift', THRIFT_ROOT);
$loader->register();

use Thrift\Exception\TException;
use Thrift\Factory\TTransportFactory;
use Thrift\Factory\TBinaryProtocolFactory;
use Thrift\TMultiplexedProcessor;
use Thrift\Server\TServerSocket;
use Thrift\Server\TSimpleServer;
use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\TPhpStream;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\server\TSwooleServerTransport;
use Thrift\server\TSwooleServer;
use Thrift\Transport\TSocket;
use App\Facade\Attr;
use App\Facade\Tag;
use Goods\Rpc\Attr\HelloWorldProcessor;
use Goods\Rpc\Tag\TagServiceProcessor;

try {
    $hosts = "192.168.10.10";  // 服务端对外IP地址
    $port = 9999;// 服务端对外端口

    $tThrift = new TTransportFactory();
    $bThrift = new TBinaryProtocolFactory();
    $processor = new TMultiplexedProcessor();

    $processor->registerProcessor('HelloWorldIf', new HelloWorldProcessor(new Attr())); // 注意：OrderServiceIf -- servername需和客户端一致
    $processor->registerProcessor('TagServiceIf', new TagServiceProcessor(new Tag())); // 注意：OrderServiceIf -- servername需和客户端一致
    $setting = [
        'daemonize' => false,
        'worker_num' => 2,
        'http_server_port' => 9998,
        'http_server_host' => $hosts,
        'log_file' => './logs/swoole.log',
        'pid_file' => './logs/thrift.pid',
    ];

    $socket = new TSwooleServerTransport($hosts, $port, $setting);
    $server = new TSwooleServer($processor, $socket, $tThrift, $tThrift, $bThrift, $bThrift);
    $server->serve();
} catch (TException $tx) {
    print 'TException: '.$tx->getMessage()."\n";
}