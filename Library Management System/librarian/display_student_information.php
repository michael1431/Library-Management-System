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
<h4 class="alert alert-warning col-sm-5" style="margin-left:30%; text-align: center;">All Student Information</h4>
<hr>

<?php
// show the Student records

$result = mysqli_query($link,"SELECT * FROM `student_registration`");
echo "<table class='table table-bordered table-hover'>";
echo '<tr>';
echo "<th class ='text-primary'>"; echo 'Firstname'; echo "</th>";
echo "<th class ='text-primary'>"; echo 'Lastname'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Username'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Email'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Password'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Contact'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Semister'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Enrollment'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Status'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Approved'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Not Approved'; echo '</th>';
 echo '</tr>';
 
while ($row = mysqli_fetch_assoc($result)){
    
    
echo '<tr>';
echo "<td class='text-bold'>"; echo $row['firstname']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['lastname']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['username']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['email']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['password']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['contact']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['semister']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['enrollment']; echo '</td>';
echo"<td class='text-bold'>"; echo $row['status']; echo '</td>';
echo"<td class='text-danger'>";?><a href="approved.php?id=<?php echo $row['id']?>" class="text-success text-bold">Approved</a> <?php echo '</td>';
echo"<td>";?><a href="not_approved.php?id=<?php echo $row['id']?>" class="text-danger text-bold">Not Approved</a> <?php echo '</td>';

 echo '</tr>';
    
    
}

echo '</table>';



?>





<?php include 'footer.php';?>
    
