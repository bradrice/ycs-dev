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
 print '<section id="main" role="main" class="clearfix';
      if (!empty($content['field_sidebar'])) 
        print ' grid_10">';
      else
        print '">';
?>

  
<?php
if (!empty($content['field_sidebar'])) {
  print '<div class="content grid_6 alpha' .  $content_attributes . '">';
  print '<div class="right_sidebar grid_4 omega">';
print render($content['field_sidebar']); 
print '</div>';
}
else {
  print '<div class="content grid_10 omega' . $content_attributes . '">';
}

          // Hide comments, tags, and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      hide($content['field_sidebar']);
      print render($content);
$block = module_invoke('views', 'block_view', 'department_directory-block');
      print render($block);
      print "</div>";
?>
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



