<?php
include 'connection.php';
// This code update the issue books table and increase the value of available quantity from books info table
// when a book is submitted

$id =$_GET['id'];

$date =date("d-M-Y");

$result = mysqli_query($link, "UPDATE issue_books SET books_return_date='$date' WHERE id='$id'");

//code for increase availble quantity

$books_name ="";
$res =mysqli_query($link,"SELECT * FROM issue_books WHERE id='$id'");

while($row= mysqli_fetch_array($res)){
    
    $books_name=$row['books_name'];
}

mysqli_query($link, "UPDATE books_info SET available_quantity= available_quantity+1 WHERE books_name='$books_name' ");
header("Location:return_books.php");



?>
