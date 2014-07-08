<?php
/**
 * @file
 * Contains \Drupal\flower\Form\FlowerDeleteForm.
 */

namespace Drupal\flower\Form;

use Drupal\Core\Entity\EntityConfirmFormBase;
use Drupal\Core\Url;

/**
 * Form that handles the removal of flower entities.
 */
class FlowerDeleteForm extends EntityConfirmFormBase {

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete this flower: @name?', array('@name' => $this->entity->name));
  }
  /**
   * {@inheritdoc}
   */
  public function getCancelRoute() {
    return new Url('flower.list');
  }
  /**
   * {@inheritdoc}
   */
  public function getConfirmText() {
    return $this->t('Delete');
  }
  /**
   * {@inheritdoc}
   */
  public function submit(array $form, array &$form_state) {

    // Delete and set message
    $this->entity->delete();
    drupal_set_message($this->t('The flower @name has been deleted.', array('@name' => $this->entity->name)));
    $form_state['redirect_route'] = $this->getCancelRoute();

  }

}