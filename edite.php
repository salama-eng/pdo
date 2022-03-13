<?php 
//Database Connection
require('productClass.php');
if(isset($_POST['submit']))
  {
  	$id=$_GET['id'];
  	//Getting Post Values
      $productname=$_POST['productname'];
   $productprice=$_POST['productprice'];
     if($_FILES['productimage']['name']){
    move_uploaded_file($_FILES['productimage']['tmp_name'], "image/".$_FILES['productimage']['name']);
    $img="image/".$_FILES['productimage']['name'];
    }
    else{
        $img=$_POST['img1'];
    }
  
    if (!$products->edite($id,$productname,$productprice,$img,4))
     {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='home.php'; </script>";
  }
  else
    {
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>PHP Crud Operation!!</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>

</style>
</head>
<body>
<div class="signup-form">
    <form  method="POST" enctype="multipart/form-data">
 <?php
$id=$_GET['id'];
$product=$products->ShowById($id);

?>
		<h2>Update </h2>
		<p class="hint-text">Update product.</p>
        <div class="form-group">
				<div class="col">
                <input type="text" class="form-control" name="productname" value="<?php  echo $product['product_name'];?>" placeholder="product name">
                </div>
        </div>
		
		  <div class="form-group">
		
				<div class="col"><input type="text" class="form-control" name="productprice" value="<?php  echo $product['product_price'];?>" placeholder="product price"></div>
	
			</div>        	
       
    
         <div class="form-group">
        
		
				<div class="col">
                 <img src="<?php echo $product['product_image'];?>" width="100px" height="100px">
               <input type="file" class="form-control" name="productimage" value="<?php  echo $product['product_image'];?>">
               <input type="hidden" name="img1" value="<?php echo $product['product_image']?>">
               <input type="hidden" name="id" value="<?php echo $product['product_id']?>">
                </div>
	
			</div>        	
       
        
      
       
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Update</button>
        </div>
    </form>

</div>
</body>
</html>