<?php
    function quest_prescription_frontend_user_field_two_pd() {
      function quest_select_field_output($min, $max, $step, $class_name, $type, $name, $id, $style, $default) {
        $html_tag .= '<select name="'.$name.'" class=" select-input '.$class_name.'"  type="'.$type.'" id="'.$id.'" style="'.$style.'" >';
          $items = array();
          for ($x = $min; $x <= $max; $x += $step) {

            if ( $x == $default  ) {
              $html_tag .= '<option value="'.$default.'" selected >'.$default.'</option>';

            } else {
                $html_tag .= '<option value="'.$x.'">'.$x.'</option>';
            }

          }


        $html_tag .= '</select>';
        return $html_tag;
      }

      $data_array = get_option('these_second_options');
      $field_info = json_decode($data_array, TRUE);
      //print_r($field_info);
      //$field .= array();
        $field .= '<div style="display:none;" class="quest-front-end-prescription-container"  >';

      $field .= '<span id="display" ></span>
      <div class="my-account-input-container">
        <label class="my-account-input-title" >Glasses prescription</label>

      </div>';

      $field .= '<label for="my-account-input-fields" >';

      $field .= '<div class="input-container" >
        <label class="my-account-input-field-text" >Right (OD)</label>
      </div>';
      $field .= '<div class="input-container" >
        <label class="field-label-text">SPH</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Sphere indicates the amount of lens power, measured in diopetrs(D), prescribed to correct nearsightedness or farsightedness"></a>
        '.quest_select_field_output(-16, 8, 0.25, 'postbox my-account-input-field field_classes', 'number', 'quest-right-od-sph', 'quest-right-od-sph', '', $field_info['quest-right-od-sph']).'
        </div>';

      $field .= '<div class="input-container" >
        <label class="field-label-text">CYL</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Cylinder indicates the amount of lens power for astigmatism, if nothing appears in this column, either you have no astigmatism is so slight that it is not necessary to correct it with your lenses"></a>
        '.quest_select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes', 'number', 'quest-right-od-cyl', 'quest-right-od-cyl', '', $field_info['quest-right-od-cyl']).'
        </div>';

      $field .= '<div class="input-container" >
        <label class="field-label-text">AXIS</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="The axis number on your prescription tells in which direction they must position any cylindrical power in your lenses (required for people with astigmatism)"></a>
        '.quest_select_field_output(0, 180, 1, 'postbox my-account-input-field field_classes', 'number', 'quest-right-od-axis', 'quest-right-od-axis', '', $field_info['quest-right-od-axis']).'
        </div>';

      $field .= '  <div class="input-container" >
          <label class="field-label-text">ADD</label>
          <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="ADD, is the additional corrections required for reading. Sometimes NEAR is used instead of ADD. When you have one numbers, leave it to 0"></a>
          '.quest_select_field_output(-0, 3.5, 0.25, 'postbox my-account-input-field field_classes', 'number', 'quest-right-od-add', 'quest-right-od-add', '', $field_info['quest-right-od-add']).'
        </div>';

      $field .= '</label>
      <label for="my-account-input-fields" >';

      $field .= '<div class="input-container" >
        <label class="my-account-input-field-text" >Left  (OS)</label>
      </div>';


      $field .= '<div class="input-container" >
        <label class="field-label-text">SPH</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Sphere indicates the amount of lens power, measured in diopetrs(D), prescribed to correct nearsightedness or farsightedness"></a>
        '.quest_select_field_output(-16, 8, 0.25, 'postbox my-account-input-field field_classes', 'select', 'quest-left-os-sph', 'quest-left-os-sph', '', $field_info['quest-left-os-sph']).'
      </div>';

      $field .= '  <div class="input-container" >
          <label class="field-label-text">CYL</label>
          <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Cylinder indicates the amount of lens power for astigmatism, if nothing appears in this column, either you have no astigmatism is so slight that it is not necessary to correct it with your lenses"></a>
          '.quest_select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes', 'select', 'quest-left-os-cyl', 'quest-left-os-cyl', '', $field_info['quest-left-os-cyl']).'
          </div>';

      $field .= '<div class="input-container" >
        <label class="field-label-text">AXIS</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="The axis number on your prescription tells in which direction they must position any cylindrical power in your lenses (required for people with astigmatism)"></a>
        '.quest_select_field_output(0, 180, 1, 'postbox my-account-input-field field_classes', 'select', 'quest-left-os-axis', 'quest-left-os-axis', '', $field_info['quest-left-os-axis']).'
        </div>';

      $field .= '<div  class="input-container" >
        <label class="field-label-text">ADD</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="ADD, is the additional corrections required for reading. Sometimes NEAR is used instead of ADD. When you have one numbers, leave it to 0"></a>
        '.quest_select_field_output(0, 3.5, 0.25, 'postbox my-account-input-field field_classes', 'select', 'quest-left-os-add', 'quest-left-os-add', '', $field_info['quest-left-os-add']).'
        </div>';


      $field .=
      '<div style="margin-top: 5%; margin-left: 10%; padding: 4%; background-color: #e7e8e8; margin-bottom: 5%;" class="input-container" >
        <label  class="field-label-text-side">PD</label>
        <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Pupilar distance is the distance from the centre of one pupil to the centre of the other pupil measured in mm. If you have 2 PD numbers then make sure to add them to proper eye"></a>
        '.quest_select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes', 'select', 'quest-left-os-pd', 'quest-left-os-pd', '', $field_info['quest-left-os-pd']).'
        <label style="display: none" class="left-field-show field-label-text-side"></label>
        <a style="display: none" class="field-label-info  left-field-show"  ></a>
        '.quest_select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes left-field-show', 'number', 'quest-right-od-pd', 'quest-right-od-pd', 'display:none;', $field_info['quest-right-od-pd']).'
        <div style="margin-top: 5%; margin-left: 5%;" class="field-2pd-second" >
          <p class="my-account-input-info" ><a > I have 2 PD number </a></p>
          <p class="my-account-input-info" ><a > How to find your PD </a></p>
        </div>
        <div style="display: none;"  style="margin-top: 5%; margin-left: 5%;" class="field-1pd-second" >
          <p  class="my-account-input-info" ><a> I have 1 PD number </a></p>
          <p class="my-account-input-info" ><a > How to find your PD </a></p>
        </div>
      </div>
      ';

      $field .= '</label>
      <p><a class="quest-prescription-button col-lg-offset-1" >Default Prescription</a><a onclick="quest_save_cool_options()" class="front-end-lenses-next"  >Next step</a></p>
      <p class="col-lg-offset-1 clear-all-fields" ><input type="checkbox"  class="clear-all-fields">I wand glasses without prescription. Fashion lenses<br></p>
      </div>
      ';

      print $field;

    }


