<?php
/**
 * Created by PhpStorm.
 * User: shengj
 * Date: 2017/11/3
 * Time: 22:56
 */
namespace Server;
require '../vendor/autoload.php';

//创建Server对象，监听 127.0.0.1:9501端口
$server = new \swoole_server("127.0.0.1", 9501);

//监听连接进入事件
$server->on('connect', function ($server, $fd) {
    echo "Client: Connect.\n";
});

//监听数据接收事件
$server->on('receive', function ($server, $fd, $from_id, $data) {
    $server->send($fd, "Server: ".$data);
});

//监听连接关闭事件
$server->on('close', function ($server, $fd) {
    echo "Client: Close.\n";
});

//启动服务器
$server->start();

