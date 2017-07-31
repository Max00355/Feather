# About

Feather is an extremely light weight PHP web framework meant to be used in limited resource environments, such as on a router. 
The framework is contained entirely in one file, and is effortless to install. Simply include `Feather.php` and you're good to go.

# Why?

I was working with a system that had very limited resources, and was very very slow. I had originally tried to use Python, then NodeJS, but they weren't working for me
as well as I would have liked. Next I tried PHP, and it worked like a charm. It was fast and didn't eat up many resources, but all of the frameworks that existed 
required me to go through some tedious process in order to install it on the system that I was using. Slim was the closest framework that I could find to what I needed,
but even then it wasn't good enough. So I decided to make Feather. I draw a lot of my inspiration from Flask, a Python web framework that I am very fond of. 

My goal is to make Feather as easy to use and light weight as possible. I want it to be easy to install, and just work without complications. It seems to so far.


# Example

### Hello World


```
# hello_world.php
<?php
require "Feather.php";

$app = new Feather();

$app->register("/hello_world");

$app.route("/hello_world", ['GET'], function($req, $res) {
    $res->send("Hello World!");
});
?>
```

Run:

`php -S localhost:5000` 

Then head to: `http://localhost:5000/hello_world.php?route=/hello_world`
