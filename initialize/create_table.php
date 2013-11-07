<?php

function create_table()
{
		global $jp_db_version;
		$jp_db_version = "1.0";
		global $wpdb;
		global $jp_db_version;

		$table_name = $wpdb->prefix . "job_postings_posts";

		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
			`id` int(9) NOT NULL AUTO_INCREMENT,
			`application_link` varchar(200) NOT NULL,
			`category` varchar(75) NOT NULL,
			`contact_id` int(9) NOT NULL,
			`date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`date_expire` date NOT NULL,
			`department` varchar(75) NOT NULL,
			`description` varchar(200) NOT NULL,
			`job_title` varchar(75) NOT NULL,
			`pay_rate` varchar(12) NOT NULL,
			`title` varchar(100) NOT NULL,
			`deleted` int(11) DEFAULT NULL,
			PRIMARY KEY (`id`),
			UNIQUE KEY `id` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		$table_name = $wpdb->prefix . "job_postings_contact_info";

		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
			`id` int(9) NOT NULL AUTO_INCREMENT,
			`name` varchar(75) NOT NULL,
			`email` varchar(100) NOT NULL,
			`phone` varchar(12) NOT NULL,
			`job_desc` varchar(200) NOT NULL,
			PRIMARY KEY (`id`),
			UNIQUE KEY `id` (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

		dbDelta( $sql );

}
