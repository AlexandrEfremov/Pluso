<?php
/**
 * Pluso extension
 *
 * @file
 * @ingroup Extensions
 *
 * @author Alexandr Efremov
 * @license GPL v2 or later
 * @version 2.1.0
 */
// Check environment
if ( !defined( 'MEDIAWIKI' ) ) {
	echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
	die( -1 );
}
/* Configuration */
/*All*/
$wgPlusoUserID				= '';
/*Sidebar*/
$wgPlusoSidebar				= true;
$wgPlusoBackgroundSidebar	= 'transparent';
$wgPlusoThemeSidebar		= '04';
$wgPlusoServicesSidebar		= 'vkontakte,odnoklassniki,facebook,twitter,google,moimir';
/*Header*/
$wgPlusoHeader				= true;
$wgPlusoMain				= false;
$wgPlusoBackgroundHeader	= 'transparent';
$wgPlusoThemeHeader			= '08';
$wgPlusoServicesHeader		= "vkontakte,odnoklassniki,facebook,twitter,google,moimir";
/* Credits */
$wgExtensionCredits['social'][] = array(
	'path'           => __FILE__,
	'name'           => 'Pluso',
	'version'        => '0.0.1',
	'author'         => '[https://www.mediawiki.org/wiki/User:Alexandr_Efremov Alexandr Efremov]',
	'description'    => 'Добавляет [http://www.pluso.ru Pluso социальные кнопки] в правое меню и заголовок страницы',
	'descriptionmsg' => 'pluso-desc',
	'url'            => 'https://www.mediawiki.org/wiki/Extension:Pluso',
);
// Shortcut to this extension directory
$dir = dirname( __FILE__ ) . '/';
// Internationalization
$wgMessagesDirs['Pluso'] = $dir . '/i18n';
$wgExtensionMessagesFiles['Pluso'] = $dir . 'Pluso.i18n.php';
// Register auto load for the special page class
$wgAutoloadClasses['Pluso'] = $dir . 'Pluso.classes.php';
// Register parser hook
$wgHooks['ArticleViewHeader'][] = 'Pluso::PlusoHeader';
$wgHooks['SkinBuildSidebar'][] = 'Pluso::PlusoSidebar';
