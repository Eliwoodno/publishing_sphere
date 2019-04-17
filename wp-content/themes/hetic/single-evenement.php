<?php get_header(); ?>

<?$pageActu = get_the_title();?>

<?$termsType = get_terms( array(
  'taxonomy' => 'tag_event',
  'orderby' => 'ID',
  'order' => 'ASC') );?>

<div class="banner_wrapper">
    <div class="event_banner" style="background-image: url(' <? echo get_field('image_evenement')['url']?>');" title="<?echo get_field('image_evenement')['alt']?>" >
      
    </div>
    <div class="banner_text">
    <h1><? echo the_title(); ?></h1>
      <p class="event_hours"><? echo the_field('debut_event'); ?> - <? echo the_field('fin_event'); ?></p>
      <p><?echo the_field('date_evenement');?><p>
      <p><?echo the_field('lieu_evenement');?><p>
      
    </div>
  </div>
<?php   
  ?>
  <div class="event_content">
  <div class="event_introduction"><?echo the_field('presentation_evenement');?> </div>
  <div class="event_speakers">
  <?$posts = get_field('intervenants');?>
  <?php if( $posts ): ?>
  <?php foreach( $posts as $post ):?>
  <?php setup_postdata($post); ?>
    <div class="event_speaker">
    <a href='<?the_permalink();?>'>
    <div class="speaker_photo"style="background-image:url('<?echo get_field('photo_intervenant')['url'];?>')"title='<?echo get_field('photo_intervenant')['alt'];?>'></div>
    <p><?the_title();?></p>
    </a>
  </div>
<? endforeach?>
<?endif?>
</div>
</div>


 <?get_footer(); ?> 


