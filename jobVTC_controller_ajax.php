<?php

defined('ABSPATH') or die('No direct access! Bad user!');

add_action('wp_ajax_vtc_controller_test', 'vtc_controller_test');

//DAO
require("jobVTC_dao.php"); // Data acces object

function vtc_controller_test() {

    $do_action = filter_input(INPUT_POST, 'do_action', FILTER_SANITIZE_STRING);

    switch ($do_action) {
        case 'show_cargo':
            header('Content-Type: application/json');
            //TODO: get some data
            $someData = "{'id':1,'name':'primera','dlc':'italia'}";
            echo json_encode($someData);
            exit;
        case 'insert_cargo':
            $new_cargo_name = filter_input(INPUT_POST, 'new_cargo_name', FILTER_SANITIZE_STRING);
            $new_cargo_dlc = filter_input(INPUT_POST, 'new_cargo_dlc', FILTER_SANITIZE_STRING);
            echo "<li>Insert cargo: name($new_cargo_name) and dlc ($new_cargo_dlc)</li>";
        case 'delete_cargo':
        case 'show_city':
        case 'insert_city':
            if (insert_city() == true) {
                //echo "City inserted with successful!";
                $return = array(
                    'message' => 'City inserted with successful!'
                );
            } else {
                $return = array(
                    'message' => 'Error!'
                );
            }
            wp_send_json($return);

        case 'delete_city':
        case 'giveme_load':
        case 'giveme_jobs':
        case 'verify':
        case 'giveme_my_jobs':
        default:
    }



    //echo "City inserted with successful!";
    header('Content-Type: application/json');
    //TODO: get some data
    $someData = '{"id":1,"name":"primera","dlc":"italia"}';
    echo json_encode($someData);
    exit;
}

/**
 * Insert city function
 * @return boolean
 */
function insert_city() {
    $new_city_name = filter_input(INPUT_POST, 'new_city_name', FILTER_SANITIZE_STRING);
    $new_city_dlc = filter_input(INPUT_POST, 'new_city_dlc', FILTER_SANITIZE_STRING);
    if (dao_insert_city($new_city_name, $new_city_dlc) == true) {
        return true;
    } else {
        throw new Exception('DB Error');
    }
}
