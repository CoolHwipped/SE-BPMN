<?php

class Job_Postings
{
	/**
	 * constructor
	 */
	public function __construct()
	{
		add_action( 'init', array( $this, 'create_post_type'  ));
	  add_action('init', array( $this, 'taxonomies_job_posting' ), 0);
		add_action( 'load-post.php', array( $this, 'post_meta_boxes_setup') );
		add_action( 'load-post-new.php', array( $this, 'post_meta_boxes_setup') );
	 	add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
	 	add_action( 'admin_menu', array( $this, 'admin_menu' ) );
	}//end __construct

	/**
	 * enqueue scripts and styles
	 */
	public function admin_enqueue_scripts()
	{
		global $typenow;
		$version = 1;
// <!-- Latest compiled and minified CSS -->
// <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css">

		// adding twitter bootstrap

		// wp_register_style( 'bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css' );
		// wp_enqueue_style( 'bootstrap' );

		// wp_register_style( 'bootstrap-theme', '//netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap-theme.min.css' );
		// wp_enqueue_style( 'bootstrap-theme' );

		// wp_register_script( 'bootstrap-js', '//netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js' );
		// wp_enqueue_script( 'bootstrap-js' );
		
		// end adding bootstrap


//		wp_register_style( 'job-postings-jquery-ui', 'https://code.jquery.com/ui/1.10.3/jquery-ui.js' );
//		wp_enqueue_style( 'job-postings-jquery-ui' );
		wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-ui-core' );
    wp_enqueue_script( 'jquery-datepicker', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js', array('jquery', 'jquery-ui-core' ) );

		wp_enqueue_style( 'jQuery-ui-theme', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css' );

		if ($typenow == 'job_posting'){
			wp_register_script( 'job-postings', plugins_url( 'js/job-postings.js', __FILE__ ), array(), $version, TRUE );
			wp_enqueue_script( 'job-postings' );
		}

	}//end admin_enqueue_scripts

	public function post_meta_boxes_setup()
	{
		add_action( 'add_meta_boxes', array( $this, 'add_post_meta_boxes') );
		add_action( 'save_post', array( $this, 'job_postings_save_post_class_meta'), 10, 2 );
	}
	public function add_post_meta_boxes()
	{
		// add all custom meta boxes here
		$id = 'job-postings-datepickeri-1';
		$title = "End date";
		$callback = array( $this, "job_postings_create_datepicker");
		$page = "job_posting";
		$context = 'side';
		add_meta_box( $id, $title, $callback, $page, $context, $priority = 'default', $callback_args = null );

		$id = 'job-postings-payrate-1';
		$title = "Pay Rate";
		$callback = array( $this, "job_postings_create_payrate");
		$page = "job_posting";
		$context = 'normal';
		add_meta_box( $id, $title, $callback, $page, $context, $priority = 'default', $callback_args = null );

		$id = 'job_postings_expiration';
		$title = "Expiration reminder";
		$callback = array( $this, "job_postings_create_expiration");
		$page = "job_posting";
		$context = 'normal';
		add_meta_box( $id, $title, $callback, $page, $context, $priority = 'default', $callback_args = null );

		$id = 'job_postings_department';
		$title = "Job department";
		$callback = array( $this, "job_postings_create_department");
		$page = "job_posting";
		$context = 'normal';
		add_meta_box( $id, $title, $callback, $page, $context, $priority = 'default', $callback_args = null );

		$id = 'job_postings_contact_name';
		$title = "Contact name";
		$callback = array( $this, "job_postings_create_contact_name");
		$page = "job_posting";
		$context = 'normal';
		add_meta_box( $id, $title, $callback, $page, $context, $priority = 'default', $callback_args = null );

		$id = 'job_postings_contact_email';
		$title = "Contact Email";
		$callback = array( $this, "job_postings_create_contact_email");
		$page = "job_posting";
		$context = 'normal';
		add_meta_box( $id, $title, $callback, $page, $context, $priority = 'default', $callback_args = null );

		$id = 'job_postings_contact_phone';
		$title = "Contact Phone";
		$callback = array( $this, "job_postings_create_contact_phone");
		$page = "job_posting";
		$context = 'normal';
		add_meta_box( $id, $title, $callback, $page, $context, $priority = 'default', $callback_args = null );
	}

	public function job_postings_create_contact_name( $object, $box)
	{
		wp_nonce_field( basename( __FILE__ ), 'job_postings_contact_name_box_nonce' );
		$value = esc_attr( get_post_meta( $object->ID, 'job_postings_contact_name', true ) );
		echo '<input name="job-postings-contact-name" id="job-postings-contact-name"'; 
		if ($value)
		{
			echo "value='$value' ";
		}
		else
		{
			echo 'placeholder="Your name"'; 
		}
		echo 'style="width: 13em"/>';
	}	

	public function job_postings_create_contact_email( $object, $box)
	{
		wp_nonce_field( basename( __FILE__ ), 'job_postings_contact_email_box_nonce' );
		$value = esc_attr( get_post_meta( $object->ID, 'job_postings_contact', true ) );
		echo '<input name="job-postings-contact-email" id="job-postings-contact-email"'; 
		if ($value)
		{
			echo "value='$value' ";
		}
		else
		{
			echo 'placeholder="Your email"'; 
		}
		echo 'style="width: 13em"/>';
	}

	public function job_postings_create_contact_phone( $object, $box)
	{
		wp_nonce_field( basename( __FILE__ ), 'job_postings_contact_phone_box_nonce' );
		$value = esc_attr( get_post_meta( $object->ID, 'job_postings_contact', true ) );
		echo '<input name="job-postings-contact-phone" id="job-postings-contact-phone"'; 
		if ($value)
		{
			echo "value='$value' ";
		}
		else
		{
			echo 'placeholder="contact phone number"'; 
		}
		echo 'style="width: 13em"/>';
	}

	public function job_postings_create_datepicker( $object, $box)
	{
		wp_nonce_field( basename( __FILE__ ), 'job_postings_datepicker_box_nonce' );
		$value = esc_attr( get_post_meta( $object->ID, 'job_postings_datepicker', true ) );;
		
		echo '<div name="job-postings-datepicker-jquery" id="job-postings-datepicker-jquery"></div>';
		if ($value)
		{
			echo "<input name='job-postings-datepicker' id='job-postings-datepicker' type='hidden' value='$value'/>";
		}
		else
		{
			echo "<input name='job-postings-datepicker' id='job-postings-datepicker' type='hidden' />";
		}
	}

	public function job_postings_create_payrate( $object, $box)
	{
		wp_nonce_field( basename( __FILE__ ), 'job_postings_payrate_box_nonce' );
		$value = esc_attr( get_post_meta( $object->ID, 'job_postings_payrate', true ) );;
		echo '<input name="job-postings-payrate" id="job-postings-payrate" '; 
		if ($value)
		{
			echo "value='$value' ";
		}
		else
		{
			echo 'placeholder="Enter pay rate here i.e 7.75"'; 
		}
		echo 'style="width: 13em"/>';
	}

	public function job_postings_create_expiration( $object, $box)
	{
		//TODO if there is nothing saved default to the value set in the admin settings(default 30 days I think).
		wp_nonce_field( basename( __FILE__ ), 'job_postings_expiration_box_nonce' );
		$value = esc_attr( get_post_meta( $object->ID, 'job_postings_expiration', true ) );;
		echo '<div>Enter how many days before the job posting expires that you wish to be reminded</div>';
		echo '<input name="job-postings-expiration" id="job-postings-expiration" '; 
		if ($value)
		{
			echo "value='$value' ";
		}
		echo 'style="width: 13em"/>';
	}

	public function job_postings_create_department( $object, $box)
	{
		wp_nonce_field( basename( __FILE__ ), 'job_postings_department_box_nonce' );
		$value = esc_attr( get_post_meta( $object->ID, 'job_postings_department', true ) );;
		echo '<div>Which department are you posting this job for?</div>';
		echo '<input name="job-postings-department" id="job-postings-department" '; 
		if ($value)
		{
			echo "value='$value' ";
		}
		echo 'style="width: 13em"/>';
	}

	public function job_postings_save_post_class_meta( $post_id, $post)
	{
		/* array containing all custom meta box indetifiers */
		$custom_meta_boxes = array('job_postings_payrate', 'job_postings_datepicker', 'job_postings_expiration', 'job_postings_department', 'job_postings_contact_phone', 'job_postings_contact_email', 'job_postings_contact_name');
		foreach($custom_meta_boxes as $custom_meta_box)
		{
			/* Verify the nonce before proceeding. */
			if ( !isset( $_POST[$custom_meta_box . '_box_nonce'] ) || !wp_verify_nonce( $_POST[$custom_meta_box . '_box_nonce'], basename( __FILE__ ) ) )
			{			
				return $post_id;
			}
		}

		/* Now that all of the nonce boxes are varified loop through everything and save the content */
		
		foreach($custom_meta_boxes as $custom_meta_box)
		{
			/* Get the post type object. */
			$post_type = get_post_type_object( $post->post_type );

/*
			if ( !current_user_can( $post_type->cap->edit_post, $post_id ) )
			{
				return $post_id;
			}
*/
			/* Get the posted data and sanitize it for use as an HTML class. */
			$class_name = str_replace('_', '-', $custom_meta_box);
			$new_meta_value = ( isset( $_POST[$class_name] ) ? htmlspecialchars( $_POST[$class_name] ) : '' );	
			
			/* Get the meta key. */
		
			$meta_key = $custom_meta_box;

			/* Get the meta value of the custom field key. */
			$meta_value = get_post_meta( $post_id, $meta_key, true );

			/* If a new meta value was added and there was no previous value, add it. */
			if ( $new_meta_value && '' == $meta_value )
			{
				add_post_meta( $post_id, $meta_key, $new_meta_value, true );
			}
			/* If the new meta value does not match the old value, update it. */
			elseif ( $new_meta_value && $new_meta_value != $meta_value )
			{
				update_post_meta( $post_id, $meta_key, $new_meta_value );
			}
			/* If there is no new meta value but an old value exists, delete it. */
			elseif ( '' == $new_meta_value && $meta_value )
			{
				delete_post_meta( $post_id, $meta_key, $meta_value );
			}
		}

	}
	public function create_post_type()
	{
// http://codex.wordpress.org/Post_Types
		$labels = array(
			'name'               => _x( 'Job Postings', 'post type general name' ),
			'singular_name'      => _x( 'Job Posting', 'post type singular name' ),
			'add_new'            => _x( 'Add New Job Posting', 'Job Posting' ),
			'add_new_item'       => __( 'Add New Job Posting' ),
			'edit_item'          => __( 'Edit Job Posting' ),
			'new_item'           => __( 'New Job Posting' ),
			'all_items'          => __( 'All Job Postings' ),
			'view_item'          => __( 'View Job Posting' ),
			'search_items'       => __( 'Search Job Postings' ),
			'not_found'          => __( 'No Job Postings found' ),
			'not_found_in_trash' => __( 'No Job Postings found in the Trash' ), 
			'parent_item_colon'  => '',
			'menu_name'          => 'Job Postings'
		);
		$args = array(
			'labels'        => $labels,
			'description'   => 'Holds our Job Postings and Job Posting specific data',
			'public'        => true,
			'menu_position' => null,
			'supports'      => array( 'title', 'editor' ),
			'show_in_menu'  => 'false',
			'has_archive'   => true,
		);
		register_post_type( 'job_posting', $args );
	}

	public function taxonomies_job_posting(){
		$labels = array(
			'name'              => _x( 'Job Posting Categories', 'taxonomy general name' ),
			'singular_name'     => _x( 'Job Posting Category', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Job Posting Categories' ),
			'all_items'         => __( 'All Job Posting Categories' ),
			'parent_item'       => __( 'Parent Job Posting Category' ),
			'parent_item_colon' => __( 'Parent Job Posting Category:' ),
			'edit_item'         => __( 'Edit Job Posting Category' ), 
			'update_item'       => __( 'Update Job Posting Category' ),
			'add_new_item'      => __( 'Add New Job Posting Category' ),
			'new_item_name'     => __( 'New Job Posting Category' ),
			'menu_name'         => __( 'Job Posting Categories' ),
		);
		$args = array(
			'labels' => $labels,
			'hierarchical' => true,
		);
		register_taxonomy( 'job_posting_category', 'job_posting', $args );
	}

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
	  add_submenu_page( $menu_slug, 'Create Job Posting', 'Create Job Posting', 'edit_pages', 'post-new.php?post_type=job_posting', "" );
	  add_submenu_page( $menu_slug, 'Edit Job Posting', 'Edit Job Posting', 'edit_pages', 'edit.php?post_type=job_posting', "" );
	}//end admin_menu

	/**
	 * render the view post page
	 */
	public function view_page()
	{

		// register javascript and css
		wp_register_script( 'job-postings', plugins_url( 'js/view-page.js', __FILE__ ), array(), $version, TRUE );
		wp_enqueue_script( 'job-postings' );

		wp_register_style( 'job-postings', plugins_url( 'css/view-page.css', __FILE__ ), array(), $version );
		wp_enqueue_style( 'job-postings' );
		$posts = new posts();

		if ( 'POST' == $_SERVER['REQUEST_METHOD'] )
		{
			// not sure what we are doing here yet, maybe sorting.
		}//end if

		include_once __DIR__ . '/templates/view_post.php';
	}//end create_page

}//end class
