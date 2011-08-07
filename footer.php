<?php global $current; ?>
    <footer>
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
        <p>&copy; 2011 fooBar.</p>
    </footer>
</body>
</html>
