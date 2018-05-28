<?php

function getConnection() {
	$bdd = new PDO('mysql:host=localhost;dbname=classicmodels;charset=utf8', 'root', 'troiswa', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$bdd->exec('SET NAMES UTF8');
	return $bdd;
}

function getOrders() {
	$bdd = getConnection();
	$statement = $bdd->prepare('SELECT * FROM orders');
	$statement->execute();
	$order = $statement->fetchAll();
	return $order;
}
function getProductByOrderNumber($orderNumber) {
	$bdd = getConnection();
	$sql = "SELECT productName, priceEach, quantityOrdered FROM orderdetails JOIN products ON products.productCode = orderdetails.productCode WHERE orderNumber = '$orderNumber'";
	$statement = $bdd->prepare($sql);
	$statement->execute();
	$product = $statement->fetchAll();
	return $product;
}

function getCustomerByOrder($orderNumber) {

	$bdd = getConnection();
	$sql = "SELECT customerName, contactLastName, contactFirstName, addressLine1,orderNumber, city FROM customers JOIN orders ON orders.customerNumber = customers.customerNumber WHERE orderNumber = '$orderNumber'";
	$statement = $bdd->prepare($sql);
	$statement->execute();
	$customers = $statement->fetchAll();
	return $customers;
}

function sumTotalHT($orderNumber) {
	$bdd = getConnection();
	$sql = "SELECT SUM(quantityOrdered*priceEach) FROM orderdetails WHERE orderNumber = $orderNumber";
	$statement = $bdd->prepare($sql);
	$statement->execute();
	$result = $statement->fetchColumn(0);
	return $result;
}
