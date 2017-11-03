<?php
/**
 * Created by PhpStorm.
 * User: shengj
 * Date: 2017/11/3
 * Time: 23:48
 */

$client = new swoole_websocket_server("0.0.0.0", 9501);

$server->on("open", function (swoole_websocket_server $server, $request) {
    var_dump($request->fd, $request->get, $request->server);
    $server->push($request->fd, "hello, welcome\n");
});
$server->on("message", function (swoole_websocket_server $server, swoole_websocket_frame $frame) {
    echo "Message: {$frame->data}\n";
    $server->push($frame->fd, "server: {$frame->data}");
});
$server->on("close", function ($fd) {
    echo "client-{$fd} is closed\n";
});
