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
<h4 class="alert alert-info col-sm-5" style="margin-left:30%; text-align: center;">Books With Details</h4>
<hr>

<?php

$result = mysqli_query($link, "SELECT * FROM books_info");

echo "<table class='table table-bordered'>";
echo'<tr>';
echo'<th>'; echo 'Books Image'; echo '</th>';
echo'<th>'; echo 'Books Name'; echo '</th>';
echo'<th>'; echo 'Books Author Name'; echo '</th>';
echo'<th>'; echo 'Total Books'; echo '</th>';
echo'<th>'; echo 'Available Quantity'; echo '</th>';
 echo '</tr>';
while($row= mysqli_fetch_array($result)){
    // code for show image
    echo '<tr>';
    
    echo'<td>';
     ?> <img src ="<?php echo $row['books_image'];?>" height="50" width="50"> <?php 
    echo '</td>';
    //$i=$i+1;
   
    echo '<td>';
    echo $row['books_name'];
    echo'</td>';
    
    echo '<td>';
    echo $row['books_author_name'];
    echo'</td>';
    
    echo '<td>';
    echo $row['quantity'];
   
    echo'</td>';
    
    echo '<td>';
    echo $row['available_quantity'];
    echo '<br>';
    ?><a href="all_student_of_this_books.php?books_name=<?php echo $row['books_name'];?>" style="color: red;">Student Records Of this Books</a><?php
    echo'</td>';
    
    echo'</tr>';
    
    /* code for show more records 
     kono column takbe na just akta tr tag e sob td dukbe
    if($i==2){
        echo '</tr>';
        echo '<tr>';
        $i=0;
    }*/
    

    
    
}


echo '</tr>';
echo "</table>";



?>
<?php include 'footer.php';?>
