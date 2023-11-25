<?php
function custom_post_types()
{
  register_post_type('case-studies', array(
    'supports'            => array('title', 'editor', 'thumbnail', 'author'),
    'has_archive'         => true,
    'public'              => true,
    'show_in_rest'        => true,
    'hierarchical'        => true,
    'publicly_queryable'  => true,
    'show_ui'             => true,
    'query_var'           => true,
    'description'        => 'Welcome to my digital playground, where creativity and tech collide! From custom WordPress themes to beautiful graphics and more, my portfolio displays the best of my work. So, take a look around and see what I\'m all about.',
    'rewrite'             => array('slug' => 'portfolio', 'with_front' => false),
    'labels'              => array(
      'name'              => 'Case Studies',
      'add_new_item'      => 'Add New Case Study',
      'edit_item'         => 'Edit Case Study',
      'all_items'         => 'All Case Studies',
      'singular_name'     => 'Case Study'
    ),
    'menu_icon' => 'dashicons-portfolio'
  ));
}

add_action('init', 'custom_post_types');


function custom_post_taxonomy()
{
  register_taxonomy(
    'categories',
    'case-studies',
    array(
      'public' => true,
      'hierarchical' => true,
      'labels' => array(
        'name' => 'Categories',
        'add_new_item' => 'Add New Category',
        'edit_item' => 'Edit Category',
        'all_items' => 'All Categories',
        'singular_name' => 'Category',
        'add_or_remove_items' => 'Add or remove categories',
        'back_to_items' => '← Back to categories',
        'view_item' => 'View Categories',
        'search_items' => 'Search Categories',
        'not_found' => 'No categories found',
        'choose_from_most_used' => 'Choose from the most used categories',
        'popular_items' => 'Popular Categories',
        'separate_items_with_commas' => 'Separate categories with commas',
        'update_item' => 'Update Category',
        'new_item_name' => 'New Category Name',
        'parent_item' => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
      ),
      'rewrite' => array('slug' => 'case-categories', 'with_front' => false),
    )
  );
  register_taxonomy(
    'skills',
    'case-studies',
    array(
      'public' => true,
      'hierarchical' => true,
      'labels' => array(
        'name' => 'Skills',
        'add_new_item' => 'Add New Skill',
        'edit_item' => 'Edit Skill',
        'all_items' => 'All Skills',
        'singular_name' => 'Skill',
        'add_or_remove_items' => 'Add or remove skills',
        'back_to_items' => '← Back to skills',
        'view_item' => 'View Skills',
        'search_items' => 'Search Skills',
        'not_found' => 'No skills found',
        'choose_from_most_used' => 'Choose from the most used skills',
        'popular_items' => 'Popular Skills',
        'separate_items_with_commas' => 'Separate skills with commas',
        'update_item' => 'Update Skill',
        'new_item_name' => 'New Skill Name',
        'parent_item' => 'Parent Skill',
        'parent_item_colon' => 'Parent Skill:',
      ),
      'rewrite' => array('slug' => 'skills', 'with_front' => false),
    )
  );
}
add_action('init', 'custom_post_taxonomy');


// Custom fields for Case Studies

// Project Brief
function brief_field()
{
  add_meta_box(
    'brief_field', // ID of the meta box
    'Brief Field', // Title of the meta box
    'brief_field_callback', // Callback function to display the meta box
    'case-studies', // Post type to display the meta box on
    'normal', // Location of the meta box
    'default' // Priority of the meta box
  );
}

function brief_field_callback($post)
{
  $value = get_post_meta($post->ID, '_brief_field', true); ?>

  <label for="brief_field">Brief Field:</label>
  <textarea id="brief_field" rows="10" style="width:100%;" name="brief_field" value="<?php echo esc_attr($value); ?>"><?php echo esc_attr($value); ?></textarea>

<?php
}

function save_brief_field($post_id)
{
  if (isset($_POST['brief_field'])) {
    update_post_meta($post_id, '_brief_field', sanitize_text_field($_POST['brief_field']));
  }
}

// Challenges
function challenges_field()
{
  add_meta_box(
    'challenges_field', // ID of the meta box
    'Challenges Field', // Title of the meta box
    'challenges_field_callback', // Callback function to display the meta box
    'case-studies', // Post type to display the meta box on
    'normal', // Location of the meta box
    'default' // Priority of the meta box
  );
}

