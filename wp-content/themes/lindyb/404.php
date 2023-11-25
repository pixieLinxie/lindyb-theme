<?php get_header(); ?>
<main>
  <section class="container">
    <div class="row align-md-center atf-height">
      <div class="col-12 col-md-6 pe-md-2">
        <h1>Page Not Found</h1>
        <p class="text-large">Whoops, looks like the page you were looking for no longer exists.</p>
        <a href="<?php echo get_site_url() ?>" class="btn text-uppercase">Go back to home page</a>
      </div>
      <div class="col-12 col-md-6 image-radius">
        <img class="attachment-portfolio-thumbnail size-portfolio-thumbnail wp-post-image" src="<?php echo get_theme_file_uri('assets/img/lost-explorer.jpg') ?>" alt="an explorer consulting a map in the jungle">
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>