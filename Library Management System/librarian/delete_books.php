
<?php
// code for session check user is login or not

session_start();
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}

?>
<?php
include 'connection.php';
?>
<?php

// REMOVE ERROR WHEN WE SEE THE PAGE NORMALY BY COPY LINK
if(isset($_GET['id'])){

$id=$_GET['id'];

$result = mysqli_query($link, "DELETE FROM books_info WHERE id ='$id'");

header("Location:display_books.php");


}else{
    // delete e click korle if er condition kaj korbe and delete hobe otherwise display books e takbe
    header("Location:display_books.php");
}


?>
