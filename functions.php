<?php

function fetchURL($url)
{
    $output = wp_cache_get($url);

    if ($output === false) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        wp_cache_set($url, $output);
    }

    return $output;
}

function getTweets($user, $number=3, $nofollow=true)
{
    $feed = 'http://search.twitter.com/search.atom?q=from:' . $user . '&rpp=' . $number;
    $atom = fetchURL($feed);

    if (!preg_match_all('@<entry>.*<published>(?P<time>.*)</published>.*<link.*href="(?P<url>.*)".*<content type="html">(?P<tweet>.*)</content>.*</entry>@mUs', $atom, $matches, PREG_SET_ORDER)) {
        // Bail if something went wrong.
        return;
    }

    foreach ($matches as &$tweet) {
        $tweet['tweet'] = html_entity_decode($tweet['tweet']);
        if ($nofollow) {
            $tweet['tweet'] = preg_replace('/(<a[^>]*)>/', '$1 rel="nofollow">', $tweet['tweet']);
        }
    }
    unset($tweet);

    return $matches;
}

function getTweet($user) {
    $tweets = getTweets($user, 1);
    $tweet = array_shift($tweets);
    return $tweet['tweet'];
}

function theTweet($user) {
    echo getTweet($user);
}


class FOO_Widget_Twitter extends WP_Widget
{
    function FOO_Widget_Twitter() {
        $widget_ops = array('classname' => 'foo_widget_twitter', 'description' => __('Your recent tweets.'));
        $this->WP_Widget('foo_twitter', __('Twitter'), $widget_ops);
    }

    function widget($args, $instance) {
        extract($args);
        $tweets = getTweets('foobarnashville', 3);

        $title = apply_filters('widget_title', empty($instance['title']) ? __('Twitter Feed') : $instance['title']);
        $title = '<a href="http://twitter.com/foobarnashville/" title="' . $title . '">' . $title . '</a>';
        echo $before_widget;
        if ($title) {
            echo $before_title . $title . $after_title;
        }

        echo '<ul class="twitter">';

        foreach($tweets as $tweet) {
            $time = strtotime($tweet['time']);
            echo '<li><a title="View this Tweet on Twitter" href="' . $tweet['url']  .'">';
            echo '<abbr title="';
            echo date('c', $time);
            echo '">' . date('F jS Y g:i a', $time) . '</abbr></a><p>' . $tweet['tweet'] . '</p></li>';
        }

        echo '</ul>';
        echo $after_widget;
    }
}

function _registerWidgets()
{
    register_widget('FOO_Widget_Twitter');
}
add_action('widgets_init', '_registerWidgets');


function _register() 
{   
    register_sidebar(
        array(
            'name' => 'fooBAR. Side Bar',
            'id' => 'side',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h1>',
            'after_title' => '</h1>'
        )
    );
    
    remove_filter('the_content', 'wpautop');
}
add_action('init', '_register');
