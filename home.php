<?php
require('productClass.php');

if(isset($_GET['action']))
{
  $id=$_GET['id'];
 switch($_GET['action'])
 {
   case "edite";
  
   break;
   case "delete"; 
   $products->delete($id);
   break;
 }
}
else


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

<body>

  <!----- Category --------->
<div class="container">
  <h1>products</h1>
   
  <form action="home.php" method="POST"> 
   <input type="search" name="product-name" id="">
   
   <input type="submit" name="search" value="search">
<br>

 
  </form>
  <a class="addbtn" href="add_products.php">Add product</a>
  <table  class="cat_table">
    <tr>
      <th>product name</th>
      <th>price</th>
      <th>image</th>
      <th>Action</th>
    </tr>

    <?php 
    if(isset($_POST['search']))
    {
      $product_name=$_POST['product-name'];
      $products->ShowByName($product_name);
    }
    else
   $products->show();
    
    ?>
  </table>
</div>
</body>
</html>