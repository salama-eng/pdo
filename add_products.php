<?php
require('productClass.php');

if(isset($_POST['submit']))
{
  if($_FILES['image']['name']){
    move_uploaded_file($_FILES['image']['tmp_name'], "image/".$_FILES['image']['name']);
    $img="image/".$_FILES['image']['name'];
    }
    $name=$_POST['product-name'];
    $price=$_POST['product-price'];
    $products->AddProduct($name,$price,$img,1);

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<style>
.fform input
{
  background-color: white;
 padding:0.7rem;
 margin:0.3rem;
 border:none;
 border-radius: 0.3rem;
 width:15rem;
}

</style>
<body>

  <!----- Category --------->
<div class="container">
  <h1>Add product info</h1>
   
  <form action="add_products.php" method="POST" enctype="multipart/form-data" class="fform"> 
  <br>
   <input type="search" name="product-name" >
  <br> <input type="number" name="product-price" >
  <br> <input type="file" name="image" ><br> 

   <input type="submit" name="submit" value="Add" ><br> 
<br>

 
  </form>
 
</div>
</body>
</html>