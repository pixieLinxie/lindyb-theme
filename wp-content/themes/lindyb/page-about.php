<?php get_header();
$featured_image = get_the_post_thumbnail(get_the_ID(), 'portfolio-thumbnail');
$heading_one = get_post_meta(get_the_ID(), '_heading_one_field', true);
$about_approach = get_post_meta(get_the_ID(), '_approach_fields', true);
$approach_fields = json_decode($about_approach, true);
$work_fields = get_post_meta(get_the_ID(), '_work_fields', true);

if (have_posts()) {
  while (have_posts()) {
    the_post();
?>

    <main>

      <!-- Above the fold -->
      <section class="container">
        <div class="row align-md-center py-5 mt-5">
          <div class="col-12 text-center">

            <div class="position-relative"><img class="lindy-pixels" src="<?php echo get_theme_file_uri('assets/img/lindy-pixels.png') ?>" alt="lindy-pixels"></div>
            <h1 class="h1-large"><?php the_title() ?></h1>
            <?php the_content() ?>
          </div>
        </div>
      </section>

      <!-- My approach -->
      <section class="container mt-2">
        <div class="row align-md-center about-height">

          <div class="col-12">
            <div class="position-relative"><img class="ladybug" src="<?php echo get_theme_file_uri('assets/img/ladybug.png') ?>" alt="ladybug"></div>
            <h2>My approach</h2>
            <p class="text-large">I approach each project by understanding the audience, crafting a strategy, and implementing tailored digital solutions that meet your business goals and audience's needs.</p>
            <!-- create meta boxes, loop through each -->
            <div class="row">
              <?php
              foreach ($approach_fields as $approach) {
                $image_id = $approach['approach_field_image_id'];
                $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                $image_src = wp_get_attachment_url($image_id);
              ?>
                <div class="blurb-three pt-1 pe-md-1">
                  <div class="blurb-icon_container"><img class="blurb-icon" src="<?php echo esc_url($image_src) ?>" alt="<?php echo esc_attr($image_alt) ?>"></div>
                  <h4 class="h5"><?php echo $approach['approach_field_title'] ?></h4>
                  <p><?php echo $approach['approach_field_description'] ?></p>
                </div>
              <?php
              }
              ?>
            </div>
            <!-- end loop -->
          </div>
        </div>
      </section>

      <!-- My skills -->
      <section class="container">
        <hr class="my-2">
        <div class="position-relative"><img class="chameleon_about" src="<?php echo get_theme_file_uri('assets/img/chameleon.png') ?>" alt="chameleon"></div>
        <div class="row pt-5">
          <h2>My skills</h2>
          <p class="text-large">As a versatile professional, I bring together creativity, technical expertise, and a keen understanding of audience needs to craft engaging and impactful digital solutions. My diverse skill set ensures a holistic approach that drives success across every project.</p>
        </div>
        <div class="d-flex">

          <?php
          // Get all parent skills
          $parent_skills_args = array(
            'taxonomy'   => 'skills',
            'hide_empty' => false,
            'parent'     => 0
          );

          $parent_skills = get_terms($parent_skills_args);

          // Loop through parent skills and display their names along with their child skills
          if (!empty($parent_skills) && !is_wp_error($parent_skills)) { ?>
            <ul class="skills-parent list-unstyled d-block d-lg-flex justify-lg-space-between">
              <?php foreach ($parent_skills as $parent_skill) { ?>
                <li class="skills-parent-li">
                  <h3 class="h5"><?php echo $parent_skill->name ?></h3>
                  <?php
                  // Get child skills for the current parent skill
                  $child_skills_args = array(
                    'taxonomy'   => 'skills',
                    'hide_empty' => false,
                    'parent'     => $parent_skill->term_id
                  );

                  $child_skills = get_terms($child_skills_args);

                  // Loop through child skills and display their names
                  if (!empty($child_skills) && !is_wp_error($child_skills)) { ?>
                    <ul class="skills-child list-unstyled d-md-flex">
                      <?php foreach ($child_skills as $child_skill) { ?>
                        <li class="skills-child-li"><?php echo $child_skill->name ?></li>
                      <?php } ?>
                    </ul>
                  <?php } ?>
                </li>
              <?php } ?>
            </ul>
          <?php } ?>
        </div>
      </section>

      <!-- Work experience -->
      <section class="container mt-5 pt-3">
        <div class="row">
          <div class="col-12">
            <div class="position-relative"><img class="salmon" src="<?php echo get_theme_file_uri('assets/img/salmon.png') ?>" alt="salmon"></div>
            <h3 class="h2">My work history</h3>
          </div>
        </div>
        <!-- loop through job experiences, create custom post type with meta boxes -->
        <?php
        foreach ($work_fields as $work) {
        ?>
          <hr class="mt-1 mb-2">
          <div class="row">
            <div class="col-12 col-md-2">
              <p><?php echo $work['work_field_date'] ?></p>
            </div>
            <div class="col-12 col-md-10 accordion">
              <h4><?php echo $work['work_field_title'] ?></h4>
              <h5><?php echo $work['work_field_company'] ?></h5>
              <?php echo str_replace('<br>', "", htmlspecialchars_decode($work['work_field_role'])); ?>
            </div>
          </div>

          <!-- end experience loop -->
        <?php } ?>
      </section>

      <!-- CTA -->
      <section class="container mt-5 pb-2">
        <div class="row">
          <div class="col-12 text-center">
            <a href="<?php echo get_site_url() ?>/portfolio" class="btn text-uppercase">View portfolio</a>
          </div>
        </div>
      </section>

    </main>

<?php
  }
}
get_footer(); ?>