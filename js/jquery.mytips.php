<?php

/**
 * Disable error reporting
*
* Set this to error_reporting( E_ALL ) or error_reporting( E_ALL | E_STRICT ) for debugging
*/
//error_reporting(0);

/** Set ABSPATH for execution */
//define( 'ABSPATH', dirname(dirname(__FILE__)) . '/' );
//define( 'WPINC', 'wp-includes' );

/**
 * @ignore
 */
function __() {
}

/**
 * @ignore
 */
function _x() {
}

/**
 * @ignore
 */
function add_filter() {
}

/**
 * @ignore
 */
function esc_attr() {
}

/**
 * @ignore
 */
function apply_filters() {
}

/**
 * @ignore
 */
function get_option() {
}

/**
 * @ignore
 */
function is_lighttpd_before_150() {
}

/**
 * @ignore
 */
function add_action() {
}

/**
 * @ignore
 */
function did_action() {
}

/**
 * @ignore
 */
function do_action_ref_array() {
}

/**
 * @ignore
 */
function get_bloginfo() {
}

/**
 * @ignore
 */
function is_admin() {
	return true;
}

/**
 * @ignore
 */
function site_url() {
}

/**
 * @ignore
 */
function admin_url() {
}

/**
 * @ignore
 */
function home_url() {
}

/**
 * @ignore
 */
function includes_url() {
}

/**
 * @ignore
 */
function wp_guess_url() {
}

if ( ! function_exists( 'json_encode' ) ) :
/**
 * @ignore
*/
function json_encode() {
}
endif;

require_once 'mytips-class.php';

$options=unserialize($_GET['load']);
$ready='if(typeof($)=="undefined")$=jQuery;
jQuery(document).ready(function(){
%s
});';
$script='';

foreach ($options['attr'] as $attrc)
{
	$stri='';
	if($attrc['et']=='true'&&strlen($attrc['title'])>0)$stri=sprintf(MyTips::MYTIPS_JS_TITLE,$attrc['title']);
	$stri=sprintf(MyTips::MYTIPS_JS_MAIN,$attrc['label'],$attrc['content'],$attrc['content'],$stri,$options['arrow'],$options['position'],$options['style']);
	$script.=$stri."\n";
}


$expires_offset = 31536000;
header('Content-Type: application/x-javascript; charset=UTF-8');
header('Expires: ' . gmdate( "D, d M Y H:i:s", time() + $expires_offset ) . ' GMT');
header("Cache-Control: public, max-age=$expires_offset");
echo sprintf($ready,$script);
exit;