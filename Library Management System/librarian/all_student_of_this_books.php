<?php
// code for session check user is login or not

session_start();
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}

?>
<?php include 'header.php';?>
<?php include 'connection.php';?>
<hr>
<h4 class="alert alert-warning col-sm-5" style="margin-left:30%; text-align: center;">Student List With This Books</h4>
<hr>

<?php
$books=$_GET['books_name'];

$result= mysqli_query($link, "SELECT * FROM issue_books WHERE books_name='$books' AND books_return_date=''");

echo "<table class='table table-bordered'>";
echo'<tr>';
echo'<th>'; echo 'Student Enrollment No'; echo '</th>';
echo'<th>'; echo 'Student Name'; echo '</th>';
echo'<th>'; echo 'Student Email'; echo '</th>';
echo'<th>'; echo 'Student Contact'; echo '</th>';
echo'<th>'; echo 'Books Name'; echo '</th>';
echo'<th>'; echo 'Books Issue Date'; echo '</th>';
 echo '</tr>';

while ($row= mysqli_fetch_array($result)){
    
    echo '<tr>';
    echo '<td>';
    echo $row['std_enrollment'];
    echo'</td>';
    
    echo '<td>';
    echo $row['std_name'];
    echo'</td>';
    
    echo '<td>';
    echo $row['std_email'];
    echo'</td>';
    
   
    echo '<td>';
    echo $row['std_contact'];
    echo'</td>';
    
    echo '<td>';
    echo $row['books_name'];
    echo'</td>';
    
    echo '<td>';
    echo $row['books_issue_date'];
   
    echo'</td>';
    
    echo '</tr>';
    
}

echo '</tr>';
echo "</table>";

?>

<?php include 'footer.php';?>

