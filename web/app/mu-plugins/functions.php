<?php
// Hooks
add_filter( 'upload_mimes', 'capitaine_mime_types' );
add_filter( 'wp_check_filetype_and_ext', 'capitaine_file_types', 10, 4 );

// Autoriser l'import des fichiers SVG et WEBP
function capitaine_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  $mimes['webp'] = 'image/webp';
  return $mimes;
}

// Contrôle de l'import d'un WEBP
function capitaine_file_types( $types, $file, $filename, $mimes ) {
  if ( false !== strpos( $filename, '.webp' ) ) {
    $types['ext'] = 'webp';
    $types['type'] = 'image/webp';
  }
  return $types;
}

add_filter('gform_field_content', 'replace_required_label', 10, 5);
function replace_required_label($field_content, $field, $value, $lead_id, $form_id) {
    if ($field['isRequired']) {
        $field_content = str_replace('(Nécessaire)', '*', $field_content);
    }
    return $field_content;
}

// ACF Preview
function my_acf_admin_head() {
  $siteURL = get_site_url();
  ?>
  <style type="text/css">
      .image-preview { position:relative; right:0px; top:-400px; z-index:999999; border:1px solid #f2f2f2; background-color:#fff; padding:20px;}
      .image-preview img { width:400px; height:auto; display:block; }
      .acf-tooltip li:hover { background-color:#0074a9; }
      .acf-flexible-content .layout .acf-fc-layout-handle {
          /*background-color: #00B8E4;*/
          background-color: #202428;
          color: #eee;
      }

      .acf-repeater.-row > table > tbody > tr > td,
      .acf-repeater.-block > table > tbody > tr > td {
          border-top: 2px solid #202428;
      }

      .acf-repeater .acf-row-handle {
          vertical-align: top !important;
          padding-top: 16px;
      }

      .acf-repeater .acf-row-handle span {
          font-size: 20px;
          font-weight: bold;
          color: #202428;
      }

      .imageUpload img {
          width: 75px;
      }

      .acf-repeater .acf-row-handle .acf-icon.-minus {
          top: 30px;
      }

      .acf-icon.-clear {
          background-color: white;
      }

      .inside.acf-fields .acf-actions .acf-button[data-event="add-row"] {
          text-transform: uppercase;
          margin: 30px auto;
          background-color: black;
      }

      .inside.acf-fields .acf-actions .acf-button[data-name="add-layout"] {
          padding: 20px 30px;
          text-transform: uppercase;
          margin: 30px auto;
      }
  </style>
  <script>
      jQuery(document).ready(function($) {
          $('a[data-name=add-layout]').click(function(){
              waitForEl('.acf-tooltip li', function() {
                  $('.acf-tooltip li a').hover(function(){
                      imageTP = $(this).attr('data-layout');
                      $('.acf-tooltip').append('<div class="image-preview" style=" position:absolute; right:100%; top:50%; transform: translateY(-50%); z-index:999999; border:1px solid #f2f2f2; background-color:#fff; padding:20px;"><img class="img-fluid" style="width:500px; height:auto; display:block;" src="<?php echo get_template_directory_uri(); ?>/resources/images/' + imageTP + '.jpg"></div>');
                  }, function(){
                      $('.image-preview').remove();
                  });
              });
          })
          var waitForEl = function(selector, callback) {
              if (jQuery(selector).length) {
                  callback();
              } else {
                  setTimeout(function() {
                      waitForEl(selector, callback);
                  }, 100);
              }
          };
      })
  </script>
  <?php
}
add_action('acf/input/admin_head', 'my_acf_admin_head');