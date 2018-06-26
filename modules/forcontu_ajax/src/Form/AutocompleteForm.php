<?php

namespace Drupal\forcontu_ajax\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;	
	
class AutocompleteForm extends FormBase {

	public function getFormId() {
		return 'forcontu_ajax_autocomplete';
	}

	public function buildForm(array $form, FormStateInterface $form_state) {

		$form['user'] = array(
			'#type' => 'textfield',
			'#title' => 'Username',
			'#autocomplete_route_name' => 'forcontu_ajax.user_autocomplete',
		);

		return $form;
	}

	public function submitForm(array &$form, FormStateInterface $form_state) {
		//..
	}

}