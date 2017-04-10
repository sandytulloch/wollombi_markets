<?php

/**
 * Same as base url but adds a custom version string at the end to control the caching expiration manually.
 */
function base_url_versioned($uri, $cache_version = APP_VERSION) {
	$cache_version = rand();
	return is_live_server() ? (base_url($uri) . '?version=' . $cache_version) : base_url($uri);
} 


/*
 * This html helper is an extension to the CodeIgniter HTML Helper.
 * This helper is specific to the Project Website Factory
 */


function generate_navigation($active_link = 'project') {
	// Here you specify the nav's sections, links and their optional icons.

	$links = array(	'Home' => array('url' => 'Welcome', 'icon' => 'glyphicon glyphicon-home', 'attr' => ''),);

		$links['Clients'] = array(
			'url' => array('url' => 'Clients/search', 'attr' => ''),
			'icon' => 'glyphicon glyphicon-user',
			'attr' => '', 
			'sub-links' => array(
			'Search' => array('url' => 'Clients/search', 'attr' => '', 'icon' => 'glyphicon glyphicon-search'),
			'Add' => array('url' => 'Clients/add', 'attr' => '', 'icon' => 'glyphicon glyphicon-plus'),
			)
		);

		$links['Internal'] = array(
			'url' => array('url' => 'Internal/search', 'attr' => ''),
			'icon' => 'glyphicon glyphicon-lock',
			'attr' => '', 
			'sub-links' => array(
			'Search' => array('url' => 'Internal/search', 'attr' => '', 'icon' => 'glyphicon glyphicon-search'),
			'Add' => array('url' => 'Internal/add', 'attr' => '', 'icon' => 'glyphicon glyphicon-plus'),
			)
		);

		$links['Administer'] = array(
			'url' => array('url' => 'Admin/', 'attr' => ''),
			'icon' => 'glyphicon glyphicon-cog',
			'attr' => '', 
		);

/*		$links['Forms'] = array(
			'url' => array('url' => 'staff/forms', 'attr' => ''),
			'icon' => 'glyphicon glyphicon-folder-open',
			'attr' => '', 
			'sub-links' => array(
			'New Employee Commencement' => array('url' => 'staff/add_new_starter', 'attr' => ''),
			'Staff Departure' => array('url' => 'staff/new_leaving_staff', 'attr' => ''),
			'Long-Term Leave' => array('url' => 'staff/new_long_term_leave', 'attr' => ''),
			'Office Transfers' => array('url' => 'staff/new_changing_office', 'attr' => ''),
			)
		);*/
	

	$CI = & get_instance();
	$active_link = $CI->uri->uri_string;
  	// Generate the actual nav item markup.
	echo '<ul class="nav site-navigation">';
	foreach($links as $link_name => $link) {	
		$text = $link_name;	
		// If an icon is specfied, insert it into the link text. Try to use a glyphicon icon.
		if (isset($link['icon']) && $link['icon']) {
			$text = "<span class='{$link['icon']}'></span> " . $text;
		}
		echo '<li class="' . ($active_link == $link['url']  ? 'active' : '') . '">';
		echo anchor($link['url'], $text, $link['attr']);
		if(isset($link['sub-links']))
		{
			$sublinks = $link['sub-links'];
			echo '<ul>';
			foreach ($sublinks as $sublink_name => $sublink) 
			{	
				$text = $sublink_name;	
				if (isset($sublink['icon']) && $sublink['icon']) {
					$text = "<span class='{$sublink['icon']}'></span> " . $text;
				} else {
					$text = "<span class='glyphicon glyphicon-arrow-right'></span> " . $text;
				}
				echo '<li class="' . ($active_link == $sublink['url']  ? 'active' : '') . '">';
				echo anchor($sublink['url'], $text, $sublink['attr']);
				echo '</li>';
			}
			echo '</ul>';
		}
		echo '<div class=\'link_bottom\'></div>';
		echo '</li>';
	}
	echo '</ul>';
}

function generate_breadcrumbs($active_name = null) {
	$uri_segments = get_instance()->uri->segment_array();
	$last = array_pop($uri_segments); // The last segment usually is some sort of ID.
	
	if (count($uri_segments) >= 2) {
		// Pop off the controller action, generally that is not useful in breadcrumbs.
		array_pop($uri_segments);
	}
	
	$uri = '';
	foreach($uri_segments as $segment) {
		$uri .= $segment . '/';
		echo "<li>" . anchor($uri, ucwords($segment)) . " <span class='divider'>/</span></li>";
	}
	
	echo "<li class='active'>" . ($active_name ? $active_name : ucwords($last)) . "</li>";
}

/* To set flash data default type is message
 * @param string $msg The message to be displayed.
 * @param string $class The bootstrap alert class: message (default) | error | info | warning
 * @param string $redirect If you want to pass in a redirect to occur as well.
 */
function set_message($msg, $type = 'message', $redirect = false) {
	if ($msg){
		get_instance()->session->set_flashdata($type, $msg);
		// dbg('yo');
	}
		
	if ($redirect)
		redirect($redirect);
}

function print_site_messages($errors = null) {
	$CI = & get_instance();
	//alert-success etc are bootstrap classes
	print_message($CI->session->flashdata('success'), 'alert-success', 'glyphicon-ok-sign');
	print_message($CI->session->flashdata('danger'), 'alert-danger', 'glyphicon-warning-sign');
	print_message($CI->session->flashdata('info'), 'alert-info', 'glyphicon-info-sign');
	print_message($CI->session->flashdata('warning', 'alert-warning', 'glyphicon-warning-sign'));
	//for codeigniter form  validation
	print_message(validation_errors());

	if ($errors && count($errors) > 0) {
		foreach ($errors as $error) {
			print_message($error, 'alert-error');
		}
	}
}

/**
 * Prints a string into a bootstrap alert-box.
 * @param string $msg The message to be displayed.
 * @param string $class The bootstrap alert class: alert-success | alert-error | alert-danger | alert-warning
 */
function print_message($msg = null, $class = 'alert-warning', $icon = null) {
	if ($msg) {
		echo "<div class='alert $class alert-dismissable'><i class='glyphicon $icon'></i> <button type='button' class='close' data-dismiss='alert'>&times;</button>$msg</div>";
	}
}

