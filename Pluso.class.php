<?php
/**
 * Classes for Pluso for Wiki extension
 *
 * @file
 * @ingroup Extensions
 */
class Pluso {
	/* Function for article header toolbar */
	public static function PlusoHeader( &$article, &$outputDone, &$pcache ) {
		global $wgOut, $wgPlusoUserID, $wgPlusoHeader, $wgPlusoMain, $wgPlusoBackgroundHeader, $wgPlusoThemeHeader, $wgPlusoServicesHeader, $wgPlusoOptionsHeader;
		
		# Check if page is in content namespace and the setting to enable/disable article header tooblar either on the main page or at all
		if ( !MWNamespace::isContent( $article->getTitle()->getNamespace() )
			|| !$wgPlusoHeader
			|| ( $article->getTitle()->equals( Title::newMainPage() ) && !$wgPlusoMain )
		) {
			return true;
		}
		$wgOut->setIndicators([
			'pluso'=>'<div class="pluso" data-user="'.$wgPlusoUserID.'" data-background="'.$wgPlusoBackgroundHeader.'" data-options="'.implode(",", $wgPlusoOptionsHeader).',theme='.$wgPlusoThemeHeader.'" data-services="'.$wgPlusoServicesHeader.'"></div>'
		]);
		$wgOut->addHTML('
			<script type="text/javascript">(function() {
				if (window.pluso)if (typeof window.pluso.start == "function") return;
				if (window.ifpluso==undefined) { window.ifpluso = 1;
					var d = document, s = d.createElement(\'script\'), g = \'getElementsByTagName\';
					s.type = \'text/javascript\'; s.charset=\'UTF-8\'; s.async = true;
					s.src = (\'https:\' == window.location.protocol ? \'https\' : \'http\')  + \'://share.pluso.ru/pluso-like.js\';
					var h=d[g](\'body\')[0];
					h.appendChild(s);
			}})();</script>
		');
		
		return true;
	}

	/* Function for sidebar*/
	public static function PlusoSidebar( $skin, &$bar ) {
		global $wgOut, $wgPlusoUserID, $wgPlusoSidebar, $wgPlusoBackgroundSidebar, $wgPlusoThemeSidebar, $wgPlusoServicesSidebar,$wgPlusoOptionsSidebar;

		# Load css stylesheet
		$wgOut->addModuleStyles( 'ext.plusohis' );

		# Check setting to enable/disable sidebar portlet
		if ( !$wgPlusoSidebar ) {
			return true;
		}

		# Output Pluso in sidebar
		$bar['pluso'] = '
			<script type="text/javascript">(function() {
				if (window.pluso)if (typeof window.pluso.start == "function") return;
				if (window.ifpluso==undefined) { window.ifpluso = 1;
					var d = document, s = d.createElement(\'script\'), g = \'getElementsByTagName\';
					s.type = \'text/javascript\'; s.charset=\'UTF-8\'; s.async = true;
					s.src = (\'https:\' == window.location.protocol ? \'https\' : \'http\')  + \'://share.pluso.ru/pluso-like.js\';
					var h=d[g](\'body\')[0];
					h.appendChild(s);
			}})();</script>
			<div data-user="'.$wgPlusoUserID.'" class="pluso" data-background="'.$wgPlusoBackgroundSidebar.'" data-options="'.implode(",", $wgPlusoOptionsSidebar).',theme='.$wgPlusoThemeSidebar.'" data-services="'.$wgPlusoServicesSidebar.'"></div>';
		return true;
	}
}
