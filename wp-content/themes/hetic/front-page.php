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
