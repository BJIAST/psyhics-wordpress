<?php
/*
Template Name: Front Page
*/

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section id="hero">
                <div class="wrapper">
                    <h2 class="descr">Accurate, Compassionate,
                        Professional & Ethical
                        Psychic Readers. </h2>
                </div>
                <div class="bottom-grid">
                    <div class="wrapper">
                        <?php get_search_form(); ?>
                    </div>
                </div>
            </section>
            <section id="trending">
                <div class="wrapper">
                    <div class="section-title">
                        <h2>TRENDING PSYCHICS CATEGORIES</h2>
                        <p>Chose from our Most Popular Psychics Services</p>
                    </div>
                    <div class="section-posts">
                        <?php
                        $args = array('post_type' => 'trending_psychics', 'order' => 'ASC', 'post_per_page' => 4);
                        $the_query = new WP_Query($args);

                        if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post(); ?>


                                <article class="trending-posts">
                                    <h3 class="article-title"><?php the_title(); ?></h3>
                                    <div class="image-wrapper"><?php the_post_thumbnail(); ?></div>
                                </article>


                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>

                        <?php else: ?>
                        <p><?php _e('Sorry, post not found', 'psychics'); ?>
                            <?php endif; ?>
                    </div>
                </div>
            </section>
            <section id="psychics">
                <div class="wrapper">
                    <div class="featured">
                        <div class="section-title">
                            <h2>OUR FEATURED PSYCHICS </h2>
                            <p>Chose from our Most Popular Psychics Services</p>
                        </div>
                        <div class="section-posts">
                            <?php get_template_part('template-parts/content', 'psychics'); ?>
                        </div>
                    </div>
                    <div class="popular">
                        <div class="section-title">
                            <h2>OUR POPULAR PSYCHICS</h2>
                            <p>Chose from our Most Popular Psychics Services</p>
                        </div>
                        <div class="section-posts">
                            <?php get_template_part('template-parts/content', 'psychics'); ?>
                            <button type="button" id="browse-psychics" class="browse-psychics">Browse more Psychics</button>
                        </div>
                    </div>
                </div>
            </section>
            <section id="stories">
                <div class="wrapper">
                    <div class="section-title">
                        <h2>OUR STORIES</h2>
                        <p>Chose from our Most Popular Psychics Services</p>
                    </div>
                    <div class="section-posts">

                        <?php // Display blog posts on any page @ http://m0n.co/l
                        $temp = $wp_query;
                        $wp_query = null;
                        $wp_query = new WP_Query();
                        $wp_query->query('showposts=3' . '&paged=' . $paged);
                        while ($wp_query->have_posts()) : $wp_query->the_post();
                            $date = get_the_date('F d, Y');
                            ?>
                            <article>
                                <div class="img-wrapper"><?php the_post_thumbnail() ?></div>
                                <div class="post-content">
                                    <h2><a href="<?php the_permalink(); ?>" title="Read more"><?php the_title(); ?></a>
                                    </h2>
                                    <?php the_excerpt(); ?>
                                    <span class="post-date"><?= $date; ?></span>
                                </div>
                            </article>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
