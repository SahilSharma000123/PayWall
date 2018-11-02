<?php

namespace Drupal\paywall_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'Password_field' formatter.
 *
 * @FieldFormatter(
 *   id = "PayWallFormatter",
 *   label = @Translation("PayWall text"),
 *   field_types = {
 *     "Random"
 *   }
 * )
 */
class PayWallFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];
    foreach ($items as $delta => $item) {
      // Render each element as markup.
      //      print_r($items[$delta]);.
      $element[$delta] = ['#markup' => $item->value];
    }
    if ($element[0]['#markup'] != NULL) {

      $element[0]['#markup'] = '<span>' . '*******' . '</span>';

    }

    return $element;
  }

}
