<?php get_header(); ?>
<?php $bandeau = get_field('bandeau'); ?>  

<!-- Bandeau  -->
<?php if ($bandeau):?>
  <div>
    <div class="main_banner" style="background-image: url(' <? echo $bandeau['image']['url']?>');" title="<? echo $bandeau['image']['alt'];?>" >
      <? echo $bandeau['texte'] ?>
    </div>
    
  </div>

<?endif; ?>

<!-- Evenements  -->


<?php $args = array('post_type' => 'evenement');

$termsJour = get_terms( array('taxonomy' => 'jour') );

print_r($termsJour[0]->name);  //Affichage des jours pour le trie
print_r($termsJour[2]->name);
print_r($termsJour[1]->name);

$termsLieu = get_terms( array('taxonomy' => 'lieu') );

print_r($termsLieu[0]->name); //Affichage des lieux pour le trie
print_r($termsLieu[1]->name);

$termsType = get_terms( array('taxonomy' => 'type_event') );
print_r($termsType[0]->name); //Affichage des lieux pour le trie
print_r($termsType[1]->name);

$my_query = new WP_Query($args); 


if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post(); ?>
</br>
</br>
<?php
    $id = get_the_ID();

    $jourSlug = get_the_terms($id, 'jour'); // Jour de l'evenement en slug -> a mettre dans le nom de classe
    $jour = $jourSlug[0]->slug;
    echo($jour);

    $lieuSlug = get_the_terms($id, 'lieu');  // Lieu de l'evenement en slug -> a mettre dans le nom de classe
    $lieu = $lieuSlug[0]->slug;
    echo($lieu);

    $typeSlug = get_the_terms($id, 'type_event');  // Lieu de l'evenement en slug -> a mettre dans le nom de classe
    $type = $typeSlug[0]->slug;
    echo($type);


    the_title();  // Titre de l'évenement 
    
    $image = get_field('image_evenement'); 
    echo $image['alt']; //Alt de l'image de l'evenement
    echo $image['url']; // Url de l'image de l'évenement

    the_field('heure_evenement'); //Heure de l'evenement
	wp_reset_postdata(); 
?>


<?php
endwhile;
endif; ?>

<!-- Direct  -->

<h4><? echo the_field('titre_diffusion'); ?></h4> 
<div class="stream_wrapper">
<?php the_field('youtube'); ?>
</div>

<!-- Partenaires  -->
<h4><? echo the_field('titre_sponsors'); ?></h4> 
<div class="sponsor-slider">
  <div class="next"></div>
  <div class="previous"></div>


<?php $args = array('post_type' => 'partenaire');?>

<?$my_query = new WP_Query($args);

if($my_query->have_posts()) : $counter=0; $numerator=0; while ($my_query->have_posts() ) : $my_query->the_post();

  if ($counter % 3 == 0){
    echo ("<div class='slide' data-slide=".$numerator.">");
    
  }
  $image = get_field('image_partenaire');?>
  <a href="<?echo the_field('lien_partenaire');?>"><img src="<? echo $image['url']; ?>" alt="<? echo $image['alt']; ?>"></a>
  <?
  if ((($counter+1) % 3 == 0 )||(($my_query->current_post +1) == ($my_query->post_count))){
    echo ("</div>");
    $numerator++;
  }
  
  $counter++;
  
endwhile;
endif; ?>
</div>




<?php get_footer(); ?>
