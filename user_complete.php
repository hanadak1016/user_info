<?php include("default.php"); ?>

<?php
	session_start();
	if( !isset($_SESSION['user']) ){
		header("Location:error.php");
		exit();
	}
	$user = $_SESSION['user'];
	unset($_SESSION['user']);
print_r($user);
echo "<br>";

	if( empty($user['id']) ){
		//新規登録
		$sql  = <<<EOF
			INSERT INTO users
			(
				name
				,kana
				,zip
				,address
				,tel
			) VALUES (
				'{$user['name']}'
				,'{$user['kana']}'
				,'{$user['zip1']}-{$user['zip2']}'
				,'{$user['address']}'
				,'{$user['tel1']}-{$user['tel2']}-{$user['tel3']}'
			)
		EOF;
	}else{
		//編集
		$sql  = <<<EOF
			UPDATE users SET
			(
				name
				,kana
				,zip
				,address
				,tel
			) = (
				'{$user['name']}'
				,'{$user['kana']}'
				,'{$user['zip1']}-{$user['zip2']}'
				,'{$user['address']}'
				,'{$user['tel1']}-{$user['tel2']}-{$user['tel3']}'
			)
			WHERE id = {$user['id']}
		EOF;
	}
print_r($sql);
	$result_flag = pg_query($sql);
	if( !$result_flag ){
		die('クエリーが失敗しました。'.pg_last_error());
	}
?>

<!DOCTYPE html>
<head>
	<title>ユーザー情報保存完了</title>
</head>
<body>
<?php include("header.php"); ?>

<form method="post" action="index.php">
	<div class="card">
		<h5 class="card-header">ユーザー情報保存完了</h5>
		<div class="card-body">
			<p class="text-danger">ユーザー情報の保存が完了しました。</p>
			<input type="submit" class="btn btn-secondary submit" value="TOPに戻る">
		</div>
	</div>
</form>
<?php include("footer.php"); ?>
