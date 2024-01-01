<?php
if(isset($_POST['name'])&&isset($_POST['phone'])){
    $name=($_POST['name']);
    $phone=($_POST['phone']); 
    $connect=mysqli_connect("localhost","root","","new");
    $q=mysqli_query($connect,"select * from customers where customers.c_fname='$name' and customers.c_phone='$phone'");
    $row=mysqli_fetch_array($q);
   // //  echo $row["customer_id"]."<br>";
   // //  echo $row["c_fname"]."<br>";
   // //  echo $row["c_lname"]."<br>";
   // //  echo $row["c_address"]."<br>";
   // //  echo $row["c_gender"]."<br>";
   // //  echo $row["c_phone"]."<br>";
   //  if(isset($row)){
   //   echo "Hello {$row['c_lname']}";
   //  }
   }
   if(isset($_POST["login"])){
       header("Location:login.php");
   }
session_start();
@$_SESSION['name']=$name;
@$_SESSION["phone"]=$phone;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>login</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            font-family: montserrat;
            background: linear-gradient(120deg,blue,purple);
            height: 100vh;
            overflow: hidden;
        }
        .center{
            position: absolute;
            top: 50%;
            left: 50%;
            transform:translate(-50%,-50%);
            width: 400px;
            background: white;
            border-radius: 10px;
        }
        .center h1{
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px  solid silver;
        } 
        .center form{
            padding: 0 40px;
            box-sizing: border-box;

        }
        form .txt-field{
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }
        .txt-field input{
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }
        .txt-field label{
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: .5s;
        }
        .txt-field span::before{
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0%;
            height: 2px;
            background: #2691d9;
            transition: .5s;
        }
        .txt-field input:focus ~label,
        .txt-field input:valid ~label{
            top: -5px;
            color: #2691d9;
        }
        .txt-field input:focus ~span::before,
    .txt-field input:valid ~span::before{
        width: 100%;
    }
    .pass{
        text-align: center;
    }
    .login{
        color: white;
        background-color: #2691d9;
        background-size: 200px;
        border-radius: 25px;
        border: none;
        padding: 3px 130px;
        font-size: 30px;
        margin: 10px -5px;

    }
    .signup-link a{
        text-decoration: none;
        margin: 0 0 18px;
    }
    .signup-link{
      padding: 10px;
      text-align: center;
      padding-bottom: 12px;
    }
    </style>
</head>
<body>
    <div class="center">
        <h1>Customers Login</h1>
        <form method="post" action="index.php">
           <div class="txt-field">
            <input type="text" name="name" required>
            <span></span>
            <label >Username</label>
           </div>
           <div class="txt-field">
            <input type="text" name="phone" required>
            <span></span>
            <label >Phone</label>
           </div>
           <div class="pass">Forgot Phone number?</div>
           <input type="submit" value="Login" name="login" class="login">
           <div class="signup-link">
            Do you have an account?<a href="#">Sign Up</a>
           </div>
        </form>
    </div>
</body>
</html>
<?php
if(isset($_POST['name'])&&isset($_POST['phone'])){
 $name=($_POST['name']);
 $phone=($_POST['phone']); 
 $connect=mysqli_connect("localhost","root","","new");
 $q=mysqli_query($connect,"select * from customers where customers.c_fname='$name' and customers.c_phone='$phone'");
 $row=mysqli_fetch_array($q);
// //  echo $row["customer_id"]."<br>";
// //  echo $row["c_fname"]."<br>";
// //  echo $row["c_lname"]."<br>";
// //  echo $row["c_address"]."<br>";
// //  echo $row["c_gender"]."<br>";
// //  echo $row["c_phone"]."<br>";
//  if(isset($row)){
//   echo "Hello {$row['c_lname']}";
//  }
}
if(isset($_POST["login"])){
    header("Location:login.php");
}
?>