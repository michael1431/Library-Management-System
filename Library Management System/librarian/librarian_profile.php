<?php
// code for session check user is login or not

session_start();
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}

?>

<?php include 'header.php';?>
<?php include 'connection.php'?>

<h4 class="alert alert-info col-sm-4" style="margin-left:40%; text-align: center;">Librarian Profile</h4>
<hr>
<?php

$result= mysqli_query($link,"SELECT * FROM librarian_registration WHERE username ='$_SESSION[username]'");

echo "<table class='table table-bordered'>";
echo'<tr>';
echo'<th>'; echo 'First Name'; echo '</th>';
echo'<th>'; echo 'Last Name'; echo '</th>';
echo'<th>'; echo 'Username'; echo '</th>';
echo'<th>'; echo 'Password'; echo '</th>';

 echo '</tr>';

while($row= mysqli_fetch_array($result)){
    
    echo '<tr>';
    echo '<td>';
    echo $row['firstname'];
    echo'</td>';
    
    echo '<td>';
    echo $row['lastname'];
    echo'</td>';
    
    echo '<td>';
    echo $row['username'];
    echo'</td>';
    
   
    echo '<td>';
    echo $row['password'];
    echo'</td>';
    echo '</tr>';
    
}

echo "</table>";


?>



<?php include 'footer.php';?>