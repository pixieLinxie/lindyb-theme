<?php get_header();

$heading_one = get_post_meta($post->ID, '_heading_one_field', true);
$about_heading = get_post_meta('48', '_heading_one_field', true);
$about_page_data = get_page_by_path('about', OBJECT, 'page');
$about_content = apply_filters('the_content', $about_page_data->post_content);
$about_approach = get_post_meta('48', '_approach_fields', true);
$about_fields = json_decode($about_approach, true);
$featured_image = get_the_post_thumbnail(get_the_ID(), 'portfolio-thumbnail');

if (have_posts()) {
  while (have_posts()) {
    the_post();
?>

    <main>

      <!-- Above the fold -->
      <section class="container">
        <div class="row align-md-center py-5 mt-lg-5">
          <div class="col-12 text-center">
            <div class="position-relative"><img class="chameleon" src="<?php echo get_theme_file_uri('assets/img/chameleon.png') ?>" alt="chameleon"></div>
            <h1 class="h1-large"><?php echo $heading_one ?></h1>
            <?php the_content(); ?>
            <div class="position-relative"><img class="butterfly" src="<?php echo get_theme_file_uri('assets/img/butterfly.png') ?>" alt="butterfly"></div>
            <div class="py-1 d-flex align-center justify-center">
              <a href="<?php echo get_site_url() ?>/portfolio" class="btn text-uppercase">View portfolio</a>
              <a href="<?php echo get_site_url() ?>/about" class="link link-primary ms-2">Get to know me</a>
            </div>
          </div>
        </div>
      </section>

      <!-- About -->
      <section class="container pt-md-5">
        <div class="row">
          <div class="col-12">
            <h2><?php echo $about_heading ?></h2>
            <?php echo $about_content ?>
            <div class="d-flex justify-space-between">
              <!-- Loop through each of the Approach Fields from About Us page -->
              <p class="text-large">I approach each project by understanding the audience, crafting a strategy, and implementing tailored digital solutions that meet the project goals and audience's needs.</p>
              <?php
              foreach ($about_fields as $approach) {
                $image_id = $approach['approach_field_image_id'];
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                $image_src = wp_get_attachment_url($image_id);
              ?>
                <div class="blurb-three pt-1 pe-md-1">
                  <div class="blurb-icon_container"><img class="blurb-icon" src="<?php echo esc_url($image_src) ?>" alt="<?php echo esc_attr($image_alt) ?>"></div>
                  <h3 class="h5"><?php echo $approach['approach_field_title'] ?></h3>
                  <p><?php echo $approach['approach_field_description'] ?></p>
                </div>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </section>

      <!-- Projects -->
      <section class="container mt-5 pt-md-5">
        <div class="row align-center">
          <div class="col-12">
            <h2>Explore my portfolio</h2>
            <p class="text-large">Welcome to my digital playground, where creativity and tech collide! From custom WordPress themes to beautiful graphics and more, my portfolio displays the best of my work. So, take a look around and see what I'm all about.</p>
            <a class="link link-primary d-inline-block" href="<?php echo get_site_url() ?>/portfolio">View all projects</a>
          </div>
          <div class="col-12">
            <div class="row mt-2">
              <!-- Loop through featured projects -->
              <?php
              $case = array(
                'post_type' => 'case-studies',
                'posts_per_page' => 3,
              );
              $featured_projects = new WP_Query($case);
              $post_count = 0;

              if ($featured_projects->have_posts()) {
                while ($featured_projects->have_posts()) {
                  $featured_projects->the_post();
                  $featured_check = get_post_meta(get_the_ID(), '_featured_field', true);
                  $image = get_the_post_thumbnail(get_the_ID(), 'portfolio-thumbnail');

                  if ($featured_check == '1') {
                    $post_count++;

                    if ($post_count == 1) {
                      echo '<div class="col-12 col-md-8 mb-2 mb-md-0 portfolio-column featured">';
                    } else {
                      if ($post_count == 2) {
                        echo '<div class="col-12 col-md-4 mb-2 mb-md-0 portfolio-column">';
                      }
                    }
              ?>
                    <a class="portfolio-link mb-2" href="<?php the_permalink() ?>" aria-label="view <?php the_title() ?> case study page">
                      <?php echo $image ?>
                      <div class="portfolio-inner">
                        <h4 class="portfolio-heading"><?php the_title() ?></h4>
                      </div>
                    </a>
              <?php
                    if ($post_count == 1 || $post_count == 3) {
                      echo '</div>';
                    }
                  }
                }
                wp_reset_postdata();
              }
              ?>

              <!-- End featured projects loop -->
            </div>
          </div>

        </div>
      </section>

      <!-- Posts -->
      <section>
        <div class="container pt-md-5">
          <hr class="mt-1 mb-3 d-md-none">
          <div class="row mt-md-3">
            <div class="col-12">
              <h3 class="h2">Latest posts, musings and tutorials</h3>
            </div>
          </div>
        </div>
        <!-- Loop through latest posts, max 5 -->
        <!-- create template, reused for posts and portfolio pieces -->
        <?php
        $blog = array(
          'post_type' => 'post',
          'posts_per_page' => 5,
          'orderby'     => 'publish_date',
          'order' => 'DESC',
        );
        $latest_post = new WP_Query($blog);
        if ($latest_post->have_posts()) {

          while ($latest_post->have_posts()) {
            $latest_post->the_post();
            echo get_template_part('inc/content');
          }
          wp_reset_postdata();
        }
        ?>
        <!-- End post loop -->

      </section>

    </main>


<?php
  }
}
get_footer() ?>