<?php
/*
Template Name: A propos
*/

?> 

<?php get_header(); ?>
<?php 
$image = get_field('image_presentation'); 
echo $image['alt']; //Alt de l'image de l'evenement
echo $image['url']; // Url de l'image de l'évenement 
the_field('informations');
?>

<?php get_footer(); ?>