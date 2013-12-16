<?php
/*
Plugin Name: Job Postings
Version: 0.2
Plugin URI: http://fermis.me/wordpress
Description: 
Author: BPMN 
Author URI: http://
Contributors: Fermis, Mark, James, Catherine
Tags: standards
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

global $job_postings;

require_once __DIR__ . '/components/jp.php';
require_once __DIR__ . '/components/expiring-posts.php';
require_once __DIR__ . '/components/class-post.php';
require_once __DIR__ . '/components/class-posts.php';
require_once __DIR__ . '/components/class-job-postings.php';

// delete_option('job_postings_exp_reminder');
add_option('job_postings_max_length',150,'','no');
add_option('job_postings_def_length',30,'','no');
add_option('job_postings_exp_reminder',5,'','no');


if ( ! isset( $job_postings ) && ! $job_postings )
{
	$job_postings = new job_postings();
}//end if

