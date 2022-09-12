<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @Package Omnivus
 */

/*-----------------------------
	POST TOP META
------------------------------*/
if ( !function_exists('omnivus_top_meta') ) {
	function omnivus_top_meta(){ ?>
	<div class="post__top__meta">
		<div class="post__date__and__category">
			<?php omnivus_post_date(); ?>|<?php omnivus_single_category_retrip(); ?>
		</div>
	</div>
	<?php
	}
}

/*-----------------------------
	POST TOP META AUTHOR
------------------------------*/
if ( !function_exists('omnivus_comment_author') ) {
	function omnivus_comment_author(){ ?>
	<div class="post__comments__author">
		<?php 
			omnivus_post_author();
			omnivus_comment_count();
		?>
	</div>
	<?php
	}
}

/*-----------------------------
	SINGLE POST TOP META
------------------------------*/
if ( !function_exists('omnivus_single_post_top_meta') ) {
	function omnivus_single_post_top_meta(){ ?>
	<div class="single__post__top__meta">
		<?php omnivus_post_author(); ?>
		<div class="post__date__and__category">
			<?php omnivus_post_date(); ?>|<?php omnivus_single_category_retrip(); ?>
		</div>
	</div>
	<?php
	}
}

/*-----------------------------
	POSTS BOTTOM META
------------------------------*/
if ( !function_exists('omnivus_posts_bottom_meta') ) {
	function omnivus_posts_bottom_meta(){ ?>
		<div class="posts__bottom__meta">
			<?php
				omnivus_post_author();
                omnivus_readmore_alt(); 
			?>
		</div>                
     <?php
	}
}

/*------------------------------
	READMORE BUTTON
------------------------------*/
if ( !function_exists('omnivus_readmore') ) {
	function omnivus_readmore(){
		echo sprintf('<a class="post_readmore" href="%1$s">'.esc_html__( 'Read More', 'omnivus' ).'</a>', get_the_permalink());
	}
}

/*------------------------------
	READMORE BUTTON
------------------------------*/
if ( !function_exists('omnivus_readmore_alt') ) {
	function omnivus_readmore_alt(){
		echo sprintf('<div class="posts__readmore"><a href="%1$s"><i class="ti-arrow-right"></i>'.esc_html__( 'Read More', 'omnivus' ).'</a></div>', get_the_permalink());
	}
}

/*------------------------------
	POSTED ON
-------------------------------*/
if ( ! function_exists( 'omnivus_posted_on' ) ): 
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function omnivus_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$date_format = get_the_date('Y/m/d');
		$posted_on   = '<li><i class="ti-time"></i> <a href="'.home_url( $date_format ).'">'.$time_string.'</a></li>';

        if ( 'post' === get_post_type() ) {
			$categories_list = get_the_category_list(' &#44; ');
			if ( $categories_list ) {
                $categories_list = '<li><i class="ti-folder"></i> '.$categories_list.'</li>';
			}else{
                $categories_list = '';
            }
            
			$category        = get_the_category();
			$cat_count       = count($category);
			$single_cat      = $category[random_int( 0, $cat_count-1 )];
			$single_cat_name = $single_cat->cat_name;
			$single_cat_link = get_category_link( $single_cat->term_id );

			if ( get_the_category() ) {
				$single_category = '<li><i class="ti-folder"></i> <a href="'.esc_url( get_category_link( $single_cat->term_id ) ).'">'.esc_html( $single_cat->cat_name ).'</a></li>';
			}else{
				$single_category = '';
			}
		}
        if (! post_password_required() && ( comments_open() || get_comments_number() ) && get_comments_number() > 0 ) { 
            $comment_count = get_comments_number_text(esc_html__('No comment','omnivus'),esc_html__('1 Comment','omnivus'),esc_html__('% Comments','omnivus'));
            $comment_count = '<li><i class="ti-comments"></i> <a href="'.get_the_permalink().'">'.$comment_count.'</a></li>';
            
        }
        
	    echo '<ul class="info">'.(isset($posted_on) ? $posted_on : '').(isset($single_category) ? $single_category : '').(isset($comment_count) ? $comment_count : '').'</ul>';
	}
endif;

/*----------------------------
	POSTED BY
------------------------------*/
if ( ! function_exists( 'omnivus_posted_by' ) ): 
	function omnivus_posted_by() {
		$byline = '<li class="author"><i class="ti-user"></i> <a class="author-link" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )  . '">' . esc_html( get_the_author() ) . '</a></li>';

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$date_format = get_the_date('Y/m/d');
		$posted_on   = '<li><i class="ti-calendar"> </i><a href="'.home_url( $date_format ).'">'.$time_string.'</a></li>';

		if( is_singular() ){
			if ( current_user_can( 'edit_posts' ) ) {
	            $edit_post = get_edit_post_link();
	            $edit_post = '<li><i class="ti-pencil-alt"></i> <a href="'.esc_url( $edit_post ).'">'.esc_html__( 'Edit', 'omnivus' ).'</a></li>';
	        }
		}

		echo '<ul class="info"> '.(isset($posted_on) ? $posted_on : '').(isset($byline) ? $byline : '').(isset($edit_post) ? $edit_post : '').'</ul>';
	}
