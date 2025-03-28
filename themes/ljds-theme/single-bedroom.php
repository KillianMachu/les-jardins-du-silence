<?php wp_head(); ?>

<?php block_template_part( 'header' ); ?>

<div class="single-bedroom">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <h1 class="bedroom-title"><?php the_title(); ?></h1>

        <?php if ( has_post_thumbnail() ) : ?>
            <div class="bedroom-image">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>

        <div class="bedroom-content">
            <?php the_content(); ?>
        </div>

        <div class="bedroom-acf">
            <?php if( get_field('bed_number') ): ?>
                <p><strong>Nombre de couchages:</strong> <?php the_field('bed_number'); ?></p>
            <?php endif; ?>
            <?php if( get_field('bedroom_price') ): ?>
                <p><strong>Prix:</strong> <?php the_field('bedroom_price'); ?></p>
            <?php endif; ?>
        </div>

        <div class="bedroom-taxonomies">
            <p><strong>Type de lit:</strong> <?php echo get_the_terms( get_the_ID(), 'bed_type' )[0]->name; ?></p>
            <p><strong>Gamme:</strong> <?php echo get_the_terms( get_the_ID(), 'price_range' )[0]->name; ?></p>
        </div>

        <div class="related-rooms">
            <h3>Chambres dans la même gamme de prix :</h3>

            <?php
            $args = array(
                'post_type' => \LjdsBedroomManager\PostType::POST_TYPE,
                'posts_per_page' => 2,
                'post__not_in' => array( get_the_ID() ),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'price_range',
                        'field'    => 'term_id',
                        'terms'    => wp_get_post_terms( get_the_ID(), 'price_range', array( 'fields' => 'ids' ) ),
                        'operator' => 'IN',
                    ),
                ),
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post();
                    ?>
                    <div class="related-room">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="related-room-image">
                                <?php the_post_thumbnail('thumbnail'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; wp_reset_postdata(); else : ?>
                <p>Aucune chambre disponible dans cette gamme de prix.</p>
            <?php endif; ?>
        </div>

    <?php endwhile; endif; ?>

</div>

<?php block_template_part( 'footer' ); ?>
<?php wp_footer(); ?>