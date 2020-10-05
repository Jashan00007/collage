<?php
include_once "connection.php";
$selectquery = "select * from student_info";
$query = mysqli_query($conn, $selectquery);
$student_details="";
if(mysqli_num_rows($query)>0){
    $student_details ="
                    <table>
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Student_Id</th>
                      <th>Name</th>
                    </tr>
                  </thead>
";
    while ($res = mysqli_fetch_assoc($query)) {

      $student_details .="<tr>
            <td>{$res['id']}</td>
            <td>{$res['student_id'] }</td>
            <td>{$res['name'] }</td>
        </tr>";
 }
  echo  $student_details .= "</table>";
}else{
    echo "<h4 style='color:red;'>Sorry Man.... No Data has been Entered</h4>";
}
?>