<?php

class Job_Postings
{
	/**
	 * constructor
	 */
	public function __construct()
	{
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	}//end __construct

	/**
	 * enqueue scripts and styles
	 */
	public function admin_enqueue_scripts()
	{
		$version = 1;
		wp_register_style( 'job-postings-admin', plugins_url( 'css/job-postings.css', __FILE__ ), array(), $version );
		wp_enqueue_style( 'job-postings-admin' );

		wp_register_script( 'job-postings', plugins_url( 'js/job-postings.js', __FILE__ ), array(), $version, TRUE );
		wp_register_script( 'job-postings-behavior', plugins_url( 'js/job-postings-behavior.js', __FILE__ ), array(), $version, TRUE );

		wp_enqueue_script( 'job-postings' );
		wp_enqueue_script( 'job-postings-behavior' );

	}//end admin_enqueue_scripts

	/**
	 * register menus
	 */
	public function admin_menu()
	{
		$page_title = "Cerate Job Postings";
		$menu_title = "Job Postings";
		$capability = "read";
		$menu_slug = "view_page";

		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, null);
		add_submenu_page( $menu_slug, 'View Job Posting', 'View Job Posting', 'read', $menu_slug, array( $this, 'view_page' ) );
		add_submenu_page( $menu_slug, 'Create Job Posting', 'Create Job Posting', 'edit_pages', 'create-job-postings', array( $this, 'create_page' ) );
	}//end admin_menu

	/**
	 * render the creation of posts page
	 */
	public function create_page()
	{
		// register javascript and css
		/*
		wp_register_script( 'job-postings', plugins_url( 'js/job-postings.js', __FILE__ ), array(), $version, TRUE );
		wp_enqueue_script( 'job-postings' );

		wp_register_style( 'job-postings-admin', plugins_url( 'css/job-postings.css', __FILE__ ), array(), $version );
		wp_enqueue_style( 'job-postings-admin' );
		*/

		if ( 'POST' == $_SERVER['REQUEST_METHOD'] )
		{
			include_once __DIR__ . '/templates/create_post.php';
		}//end if
		else{
			include_once __DIR__ . '/templates/create_post.php';
		}
	}//end create_page

	/**
	 * render the view post page
	 */
	public function view_page()
	{

		// register javascript and css
		/*
		wp_register_script( 'job-postings', plugins_url( 'js/job-postings.js', __FILE__ ), array(), $version, TRUE );
		wp_enqueue_script( 'job-postings' );

		wp_register_style( 'job-postings-admin', plugins_url( 'css/job-postings.css', __FILE__ ), array(), $version );
		wp_enqueue_style( 'job-postings-admin' );
		 */

		if ( 'POST' == $_SERVER['REQUEST_METHOD'] )
		{
			include_once __DIR__ . '/templates/view_post.php';
		}//end if
		else{
			include_once __DIR__ . '/templates/view_post.php';
		}
	}//end create_page

}//end class
