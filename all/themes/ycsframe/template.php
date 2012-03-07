<?php

//function ycsframe_node__home_page_banner($variables) {
//    $mybanner = "";
//    //print "<p>Got to here</p>";
//    //print dsm($variables);
//    //dprint_r($variables);
//    //print $variables['field_banner_caption'];
//    $mybanner .= "<div style=top:".$variables['field_caption_top'][0]['value']."\">";
//    $mybanner .= $variables['field_banner_caption'][0]['value'];
//      //$mybanner = $variables['field_banner_caption'][0]['value'];
//      //print $variables['field_home_banner_image'][0]['value'];
//    $mybanner .= "</div>";
//      return $mybanner;
//    
//}

function ycsframe_preprocess_block(&$variables){
    $variables['my_theme'] = base_path() . drupal_get_path('theme', 'ycsframe');
}

function ycsframe_preprocess_page(&$vars, $hook) {
  if (isset($vars['node'])) {
  // If the node type is "blog" the template suggestion will be "page--blog.tpl.php".
   $vars['theme_hook_suggestions'][] = 'page__'. str_replace('_', '--', $vars['node']->type);
  }
}

function ycsframe_menu_tree__main_menu($variables) {
  return '<ul class="menu container_12">' . $variables['tree'] . '</ul>';
}

function ycsframe_menu_tree__menu_block__1($variables) {
  return '<ul class="menu">' . $variables['tree'] . '</ul>';
}

function ycsframe_menu_link(array $variables) {
  $element = $variables['element'];
  if($element['#original_link']['depth'] == '1') {
        $element['#attributes']['class'][] = 'alpha'; 
  }
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output  . "</li>\n";
}

function ycsframe_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    $breadcrumb[] = drupal_get_title();
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' » ', $breadcrumb) . '</div>';
    return $output;
  }
}