function challenges_field_callback($post)
{
  $value = get_post_meta($post->ID, '_challenges_field', true); ?>

  <label for="challenges_field">Challenges Field:</label>
  <textarea id="challenges_field" rows="10" style="width:100%;" name="challenges_field" value="<?php echo esc_attr($value); ?>"><?php echo esc_attr($value); ?></textarea>

<?php
}

function save_challenges_field($post_id)
{
  if (isset($_POST['challenges_field'])) {
    update_post_meta($post_id, '_challenges_field', sanitize_text_field($_POST['challenges_field']));
  }
}

// Solutions
function solutions_field()
{
  add_meta_box(
    'solutions_field', // ID of the meta box
    'Solutions Field', // Title of the meta box
    'solutions_field_callback', // Callback function to display the meta box
    'case-studies', // Post type to display the meta box on
    'normal', // Location of the meta box
    'default' // Priority of the meta box
  );
}

function solutions_field_callback($post)
{
  $value = get_post_meta($post->ID, '_solutions_field', true); ?>

  <label for="solutions_field">Solutions Field:</label>
  <textarea id="solutions_field" rows="10" style="width:100%;" name="solutions_field" value="<?php echo esc_attr($value); ?>"><?php echo esc_attr($value); ?></textarea>

<?php
}

function save_solutions_field($post_id)
{
  if (isset($_POST['solutions_field'])) {
    update_post_meta($post_id, '_solutions_field', sanitize_text_field($_POST['solutions_field']));
  }
}

// Result / Testimonial
function result_field()
{
  add_meta_box(
    'result_field', // ID of the meta box
    'Result Field', // Title of the meta box
    'result_field_callback', // Callback function to display the meta box
    'case-studies', // Post type to display the meta box on
    'normal', // Location of the meta box
    'default' // Priority of the meta box
  );
}

function result_field_callback($post)
{
  $value = get_post_meta($post->ID, '_result_field', true); ?>

  <label for="result_field">Result Field:</label>
  <textarea id="result_field" style="width:100%;" rows="10" name="result_field" value="<?php echo esc_attr($value); ?>"><?php echo esc_attr($value); ?></textarea>

<?php
}


function save_result_field($post_id)
{
  if (isset($_POST['result_field'])) {
    update_post_meta($post_id, '_result_field', sanitize_text_field($_POST['result_field']));
  }
}

// Result / Testimonial
function video_field()
{
  add_meta_box(
    'video_field', // ID of the meta box
    'Video Field', // Title of the meta box
    'video_field_callback', // Callback function to display the meta box
    'case-studies', // Post type to display the meta box on
    'normal', // Location of the meta box
    'default' // Priority of the meta box
  );
}

function video_field_callback($post)
{
  $value = get_post_meta($post->ID, '_video_field', true); ?>

  <label for="video_field">Video Field:</label>
  <input type="url" name="video_field" id="video_field" value="<?php echo esc_attr($value); ?>">

<?php
}


function save_video_field($post_id)
{
  if (isset($_POST['video_field'])) {
    update_post_meta($post_id, '_video_field', $_POST['video_field']);
  }
}






// Images
function image_uploads()
{
  add_meta_box(
    'image_upload',
    'Images',
    'image_upload_callback',
    'case-studies',
    'normal',
    'high'
  );
}

function image_upload_callback($post)
{
  wp_nonce_field('image_upload', 'image_upload_nonce');

  $images = get_post_meta($post->ID, '_images', true);

?>

  <table class="form-table">
    <tbody>
      <tr>
        <th style="width:100px"><label for="images">Images:</label></th>
        <td style="width:auto">
          <a href="#" class="upload-image button">Upload Image</a>
          <table id="images-table">
            <?php if (!empty($images)) : ?>
              <?php foreach ($images as $image) : ?>
                <tr class="image-row">
                  <td>
                    <img src="<?php echo esc_url($image['url']); ?>" style="width:100px;height:auto;"><br>
                    <input type="hidden" name="image[]" value="<?php echo esc_attr($image['url']); ?>">
                    <a href="#" class="remove-image button">Remove Image</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </table>
        </td>
      </tr>
    </tbody>
  </table>

  <script>
    jQuery(document).ready(function($) {
      $('#images-table').on('click', '.remove-image', function() {
        $(this).closest('tr').remove();
        return false;
      });
      $('.upload-image').on('click', function() {
        var file_frame;

        if (file_frame) {
          file_frame.open();
          return;
        }

        file_frame = wp.media.frames.file_frame = wp.media({
          title: 'Select Image',
          button: {
            text: 'Select'
          },
          multiple: false
        });

        file_frame.on('select', function() {
          var selection = file_frame.state().get('selection');
          if (!selection) {
            return;
          }
          selection.each(function(attachment) {
            var imageUrl = attachment.attributes.url;
            var altText = attachment.attributes.alt || '';
            $('#images-table').append(`
            <tr class="image-row">
              <td>
                <img src="` + imageUrl + `" style="width:100px;height:auto;"><input type="hidden" name="image[]" value="` + imageUrl + `"><input type="hidden" name="image_alt[]" value="` + altText + `"><button class="remove-image">Remove Image</button>
              </td>
            </tr>
            `);
          });
        });

        file_frame.open();

        return false;
      });
    });
  </script>

<?php
}

