<?php
    $current = 'home'; 
    get_header(); 
?>
    <div id="main">
        <?php get_sidebar('side'); ?>
        
        <section id="content">
            <img src="<?php bloginfo('template_url'); ?>/img/slideshow.png" />

            <div class="left">

                <p>fooBAR - Nashville's best place to get a drink. Well at least we like to think so. And more than a few people agree with us.</p>
                <a href="http://maps.google.com/maps?q=foobar+nashville&hl=en&ll=36.195594,-86.74324&spn=0.007654,0.011115&sll=36.195579,-86.743247&sspn=0.015308,0.02223&gl=us&z=17">
                    <img class="map" src="http://maps.googleapis.com/maps/api/staticmap?center=2511+Gallatin+Ave,+Nashville,+TN&zoom=16&size=340x250&sensor=false&markers=color:red%7Clabel:A%7C36.196859,-86.742768" />
                </a>
            </div>

            <div class="right">
                <h2>fooBAR too.</h2>
                <p>It's like Cheers, minus Ted Danson, plus tattoos and live rock shows.</p>
                <img src="<?php bloginfo('template_url'); ?>/img/home-photo.png" />
                <p>fooBAR too is a 140 person capacity venue. The room has the best quality sound equipment and a full service bar.</p>
                <p>We host a variety of DJs, from ska and reggae to honky tonk.</p>
            </div>
        </section>
    </div>
<?php get_footer(); ?>
