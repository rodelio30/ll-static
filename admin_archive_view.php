<?php
include 'admin_checker.php';
$user = "faculty"

// date_default_timezone_set("Asia/Manila");
// session_start();
// if(!isset($_SESSION['logged'])){
//   header("location: public.php");
// }
// include ('include/connect.php');
// $id=$_SESSION['id'];

// $query=mysqli_query($conn,"select id,type from users where id='$id'")or die ("query 1 incorrect.......");
// list($id,$type)=mysqli_fetch_array($query);

// if($type=='student'){
//   header("location: student.php");
// }

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

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="shortcut icon" href="img/icons/clsu-logo.png" />

  <link rel="canonical" href="https://demo-basic.adminkit.io/" />
  <link rel="icon" href="img/icons/clsu-logo.png">

  <title>Language and Literature</title>

  <link href="css/app.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
  <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
      <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.php">
          <span class="align-middle">Language and Literature e-Learning</span>

        </a>

        <ul class="sidebar-nav">
          <li class="sidebar-header">
            Pages
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="index.php">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_faculty.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Faculty</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_student.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Student</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="admin_document.php">
              <i class="align-middle" data-feather="file"></i> <span class="align-middle">Documents</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link" href="#">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
          </li>

          <li class="sidebar-item active">
            <a class="sidebar-link" href="admin_archive_view.php">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Archive User</span>
            </a>
          </li>
      </div>
    </nav>

    <div class="main">
      <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
          <ul class="navbar-nav navbar-align">
            <li class="nav-item dropdown">
              <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

              <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <!-- <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> -->
                <?php include 'greet.php' ?>
              </a>
              <div class="dropdown-menu dropdown-menu-end">
                <a class="dropdown-item" href="pages-profile.php"><i class="align-middle me-1" data-feather="user"></i>
                  Profile</a>
                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i>
                  Analytics</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="index.php"><i class="align-middle me-1" data-feather="settings"></i>
                  Settings & Privacy</a>
                <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help
                  Center</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="include/sign-out.php">Log out</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <main class="content">
        <div class="container-fluid p-0">

          <h1 class="h3 mb-3"><strong>User Archive </strong> List</h1>
          <div class="row">
            <div class="col-12 col-lg-8 col-xxl-12 d-flex">
              <div class="card flex-fill">
                <div class="card-header">
                  <div class="row">
                    <div class="col-md-4">
                      <h5 class="card-title mb-0">Archive Users</h5>
                    </div>
                    <div class="col-md-8">

                    </div>
                  </div>
                </div>
                <table class="table table-hover my-0">
                  <thead>
                    <?php
                    $faculty_counter = 0;
                    $student_counter = 0;
                    $sql_faculty     = "SELECT faculty_id FROM faculty WHERE status = 'archive' ";
                    $result_faculty  = $conn->query($sql_faculty);

                    $sql_student     = "SELECT student_id FROM student WHERE status = 'archive' ";
                    $result_student  = $conn->query($sql_student);

                    if ($result_faculty->num_rows > 0) {
                      while ($row = $result_faculty->fetch_assoc()) {
                        $faculty_counter++;
                      }
                    }
                    if ($result_student->num_rows > 0) {
                      while ($row = $result_student->fetch_assoc()) {
                        $student_counter++;
                      }
                    }

                    if ($faculty_counter || $student_counter > 0) {
                      echo "
                        <tr>
                          <th class='d-none d-xl-table-cell'>Firstname</th>
                          <th class='d-none d-xl-table-cell'>Lastname</th>
                          <th class='d-none d-xl-table-cell'>Status</th>
                          <th class='d-none d-xl-table-cell'>Date Modified</th>
                          <th class='d-none d-xl-table-cell'>Type</th>
                          <th class='d-none d-md-table-cell float-end me-3'>Action</th>
                        </tr>
                      ";
                    } else {
                      echo "<h1 class='m-4'><b><center>There is no Archive User</center></b></h1>";
                    }

                    ?>
                  </thead>
                  <tbody>
                    <?php
                    $result = mysqli_query($conn, "select faculty_id, firstname, lastname, status, date_modified from faculty WHERE status='archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
                    while (list($faculty_id, $firstname, $lastname, $status, $date_modified) = mysqli_fetch_array($result)) {
                      echo "
														<tr>	
															<td class='d-none d-xl-table-cell'><a href=\"admin_faculty_view.php?ID=$faculty_id\" class='user-clicker'>$firstname</a></td>
															<td class='d-none d-xl-table-cell'><a href=\"admin_faculty_view.php?ID=$faculty_id\" class='user-clicker'>$lastname</a></td>
															<td class='d-none d-xl-table-cell'>$status</td>
															<td class='d-none d-xl-table-cell'>$date_modified</td>
															<td class='d-none d-xl-table-cell'><p class='archive-faculty'>Faculty</p></td>
															<td class='d-none d-xl-table-cell'>
															<a href=\"admin_faculty_active.php?ID=$faculty_id\" onClick=\"return confirm('Are you sure you want this user be active again?')\" class='btn btn-primary btn-sm float-end'><span data-feather='user-plus'></span>&nbsp Active again?</a>
															</td>
														</tr>	
													";
                    }
                    ?>
                    <?php
                    $result = mysqli_query($conn, "select student_id, firstname, lastname, status, date_modified from student WHERE status='archive' ORDER BY date_modified") or die("Query 1 is incorrect....");
                    while (list($student_id, $firstname, $lastname, $status, $date_modified) = mysqli_fetch_array($result)) {
                      echo "
														<tr>	
															<td class='d-none d-xl-table-cell'><a href=\"admin_student_view.php?ID=$student_id\" class='user-clicker'>$firstname</a></td>
															<td class='d-none d-xl-table-cell'><a href=\"admin_student_view.php?ID=$student_id\" class='user-clicker'>$lastname</a></td>
															<td class='d-none d-xl-table-cell'>$status</td>
															<td class='d-none d-xl-table-cell'>$date_modified</td>
															<td class='d-none d-xl-table-cell'><p class='archive-student'>Student</p></td>
															<td class='d-none d-xl-table-cell'>
															<a href=\"admin_student_active.php?ID=$student_id\" onClick=\"return confirm('Are you sure you want this user be active again?')\" class='btn btn-primary btn-sm float-end'><span data-feather='user-plus'></span>&nbsp Active again?</a>
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
            <div class="col-6 text-end">
              <ul class="list-inline">
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
                </li>
                <li class="list-inline-item">
                  <a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

  <script src="js/app.js"></script>

  <script>
  document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
    var gradient = ctx.createLinearGradient(0, 0, 0, 225);
    gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
    gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
    // Line chart
    new Chart(document.getElementById("chartjs-dashboard-line"), {
      type: "line",
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales ($)",
          fill: true,
          backgroundColor: gradient,
          borderColor: window.theme.primary,
          data: [
            2115,
            1562,
            1584,
            1892,
            1587,
            1923,
            2566,
            2448,
            2805,
            3438,
            2917,
            3327
          ]
        }]
      },
      options: {
        maintainAspectRatio: false,
        legend: {
          display: false
        },
        tooltips: {
          intersect: false
        },
        hover: {
          intersect: true
        },
        plugins: {
          filler: {
            propagate: false
          }
        },
        scales: {
          xAxes: [{
            reverse: true,
            gridLines: {
              color: "rgba(0,0,0,0.0)"
            }
          }],
          yAxes: [{
            ticks: {
              stepSize: 1000
            },
            display: true,
            borderDash: [3, 3],
            gridLines: {
              color: "rgba(0,0,0,0.0)"
            }
          }]
        }
      }
    });
  });
  </script>
  <script src="jquery/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="datatable/jquery.dataTables.min.js"></script>
  <script src="datatable/dataTable.bootstrap.min.js"></script>
  <!-- generate datatable on our table -->
  <script>
  $(document).ready(function() {
    //inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function() {
      $('.alert').hide();
    })
  });
  </script>
</body>

</html>