endif;

/*------------------------------
	POSTS TOP META
-------------------------------*/
if( !function_exists('omnivus_posts_top_meta') ):
	function omnivus_posts_top_meta(){

		$post_author = '<div class="post-author"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )  . '"><img src="'.esc_url( get_avatar_url( get_the_author_meta( 'email' ) ) ).'" alt="'.the_title_attribute( array('echo' => false)).'"></a><a class="author-link" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )  . '">' . esc_html( get_the_author() ) . '</a></div>';

	    if (! post_password_required() && ( comments_open() || get_comments_number() ) && get_comments_number() > 0 ) { 
	        $comment_count = get_comments_number_text(esc_html__('No comment','omnivus'),esc_html__('1 Comment','omnivus'),esc_html__('% Comments','omnivus'));
	        $comment_count = '<li><i class="fa fa-comments-o"></i> <a href="'.get_the_permalink().'">'.$comment_count.'</a></li>';
	        
	    }
		if ( 'post'=== get_post_type() ) {
			if(get_the_tags()){
				$post_tags = '<li><i class="fa fa-tags"></i> '.get_the_tag_list( '', ', ', '' ).'</li>';
			}
		}

	    if ( 'post' === get_post_type() ) {
	        
			$category        = get_the_category();
			$cat_count       = count($category);
			$single_cat      = $category[random_int( 0, $cat_count-1 )];
			$single_cat_name = $single_cat->cat_name;
			$single_cat_link = get_category_link( $single_cat->term_id );
		}

		if ( have_comments() || get_the_tags() ) {
			$post_comment_tag = '<div class="meta-comment-tag"><ul>'.( isset( $comment_count ) ? $comment_count : '' ).( isset($post_tags) ? $post_tags : '' ).'</ul></div>';
		}

		echo '<div class="post-top-meta">'. ( isset( $post_author ) ? $post_author : '') . ( isset( $post_comment_tag ) ? $post_comment_tag : '' ).'</div>';
	}
endif;

/*------------------------------
	POST BOTTOM META
-------------------------------*/
if ( !function_exists('omnivus_post_bottom_meta') ): 
	function omnivus_post_bottom_meta(){

		if ( 'post' === get_post_type() ) {
			$category = '<li class="author"><i class="fa fa-bookmark-o"></i> ' . get_the_category_list( ', ' ) . '</li>';
		}

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$date_format = get_the_date('Y/m/d');
		$posted_on   = '<li><i class="ti ti-calendar"> </i><a href="'.home_url( $date_format ).'">'.$time_string.'</a></li>';

		if( is_singular() ){
			if ( current_user_can( 'edit_posts' ) ) {
	            $edit_post = get_edit_post_link();
	            $edit_post = '<li><i class="ti ti-pencil-alt"></i> <a href="'.esc_url( $edit_post ).'">'.esc_html__( 'Edit', 'omnivus' ).'</a></li>';
	        }
		}

		echo '<div class="post-date-and-category"><ul> '.(isset($posted_on) ? $posted_on : '').(isset($category) ? $category : '').(isset($edit_post) ? $edit_post : '').'</ul></div>';
	}
endif;

/*------------------------------
	POST BOTTOM META TIME AGO
-------------------------------*/
if ( !function_exists('omnivus_post_ago_bottom_meta') ): 
	function omnivus_post_ago_bottom_meta(){

		$byline = '<span class="author">'.esc_html__( ' By ', 'omnivus' ).'<a class="author-link" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )  . '">' . esc_html( get_the_author() ) . '</a></span>';

		$time_string = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago','omnivus' );

		$date_format = get_the_date('Y/m/d');
		$posted_on   = '<span><a href="'.home_url( $date_format ).'">'.$time_string.'</a></span>';

		if( is_singular() ){
			if ( current_user_can( 'edit_posts' ) ) {
	            $edit_post = get_edit_post_link();
	            $edit_post = '<span class="edit-link"><a href="'.esc_url( $edit_post ).'">'.esc_html__( 'Edit', 'omnivus' ).'</a></span>';
	        }
		}

		echo '<div class="post__ago__meta">'.(isset($posted_on) ? $posted_on : '').(isset($byline) ? $byline : '').(isset($edit_post) ? $edit_post : '').'</div>';
	}
endif;


