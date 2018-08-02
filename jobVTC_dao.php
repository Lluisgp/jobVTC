<?php
/**
 * Insert new city on db
 * @global type $wpdb
 * @param type $new_city_name
 * @param type $new_dlc_name
 */
function dao_insert_city($new_city_name, $new_dlc_name) {
    
    $delimiters = " \t\r\n\f\v";
    $new_city_name = ucwords($new_city_name, $delimiters);   
    $new_dlc_name = ucwords($new_dlc_name, $delimiters);
        
    global $wpdb;
    $qu = $wpdb->insert(
            $wpdb->prefix . 'jobvtc_cities', array(
        'cityname' => $new_city_name,
        'dlc' => $new_dlc_name
            )
    );
    if ($qu) {
        return true;
    } else {
        return false;
    }
}
