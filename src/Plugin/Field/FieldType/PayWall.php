<?php

namespace Drupal\paywall_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Provides a field type of PayWall.
 *
 * @FieldType(
 *   id = "PayWall",
 *   label = @Translation("PayWall field"),
 *   default_widget ="PayWallWidget",
 *   default_formatter = "PayWallFormatter"
 * )
 */
class PayWall extends FieldItemBase implements FieldItemInterface {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    // $bundleFields = [];
    //    $entity_type_id = 'node';
    //    $bundle = 'article';
    //    foreach (\Drupal::entityManager()
    //               ->getFieldDefinitions($entity_type_id, $bundle) as $field_name => $field_definition) {
    //      if (!empty($field_definition->getTargetBundle())) {
    //        $bundleFields[$entity_type_id][$field_name]['type'] = $field_definition->getType();
    //        $bundleFields[$entity_type_id][$field_name]['label'] = $field_definition->getLabel();
    //
    //
    //      }
    //    }
    // $list = [];
    //    $count = 0;
    //    foreach ($bundleFields[node] as $keys => $val) {
    //      if ($bundleFields[node][$keys][type] != 'PayWall') {
    //        $count++;
    //
    //        array_push($list, $keys);
    //
    //
    //      }
    //    }.
    // Columns contains the values that the field will store.
    return [
      'columns' => [
        'message' => [
          'type' => 'text',
          'size' => 'big',
          'not null' => FALSE,
        ],
        'user' => [
          'type' => 'int',
          'length' => 4,
          'not null' => FALSE,
        ],

      ],
    ];

  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['message'] = DataDefinition::create('string')
      ->setLabel(t('Set Message'));
    $properties['user'] = DataDefinition::create('string')
      ->setLabel(t('Authenticated User'));
    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $answer = $this->get('message')->getValue();
    return $answer === NULL || $answer === '';
  }

}
