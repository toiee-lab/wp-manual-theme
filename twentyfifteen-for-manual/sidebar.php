<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) || is_active_sidebar( 'sidebar-1' )  ) : ?>
		<div id="secondary" class="secondary">

		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div id="widget-area" class="widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
				
				<div class="widget">
				
				<ul class="toc-pages">
				<?php
					
					$q = array (
							'post_type' => 'page',
							'meta_key' => 'menu_exclude',
							'meta_value' => 1,
							'compare' => '='
						);

					$the_query = new WP_Query( $q );
					$tmp_posts = $the_query->posts;
					
					$ex_ids = '';
					foreach($tmp_posts as $p)
					{
						$ex_ids .= $p->ID.',';
					}
					wp_list_pages( array( 'title_li' => '', "exclude" =>$ex_ids)); 
				?>
				</ul>
				
				</div>

			</div><!-- .widget-area -->

		<?php endif; ?>

		<?php if ( has_nav_menu( 'primary' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'primary',
					) );
				?>
			</nav><!-- .main-navigation -->
		<?php endif; ?>

		<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav id="social-navigation" class="social-navigation" role="navigation">
				<?php
					// Social links navigation menu.
					wp_nav_menu( array(
						'theme_location' => 'social',
						'depth'          => 1,
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>',
					) );
				?>
			</nav><!-- .social-navigation -->
		<?php endif; ?>

	</div><!-- .secondary -->

<?php endif; ?>
