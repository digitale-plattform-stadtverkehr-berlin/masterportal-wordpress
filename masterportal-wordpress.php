<?php
/*
 Plugin Name: Masterportal
 Plugin URI: https://github.com/mobility-data-hub-berlin/masterportal-wordpress
 Description: Include a Masterportal into Wordpress pages via shortcode
 Version: 1.0
 Author: Senatsverwaltung für Umwelt, Verkehr und Klimaschutz
 Author URI: https://www.berlin.de/sen/uvk/
 Text Domain: masterportal_wordpress
 License: GPLv3 or later
 License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */

/*  Copyright 2018 Kevin Taron (email : k.taron@gutwerker.de)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// No direct file access
! defined( 'ABSPATH' ) AND exit;

if (!class_exists( 'Masterportal' ) ) {
	class Masterportal {
		function __construct() {
			add_action( 'admin_menu', [$this, 'create_menu_info_page'] );
			add_shortcode( 'masterportal', [$this, 'show_masterportal']  );
		}

		function create_menu_info_page() {
			add_menu_page(
				'Masterportal',
				'Masterportal',
				'manage_options',
				'masterportal',
				[$this, 'include_config_page'],
				"dashicons-location-alt"
			);
		}

		function include_config_page() {
			include 'admin/config-info.php';
		}

		function underscoreToCamelCase($string) {
	    $str = str_replace('_', '', ucwords($string, '_'));
      $str = lcfirst($str);
	    return $str;
		}

		function get_masterportal_url_params($atts) {
			if (empty($atts)) {
				return "";
			} else {
				$params = "";
				foreach($atts as $pkey => $pVal) {
					// if ($pkey != "")
					$params .= $this->underscoreToCamelCase($pkey)."=".$pVal."&";
				}
				return "?".$params;
			}
		}

		function show_masterportal($atts) {
			if(!isset($atts['portal_name'])) { return 'Shortcode nicht korrekt konfiguriert - Parameter "portal_name" fehlt.'; }
			$portal_name = $atts['portal_name'];
			wp_enqueue_style("masterportal_css", plugins_url("public/css/masterportal.css", __FILE__));

			if(!file_exists(dirname(__FILE__)."/public/portals/$portal_name/index.html")) {
				return "Konfigurationsfehler - Portal mit dem Namen $portal_name nicht gefunden. Bitte prüfen Sie, ob der Ordner auf dem Server existiert.";
			}

			$iframe_url = plugins_url("public/portals/$portal_name/index.html", __FILE__);
			unset($atts["portal_name"]);
			$iframe_url .= $this->get_masterportal_url_params($atts);

			ob_start();
			include 'public/includes/masterportal-iframe.php';
			return ob_get_clean();
		}
	}
	$masterportal = new Masterportal();
}
