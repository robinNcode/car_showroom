<?php

session_start();
$title = "MD Shahin Mia Robin";

//Database Connection Object
$server = "localhost";
$db = "robin_misc";//"misc"; //
$user = "root";//"root"; //
$pass = "";//""; //
$port = 3306;

try {

    $pdo = new PDO("mysql:host=$server;port=$port;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($pdo) {
        // error_log("Database Connected Successfully.");
    }
} catch (PDOException $error) {
    //error_log($error->getMessage() . ".");
    die("Connection Error: " . $error->getMessage());
}


function display_error()
{
    $output = "";
    if (!empty($_SESSION['errors'])) {
        $output = '<ul class="list-group mb-2">';
        foreach ($_SESSION['errors'] as $er) {
            $output .= '<li class="font-weight-bold text-danger text-center">' . $er . '</li>';
        }

        unset($_SESSION['errors']);
        $output .= '</ul>';
    }
    return $output;
}