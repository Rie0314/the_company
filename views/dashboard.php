<?php
 session_start();

 include_once "../classes/user.php";

 $user =new User;
 $userList = $user->getUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Dashboard</title>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <a href="dashboard.php" class="navbar-brand">
    <h1 class="h3">The company</h1>
  </a>

  <div class="ml-auto">
    <ul class="navbar-nav">
      <li class="nave-item">
        <a href="#" class="nav-link"><?= $_SESSION['username'] ?> </a>
      </li>
      <li class="nav-item">
        <a href="logout.php" class="nav-link">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<main class="container" style="padding-top: 80px">
    <table class="table table-hover w-50 mx-auto">
      <thead class="thead-light">
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Username</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php
        while($userDetails = $userList->fetch_assoc()){
        ?>
        <tr>
          <td><?= $userDetails['id'] ?></td>
          <td><?= $userDetails['first_name'] ?></td>
          <td><?= $userDetails['last_name'] ?></td>
          <td><?= $userDetails['username'] ?></td>
          <td>
           <a href="editUser.php?userID=<?= $userDetails['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
           <a  href="removeUser.php?userID=<?= $userDetails['id'] ?>" class="btn btn-danger btn-sm">Remove</a>
          </td>
        </tr>
        <?php
        }
        ?>
      
      </tbody>
    </table>

</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>