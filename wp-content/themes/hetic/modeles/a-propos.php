<?php
/*
Template Name: A propos
*/

?> 

<?php get_header(); ?>
<?$currLang = get_bloginfo('language');?>

<?php 
$image = get_field('image_presentation'); ?>
<div class='about_img'style="background-image:url('<?echo $image['url'];?>')" title='<?echo $image['alt'];?>'></div>

<div class='about_description'>
<?
the_field('informations');
?>
</div>

<h4 class='dark_filet'>Planning</h4>

<?php

$termsJour = get_terms( array(
'taxonomy' => 'jour',
) );?>
<div class="filter_container">

<div>
<div class="filter_title"><img class='date-svg'src='<?echo (IMAGES_URL . '/Calendar.svg') ?>'>DATE</div>
<div class="custom-select">
<select class="date_filter filters" data-filter='date'>
<? if($currLang == "en-US" ||  $currLang == "en-GB"):?>
  <option value="">All</option>
  <option value="">All</option>
<?endif; ?>
<? if($currLang == "fr-FR"):?>
  <option value="">Toutes</option>
  <option value="">Toutes</option>
<?endif; ?>
<?for ($i = 0; $i < sizeof($termsJour); $i++) {?>
   <option value="<?echo($termsJour[$i]->slug);?>">
     <? echo($termsJour[$i]->name);?>
</option>

<?}?>
</select>
</div>
</div>

<?$termsLieu = get_terms( array('taxonomy' => 'lieu') );?>

<div>
<div class="filter_title" ><img class='location-svg'src='<?echo (IMAGES_URL . '/Location.svg') ?>'>
<? if($currLang == "en-US" ||  $currLang == "en-GB"):?>
LOCATION
<?endif; ?>
<? if($currLang == "fr-FR"):?>
LIEU
<?endif; ?>
</div>
<div class="custom-select">
<select class="location_filter filters" data-filter='location'>
<? if($currLang == "en-US" ||  $currLang == "en-GB"):?>
  <option value="">All</option>
  <option value="">All</option>
<?endif; ?>
<? if($currLang == "fr-FR"):?>
  <option value="">Tous</option>
  <option value="">Tous</option>
<?endif; ?>
<?for ($i = 0; $i < sizeof($termsLieu); $i++) {?>
  <option value="<?echo($termsLieu[$i]->slug);?>">
     <? echo($termsLieu[$i]->name);?>
</option>
<?}?>
</select>
</div>
</div>

<? $termsType = get_terms( array('taxonomy' => 'type_event') );?>

<div>
<div class="filter_title" ><img class='type-svg'src='<?echo (IMAGES_URL . '/type.svg') ?>'>TYPE</div>
<div class="custom-select">
<select class="type_filter filters" data-filter='type'>
  <? if($currLang == "en-US" ||  $currLang == "en-GB"):?>
  <option value="">All</option>
  <option value="">All</option>
<?endif; ?>
<? if($currLang == "fr-FR"):?>
  <option value="">Tous</option>
  <option value="">Tous</option>
<?endif; ?>
    
  </option>
<?for ($i = 0; $i < sizeof($termsType); $i++) {?>
  <option value="<?echo($termsType[$i]->slug);?>" >
     <? echo($termsType[$i]->name);?>
</option>
<?}?>
</select>
</div>
</div>
<? $termsTag = get_terms( array('taxonomy' => 'tag_event') );?>

<div style='width:40%;'>
<div class="filter_title" >TAGS</div>
<div class='active_tags'>
  
  <? if($currLang == "en-US" ||  $currLang == "en-GB"):?>
  <div class='add_tag'>Add a tag</div>
<?endif; ?>
<? if($currLang == "fr-FR"):?>
  <div class='add_tag'>Ajouter un tag</div>
<?endif; ?>
</div>
<div class='tags_box'>
<?for ($i = 0; $i < sizeof($termsTag); $i++) {?>
  <div>
     <? echo($termsTag[$i]->name);?>
 </div>
<?}?>
</div>

