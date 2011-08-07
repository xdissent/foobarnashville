<?php 
/*
Template Name: Menu
*/ 

    $current = 'menu';
    get_header(); 
?>

    <div id="main">
        <?php get_sidebar('side'); ?>
        
        <section id="content">
            <?php if (have_posts()): while (have_posts()): the_post(); the_content(); endwhile; endif; ?>
        </section>
    </div>

<?php get_footer(); ?>
