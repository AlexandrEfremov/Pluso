<?php
/**
 * Classes for Pluso for Wiki extension
 *
 * @file
 * @ingroup Extensions
 */
class Pluso {
    public static function onBeforePageDisplay(OutputPage $out, Skin $skin) {
        // Some code...

        $out->addModules('ext.Pluso');
    }
	/* Function for article header toolbar */
	public static function onArticleViewHeader( &$article, &$outputDone, &$pcache ) {
		global $wgOut, $wgPlusoHeader, $wgPlusoMain, $wgPlusoBackgroundHeader, $wgPlusoThemeHeader, $wgPlusoServicesHeader, $wgPlusoOptionsHeader;
		
		# Check if page is in content namespace and the setting to enable/disable article header tooblar either on the main page or at all
		if ( !MWNamespace::isContent( $article->getTitle()->getNamespace() )
			|| !$wgPlusoHeader
			|| ( $article->getTitle()->equals( Title::newMainPage() ) && !$wgPlusoMain )
		) {
			return true;
		}
		
		$wgOut->setIndicators(['pluso'=>'<div class="pluso" data-background="'.$wgPlusoBackgroundHeader.'" data-options="'.implode(",", $wgPlusoOptionsHeader).',theme='.$wgPlusoThemeHeader.'" data-services="'.$wgPlusoServicesHeader.'"></div>']);
	}

	/* Function for sidebar*/
	public static function onSkinBuildSidebar( $skin, &$bar ) {
		global $wgOut, $wgPlusoSidebar, $wgPlusoBackgroundSidebar, $wgPlusoThemeSidebar, $wgPlusoServicesSidebar,$wgPlusoOptionsSidebar;
		
		# Check setting to enable/disable sidebar portlet
		if ( !$wgPlusoSidebar ) {
			return true;
		}
		$bar['pluso'][] = [
			'text'            => 'pluso',
			'href'            => '#',
			'title'           => 'pluso',
			'id'              => 'pluso',
			'link-class'      => 'pluso',
			'data-background' => $wgPlusoBackgroundSidebar,
			'data-options'    => implode(",", $wgPlusoOptionsSidebar).',theme='.$wgPlusoThemeSidebar,
			'data-services'   => $wgPlusoServicesSidebar
		];
	}
}
