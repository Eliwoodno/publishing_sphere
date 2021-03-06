<?php get_header(); ?>

<?$pageActu = get_the_title();?>

<?$termsType = get_terms( array(
  'taxonomy' => 'tag_event',
  'orderby' => 'ID',
  'order' => 'ASC') );?>

<div class="banner_wrapper">
  <? $image_evenement = get_field('image_evenement')?>
    <div class="event_banner" style="background-image: url(' <? echo $image_evenement['url']?>');" title="<?echo $image_evenement['alt']?>" >
      
    </div>
    <div class="banner_text">
      <div style='position: absolute;bottom: 0px;font-family: Gotham-Light;text-transform: none;font-size: 12px;'><?echo the_field('copyright')?></div>
    <h1><? echo the_title(); ?></h1>
      <p class="event_hours"><? echo the_field('debut_event'); ?> - <? echo the_field('fin_event'); ?></p>
      <p><?echo the_field('date_evenement');?></p>
      <p><?echo the_field('lieu_evenement');?></p>
      
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
    <? $photo_intervenant = get_field('photo_intervenant') ?>
    <div class="speaker_photo"style="background-image:url('<?echo $photo_intervenant['url'];?>')"title='<?echo $photo_intervenant['alt'];?>'></div>
    <p><?the_title();?></p>
    </a>
  </div>
<? endforeach?>
<?endif?>
</div>
</div>


 <?get_footer(); ?> 


