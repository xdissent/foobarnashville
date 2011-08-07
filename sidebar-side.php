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

    $today = new DateTime;
    if ($today->format('G') < 3) {
        $today->modify('-1 day');
    }
    $today = $today->format('w');
    $specials = array_merge(
        array_slice($specials, $today, 7 - $today),
        array_slice($specials, 0, $today)
    );
?>       
        <section id="sidebar">
            <h1>Daily Drink Specials</h1>
            <ul class="specials">
            <?php foreach($specials as $day => $sp): ?>
                <li>
                    <h2><?php echo $day; ?></h2>
                    <p><?php echo $sp; ?></p>
                </li>
            <?php endforeach; ?>
            </ul>
            
            <?php dynamic_sidebar('side'); ?>
        </section>
