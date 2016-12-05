<?php include('init.php'); ?>
<html>
<head>
	<base href="<?php echo "$base/"; ?>" />
	<link rel="icon" href="assets/images/jail.ico" type="image/x-icon" />
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="assets/js/global.js" defer></script>
	<link href="assets/css/global.css" rel="stylesheet">
</head>
<body <?php echo "id='$module-page'"; ?>>

<?php if ($module == 'login') : include("modules/login.php"); else : ?>

	<?php include('header.php'); ?>
	<div class="container clearfix">
		<?php file_exists("modules/$module.php") ? include("modules/$module.php") : include("modules/dashboard.php"); ?>
	</div>

<?php endif; ?>

</body>
</html>
