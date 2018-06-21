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

}
