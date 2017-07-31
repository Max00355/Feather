<?php
require "Feather.php";

$app = new Feather();

$app->register("/test/");

$app->route("/test/", ["GET"], function($req, $res) {
    $res->send("Test");
});
?>
