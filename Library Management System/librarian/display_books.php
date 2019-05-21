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
<h4 class="alert alert-warning col-sm-5" style="margin-left:30%; text-align: center;">Display Books Information</h4>
<hr>

<br>

<!-- code for search books-->
<form name="form2" method="POST" action="" class="col-sm-5">
    
    <input type="text" name="book" class="form-control" placeholder="Enter Books Name">
    <br>
    <input type="submit" value="Search" name="search" class="btn btn-primary">
    
    <br>
    <br>
</form>




<?php

// code for show the search records
if(isset($_POST['search'])){
    
   // $name = $_POST['book'];
  
    
$result = mysqli_query($link,"SELECT * FROM `books_info` WHERE books_name LIKE('$_POST[book]%') ");

echo "<table class='table table-bordered table-hover'>";
echo '<tr>';
echo "<th class ='text-primary'>"; echo 'Books_Name'; echo "</th>";
echo "<th class ='text-primary'>"; echo 'Books_Image'; echo "</th>";
echo "<th class ='text-primary'>"; echo 'Books_Author_Name'; echo "</th>";
echo "<th class ='text-primary'>"; echo 'Publication_Name'; echo "</th>";
echo "<th class ='text-primary'>"; echo 'Purchase_Date'; echo "</th>";
echo "<th class ='text-primary'>"; echo 'Price'; echo "</th>";
echo "<th class ='text-primary'>"; echo 'Quantity'; echo "</th>";
echo "<th class ='text-primary'>"; echo 'Available_Quantity'; echo "</th>";
echo "<th class ='text-primary'>"; echo 'Delete Books'; echo "</th>";
 echo '</tr>';

while ($row = mysqli_fetch_assoc($result)){
 echo '<tr>';
echo "<td class='text-bold'>"; echo $row['books_name']; echo '</td>';
echo "<td class='text-bold'>"; ?> <img src ="<?php echo $row['books_image'];?>" height="50" width="50"> <?php echo '</td>';
echo "<td class='text-bold'>"; echo $row['books_author_name']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['publication_name']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['purchase_date']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['price']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['quantity']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['available_quantity']; echo '</td>';
echo "<td class='text-bold'>";
?> <a href="delete_books.php?id=<?php echo $row['id'];?>">Delete Books</a>  <?php
echo"</td>";


 echo '</tr>';
  
 

 
   


}

echo '</table>';

    
    
} else {
    

// show the all the  Books records


$result = mysqli_query($link,"SELECT * FROM `books_info`");

echo "<table class='table table-bordered table-hover'>";
echo '<tr>';
echo "<th class ='text-primary'>"; echo 'Books_Name'; echo "</th>";
echo "<th class ='text-primary'>"; echo 'Books_Image'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Books_Author_Name'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Publication_Name'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Purchase_Date'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Price'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Quantity'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Available_Quantity'; echo '</th>';
echo "<th class ='text-primary'>"; echo 'Delete Books'; echo "</th>";
 echo '</tr>';

while ($row = mysqli_fetch_assoc($result)){
 
    
echo '<tr>';
echo "<td class='text-bold'>"; echo $row['books_name']; echo '</td>';
echo "<td class='text-bold'>"; ?> <img src ="<?php echo $row['books_image'];?>" height="50" width="50"> <?php echo '</td>';
echo "<td class='text-bold'>"; echo $row['books_author_name']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['publication_name']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['purchase_date']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['price']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['quantity']; echo '</td>';
echo "<td class='text-bold'>"; echo $row['available_quantity']; echo '</td>';
echo "<td class='text-bold'>";
?> <a href="delete_books.php?id=<?php echo $row['id'];?>">Delete Books</a>  <?php
echo"</td>";


 echo '</tr>';



}

echo '</table>';

}



?>



<?php include 'footer.php';?>
    

