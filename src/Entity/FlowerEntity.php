<?php
/**
 * @file
 * Contains \Drupal\flower\Entity\FlowerEntity.
 */

namespace Drupal\flower\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;
use Drupal\Core\Config\Entity\ConfigEntityInterface;
use Drupal\flower\FlowerInterface;

/**
 * Defines a Flower configuration entity class.
 *
 * @ConfigEntityType(
 *   id = "flower",
 *   label = @Translation("Flower"),
 *   fieldable = FALSE,
 *   controllers = {
 *     "list_builder" = "Drupal\flower\FlowerListBuilder",
 *     "form" = {
 *       "add" = "Drupal\flower\Form\FlowerForm",
 *       "edit" = "Drupal\flower\Form\FlowerForm",
 *       "delete" = "Drupal\flower\Form\FlowerDeleteForm"
 *     }
 *   },
 *   config_prefix = "flower",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name"
 *   },
 *   links = {
 *     "edit-form" = "entity.flower.edit_form",
 *     "delete-form" = "entity.flower.delete_form"
 *   }
 * )
 */
class FlowerEntity extends ConfigEntityBase implements FlowerInterface {
  /**
   * The ID of the flower.
   *
   * @var string
   */
  public $id;

  /**
   * The flower name.
   *
   * @var string
   */
  public $name;

  /**
   * The flower color.
   *
   * @var string
   */
  public $color;

  /**
   * The number of petals.
   *
   * @var int
   */
  public $petals;

  /**
   * The season in which this flower can be found.
   *
   * @var string
   */
  public $season;

}







