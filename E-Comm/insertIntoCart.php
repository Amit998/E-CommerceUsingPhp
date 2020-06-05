<?php

require_once("DB/dbConnect.php");
require_once("function/function.php");

$pid=$_GET["pid"];
$Quantity=$_GET["quantity"];
$cname=$_GET["cname"];
$page=$_GET["page"];

global $ConnectingDB;
$CoustomerName=$_GET["cname"];;
$CustomerId   ='109210';
$PurchaseId   ='random';


$sql ="SELECT * FROM productdetails WHERE ProductId='$pid'  ";

$stmt=$ConnectingDB->query($sql); 

            
$DataRows=$stmt->fetch();
$Id         =$DataRows["id"];
$Product_Name   =$DataRows["pName"];
$Price  =$DataRows["price"];
$GST   =$DataRows["GST"];
$Discount   =$DataRows["Discount"];


$Brand   =$DataRows["brand"];
$image1   =$DataRows["img1"];

$TotalPrice=(int)$Quantity * (int)$Price ;
$AfterDiscount=(int)$TotalPrice-(((int)$Discount / 100) * (int)$TotalPrice);
$AfterGST= (((int)$GST / 100) * (int)$AfterDiscount)+(int)$AfterDiscount   ;





$sql ="INSERT INTO carttemp(Pname,PPrice,Quantity,GST,Discount,TotalPrice,CoustomerName,ProductId,CustomerId,PurchaseId,image1) VALUES (:Product_Name,:Price,:Quantity,:GST,:Discount,:TotalPrice,:CoustomerName,:pid,:CustomerId,:PurchaseId,:image1)";

$stmt=$ConnectingDB->prepare($sql);
$stmt->bindValue(':Product_Name',$Product_Name);
$stmt->bindValue(':Price',$Price);
$stmt->bindValue(':Quantity',$Quantity);
$stmt->bindValue(':GST',$GST);
$stmt->bindValue(':Discount',$Discount);
$stmt->bindValue(':TotalPrice',$AfterGST);

$stmt->bindValue(':CoustomerName',$CoustomerName);
$stmt->bindValue(':pid',$pid);
$stmt->bindValue(':CustomerId',$CustomerId);

$stmt->bindValue(':PurchaseId',$PurchaseId);
$stmt->bindValue(':image1',$image1);
$Execute=$stmt->execute();


if($Execute){
    if( $page == 'index' ){
        Redirect_to("index.php");
    }elseif( $page== "product" ){
        Redirect_to("product.php?pid=$pid&cname=$cname");
    }elseif( $page== 'buyNow' ){
        Redirect_to("ViewCart.php?cname=$cname");
    }
}else{
    Redirect_to("index.php");   
}



?>