function save_image_uploads($post_id)
{
  if (!isset($_POST['image_upload_nonce']) || !wp_verify_nonce($_POST['image_upload_nonce'], 'image_upload')) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }
  $images = array();

  if (isset($_POST['image']) && is_array($_POST['image'])) {
    foreach ($_POST['image'] as $key => $image) {
      if (!empty($image)) {
        $altText = isset($_POST['image_alt'][$key]) ? sanitize_text_field($_POST['image_alt'][$key]) : '';
        $images[] = array(
          'url' => esc_url_raw($image),
          'alt' => $altText,
        );
      }
    }
  }
  update_post_meta($post_id, '_images', $images);
}


// Challenges & Solutions
function featured_field()
{
  add_meta_box(
    'featured_field', // ID of the meta box
    'Featured Field', // Title of the meta box
    'featured_field_callback', // Callback function to display the meta box
    'case-studies', // Post type to display the meta box on
    'side', // Location of the meta box
    'default' // Priority of the meta box
  );
}

function featured_field_callback($post)
{
  // Add a nonce field for security purposes
  wp_nonce_field('featured_field', 'featured_field_nonce');

  $value = get_post_meta($post->ID, '_featured_field', true);
?>

  <input type="checkbox" name="featured_field" id="featured_field" value="1" <?php checked($value, '1'); ?>>
  <label for="featured_field"> Featured Field</label>

<?php
}

function save_featured_field($post_id)
{
  // Check if our nonce is set.
  if (!isset($_POST['featured_field_nonce'])) {
    return;
  }

  // Verify that the nonce is valid.
  if (!wp_verify_nonce($_POST['featured_field_nonce'], 'featured_field')) {
    return;
  }

  // Check if the checkbox is checked.
  if (isset($_POST['featured_field']) && $_POST['featured_field'] == '1') {
    update_post_meta($post_id, '_featured_field', '1');
  } else {
    update_post_meta($post_id, '_featured_field', '0');
  }
}

