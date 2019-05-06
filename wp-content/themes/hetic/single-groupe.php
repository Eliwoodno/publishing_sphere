<?php get_header(); ?>

<?php $image = get_field('photo_groupe');?>


<div class="speaker_content">
  <div class="speaker_img" style="position:relative;background-image: url('<?echo $image['url'];?>');" title='<?echo $image['alt'];?>'><div style='position:absolute;bottom:-20px;font-family:Gotham-Light;font-size:12px;'><? echo the_field('copyright') ;?></div></div>
  <div class="speaker_text">
    <h1><?echo the_title()?></h1>
    <p><? echo the_field('description_groupe')?></p>
  </div>
</div>

<?php 

$posts = get_field('intervenants');?>

<?if( $posts ): ?>
<h5 class='event_type_title'>
Participants
</h5>
<div class="speakers_container">

<? foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
    <?php setup_postdata($post); ?>
    <div class="speaker_box">
        <a href="<?the_permalink()?>">
        <div class="speaker_img" style="background-image:url('<?echo get_field('photo_intervenant')['url']; ?>')" title='<?echo get_field('photo_intervenant')['alt']; ?>'></div>
        <div><?the_title();?></div>
        <div><?the_field('specialite');?></div>
        </a>
    </div>
    <?php endforeach; ?>
    <?endif?>

  <?wp_reset_postdata();?>
</div>



<?php get_footer(); ?>