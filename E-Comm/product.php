<?php

require_once("DB/dbConnect.php");

$pid=$_GET["pid"];
$cname=$_GET["cname"];

global $ConnectingDB;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
      <h3 class="text-center">Product Details</h3>
        <hr>



        <div class="row">


            <?php
            
            $sql ="SELECT * FROM productdetails WHERE ProductId='$pid' ";

            $stmt=$ConnectingDB->query($sql); 
            
          
            while($DataRows=$stmt->fetch()){
                $Id         =$DataRows["id"];
                $Product_Name   =$DataRows["pName"];
                $Price  =$DataRows["price"];
                $image1   =$DataRows["img1"];
                $image2   =$DataRows["img2"];
                $image3   =$DataRows["img3"];
                $Available      =$DataRows["Availability"];
                $Condition   =$DataRows["Condition"];
                $Brand   =$DataRows["brand"];
                $Quantity   =$DataRows["Quantity"];
                $ProductCode   =$DataRows["ProductCode"];
                $Product_Id=$DataRows["ProductId"];
               
                
            
            ?>

            <div class="col-md-5">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="img/<?php echo $image1; ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="img/<?php echo $image2; ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="img/<?php echo $image3; ?>" class="d-block w-100" alt="...">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
              </div>

            </div>
            <div class="col-md-7">
                <p class="newArrival text-center"><?php echo $Condition; ?></p>
                <h2><?php echo $Product_Name; ?></h2>
                <p>Product Code: <b><?php echo $ProductCode; ?></b></p>
                <p class="price">Price: <?php echo $Price; ?> </p>
                <p><b>Availability :</b> <?php echo $Available; ?></p>
                <p><b>Condition :</b> <?php echo $Condition; ?></p>
                <p><b>Brand :</b> <?php echo $Brand; ?></p>
                <label for=""> Quantity: </label>
                <input class="quantity" type="number" id="quantity" value="1" required min="1" max="10">
                <br>
                <button onclick="AddToCart()" class="btn btn-warning" >Add To Cart</button>
                <button onclick="buyNow()" class="btn btn-success">BUY NOW</button>
                
                <a href="index.php" class="btn btn-info" >GO BACK</a>
            

            </div>

            <?php  
          }
           ?>

          <a href="ViewCart.php?cname=<?php echo $cname; ?>">
            <span class="d-inline-block gotocart" tabindex="0" data-toggle="tooltip" title="View Your Cart Item">
                <i class="fa fa-shopping-cart" style="pointer-events: none;" type="button" disabled></i>
            </span>
          </a>
        </div>

    </div>
    <script src="main.js">
        
    </script>
    <script>
      
        function buyNow(){   
          var inputVal = document.getElementById("quantity").value;
            window.location.href="insertIntoCart.php?pid=<?php echo $pid;  ?>&cname=<?php echo $cname; ?>&quantity="+inputVal+"&page=buyNow";
        }
        function AddToCart(){
          var inputVal = document.getElementById("quantity").value;
            window.location.href="insertIntoCart.php?pid=<?php echo $pid;  ?>&quantity="+inputVal+"&page=product&cname=<?php echo $cname; ?>";
             
         }
    </script>
    
</body>
</html>