<?php

namespace Drupal\forcontu_console\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Database\Driver\mysql\Connection;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\Core\Render\Element\PathElement;

/**
 * Class SimpleForm.
 */
class SimpleForm extends FormBase {

  /**
   * Drupal\Core\Database\Driver\mysql\Connection definition.
   *
   * @var \Drupal\Core\Database\Driver\mysql\Connection
   */
  protected $database;
  /**
   * Constructs a new SimpleForm object.
   */
  public function __construct(
    Connection $database
  ) {
    $this->database = $database;
  }

  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('database')
    );
  }


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'simple_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['fecha'] = [
      '#type' => 'date',
      '#title' => $this->t('Fecha'),
      '#description' => $this->t('Fecha'),
      '#weight' => '0',
    ];

    $form['user_email'] = [
      '#type' => 'email',
      '#title' => $this->t('User email'),
      '#description' => $this->t('Your email.'),
      '#field_prefix' => '<div class="field_prefix">',
      '#field_suffix' => '</div>',
      '#prefix' => '<div class="prefix">',
      '#suffix' => '</div>',
      '#attributes' => ['class' => ['highlighted', 'forcontu']],
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    /* ===========================
    agrupacion
    ==============================*/

    $form['personal_data'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Personal Data'),
    ];

    $form['personal_data']['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First name'),
      '#required' => TRUE,
      '#size' => 40,
    ];

    $form['personal_data']['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last name'),
      '#required' => TRUE,
      '#size' => 40,
    ];


    /* ===========================
    agrupacion details desplegable
    ==============================*/

    $form['personal_data1'] = [
      '#type' => 'details',
      '#title' => $this->t('Personal Data'),
      '#description' => $this->t('Lorem ipsum dolor sit amet,consectetur adipiscing elit. '),
      '#open' => TRUE,
    ];

    $form['personal_data1']['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First name'),
      '#required' => TRUE,
      '#size' => 40,
    ];

    $form['personal_data1']['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last name'),
      '#required' => TRUE,
      '#size' => 40,
    ];

    /* ===========================
    agrupacion contenedor
    ==============================*/

    $form['personal_data2'] = [
      '#type' => 'container',
      '#title' => $this->t('Personal Data'),
    ];

    $form['personal_data2']['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First name'),
      '#required' => TRUE,
      '#size' => 40,
    ];

    $form['personal_data2']['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last name'),
      '#required' => TRUE,
      '#size' => 40,
    ];

    /* ===========================
    agrupacion contenedor
    ==============================*/

    $form['information'] = array(
      '#type' => 'vertical_tabs',
      '#default_tab' => 'access-data-group',
    );

    $form['personal_data'] = [
      '#type' => 'details',
      '#title' => $this->t('Personal Data'),
      '#description' => $this->t('Lorem ipsum dolor sit amet,
      consectetur adipiscing elit. '), '#group' => 'information',
    ];

    $form['information'] = array( '#type' => 'vertical_tabs',);

    $form['personal_data'] = [
      '#type' => 'details',
      '#title' => $this->t('Personal Data'),
      '#description' => $this->t('Lorem ipsum dolor sit amet,consectetur adipiscing elit. '),
      '#group' => 'information',
    ];

    $form['personal_data']['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First name'),
      '#required' => TRUE,
      '#size' => 40,
    ];

    $form['personal_data']['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last name'),
      '#required' => TRUE,
      '#size' => 40,
    ];

    $form['access_data'] = [
      '#type' => 'details',
      '#title' => $this->t('Access Data'),
      '#description' => $this->t('Curabitur non semper diam. Mauris faucibus eu augue vel semper.'),
      '#group' => 'information',
      '#id' => 'access-data-group',
    ];

    $form['access_data']['user_email'] = [
      '#type' => 'email',
      '#title' => $this->t('User email'),
      '#required' => TRUE,
    ];

    $form['access_data']['password'] = [
      '#type' => 'password_confirm',
      '#title' => $this->t('Password'),
      '#required' => TRUE,
    ];


    /* ===========================
    TABLA
    ==============================*/
    $form['members'] = array(
      '#type' => 'table',
      '#caption' => $this->t('Members'),
      '#header' => [$this->t('ID'), $this->t('First name'),
      $this->t('Last name')],
    );

    for ($i=1; $i<=5; $i++) {
      $form['members'][$i]['id'] = [
        '#type' => 'number',
        '#title' => $this->t('ID'),
        '#title_display' => 'invisible',
        '#size' => 3,
      ];
      $form['members'][$i]['first_name'] = [
        '#type' => 'textfield',
        '#title' => $this->t('First name'),
        '#title_display' => 'invisible',
        '#size' => 30,
      ];
      $form['members'][$i]['last_name'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Last name'),
        '#title_display' => 'invisible',
        '#size' => 30,
      ];
    }

    /////////

    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First name'),
      '#required' => TRUE,
      '#size' => 40,
      '#maxlength' => 80,
      '#default_value' => $this->t('Your first name'),
    ];

    $form['description'] = [
      '#type' => 'textarea',
      '#title' => t('Description'),
      '#cols' => 60,
      '#rows' => 5,
    ];

    $form['age'] = [
      '#type' => 'number',
      '#title' => $this->t('Age'),
    ];

    $form['comment'] = [
      '#type' => 'item',
      '#markup' => $this->t('Item element <strong>to add HTML</strong>
      into a Form.'),
    ];

    $form['pass'] = [
      '#type' => 'password',
      '#title' => t('Password'),
      '#maxlength' => 64,
      '#size' => 30,
    ];

    $form['pass'] = [
      '#type' => 'password_confirm',
      '#title' => t('Password'),
      '#maxlength' => 64,
      '#size' => 30,
    ];

    $form['tel_number'] = [
      '#type' => 'tel',
      '#title' => t('Telephone number'),
      '#maxlength' => 64,
      '#size' => 30,
    ];

    $form['body'] = [
      '#type' => 'text_format',
      '#title' => 'Body',
      '#format' => 'full_html',
    ];

    $form['entity_id'] = [
      '#type' => 'hidden',
      '#value' => $entity_id,
    ];

    $form['help'] = [
      '#title' => $this->t('Some help'),
      '#type' => 'item',
      '#markup' => $this->t('Lorem ipsum dolor sit amet,<strong>consectetur adipiscing elit</strong>. Sed enim elit, luctus nec lobortis nec, ornare et arcu. Donec urna justo, accumsan ac erat eget, porta ultrices erat. Donec et ligula elit. Integer semper tincidunt arcu gravida gravida. Nunc ac lobortis quam. Suspendisse non porttitor magna, vel laoreet nunc.'),
    ];

    /*SELECCIONAR MES*/

    $form['months'] = [
      '#type' => 'select',
      '#title' => $this->t('Month'), '#default_value' => date('n'), '#options' => [
      1 => $this->t('January'),
      2 => $this->t('February'),
      3 => $this->t('March'),
      4 => $this->t('April'),
      5 => $this->t('May'),
      6 => $this->t('June'),
      7 => $this->t('July'),
      8 => $this->t('August'),
      9 => $this->t('September'),
      10 => $this->t('October'),
      11 => $this->t('November'),
        12 => $this->t('December'),
      ],
      '#description' => t('Select month'),
    ];

    $form['colors'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Colors'),
      '#default_value' => ['red','green'],
      '#options' => [
        'red' => $this->t('Red'),
        'green' => $this->t('Green'),
        'blue' => $this->t('Blue'),
         'yellow' => $this->t('Yellow'),
      ],
      '#description' => $this->t('Select your preferred colors.'),
    ];

    $form['day'] = [
      '#type' => 'radios',
      '#title' => $this->t('Day of the week'), '#options' => [
      1 => $this->t('Monday'),
      2 => $this->t('Tuesday'),
      3 => $this->t('Wednesday'),
      4 => $this->t('Thursday'),
      5 => $this->t('Friday'),
      6 => $this->t('Saturday'),
      7 => $this->t('Sunday'),
      ],
      '#description' => $this->t('Choose the day of the week.'), '#default_value' => date('N'),
    ];

    $form['legal_notice'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Accept terms and conditions.'),
    ];

    $form['accept'] = [
      '#type' => 'radio',
      '#title' => $this->t('Accept the agreement'),
      '#default_value' => 'accept',
    ];

    $form['quantity'] = array(
      '#type' => 'range',
      '#title' => $this->t('Quantity'),
      '#min' => 0,
      '#max' => 10,
      '#description' => $this->t('Value between 0 and 10'),
    );

     /* ===========================
    TABLASELECT
    ==============================*/

    $header = [
      'uid' => $this->t('User ID'),
      'first_name' => $this->t('First Name'),
      'last_name' => $this->t('Last Name'),
    ];

    $options = [
      1 => [
        'uid' => 1,
        'first_name' => 'Fran',
        'last_name' => 'Gil'
      ],
      2 => [
        'uid' => 2,
        'first_name' => 'Laura',
        'last_name' => 'Fornié'
      ],
      3 => [
        'uid' => 3,
        'first_name' => 'Mark',
        'last_name' => 'Gil'
      ],
    ];

    $form['users'] = [
      '#type' => 'tableselect',
      '#type' => 'tableselect',
      '#header' =>  $header,
      '#option' =>  $options,
      '#empty'  =>  $this->t('No user Fount'),
    ];

    /*
    FECHAS
    */

    $form['event'] = [
      '#type' => 'datelist',
      '#title' => $this->t('Event date'),
    ];

    $form['event_DATE'] = [
      '#type' => 'datelist',
      '#title' => $this->t('Event dateS'),
      '#date_part_order' => ['year', 'month', 'day', 'hour', 'minute', 'second'], '#date_year_range' => '2010:2025',
      '#date_increment' => 15,
      '#default_value' => new DrupalDateTime('2021-01-13 17:15:00'),
    ];

    $form['date'] = array(
      '#type' => 'datetime',
      '#title' => $this->t('Meeting date'), '#size' => 20,
    );

    $form['date'] = array(
      '#type' => 'datetime',
      '#title' => $this->t('Meeting date'), '#date_date_element' => 'date',
      '#date_time_element' => 'none',
      '#default_value' => new DrupalDateTime('2021-01-13'), '#date_year_range' => '2010:+3',
    );

    $form['guardar'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    );

    $form['actions'] = [
      '#type' => 'actions',
    ];

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#type' => 'submit',
    ];

    $form['actions']['preview'] = array(
      '#type' => 'button',
      '#value' => $this->t('Preview'),
    );

    $form['actions']['submit_image'] = [
      '#type' => 'image_button',
      '#value' => $this->t('Image button'),
      '#name' => 'submit_image',
      '#src' => 'core/misc/icons/787878/cog.svg',
    ];

    $form['color'] = [
      '#type' => 'color',
      '#title' => $this->t('Color'),
      '#default_value' => '#ffffff',
    ];

    $form['file_upload'] = array(
      '#type' => 'file',
      '#title' => t('Upload a file'),
    );

    $form['weight'] = array(
      '#type' => 'weight',
      '#title' => $this->t('Weight'), '#default_value' => 0,
      '#delta' => 10,
    );

    $form['path'] = array(
      '#type' => 'path',
      '#title' => $this->t('Enter a path'), '#convert_path' => PathElement::CONVERT_ROUTE,
      );

    /*
    editar nombre de sistema
    */

    $form['element_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Element name'),
    ];
    $form['element_machine_name'] = [
      '#type' => 'machine_name',
      '#description' => $this->t('A unique name for this item. It must only contain lowercase letters, numbers, and underscores.'),
      '#machine_name' => [
        'source' => ['element_name'],
      ],
    ];

    $form['author'] = [
      '#type' => 'entity_autocomplete',
      '#target_type' => 'user',
      '#title' => $this->t('Author'),
      '#description' => $this->t('Enter the username'),
    ];

    $form['search'] = [
      '#type' => 'search',
      '#title' => $this->t('Search'),
    ];


    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }

  }

}
