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
<h4 class="alert alert-warning col-sm-5" style="margin-left:30%; text-align: center;">Issue Books</h4>
<hr>

<br>

<form class="col-lg-12" method="POST" action="" style="margin-left:40%; text-align: center;">
    <table >
        <tr>
            <td>
    
                <select name="enroll" class="form-control selectpicker">
        
            <?php
            // catch the enrollment number from student registration table
            $result =mysqli_query($link,"SELECT enrollment from student_registration");
            
            while($row=mysqli_fetch_array($result)){
                
                echo '<option>';
                
                echo $row['enrollment'];
                
                echo '</option>';
                
                
            }
            
            
            ?>
        
          </select>
            </td>
            
            <td>
                <input type="submit" value="search" name="submit" class="form-control btn btn-success">
            </td>
            
        
    
    
    
    </tr>
    </table> 
</form>



    <?php
    // enrollment number niye asar por baki kaj korbe search button click korle
    
    if(isset($_POST['submit'])){
        $res = mysqli_query($link, "SELECT * FROM student_registration WHERE enrollment ='$_POST[enroll]'");
        
        while($row5= mysqli_fetch_array($res)){
            
            $firstname=$row5['firstname'];
            $lastname=$row5['lastname'];
            $username=$row5['username'];
            $email=$row5['email'];
            $contact=$row5['contact'];
            $semister=$row5['semister'];
            $enrollment=$row5['enrollment'];
            $_SESSION['enrollment']=$enrollment;
            $_SESSION['username']=$username;
            
  
          
            
            
        }
        ?>
    
    <div class="container" style="margin-top:10%">
        <form method="POST" action="" >
    
            <table class="table table-bordered">
        
        <tr>
            <td><input type="text" class="form-control" value="<?php echo $enrollment;?>" placeholder="Enter Enrollment Number" name="std_enrollment" disabled></td>
        </tr>
        
        <tr>
            <td><input type="text" class="form-control" placeholder="Enter Student Name"  value="<?php echo $firstname.' '.$lastname ?>" required="" name="std_name"></td>
        </tr>
        
        <tr>
            <td><input type="text" class="form-control" placeholder="Enter Student Semister" required="" value="<?php echo $semister;?>" name="std_semister"></td>
        </tr>
        <tr>
            <td><input type="text" class="form-control" placeholder="Enter Student Contact" value="<?php echo $contact;?>" required="" name="std_contact"></td>
        </tr>
        <tr>
            <td><input type="text" class="form-control" placeholder="Enter Student Email" required="" value="<?php echo $email;?>" name="std_email"></td>
        </tr>
        <tr>
               <td>
    
                   <select name="books_name" class="form-control selectpicker">
        
            <?php
            // catch the books name from books_info table
            $result =mysqli_query($link,"SELECT books_name from books_info");
            
            while($row=mysqli_fetch_array($result)){
                
                echo '<option>';
                
                echo $row['books_name'];
                
                echo '</option>';
                
                
            }
            
            
            ?>
        
          </select>
            </td>
            
        </tr>
        
        <tr>
            <td><input type="text" class="form-control" value="<?php echo date("d-M-Y")?>" placeholder="Enter Books Issue Date" required="" name="books_issue_date"></td>
        </tr>
        
       
        
        <tr>
            <td><input type="text" class="form-control" placeholder="Enter Student Username"  name="std_username" value="<?php echo $username ;?>" disabled=""></td>
        </tr>
        
        <tr>
            <td><input type="submit" class="form-control btn btn-primary" name="submit2" value="Issue Books"></td>
        </tr>
        
        
        
     </table>
            
        
        
        <?php
    
    }
    
    ?>
            
            
        </form>
        
      
      <?php 
      // insert code for issue books
      
      if(isset($_POST['submit2'])){
          
          // std username and enrollment value duita amra session diye dorechi so r post method diye dorte hobe na
          
          $std_name=$_POST['std_name'];
          $std_semister=$_POST['std_semister'];
          $std_email=$_POST['std_email'];
          $std_contact=$_POST['std_contact'];
          $books_name=$_POST['books_name'];
          $books_issue_date=$_POST['books_issue_date'];
          // we empty the books return date bcz it's the user's matter when he will submit it
         
          // check the books available or not
          $quantity=0;
          $check = mysqli_query($link, "SELECT * FROM books_info WHERE books_name ='$books_name'");
          while ($rows=mysqli_fetch_array($check)){
              
              $quantity =$rows['available_quantity'];
          }
          if($quantity==0){
              
              ?>
        <div class="alert alert-danger col-sm-5" style="margin-top:10%; margin-left: 30%; text-align:center;">This Book Is Not Available Now</div>
             <?php
             
          }else{
          
         mysqli_query($link, "INSERT INTO `issue_books`(`id`, `std_enrollment`, `std_name`, `std_semister`, `std_contact`, `std_email`, `books_name`, `books_issue_date`, `books_return_date`, `std_username`) VALUES ('','$_SESSION[enrollment]','$std_name','$std_semister','$std_contact','$std_email','$books_name','$books_issue_date','','$_SESSION[username]')");
        // when we issue books that time the available quantity will decrease
        // code for decrese book from add books table
         mysqli_query($link, "UPDATE books_info SET available_quantity= available_quantity-1 WHERE books_name='$books_name' ");
         
         ?>
        
        <hr>
<h6 class="alert alert-info col-sm-5" style="margin-left:30%; text-align: center;">Books Issues Successfully</h6>
<hr>
        
       
   

<?php

      }
      
      }
      
      ?>
        
        
        
    </div>
    
    



<?php include 'footer.php';?>
    

