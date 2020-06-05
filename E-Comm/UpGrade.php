<?php
$pId=$_GET['pid'];
$cname=$_GET['cname'];
$Opration=$_GET['Opration'];

include_once("function/function.php");
include_once("DB/dbConnect.php");


global $ConnectingDB;
$sql ="SELECT * FROM carttemp WHERE id='$pId' ";

$stmt=$ConnectingDB->query($sql);  
            
$DataRows=$stmt->fetch();  
$Quantity   =$DataRows["Quantity"];                
$GST=$DataRows["GST"];       
$Discount  =$DataRows["Discount"];
$Price   =$DataRows["PPrice"];






if ( $Opration == 'Adding' ){
    if( (int)$Quantity !== 10){
        $NewQuantity=(int)$Quantity + 1;
        $TotalPrice=(int)$NewQuantity * (int)$Price ;
        $AfterDiscount=(int)$TotalPrice-(((int)$Discount / 100) * (int)$TotalPrice);
        $AfterGST= (((int)$GST / 100) * (int)$AfterDiscount)+(int)$AfterDiscount   ;
    }else{
        Redirect_to("ViewCart.php?cname=$cname");
    }
}elseif( $Opration == 'SubTracting' ){
    if( (int)$Quantity < 1){
        Redirect_to("ViewCart.php?cname=$cname");
    }else{
        
        $NewQuantity=(int)$Quantity - 1;
        $TotalPrice=(int)$NewQuantity * (int)$Price ;
        $AfterDiscount=(int)$TotalPrice-(((int)$Discount / 100) * (int)$TotalPrice);
        $AfterGST= (((int)$GST / 100) * (int)$AfterDiscount)+(int)$AfterDiscount   ;
    }
}else{
    Redirect_to("ViewCart.php?cname=$cname");

}



$sql="UPDATE carttemp SET Quantity='$NewQuantity' , TotalPrice='$AfterGST' WHERE id=$pId AND CoustomerName='$cname' ";
$Execute=$ConnectingDB->query($sql);

Redirect_to("ViewCart.php?cname=$cname");


?>