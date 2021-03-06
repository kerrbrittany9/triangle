<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Triangle.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return "<!DOCTYPE html>
        <html>
            <head>
                <title>triangles</title>
            </head>
            <body>
                <h1>Get to know a Triangle</h1>
                <h3>Enter three lengths below and we will tell you what type of triangle you can make</h3>
                <p>Equilateral: all sides are equal!</p>
                <p>Isosceles: exactly two sides are equal.</p>
                <p>Scalene: no sides are equal.</p>
                <form action='/triangle_type'>
                    <div class='form-group'>
                        <label for='side1'>Side One</label>
                        <input type='number' name='side1' value='side1'>
                    </div>
                    <div class='form-group'>
                        <label for='side2'>Side Two</label>
                        <input type='number' name='side2' value='side2'>
                    </div>
                    <div class='form-group'>
                        <label for='side3'>Side Three</label>
                        <input type='number' name='side3' value='side3'>
                    </div>
                    <button type='submit' class'btn btn-primary' name='button'>Get Your Triangle</button>
                </form>
            </body>
        </html>";
    });

    $app->get("/triangle_type", function() {

        $new_triangle = new Triangle($_GET['side1'], $_GET['side2'], $_GET['side3']);
        return "<h2>Your Triangle Defined</h2>
        <p>Length: " . $new_triangle->getSide1() . "</p>
        <p>Width: " . $new_triangle->getSide2() . "</p>
        <p>Height: " . $new_triangle->getSide3() . "</p>
        <p>Triangle Type: " . $new_triangle->type() . "</p>";

    });

    return $app;
?>
