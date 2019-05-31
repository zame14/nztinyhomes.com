<section class="home-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 nopadding">
                <div class="home-banner-wrapper">
                    <?= do_shortcode('[mpsl slider5cef98869cc51]') ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?=get_header()?>
    <div class="wrapper" id="page-wrapper">
        <div id="content" class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php get_template_part( 'loop-templates/content', 'page' ); ?>
                                <?php
                                // If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                                ?>
                            <?php endwhile; // end of the loop. ?>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?=get_footer()?>