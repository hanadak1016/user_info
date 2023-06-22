<link rel ="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
<link rel ="stylesheet" href="common.css">

<?php
	$conn = "host=13.208.77.197 dbname=user_info user=postgres password=postgres";
	$link = pg_connect($conn);
	if (!$link) {
	    die('接続失敗です。'.pg_last_error());
	}
?>
