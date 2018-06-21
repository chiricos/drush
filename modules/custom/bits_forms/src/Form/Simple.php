<?php
namespace Drupal\bits_forms\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Database\Connection;
use Drupal\Core\Session\AccountInterface;
use Egulias\EmailValidator\EmailValidator;

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

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Título'),
      '#description' => $this->t('Escribe el titulo.'),
      '#required' => TRUE,
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
      '#default_value'  =>  $this->currentUser->getEmail(),
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' =>  'submit',
      '#value'  => $this->t('Enviar'),
    ];


    return $form;
  }

  public function getFormId() {
    return 'forcontu_forms_simple';
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    $title = $form_state->getValue('title');
    if (strlen($title) < 5 OR strlen($title) > 30) {
      $form_state->setErrorByName('title', $this->t('El titulo debe estar entre 5 y 30 caracteres.'));
    }

    if(ctype_upper(substr($title,0,1)) != 1){
      $form_state->setErrorByName('title', $this->t('El titulo debe comenzar con mayus.'));
    }

    $email = $form_state->getValue('user_email');
    if(!$this->emailValidator->isValid($email)) {
      $form_state->setErrorByName('user_email', $this->t('%email is not a valid email address.', ['%email' => $email]));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->database->insert('bits_forms_simple') ->fields([
      'title' => $form_state->getValue('title'),
      'username' => $form_state->getValue('username'),
      'email' => $form_state->getValue('user_email'),
      'uid' => $this->currentUser->id(),
      'ip' => \Drupal::request()->getClientIP(),
      'timestamp' => REQUEST_TIME, ])->execute();

      drupal_set_message($this->t('The form has been submitted correctly'));
      \Drupal::logger('bits_forms')->notice('New Simple Form entry from user %username inserted: %title.',
        [
        '%username' => $form_state->getValue('username'), '%title' => $form_state->getValue('title'),
        ]
      );
      $form_state->setRedirect('bits_pages.simple');


  }
}
