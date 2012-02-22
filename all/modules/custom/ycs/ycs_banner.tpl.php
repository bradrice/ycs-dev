
<div id="home_banner" class="clearfix">
  <?php
  $top = sizeof($variables['home_banner']);
   /* $random_num = rand(0, $top - 1);*/
   $banners = $variables['home_banner'];
    ?>

<!-- "previous slide" button -->
<!--<a class="backward">back</a>-->

<!-- container for the slides -->
<div id="slides" class="clearfix">
<div class="slides_container">
<?php
  foreach($banners as $banner) {
  $imagevars = array();
  $imagevars['path'] = "/drupal/sites/default/files/home_banner/" . $banner['home_banner_image']['filename'];
  $imagevars['alt'] = "Home Page image";
  $imagevars['width'] = "610";
  $imagevars['height'] = "400";
  if (isset($banner['caption']))  {
  $imagevars['title'] = $banner['caption'];
  }
  else {
  $imagvars['title'] = t('untitled');
  }
  $imagevars['attributes'] = array(
    'class' => 'banner_image',
  );
  print"<div>";
  if ( isset($banner['link_to']) ){
    print "<a href=\"" . $banner['link_to'] . "\">";
    print theme('image', $imagevars);
    print "</a>";
  } else {
    print theme('image', $imagevars);
  }
  if ( isset($banner['caption']) ){
    print "<div class=\"caption\">" . $banner['caption'] . "</div>";
  }
  print "</div>";
  }
?>
</div>
</div>


