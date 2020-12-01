<?php
/**
 *    The template for displaying the bottom header section in blog.
 *
 * @package    WordPress
 * @subpackage illdy
 *             * @TODO: https://developer.wordpress.org/reference/functions/get_the_archive_title/
 */
?>
<div class="bottom-header blog">
	<div class="container">
		<div class="row">
			<?php
			if ( is_404() ) {
				$page_title = get_theme_mod( 'illdy_404_title', esc_html__( 'Page not found', 'illdy' ) );
				echo '<h1>' . wp_kses_post( $page_title ) . '</h1>';
			} elseif ( is_page_template( 'page-templates/blog.php' ) || is_singular() ) {
			?>
				<div class="col-sm-12">
					<?php

					$title = get_the_title();
					echo '<h1>' . esc_html( $title ) . '</h1>';

					?>

          <style>
          
        </style>
          <div class="section-citation">
            <?php
              $jumbotron_general_image = get_theme_mod( 'illdy_jumbotron_general_image', esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-header.png' ) );
              $post_id = attachment_url_to_postid($jumbotron_general_image);
              $metadata = wp_get_attachment_caption($post_id);
              echo($metadata)
              ?>
          </div>d
							</div><!--/.col-sm-12-->
						<?php
			} elseif ( class_exists( 'WooCommerce' ) && is_shop() ) {
				$title = get_the_title( woocommerce_get_page_id( 'shop' ) );
				echo '<h1>' . esc_html( $title ) . '</h1>';
			} else {
			?>
				<div class="col-sm-12">
					<?php

					$custom_blog_archive_title = get_bloginfo( 'name' );

					if ( is_home() && ! is_front_page() ) {
						$custom_blog_archive_title = get_the_title( get_option( 'page_for_posts', true ) );
					}

					if ( ! empty( $custom_blog_archive_title ) && is_home() ) {
						echo '<h2>' . esc_html( $custom_blog_archive_title ) . '</h2>';
					} else {
						$archive_title = get_the_archive_title();

						echo '<h2>' .  wp_kses_post($archive_title)  . '</h2>';
					}

								?>
							</div><!--/.col-sm-12-->
							<div class="col-sm-8 col-sm-offset-2">
								<?php if ( is_home() ) { ?>
						<?php echo '<p>' . get_bloginfo( 'description' ) . '</p>'; ?>
					<?php } else { ?>
						<?php the_archive_description( '<p>', '</p>' ); ?>
					<?php } ?>
							</div><!--/.col-sm-8.col-sm-offset-2-->
						<?php
			}// End if().
	?>
		</div><!--/.row-->
	</div><!--/.container-->
</div><!--/.bottom-header.blog-->
