<?php include("default.php"); ?>

<!DOCTYPE html>
<head>
	<title>エラー</title>
</head>
<body>
<?php include("header.php"); ?>

<form method="post" action="index.php">
	<div class="card">
		<h5 class="card-header">エラー</h5>
		<div class="card-body">
			<p class="text-danger">処理に失敗しました。</p>
			<p class="text-danger">再度処理を行ってください。</p>
			<input type="submit" class="btn btn-secondary submit" value="TOPに戻る">
		</div>
	</div>
</form>
<?php include("footer.php"); ?>
