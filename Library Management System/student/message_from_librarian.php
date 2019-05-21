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
<h4 class="alert alert-info col-sm-5" style="margin-left:30%; text-align: center;">Show Message</h4>
<hr>

<table class="table table-borderd table-hover">
    <tr>
    <th style="color: red;">Librarian Name</th>
    <th style="color:red;">Title</th>
    <th style="color: red;">Message</th>
    </tr>
    
    <?php 
    
    $res=mysqli_query($link,"SELECT * FROM messages WHERE std_name='$_SESSION[username]' ORDER BY id DESC");
    while ($rows= mysqli_fetch_array($res)){
        
        echo '<tr>';
        echo'<td>'; echo '<b>'; echo $rows['librarian_name']; '</td>';
        echo'<td>';  echo '<b>'; echo $rows['title']; '</td>';
        echo'<td>';  echo '<b>';echo $rows['msg']; '</td>';
        
        echo'</tr>';
    }
    
    ?>
    
    
    
</table>

<?php

$std_read =0;
$result= mysqli_query($link, "SELECT * FROM messages WHERE std_name='$_SESSION[username]'");
$std_read= mysqli_num_rows($result);



?>

<?php

mysqli_query($link, "UPDATE messages SET std_read='Yes' WHERE std_name='$_SESSION[username]'");



?>





<?php include 'footer.php';?>

