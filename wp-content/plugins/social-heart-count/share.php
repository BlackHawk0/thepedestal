<?php 
/**
 * Plugin Name: Social Heart Count
 * Description: Post Share Helper Plugin For WordPress Theme.
 * Plugin URI: https://techbird.org/omnivus
 * Author: TechBird
 * Author URI: https://techbird.org
 * Version: 1.1.1
 * License: GPL2
 * Text Domain: post-social
 */

    if(!function_exists('post_share_social')){
        function post_share_social(){
            global $post;
            $crunchifyURL = get_permalink();
            $crunchifyTitle = str_replace( ' ', '%20', get_the_title());
            
            $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
            $redditURL = 'http://www.reddit.com/submit?url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
            $linkedinURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL;
        ?>
        <ul>
            <li><a href="<?php echo esc_url($facebookURL); ?>" target="_blank"><i class="ti ti-facebook"></i></a></li>
            <li><a href="<?php echo esc_url($twitterURL); ?>" target="_blank"><i class="ti ti-twitter"></i></a></li>
            <li><a href="<?php echo esc_url($redditURL); ?>" target="_blank"><i class="ti ti-reddit"></i></a></li>
            <li><a href="<?php echo esc_url($linkedinURL); ?>" target="_blank"><i class="ti ti-linkedin"></i></a></li>
        </ul>
        <?php
        }
    }

    if(!function_exists('post_share_social_left')){
        function post_share_social_left(){
            global $post;
            $crunchifyURL = get_permalink();
            $crunchifyTitle = str_replace( ' ', '%20', get_the_title());
            
            $twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
            $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
            $redditURL = 'http://www.reddit.com/submit?url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
            $linkedinURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL;
        ?>
        <ul>
            <li><a class="facebook" href="<?php echo esc_url($facebookURL); ?>" target="_blank"><i class="ti ti-facebook"></i></a></li>
            <li><a class="twitter" href="<?php echo esc_url($twitterURL); ?>" target="_blank"><i class="ti ti-twitter"></i></a></li>
            <li><a class="reddit" href="<?php echo esc_url($redditURL); ?>" target="_blank"><i class="ti ti-reddit"></i></a></li>
            <li><a class="linkedin" href="<?php echo esc_url($linkedinURL); ?>" target="_blank"><i class="ti ti-linkedin"></i></a></li>
        </ul>
        <?php
        }
    }

    function post_like_table_create() {
        global $wpdb;
        $table_name = $wpdb->prefix. "post_like_table";
        global $charset_collate;
        $charset_collate = $wpdb->get_charset_collate();
        global $db_version;

        if( $wpdb->get_var("SHOW TABLES LIKE '" . $table_name . "'") != $table_name){
            $create_sql = "CREATE TABLE " . $table_name . " (id INT(11) NOT NULL auto_increment,postid INT(11) NOT NULL,clientip VARCHAR(40) NOT NULL,PRIMARY KEY(id))$charset_collate;";
            require_once(ABSPATH . "wp-admin/includes/upgrade.php");
            dbDelta( $create_sql );
        }

        //register the new table with the wpdb object
        if (!isset($wpdb->post_like_table)){
            $wpdb->post_like_table = $table_name;
            //add the shortcut so you can use $wpdb->stats
            $wpdb->tables[] = str_replace($wpdb->prefix, '', $table_name);
        }
    }
    add_action( 'init', 'post_like_table_create');


    // Add the JS
    function post_heart_count_scripts() {
        wp_enqueue_style( 'heart-count', plugins_url( '/heart-count.css', __FILE__ ), array(), '1.0.0','all' );
        wp_enqueue_script( 'heart-count', plugins_url( '/heart-count.js', __FILE__ ), array('jquery'), '1.0.0', true );
        wp_localize_script( 'heart-count', 'MyAjax', array(
            // URL to wp-admin/admin-ajax.php to process the request
            'ajaxurl' => admin_url( 'admin-ajax.php' ),
            // generate a nonce with a unique ID "myajax-post-comment-nonce"
            // so that you can check it later when an AJAX request is sent
            'security' => wp_create_nonce( 'heart-count-string' ),
        ));
    }
    add_action( 'wp_enqueue_scripts', 'post_heart_count_scripts' );
    // The function that handles the AJAX request

    function get_client_ip() {
        $ip=$_SERVER['REMOTE_ADDR']; 
        return $ip;
    }

    function post_heart_count_ajax_callback() {
        check_ajax_referer( 'heart-count-string', 'security' );
        $postid = intval( $_POST['postid'] );
        $clientip=get_client_ip();
        $like=0;
        $dislike=0;
        $like_count=0;
        //check if post id and ip present
        global $wpdb;
        $row = $wpdb->get_results( "SELECT id FROM $wpdb->post_like_table WHERE postid = '$postid' AND clientip = '$clientip'");
        if(empty($row)){
            //insert row
            $wpdb->insert( $wpdb->post_like_table, array( 'postid' => $postid, 'clientip' => $clientip ), array( '%d', '%s' ) );
            //echo $wpdb->insert_id;
            $like=1;
        }
        if(!empty($row)){
            //delete row
            $wpdb->delete( $wpdb->post_like_table, array( 'postid' => $postid, 'clientip'=> $clientip ), array( '%d','%s' ) );
            $dislike=1;
        }

        //calculate like count from db.
        $totalrow = $wpdb->get_results( "SELECT id FROM $wpdb->post_like_table WHERE postid = '$postid'");
        $total_like=$wpdb->num_rows;
        $data=array( 'postid'=>$postid,'likecount'=>$total_like,'clientip'=>$clientip,'like'=>$like,'dislike'=>$dislike);
        echo json_encode($data);
        //echo $clientip;
        die(); // this is required to return a proper result
    }
    add_action( 'wp_ajax_my_action', 'post_heart_count_ajax_callback' );
    add_action( 'wp_ajax_nopriv_my_action', 'post_heart_count_ajax_callback' );

    function post_heart_like_count(){
        global $wpdb;
        $given_like=0;
        $postid=get_the_id();
        $clientip=get_client_ip();
        $row1 = $wpdb->get_results( "SELECT id FROM $wpdb->post_like_table WHERE postid = '$postid' AND clientip = '$clientip'");
        if(!empty($row1)){
            $given_like=1;
        }
        $totalrow1 = $wpdb->get_results( "SELECT id FROM $wpdb->post_like_table WHERE postid = '$postid'");
        $total_like1 = $wpdb->num_rows;
        ?>
        <div class="like_count like-count">
            <a class="pp_like <?php if( $given_like == 1 ) { echo " liked"; } ?>" href="#" data-id="<?php echo get_the_id(); ?>">
                <i class="fa fa-heart-o"></i>
            </a>
            <p id="count_like-<?php echo get_the_id(); ?>"><?php echo $total_like1; ?> Like</p>
        </div>
    <?php
    }

    if ( !function_exists( 'post_like_count_and_social' ) ) {
        function post_like_count_and_social(){ ?>
            <div class="post-social-share-and-like-count">
                <?php
                    post_heart_like_count();
                    post_share_social_left();
                ?>
            </div>
        <?php
        }
    }