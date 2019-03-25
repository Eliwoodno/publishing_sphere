<?php
/*
Template Name: Infos pratiques
*/

?> 


<?php get_header(); ?>
<?php 
  the_field('informations');
  the_field('informations_complementaires');

  $location = get_field('location');

  if( !empty($location) ):
?>

  <div class="acf-map">
	<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
  </div>
<?php endif; ?>

<?php get_footer(); ?>