// Add Approach Fields
function approach_fields()
{
  global $post;
  $id = $post->ID;
  if ($id == 48) {
    add_meta_box(
      'approach_fields', // ID of the meta box
      'Approach Fields', // Title of the meta box
      'approach_fields_callback', // Callback function to display the meta box
      'page', // Post type to display the meta box on
      'normal', // Location of the meta box
      'default' // Priority of the meta box
    );
  } else {
    return;
  }
}
// Approach Fields Callback
function approach_fields_callback($post)
{
  wp_enqueue_media(); // Enqueue the WordPress media uploader
  $approach_fields = get_post_meta($post->ID, '_approach_fields', true);
  $approach_fields = json_decode($approach_fields, true); // Decode the JSON string
?>

  <div id="approach-fields-container">
    <?php
    if ($approach_fields && count($approach_fields) > 0) {
      foreach ($approach_fields as $index => $approach_field) { ?>
        <div class="approach-field-group">

          <label for="approach_field_<?php echo $index; ?>_title">Title:</label>
          <input type="text" id="approach_field_<?php echo $index; ?>_title" name="approach_fields[<?php echo $index; ?>][approach_field_title]" value="<?php echo esc_attr($approach_field['approach_field_title']); ?>">

          <label for="approach_field_<?php echo $index; ?>_description">Description:</label>
          <textarea id="approach_field_<?php echo $index; ?>_description" style="width:100%;" rows="10" name="approach_fields[<?php echo $index; ?>][approach_field_description]"><?php echo esc_attr($approach_field['approach_field_description']); ?></textarea>

          <label for="approach_field_<?php echo $index; ?>_image">Image:</label>
          <input type="hidden" id="approach_field_<?php echo $index; ?>_image" name="approach_fields[<?php echo $index; ?>][approach_field_image_id]" value="<?php echo isset($approach_field['approach_field_image_id']) ? esc_attr($approach_field['approach_field_image_id']) : ''; ?>">

          <img id="approach_field_<?php echo $index; ?>_image_preview" src="<?php echo isset($approach_field['approach_field_image_id']) ? esc_url(wp_get_attachment_url($approach_field['approach_field_image_id'])) : ''; ?>" style="max-width: 150px; max-height: 150px;" />

          <button type="button" class="upload-approach-field-image button-secondary" data-target-id="approach_field_<?php echo $index; ?>">Upload Image</button>
          <button type="button" class="remove-approach-field-image button-secondary" data-target-id="approach_field_<?php echo $index; ?>">Remove Image</button>


          <button type="button" class="remove-approach-field button-secondary">Remove Field Group</button>
        </div>
    <?php }
    }
    ?>
  </div>

  <button type="button" id="add-approach-field" class="button-primary">Add Field Group</button>

  <script>
    jQuery(document).ready(function($) {
      let approachContainer = $('#approach-fields-container');

      $('#add-approach-field').click(function(event) {
        event.preventDefault();

        let index = approachContainer.children().length;

        let approachField = `
          <div class="approach-field-group">
            <label for="approach_field_${index}_title">Title:</label>
            <input type="text" id="approach_field_${index}_title" name="approach_fields[${index}][approach_field_title]">

            <label for="approach_field_${index}_description">Description:</label>
            <textarea id="approach_field_${index}_description" style="width:100%;" rows="10" name="approach_fields[${index}][approach_field_description]"></textarea>

            <button type="button" class="remove-approach-field button-secondary">Remove Field Group</button>
          </div>
        `;
        approachContainer.append(approachField);
      });

      approachContainer.on('click', '.remove-approach-field', function(event) {
        event.preventDefault();
        $(this).closest('.approach-field-group').remove();
      });


      // Image upload handler
      approachContainer.on('click', '.upload-approach-field-image', function(event) {
        event.preventDefault();
        let targetId = $(this).data('target-id');
        let imageInput = $('#' + targetId + '_image');
        let imagePreview = $('#' + targetId + '_image_preview');

        let frame = wp.media({
          title: 'Select or Upload Image',
          button: {
            text: 'Use this image'
          },
          multiple: false
        });

        frame.on('select', function() {
          let attachment = frame.state().get('selection').first().toJSON();
          imageInput.val(attachment.id);
          imagePreview.attr('src', attachment.url);
        });

        frame.open();
      });

      // Image removal handler
      approachContainer.on('click', '.remove-approach-field-image', function(event) {
        event.preventDefault();
        let targetId = $(this).data('target-id');
        let imageInput = $('#' + targetId + '_image');
        let imagePreview = $('#' + targetId + '_image_preview');

        imageInput.val('');
        imagePreview.attr('src', '');
      });

    });
  </script>
<?php
}

// Save Approach Fields
function save_approach_fields_data($post_id)
{
  if (isset($_POST['approach_fields'])) {
    $approach_fields = $_POST['approach_fields'];
    update_post_meta($post_id, '_approach_fields', json_encode($approach_fields));
  }
}


