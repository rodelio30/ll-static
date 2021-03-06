<?php
include 'admin_checker.php';

if (isset($_POST['update'])) {
  $id        = $_POST['id'];
  $firstname = $_POST['firstname'];
  $lastname  = $_POST['lastname'];
  $email     = $_POST['email'];
  $password  = $_POST['password'];
  $type      = $_POST['type'];

  mysqli_query($conn, "update users set firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$password', type = '$type' where id = '$id'") or die("Query 4 is incorrect....");
  echo '<script type="text/javascript"> alert("User ' . $firstname . ' updated!.")</script>';
  header('Refresh: 0; url=index.php');
}

$id = $_GET['ID'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
while ($res   = mysqli_fetch_array($result)) {
  $firstname = $res['firstname'];
  $lastname  = $res['lastname'];
  $email     = $res['email'];
  $contact   = $res['contact'];
  $address   = $res['address'];
  $password  = $res['password'];
  $type      = $res['type'];
}

$sel_faculty = "";
$sel_student = "";
$sel_admin   = "";
if ($type == "faculty") {
  $sel_faculty = "selected";
} else if ($type == "student") {
  $sel_student = "selected";
} else if ($type == "admin") {
  $sel_admin   = "selected";
}

$sel_faculty = "selected";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
  <meta name="author" content="AdminKit">
  <meta name="keywords"
    content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

  <link rel="shortcut icon" href="img/icons/clsu-logo.png" />

  <!-- Inspired by the admitkit -->
  <link rel="canonical" href="https://demo-basic.adminkit.io/" />
  <link rel="icon" href="img/icons/clsu-logo.png">

  <title>Language and Literature</title>

  <link href="css/app.css" rel="stylesheet">
  <link href="css/swap.css" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet"> -->
</head>

<body>
  <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
          <img src="img/icons/clsu-logo.png" alt="clsu-logo" class='mt-1 archive_photo_size'>
        </a>

        <ul class="sidebar-nav">
          <?php
          $nav_active = 'dashboard';
          include 'admin_nav.php';
          ?>
        </ul>

      </div>
    </nav>

    <div class="main">
      <?php include 'admin_main_nav.php'; ?>

      <main class="content">
        <div class="container-fluid p-0">
          <h1 class="h3 mb-3"><strong>Edit User Account</strong></h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <h5 class="card-title mb-0">User Form</h5>
                </div>
                <div class="card-body">
                  <form method="post">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Firstname</label>
                      <input type="text" class="form-control" id="firstname" name="firstname"
                        value="<?php echo $firstname ?>" placeholder="Enter email">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Lastname</label>
                      <input type="text" class="form-control" id="lastname" name="lastname"
                        value="<?php echo $lastname ?>" placeholder="Enter email">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>"
                        placeholder="Enter email">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Contact Number</label>
                      <input type="number" class="form-control" id="contact" name="contact"
                        value="<?php echo $contact ?>" placeholder="Contact Number">
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Current Address</label>
                      <input type="email" class="form-control" id="address" name="address"
                        value="<?php echo $address ?>" placeholder="Current Address">
                    </div>
                    <br>
                    <div class="form-group">
                      <label>User Type</label>
                      <select class="form-control" id="type" value="<?php echo $type ?>" name="type">
                        <option value="faculty" <?php echo $sel_faculty ?>>Faculty</option>
                        <option value="admin" <?php echo $sel_admin ?>>Admin</option>
                        <option value="student" <?php echo $sel_student ?>>Student</option>
                      </select>
                    </div>
                    <br>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password" name="password"
                        value="<?php echo $password ?>" placeholder="Password">
                    </div>
                    <br>
                    <input type="checkbox" onclick="myFunction()"> Show the Password
                    <br>
                    <br>
                    <div class="form-group">
                      <input type="hidden" name="id" value="<?php echo $_GET['ID']; ?>">
                      <button type="submit" class="btn btn-success" name="update">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </main>

      <?php include 'admin_footer.php'; ?>
    </div>
  </div>

  <script src="js/app.js"></script>
  <script>
  function myFunction() {
    var pw_ele = document.getElementById("password");
    if (pw_ele.type === "password") {
      pw_ele.type = "text";
    } else {
      pw_ele.type = "password";
    }
  }
  </script>
</body>

</html>