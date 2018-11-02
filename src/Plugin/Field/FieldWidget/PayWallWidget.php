<?php

namespace Drupal\paywall_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Field\WidgetInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * A widget PayWall.
 *
 * @FieldWidget(
 *   id = "PayWallWidget",
 *   label = @Translation("PayWall Widget"),
 *   field_types = {
 *     "PayWall",
 *     "string"
 *   }
 * )
 */
class PayWallWidget extends WidgetBase implements WidgetInterface {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [

      'size' => 60,
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {

    $values = $items[$delta]->getValue();

    $widget_message = $element;
    $widget_user = $element;
    $widget_message['#delta'] = $delta;
    $widget_user['#delta'] = $delta;

    $widget_message = [
      '#type' => 'textarea',
      '#title' => 'Enter Message to replace with fields',
      '#description' => 'Enter your message',
      '#size' => 'big',
      '#default_value' => $values['message'],

    ];

    $widget_user = [
      '#type' => 'checkbox',
      '#title' => t('Authenticated User'),
      '#description' => t('Set this checkbox active'),
      '#default_value' => $values['user'],
      // '#element_validate' => [
      //        [$this, 'validate'],
      //      ],.
      '#suffix' => '<div class="field-field_user"></div>',
      '#attributes' => ['class' => ['edit-field-field-user']],
    ];

    return ['user' => $widget_user, 'message' => $widget_message];
  }

}
