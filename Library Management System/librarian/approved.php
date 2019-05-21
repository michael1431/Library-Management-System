<?php

include 'connection.php';
// catch the user id by using get method

$id =$_GET['id'];

mysqli_query($link,"update student_registration set status ='yes' where id=$id");
header('Location:display_student_information.php');



?>