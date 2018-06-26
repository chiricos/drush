<?php

namespace Drupal\forcontu_ajax\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ForcontuAjaxAutocompleteController extends ControllerBase {

	public function userAutocomplete(Request $request) {
		$string = $request->query->get('q');
		$users = [ 'admin', 'foo', 'foobar', 'foobaz' ,'bits'];
		$matches = preg_grep("/$string/i", $users);
		return new JsonResponse(array_values($matches));
	}

}