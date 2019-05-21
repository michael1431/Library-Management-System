
<?php
session_start();
include 'connection.php';
?>

<?php
                    
                    if(isset($_POST['login'])){
                        
                        $username = $_POST['username'];
                        $password =$_POST['password'];
                        $username_check = mysqli_query($link,"SELECT * FROM `student_registration` WHERE `username` = '$username'");
                      
                        if(mysqli_num_rows($username_check)>0){
                            // db tekhe sob kichu fetch kore niye asbo
                            
                             $row = mysqli_fetch_assoc($username_check);
                             
                             // Now check the password
        // Row variable e sob data db tekhe niye asar por check korbo password ta oikan tekhe
                             
                              if($row['password'] == $password){
                                  
                                  // check the status
                                  
                                  if($row['status']=='yes'){
                                      // session diye username ta bind korbo
                                      
                                      $_SESSION['username'] = $username;
                                      
                                      header("Location:my_issued_books.php");
                                      
                                  }else{
                                      $account_not_approved ="Your account is not approved yet";
                                  }
                                  
                                  
                              }else{
                                  $wrong_password = " This Password Is Wrong";
        
                              }
                            
                        } else {
                            // Username ta na pele error msg ta show korbe
        
                            
                            $username_notfound = " This Username Is Not Found";
                        }
                        
                      
                        
                        
                    }
          ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>User Login</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
         <link rel="stylesheet" href="css/animate.css">
    </head>
    <body>
        
        <div class="container animated shake">
            
            <h1 class="text-center alert alert-info">Library Management System </h1>
            <hr>
            
            
            <div class="row">
                
                <div class="col-sm-4 col-sm-offset-4">
                
                    <form action="login.php" method="POST">
                        <h2 class="text-center alert alert-success">User Login Form</h2>
                        
                        <div>
                            
                            <input type="text" name="username" placeholder="Username" class="form-control">
                            
                        </div>
                        <br>
                        
                        
                         <div>
                             <input type="password" name="password" placeholder="Password" class="form-control">
                            
                        </div>
                        
                        <br>
                        
                        <div>
                            
                           <input type="submit" value="Login" name="login" class="btn btn-info col-sm-offset-2">
                           <a href="#" class="reset_pass">Reset Your Password?</a>
                           
                        </div>
                        
                        
                        
                    </form>
                    
                    <br>
                    
                    
                    
               
                    
                    
                    
                    <br>
                    <a  href="registration.php" class=" alert alert-success col-sm-8 col-sm-offset-2">New to site?Create an account</a>
        
                        
                        
                    
                    
                </div>
                
                
                
            </div>
           
            
         
            <?php if(isset($username_notfound)){
                
                // show the error msg here
                
           echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$username_notfound.'</div>';
                    
            } 
            ?>
            
            
             <?php if(isset($wrong_password)){
                
                // show the error msg here
                
           echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$wrong_password.'</div>';
                    
            } 
            ?>
            
             <?php if(isset($account_not_approved)){
                
                // show the error msg here
                
           echo '<div class="alert alert-danger col-sm-4 col-sm-offset-4">'.$account_not_approved.'</div>';
                    
            } 
            ?>
            
            
        </div>
        
        
        
        
    <script type="text/javascript" src="js/bootstrap.js"> </script>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"> </script>
    
    </body>
</html>


