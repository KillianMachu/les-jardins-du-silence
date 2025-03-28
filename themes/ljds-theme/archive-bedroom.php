<?php wp_head(); ?>

<?php block_template_part( 'header' ); ?>

<?php \LjdsBedroomManager\Filters::display() ?>
<?php if ( have_posts() ) : ?>
    <div class="rooms-container">
        <div class="rooms-grid">


            <?php while ( have_posts() ) : the_post(); ?>
                <?php
                $couchages = get_the_terms( get_the_ID(), 'bed_type' );
                $couchages_list = [];
                if ( $couchages && ! is_wp_error( $couchages ) ) {
                    $couchages_list = wp_list_pluck( $couchages, 'name' );
                }

                $gamme_tarifaire = get_the_terms( get_the_ID(), 'price_range' );
                $gamme_tarifaire_list = [];
                if ( $gamme_tarifaire && ! is_wp_error( $gamme_tarifaire ) ) :
                    $gamme_list = wp_list_pluck( $gamme_tarifaire, 'name' );
                endif;
                ?>

                <div class="room-card">

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="image-container">
                            <?php the_post_thumbnail('full'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="card-content">
                        <h2 class="room-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <p class="room-description">
                            <?php the_excerpt(); ?>
                        </p>
                        <div class="info-row">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/bed.svg" alt="bed"/>
                            <span class="info-text">
                                <span class="couchages">Couchages: <?= implode( ', ', $couchages_list ) ?></span>
                            </span>
                        </div>

                        <div class="info-row">
                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/euro.svg" alt="bed"/>
                            <span class="info-text">
                                <span class="couchages">Tarif: <?= implode( ', ', $gamme_list ) ?></span>
                            </span>
                        </div>
                    </div>

                    <div class="details-button">
                        <a href="<?php the_permalink(); ?>">Voir la chambre</a>
                    </div>

                </div>

            <?php endwhile; ?>

        </div>
    </div>

<?php else : ?>
    <p>Aucun article trouvé.</p>
<?php endif; ?>

<?php block_template_part( 'footer' ); ?>
<?php wp_footer(); ?>