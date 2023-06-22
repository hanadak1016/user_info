<?php include("default.php"); ?>

<!DOCTYPE html>
<head>
	<title>ユーザー情報確認</title>
</head>
<body>
<?php include("header.php"); ?>

<?php
	$user = $_POST;
	if( empty($user) ){
		header("Location:error.php");
		exit();
	}
	print_r($user);
	session_start();
	$_SESSION['user'] = $user;
	print_r($_SESSION['user']);
 ?>

<form method="post" action="user_complete.php">
	<div class="card">
		<h5 class="card-header">ユーザー情報確認</h5>
		<div class="card-body">
			<p class="text-danger">以下の内容で保存します。</p>
			<table class="table table-striped">
				<tr><th>名前</th><td><?= $user['name'] ?></td></tr>
				<tr><th>名前（ふりがな）</th><td><?= $user['kana'] ?></td></tr>
				<tr><th>郵便番号</th><td><?= $user['zip1'] ?>-<?= $user['zip2'] ?></td></tr>
				<tr><th>住所</th><td><?= $user['address'] ?></td></tr>
				<tr><th>電話番号</th><td><?= $user['tel1'] ?>-<?= $user['tel2'] ?>-<?= $user['tel3'] ?></td></tr>
			</table>
			<button type="button" class="btn btn-secondary back" onclick="history.back()">戻る</button>
			<input type="submit" class="btn btn-primary submit" value="保存">
		</div>
	</div>
</form>
<?php include("footer.php"); ?>
