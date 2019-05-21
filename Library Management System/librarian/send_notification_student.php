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
<h4 class="alert alert-info col-sm-5" style="margin-left:30%; text-align: center;">Send Message To Students</h4>
<hr>

<?php
if(isset($_POST['submit1'])){
    
    $username=$_POST['std_username'];
    // std username comes from select 
    $title =$_POST['title'];
    $msg =$_POST['message'];
    //$librarian_username =$_SESSION['username'];
    
    mysqli_query($link, "INSERT INTO `messages`(`id`, `std_name`, `librarian_name`, `title`, `msg`, `std_read`) VALUES ('','$username','$_SESSION[username]','$title','$msg','No')");
    
    ?>
<div class="alert alert-warning col-sm-5" style="margin-top:5% ; margin-left: 30%; text-align:center">Message Send Successfully</div>

<?php
    
}




?>
<br>
<br>
<br>

<form method="POST" action="" name="form1" class="col-lg-6"style="margin-left: 25%; text-align: center;">
    
    <table class="table table-bordered">
        
        <tr>
            <td>
                <select class="form-control selectpicker" name="std_username">
                    
                    <?php
                    // username ta catch korbo std er
                    
                    $result = mysqli_query($link, "SELECT * FROM student_registration");
                    
                    while($row=mysqli_fetch_array($result)){
                        
                        ?><option value="<?php echo $row['username'];?>">
                            
                        <?php echo $row['username'].'('.$row['enrollment'].')'; ?>
                        
                        </option><?php
                        
                    }
                    
                    ?>
                    
                </select>
            </td>
        </tr>
        
        <tr>
            <td>
                <input type="text" name="title" class="form-control" placeholder="Enter Title Here">
            </td>
            
        </tr> 
        
        <tr>
            <td>
                
                <textarea name="message" class="form-control"></textarea>
            </td>
            
        </tr> 
           
         <tr>
            <td>
                
                <input type="submit" name="submit1" value="Send Message" class="form-control btn btn-success">
            </td>
            
        </tr> 
            
            
            
            
    </table>
</form>






<?php include 'footer.php';?>

