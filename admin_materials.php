<?php
include 'admin_checker.php';
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

  <!-- This line below is the css for the datatables -->
  <link rel="stylesheet" href="css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
</head>

<body>
  <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
          <img src="img/icons/clsu-logo.png" alt="clsu-logo" class='mt-1 archive_photo_size'>
        </a>
        <ul class="sidebar-nav">
          <li class="sidebar-header">
            Pages
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_faculty.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Faculty</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_student.php">
              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Student</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_courses.php">
              <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Courses</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item active">
            <a class="sidebar-link" href="admin_materials.php">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Materials</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_document.php">
              <i class="align-middle" data-feather="file"></i> <span class="align-middle">Documents</span>
            </a>
          </li>

          <hr class="hr-size">

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_archive_view.php">
              <i class="align-middle" data-feather="archive"></i> <span class="align-middle">Archive</span>
            </a>
          </li>

          <div id="oras" class="clock-position ms-4 mb-2">
            <div id="clock">
              <div id="dates"></div>
              <div id="current-time"></div>
            </div>
          </div>
          <script src="js/time_script.js"></script>

      </div>
    </nav>

    <div class="main">
      <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
          <h3 class="align-middle mt-1"><strong>Language and Literature e-Learning Hub</strong></h3>
          <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

              <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <?php include 'greet.php' ?>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="pages-profile.php"><i class="align-middle me-1" data-feather="user"></i>
                  Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php"><i class="align-middle me-1" data-feather="settings"></i>
                  Settings</a>
                <a class="dropdown-item" href="admin_archive_view.php"><i class="align-middle me-1"
                    data-feather="archive"></i>
                  Archive</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="include/sign-out.php">
                  <i class="align-middle me-1" data-feather="log-out"></i>
                  Log out</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <main class="content">
        <div class="container-fluid p-0">
          <div class="row">
            <div class="col-md-4">
              <h1 class="h3 mb-3"><strong>Learning Material </strong> List</h1>
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
              <a <?php echo "href=\"admin_material_add.php\" " ?> style="float: right" class="btn btn-success"><span
                  data-feather="user-plus"></span>&nbsp Add New Learning Material</a>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <div id="result"></div>
                  <!-- code below -->
                  <table id="material_table" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col" style="width: 30%">Name</th>
                        <th scope="col" style="width: 30%">Description</th>
                        <th scope="col" style="width: 30%">Status</th>
                        <th scope="col" style="width: 35%"><span class="float-end me-5">Action</span></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $result = mysqli_query($conn, "select material_id, name, description, status from materials WHERE status!='archive'") or die("Query 1 is incorrect....");
                      while (list($material_id, $name, $description, $status) = mysqli_fetch_array($result)) {
                        echo "
														<tr>	
															<td scope='row'><a href=\"admin_material_view.php?ID=$material_id\" class='user-clicker'>$name</a></td>
															<td>$description</td>
															<td>$status</td>
															<td>
															<a href=\"archive/admin_material_archive.php?ID=$material_id\" onClick=\"return confirm('Are you sure you want this Learning Material move to archive?')\" class='btn btn-warning btn-md float-end ms-2'><span><img src='img/icons/archive.png' style='width:15px'></span>&nbsp Archive</a>
															</td>
														</tr>	
													";
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>

      <footer class="footer">
        <div class="container-fluid">
          <div class="row text-muted">
            <div class="col-6 text-start">
              <p class="mb-0">
                <a class="text-muted" href="https://clsu.edu.ph/" target="_blank"><strong>CLSU</strong></a>
                powered by
                <a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> &copy;
              </p>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="js/app.js"></script>
  <script src="js/jquery.min.js"></script>

  <!-- This line below is the jquery for the datatables -->
  <script src="js/bb_jquery.dataTables.min.js"></script>
  <script src="js/1_jquery.dataTables.min.js"></script>
</body>

</html>
<script>
$(document).ready(function() {
  $('#material_table').DataTable({
    order: [
      [0, 'asc']
    ],
    "pagingType": "full_numbers",
    "lengthMenu": [
      [5, 10, 25, 50, -1],
      [5, 10, 25, 50, "All"]
    ],
    responsive: true,
    language: {
      search: "_INPUT_",
      searchPlaceholder: "Search Material records",
    }
  });
});
</script>