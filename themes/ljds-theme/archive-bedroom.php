<?php get_header(); ?>

<?php \LjdsBedroomManager\Filters::display() ?>
<?php if ( have_posts() ) : ?>
    <div class="archive-page">


        <?php while ( have_posts() ) : the_post(); ?>

            <div class="archive-item">

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="archive-item-image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                <?php endif; ?>

                <h2 class="archive-item-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>

                <div class="archive-item-excerpt">
                    <?php the_excerpt(); ?>
                </div>

                <div class="archive-item-couchages">
                    <?php
                    $couchages = get_the_terms( get_the_ID(), 'bed_type' );
                    if ( $couchages && ! is_wp_error( $couchages ) ) :
                        $couchages_list = wp_list_pluck( $couchages, 'name' );
                        echo '<span class="couchages">Couchages: ' . implode( ', ', $couchages_list ) . '</span>';
                    endif;
                    ?>
                </div>

                <div class="archive-item-gamme-tarifaire">
                    <?php
                    $gamme_tarifaire = get_the_terms( get_the_ID(), 'price_range' );
                    if ( $gamme_tarifaire && ! is_wp_error( $gamme_tarifaire ) ) :
                        $gamme_list = wp_list_pluck( $gamme_tarifaire, 'name' );
                        echo '<span class="gamme-tarifaire">Tarif: ' . implode( ', ', $gamme_list ) . '</span>';
                    endif;
                    ?>
                </div>

                <div class="archive-item-button">
                    <a href="<?php the_permalink(); ?>" class="button">Voir l'article</a>
                </div>

            </div>

        <?php endwhile; ?>

    </div>

<?php else : ?>
    <p>Aucun article trouvé.</p>
<?php endif; ?>