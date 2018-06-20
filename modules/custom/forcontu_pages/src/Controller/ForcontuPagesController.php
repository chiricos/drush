<?php
namespace Drupal\forcontu_pages\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\user\UserInterface;
use Drupal\Core\Url;
use Drupal\Core\Link;

class ForcontuPagesController extends ControllerBase
{

  public function prueba()
  {
    return array( '#markup' => '<p>' . $this->t('Hello forcontu') . '</p>',);
  }

  public function hello()
  {
    return array( '#markup' => '<p>' . $this->t('Hello forcontu') . '</p>',);
  }

  public function simple()
  {
    return array( '#markup' => '<p>' . $this->t('This is a simple page (with no arguments)') . '</p>',);
  }

  public function calculator($num1, $num2) {
    if (!is_numeric($num1) || !is_numeric($num2)) {
      throw new BadRequestHttpException(t('No numeric arguments specified.'));
    }
    $list[] = $this->t(
      "@num1 + @num2 = @sum",
        array(
          '@num1' => $num1,
          '@num2' => $num2,
          '@sum' => $num1 + $num2
        )
    );
    $list[] = $this->t(
      "@num1 - @num2 = @difference",
      array(
        '@num1' => $num1,
        '@num2' => $num2,
        '@difference' => $num1 - $num2
      )
    );
    $list[] = $this->t(
      "@num1 x @num2 = @product",
      array(
        '@num1' => $num1,
        '@num2' => $num2,
        '@product' => $num1 * $num2
      )
    );
    if ($num2 != 0)
    $list[] = $this->t(
      "@num1 / @num2 = @division",
      array(
        '@num1' => $num1,
        '@num2' => $num2,
        '@division' => $num1 / $num2
      )
    );
    else
      $list[] = $this->t("@num1 / @num2 = undefined (division by zero)", array('@num1' => $num1, '@num2' => $num2));

      $output['forcontu_pages_calculator'] = array(
        '#theme' => 'item_list',
        '#items' => $list,
        '#title' => $this->t('Operations:'),
      );
    return $output;
  }

  public function user(UserInterface $user)
  {
    $list[] = $this->t("Username: @username",
      array('@username' => $user->getAccountName()));
    $list[] = $this->t("Email: @email",
    array('@email' => $user->getEmail()));
    $list[] = $this->t('Roles:@roles',
                    array('@roles' => implode(', ',$user->getRoles())));
    $list[] = $this->t("Last accessed time: @lastaccess",
    array('@lastaccess'=> \Drupal::service('date.formatter')->format($user->getLastAccessedTime(),'short')));
    $output['forcontu_pages_user'] = array(
      '#theme'=>'item_list',
      '#items'=>$list,
      '#title'=>$this->t('User data:'),
    );
    return $output;
  }

  public function links() {
    //link to /admin/structure/blocks
    $url1 = Url::fromRoute('block.admin_display');
    $link1 = Link::fromTextAndUrl(t('Go to the Block administration page'), $url1);
    $list[] = $link1;

    //LINK
    $list[] = $this->t('This text contains a link to %enlace. Just convert it to String to use it into a text.',
    ['%enlace' => $link1->toString()]);

    //link to <front>
    $url3 = Url::fromRoute('<front>');
    $link3 = Link::fromTextAndUrl(t('Go to Front page'), $url3);
    $list[] = $link3;

    //NODE
    $url4 = Url::fromRoute('entity.node.canonical', ['node' => 1]); $link4 = Link::fromTextAndUrl(t('Link to node/1'), $url4);
    $list[] = $link4;

    //link to /node/1/edit
    $url5 = Url::fromRoute('entity.node.edit_form', ['node' => 1]); $link5 = Link::fromTextAndUrl(t('Link to edit node/1'), $url5);
    $list[] = $link5;

    //link to https://www.forcontu.com
    $url6 = Url::fromUri('https://www.forcontu.com');
    $link6 = Link::fromTextAndUrl(t('Link to www.forcontu.com'), $url6);
    $list[] = $link6;

    //link to internal css file
    $url7 = Url::fromUri('internal:/core/themes/bartik/css/layout.css'); $link7 = Link::fromTextAndUrl(t('Link to layout.css'), $url7);
    $list[] = $link7;


    //link to https://www.drupal.org with extra attributes
    $url8 = Url::fromUri('https://www.drupal.org');
    $link_options = array( 'attributes' => array(
    'class' => array( 'external-link', 'list'
    ),
    'target' => '_blank',
    'title' => 'Go to drupal.org',
    ), );
    $url8->setOptions($link_options);
    $link8 = Link::fromTextAndUrl(t('Link to drupal.org'), $url8); $list[] = $link8;

    $output['forcontu_pages_links'] = array( '#theme' => 'item_list',
    '#items' => $list,
    '#title' => $this->t('Examples of links:'),
    );
    return $output;
  }

}
