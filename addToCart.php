<?php
session_start();

if (isset($_SESSION['cart']['items'][$_GET['id']])) {
	$_SESSION['cart']['items'][$_GET['id']]['quantity']++;
}
else{
	$_SESSION['cart']['items'][$_GET['id']]=array('id'=>$_GET['id'],'quantity'=>1);
	$_SESSION['cart']['u_items'][]=$_GET['id'];
}

?>