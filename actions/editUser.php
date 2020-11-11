<?php
include_once "../classes/user.php";

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$username = $_POST['username'];
$userID = $_POST['userID'];

$user = new User;
$user->updateUser($userID, $firstName, $lastName,$username);