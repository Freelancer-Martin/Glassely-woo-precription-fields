<?php
add_action( 'add_meta_boxes', 'add_meta_boxes' );

function add_meta_boxes()
{
    add_meta_box(
        'woocommerce-order-my-custom',
        __( 'Lenses Information' ),
        'order_my_custom',
        'shop_order',
        'side',
        'default'
    );
}
function order_my_custom()
{
  //$field_info = get_user_meta(get_current_user_id(), 'cool_json_option', true);
  //$quest_field_info = get_user_meta(get_current_user_id(), 'quest_cool_json_option', true);
  $cool_options = get_option('these_second_options');
  $field_info = json_decode($cool_options, TRUE);
  //print_r($field_info);
  ?>

  <table class="table myTable" id="myTable">
            <thead>
                <tr>
                    <th>Field Name</th>
                    <th>Field Value</th>
                </tr>
            </thead>
            <tbody>


            <tr>
                <td>Lenses Name</td>
                <td><?php echo $field_info['lenses-final-name']; ?></td>
            </tr>
            <tr>
                <td>Single Vision Lenses</td>
                <td><?php echo $field_info['lense_style_new']; ?></td>
            </tr>
            <tr>
                <td>Lenses Type</td>
                <td><?php echo $field_info['lenses_type']; ?></td>
            </tr>
            <tr>
                <td>Right (OD) SPH</td>
                <td><?php echo $field_info['right-od-sph']; ?></td>
            </tr>
            <tr>
                <td>Right (OD) CYL</td>
                <td><?php echo $field_info['right-od-cyl']; ?></td>
            </tr>
            <tr>
                <td>Right (OD) AXIS</td>
                <td><?php echo $field_info['right-od-axis']; ?></td>
            </tr>
            <tr>
                <td>Right (OD) ADD</td>
                <td><?php echo $field_info['right-od-add']; ?></td>
            </tr>
            <tr>
                <td>Right (OD) PD</td>
                <td><?php echo $field_info['right-od-pd']; ?></td>
            </tr>
            <tr>
                <td>Left (OS) SPH</td>
                <td><?php echo $field_info['left-os-sph']; ?></td>
            </tr>
            <tr>
                <td>Left (OS) CYL</td>
                <td><?php echo $field_info['left-os-cyl']; ?></td>
            </tr>
            <tr>
                <td>Left (OS) AXIS</td>
                <td><?php echo $field_info['left-os-axis']; ?></td>
            </tr>
            <tr>
                <td>Left (OS) ADD</td>
                <td><?php echo $field_info['left-os-add']; ?></td>
            </tr>
            <tr>
                <td>Left (OS) PD</td>
                <td><?php echo $field_info['left-os-pd']; ?></td>
            </tr>

            </tbody>
        </table>
        <table class="table myTable" id="myTable">
        <thead>
            <tr>
                <th>Field Name</th>
                <th>Field Value</th>
            </tr>
        </thead>
        <tbody>


        <tr>
            <td>Quest Lenses Name</td>
            <td><?php echo $field_info['quest-lenses-final-name']; ?></td>
        </tr>
        <tr>
            <td>Quest Lenses Type</td>
            <td><?php echo $field_info['lenses_type']; ?></td>
        </tr>
        <tr>
            <td>Single Vision Lenses</td>
            <td><?php echo $field_info['lense_style_new']; ?></td>
        </tr>
        <tr>
            <td>Quest Right (OD) SPH</td>
            <td><?php echo $field_info['quest-right-od-sph']; ?></td>
        </tr>
        <tr>
            <td>Quest Right (OD) CYL</td>
            <td><?php echo $field_info['quest-right-od-cyl']; ?></td>
        </tr>
        <tr>
            <td>Quest Right (OD) AXIS</td>
            <td><?php echo $field_info['quest-right-od-axis']; ?></td>
        </tr>
        <tr>
            <td>Quest Right (OD) ADD</td>
            <td><?php echo $field_info['quest-right-od-add']; ?></td>
        </tr>
        <tr>
            <td>Quest Right (OD) PD</td>
            <td><?php echo $field_info['quest-right-od-pd']; ?></td>
        </tr>
        <tr>
            <td>Quest Left (OS) SPH</td>
            <td><?php echo $field_info['quest-left-os-sph']; ?></td>
        </tr>
        <tr>
            <td>Quest Left (OS) CYL</td>
            <td><?php echo $field_info['quest-left-os-cyl']; ?></td>
        </tr>
        <tr>
            <td>Quest Left (OS) AXIS</td>
            <td><?php echo $field_info['quest-left-os-axis']; ?></td>
        </tr>
        <tr>
            <td>Quest Left (OS) ADD</td>
            <td><?php echo $field_info['quest-left-os-add']; ?></td>
        </tr>
        <tr>
            <td>Quest Left (OS) PD</td>
            <td><?php echo $field_info['quest-left-os-pd']; ?></td>
        </tr>

        </tbody>
    </table>


<?php }

 ?>
