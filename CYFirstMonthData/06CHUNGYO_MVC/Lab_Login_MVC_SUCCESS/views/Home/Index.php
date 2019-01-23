<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab</title>
<?php require("views/script_css.php") ?>
</head>
<body>
	<div id="labPage" data-role="page" data-theme="d">
		<?php include("views/header.php"); ?>
		
		<div data-role="content">
			<h3>Hello! <?php echo $_SESSION["userId"]; ?> </h3>
			<ol data-role="listview" data-inset="true">
				<li data-role="list-divider">Lab說明</li>
				<li>先點按 Login</li>
				<li>再試 Member 頁面
				<?php if(isset($_SESSION["userId"])) :?>
					<?php echo "OK";?>
				<?php else : ?>
					<?php echo "Not OK";?>
				<?php endif; ?></li>
			</ol>
		</div>

	</div>
	<!-- page -->

</body>
</html>
