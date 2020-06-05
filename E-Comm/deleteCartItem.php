<?php
$pId=$_GET['pid'];
$cname=$_GET['cname'];

include_once("function/function.php");
include_once("DB/dbConnect.php");

$sql="DELETE FROM carttemp WHERE id=$pId ";
$Execute=$ConnectingDB->query($sql);
var_dump($sql);
Redirect_to("ViewCart.php?cname=$cname");


// if($sql = TRUE){
//     Redirect_to("");
// }else{
//     Redirect_to("index.php");   
// }

?>