<?php
/**
 * Created by PhpStorm.
 * User: shengj
 * Date: 2017/11/3
 * Time: 23:32
 */

//创建Server对象，监听 127.0.0.1:9502端口，类型为SWOOLE_SOCK_UDP
$server = new swoole_server("0.0.0.0", 9503, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

//监听数据接收事件
$server->on('Packet', function ($server, $data, $clientInfo) {
    $server->sendto($clientInfo['address'], $clientInfo['port'], "Server ".$data);
    var_dump($clientInfo);
});

//启动服务器
$server->start();
