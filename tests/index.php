<?php

include_once("includes.php");

route("/", ['get'], function($request) {
    return resp("Welcome to the index page");
});
