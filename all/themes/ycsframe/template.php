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
