<?php get_header();
$post_description = get_post_meta(get_the_ID(), '_meta_description_field', true);
?>
<main>
    <section class="pb-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="h1-large">Blog</h1>
                    <p class="text-large"><?php echo $post_description ?></p>
                </div>
            </div>
        </div>
        <?php

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10,
            'paged' => $paged,
        );
        $blog_posts = new WP_Query($args);
        if ($blog_posts->have_posts()) {
            while ($blog_posts->have_posts()) {
                $blog_posts->the_post();
                echo get_template_part('inc/content');
            }
        ?>
            <!-- Pagination -->
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php
                        $pagination = paginate_links(array(
                            'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                            'format' => '?paged=%#%',
                            'current' => max(1, get_query_var('paged')),
                            'total' => $blog_posts->max_num_pages,
                            'prev_text' => '&laquo; Prev',
                            'next_text' => 'Next &raquo;',
                        ));

                        echo $pagination;
                        ?>
                    </div>
                </div>
            </div>
            <!-- End Pagination -->

        <?php
        }
        ?>
    </section>
</main>
<?php get_footer(); ?>