<?php
namespace Drupal\bits_pages\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\user\UserInterface;

class BitsPagesController extends ControllerBase
{

  protected $currentUser;

  public function __construct(AccountInterface $current_user)
  {
    $this->currentUser = $current_user;
  }

  public static function create(ContainerInterface $container)
  {
    return new static(
      $container->get('current_user')
    );
  }

  public function simple()
  {
    return array( '#markup' => '<p>' . $this->t('Página con mensaje simple') . '</p>',);
  }

  public function calculator($num1,$num2)
  {
    if (!is_numeric($num1) || !is_numeric($num2)) {
      throw new BadRequestHttpException(t('No numeric arguments specified.'));
    }

    if($this->currentUser->hasPermission('administer nodes')){
      $list[] = $this->t("Permiso: @permition",
        array('@permition' => 'Tiene permisos administer nodes' )
      );
    }else{
      $list[] = $this->t("Permiso: @permition",
        array('@permition' => 'not tiene permisos')
      );
    }

    $list[] = ['#markup'  =>  'Suma:'];
    $list[] = $this->t("@num1 + @num2 = @num3",
                        [
                          '@num1' =>  $num1,
                          '@num2' =>  $num2,
                          '@num3' =>  $num1 + $num2
                        ]
    );

    $list[] = ['#markup'  =>  'Resta:'];
    $list[] = $this->t("@num1 - @num2 = @num3",
                        [
                          '@num1' =>  $num1,
                          '@num2' =>  $num2,
                          '@num3' =>  $num1 - $num2
                        ]
    );

    if($num2 == 0){
      $division ='No se puede dividir por 0';
    }else{
      $division = $num1 / $num2;
    }
    $list[] = ['#markup'  =>  'División:'];
    $list[] = $this->t("@num1 / @num2 = @num3",
                        [
                          '@num1' =>  $num1,
                          '@num2' =>  $num2,
                          '@num3' =>  $division
                        ]
    );

    $list[] = ['#markup'  =>  'Multiplicación:'];
    $list[] = $this->t("@num1 * @num2 = @num3",
      [
        '@num1' =>  $num1,
        '@num2' =>  $num2,
        '@num3' =>  $num1 * $num2
      ]
    );

      $output['calculator'] = array(
        '#theme' => 'item_list',
        '#items' => $list,
        '#title' => [
          '#markup' => '<h1>'.$this->t('Operations:').'</h1>'
        ]
      );
    return $output;
  }

  public function links()
  {

    $todayh = getdate();
    $list[] = [
      'Fecha actual: @fecha',
      [
        '@fecha'=>\Drupal::service('date.formatter')->format($this->currentUser->getLastAccessedTime(),'html_datetime')
        /*,'@fecha1'=>$this->currentUser->getLastAccessedTime()*/
      ]
    ];

    $url1 = Url::fromRoute('block.admin_display');
    $link1 = Link::fromTextAndUrl(t('Administración de bloques'), $url1);
    $list[] = $link1;

    $url1 = Url::fromRoute('system.admin_content');
    $link1 = Link::fromTextAndUrl(t('Administración de contenidos'), $url1);
    $list[] = $link1;

    $url1 = Url::fromRoute('entity.user.collection');
    $link1 = Link::fromTextAndUrl(t('Administración de usuarios'), $url1);
    $list[] = $link1;

    $url1 = Url::fromRoute('<front>');
    $link1 = Link::fromTextAndUrl(t('Inicio'), $url1);
    $list[] = $link1;

    $url1 = Url::fromRoute('entity.node.canonical', ['node' => 1]);
    $link1 = Link::fromTextAndUrl(t('Nodo 1'), $url1);
    $list[] = $link1;

    $url1 = Url::fromRoute('entity.node.edit_form', ['node' => 1]);
    $link1 = Link::fromTextAndUrl(t('Editar Nodo 1'), $url1);
    $list[] = $link1;

    $url8 = Url::fromUri('https://www.google.com');
    $link_options = array( 'attributes' => array(
    'class' => array( 'external-link', 'list'
    ),
    'target' => '_blank',
    'title' => 'Ir a google.com',
    ), );
    $url8->setOptions($link_options);
    $link8 = Link::fromTextAndUrl(t('Ir a google'), $url8); $list[] = $link8;

    $output['links'] = [
      '#theme'  =>  'item_list',
      '#items'  =>  $list,
      '#title'  =>  $this->t('Enlaces')
    ];

    return $output;
  }

  public function user(UserInterface $user)
  {
    if(count($user)>0){
      $list[] = $this->t("Username: @username",
      array('@username' => $user->getAccountName()));
      $list[] = $this->t("Email: @email",
      array('@email' => $user->getEmail()));
      $list[] = $this->t('Roles:@roles',
                      array('@roles' => implode(', ',$user->getRoles())));
      $list[] = $this->t("Last accessed time: @lastaccess",
      array('@lastaccess'=> \Drupal::service('date.formatter')->format($user->getLastAccessedTime(),'short')));
      $output['pages_user'] = array(
        '#theme'=>'item_list',
        '#items'=>$list,
        '#title'=>$this->t('User data:'),
      );
      return $output;
    }else{
      return ['#markup'=>'No existe el usuario'];
    }


  }

}