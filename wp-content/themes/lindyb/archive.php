<?php get_header();
$archive_description = get_the_archive_description();
$archive_description = strip_tags($archive_description);
?>
<main>
    <section class="pb-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="h1-large"><?php
                                            if (is_archive('portfolio') && !is_tax() && !is_category()) {
                                                echo 'Portfolio';
                                            } elseif (is_archive('blog') && !is_tax() && !is_category()) {
                                                echo 'Blog';
                                            } else {
                                                the_archive_title();
                                            }
                                            ?></h1>
                    <p class="text-large"><?php echo $archive_description ?></p>
                </div>
            </div>
        </div>
        <?php

        if (have_posts()) {
            while (have_posts()) {
                the_post();
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
                            'total' => $wp_query->max_num_pages,
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