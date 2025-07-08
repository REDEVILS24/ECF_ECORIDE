<?php
require_once("assets/controllers/user.php");


// $user = new User(1, "mimouni", "taieb", "redevils24", "24/01/1990", "20 chemin des vignes", 66000, null);


// $result = $user->createUser(2, "dupont", "marie", "marie123", "15/05/1985", "10 rue de la paix", 75001);

$user = new User(1, "test", "test", "test", "test", "test", 1, null);
$result = $user->createUser("marie123", "marie@test.com", "password123");

echo "Result: " . $result;

echo "CreateUser result: " . $result . "<br>";

// Test getUserById  
$userData = $user->getUserById(1);
echo "GetUser result: ";
var_dump($userData);
echo "<br>";