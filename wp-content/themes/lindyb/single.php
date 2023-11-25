<?php get_header();
$heading_one = get_post_meta(get_the_ID(), '_heading_one_field', true);
$description = get_post_meta(get_the_ID(), '_meta_description_field', true);
$featured_image = get_the_post_thumbnail(get_the_ID(), 'portfolio-thumbnail');
$toc_fields = get_post_meta(get_the_ID(), '_toc_fields', true);
$toc_array = json_decode($toc_fields, true);
$categories = get_the_category();
$category_name = esc_html($categories[0]->name);
$category_link = esc_url(get_category_link($categories[0]->term_id));
if (have_posts()) : while (have_posts()) : the_post();
?>

    <main>
      <!-- Above the fold -->
      <header class="container post-header">
        <div class="row align-md-center py-5">
          <div class="col-12 text-center position-relative">
            <?php echo $featured_image ?>
            <h1 class="h1-large position-relative pt-1"><?php echo $heading_one ?></h1>
            <ul class="list-unstyled list-meta position-relative pb-2">
              <li><time datetime="<?php the_date('Y-m-d'); ?>"><?php the_time('d M'); ?></time></li>
              <li><a class="link link-primary" href="<?php echo $category_link ?>"><?php echo $category_name ?></a></li>
              <li><?php the_author() ?></li>
            </ul>
          </div>
        </div>
      </header>

      <section class="container row pb-5 mb-5">
        <!-- Content -->
        <article class="col-12 col-lg-8 mb-2 pe-lg-2">

          <!-- fetch blog post content -->
          <?php the_content() ?>
        </article>

        <!-- Side bar -->
        <aside class="col-12 col-lg-4 sidebar-hr">
          <!-- fetch table of contents -->
          <?php if (!empty($toc_array)) { ?>
            <h2 class="h4 mt-2">Table of contents</h2>
            <ul class="list-unstyled mt-1 mb-2">
              <?php
              foreach ($toc_array as $toc) {
                echo '<li><a class="link link-secondary" href="#' . $toc['toc_field_ID'] . '">' . $toc['toc_field_anchor'] . '</a></li>';
              }
              ?>
            </ul>
          <?php } ?>
          <!-- fetch all categories -->
          <?php if (has_category()) { ?>
            <h2 class="h4">Categories</h2>
            <ul class="list-unstyled mt-1">
              <?php
              $categories = get_categories();
              foreach ($categories as $category) {
                echo '<li><a class="link link-secondary" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
              }
              ?>

            </ul>
          <?php } ?>
          <!-- fetch all tags -->
          <?php if (has_tag()) { ?>
            <h2 class="h4">Tags</h2>
            <ul class="list-unstyled">
              <?php
              $tags = get_tags();
              foreach ($tags as $tag) {
                echo '<li><a class="link link-secondary" href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
              }
              ?>
            </ul>
          <?php } ?>

        </aside>

      </section>

      <!-- Related posts -->
      <section>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h2>Read more posts</h2>
            </div>
          </div>
        </div>

        <?php
        $blog = array(
          'post_type' => 'post',
          'posts_per_page' => 3,
          'orderby'     => 'publish_date',
          'order' => 'DESC',
          'post__not_in' => array(get_the_ID()),
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
  endwhile;
endif;
get_footer(); ?>