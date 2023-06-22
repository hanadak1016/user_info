<?php include("default.php"); ?>

<?php
	$res = pg_query('SELECT * FROM users ORDER BY id');
	if (!$res) {
		die('クエリーが失敗しました。'.pg_last_error());
	}
?>

<style>
	.card {
		max-width: 1200px;
	}
</style>

<!DOCTYPE html>
<head>
	<title>ユーザー情報一覧</title>
</head>
<body>
<?php include("header.php"); ?>

<form method="get" action="user_add_edit.php">
	<div class="card">
		<div class="card-header">
			<h5 style="display: inline">ユーザー情報一覧</h5>
			<button type="button" class="btn btn-success" onclick="location.href='user_add_edit.php'" style="float: right;">新規作成</button>
		</div>
		<div class="card-body">
			<table class="table table-striped">
				<tr><th>ID</th><th>名前</th><th>名前（ふりがな）</th><th>郵便番号</th><th>住所</th><th>電話番号</th><th>操作</th></tr>
				<?php for( $i = 0 ; $i < pg_num_rows($res) ; $i++ ): ?>
					<tr>
						<?php $user = pg_fetch_array($res, NULL, PGSQL_ASSOC); ?>
						<td><?= $user['id'] ?></td>
						<td><?= $user['name'] ?></td>
						<td><?= $user['kana'] ?></td>
						<td><?= $user['zip'] ?></td>
						<td><?= $user['address'] ?></td>
						<td><?= $user['tel'] ?></td>
						<td>
							<button type="submit" name="edit" value="<?= $user['id'] ?>" class="btn btn-success">編集</button>
							<button type="button" class="btn btn-danger">削除</button>
						</td>
					</tr>
				<?php endfor; ?>
			</table>
		</div>
	</div>
</form>
<?php include("footer.php"); ?>
