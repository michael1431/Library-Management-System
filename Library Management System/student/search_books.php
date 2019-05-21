  
<?php
// code for session check user is login or not

session_start();
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}

?>
<?php include 'header.php';?>
<?php include 'connection.php';?>

<h1 class="alert alert-success" style="text-align:center">Search Books</h1>
<br>
<form name="form1" method="post" action="">
    <table class="table table-bordered">
        
        <tr>
            <td><input type="text" name="books" placeholder="Enter Books Name" required="" class="form-control"></td>
            <td><input type="submit" name="submit1" value="Search Books" class="form-control btn btn-info"></td>
        </tr>
        
        
        
        
    </table>
           
    
    
    
</form>


<?php

// code for search books 
if(isset($_POST['submit1'])){
    // jodi search button ta pai tahole agulo kaj korbe
    
    
    $result = mysqli_query($link, "SELECT * FROM books_info WHERE books_name LIKE ('$_POST[books]%')");

echo "<table class='table table-bordered'>";
echo'<tr>';
echo'<th>'; echo 'Books Image'; echo '</th>';
echo'<th>'; echo 'Books Name'; echo '</th>';
echo'<th>'; echo 'Books Author Name'; echo '</th>';
echo'<th>'; echo 'Books Price'; echo '</th>';
echo'<th>'; echo 'Available Quantity'; echo '</th>';
 echo '</tr>';
while($row= mysqli_fetch_array($result)){
    // code for show image
    
    
    //$i=$i+1;
    echo '<tr>';
    
     echo'<td>';
     ?> <img src ="../librarian/<?php echo $row['books_image'];?>" height="50" width="50"> <?php 
    echo '</td>';
    
    echo '<td>';
    echo $row['books_name'];
    echo'</td>';
    
    echo '<td>';
    echo $row['books_author_name'];
    echo'</td>';
    
    echo '<td>';
    echo $row['price'];
    echo'</td>';
    
    echo '<td>';
    echo $row['available_quantity'];
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

    
    
    
}else {
    
// otherwise baki sob gulo dekabe

//$i=0;

$result = mysqli_query($link, "SELECT * FROM books_info");

echo "<table class='table table-bordered'>";
echo'<tr>';
echo'<th>'; echo 'Books Image'; echo '</th>';
echo'<th>'; echo 'Books Name'; echo '</th>';
echo'<th>'; echo 'Books Author Name'; echo '</th>';
echo'<th>'; echo 'Books Price'; echo '</th>';
echo'<th>'; echo 'Available Quantity'; echo '</th>';
 echo '</tr>';
while($row= mysqli_fetch_array($result)){
    // code for show image
   
    //$i=$i+1;
    echo '<tr>';
    echo'<td>';
     ?> <img src ="../librarian/<?php echo $row['books_image'];?>" height="50" width="50"> <?php 
    echo '</td>';
    
    echo '<td>';
    echo $row['books_name'];
    echo'</td>';
    
    echo '<td>';
    echo $row['books_author_name'];
    echo'</td>';
    
    echo '<td>';
    echo $row['price'];
    echo'</td>';
    
    echo '<td>';
    echo $row['available_quantity'];
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

}


?>




<?php include 'footer.php';?>

