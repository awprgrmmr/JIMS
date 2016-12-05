<?php include('init.php'); ?>
<html>
<head>
	<base href="<?php rootPath(''); ?>" />
	<link rel="icon" href="<?php rootPath('assets/images/jail.ico'); ?>" type="image/x-icon" />
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="<?php rootPath('assets/js/global.js'); ?>" defer></script>
	<link href="<?php rootPath('assets/css/global.css'); ?>" rel="stylesheet">
</head>
<body <?php echo "id='$module-page'"; ?>>

<?php include('header.php'); ?>

<div id="main">
	<div class="content container clearfix">
		<?php file_exists("modules/$module.php") ? include("modules/$module.php") : include("modules/dashboard.php"); ?>
	</div>
</div>

</body>
</html>