/*-------------------------------
	SINGLE POST FOOTER META
--------------------------------*/
if( ! function_exists('omnivus_post_footer_meta') ){
	function omnivus_post_footer_meta(){ ?>

	<?php if( function_exists('post_share_social') || !empty( get_the_tags() ) || has_tag() ) : ?>
		<div class="post-bottom-meta fix">
			<?php
				if ( 'post' === get_post_type() ) {
					$tags_list = get_the_tag_list( '<ul><li>', '</li><li>', '</li></ul>' );
					if ( $tags_list ) {
						$tags_list =  $tags_list;
					}else{
		                $tags_list = '';
		            }

					if ( get_the_tags() ) {
						$tag_count = count(get_the_tags());
					}else{
						$tag_count = '';
					}

					if ( !empty( $tags_list ) && $tag_count > 8 ) {
						printf( '<div class="post-tags width100p mb30 xs-mb0"><h4>'.esc_html__( 'Tags:', 'omnivus' ).'</h4>' . esc_html__( '%1$s', 'omnivus' ) . '</div>', $tags_list );
					}elseif($tags_list){
						printf( '<div class="post-tags xs-center"> <h4>'.esc_html__( 'Tags:', 'omnivus' ).'</h4>' . esc_html__( '%1$s', 'omnivus' ) . '</div>', $tags_list );
					}
				}
			?>
			
			<?php if( function_exists('post_share_social') ){ ?>
				<div class="post-share">				
					<h4><?php echo esc_html__( 'Share:', 'omnivus' ); ?></h4>
					<?php post_share_social(); ?>
				</div>
			<?php } ?>
		</div>
	<?php endif;

	}
}

/*------------------------------
	POST THUMBNAIL
-------------------------------*/
if ( ! function_exists( 'omnivus_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function omnivus_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) : ?>

			<div class="post-media">
				<?php the_post_thumbnail(); ?>
			</div>

		<?php else : ?>

			<div class="post-media">
				<a href="<?php the_permalink(); ?>">
					<?php
						the_post_thumbnail( 'omnivus-post-thumb', array(
							'alt' => the_title_attribute( array(
								'echo' => false,
							) ),
							'class' => 'img-responsive',
						) );
					?>
				</a>
			</div>

		<?php
		endif;
	}
endif;

/*---------------------------
	POSTS VIEW COUNT
----------------------------*/
function omnivus_get_post_view() {
	global $post;
    $count = get_post_meta( get_the_ID(), '_omnivus_post_views_count', true );
    if( '' == $count ){
        return '<div class="post__view__count"><i class="ti ti-eye"></i>' . esc_html__( '0 View','omnivus' ) . '</div>';
    }
    return '<div class="post__view__count"><i class="ti ti-eye"></i>' . esc_html( $count ) . esc_html__( ' Views','omnivus' ) . '</div>';
}
function omnivus_set_post_view() {
	global $post;
	$key     = '_omnivus_post_views_count';
	$post_id = get_the_ID();
	$count   = (int) get_post_meta( $post_id, $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
}

function omnivus_posts_column_views( $columns ) {
    $columns['post_views'] = esc_html__( 'Views', 'omnivus' );
    return $columns;
}
function omnivus_posts_custom_column_views( $column ) {
    if ( $column === 'post_views') {
        echo omnivus_get_post_view();
    }
}
add_filter( 'manage_posts_columns', 'omnivus_posts_column_views' );
add_action( 'manage_posts_custom_column', 'omnivus_posts_custom_column_views' );

function omnivus_post_view_count(){
	omnivus_set_post_view();
	echo omnivus_get_post_view();
}

/*---------------------------
	COMMENT COUNT
----------------------------*/
if ( !function_exists('omnivus_comment_count') ) :
	function omnivus_comment_count(){
	    if (! post_password_required() && ( comments_open() || get_comments_number() ) && get_comments_number() > 0 ) {
	        $comment_count = get_comments_number_text(esc_html__('0','omnivus'),esc_html__('1','omnivus'),esc_html__('%','omnivus'));
	        echo '<div class="post__comment__count">
			        <i class="fa fa-comments-o"></i>
			        <a class="comment__count" href="'.get_the_permalink().'">'.$comment_count.'</a>
		        </div>';
	    }
	}
endif;

/*---------------------------
	POST DATE
----------------------------*/
if ( !function_exists('omnivus_post_date') ) :
	function omnivus_post_date(){
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		$date_format = get_the_date('Y/m/d');
		echo '<div class="post__date__publish">
				<i class="ti-calendar"></i>
				<a class="post__date" href="'.home_url( $date_format ).'">'.$time_string.'</a>
			</div>';
	}
endif;

/*---------------------------
	POST DATE AGO
----------------------------*/
if ( !function_exists('omnivus_post_date_ago') ) :
	function omnivus_post_date_ago(){
		$time_string = human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago','omnivus' );
		$date_format = get_the_date('Y/m/d');
		echo '<div class="post__time_ago">
				<a href="'.home_url( $date_format ).'">'.$time_string.'</a>
			</div>';
	}
endif;

/*---------------------------
	COMMENT DATE AGO
----------------------------*/
if ( !function_exists('omnivus_comment_date_ago') ) :
	function omnivus_comment_date_ago(){
		$time_string = human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago','omnivus' );
		$date_format = get_the_date('Y/m/d');
		echo '<div class="comment__time_ago">
				<a href="'.home_url( $date_format ).'">'.$time_string.'</a>
			</div>';
	}
endif;

/*---------------------------
	POST EDIT LINK
----------------------------*/
if ( !function_exists('omnivus_post_edit') ) :
	function omnivus_post_edit(){
		if( is_singular() ){
			if ( current_user_can( 'edit_posts' ) ) {
	            $edit_post = get_edit_post_link();
	            echo '<div class="post__edit__link">
			            <i class="ti-pencil-alt"></i>
			            <a class="edit__link" href="'.esc_url( $edit_post ).'">'.esc_html__( 'Edit', 'omnivus' ).'</a>
		            </div>';
	        }
		}
	}
endif;

/*---------------------------
	POST AUTHOR
----------------------------*/
if ( !function_exists('omnivus_post_author') ) :
	function omnivus_post_author(){
		echo'<div class="post__author">
				<a class="author__thumbnail" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )  . '">
					<img src="'.esc_url( get_avatar_url( get_the_author_meta( 'email' ) ) ).'" alt="'.the_title_attribute( array('echo' => false)).'">
				</a>
				<a class="author__link" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author_meta( 'display_name' ) ) . '</a>
			</div>';
	}
