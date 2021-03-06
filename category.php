<?php get_header(); ?>

<div class="page">

    <section>

        <?php
            if ( have_posts() ) : // on vérifie qu'il y a des posts
                while ( have_posts() ) :
                    the_post();?>
                    
                    <!-- afficher le titre et le contenu d'un article -->
                    <article <?php post_class(); ?>>
                        <div class="post-body">
                            <?php the_title('<h3>', '</h3>'); ?>
                            <?php the_content(); ?>
                            <a href="<?php the_permalink(); ?>">Lire la suite</a>
                        </div>    
                    </article>

                <?php endwhile;
            endif;        
        ?>

    </section>

</div>

<?php get_footer(); ?>

