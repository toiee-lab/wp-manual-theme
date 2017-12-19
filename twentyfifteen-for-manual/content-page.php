<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
		
		<hr>
		
		<?php
			$pagelist = get_pages('sort_column=menu_order&sort_order=asc');
			$pages = array();
			foreach ($pagelist as $page) {
			   $pages[] += $page->ID;
			}
			
			$current = array_search(get_the_ID(), $pages);
			$prevID = $pages[$current-1];
			$nextID = $pages[$current+1];
			?>
			
			<div class="navigation">
			<?php if (!empty($prevID)) { ?>
			<div class="alignleft  tooltip1">
			<a href="<?php echo get_permalink($prevID); ?>"
			  title="<?php echo get_the_title($prevID); ?>">前へ<span><?php echo get_the_title($prevID); ?></span></a>
			</div>
			<?php }
			if (!empty($nextID)) { ?>
			<div class="alignright tooltip1">
			<a href="<?php echo get_permalink($nextID); ?>" 
			 title="<?php echo get_the_title($nextID); ?>">次へ<span><?php echo get_the_title($nextID); ?></span></a>
			</div>
			<?php } ?>
			</div><!-- .navigation -->
		
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

</article><!-- #post-## -->
