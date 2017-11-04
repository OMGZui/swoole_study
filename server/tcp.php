<?php
/**
 * Created by PhpStorm.
 * User: shengj
 * Date: 2017/11/3
 * Time: 22:56
 */
//namespace Server;
//require '../vendor/autoload.php';

//创建Server对象，监听 127.0.0.1:9501端口
$server = new swoole_server("104.223.3.138", 9501);

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
    //每隔2000ms触发一次
    swoole_timer_tick(2000, function ($timer_id) {
        echo "tick-2000ms\n";
    });

    //3000ms后执行此函数
    swoole_timer_after(3000, function () {
        echo "after 3000ms.\n";
    });
    echo "Client: Close.\n";
});

//启动服务器
$server->start();

