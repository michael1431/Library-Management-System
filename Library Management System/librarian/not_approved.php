<?php

include 'connection.php';
// catch the user id by using get method

$id =$_GET['id'];

//update the status

mysqli_query($link,"update student_registration set status ='no' where id=$id");
header('Location:display_student_information.php');



?>
