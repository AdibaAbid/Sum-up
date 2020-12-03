<?php

session_start();
include("./action.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Simple eCommerce</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
 
    <style>
body{
    background-color: #a1abe4;
    margin: 0;
}
.button{
    background-color: #9921e8;
    padding: 5px 8px;
    color: aliceblue;
    border: none;
    border-radius: 3px;
}
.cards{
    box-shadow: 2px 4px 4px 1px #989898;
    border:none;
    background-color:#f1f1f1; 
    border-radius:5px; 
    padding:20px 50px;
    width:85%;
    text-align:center;
}

    </style>
</head>

<body>