<?php

class Feather {
    var $routes = [];

    function register($path) {
        if(!array_search($path, $this->routes)) {
            array_push($this->routes, $path);
        }
    }

    function route($path, $methods, $callback) {
        $current_route = $_GET['route'];

        $this->parseRoute($path);

        if(!array_search($current_route, $this->routes) && $this->routes[0] !== $current_route) {
            return (new Response())->send("404 Page not Found", 404);
        } else if($current_route !== $path) {
            return;
        } 
        $method = $this->method();
        if(!array_search($method, $methods) && $methods[0] !== $method) {
            return  (new Response())->send("405 Invalid Method", 405);
        }
        $callback(new Request($this->getRequestData()), new Response());
    }

    private function parseRoute($path) {
        echo $path;
    }

    private function getRequestData() {
        return file_get_contents("php://input");
    }

    private function method() {
        return $_SERVER['REQUEST_METHOD'];
    }
}

class Request {
    var $data;
    var $method;
    
    function __construct($data) {
        $this->data = $data;
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    function getJson() {
        return json_decode($this->data);
    }

}

class Response {

    function send($message, $code=200) {
        http_response_code($code);
        echo $message;
    }   

    
    function sendJson($object, $code=200) {
        $this->send(json_encode($object), $code);
    }
}

?>
