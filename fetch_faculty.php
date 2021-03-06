<?php
//fetch.php
include 'admin_checker.php';
$output = '';
$faculty_counter = 0;

$sql_faculty = "SELECT faculty_id FROM faculty WHERE status != 'archive' ";
$result_faculty = $conn->query($sql_faculty);

if ($result_faculty->num_rows > 0) {
  while ($row = $result_faculty->fetch_assoc()) {
    $faculty_counter++;
  }
}
if (isset($_POST["query"])) {
  $search = mysqli_real_escape_string($conn, $_POST["query"]);
  $query = "
  SELECT * FROM faculty 
  WHERE firstname LIKE '%" . $search . "%'
  OR lastname LIKE '%" . $search . "%' 
  OR status LIKE '%" . $search . "%' 
 ";
} else {
  $query = "
  SELECT * FROM faculty WHERE status != 'archive' ORDER BY faculty_id
 ";
}
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  if ($faculty_counter > 0) {
    $output .= '
  <table class="table table-hover">
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
    <td scope="row"><a href="admin_faculty_view.php?ID=' . $row["faculty_id"] . ' " class="user-clicker">' . $row["firstname"] . '</a></td>
    <td><a href="admin_faculty_view.php?ID=' . $row["faculty_id"] . ' " class="user-clicker">' . $row["lastname"] . '</a></td>
    <td>' . $row["status"] . '</td>
    <td>
    <a href=archive/admin_faculty_archive.php?ID=' . $row["faculty_id"] . ' onclick="return confirm(\'are you sure you want this user go to archive?\');" class="btn btn-warning btn-md float-end"><span><img src="img/icons/archive.png" style="width:15px"></span>&nbsp Archive</a>
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