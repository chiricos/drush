<?php
namespace Drupal\forcontu_jquery\Controller;

use Drupal\Core\Controller\ControllerBase;

class ForcontuJqueryController extends ControllerBase{

  public function fadeout() {
    $build['temp_text'] = [
      '#markup' => '
      <label>
        <input type="radio" name="weekday" value="Monday" />'.$this->t('Monday').'
      </label>
      <label>
        <input type="radio" name="weekday" value="Tuesday" />'.$this->t('Tuesday').'
      </label>
      <label>
        <input type="radio" name="weekday" value="Wednesday" />'.$this->t('Wednesday').'
      </label>'
    ];
    $build['temp_text'] = [
      '#type' => 'html_tag', '#tag' => 'p', '#attributes' => [
      'class' => 'fadeout', ],
      '#value' => $this->t('This text will disappear in 5 seconds...'), '#attached' => [
      'library' => [ 'forcontu_jquery/forcontu_jquery.fadeout',],
      ],
    ];
    return $build;
  }

}