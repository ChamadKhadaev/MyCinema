<?php

/**
 * @param Connect-DB;
 */

$connect = mysqli_connect('localhost', 'hasan', 'hasan', 'cinema');
$db = new PDO(
    'mysql:host=localhost;dbname=cinema;charset=utf8',
    'hasan',
    'hasan',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
);


?>