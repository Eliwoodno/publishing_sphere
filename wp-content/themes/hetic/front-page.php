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
<h4 class='dark_filet'><? echo the_field('titre_planning'); ?></h4> 

<?php $args = array('post_type' => 'evenement',
                    'taxonomy' => 'jour'
);

$termsJour = get_terms( array(
'taxonomy' => 'jour',
'orderby' => 'ID',
'order' => 'ASC') );?>
<div class="filter_container">

<div>
<div class="filter_title"><img class='date-svg'src='<?echo (IMAGES_URL . '/Calendar.svg') ?>'>DATE</div>
<select class="date_filters filters" data-filter='date'>
<?for ($i = 0; $i < sizeof($termsJour); $i++) {?>
   <option value="<?echo($termsJour[$i]->slug);?>">
     <? echo($termsJour[$i]->name);?>
</option>

<?}?>
</select>
</div>

<?$termsLieu = get_terms( array('taxonomy' => 'lieu') );?>

<div>
<div class="filter_title" ><img class='location-svg'src='<?echo (IMAGES_URL . '/Location.svg') ?>'>LOCATION</div>
<select class="location_filters filters" data-filter='location'>
  <option value="">All</option>
<?for ($i = 0; $i < sizeof($termsLieu); $i++) {?>
  <option value="<?echo($termsLieu[$i]->slug);?>">
     <? echo($termsLieu[$i]->name);?>
</option>
<?}?>
</select>
</div>

<?
$termsType = get_terms( array('taxonomy' => 'type_event') );?>

<div>
<div class="filter_title" ><img class='type-svg'src='<?echo (IMAGES_URL . '/Location.svg') ?>'>TYPE</div>
<select class="type_filters filters" data-filter='type'>
<option value="">All</option>
<?for ($i = 0; $i < sizeof($termsType); $i++) {?>
  <option data-type="<?echo($termsType[$i]->slug);?>" >
     <? echo($termsType[$i]->name);?>
</option>
<?}?>
</select>
</div>
</div>

<div class="planning_container"></div>

<!-- Direct  -->

<h4 class='dark_filet' ><? echo the_field('titre_diffusion'); ?></h4> 
<div class="stream_wrapper">
<?php the_field('youtube'); ?>
</div>

<!-- Partenaires  -->
<h4 class='dark_filet' ><? echo the_field('titre_sponsors'); ?></h4> 
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
