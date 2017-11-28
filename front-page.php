<?php get_header(); ?>
    <!-- Suite de ma page, après mon bandeau -->
    <div class="page">
        <!-- AFFICHER LE CIUSTOM POST TYPE -->
        <?php get_template_part( 'content', 'accueil' ); ?> // effectue un include de content-accueil.php
    </div>    
<?php get_footer(); ?>