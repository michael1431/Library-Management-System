<?php

include 'connection.php';

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Form</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
         <link rel="stylesheet" href="css/animate.css">
         <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
        
        <div class="container animated shake">
            
            <h1 class="text-center alert alert-success">Libarary Mangagement System </h1>
            <hr>
            <h3 class="alert alert-info" style="text-align: center;">User Registration From</h3>
 
               
         <?php 
            
            if(isset($_POST['submit'])){
                
                // bind all the value
                
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $password =$_POST['password'];
                $email = $_POST['email'];
                $contact =$_POST['contact'];
                $semister =$_POST['semister'];
                $enrollment =$_POST['enrollment'];
                          
         mysqli_query($link,"INSERT INTO `student_registration`(`id`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`, `semister`, `enrollment`, `status`) VALUES ('','$firstname','$lastname','$username','$password','$email','$contact','$semister','$enrollment','no')");
        
       
       ?>
            <div class="alert alert-warning col-sm-5" style="margin-left: 25%; text-align: center; color: red;">Registration Completed Successfully!!</div>
            
        <?php    
     
            
        }
                   
            ?>
                
     
            
            <div class="row">
                
                <div class="col-md-12">
                    
                    <form  action="" method="POST" class="form-horizontal">
                        
                        <div class="form-group">
                            
                            <label for="firstname" class="control-label col-sm-4">First Name</label>
                            
                            <div class="col-sm-4">
                            
                                <input type="text"  name="firstname" class="form-control" placeholder="Enter Your First Name" required="">
                            </div>
                            <div class="col-sm-4">
                               
                            </div>
                           
                        </div>
                        
                        <div class="form-group">
                            
                            <label for="lastname" class="control-label col-sm-4">Last Name</label>
                            
                            <div class="col-sm-4">
                            
                                <input type="text"  name="lastname" class="form-control" placeholder="Enter Your Last Name" required="">
                            
                            </div>
                            <div class="col-sm-4">
                              
                            </div>
                           
                        </div>
                 
                          <div class="form-group">
                            
                            <label for="username" class="control-label col-sm-4">Username</label>
                            
                            <div class="col-sm-4">
                            
                                <input type="text" id="username" name="username" class="form-control" placeholder="Enter Your Username" required="">
                        
                            </div>
                            
                            <div class="col-sm-4">
                              
                                
                               
                            </div>
                   
                            
                        </div>
                        
                        <div class="form-group">
                            
                            <label for="password" class="control-label col-sm-4">Password</label>
                            
                            <div class="col-sm-4">
                            
                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter Your Password" required="">
                        
                            </div>
                            
                            <div class="col-sm-4">
                             
                                
                               
                                
                            </div>
                   
                                
                                
                        </div>
                        
                        <div class="form-group">
                            
                            <label for="email" class="control-label col-sm-4">Email</label>
                            
                            <div class="col-sm-4">
                            
                                <input type="text" id="email" name="email" class="form-control" placeholder="Enter Your Email" required="">
                        
                            </div>
                            <div class="col-sm-4">
                               
                                
                            </div>
                           
                        </div>
                        
                        
                        <div class="form-group">
                            
                            <label for="contact" class="control-label col-sm-4">Contact</label>
                            
                            <div class="col-sm-4">
                            
                                <input type="text" id="contact" name="contact" class="form-control" placeholder="Enter Your Contact Number" required="">
                        
                            </div>
                            <div class="col-sm-4">
                             
                            </div>
                           
                        </div>
                        
                        <div class="form-group">
                            
                            <label for="semister" class="control-label col-sm-4">Semister</label>
                            
                            <div class="col-sm-4">
                            
                                <input type="text" id="semister" name="semister" class="form-control" placeholder="Enter Your Semister" required="">
                        
                            </div>
                            <div class="col-sm-4">
                               
                            </div>
                           
                        </div>
                        
                        <div class="form-group">
                            
                            <label for="enrollment" class="control-label col-sm-4">Enrollment</label>
                            
                            <div class="col-sm-4">
                            
                                <input type="text" id="enrollment" name="enrollment" class="form-control" placeholder="Enter Your Enrollment" required="">
                        
                            </div>
                            <div class="col-sm-4">
                              
                            </div>
                           
                        </div>
                        
                       
         
                        
                        <div class="col-sm-4 col-sm-offset-5">
                            
                            <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                        </div>
                        
                        
                    </form>
                    
              
                        
                    </div>
                
            </div>
                 
            
        </div>
       
            <hr>
            <footer class="col-sm-6 col-sm-offset-3">
                <p>Copyright &copy; 2018-<?php echo date('Y') ?> All rights reserved</p>
            </footer>
        
        
        
        
    <script type="text/javascript" src="js/bootstrap.js"> </script>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"> </script>
    
    </body>
</html>