function prescription_frontend_user_field_two_pd() {
    function select_field_output($min, $max, $step, $class_name, $type, $name, $id, $style, $default) {
      $html_tag .= '<select name="'.$name.'" class=" select-input '.$class_name.'"  type="'.$type.'" id="'.$id.'" style="'.$style.'" >';
        for ($x = $min; $x <= $max; $x += $step) {

          if ( $x == $default  )
            {
              $html_tag .= '<option value="'.$default.'" selected>'.$default.'</option>';

            }
            else {
              $html_tag .= '<option value="'.$x.'">'.$x.'</option>';
            }

        }
      $html_tag .= '</select>';
      return $html_tag;
    }

          $data_array = get_option('these_second_options');
          $field_info = json_decode($data_array, TRUE);
          //print_r($field_info);
          //$field .= array();
            $field .= '<div  class="front-end-prescription-container"  >';

          $field .= '<span id="display" ></span>
            <div class="my-account-input-container">
            <label class="my-account-input-title" >Glasses prescription</label>
          </div>';

          $field .= '<label for="my-account-input-fields" >';

          $field .= '<div class="input-container" >
            <label class="my-account-input-field-text" >Right (OD)</label>
          </div>';
          $field .= '<div class="input-container" >
            <label class="field-label-text">SPH</label>
            <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Sphere indicates the amount of lens power, measured in diopetrs(D), prescribed to correct nearsightedness or farsightedness"></a>
            '.select_field_output(-16, 8, 0.25, 'postbox my-account-input-field field_classes', 'number', 'right-od-sph', 'right-od-sph', '', $field_info['right-od-sph']).'
            </div>';

          $field .= '<div class="input-container" >
            <label class="field-label-text">CYL</label>
            <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Cylinder indicates the amount of lens power for astigmatism, if nothing appears in this column, either you have no astigmatism is so slight that it is not necessary to correct it with your lenses"></a>
            '.select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes', 'number', 'right-od-cyl', 'right-od-cyl', '', $field_info['right-od-cyl']).'
            </div>';

          $field .= '<div class="input-container" >
            <label class="field-label-text">AXIS</label>
            <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="The axis number on your prescription tells in which direction they must position any cylindrical power in your lenses (required for people with astigmatism)"></a>
            '.select_field_output(0, 180, 1, 'postbox my-account-input-field field_classes', 'number', 'right-od-axis', 'right-od-axis', '', $field_info['right-od-axis']).'
            </div>';

          $field .= '  <div class="input-container" >
              <label class="field-label-text">ADD</label>
              <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="ADD, is the additional corrections required for reading. Sometimes NEAR is used instead of ADD. When you have one numbers, leave it to 0"></a>
              '.select_field_output(0, 3.5, 0.25, 'postbox my-account-input-field field_classes', 'number', 'right-od-add', 'right-od-add', '', $field_info['right-od-add']).'
            </div>';

          $field .= '</label>
          <label for="my-account-input-fields" >';

          $field .= '<div class="input-container" >
            <label class="my-account-input-field-text" >Left  (OS)</label>
          </div>';


          $field .= '<div class="input-container" >
            <label class="field-label-text">SPH</label>
            <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Sphere indicates the amount of lens power, measured in diopetrs(D), prescribed to correct nearsightedness or farsightedness"></a>
            '.select_field_output(-16, 8, 0.25, 'postbox my-account-input-field field_classes', 'select', 'left-os-sph', 'left-os-sph', '', $field_info['left-os-sph']).'
          </div>';

          $field .= '  <div class="input-container" >
              <label class="field-label-text">CYL</label>
              <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Cylinder indicates the amount of lens power for astigmatism, if nothing appears in this column, either you have no astigmatism is so slight that it is not necessary to correct it with your lenses"></a>
              '.select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes', 'select', 'left-os-cyl', 'left-os-cyl', '', $field_info['left-os-cyl']).'
              </div>';

          $field .= '<div class="input-container" >
            <label class="field-label-text">AXIS</label>
            <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="The axis number on your prescription tells in which direction they must position any cylindrical power in your lenses (required for people with astigmatism)"></a>
            '.select_field_output(0, 180, 1, 'postbox my-account-input-field field_classes', 'select', 'left-os-axis', 'left-os-axis', '', $field_info['left-os-axis']).'
            </div>';

          $field .= '<div  class="input-container" >
            <label class="field-label-text">ADD</label>
            <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="ADD, is the additional corrections required for reading. Sometimes NEAR is used instead of ADD. When you have one numbers, leave it to 0"></a>
            '.select_field_output(0, 3.5, 0.25, 'postbox my-account-input-field field_classes', 'select', 'left-os-add', 'left-os-add', '', $field_info['left-os-add']).'
            </div>';


          $field .=
          '<div style="margin-top: 5%; margin-left: 10%; padding: 4%; background-color: #e7e8e8; margin-bottom: 5%;" class="input-container" >
            <label  class="field-label-text-side">PD</label>
            <a class="field-label-info dashicons-before dashicons-editor-help" href="#" data-toggle="tooltip" title="Pupilar distance is the distance from the centre of one pupil to the centre of the other pupil measured in mm. If you have 2 PD numbers then make sure to add them to proper eye"></a>
            '.select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes', 'select', 'left-os-pd', 'left-os-pd', '', $field_info['left-os-pd']).'
            <label style="display: none" class="left-field-show field-label-text-side"></label>
            <a style="display: none" class="field-label-info  left-field-show"  ></a>
            '.select_field_output(-7, 7, 0.25, 'postbox my-account-input-field field_classes left-field-show', 'number', 'right-od-pd', 'right-od-pd', 'display:none;', $field_info['right-od-pd']).'
            <div style="margin-top: 5%; margin-left: 5%;" class="field-2pd-second" >
              <p class="my-account-input-info" ><a > I have 2 PD number </a></p>
              <p class="my-account-input-info" ><a > How to find your PD </a></p>
            </div>
            <div style="display: none;"  style="margin-top: 5%; margin-left: 5%;" class="field-1pd-second" >
              <p  class="my-account-input-info" ><a> I have 1 PD number </a></p>
              <p class="my-account-input-info" ><a > How to find your PD </a></p>
            </div>
          </div>
          ';

          $field .= '</label>
          <p><a class="nbs-ajax-save prescription-button col-lg-offset-1" >New Prescription</a><a  class="front-end-lenses-next"  >Next step</a></p>
          <p class="col-lg-offset-1 clear-all-fields" ><input type="checkbox" " >I wand glasses without prescription. Fashion lenses<br></p>

          </div>
          ';

    print $field;

}