endif;

/*---------------------------
	POST AUTHOR DEFAULT
----------------------------*/
if ( !function_exists('omnivus_post_author_default') ) :
	function omnivus_post_author_default(){
		echo '<div class="post__author">'.esc_html__( ' By ', 'omnivus' ).'
				<a class="author__link" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>
			</div>';
	}
endif;

/*----------------------------
	CATEGORY LIST
-----------------------------*/
if (!function_exists('omnivus_categorys_list')) :
	function omnivus_categorys_list(){
	    if ( 'post' === get_post_type() ) {
			if ( get_the_category() ) {
				echo '<div class="category__list"><i class="ti-folder"></i> '.get_the_category_list(', ').'</div>';
			}
		}
	}
endif;

/*----------------------------
	TAGS LIST
-----------------------------*/
if (!function_exists('omnivus_tag_list')) :
	function omnivus_tag_list(){
		if ( 'post'=== get_post_type() ) {
			if(get_the_tags()){
				echo '<div class="post__categories"><i class="fa fa-tags"></i> '.get_the_tag_list( '', ', ', '' ).'</div>';
			}
		}
	}
endif;

/*-----------------------------
	RANDOM SINGLE CATEGORY
------------------------------*/
if ( !function_exists( 'omnivus_single_category_retrip' ) ): 
	function omnivus_single_category_retrip(){

		if ( 'post' === get_post_type() && has_category()  ) {
			$category        = get_the_category();
			$cat_count       = count($category);
			$single_cat      = $category[random_int( 0, $cat_count-1 )];
			if ( get_the_category() ) {
				echo '<div class="single__category">'.esc_html__( 'Category: ', 'omnivus' ).'<a href="'.esc_url( get_category_link( $single_cat->term_id ) ).'">'.esc_html( $single_cat->cat_name ).'</a></div>';
			}
		}
	}
endif;

/*-----------------------------
	RANDOM SINGLE TAG
------------------------------*/
if ( !function_exists( 'omnivus_single_tag_retrip' ) ): 
	function omnivus_single_tag_retrip(){

		if ( 'post' === get_post_type() && has_tag() ) {

			if ( has_tag() ) {
				$tags       = get_the_tags();
				$tag_count  = count($tags);
				$single_tag = $tags[random_int( 0, $tag_count-1 )];

				if ( get_the_tags() ) {
					echo '<div class="single__tag"><a href="'.esc_url( get_category_link( $single_tag->term_id ) ).'">'.esc_html( $single_tag->name ).'</a></div>';
				}
			}
		}
	}
endif;


/*-----------------------------
	RANDOM SINGLE CATEGORY
------------------------------*/
if ( !function_exists( 'omnivus_single_random_category_retrip' ) ): 
	function omnivus_single_random_category_retrip(){

		if ( 'post' === get_post_type() && has_category() ) {
			$category        = get_the_category();
			$cat_count       = count($category);
			$single_cat      = $category[random_int( 0, $cat_count-1 )];
			if ( get_the_category() ) {
				echo '<div class="single__random__category"><a href="'.esc_url( get_category_link( $single_cat->term_id ) ).'">'.esc_html( $single_cat->cat_name ).'</a></div>';
			}
		}
	}
endif;