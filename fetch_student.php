<?php
//fetch.php
include 'admin_checker.php';
$output = '';
$student_counter = 0;

$sql_student = "SELECT student_id FROM student WHERE status = 'active' ";
$result_student = $conn->query($sql_student);

if ($result_student->num_rows > 0) {
  while ($row = $result_student->fetch_assoc()) {
    $student_counter++;
  }
}
if (isset($_POST["query"])) {
  $search = mysqli_real_escape_string($conn, $_POST["query"]);
  $query = "
  SELECT * FROM student 
  WHERE firstname LIKE '%" . $search . "%'
  OR lastname LIKE '%" . $search . "%' 
  OR status LIKE '%" . $search . "%' 
 ";
} else {
  $query = "
  SELECT * FROM student WHERE status = 'active' ORDER BY student_id
 ";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  if ($student_counter > 0) {
    $output .= '
  <table  class="table table-hover">
  <thead>
    <tr>
     <th scope="col" style="width: 30%">Firstname</th>
     <th scope="col" style="width: 30%">Lastname</th>
     <th scope="col" style="width: 30%">Status</th>
     <th scope="col" style="width: 35%"><span class="float-end me-5">Action</span></th>
    </tr>
  </thead>
  <tbody>
 ';
    while ($row = mysqli_fetch_array($result)) {
      $output .= '
   <tr>
    <td scope="row"><a href="admin_student_view.php?ID=' . $row["student_id"] . ' " class="user-clicker">' . $row["firstname"] . '</a></td>
    <td><a href="admin_student_view.php?ID=' . $row["student_id"] . ' " class="user-clicker">' . $row["lastname"] . '</a></td>
    <td>' . $row["status"] . '</td>
    <td>
    <span><a href=archive/admin_student_archive.php?ID=' . $row["student_id"] . ' onclick="return confirm(\'Are you sure you want this user go to archive?\');" class="btn btn-warning btn-md float-end"><span><img src="img/icons/archive.png" style="width:1rem"></span>&nbsp Archive</a>
    </td>
   </tr>
  ';
    }
  } else {
    echo "<h1 class='m-4'><b><center>Faculty Data not Found</center></b></h1>";
    echo "<img src='img/photos/empty.png' alt='icon' class='mb-4 archive_photo_size'>";
  }
  echo $output;
} else {
  echo "<h1 class='m-4'><b><center>Data Not Found</center></b></h1>";
  echo "<img src='img/photos/empty.png' alt='icon' class='mb-4 archive_photo_size'>";
}