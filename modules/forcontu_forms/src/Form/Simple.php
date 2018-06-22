<?php
namespace Drupal\forcontu_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Database\Connection;
use Drupal\Core\Session\AccountInterface;
use Egulias\EmailValidator\EmailValidator;
use Drupal\Core\Access\AccessResult;

class Simple extends FormBase {

  protected $database;
  protected $currentUser;
  protected $emailValidator;

  public function __construct(Connection $database,AccountInterface $current_user, EmailValidator $email_validator) {
    $this->database = $database;
    $this->currentUser = $current_user;
    $this->emailValidator = $email_validator;
  }
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database'),
      $container->get('current_user'),
      $container->get('email.validator')
    );
  }

  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['foo']['#access'] = TRUE; // Se muestra
    $form['bar']['#access'] = FALSE; // No se muestra
    $form['foo']['#access'] =$this->currentUser()->hasPermission('administer image styles');
    $form['bar']['#access'] = $this->currentUser()->isAnonymous();
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t('The title must be at least 5characters long.'),
      '#required' => TRUE,
    ];

    $form['color'] = [
      '#type' => 'select',
      '#title' => $this->t('Color'), '#options' => [
        0 => $this->t('Black'),
        1 => $this->t('Red'),
        2 => $this->t('Blue'),
        3 => $this->t('Green'),
        4 => $this->t('Orange'),
        5 => $this->t('White'),
      ],
      '#default_value' => 2,
      '#description' => $this->t('Choose a color.'),
    ];

    $form['actions'] = [
      '#type' => 'actions',
      ];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    $form['username'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Username'),
      '#description' => $this->t('Your username.'),
      '#default_value' => $this->currentUser->getAccountName(),
      '#required' => TRUE,
    ];

    $form['user_email'] = [
      '#type' => 'email',
      '#title' => $this->t('User email'),
      '#description' => $this->t('Your email.'),
      //'#access_callback' => ['\Drupal\forcontu_forms\Form\Simple','checkEmailAccess'],
      ];



    return $form;
  }

  public function getFormId() {
    return 'forcontu_forms_simple';
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    $title = $form_state->getValue('title');
    if (strlen($title) < 5) {
      $form_state->setErrorByName('title', $this->t('The title must be at least 5 characters long.'));
    }

    $email = $form_state->getValue('user_email');
    if(!$this->emailValidator->isValid($email)) {
      $form_state->setErrorByName('user_email', $this->t('%email is not a valid email address.', ['%email' => $email]));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->database->insert('forcontu_forms_simple') ->fields([
      'title' => $form_state->getValue('title'),
      'color' => $form_state->getValue('color'),
      'username' => $form_state->getValue('username'),
      'email' => $form_state->getValue('user_email'),
      'uid' => $this->currentUser->id(),
      'ip' => \Drupal::request()->getClientIP(),
      'timestamp' => REQUEST_TIME, ])->execute();

      drupal_set_message($this->t('The form has been submitted correctly'));
      \Drupal::logger('forcontu_forms')->notice('New Simple Form entry from user %username inserted: %title.',
        [
        '%username' => $form_state->getValue('username'), '%title' => $form_state->getValue('title'),
        ]
      );
      $form_state->setRedirect('forcontu_pages.simple');

  }

  public function access(AccountInterface $account) {
    return AccessResult::allowedIf($account->hasPermission('forcontu form access') && $account->hasPermission('administer site configuration'));
  }

  public function checkEmailAccess($element) {
    $currentUser = \Drupal::currentUser();
    return ($currentUser->id() != 1) && $currentUser->hasPermission('forcontu form access');
  }

}
