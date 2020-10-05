<?php
include_once "connection.php";
$search_value = $_POST['search'];
$selectquery = "select * from student_info WHERE student_id LIKE '%{$search_value}%'";
$query = mysqli_query($conn, $selectquery);
$search_result="";
if(mysqli_num_rows($query)>0){
    $search_result ="
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

      $search_result .="<tr>
            <td>{$res['id']}</td>
            <td>{$res['student_id'] }</td>
            <td>{$res['name'] }</td>
        </tr>";
 }
  echo  $search_result .= "</table>";
}else{
    echo "<h4 style='color:red;'>Sorry Man.... No Result Found</h4>";
}
?>