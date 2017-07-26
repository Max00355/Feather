<?php

include_once("includes.php");

route("/hello", ['get'], function($resp) {
    return resp("Hello World!");
});

?>
