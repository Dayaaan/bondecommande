<?php
include '../views/header.phtml';

include '../services/tools.php';
include '../services/bdcServices.php';
$orders = getOrders();
include '../views/bdc.phtml';


include '../views/footer.phtml';