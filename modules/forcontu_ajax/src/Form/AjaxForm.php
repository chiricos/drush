<?php
namespace Drupal\forcontu_ajax\Form; 

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface; 
class AjaxForm extends FormBase {

	private $colors = [
		'warm' => [
				'red' => 'Red', 
				'orange' => 'Orange', 
				'yellow' => 'Yellow',
			],
		'cool' => [
				'blue' => 'Blue', 
				'purple' => 'Purple', 
				'green' => 'Green',
			], 
		];

	public function buildForm(array $form, FormStateInterface $form_state) {

		$form['temperature'] = [
			'#title' => $this->t('Temperature'),
			'#type' => 'select',
			'#options' => ['warm' => 'Warm', 'cool' => 'Cool'],
			'#empty_option' => $this->t('-select'),
			'#ajax' => [
				'callback' => '::colorCallback',
				'wrapper' => 'color-wrapper',
			],
		];

		// Desactivar la caché de formulario
		$form_state->setCached(FALSE);

		$form['color_wrapper'] = [
			'#type' => 'container',
			'#attributes' => ['id' => 'color-wrapper'],
		];

		$form['actions'] = [
			'#type' => 'actions',
		];

		$form['actions']['submit'] = [
			'#type' => 'submit',
			'#value' => $this->t('Submit'),
		];

		return $form;
	}

	public function getFormId() { 
		return 'forcontu_ajax_ajax_form';
	}

	public function colorCallback(array &$form, FormStateInterface $form_state) {
		$temperature = $form_state->getValue('temperature');
		$form['color_wrapper']['color'] = [
			'#type' => 'select',
			'#title' => $this->t('Color'),
			'#options' => $this->colors[$temperature],
		];
		return $form['color_wrapper']; 
	}

	public function submitForm(array &$form, FormStateInterface $form_state) { }
 
}
