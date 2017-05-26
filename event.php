<?php
/**
 * Created by PhpStorm.
 * User: Pauma
 * Date: 2017-03-30
 * Time: 12:01
 */
include 'config.php';
?>
<!-- Kallar på html, css & andra taggar -->
<?php require 'head.php' ?>
<body>
<?php require 'header.php' ?>
<!-- Split med menu inni -->
<div id="menu">
    <ul id="ulmenu">
        <a href="place.php"><li>Places</li></a>
        <a href="event.php"><li class="active">Events</li></a>
    </ul>
</div>
<!-- Får allt under header til att vara centrert -->
<main id="mainContent">
    <?php

    if (empty($_SESSION['username'])) {
    } else if (!empty($_SESSION['username'])) {
        echo '<a href="add_event/add_event.php" class="neweventlink"><div id="new-event-btn"></div></a>';
    }
    ?>
    <!-- Håller på resturanger/barer "objects" -->
    <div id="content">
        <?php
        // if first time open welcome splash
        if (!isset($_SESSION['welcome'])) {
            $_SESSION['welcome'] = 'value';
            require 'underpages/welcomesplash.php';
        }

        require 'underpages/events.php' ?>
    </div>
    <!-- Object som åker ut, håller på "messages" som folk skriver -->
    <div id="info-win">
        <!-- Closing knapp för message fönster -->
        <div id="info-close-btn"><p>LUKK</p></div>
        <div id="info-content">
        </div>
    </div>
    </div>
    </wrapper>
</main>
</body>
</html>