<?php /**
 * Plugin Name: Masterportal
 */

// No direct file access
! defined( 'ABSPATH' ) AND exit;

add_shortcode( 'masterportal', 'show_masterportal'  );

function show_masterportal($atts) {
    if(!isset($atts['application'])) { return 'Shortcode nicht korrekt konfiguriert - Parameter "application" fehlt.'; }
    
    $application = $atts['application'];

	$iframe_url = plugins_url("public/portals/$application/index.html", __FILE__);
    if(isset($atts['layer_ids'])) {
		$iframe_url .= "?layerIds=";
		$iframe_url .= $atts['layer_ids'];
	}


	ob_start();
	include 'public/includes/masterportal-iframe.php';
	return ob_get_clean();
}