</div>
</div>





<!-- FIN --> 

<div class="main_planning">
<?for ($i = 0; $i < sizeof($termsJour); $i++){?> <!--Iterate through days-->
  
<h5 class='day_title'><?echo($termsJour[$i]->name);?></h5> <!-- Display day as title -->

<div class="planning_container"> <!-- Query events from the day being currently iterated -->
<?$my_query = new WP_Query(array(
    'post_type' => 'evenement',
  	'posts_per_page'	=> -1,
  	'orderby'			=> 'meta_value',
	'meta_key'			=> 'debut_event',
	'meta_type'			=> 'TIME',
  	'order'				=> 'ASC',
    'tax_query' => array(
        array(
            'taxonomy' => 'jour',
            'field' => 'slug',
            'terms' => $termsJour[$i]->slug,
          
        )
    )
  )
        );

if($my_query->have_posts()) : while ($my_query->have_posts() ) : $my_query->the_post(); // iterate through events and displays them

$image = get_field('image_evenement');
$id = get_the_ID();
$jourSlug = get_the_terms($id, 'jour');
$jour = $jourSlug[0]->slug;

$lieuSlug = get_the_terms($id, 'lieu');
$lieuSlugArray = array();
for($j = 0; $j < sizeof($lieuSlug); $j++){
  $lieuSlugArray[$j] = $lieuSlugArray[$j]->slug;
}

$typeSlug = get_the_terms($id, 'type_event');
$typeSlugArray = array();
for($j = 0; $j < sizeof($typeSlug); $j++){
  $typeSlugArray[$j] = $typeSlug[$j]->slug;
}

$tagsNames =get_the_terms($id, 'tag_event');
$tagsNamesArray = array();
for($j = 0; $j < sizeof($tagsNames); $j++){
  $tagsNamesArray[$j] = $tagsNames[$j]->name;
}

$speakers = get_field('intervenants');

?>

<div class="event_box" date="<?echo($jour);?>"

location="<?
for($k = 0; $k < sizeof($typeSlugArray); $k++){
  if($lieuSlugArray[$k + 1] === null){
  echo ($lieuSlugArray[$k]);
  }else{
  echo ($lieuSlugArray[$k] .",");
  }
}?>" 

type="<?
for($k = 0; $k < sizeof($typeSlugArray); $k++){
  if($typeSlugArray[$k + 1] === null){
  echo ($typeSlugArray[$k]);
  }else{
  echo ($typeSlugArray[$k] .",");
  }
}?>" 
tags="<?
for($k = 0; $k < sizeof($tagsNamesArray); $k++){
  if($tagsNamesArray[$k + 1] === null){
  echo ($tagsNamesArray[$k]);
  }else{
  echo ($tagsNamesArray[$k] .",");
  }
}?>">
  
    <div class="event_img" style="background-image:url('<?echo $image['url']?>')" title="<?echo $image['alt']?>"></div>
    <h4 class="event_title"><a class="event_link" href="<? echo the_permalink();?>"><? echo the_title()?></a></h4>
    <p class="event_hours"><img class='hour-svg'src='<?echo (IMAGES_URL . '/Clock.svg')?>'><? echo the_field('debut_event'); ?> - <? echo the_field('fin_event'); ?></p>
    <p><img class='location-svg'src='<?echo (IMAGES_URL . '/Location.svg')?>'><?php echo the_field('lieu_evenement'); ?></p>
    <p><img class='bubble-svg'src='<?echo (IMAGES_URL . '/Bubble.svg')?>'/><?php foreach( $speakers as $post):?><?php setup_postdata($post);?><a class='speaker_link'style='color:black;text-decoration:none;'href='<?echo the_permalink();?>'><?php the_title();?>&#160&#160</a><?php endforeach;?><?php wp_reset_postdata();?></p>
   
</div>
<?php
   
    
    
	wp_reset_postdata(); 
endwhile;
endif;?>
</div>
<?}?>
</div >

<?php get_footer(); ?>