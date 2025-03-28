<?php
/**
 * The template for displaying all single posts
 *
 * @package Luxury Hotels
 * @subpackage luxury_hotels
 */

$bed_number = get_field('bed_number');
$bedroom_price = get_field('bedroom_price');
$terms = get_the_terms(get_the_ID(), 'price_range');
var_dump($terms);

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	    <div id="post-<?php the_ID(); ?>" class="external-div">
	        <div class="box-image">
	            <?php if ( has_post_thumbnail() ) : ?>
	                <!-- If post has thumbnail, apply parallax background with header settings -->
	                <div class="featured-image" 
	                     style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>'); 
	                            background-size: cover;
	                            background-position: <?php echo esc_attr( get_theme_mod( 'luxury_hotels_header_background_position', 'center' ) ); ?>;
	                            background-attachment: <?php echo (get_theme_mod( 'luxury_hotels_header_background_attachment', 1 ) ? 'fixed' : 'scroll'); ?>;
	                            height: <?php echo esc_attr( get_theme_mod( 'luxury_hotels_header_image_height', 350 ) ); ?>px;">
	                </div>
	            <?php else : ?>
	                <!-- Fallback image for pages with no thumbnail -->
	                <div class="single-page-img">
	                </div>
	            <?php endif; ?>
	        </div> 
	        <div class="box-text">
	            <h2><?php the_title();?></h2>  
	        </div> 
	    </div>
	<?php endwhile; ?>

    <div class="product-info">
        <h1><?php the_title(); ?></h1>

        <?php if ($bed_number) : ?>
            <p><strong>Nombre de lits :</strong> <?= esc_html($bed_number); ?></p>
        <?php endif; ?>

        <?php if ($bedroom_price) : ?>
            <p><strong>Prix par nuit :</strong> <?= esc_html($bedroom_price); ?> €</p>
        <?php endif; ?>
    </div>
	
	<main id="tp_content" role="main">
		<div class="container">
			<div id="primary" class="content-area">
				<?php
		        $luxury_hotels_sidebar_single_post_layout = get_theme_mod( 'luxury_hotels_sidebar_single_post_layout','right');
		        if($luxury_hotels_sidebar_single_post_layout == 'left'){ ?>
			        <div class="row">
			          	<div class="col-lg-4 col-md-4" id="theme-sidebar"><?php get_sidebar(); ?></div>
			          	<div class="col-lg-8 col-md-8">
			           		<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/single-post');	?>

									<div class="navigation">
							          	<?php
							              	// Previous/next page navigation.
							              	the_posts_pagination( array(
							                  	'prev_text'          => __( 'Previous page', 'luxury-hotels' ),
							                  	'next_text'          => __( 'Next page', 'luxury-hotels' ),
							                  	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'luxury-hotels' ) . ' </span>',
							              	) );
							          	?>
							        </div>

								<?php endwhile; // End of the loop.
							?>
			          	</div>
			        </div>
			        <div class="clearfix"></div>
			    <?php }else if($luxury_hotels_sidebar_single_post_layout == 'right'){ ?>
			        <div class="row">
			          	<div class="col-lg-8 col-md-8">	           
				            <?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/single-post');	?>

									<div class="navigation">
							          	<?php
							              	// Previous/next page navigation.
							              	the_posts_pagination( array(
							                  	'prev_text'          => __( 'Previous page', 'luxury-hotels' ),
							                  	'next_text'          => __( 'Next page', 'luxury-hotels' ),
							                  	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'luxury-hotels' ) . ' </span>',
							              	) );
							          	?>
							        </div>

								<?php endwhile; // End of the loop.
							?>
			          	</div>
			          	<div class="col-lg-4 col-md-4" id="theme-sidebar"><?php get_sidebar(); ?></div>
			        </div>
			    <?php }else if($luxury_hotels_sidebar_single_post_layout == 'full'){ ?>
			        <div class="full">
			           <?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/post/single-post'); ?>

								<div class="navigation">
						          	<?php
						              	// Previous/next page navigation.
						              	the_posts_pagination( array(
						                  	'prev_text'          => __( 'Previous page', 'luxury-hotels' ),
						                  	'next_text'          => __( 'Next page', 'luxury-hotels' ),
						                  	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'luxury-hotels' ) . ' </span>',
						              	) );
						          	?>
						        </div>

							<?php endwhile; // End of the loop.
						?>
		          	</div>
			    <?php }else {?>
			    	<div class="row">
			          	<div class="col-lg-8 col-md-8">	           
				            <?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/single-post'); ?>

									<div class="navigation">
							          	<?php
							              	// Previous/next page navigation.
							              	the_posts_pagination( array(
							                  	'prev_text'          => __( 'Previous page', 'luxury-hotels' ),
							                  	'next_text'          => __( 'Next page', 'luxury-hotels' ),
							                  	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'luxury-hotels' ) . ' </span>',
							              	) );
							          	?>
							        </div>

								<?php endwhile; // End of the loop.
							?>
			          	</div>
			          	<div class="col-lg-4 col-md-4" id="theme-sidebar"><?php get_sidebar(); ?></div>
			        </div>
			    <?php } ?>
			</div>
	   </div>
	</main>


<?php get_footer();
