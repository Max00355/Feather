<?php

function route($route, $methods=['GET'], $callback=null) {
    for($x = 0; $x < count($methods); $x++) {
        $methods[$x] = strtoupper($methods[$x]);
    }

    $current_route = $_GET['route'];
    if(!$current_route) {
        if($route !== '/') {
            return;
        }        
    } else if($current_route !== $route) {
        return;
    }   

    $method = getMethod();

    if(array_search($method, $methods) || $methods[0] === $method) {
        if($callback) {
            $callback(getData());
        }
    } else {
        resp("Invalid Method", 405);
    }
}

function getMethod() {
    return $_SERVER['REQUEST_METHOD'];
}

function getData() {
    return file_get_contents("php://input");
}

function getJsonData() {
    return json_decode(getData());
}

function jsonify($object) {
    return json_encode($object);
}

function newJsonObj() {
    return (new stdClass());
}

function resp($data, $status = 200) {
    http_response_code($status);
    echo $data;
}

?>
