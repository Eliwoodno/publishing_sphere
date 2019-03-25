<?php
/*
Template Name: Liste des intervenants
*/

?> 

<?php get_header(); ?>

<?php 
the_field('titre');
?>

<?php $args = array('post_type' => 'intervenant');
  
$my_query = new WP_Query($args); 

if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();
    the_title(); //Titre = nom
    the_field('specialite'); // Spécialité

    $image = get_field('photo_intervenant'); // Image
    echo $image['alt']; 
    echo $image['url']; 
    the_permalink(); //Lien pour la page perso

	wp_reset_postdata();

endwhile;
endif; ?>




<?php get_footer(); ?>