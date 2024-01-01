<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <style>
    h1{
        text-align: center;
        padding-top: 170px;
    }
    body{
            margin: 0;
            padding: 0;
            font-family: montserrat;
            background: linear-gradient(120deg,blue,purple);
            height: 100vh;
            overflow: hidden;
        }
   </style>
</head>
<body>
    <h1>Log In Successfully<br><?php
     $name=$_SESSION["name"];
     $phone=$_SESSION['phone']; 
    $connect=mysqli_connect("localhost","root","","new");
        $q=mysqli_query($connect,"select * from customers where customers.c_fname='$name' and customers.c_phone='$phone'");
        $row=mysqli_fetch_array($q);
        if(isset($row)){
                 echo "Hello {$_SESSION["name"]} {$row['c_lname']}"."<br>";
                 echo "Your address is {$row['c_address']}"."<br>";
                 echo "Your gender is {$row['c_gender']}"."<br>";
                 echo "Your Phone Number is {$row['c_phone']}"."<br>";
                }
    ?></h1>
    
</body>
</html>
<?php
// include "index.php";
// if(isset($_POST['name'])&&isset($_POST['phone'])){
//     $name=($_POST['name']);
//     $phone=($_POST['phone']); 
//     $connect=mysqli_connect("localhost","root","","new");
//     $q=mysqli_query($connect,"select * from customers where customers.c_fname='$name' and customers.c_phone='$phone'");
//     $row=mysqli_fetch_array($q);
//    //  echo $row["customer_id"]."<br>";
//    //  echo $row["c_fname"]."<br>";
//    //  echo $row["c_lname"]."<br>";
//    //  echo $row["c_address"]."<br>";
//    //  echo $row["c_gender"]."<br>";
//    //  echo $row["c_phone"]."<br>";
//     if(isset($row)){
//      echo "Hello {$row['c_lname']}";
//     }
//    }
?>