// Add Work Fields
function work_fields()
{
  global $post;
  $id = $post->ID;
  if ($id == 48) {
    add_meta_box(
      'work_fields', // ID of the meta box
      'Work Fields', // Title of the meta box
      'work_fields_callback', // Callback function to display the meta box
      'page', // Post type to display the meta box on
      'normal', // Location of the meta box
      'default' // Priority of the meta box
    );
  } else {
    return;
  }
}
// Approach Fields Callback
function work_fields_callback($post)
{
  $work_fields = get_post_meta($post->ID, '_work_fields', true);
?>

  <div id="work-fields-container">
    <?php
    if ($work_fields && count($work_fields) > 0) {
      foreach ($work_fields as $index => $work_field) { ?>
        <div class="work-field-group">
          <label for="work_field_<?php echo $index; ?>_title">Title:</label>
          <input type="text" id="work_field_<?php echo $index; ?>_title" name="work_fields[<?php echo $index; ?>][work_field_title]" value="<?php echo esc_attr($work_field['work_field_title']); ?>"><br>

          <label for="work_field_<?php echo $index; ?>_date">Date:</label>
          <input type="text" id="work_field_<?php echo $index; ?>_date" name="work_fields[<?php echo $index; ?>][work_field_date]" value="<?php echo esc_attr($work_field['work_field_date']); ?>"><br>

          <label for="work_field_<?php echo $index; ?>_company">Company:</label>
          <input type="text" id="work_field_<?php echo $index; ?>_company" name="work_fields[<?php echo $index; ?>][work_field_company]" value="<?php echo esc_attr($work_field['work_field_company']); ?>"><br>

          <label for="work_field_<?php echo $index; ?>_role">Role:</label>
          <textarea id="work_field_<?php echo $index; ?>_role" style="width:100%;" rows="10" name="work_fields[<?php echo $index; ?>][work_field_role]"><?php echo esc_textarea(str_replace('<br>', "\r\n", $work_field['work_field_role'])); ?>
</textarea>

          <button type="button" class="remove-work-field button-secondary">Remove Field Group</button>
        </div>
    <?php }
    }
    ?>
  </div>

  <button type="button" id="add-work-field" class="button-primary">Add Field Group</button>



  <script>
    jQuery(document).ready(function($) {
      let workContainer = $('#work-fields-container');

      $('#add-work-field').click(function(event) {
        event.preventDefault();

        let index = workContainer.children().length;

        let workField = `
          <div class="work-field-group">
            <label for="work_field_${index}_title">Title:</label>
            <input type="text" id="work_field_${index}_title" name="work_fields[${index}][work_field_title]"><br>
            
            <label for="work_field_${index}_date">Date:</label>
            <input type="text" id="work_field_${index}_date" name="work_fields[${index}][work_field_date]"><br>

            <label for="work_field_${index}_company">Company:</label>
            <input type="text" id="work_field_${index}_company" name="work_fields[${index}][work_field_company]"><br>

            <label for="work_field_${index}_role">Role:</label>
            <textarea id="work_field_${index}_role" style="width:100%;" rows="10" name="work_fields[${index}][work_field_role]"></textarea>

            <button type="button" class="remove-work-field button-secondary">Remove Field Group</button>
          </div>
        `;
        workContainer.append(workField);
      });

      workContainer.on('click', '.remove-work-field', function(event) {
        event.preventDefault();
        $(this).closest('.work-field-group').remove();
      });
    });
  </script>
<?php
}

// Save Work Fields Data
function save_work_fields_data($post_id)
{
  if (isset($_POST['work_fields'])) {
    $work_fields = $_POST['work_fields'];
    foreach ($work_fields as &$work_field) {
      $work_field['work_field_role'] = wp_kses_post($work_field['work_field_role']);
      $work_field['work_field_role'] = str_replace(["\r\n", "\r", "\n"], '<br>', $work_field['work_field_role']);
    }
    update_post_meta($post_id, '_work_fields', $work_fields);
  }
}




// Call the functions within add_custom_fields
function add_custom_fields()
{
  add_action('add_meta_boxes', 'brief_field');
  add_action('add_meta_boxes', 'challenges_field');
  add_action('add_meta_boxes', 'solutions_field');
  add_action('add_meta_boxes', 'result_field');
  add_action('add_meta_boxes', 'video_field');
  add_action('add_meta_boxes', 'image_uploads');
  add_action('add_meta_boxes', 'featured_field');
  add_action('add_meta_boxes', 'approach_fields');
  add_action('add_meta_boxes', 'work_fields');
  add_action('save_post_case-studies', 'save_brief_field');
  add_action('save_post_case-studies', 'save_challenges_field');
  add_action('save_post_case-studies', 'save_solutions_field');
  add_action('save_post_case-studies', 'save_result_field');
  add_action('save_post_case-studies', 'save_video_field');
  add_action('save_post_case-studies', 'save_image_uploads');
  add_action('save_post_case-studies', 'save_featured_field');
  add_action('save_post', 'save_approach_fields_data');
  add_action('save_post', 'save_work_fields_data');
}

add_action('init', 'add_custom_fields');
