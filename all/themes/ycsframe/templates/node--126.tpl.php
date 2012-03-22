<?php
      $query = drupal_get_query_parameters();
if (isSet($query['latlng'])){
      $string = urldecode($query['latlng']);
      $school = urldecode($query['school']);
      if(isSet($query['node'])) {
        $school_node = node_load($query['node']);
        print_r( $school_node);
      }
      $latlng_array = preg_split("/[\s]*[,][\s]*/", $string);
      //print_r( $latlng_array );
      }
?>
<?php if (!$page): ?>
  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
<?php endif; ?>

  <?php if ($user_picture || $display_submitted || !$page): ?>
    <?php if (!$page): ?>
      <header>
	<?php endif; ?>

      <?php print $user_picture; ?>
  
      <?php print render($title_prefix); ?>
      <?php if (!$page): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
  
      <?php if ($display_submitted): ?>
        <span class="submitted"><?php print $submitted; ?></span>
      <?php endif; ?>

    <?php if (!$page): ?>
      </header>
	<?php endif; ?>
  <?php endif; ?>
<?php 
      if (isSet($content['field_sidebar']) && !empty($content['field_sidebar'])) {
        print '<section class="clearfix grid_10">';
      }
      else {
        print '<section class="clearfix">';
      }
     if (isSet($content['field_sidebar']) && !empty($content['field_sidebar'])) {
       print '<div class="content grid_6 alpha"' . $content_attributes . '>';
     }
     else {
       print '<div class="content">';
     }

      // Hide comments, tags, and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      hide($content['field_sidebar']);
      if (isSet($school)){
        print "<h2>$school Location</h2>";
      }
           print render($content);
         ?>
  </div>
<?php if (!empty($content['field_sidebar'])): ?>
<div class="right_sidebar grid_4 omega">
<?php print render($content['field_sidebar']); ?>
</div>
<?php endif; ?>
</section>
  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
    <footer>
      <?php print render($content['field_tags']); ?>
      <?php print render($content['links']); ?>
    </footer>
  <?php endif; ?>

  <?php print render($content['comments']); ?>

<?php if (!$page): ?>
  </article> <!-- /.node -->
<?php endif; ?>
<?php if (isSet($latlng_array)): ?>
      <script>
      getGoogleMap(<?php print $latlng_array[0] . ',' . $latlng_array[1] . ','. "'" . $school ."'" ?>);
      </script>
<?php endif; ?>
