<?php
                    $conn=mysqli_connect("localhost","root","","new");   
                     $id= $_GET['id'];
                   
                   
                     $my_q ="delete from venders  WHERE `v_id` ='$id'";
                     $results= $conn->query($my_q);
                     
                     if ($results) {
                     


                       echo '<script>alert("Well deleted")</script>';
                       echo "<script>window.location='./venders.php'</script>";
                 
                       
                     } 
                     mysqli_close($conn);
                   
                  
             ?>