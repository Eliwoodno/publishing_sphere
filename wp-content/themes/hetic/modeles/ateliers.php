<?php
/*
Template Name: Ateliers
*/

?> 

<?php get_header(); ?>

<?php 
    the_field('texte_page');
    $image = get_field('image_presentation'); // Image
    echo $image['alt']; 
    echo $image['url']; 

?>




<?php get_footer(); ?>