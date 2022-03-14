<?php


class product
{

  private $dsn;
  private $user;
  private $pass;
  private $dbname;
  protected $con;

  function __construct()
  {
    $this->dbname="php_test";
    $this->dsn = "mysql:host=localhost;dbname=$this->dbname";
    $this->user = "root";
    $this->pass = "";
    
    try {
      $this->con = new PDO($this->dsn, $this->user, $this->pass);

      echo "you are connected";
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }



  function show()
  {
    $query = "select * from product";


    $stm = $this->con->prepare($query);
    if ($stm->execute()) {
      $rows = $stm->fetchAll();
      foreach ($rows as $row) {
?>
        <tr>

          <td><?php echo $row['product_name']; ?> </td>
          <td><?php echo $row['product_price']; ?> </td>
          <td><img src="<?php echo $row['product_image']; ?>" width="100px" height="100px" alt="<?php echo $row['product_image']; ?>"></td>
          <td><a href="edite.php?action=edite&id=<?php echo $row['product_id']; ?> ">edite</a>/
          <a href="home.php?action=delete&id=<?php echo $row['product_id']; ?> "onclick="return confirm('Do you really want to Delete ?');">delete</a></td>

        <?php
      }
    }
  }


  function ShowByName($name)
  {

    $query = "select * from product where product_name='$name'";


    $stm = $this->con->prepare($query);
    $stm->execute();
    if ($stm->rowCount() > 0) {
      $rows = $stm->fetchAll();
      foreach ($rows as $row) {
        ?>
        <tr>

          <td><?php echo $row['product_name']; ?> </td>
          <td><?php echo $row['product_price']; ?> </td>
          <td><img src="<?php echo $row['product_image']; ?>" width="100px" height="100px" alt="<?php echo $row['product_image']; ?>"></td>


  <?php
      }
    } else {
      echo "no product with such name";
    }
  }


  
  function ShowById($id)
  {

    $query = "select * from product where product_id='$id'";


    $stm = $this->con->prepare($query);
    $stm->execute();
    if ($stm->rowCount() > 0) {
      $rows = $stm->fetchAll();
      foreach ($rows as $row) {
        ?>
        <tr>

          <td><?php echo $row['product_name']; ?> </td>
          <td><?php echo $row['product_price']; ?> </td>
          <td><img src="<?php echo $row['product_image']; ?>" width="100px" height="100px" alt="<?php echo $row['product_image']; ?>"></td>


  <?php
      }
    } else {
      echo "no product with such name";
    }
  }




  function AddProduct($name,$price,$img,$category)
  {
    $query="insert into product values(null,'$name',$price,'$img',$category)";
    $stm = $this->con->prepare($query);
    $stm->execute();
  }


  function edite($id,$productname,$productprice,$img,$categoryid)
  {
    $query="update product set product_name='$productname',product_price='$productprice',product_image='$img',category_id ='$categoryid' where product_id='$id'";
     
    $stm=$this->con->prepare($query);
    $stm->execute();
  }

  function delete($id)
  {
    $query= "delete from product where product_id=$id";
  
    $stm=$this->con->prepare($query);
    $stm->execute();
    echo "<script>alert('Data deleted successfully');</script>"; 
    echo "<script>window.location.href = 'home.php'</script>";  
  }

}






$products = new product();
