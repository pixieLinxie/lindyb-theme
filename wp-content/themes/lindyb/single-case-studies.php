<?php get_header();
$heading_one = get_post_meta(get_the_ID(), '_heading_one_field', true);
$brief = get_post_meta(get_the_ID(), '_brief_field', true);
$challenges = get_post_meta(get_the_ID(), '_challenges_field', true);
$solutions = get_post_meta(get_the_ID(), '_solutions_field', true);
$results = get_post_meta(get_the_ID(), '_result_field', true);
$custom_taxonomy = 'skills';
$custom_post_type = 'case-studies';

$images = get_post_meta(get_the_ID(), '_images', true);
$video = get_post_meta(get_the_ID(), '_video_field', true);
$featured_image = get_the_post_thumbnail(get_the_ID(), 'portfolio-thumbnail');
if (have_posts()) : while (have_posts()) : the_post();
?>

    <main id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <!-- Above the fold -->
      <header class="container">
        <div class="row align-md-center py-5">
          <div class="col-12 text-center">
            <hr class="mb-1 border-accent">
            <h1 class="h1-large"><?php the_title() ?></h1>
            <?php the_content(); ?>
            <?php
            $terms = get_the_terms(get_the_ID(), $custom_taxonomy);

            if ($terms && !is_wp_error($terms)) {
              echo '<ul class="list-unstyled list-meta text-center">';
              foreach ($terms as $term) {
                echo '<li><a class="link link-primary" href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
              }
              echo '</ul>';
            }
            ?>
            <hr class="mt-3 border-accent">
          </div>
        </div>
      </header>


      <!-- Brief -->
      <section class="container pt-3 pb-5">
        <div class="row">
          <div class="col-12">
            <h2>Brief</h2>
            <p class="text-large"><?php echo $brief ?></p>
          </div>
        </div>
        <div class="row pt-4">
          <div class="col-12 col-md-6 pe-md-1">
            <h2 class="h5">Challenges</h2>
            <p><?php echo $challenges ?></p>
          </div>
          <div class="col-12 col-md-6 ps-md-1">
            <h2 class="h5">Solutions</h2>
            <p><?php echo $solutions ?></p>
          </div>
        </div>
      </section>
      <?php

      if (!empty($images)) {
        // Split images into separate arrays based on position on page
        $leftColumn = array();
        $rightColumn = array();
        $bottomRow = array();
        foreach ($images as $key => $image) {
          if ($key < 1) {
            $leftColumn[] = $image;
          } elseif ($key < 3) {
            $rightColumn[] = $image;
          } else {
            $bottomRow[] = $image;
          }
        }
      ?>
        <!-- Images -->
        <section class="container">
          <div class="row">

            <div class="col-12 col-md-8 mb-1 pe-md-1">
              <?php foreach ($leftColumn as $image) { ?>
                <div class="image-scroll rounded-border">
                  <img class="" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
              <?php } ?>
            </div>

            <div class="col-12 col-md-4 d-flex">
              <?php foreach ($rightColumn as $image) { ?>
                <div class="mb-1 col-6 col-md-12 image-gap image-gap-none">
                  <img class="rounded-border" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
              <?php } ?>
            </div>

          </div>

          <?php if (!empty($video)) { ?>
            <div class="video-container mb-1" style="position: relative;overflow: hidden;width: 100%;padding-top: 56.25%;">
              <iframe class="rounded-border video-iframe" src="<?php echo $video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen style="position: absolute;top: 0;left: 0;bottom: 0;right: 0;width: 100%;height: 100%;"></iframe>
            </div>
          <?php } ?>
          <?php if (!empty($bottomRow)) { ?>
            <div class="row">
              <?php foreach ($bottomRow as $image) { ?>
                <div class="mb-1 col-6 image-gap">
                  <img class="rounded-border" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
              <?php } ?>
            </div>
          <?php } ?>
        </section>
      <?php
      }
      ?>

      <!-- Testimonials / Results -->
      <!-- check for each, then change headings accordingly -->
      <section class="container py-5">
        <div class="row">
          <div class="col-12">
            <h2 class="h2">Results</h2>
            <p><?php echo $results ?></p>
          </div>
        </div>
      </section>

      <!-- Other prjects -->
      <section>
        <div class="container">
          <hr class="my-2">
          <div class="row pt-5">
            <div class="col-12">
              <h2 class="h2">Other projects</h2>
            </div>
          </div>
        </div>

        <?php

        $case = array(
          'post_type' => 'case-studies',
          'posts_per_page' => 3,
          'post__not_in' => array(get_the_ID()),
        );
        $projects = new WP_Query($case);
        if ($projects->have_posts()) {
          while ($projects->have_posts()) {
            $projects->the_post();
            echo get_template_part('inc/content');
          }
        }
        ?>
      </section>

    </main>

<?php
  endwhile;
endif;
get_footer(); ?>