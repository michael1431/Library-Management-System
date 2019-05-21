<?php
// code for session check user is login or not

session_start();
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}

?>
<?php include 'header.php';
include 'connection.php';
?>

<h1 class="alert alert-success" style="text-align:center">My Issued Books</h1>


<table class="table table-bordered table-hover">
    <tr class="text-info">
        <th>Student Enrollment</th>
        <th>Books Name</th>
        <th>Books_Issue_Date</th>
    </tr>
    
    <?php
    
    $result= mysqli_query($link, "SELECT * FROM `issue_books` WHERE std_username ='$_SESSION[username]'");
    
    while ($row= mysqli_fetch_array($result)){
        
        echo"<tr>";
         echo"<td>";
         echo $row['std_enrollment'];
         echo "</td>";
        
        
       
         echo"<td>";
         echo $row['books_name'];
         echo "</td>";
       
        
      
         echo"<td>";
         echo $row['books_issue_date'];
         echo "</td>";
        echo"</tr>";
    }
    ?>
        
    
    
    
</table>



<?php include 'footer.php';?>
