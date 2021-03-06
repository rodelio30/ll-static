<?php
include 'admin_checker.php';
// date_default_timezone_set("Asia/Manila");
// session_start();
// if(!isset($_SESSION['logged'])){
//   header("location: public.php");
// }
// include ('include/connect.php');
// $id = $_SESSION['id'];

// $query = mysqli_query($conn, "select firstname from users where id='$id'") or die("query 1 incorrect.......");
// list($firstname) = mysqli_fetch_array($query);

// if($type=='student'){
// 	header("location: student.php");
// }
include 'counter/counter.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php
include 'admin_header.php';
?>

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

          <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>
          <div class="row">
            <div class="w-100">
              <div class="row">
                <div class="col-sm-3">
                  <div class="card">
                    <a href="admin_faculty.php">
                      <div class="card-body">
                        <div class="row">
                          <div class="col mt-0">
                            <h5 class="card-title">Active Faculty</h5>
                          </div>
                          <div class="col-auto">
                            <div class="stat text-primary">
                              <i class="align-middle" data-feather="users"></i>
                            </div>
                          </div>
                        </div>
                        <p class="mt-4 float-end" style="color: gray">view</p>
                        <h1 class="mt-1 mb-3 ms-3"><?php echo $faculty_counter ?></h1>
                      </div>
                  </div></a>
                </div>
                <div class="col-sm-3">
                  <div class="card">
                    <a href="admin_student.php">
                      <div class="card-body">
                        <div class="row">
                          <div class="col mt-0">
                            <h5 class="card-title">Active Students</h5>
                          </div>
                          <div class="col-auto">
                            <div class="stat text-primary">
                              <i class="align-middle" data-feather="users"></i>
                            </div>
                          </div>
                        </div>
                        <p class="mt-4 float-end" style="color: gray">view</p>
                        <h1 class="mt-1 mb-3 ms-3"><?php echo $student_counter ?></h1>
                      </div>
                  </div></a>
                </div>
                <div class="col-sm-3">
                  <div class="card">
                    <a href="admin_courses.php">
                      <div class="card-body">
                        <div class="row">
                          <div class="col mt-0">
                            <h5 class="card-title">Courses</h5>
                          </div>

                          <div class="col-auto">
                            <div class="stat text-primary">
                              <i class="align-middle" data-feather="book-open"></i>
                            </div>
                          </div>
                        </div>
                        <p class="mt-4 float-end" style="color: gray">view</p>
                        <h1 class="mt-1 mb-3 ms-3"><?php echo $course_counter ?></h1>
                      </div>
                  </div>
                  </a>
                </div>
                <div class="col-sm-3">
                  <div class="card">
                    <a href="admin_document.php">
                      <div class="card-body">
                        <div class="row">
                          <div class="col mt-0">
                            <h5 class="card-title">Resources</h5>
                          </div>

                          <div class="col-auto">
                            <div class="stat text-primary">
                              <i class="align-middle" data-feather="file"></i>
                            </div>
                          </div>
                        </div>
                        <p class="mt-4 float-end" style="color: gray">view</p>
                        <h1 class="mt-1 mb-3 ms-3"><?php echo $resources_counter ?></h1>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 col-lg-8 col-xxl-6 d-flex">
                  <div class="card flex-fill">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-4">
                          <h5 class="card-title mb-0">Latest Document Uploaded</h5>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4">
                          <a <?php echo "href=\"admin_document.php\" " ?> style="float: right"
                            class="view-dashboard">View
                            All Documents</a>
                        </div>
                      </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col" style="width: 40%">Title</th>
                            <th scope="col" style="width: 20%">Owner</th>
                            <th scope="col" style="width: 10%">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $result = mysqli_query($conn, "select doc_id, title, file_size, file_type, file_uploader_id, status from document WHERE status!='archive' LIMIT 5") or die("Query 1 is incorrect....");
                          while (list($doc_id, $title, $file_size, $file_type, $file_uploader_id, $status) = mysqli_fetch_array($result)) {
                            $uploader_name = uploaderName($file_uploader_id);
                            $icon_img      = '';

                            if ($file_type === "pdf") {
                              $icon_img   = 'pdf';
                            } else if ($file_type === "doc" || $file_type === "docs") {
                              $icon_img   = 'doc';
                            } else if ($file_type === "xls" || $file_type === "xlsx" || $file_type === "xlc") {
                              $icon_img   = 'xls';
                            } else if ($file_type === "txt") {
                              $icon_img   = 'txt';
                            }
                            echo "
														<tr>	
															<td scope='row'><a href=\"admin_document_view.php?ID=$doc_id\" class='user-clicker'>$title.$file_type</a></td>
															<td>$uploader_name</td>
															<td>$status</td>
														</tr>	
													";
                          }
                          // this function is to return a name for the material 
                          function uploaderName($file_uploader_id)
                          {
                            include 'include/connect.php';
                            $result = mysqli_query($conn, "select firstname, lastname from faculty WHERE faculty_id='$file_uploader_id'") or die("Query 1 is incorrect....");
                            while (list($firstname, $lastname) = mysqli_fetch_array($result)) {
                              $uploader = $firstname . '' . $lastname;
                              return $uploader;
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-lg-4 col-xxl-6 d-flex">
                  <div class="card flex-fill w-100">
                    <div class="card-header">
                      <div class="row">
                        <div class="col-4">
                          <h5 class="card-title mb-0">History Log</h5>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4">
                          <a <?php echo "href=\"history.php\" " ?> style="float: right" class="view-dashboard">View All
                            Log</a>
                        </div>
                      </div>
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th style="width: 35%">User</th>
                            <th style="width: 30%">Transaction Name</th>
                            <th style="width: 50%">Time</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $result = mysqli_query($conn, "select log_id, user_id, transaction_name, log_time from transaction_log WHERE user_id != 0 ORDER BY log_id DESC LIMIT 5") or die("Query 1 is incorrect....");
                          while (list($log_id, $user_id, $transaction_name, $log_time) = mysqli_fetch_array($result)) {
                            $user_name = userName($user_id);
                            echo "
                                <tr>	
                                  <td>$user_name</td>
                                  <td>$transaction_name</td>
                                  <td>$log_time</td>
                                </tr>	
                              ";
                          }
                          // this function is to return a name for the material 
                          function userName($user_id)
                          {
                            include 'include/connect.php';
                            $result = mysqli_query($conn, "select firstname, lastname from users WHERE id = '$user_id'") or die("Query 1 is incorrect.....");
                            while (list($firstname, $lastname) = mysqli_fetch_array($result)) {
                              $user_name = $firstname . " " . $lastname;
                              return $user_name;
                            }
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div><!-- End of second content -->

            </div>
          </div>
      </main>

      <?php include 'admin_footer.php'; ?>
    </div>
  </div>

  <script src="js/app.js"></script>
</body>

</html>

<script>
document.addEventListener("DOMContentLoaded", function() {
  var date = new Date(Date.now());
  var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
  document.getElementById("datetimepicker-dashboard").flatpickr({
    inline: true,
    prevArrow: "<span title=\"Previous month\">&laquo;</span>",
    nextArrow: "<span title=\"Next month\">&raquo;</span>",
    defaultDate: defaultDate
  });
});
</script>