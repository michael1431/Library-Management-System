<?php
// code for session check user is login or not

session_start();
if(!isset($_SESSION['username'])){
    header("Location:login.php");
}

?>


<?php include 'header.php';?>
<?php include 'connection.php'?>



<hr>
<h4 class="alert alert-info col-sm-4" style="margin-left:40%; text-align: center;">Add Books Information</h4>
<hr>
 <?php 
 // code for insert books information
            
            if(isset($_POST['submit1'])){
                
                // bind all the value
                
                $books_name = $_POST['books_name'];
                // code for image upload and save into a folder
                
               // $filename = $_FILES['books_image']['name'];
                //$filetmpname =$_FILES['books_image']['tmp_name'];
               // $folder ='books_image/';
               // move_uploaded_file($filetmpname, $folder.$filename);
                
               // $tm = md5(time());
               // $file = $_FILES['books_image']['name'];
                //$dst ="./books_image/".$tm.$file;
                //$dst1="books_image".$tm.$file;
                
               // move_uploaded_file($_FILES['books_image']['tmp_name'], $dst);
                
               // $target = "books_image/".basename($_FILES['books_image']['name']);
               // $image = $_FILES['books_image']['name'];
                
                 $filename=$_FILES['books_image']['name'];
                $tmpname=$_FILES['books_image']['tmp_name'];
                $folder ="books_image/".$filename;
                move_uploaded_file($tmpname,$folder);
                
               
                $books_author_name= $_POST['books_author_name'];
                $publication_name =$_POST['publication_name'];
                $purchase_date= $_POST['purchase_date'];
                $price =$_POST['price'];
               $quantity =$_POST['quantity'];
               $available_quantity =$_POST['available_quantity'];
               $librarian_username =$_SESSION['username'];
               
               $query ="INSERT INTO `books_info`(`id`, `books_name`, `books_image`, `books_author_name`, `publication_name`, `purchase_date`, `price`, `quantity`, `available_quantity`, `librarian_username`) VALUES ('','$books_name','$folder','$books_author_name','$publication_name','$purchase_date','$price','$quantity','$available_quantity','$librarian_username')";
                
                $result = mysqli_query($link,$query);
                
                //move_uploaded_file($_FILES['books_image']['tmp_name'],$target);
                    
                

        
 
                
                ?>
            <!-- show the msg when data inserted successfully -->
            
            <h4 class="alert alert-warning col-sm-4" style="margin-left:40%; text-align: center;">Books Information Inserted Successfully</h4>
        
            
            
            <?php
         
            }
            ?>
<form method="POST" action="" name="form1" class="col-lg-6"style="margin-left: 30%; text-align: center;" enctype="multipart/form-data">
    
    <table class="table table-bordered">
        
        <tr>
            <td><input type="text" class="form-control" placeholder="Enter Books Name" required="" name="books_name"></td>
        </tr>
        
        <tr>
            
            <td>
            
                <input type="file"  required="" class="form-control" name="books_image">
            </td>
        </tr>
        
        <tr>
            <td><input type="text" class="form-control" placeholder="Enter Books Author Name" required="" name="books_author_name"></td>
        </tr>
        
        <tr>
            <td><input type="text" class="form-control" placeholder="Enter Books Publication Name" required="" name="publication_name"></td>
        </tr>
        <tr>
            <td><input type="text" class="form-control" placeholder="Enter Books Purchase Date" required="" name="purchase_date"></td>
        </tr>
        <tr>
            <td><input type="text" class="form-control" placeholder="Enter Books Price" required="" name="price"></td>
        </tr>
        <tr>
            <td><input type="text" class="form-control" placeholder="Enter Books Quantity" required="" name="quantity"></td>
        </tr>
        <tr>
            <td><input type="text" class="form-control" placeholder="Enter Available Quantity " required="" name="available_quantity"></td>
        </tr>
        
        
        <tr>
            <td><input type="submit"   name="submit1" value="Insert Books Infromation" class="btn btn-primary"></td>
        </tr>
        
        
        
        
        
    </table>
    
    
   
    
</form>


<?php include 'footer.php';?>
    





