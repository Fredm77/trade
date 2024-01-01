<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course</title>
    <style>
        
        .register{
            display: inline-flex;
        }
        .relations{
                margin-left: 0;
                margin-top: 0;
                margin-bottom: 0;
                margin-right: 70px;
                padding-left: 4px;
                padding-right: 70px;
                padding-top: 14px;
                padding-bottom: 50px;
                background-color: white;
                box-shadow: 0 0 30px 0px rgba(57, 86, 247, 0.2);
                box-sizing: border-box;
        }
        .relations ul li{
         background-color: white;
         display: block;
         padding: 5px;
        }
        .relations ul li a{
            text-decoration: none;
            text-align: center;
            border-radius: 7px;
            padding: 10px;
            padding-right: 15px;
            padding-left: 15px;
            color: white;
            font-size: 20px;
            display: block;
            background-color: rgb(0, 140, 255);
            box-shadow: 0 0 30px 0px rgba(57, 86, 247, 0.2);
            box-sizing: border-box;
        }
        .form{
            padding-right: 50px;
        }
        .entry{
            padding: 10px;
            border: 2px solid rgb(36, 167, 255);
            border-radius: 14px;
        }
        .save{
            border: none;
            font-size: 17px;
            background-color: rgb(0, 110, 255);
            border-radius: 25px;
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 10px;
            padding-bottom: 10px;
            color: white;
            margin-top: 17px;
            text-align: center;
        }
        tr th,tr td{
            padding-right: 25px;
        }
        tr button{
            border: 2px solid rgb(245, 73, 73);
            background-color: transparent;
            color:rgb(245, 73, 73) ;
            text-decoration: none;
            border-radius: 7px;
            padding: 2px;
        }
    </style>
</head>
<body style="margin: 25px;">
    <section class="register">
        <div class="relations">
            <ul>
                <li><a href="customers.php">Customers</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="sales.php">Sales</a></li>
                <li><a href="venders.php">Venders</a></li>
            </ul>
        </div>
        <div class="form">
            <form action="product.php" method="post">
                <label for="">Product name:<br><input type="text" size="30" class="entry" name="productName"></label><br>
                <label for="">Description:<br><input type="text" size="30" class="entry" name="description"></label><br>
                <label for="">Quantity:<br><input type="text" size="30" class="entry" name="quantity"></label><br>
                <label for="">Price:<br><input type="text" size="30" class="entry" name="price"></label><br><br>
                <label for="">Venders name:</label><br>
                <select name="vid" id="">
           <?php
      $connect=mysqli_connect("localhost","root","","new");

      $q=mysqli_query($connect,"select * from venders");  

      while($data=mysqli_fetch_array($q))
      {
          ?>
           <option value="<?php echo $data['v_id'] ?>"><?php echo $data['v_fname']." ".$data['v_lname']?></option><br>
         
         <?php
     
      }
      ?>
                </select>
                <br>
                <input type="submit" value="Save" class="save" name="save">
            </form>
        </div>
        <div class="table">
            <h4>Product table</h4>
                    <table border="1" cellpadding="7" cellspacing="0">
                            <tr>
                                <th>Product_id</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Venders name</th>
                                <th>Action</th>
                            </tr>
                            <?php
      $connect=mysqli_connect("localhost","root","","new");

      $q=mysqli_query($connect,"SELECT product.p_id,product.p_name,product.decription,product.quantity,product.price,venders.v_fname
      FROM product,venders where product.vid=venders.v_id;");  

      while($data=mysqli_fetch_array($q))
      {
          ?>
                            <tr>
                            <td><?php echo $data['p_id']?></td>
                            <td><?php echo $data['p_name']?></td>
                            <td><?php echo $data['decription']?></td>
                            <td><?php echo $data['quantity']?></td>
                            <td><?php echo $data['price']?></td>
                            <td><?php echo $data['v_fname']?></td>
                            <td> <a href="product.php?id=<?php echo $data["p_id"]  ?>"><button type="button" name="delete" class="btn btn-outline-danger btn-sm">delete</button> </a></td>
                            </tr>
                            <?php
     
      }
      ?>
                    </table>
        </div>
    </section>
</body>
</html>
<?php
@$save=$_POST["save"];
if(isset($save)){
    $pname=$_POST["productName"];
    $desc=$_POST["description"];
    $quantity=$_POST["quantity"];
    $price=$_POST["price"];
     $vid=$_POST["vid"];
    $connect=mysqli_connect("localhost","root","","new");
    $qeury=mysqli_query($connect,"insert into product values('','$pname','$desc','$quantity','$price','$vid')");
    echo "<script>window.location.href = 'product.php';</script>";
}
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $conn=mysqli_connect("localhost","root","","new"); 
    $qeury=mysqli_query($conn,"delete from product where p_id='$id'");
    $results= $conn->query($qeury);
    if ($results) {
        echo "well sql";
    }
      else{
        echo "error ocurred in sql";
?> 
   <script>window.location.href = "product.php";</script><?php
      }

}
?>