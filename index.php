<?php
// get what we need
require_once('controller/StatusController.php');
require_once('core/Status.php');
require_once('core/View.php');

// send $_GET and $_POST as $request to controller
$request = array_merge($_GET, $_POST);
$controller = new StatusController($request);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>MariaDB MaxScale Status</title>

<!-- jQuery -->
<script type="text/javascript" src="lib/jquery/jquery-2.1.4.min.js"></script>

<!-- Bootstrap -->
<link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="lib/bootstrap/css/bootstrap-theme.min.css">
<script src="lib/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
<h1>MariaDB MaxScale Status</h1>
<!-- display template data -->
<?php
echo $controller->indexAction();
?>
</body>
</html>
