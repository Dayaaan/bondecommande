<?php 
include "../views/header.phtml";

include '../services/tools.php';
include '../services/bdcServices.php';


if (!isset($_GET['orderNumber'])) {
	die('Missing order Number');
}
$orderNumber = $_GET['orderNumber'];
$customer = getCustomerByOrder($orderNumber);


include "../views/order.phtml";

include "../views/footer.phtml";

