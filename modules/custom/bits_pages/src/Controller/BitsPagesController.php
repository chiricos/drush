<?php
namespace Drupal\bits_pages\Controller;

use Drupal\Core\Controller\ControllerBase;

class BitsPagesController extends ControllerBase
{

  public function simple()
  {
    return array( '#markup' => '<p>' . $this->t('Página con mensaje simple') . '</p>',);
  }

  public function calculator($num1,$num2)
  {
    if (!is_numeric($num1) || !is_numeric($num2)) {
      throw new BadRequestHttpException(t('No numeric arguments specified.'));
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

}