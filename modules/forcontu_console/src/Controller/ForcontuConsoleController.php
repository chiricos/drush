<?php

namespace Drupal\forcontu_console\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\Core\Database\Driver\mysql\Connection;

/**
 * Class ForcontuConsoleController.
 */
class ForcontuConsoleController extends ControllerBase {

  /**
   * Drupal\Core\Session\AccountProxyInterface definition.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;
  /**
   * Drupal\Core\Database\Driver\mysql\Connection definition.
   *
   * @var \Drupal\Core\Database\Driver\mysql\Connection
   */
  protected $database;

  /**
   * Constructs a new ForcontuConsoleController object.
   */
  public function __construct(AccountProxyInterface $current_user, Connection $database) {
    $this->currentUser = $current_user;
    $this->database = $database;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('current_user'),
      $container->get('database')
    );
  }

  /**
   * Consolepage.
   *
   * @return string
   *   Return Hello string.
   */
  public function consolePage() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: consolePage')
    ];
  }

  protected function getEditableConfigNames() {
    return [
    'forcontu_console.config', ];
    }

  public function getFormId() {
    return 'forcontu_config_form';
  }


  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('forcontu_console.config');
    $form['colors'] = [
    '#type' => 'checkboxes',
    '#title' => $this->t('Colors'),
    '#options' =>
      array(
        'Red' => $this->t('Red'),
        'Blue' => $this->t('Blue'),
        'Green' => $this->t('Green'),
        'Yellow' => $this->t('Yellow'),
      ),
    '#default_value' => $config->get('colors'),
    ];
    return parent::buildForm($form, $form_state);
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    $this->config('forcontu_console.config') ->set('colors', $form_state->getValue('colors')) ->save();
    }


}
