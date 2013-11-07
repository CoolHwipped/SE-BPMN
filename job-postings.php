<?php
/*
Plugin Name: Job Postings
Version: 0.1
Plugin URI: http://fermis.me/wordpress
Description: 
Author: BPMN 
Author URI: http://
Contributors: Fermis
Tags: standards
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

global $job_postings;

require_once __DIR__ . '/components/jp.php';
require_once __DIR__ . '/components/class-job-postings.php';
require_once __DIR__ . '/components/class-posts.php';
require_once __DIR__ . '/components/class-description.php';
require_once __DIR__ . '/components/class-contact.php';
require_once __DIR__ . '/components/class-post.php';
require_once __DIR__ . '/initialize/create_table.php';

register_activation_hook( __FILE__, 'create_table' );

if ( ! isset( $job_postings ) && ! $job_postings )
{
	$job_postings = new job_postings();
}//end if

