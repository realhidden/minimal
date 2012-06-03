<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="X-UA-Compatible" content="chrome=1">
        <meta charset="<?php bloginfo('charset'); ?>" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title><?php bloginfo('name'); ?><?php wp_title('&mdash;'); ?></title>
        <?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
        <?php wp_head(); ?>

    </head>
    <body <?php body_class(); ?>>
        <div class="wrapper">
            <header>
                <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
                <p id="description"><?php bloginfo('description'); ?></p>


                <?php
                if (has_nav_menu('menu')) : wp_nav_menu(array("after"=>"<div class='clear'>"));
                else :
                    ?>
                    <ul>
                        <?php wp_list_pages('title_li=&depth=-1'); ?>
                        <div class='clear'>
                    </ul>
                <?php endif; ?>

            </header>             
            <section id="content">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div <?php post_class(); ?>>
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <small class="postdate"><?php echo get_the_date(); ?></small>
                            <?php the_content(); ?>
                            <?php if (!is_singular() && get_the_title() == '') : ?>
                                <a href="<?php the_permalink(); ?>">(more...)</a>
                            <?php endif; ?>
                            <?php if (is_singular()) : ?>
                                <div class="pagination"><?php wp_link_pages(); ?></div>
                            <?php endif; ?>
                            <div class="clear"> </div>
                        </div><!-- post_class() -->
                        <?php if (is_singular()) : ?>
                            <div class="meta">
                                <small>By <?php the_author_posts_link(); ?>
                                    on <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
                                    in <?php the_category(', '); ?><?php the_tags(', '); ?></small>
                            </div><!-- meta -->
                            <?php comments_template(); ?>
                        <?php endif; ?>
                        <?php
                    endwhile;
                else:
                    ?>
                    <div class="hentry"><h2>Sorry, the page you requested cannot be found</h2></div>
                <?php endif; ?>
                <?php if (is_singular() || is_404()) : ?>
                    <div class="left"><a href="<?php bloginfo('url'); ?>">&laquo; Home page</a></div>
                <?php else : ?>
                    <div class="left"><?php next_posts_link('&laquo; Older posts'); ?></div>
                    <div class="right"><?php previous_posts_link('Newer posts &raquo;'); ?></div>
                <?php endif; ?>
                <div class="clear"> </div>
            </section>
            <footer>
                <?php wp_footer(); ?>
            </footer>
        </div>
        <script src="<?php bloginfo('template_url'); ?>/javascripts/scale.fix.js"></script>
    </body>
</html>