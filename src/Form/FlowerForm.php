<?php

/**
 * @file
 * Contains \Drupal\flower\Form\FlowerForm.
 */

namespace Drupal\flower\Form;

use Drupal\Core\Entity\EntityForm;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Url;

/**
 * Class FlowerForm
 *
 * Form class for adding/editing flower config entities.
 */
class FlowerForm extends EntityForm {

   /**
   * {@inheritdoc}
   */
  public function form(array $form, array &$form_state) {

    $form = parent::form($form, $form_state);

    $flower = $this->entity;

    // Change page title for the edit operation
    if ($this->operation == 'edit') {
      $form['#title'] = $this->t('Edit flower: @name', array('@name' => $flower->name));
    }

    // The flower name.
    $form['name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#maxlength' => 255,
      '#default_value' => $flower->name,
      '#description' => $this->t("Flower name."),
      '#required' => TRUE,
    );

    // The unique machine name of the flower.
    $form['id'] = array(
      '#type' => 'machine_name',
      '#maxlength' => EntityTypeInterface::BUNDLE_MAX_LENGTH,
      '#default_value' => $flower->id,
      '#disabled' => !$flower->isNew(),
      '#machine_name' => array(
        'source' => array('name'),
        'exists' => 'flower_load'
      ),
    );

    // The flower color.
    $form['color'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Color'),
      '#maxlength' => 255,
      '#default_value' => $flower->color,
      '#description' => $this->t("Flower color."),
      '#required' => TRUE,
    );

    // The number of petals.
    $form['petals'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Petals'),
      '#maxlength' => 255,
      '#default_value' => $flower->petals,
      '#description' => $this->t("The number of petals."),
      '#required' => TRUE,
    );

    // The season.
    $form['season'] = array(
      '#type' => 'select',
      '#options' => array(
        'Spring' => 'Spring',
        'Summer' => 'Summer',
        'Automn' => 'Automn',
        'Witer' => 'Winter'
      ),
      '#title' => $this->t('Season'),
      '#maxlength' => 255,
      '#default_value' => $flower->season,
      '#description' => $this->t("The season in which this flower grows."),
      '#required' => TRUE,
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, array &$form_state) {

    $flower = $this->entity;

    $status = $flower->save();

    if ($status) {
      // Setting the success message.
      drupal_set_message($this->t('Saved the flower: @label.', array(
        '@label' => $flower->name,
      )));
    }
    else {
      drupal_set_message($this->t('The @label flower was not saved.', array(
        '@label' => $flower->name,
      )));
    }

    $url = new Url('flower.list');
    $form_state['redirect'] = $url->toString();

  }

} 