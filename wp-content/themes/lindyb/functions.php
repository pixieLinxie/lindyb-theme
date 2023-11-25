<?php
//  Lindy B's functions and definitions
//  @package LindyB
//  @since LindyB 1.0

// Add stylesheet, fonts and js links to theme

function script_files()
{
  wp_enqueue_style('google_font_styles', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto+Slab:wght@100;300;500&display=swap');
  wp_enqueue_style('main_styles', get_theme_file_uri('/assets/css/main.min.css'), false, 1.0, 'all');
  wp_enqueue_script('main_scripts', get_theme_file_uri('/assets/js/script.js'), false, 1.1, true);
}

add_action('wp_enqueue_scripts', 'script_files');

// Add theme support for wordpress functions

function additional_features()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails', array('post'));
  register_nav_menu('header_menu_location', 'Header Menu Location');
  add_theme_support('post-thumbnails');
  add_post_type_support('case-studies', 'thumbnail');
}

add_action('after_setup_theme', 'additional_features');


// Custom Meta Description Field

function meta_description_field()
{
  $post_types = array('post', 'page', 'case-studies'); // Add your custom post types here

  foreach ($post_types as $post_type) {
    add_meta_box(
      'meta_description_field', // ID of the meta box
      'Meta Description', // Title of the meta box
      'meta_description_field_callback', // Callback function to display the meta box
      $post_type, // Post type to display the meta box on
      'normal', // Location of the meta box
      'default' // Priority of the meta box
    );
  }
}

function meta_description_field_callback($post)
{
  $value = get_post_meta($post->ID, '_meta_description_field', true); // For posts and custom post types
?>
  <textarea maxlength="160" rows="4" style="width:100%;" placeholder="Meta Description" id="meta_description_field" name="meta_description_field" value="<?php echo esc_attr($value); ?>"><?php echo esc_attr($value); ?></textarea>
<?php
}

function save_meta_description_field($post_id)
{
  if (isset($_POST['meta_description_field'])) {
    update_post_meta($post_id, '_meta_description_field', sanitize_text_field($_POST['meta_description_field']));
  }
}

// Custom Heading One Field

function heading_one_field()
{
  $post_types = array('post', 'page', 'case-studies'); // Add your custom post types here

  foreach ($post_types as $post_type) {
    add_meta_box(
      'heading_one_field', // ID of the meta box
      'Heading One', // Title of the meta box
      'heading_one_field_callback', // Callback function to display the meta box
      $post_type, // Post type to display the meta box on
      'normal', // Location of the meta box
      'high' // Priority of the meta box
    );
  }
}

function heading_one_field_callback($post)
{
  $value = get_post_meta($post->ID, '_heading_one_field', true); // For posts and custom post types
?>
  <textarea maxlength="160" rows="4" style="width:100%;" placeholder="Heading One" id="heading_one_field" name="heading_one_field" value="<?php echo esc_attr($value); ?>"><?php echo esc_attr($value); ?></textarea>
<?php
}

function save_heading_one_field($post_id)
{
  if (isset($_POST['heading_one_field'])) {
    update_post_meta($post_id, '_heading_one_field', sanitize_text_field($_POST['heading_one_field']));
  }
}

function toc_fields()
{
  add_meta_box(
    'toc_fields', // ID of the meta box
    'Table of Contents', // Title of the meta box
    'toc_fields_callback', // Callback function to display the meta box
    'post', // Post type to display the meta box on
    'normal', // Location of the meta box
    'high' // Priority of the meta box
  );
}

// TOC Fields Callback
function toc_fields_callback($post)
{
  $toc_fields = get_post_meta($post->ID, '_toc_fields', true);
  $toc_fields = json_decode($toc_fields, true); // Decode the JSON string
?>

  <div id="toc-fields-container">
    <?php
    if ($toc_fields && count($toc_fields) > 0) {
      foreach ($toc_fields as $index => $toc_field) { ?>
        <div class="toc-field-group">
          <label for="toc_field_<?php echo $index; ?>_ID">ID:</label>
          <input type="text" id="toc_field_<?php echo $index; ?>_ID" name="toc_fields[<?php echo $index; ?>][toc_field_ID]" value="<?php echo esc_attr($toc_field['toc_field_ID']); ?>">

          <label for="toc_field_<?php echo $index; ?>_anchor">Anchor Text:</label>
          <input type="text" id="toc_field_<?php echo $index; ?>_anchor" name="toc_fields[<?php echo $index; ?>][toc_field_anchor]" value="<?php echo esc_attr($toc_field['toc_field_anchor']); ?>">

          <button type="button" class="remove-toc-field button-secondary">Remove Field Group</button>
        </div>
    <?php }
    }
    ?>
  </div>

  <button type="button" id="add-toc-field" class="button-primary">Add Field Group</button>

  <script>
    jQuery(document).ready(function($) {
      let tocContainer = $('#toc-fields-container');

      $('#add-toc-field').click(function(event) {
        event.preventDefault();

        let index = tocContainer.children().length;

        let tocField = `
          <div class="toc-field-group">
            <label for="toc_field_${index}_ID">ID:</label>
            <input type="text" id="toc_field_${index}_ID" name="toc_fields[${index}][toc_field_ID]">

            <label for="toc_field_${index}_anchor">Anchor Text:</label>
            <input type="text" id="toc_field_${index}_anchor" name="toc_fields[${index}][toc_field_anchor]">



            <button type="button" class="remove-toc-field button-secondary">Remove Field Group</button>
          </div>
        `;
        tocContainer.append(tocField);
      });

      tocContainer.on('click', '.remove-toc-field', function(event) {
        event.preventDefault();
        $(this).closest('.toc-field-group').remove();
      });
    });
  </script>
<?php
}

// Save TOC Fields
function save_toc_fields($post_id)
{
  if (isset($_POST['toc_fields'])) {
    $toc_fields = $_POST['toc_fields'];
    update_post_meta($post_id, '_toc_fields', json_encode($toc_fields));
  }
}



add_action('add_meta_boxes', 'meta_description_field');
add_action('save_post', 'save_meta_description_field');
add_action('add_meta_boxes', 'heading_one_field');
add_action('save_post', 'save_heading_one_field');
add_action('add_meta_boxes', 'toc_fields');
add_action('save_post', 'save_toc_fields');
