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

register_activation_hook( __FILE__, 'prefix_activation' );
register_deactivation_hook( __FILE__, 'prefix_deactivation' );

function prefix_activation() {
	wp_schedule_event( time(), 'daily', 'email_reminders' );
}

function email_reminders() {
	$expired_posts = new expiring_posts();
	foreach($expired_posts as $expired_post)
	{
		$to = $expired_post->contact_email;
		$subject = "Expiring Job Post";
		$message = "Your contrace labled \"" . $expired_post->title . "\"will expire on " . $expired_post->end_date;
		mail($to, $subject, $message);
	}	
}

function prefix_deactivation() {
	wp_clear_scheduled_hook( 'prefix_hourly_event_hook' );
}

if ( ! isset( $job_postings ) && ! $job_postings )
{
	$job_postings = new job_postings();
}//end if

