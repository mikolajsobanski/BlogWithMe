

<!DOCTYPE html>
<head>
    
    <link rel="stylesheet" type="text/css" href="public/css/time.css">
    <script type="text/javascript" src="./public/js/time.js" defer></script>
    <?php
    $title = "Time";
    include("./public/constants/title.php");
    ?>
</head>
<body onload="initClock()">
    <div class="home-container">
        <nav>
            <?php include('./public/components/navbar.php')?>
        </nav>
        <main>
            
            
            <section class="times">
                
                <div class="datetime">
                    <div class="date">
                        <span id = "dayname">Day</span>
                        <span id = "month">Month</span>
                        <span id = "daynum">00</span>
                        <span id = "year">2022</span>
                    </div>
                    <div class="time">
                        <span id = "hour">00</span>
                        <span id = "minutes">00</span>
                        <span id = "seconds">00</span>
                        <span id = "period">AM</span>
                    </div>
                </div>

            </section>
        </main>
    </div>
</body>

