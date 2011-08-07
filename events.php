<?php 
/*
Template Name: Events
*/

    // Calendar!
    require_once dirname(__FILE__) . '/SG-iCalendar/SG_iCal.php';

    $ICS = 'http://www.facebook.com/ical/u.php?uid=1772739819&key=AQCSmjo06TzzwpTx';
    $ical = new SG_iCalReader($ICS);
    $query = new SG_iCal_Query();

    $evts = $ical->getEvents();

    $data = array();
    foreach ($evts as $id => $ev) {
        $jsEvt = array(
            'id' => ($id+1),
            'title' => $ev->getProperty('summary'),
            'start' => $ev->getStart(),
            'end'   => $ev->getEnd()-1,
            'allDay' => $ev->isWholeDay()
        );

        if (isset($ev->recurrence)) {
            $count = 0;
            $start = $ev->getStart();
            $freq = $ev->getFrequency();
            if ($freq->firstOccurrence() == $start) {
                $data[] = $jsEvt;
            }
            while (($next = $freq->nextOccurrence($start)) > 0) {
                if (!$next or $count >= 1000) {
                    break;
                }
                $count++;
                $start = $next;
                $jsEvt['start'] = $start;
                $jsEvt['end'] = $start + $ev->getDuration() - 1;

                $data[] = $jsEvt;
            }
        } else {
            $data[] = $jsEvt;
        }
    }

    $events = 'events:' . json_encode($data) . ',';

    wp_enqueue_script(
        'jquery-1.4.3',
        'http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js'
    );

    wp_enqueue_script(
        'fullcalendar',
        get_bloginfo('template_url') . '/SG-iCalendar/demo/fullcalendar.js',
        array('jquery-1.4.3')
    );

    wp_enqueue_style(
        'fullcalendar',
        get_bloginfo('template_url') . '/SG-iCalendar/demo/fullcalendar.css'
    );
    
    $current = 'events';
    get_header(); 
?>

    <div id="main">
        <?php get_sidebar('side'); ?>
        
        <section id="content">
            <div id="calendar"></div>
            <script type="text/javascript">

                $(document).ready(function() {

                    $('#calendar').fullCalendar({
                        header: {
                            left: 'prev,next today',
                            // left: '',
                            center: 'title',
                            // right: 'prev,next today',
                            right: 'month,agendaWeek,agendaDay'
                        },

                        year: 2011,
                        month: 8-1,

                        <?php echo $events ?>

                        eventClick: function(event) {
                            // opens events in a popup window
                            window.open(event.url, 'gcalevent', 'width=700,height=600');
                            return false;
                        },

                        loading: function(bool) {
                            if (bool) {
                                $('#loading').show();
                            }else{
                                $('#loading').hide();
                            }
                        }

                    });

                });

            </script>
        </section>
    </div>

<?php get_footer(); ?>
