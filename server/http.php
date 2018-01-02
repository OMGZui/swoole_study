<?php
/**
 * Created by PhpStorm.
 * User: shengj
 * Date: 2017/11/3
 * Time: 23:36
 */

$http = new swoole_http_server("0.0.0.0", 9504);

$http->on('request', function ($request, $response) {
    if ($request->get){
        var_dump($request->get);
    }
    $response->header("Content-Type", "text/html; charset=utf-8");
    $response->end("<h1>Hello Swoole. #" . rand(1000, 9999) . "</h1>");
});

$http->start();
