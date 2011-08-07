<?php
    $specials = array(
        'Sunday' => 'PBR and a Jim Beam for $6',
        'Monday' => '$4 Margaritas',
        'Tuesday' => 'Any draft with a shot of Sauza tequila $5',
        'Wednesday' => 'Any draft and a shot of Bushmills $6',
        'Thursday' => 'All drafts $3 Jameson $4',
        'Friday' => 'DJ\'s choice',
        'Saturday' => '$4 Jameson'
    );
?>       
        <section id="sidebar">
            <h1>Daily Drink Specials</h1>
            <ul class="specials">
                <li class="today">
                    <h2>Friday</h2>
                    <p>DJ's choice</p>
                </li>
                <li>
                    <h2>Saturday</h2>
                    <p>$4 Jameson</p>
                </li>
                <li>
                    <h2>Sunday</h2>
                    <p>PBR and a Jim Beam for $6</p>
                </li>
                <li>
                    <h2>Monday</h2>
                    <p>$4 Margaritas</p>
                </li>
                <li>
                    <h2>Tuesday</h2>
                    <p>Any draft with a shot of Sauza tequila $5</p>
                </li>
                <li>
                    <h2>Wednesday</h2>
                    <p>Any draft and a shot of Bushmills $6</p>
                </li>
                <li>
                    <h2>Thursday</h2>
                    <p>All drafts $3 Jameson $4</p>
                </li>
            </ul>
            
            <?php dynamic_sidebar('side'); ?>
        </section>
