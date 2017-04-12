<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?= APP_NAME.(isset($page_title) ? (' - '. $page_title) : '') ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="apple-mobile-web-app-capable" content="yes" />

		<link type="text/css" rel="stylesheet" href="<?= base_url('includes/jquery/jquery-ui-1.10.3.custom/css/humanity/jquery-ui-1.10.3.custom.css') ?>" />
		<!-- <link type="text/css" rel="<?= is_dev_server() && !is_mobile() ? 'stylesheet/less' : 'stylesheet' ?>" href="<?= base_url('includes/' . (is_dev_server() && !is_mobile() ? 'css/custom-theme/custom-bootstrap.less' : 'css/styles.css')) ?>" />-->
		<link type="text/css" rel="stylesheet" href="<?= base_url('includes/css/styles.css') ?>" />
		<link type="text/css" rel="stylesheet" href="<?= base_url('includes/css/leaflet.css') ?>" />
		<link type="text/css" rel="stylesheet" href="<?= base_url('includes/css/leaflet.draw.css') ?>" />
		<!-- <link type="text/css" rel="stylesheet" href="<?= base_url('includes/css/datatables.min.css') ?>" />  -->
		<!-- <link type="text/css" rel="stylesheet" href="<?= base_url('includes/datatables/tableTools.css') ?>" /> -->

		<link type="text/css" rel="stylesheet" href="<?= base_url('includes/Datatables/DataTables-1.10.10/css/dataTables.bootstrap.min.css') ?>" />
		<link type="text/css" rel="stylesheet" href="<?= base_url('includes/Datatables/Buttons-1.1.0/css/buttons.bootstrap.min.css') ?>" />
		<link type="text/css" rel="stylesheet" href="<?= base_url('includes/Datatables/FixedHeader-3.1.0/css/fixedHeader.bootstrap.min.css') ?>" />

		<link rel='shortcut icon' href = '<?= base_url('includes/images/theme/favicon.ico') ?>' />
		<script src="<?= base_url_versioned('includes/jquery/jquery-2.1.4.min.js') ?>"></script>
		<script src="<?= base_url_versioned('includes/bootstrap/js/bootstrap.min.js') ?>"></script>
		<!-- <script src="<?= base_url_versioned('includes/bootstrap/js/bootbox.min.js') ?>"></script> -->
		<!-- <script src="<?= base_url_versioned('includes/datatables/js/jquery.dataTables.min.js') ?>"></script> -->

		<script type="text/javascript" src="<?= base_url_versioned('includes/Datatables/DataTables-1.10.10/js/jquery.dataTables.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url_versioned('includes/Datatables/DataTables-1.10.10/js/dataTables.bootstrap.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url_versioned('includes/Datatables/Buttons-1.1.0/js/dataTables.buttons.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url_versioned('includes/Datatables/Buttons-1.1.0/js/buttons.bootstrap.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url_versioned('includes/Datatables/Buttons-1.1.0/js/buttons.colVis.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url_versioned('includes/Datatables/Buttons-1.1.0/js/buttons.print.min.js') ?>"></script>
		<script type="text/javascript" src="<?= base_url_versioned('includes/Datatables/FixedHeader-3.1.0/js/dataTables.fixedHeader.min.js') ?>"></script>


		<script src="<?= base_url_versioned('includes/js/knockout-3.3.0.js') ?>"></script>
		<script src="<?= base_url_versioned('includes/js/modernizr-2.6.2.js') ?>"></script>
		<script src="<?= base_url_versioned('includes/js/numeral.min.js') ?>"></script>
		<script src="<?= base_url_versioned('includes/js/jquery.validate.min.js') ?>"></script>
		<script src="<?= base_url_versioned('includes/jquery/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js') ?>"></script>
		<script src="<?= base_url_versioned('includes/jquery/jquery.populate.js') ?>"></script>
		<script src="<?= base_url_versioned('includes/js/spin.min.js') ?>"></script>
		<script src="<?= base_url_versioned('includes/js/application.js?js') ?>"></script>
		<script src="<?= base_url_versioned('includes/js/moment.js') ?>"></script>
		<script src="<?= base_url_versioned('includes/js/leaflet.js') ?>"></script>
		<script src="<?= base_url_versioned('includes/js/Leaflet.draw.js') ?>"></script>
		<script src="<?= base_url_versioned('includes/js/typeahead.js') ?>"></script>
		<script src="<?= base_url_versioned('includes/js/tableTools.min.js') ?>"></script>
		<?php if (isset($view_model)): // Output a matching view model file, if we have one. ?>
			<script src="<?= base_url_versioned($view_model) ?>"></script>
		<?php endif; ?>
		<script>
			/* CONSTANTS */
			var base_url = '<?= base_url() ?>';
			var site_url = '<?= site_url() ?>';
			var is_dev = '<?= is_dev_server() ? 1 : 0 ?>';

			<?php if (is_dev_server()): ?>

				// Put LESS into dev mode.
				less = {env: "development", rootpath: base_url + 'includes/css/'};
			<?php endif; ?>
		</script>
		<script src="<?= base_url('includes/js/less-1.4.1.min.js') ?>"></script>
	</head>
	<body style="padding-top:70px;">


			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Wollombi June Markets</a>
					</div>
					<ul class="nav navbar-nav navbar-left">

						<li <?=$this->uri->uri_string()=='Welcome' ? 'class="active"' : '' ?>>
							<a href="<?= base_url('Welcome')?>">Home</a>
						</li>
						<li <?=$this->uri->uri_string()=='Bookings/create' ? 'class="active"' : '' ?>>
							<a href="<?= base_url('Bookings/create')?>">Bookings</a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link"><?=get_user('username')?></a></p>
					</ul>
				</div>
			</nav>


			<div class="page-body">
				<div class='page-alerts'>
					<?= print_site_messages() ?>
				</div>
				<div class="page-content">
					<div class='container'>
						
						