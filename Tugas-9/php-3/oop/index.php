<?php
require_once 'animal.php';
require_once 'frog.php';
require_once 'ape.php';

$shaun = new Animal('Shaun');

echo "Name: " . $shaun->name . '<br>';
echo "Legs: " . $shaun->legs . '<br>';
echo "Cold Blooded: " . $shaun->cold_blooded . '<br><br>';


$kodok = new Frog("buduk");

echo "Name: " . $kodok->name . '<br>';
echo "Legs: " . $kodok->legs . '<br>';
echo "Cold Blooded: " . $kodok->cold_blooded . '<br>';
echo "Jump: " . $kodok->jump() . '<br><br>';


$sungokong = new Ape("kera sakti");

echo "Name: " . $sungokong->name . '<br>';
echo "Legs: " . $sungokong->legs . '<br>';
echo "Cold Blooded: " . $sungokong->cold_blooded . '<br>';
echo "Yell: " . $sungokong->yell() . '<br><br>';

?>