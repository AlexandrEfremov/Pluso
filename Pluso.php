<?php
/**
 * Pluso extension
 *
 * @file
 * @ingroup Extensions
 * @author Alexandr Efremov
 * @copyright Copyright © 2016, Alexandr Efremov
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 * @version 0.3
 */
if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'Pluso' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['Pluso'] = __DIR__ . '/i18n';
	wfWarn(
		'Deprecated PHP entry point used for Editcount extension. Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	);
	return;
} else {
	die( 'This version of the Editcount extension requires MediaWiki 1.25+' );
}
