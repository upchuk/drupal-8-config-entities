<?php
/**
 * @file
 *
 * Contains Drupal\flower\FlowerListBuilder
 */

namespace Drupal\flower;

use Drupal\Core\Config\Entity\ConfigEntityListBuilder;
use Drupal\Core\Entity\EntityInterface;


class FlowerListBuilder extends ConfigEntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['label'] = $this->t('Name');
    $header['color'] = $this->t('Color');
    $header['petals'] = $this->t('Number of petals');
    $header['season'] = $this->t('Season');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {

    // Label
    $row['label'] = $this->getLabel($entity);

    // Color
    $row['color'] = $entity->color;

    // Petals
    $row['petals'] = $entity->petals;

    // Season
    $row['season'] = $entity->season;

    return $row + parent::buildRow($entity);
  }

  /**
   * {@inheritdoc}
   */
  public function render() {

    $build = parent::render();

    $build['#empty'] = $this->t('There are no flowers available.');
    return $build;
  }

} 