<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intre to PHP</title>
</head>
<body>
    <h1>PHP Syntax</h1>
    <p>A PHP script is executed on the server, and the plain HTML result is sent back to the
    browser.</p>
    <p>A PHP script starts with <?php echo "&lt;?php and ends with ?&gt;"; ?>: </p>

    <?php
        echo "Hello World!";
        print "<h2 style='color:red;'>PHP is Fun</h2>"

    ?>
    <hr>
    <h1>PHP Variables</h1>
    <p>Rules for PHP variables:</p>
    <ul>
        <li>A variable starts with the $ sign, followed by the name of the variable</li>
        <li>A variable name must start with a letter or the underscore character</li>
        <li>A variable name cannot start with a number</li>
        <li>A variable name can only contain alpha-numeric characters and
        underscores (A-z, 0-9, and _ )</li>
        <li>Variable names are case-sensitive ($age and $AGE are two different
         variables)
        </li>
    </ul>

    <div style="color:red";>
    <?php
        $txt = "NPRU"; 
        echo "I love $txt!";
        echo "<br>";
        echo "I love" .$txt. "!";
        echo "<br>";
        echo "<hr>";

        $x = 5;
        $y = 4;
        

        echo "<h1>Calculate with Variables</h1>";
        echo "Declare variables x=$x, y=$y <br>";
        echo "Declare variables x=".$x.","."y=".$y."<br>";
        echo "Show only Result <br>";
        echo $x + $y;
        echo "<br> Show more info <br>";
        echo $x."+".$y."=".($x + $y)."<br>";
        echo "$x + $y=".($x + $y)."<br>";


    ?>
    </div>
    <hr>
    <h1>PHP Data Types</h1>
    <?php   
         var_dump(5);
         var_dump("John");
         var_dump(3.14);
         var_dump(true);
         var_dump([2, 3, 56]);
         var_dump(NULL);
         echo "<hr>";
         echo gettype(5)."<br>";
         echo gettype([2, 3, 56])."<br>";

    ?>

</body>
</html>