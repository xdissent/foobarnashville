<?php global $current; ?><!DOCTYPE html>
<html lang="en">
<head>
    <title>fooBAR.</title>

    <script type="text/javascript" src="http://use.typekit.com/uef7aid.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/html5reset-1.6.1.css" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />

    <?php wp_head(); ?>
</head>
<body>
    <header>
        <h1>fooBAR.</h1>
        <nav>
            <h1>Navigation</h1>
            <ul>
                <li<?php if ($current == 'home') echo ' class="current"'; ?>><a href="/" title="Home">Home</a></li>
                <li<?php if ($current == 'menu') echo ' class="current"'; ?>><a href="/menu/" title="Menu">Menu</a></li>
                <li<?php if ($current == 'photos') echo ' class="current"'; ?>><a href="/photos/" title="Photos">Photos</a></li>
                <li<?php if ($current == 'events') echo ' class="current"'; ?>><a href="/events/" title="Events">Events</a></li>
            </ul>
            <ul class="elsewhere">
                <li><a href="http://facebook.com/foobarnashville" title="fooBAR on Facebook" rel="external">Facebook</a></li>
                <li><a href="http://twitter.com/foobarnashville" title="fooBAR on Twitter" rel="external">Twitter</a></li>
                <li><a href="http://foursquare.com/venue/334163" title="fooBAR on Foursquare" rel="external">Foursquare</a></li>
            </ul>
        </nav>
    </header>
