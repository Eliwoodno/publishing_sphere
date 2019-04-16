<?php get_header(); ?>

<?php
    $i = 0;
    $image = get_field('photo_intervenant');?>

<div class="speaker_content">
  <div class="speaker_img" style="background-image: url('<?echo $image['url'];?>');" title='<?echo $image['alt'];?>'></div>
  <div class="speaker_text">
    <h1><?echo the_title()?></h1>
    <h3><?echo the_field('specialite')?></h3>
    <p><? echo the_field('description_intervenant')?></p>
    
 
    <div class="speaker_links">
<?  if( have_rows('lien_externe') ):
    while ( have_rows('lien_externe') ) : the_row();?>
        <a href='<?echo the_sub_field('lien'); ?>'><?echo the_sub_field('texte');?></a>
    <?endwhile;
    else :
    endif;?>
    </div>
  </div>
</div>

<?$termsType = get_terms( array(
  'taxonomy' => 'type_event',
  'orderby' => 'ID',
  'order' => 'ASC') );?>
  <?$termsJour = get_terms( array(
'taxonomy' => 'jour',
'orderby' => 'ID',
'order' => 'ASC') );?>

<div class="main_planning">
<?for ($i = 0; $i < sizeof($termsType); $i++):?>
  <!--Iterate through types-->
  
  
<h5 class='event_type_title'><?echo($termsType[$i]->name);?>s</h5>
 

<div class="speaker_planning_container">
<?for ($j = 0; $j < sizeof($termsJour); $j++):?>  <!-- Query events from the type being currently iterated -->
<?$posts = get_posts(array(
  'post_type' => 'evenement',
  'posts_per_page' => -1,
    'orderby' => 'meta_value',
    'meta_key' => 'debut_event',
    'meta_type' => 'TIME',
    'order'	=> 'ASC',
  'tax_query' => array(
    array(
      'taxonomy' => 'type_event',
      'field' => 'slug', 
      'terms' => $termsType[$i]->slug
    ), array(
      'taxonomy' => 'jour',
      'field' => 'slug',
      'terms' => $termsJour[$j]->slug,
  )
    ),
	'meta_query' => array(
		array(
			'key' => 'intervenants', // name of custom field
			'value'   => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
			'compare' => 'LIKE'
    ))
  
	
));
?>
       
       <?php if( $posts): ?>
       <?php foreach( $posts as $post ):?>
       <?php setup_postdata($post); ?>
       

<?$image = get_field('image_evenement');
$id = get_the_ID();
$jourSlug = get_the_terms($id, 'jour');
$jour = $jourSlug[0]->slug;
$lieuSlug = get_the_terms($id, 'lieu');
$lieu = $lieuSlug[0]->slug;
$typeSlug = get_the_terms($id, 'type_event');
$type = $typeSlug[0]->slug;?>

          <div class="event_box">
          <a class="event_link" href="<? echo the_permalink();?>">
         <div class="event_img" style="background-image:url('<?echo $image['url']?>')" title="<?echo $image['alt']?>"></div>
         <div class="event_info">
         <h5 class="event_title"><? echo the_title()?></h5>
         <p class="event_date"><img class='date-svg'src='<?echo (IMAGES_URL . '/Calendar.svg')?>'><?php the_field('date_evenement'); ?></p>
         <p class="event_hours"><img class='hour-svg'src='<?echo (IMAGES_URL . '/Clock.svg')?>'><? echo the_field('debut_event'); ?> - <? echo the_field('fin_event'); ?></p>
         <p class="event_location"><img class='location-svg'src='<?echo (IMAGES_URL . '/Location.svg')?>'><?php the_field('lieu_evenement'); ?></p>
         </div>
        </a>
        </div>
        <?wp_reset_postdata();?>
          

         <?php endforeach; ?>
         <?php endif; ?>
         <?endfor?>
             </div>
             
        <?endfor?>
      </div>
      
      
    
    
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

    
<script type="text/javascript">let titles = document.querySelectorAll('.event_type_title'); 
    for(let title of titles){
      let a =  title.nextSibling.nextSibling
      if((a.querySelectorAll('.event_box')).length ==0){
         title.style.display='none';
        }
    } </script>



<?php get_footer(); ?>

