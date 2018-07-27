<?php

defined('ABSPATH') or die('No direct access! Bad user!');

function jobVTC_install() {
    global $wpdb;

    //Mysql
    $prefix = $wpdb->prefix . 'jobvtc_';
    $collate = $wpdb->get_charset_collate();

    $queries[0] = 'CREATE TABLE ' . $prefix . 'cargo ( 
        `cargoid` BIGINT NOT NULL AUTO_INCREMENT,
        `cargoname` TEXT NOT NULL,
        PRIMARY KEY (`cargoid`))
        ' . $collate;

    $queries[1] = 'CREATE TABLE ' . $prefix . 'cities ( 
        `cityid` BIGINT NOT NULL AUTO_INCREMENT,
        `cityname` TEXT NOT NULL,
        PRIMARY KEY (`cityid`))
        ' . $collate;

    $queries[2] = 'CREATE TABLE ' . $prefix . 'jobs ( 
        `jobid` BIGINT NOT NULL AUTO_INCREMENT,
        `userid` BIGINT NOT NULL,

        `fromcity` BIGINT NOT NULL,
        `tocity` BIGINT NOT NULL,
        `cargo` BIGINT NOT NULL,

        `distance` INT NOT NULL,
        `earnings` INT NOT NULL,
        `notes` TEXT,

        `fuelcosts` INT NOT NULL,
        `repaircosts` INT NOT NULL,
        `travelcosts` INT NOT NULL,

        `approved` BOOLEAN NOT NULL DEFAULT FALSE,        
        `approvedtime` DATETIME NOT NULL DEFAULT "0000-00-00 00:00:00",

        `addedtime` DATETIME NOT NULL,

        `divid` BIGINT NOT NULL DEFAULT 0,
        PRIMARY KEY (`jobid`))
        ' . $collate;

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    foreach ($queries as $q) {
        dbDelta($q);
    }
}

function wolfvtc_remove() {
    global $wpdb;

    //Options
    //delete_option("jobvtc_setup");
}
