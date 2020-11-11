<?php
include_once "../classes/user.php";

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$username = $_POST['username'];
$password = password_hash($_POST['password'],PASSWORD_DEFAULT);

//instatiate a class. Access a method that will save the form-data to the database

$user = new User;
$user->createUser($firstName, $lastName, $username, $password);
