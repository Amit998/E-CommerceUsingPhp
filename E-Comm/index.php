<?php
require_once("DB/dbConnect.php");
$cname='ADMIN';
global $ConnectingDB;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.js" integrity="sha256-kiFgik3ybDpn1VOoXqQiaSNcpp0v9HQZFIhTgw1c6i0=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <h3 class="text-center">Product Listing Website</h3>
        <hr>

       

        <div class="row">
            <?php
            $sql ="SELECT * FROM productlisting ORDER BY id desc";
            $stmt=$ConnectingDB->query($sql);  
            while($DataRows=$stmt->fetch()){
                $Id         =$DataRows["id"];
                $Product_Name   =$DataRows["PName"];
                $Price  =$DataRows["Price"];
                $image   =$DataRows["img"];
                $pid      =$DataRows["pId"];
                
                
            
            ?>

           
                <div class="col-md-4 product-grid" >
                    <div class="image">
                        <a href="product.php?pid=<?php echo $pid; ?>&cname=<?php echo $cname ;?>">
                            <img src="img/<?php echo $image; ?>" alt="" class="w-100">
                            
                            <div class="overlay">
                                <div class="detail"><span class="">VIEW DETAILS</span></div>
                            </div>
                        </a>
                    </div>
                    <h4 class="text-center"><?php echo $Product_Name; ?></h4>
                    <h5 class="text-center">Price: <b><?php echo $Price; ?></b></h5>
                    <a href="insertIntoCart.php?pid=<?php echo $pid;  ?>&cname=<?php echo $cname; ?>&quantity=1&page=index" type="submit" class="btn cartBtn" id="addToCart" >ADD TO CART</a>
                    <a href="insertIntoCart.php?pid=<?php echo $pid;  ?>&cname=<?php echo $cname; ?>&quantity=1&page=buyNow" class="btn buy">BUY</a>
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
    <script src="main.js">
    
    
</body>
</html>