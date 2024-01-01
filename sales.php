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
            padding-right: 70px;
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
            <form action="sales.php" method="post">
                <label for="">Customer Name:</label><br>
                <select name="cid" id="">
          
            <?php
        $connect=mysqli_connect("localhost","root","","new");

        $q=mysqli_query($connect,"select * from customers");  

        while($data=mysqli_fetch_array($q))
        {
            ?>
             <option value="<?php echo $data['customer_id'] ?>"><?php echo $data['c_fname']." ". $data["c_lname"]?></option>
            <?php
       
        }
        ?>
        </select><br>
        <label for="">Product Name:</label><br>
        <select name="pid" id="">
          
          <?php
      $connect=mysqli_connect("localhost","root","","new");

      $q=mysqli_query($connect,"select * from product");  

      while($data=mysqli_fetch_array($q))
      {
          ?>
           <option value="<?php echo $data['p_id'] ?>"><?php echo $data['p_name']; ?></option>
          <?php
     
      }
      ?>
      </select><br>
                <label for="">Quantity:<br><input type="text" size="20" class="entry" name="quantity"></label><br>
                <label for="">Price:<br><input type="text" size="30" class="entry" name="price"></label><br>
                <label for="">Date:<br><input type="date" size="30" class="entry" name="date"></label><br>
                <label for="">Time:<br><input type="time" size="30" class="entry" name="time"></label><br>
                <input type="submit" value="Save" class="save" name="save">
            </form>
        </div>
        <div class="table">
            <h4>Sales Table</h4>
                    <table border="1" cellpadding="7" cellspacing="0">
                            <tr>
                                <th>ID</th>
                                <th>Customer name</th>
                                <th>Product name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                            <?php
                           $connect=mysqli_connect("localhost","root","","new");
                             $qeury=mysqli_query($connect,"SELECT sales.id,customers.c_fname,product.p_name,sales.quantity,sales.price,sales.date,sales.time FROM sales,product,customers WHERE sales.c_id=customers.customer_id AND sales.p_id=product.p_id;");
                           while($data=mysqli_fetch_array($qeury))
                           {
                          
                          ?>
                            <tr>
                            <td><?php echo $data['id']?></td>
                            <td><?php echo $data['c_fname']?></td>
                            <td><?php echo $data['p_name']?></td>
                            <td><?php echo $data['quantity']?></td>
                            <td><?php echo $data['price']?></td>
                            <td><?php echo $data['date']?></td>
                            <td><?php echo $data['time']?></td>
                            <td> <a href="sales.php?id=<?php echo $data["id"]  ?>" ><button type="button" name="delete" class="btn btn-outline-danger btn-sm">delete</button> </a></td>
                        </tr>
                          <?php } ?>
                    </table>
        </div>
    </section>
</body>
</html>
<?php
@$save=$_POST["save"];
if(isset($save)){
    $cid=$_POST["cid"];
    $pid=$_POST["pid"];
    $quantity=$_POST["quantity"];
    $price=$_POST["price"];
    $date=$_POST["date"];
    $time=$_POST["time"];
    $connect=mysqli_connect("localhost","root","","new");
    $qeury=mysqli_query($connect,"insert into sales values('','$cid','$pid','$quantity','$price','$date','$time')");
    echo "<script>window.location.href = 'sales.php';</script>";
}
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $conn=mysqli_connect("localhost","root","","new"); 
    $qeury=mysqli_query($conn,"delete from sales where id='$id'");
    $results= $conn->query($qeury);
    if ($results) {
        echo "well sql";
    }
      else{
        echo "error ocurred in sql";
?> 
   <script>window.location.href = "sales.php";</script><?php
      }

}
?>