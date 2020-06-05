<?php
require_once("DB/dbConnect.php");
$counter=0;
$GrandTotal=0;
$cname=$_GET["cname"];
global $ConnectingDB;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <h3 class="text-center">Your Cart Items</h3>
        <hr>
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Pno</th>
                <th scope="col">Product Name</th>
                <th scope="col">image</th>
                <th scope="col">Product Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Actions</th>
                <th scope="col">+ GST</th>
                <th scope="col">Discount</th>
                <th scope="col">Total Price</th>
               
              </tr>
            </thead>
            <?php
            $sql ="SELECT * FROM carttemp WHERE CoustomerName='$cname' ";

            $stmt=$ConnectingDB->query($sql);  
            
            while($DataRows=$stmt->fetch()){
                $Id         =$DataRows["id"];
                $Product_Name   =$DataRows["Pname"];
                $Price  =$DataRows["PPrice"];
                $Quantity   =$DataRows["Quantity"];
                $ProductId   =$DataRows["ProductId"];
                $GST      =$DataRows["GST"];
                $counter+=1;
                $Discount  =$DataRows["Discount"];
                $TotalPrice   =$DataRows["TotalPrice"];
                $image1      =$DataRows["image1"];
                // $GrandTotal = $TotalPrice;
                $GrandTotal+=$TotalPrice;

                // echo $Id;
                
                
            
            ?>
            <tbody>
              <tr>
                <th scope="row"><?php echo $counter; ?></th>
               
                <td><?php echo $Product_Name; ?></td>
                <td> <a href="product.php?pid=<?php echo $ProductId; ?>&cname=<?php echo $cname; ?>"><img src="img/<?php echo $image1; ?>" alt="" style="height: 60px; "></a> </td>
                <td><?php echo $Price; ?></td>
                <td><?php echo $Quantity; ?></td>
                <td>
                  <a href="deleteCartItem.php?pid=<?php echo $Id ?>&cname=<?php echo $cname; ?>" class="btn btn-danger">Remove</a>
                  <hr style="width: 20px;">
                  <a href="UpGrade.php?pid=<?php echo $Id ?>&cname=<?php echo $cname; ?>&Opration=Adding" class="btn btn-info py-8 text-white">+ </a>
                  <a href="UpGrade.php?pid=<?php echo $Id ?>&cname=<?php echo $cname; ?>&Opration=SubTracting" class="btn btn-info py-8 text-white">- </a>
                
                </td>
                <td><?php echo $GST; ?>%</td>
                <td><?php echo $Discount; ?>%</td>
                <td><?php echo $TotalPrice; ?></td>
                
              </tr>
              
            </tbody>

            <?php
            }
            ?>
          </table>
          <a href="index.php" class="btn btn-danger purchase" style="margin-left: 20px; color: aliceblue;">Cancel</a>
          <a href="#" class="btn btn-success purchase" style="color: aliceblue;">Proced To Pay</a>
          <p class="purchase">Your Total Bill: <b><?php echo $GrandTotal; ?></b></p>
          
    </div>
    
</body>
</html>