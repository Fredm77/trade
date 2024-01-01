<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Tab Website</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS for the vertical tab website -->
    <style>
        .vertical-tabs {
            border-right: 1px solid #ddd;
        }
        .vertical-tabs .nav-link {
            border: none;
            border-radius: 0;
            padding: 10px;
            text-align: left;
        }
        .vertical-tabs .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }

    </style>
</head>
<body>
  <div class="row">
    <div class="col-md-12 bg-success text-warning" style="padding:15px;box-shadow: 0 0 30px 0px rgba(0, 0, 0, 0.562);
">Accounting Information</div>
  </div>
    <div class="">
        <div class="row">
            <div class="col-md-3">
                <!-- Vertical Tab Menu -->
                <div class="nav flex-column vertical-tabs" id="myTab" role="tablist" style="
      box-shadow: 0 0 30px 0px rgba(0, 0, 0, 0.562);padding-top:50px;" aria-orientation="vertical">
                    <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#customers" role="tab" aria-controls="tab1" aria-selected="true">Customers</a>
                    <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#product" role="tab" aria-controls="tab2" aria-selected="false">Product</a>
                    <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#vendors" role="tab" aria-controls="tab3" aria-selected="false">Vendors</a>
                </div>
            </div>
            <div class="col-md-9 ">
                <!-- Tab Content -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="customers" role="tabpanel" aria-labelledby="tab1-tab">
                        <div class="row">
                            <div class="col-md-12 bg-info"> </div>
                        </div>
                    <div class="row">
                        <div class="col-md-4">
                        <h2>Customers</h2>
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
                        </div>
                        <div class="col-md-8">
                        <table class="table-sm table-striped bg-info" style="margin-right:0;">
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
                    <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="tab2-tab">
                        <h2>Product</h2>
                        ,<div class="row">
                            <div class="col-md-4">
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
                            </div>

                            <div class="col-md-8">
                            <table class="table-sm table-striped bg-info">
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
                        </div>
                       
                            </div>
                    </div>   

                        
               
                    </div>
                    <div class="tab-pane fade" id="vendors" role="tabpanel" aria-labelledby="tab3-tab">
                        <h2>Vendors</h2>
                        <div class="row">
                            <div class="col-md-4">
                            <div class="form">
            <form action="venders.php" method="post">
                <label for="">First name:<br><input type="text" size="30" class="entry" name="firstName"></label><br>
                <label for="">Last name:<br><input type="text" size="30" class="entry" name="lastName"></label><br>
                  <label for="">Gender:<br><input type="text" size="30" class="entry" name="gender"></label><br>
                <label for="">Phone:<br><input type="text" size="30" class="entry" name="phone"></label><br>
                <label for="">Address:<br><input type="text" size="30" class="entry" name="address"></label><br>
                <input type="submit" value="Save" class="save" name="save">
            </form>
        </div>
                            </div>
                            <div class="col-md-8">
                            <table class="table-sm table-striped bg-info">
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                
                                <th>Phone</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                            <?php
                           $connect=mysqli_connect("localhost","root","","new");
                           $qeury=mysqli_query($connect,"select * from venders");
                           while($data=mysqli_fetch_array($qeury))
                           {
                          
                          ?>
                            <tr>
                            <td><?php echo $data['v_id']?></td>
                            <td><?php echo $data['v_fname']?></td>
                            <td><?php echo $data['v_lname']?></td>
                            <td><?php echo $data['v_phone']?></td>
                          
                            <td><?php echo $data['v_gender']?></td>
                            <td><?php echo $data['addres']?></td>
                            <td> <a href="venders.php?id=<?php echo $data["v_id"]  ?>"><button type="button" name="delete" class="btn btn-outline-danger btn-sm">delete</button> </a></td>
                        </tr>
                          <?php } ?>
                    </table>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
