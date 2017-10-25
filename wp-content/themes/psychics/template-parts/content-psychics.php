<?php
$args = array('post_type' => 'psychics', 'order' => 'ASC', 'post_per_page' => 5);
$the_query = new WP_Query($args);

if ($the_query->have_posts()) :
    while ($the_query->have_posts()) : $the_query->the_post(); ?>


        <article class="featured-posts" id="<?php the_ID(); ?>">
            <h3 class="article-title"><?php the_title(); ?></h3>
            <div class="img-nav">
                <div class="image-wrapper"><?php the_post_thumbnail(); ?></div>
                <ul>
                    <li><a href="#"><i class="fa fa-phone"></i> Call now</a></li>
                    <li><a href="#"><i class="fa fa-comments"></i>Let`s chat</a></li>
                </ul>
            </div>
            <div class="description">
                <div class="votes"><?php if(function_exists('the_ratings')) { the_ratings(); } ?></div>
                <div class="tags">
                    <?php
                    echo get_the_tag_list('<p>', ', ', '...</p>');
                    ?>
                </div>
                <div class="free">
                    <span class="free-text">3 MINS FREE
then $1.99/min
</span>
                    <i class="fa fa-heart"></i>
                </div>
            </div>
        </article>


    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

<?php else: ?>
    <p><?php _e('Sorry, post not found', 'psychics'); ?>
<?php endif; ?>

