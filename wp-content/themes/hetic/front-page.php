<?php get_header(); ?>
<?php $bandeau = get_field('bandeau'); ?>  

<!-- Bandeau  -->
bandeau </br>
<?php if ($bandeau):

echo $bandeau['image']['url']; //Bandeau img
echo $bandeau['image']['alt'];
echo $bandeau['texte'];  //Bandeau Texte

endif; ?>

<!-- Evenements  -->
Evenements </br>
<?php $args = array('post_type' => 'evenement');
  
$my_query = new WP_Query($args); 

if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();

	$category = get_the_category();
	echo $category[0]->slug; //A mettre dans la classe de la div
    echo $category[1]->slug;  // A mettre dans la classe de la div
    the_title();  // Titre de l'évenement 
    
    $image = get_field('image_evenement'); 
    echo $image['alt']; //Alt de l'image de l'evenement
    echo $image['url']; // Url de l'image de l'évenement

    the_field('heure_evenement'); //Heure de l'evenement
	wp_reset_postdata();
?>
</br>

<?php
endwhile;
endif; ?>

<!-- Direct  -->
<?php the_field('titre_difusion'); ?> 
<?php the_field('youtube'); ?>

<!-- Partenaires  -->
<?php the_field('titre_sponsors'); ?> 

<?php $args = array('post_type' => 'partenaire');

$my_query = new WP_Query($args);

if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post();

$image = get_field('image_partenaire'); 
echo $image['alt']; //Alt de l'image du partenaire
echo $image['url']; // Url de l'image du partenaire
the_field('lien_partenaire'); //Lien du site du partenaire

endwhile;
endif; ?>


<?php get_footer(); ?>