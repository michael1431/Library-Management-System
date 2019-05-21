<?php
// code for session check user is login or not

session_start();
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}

?>
<?php include 'header.php';?>
<?php include 'connection.php';?>
<h4 class="alert alert-info col-sm-5" style="margin-left:30%; text-align: center;">Return Books</h4>
<hr>

<form class="col-lg-12" method="POST" action="" style="margin-left:40%; text-align: center;">
    
        <table >
        <tr>
            <td>
    
                <select name="enroll" class="form-control selectpicker">
                 
                    <?php
                    // books return date jader khali ache tader k niye asbo
                    
                    $result = mysqli_query($link,"SELECT std_enrollment from issue_books WHERE books_return_date=''");
                    
                    while($row= mysqli_fetch_array($result)){
                        
                        echo'<option>';
                        echo $row['std_enrollment'];
                        echo'</option>';
                    }
                    ?>
          
        
              </select>
            </td>
            
            <td>
                <input type="submit" value="Search" name="submit1" class="form-control btn btn-success">
            </td>
            
        
    
    
    
    </tr>
    </table> 
     
</form>

<?php
if(isset($_POST['submit1'])){
   $result = mysqli_query($link, "SELECT * FROM issue_books WHERE std_enrollment ='$_POST[enroll]'");
   echo "<table class='table table-bordered'>";
   echo '<tr>';
   echo '<th>';echo 'Student Enrollment'; echo '</th>';
   echo '<th>';echo 'Student Name'; echo '</th>';
   echo '<th>';echo 'Student Semister'; echo '</th>';
   echo '<th>';echo 'Student Contact'; echo '</th>';
   echo '<th>';echo 'Student Emaill'; echo '</th>';
   echo '<th>';echo 'Books Name'; echo '</th>';
   echo '<th>';echo 'Books Issue Date'; echo '</th>';
   echo '<th>';echo 'Return Books'; echo '</th>';
   echo'</tr>';
   
   while($row5= mysqli_fetch_array($result)){
       echo '<tr>';
       
       echo '<td>'; echo $row5['std_enrollment']; echo '</td>';
       echo '<td>'; echo $row5['std_name']; echo '</td>';
       echo '<td>'; echo $row5['std_semister']; echo '</td>';
       echo '<td>'; echo $row5['std_contact']; echo '</td>';
       echo '<td>'; echo $row5['std_email']; echo '</td>';
       echo '<td>'; echo $row5['books_name']; echo '</td>';
       echo '<td>'; echo $row5['books_issue_date']; echo '</td>';
       // books return er jonno id ta darbo
   echo"<td>";?><a href="return.php?id=<?php echo $row5['id']?>" class="text-info text-bold">Return Books</a> <?php echo '</td>';

       echo'</tr>';
       
       
   }
   
   echo '</table>';
    
    
}


?>




<?php include 'footer.php';?>


