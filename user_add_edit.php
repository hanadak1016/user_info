<?php include("default.php"); ?>

<?php
	print_r($_GET);
	$id = (!empty($_GET['edit']) ? $_GET['edit'] : '');
	$title = (!empty($id) ? '編集' : '新規登録');

	if( !empty($id) ){
		$res = pg_query("SELECT * FROM users WHERE id = {$id}");
		if (!$res) {
			die('クエリーが失敗しました。'.pg_last_error());
		}
		$user = pg_fetch_assoc( $res, 0 );
		$zip = explode('-', $user['zip']);
		$tel = explode('-', $user['tel']);
	}
?>

<style>
.zip, .tel{
	display: inline;
	width: 65px;
}
</style>

<!DOCTYPE html>
<head>
	<title>ユーザー情報<?= $title ?></title>
</head>
<body>
<?php include("header.php"); ?>

<form method="post" action="user_confirm.php">
	<div class="card">
		<h5 class="card-header">ユーザー情報<?= $title ?></h5>
		<div class="card-body">
			<input type="hidden" id="id" name="id" value="<?= $id ?>">
			<label for="name">名前</label>
			<input type="text" id="name" name="name" value="<?= !empty($user['name']) ? $user['name'] : '' ?>" class="form-control">
			<label for="kana">名前（ふりがな）</label>
			<input type="text" id="kana" name="kana" value="<?= !empty($user['kana']) ? $user['kana'] : '' ?>" class="form-control">
			<label for="zip1">郵便番号</label>
			<input type="text" id="zip1" name="zip1" value="<?= !empty($zip[0]) ? $zip[0] : '' ?>" class="form-control zip">
			<span>－</span>
			<input type="text" id="zip2" name="zip2" value="<?= !empty($zip[1]) ? $zip[1] : '' ?>" class="form-control zip">
			<label for="add">住所</label>
			<input type="text" id="address" name="address" value="<?= !empty($user['address']) ? $user['address'] : '' ?>" class="form-control">
			<label for="tel1">電話番号</label>
			<input type="text" id="tel1" name="tel1" value="<?= !empty($tel[0]) ? $tel[0] : '' ?>" class="form-control tel">
			<span>－</span>
			<input type="text" id="tel2" name="tel2" value="<?= !empty($tel[1]) ? $tel[1] : '' ?>" class="form-control tel">
			<span>－</span>
			<input type="text" id="tel3" name="tel3" value="<?= !empty($tel[2]) ? $tel[2] : '' ?>" class="form-control tel">
			<input type="submit" class="btn btn-primary submit" value="確認">
		</div>
	</div>
</form>
<?php include("footer.php"); ?>
