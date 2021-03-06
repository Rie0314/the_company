<?php
 session_start();

 include_once "../classes/user.php";
 $user =new User;
 $userDetails = $user->getUser($_GET['userID']);

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
    <title>Edit User</title>
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


<main>

  <div class="card w-50 mx-auto my-5 border-0">
      <div class="card-header bg-white border-0">
        <h1 class="h4 font-weight-light text-center">Edit User</h1>
      </div>

      <div class="cord-body">
      <form action="../actions/editUser.php" method="post">
        <input type="hidden" name="userID" value="<?=$userDetails['id']?>">

        <label for="firstName">First Name</label>
        <input type="text" name="firstName" class="form-control mb-3" value="<?=$userDetails['first_name']?>" autofocus required>

        <label for="lastName">Last Name</label>
        <input type="text" name="lastName" class="form-control mb-3"  value="<?=$userDetails['last_name']?>" required>

        <label for="username">Username</label>
        <input type="text" name="username" class="form-control mb-3" value="<?=$userDetails['username']?>" required>

      </div>

      <div class="text-right">
         <button type="submit" class="btn btn-primary btn-sm px-5">Save</button>

         <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
      </div>

    </form>

  </div>
</main>







<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>