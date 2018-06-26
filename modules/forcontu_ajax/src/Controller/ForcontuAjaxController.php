<?php

namespace Drupal\forcontu_ajax\Controller;

use Drupal\Core\Controller\ControllerBase; 
use Drupal\Core\Url;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;

class ForcontuAjaxController extends ControllerBase { 

	public function link() {
		$build['text'] = [
			'#markup' => '<p>' . $this->t('Click the link to get the updated time from server.') . '</p>', 
		];
		$build['time'] = [ 
			'#type' => 'html_tag', 
			'#tag' => 'div',
			'#value' => date("H:i:s"),
			'#attributes' => [
				  'id' => 'time',
			],
		];
		$build['refresh_time'] = [
			'#title' => $this->t('Refresh time'),
			'#type' => 'link',
			'#url' => Url::fromRoute('forcontu_ajax.link_callback'), 
			'#attributes' => [
				'class' => 'use-ajax', ],
			];
		return $build; 
	}

	public function linkCallback() {
		$response = new AjaxResponse(); $response->addCommand(new ReplaceCommand(
			'#time',
			'<div id="time">' . date("H:i:s") . ' (' . $this->t("viaAJAX") . ')</div>')); 
		return $response;
	}

}