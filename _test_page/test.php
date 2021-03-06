<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style/dropdown.css">

    <title>Document</title>
<style>
    /* Main */
#menu {
    width: 100%;
    margin: 0;
    padding: 10px 0 0 0;
    list-style: none;
    background-color: #111;
    background-image: linear-gradient(#444, #111);
    border-radius: 50px;
    box-shadow: 0 2px 1px #9c9c9c;
}

#menu li {
    float: left;
    /* padding: 0 0 10px 0; */
    position: relative;
}

#menu a {
    float: left;
    height: 25px;
    padding: 0 25px;
    color: #999;
    text-transform: uppercase;
    font: bold 12px/25px Arial, Helvetica;
    text-decoration: none;
    text-shadow: 0 1px 0 #000;
}

#menu li:hover > a {
    color: #fafafa;
}

*html #menu li a:hover { /* IE6 */
    color: #fafafa;
}

#menu li:hover > ul {
    display: block;
}

/* Sub-menu */
#menu ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: none;
    position: absolute;
    top: 35px;
    left: 0;
    z-index: 99999;
    background-color: #444;
    background-image: linear-gradient(#444, #111);
    /* -moz-border-radius: 5px; */
    border-radius: 5px;
}

#menu ul li {
    float: none;
    margin: 0;
    padding: 0;
    display: block;
    box-shadow: 0 1px 0 #111111,
                0 2px 0 #777777;
}

#menu ul li:last-child {
    box-shadow: none;
}

#menu ul a {
    padding: 10px;
    height: auto;
    line-height: 1;
    display: block;
    white-space: nowrap;
    float: none;
    text-transform: none;
}

*html #menu ul a { /* IE6 */
    height: 10px;
    width: 150px;
}

*:first-child+html #menu ul a { /* IE7 */
    height: 10px;
    width: 150px;
}

#menu ul a:hover {
    background-color: #0186ba;
    background-image: linear-gradient(#04acec, #0186ba);
}

#menu ul li:first-child a {
    border-radius: 5px 5px 0 0;
}

#menu ul li:first-child a:after {
    content: '';
    position: absolute;
    left: 45%;
    top: -8px;
    width: 0;
    height: 0;
    
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-bottom: 9px solid #444;
}

#menu ul li:first-child a:hover:after {
    border-bottom-color: #04acec;
}

#menu ul li:last-child a {
    border-radius: 0 0 5px 5px;
}

/* Clear floated elements */
#menu:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}

/* * html #menu             { zoom: 1; } IE6 */
/* *:first-child+html #menu { zoom: 1; } IE7 */
</style>

</head>

<body>

<?php


// function hi($a, $b)
// {
//     $string = "SELECT {$b}.id ";

//     echo $string;
// }


$string='2string';

switch($string)
{
    case 1:
        echo "this is 1";
        break;
    case 2:
        echo "this is 2";
        break;
    case '2string':
        echo "this is a string";
        break;
    default:
        echo "hihi";
        break;
}




// hi("1","author");

// ?>

</body>

</html>