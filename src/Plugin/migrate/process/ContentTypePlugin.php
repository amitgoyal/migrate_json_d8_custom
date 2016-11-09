<?php

/**
 * @file
 * Contains \Drupal\migrate_json_d8_custom\Plugin\migrate\process\ContentTypePlugin.
 */

namespace Drupal\migrate_json_d8_custom\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * Defines content type name based on Path.
 *
 * @MigrateProcessPlugin(
 *   id = "content_type_plugin"
 * )
 */
class ContentTypePlugin extends ProcessPluginBase {

  /**
   * {@inheritdoc}
   */
  public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
    $path = $value;
    $ct = $this->get_content_type_name_for_path($path);

    return $ct;
  }

  /**
   * Returns content type name for a given path.
   */
  public function get_content_type_name_for_path($path) {
    $ct_paths = array(
      'http://www.example2.com' => 'article',
      'http://www.example3.com' => 'article',
    );

    if (isset($ct_paths[$path])) {
      return $ct_paths[$path];
    }
    else {
      return 'page';
    }
  }

}
