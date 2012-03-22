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

  <div class="content"<?php print $content_attributes; ?>>
    <div class="grid_10 alpha clearfix">
    <?php
      // Hide comments, tags, and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      hide($content['field_latlng']);
      //dsm($content);
      print render($content['field_school_image']);
      print "</div>";
      print "<div class=\"grid_10 alpha mission_statement clearfix\">";
       if(!empty($content['field_mission'])){
        print render($content['field_mission']);
       }
      ?>
      </div>
      <div class="info_container">
      <table class="info_table">
        <tr>
          <td>
      <?php
           print render($content['field_phone']);
      if(!empty($content['field_address1'])) {
         print render($content['field_address1']);
      }
      if(!empty($content['field_address2'])) {
         print render($content['field_adress2']);
      }
      if(!empty($content['field_principal'])) {
         print render($content['field_principal']);
      }
      if(!empty($content['field_secretary'])) {
         print render($content['field_secretary']);
      }
?>
      </td>
      <td>
<?php
      if(!empty($content['field_mascot'])) {
        print render($content['field_mascot']);
      }
      if(!empty($content['field_colors'])) {
        print render($content['field_colors']);
      }
      if(!empty($content['field_grade_level'])) {
        print render($content['field_grade_level']);
      }
      if(!empty($content['field_hours'])) {
        print render($content['field_hours']);
      }
?>
     </td>
      </tr>
      </table>
      </div>
      <div class="grid_9">

<?php
            if(!empty($content['field_latlng'])) {
        $latlng = $content['field_latlng']['#items'][0]['value'];
        print "<a href=\"map?node=$node->nid\"><div id=\"map_button\"></div></a>";
      }
      print "</div>";
    ?>
  </div>

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

