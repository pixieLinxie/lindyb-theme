<?php
$post_description = get_post_meta(get_the_ID(), '_meta_description_field', true);
$image = get_the_post_thumbnail(get_the_ID(), 'portfolio-thumbnail');
?>

<div class="container-fluid">
  <div class="container">
    <hr class="mb-1 my-md-1">
    <a class="link-post" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
      <div class="d-flex align-md-center">
        <div class="preview-container my-1 my-md-0 col-12 col-md-3 pe-md-2 pe-lg-0">
          <?php echo $image ?>
        </div>
        <div class="d-flex col-12 col-md-9 col-lg-12">
          <div class="col-12 col-lg-2">
            <time datetime="<?php the_date('Y-m-d'); ?>"><?php the_time('d M'); ?></time>
          </div>
          <div class="col-12 col-lg-10">
            <h4 class="h5"><?php the_title(); ?></h4>
            <p><?php echo $post_description ?></p>
            <div class="d-flex justify-flex-end">
              <p class="link link-primary d-block mb-md-0 mb-xl-1">Read the full post</p>
            </div>
          </div>
        </div>
      </div>
    </a>
  </div>
</div>