<?php

function sayHello() {
    return "Hello, world!\n";
}

function randString() {
    $randomizer = new \Random\Randomizer();

    $randomDomain = sprintf(
        "Random 64 character string: %s\n",
        $randomizer->getBytesFromString(
            'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%^&*()_+{}|:<>?~',
            64,
        ),
    );

    return $randomDomain;
}

function randFloat() {
    $randomizer = new \Random\Randomizer();
    $temperature = $randomizer->getFloat(
        -89.2,
        56.7,
        \Random\IntervalBoundary::ClosedClosed,
    );

    $chanceForTrue = 0.1;
    $myBoolean = $randomizer->nextFloat() < $chanceForTrue;

    return "Random float: $temperature\n";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 8.3 demo with FrankenPHP on Clever Cloud</title>
    <style>
        background {
            color: cadetblue;
        }
        a:link, a:visited {
            color: darkblue;
        }
        pre::before {
            content: "$> ";
            color: green;
        }
        pre {
            background-color: black;
            color: white;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 20px;
            padding-bottom: 5px;
            margin: 5px;
            border-radius: 6px;
            display: inline-block;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <h1>PHP 8.3 demo with FrankenPHP on Clever Cloud</h1>
    <ul>
    <li><?php echo sayHello(); ?></li>
    <li><?php echo randString(); ?></li>
    <li><?php echo randFloat(); ?></li>
    </ul>
    <h1>Test the JSON Checker API endpoint:</h1>
    <ul>
        <li><a href="api.php?json={%22test%22:{%22foo%22:%22bar%22}}" target=_blank>Valid JSON</a></li>
        <li><a href="api.php?json={%22test%22:{%22foo%22:%22bar%22}" target=_blank>Invalid JSON</a></li>
    </ul>
    <p>Test it on the command line with <code>curl</code>:</p>
    <pre>
curl -s https://<?php echo str_replace('app_', 'app-', $_ENV['CC_APP_ID']) . ".cleverapps.io" ?>/api.php?json=%7B%20%22test%22%3A%20%7B%20%22foo%22%3A%20%22bar%22%20%7D%20%7D | jq
    </pre>
    <pre>
curl -s https://<?php echo str_replace('app_', 'app-', $_ENV['CC_APP_ID']) . ".cleverapps.io" ?>/api.php?json=%7B%20%22test%22%3A%20%7B%20%22foo%22%3A%20%22bar%22%20%7D | jq
    </pre>
</body>
</html>
