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
        .selec{
            border: 1px solid rgb(73, 124, 235);
            text-align: center;
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 10px;
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
        /* .btn{
           border: 2px solid darkred;
            color: darkred;
            font-size: 1.2em;
            padding: 2px 30px;
            text-decoration: none;
        }
        .btn:hover{
            background: darkred;
            color: white ;
        } */
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
            <form action="customers.php" method="post">
                <label for="">First name:<br><input type="text" size="30" class="entry" name="firstName"></label><br>
                <label for="">Last name:<br><input type="text" size="30" class="entry" name="lastName"></label><br>
                <label for="">Address:<br><input type="text" size="30" class="entry" name="address"></label><br>
                <label for="">Gender:<br><input type="text" size="30" class="entry" name="gender"></label><br>
                <label for="">Phone:<br><input type="text" size="30" class="entry" name="phone"></label><br>
                <input type="submit" value="Save" class="save" name="save">
            </form>
        </div>
        <div class="table">
            <h4>Customers table</h4>
                    <table border="1" cellpadding="7" cellspacing="0">
                            <tr>
                                <th>Customer_id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                           <?php
                           $connect=mysqli_connect("localhost","root","","new");
                           $qeury=mysqli_query($connect,"select * from customers");
                           while($data=mysqli_fetch_array($qeury))
                           {
                          
                          ?>
                            <tr>
                            <td><?php echo $data['customer_id']?></td>
                            <td><?php echo $data['c_fname']?></td>
                            <td><?php echo $data['c_lname']?></td>
                            <td><?php echo $data['c_address']?></td>
                            <td><?php echo $data['c_gender']?></td>
                            <td><?php echo $data['c_phone']?></td>
                            <td> <a href="customers.php?id=<?php echo $data["customer_id"]  ?>" ><button type="button" name="delete" class="btn btn-outline-danger btn-sm">delete</button> </a></td>
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
    $fname=$_POST["firstName"];
    $lname=$_POST["lastName"];
    $adress=$_POST["address"];
    $gender=$_POST["gender"];
    $phone=$_POST["phone"];
    $connect=mysqli_connect("localhost","root","","new");
    $qeury=mysqli_query($connect,"insert into customers values('','$fname','$lname','$adress','$gender','$phone')");
    echo "<script>window.location.href = 'customers.php';</script>";
}
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $conn=mysqli_connect("localhost","root","","new"); 
    $qeury=mysqli_query($conn,"delete from customers where customer_id='$id'");
    $results= $conn->query($qeury);
    if ($results) {
        echo "well sql";
    }
      else{
        echo "error ocurred in sql";
?> 
   <script>window.location.href = "customers.php";</script><?php
      }

}

?>