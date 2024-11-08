<?php
echo "<h2>Ajafunktsioonid</h2>";
echo "<div id='kuupaev'>";
echo "Täna on ".date("d.m.Y")."<br>";
date_default_timezone_set("Europe/Tallinn"); // mm.dd.yyyy h:mm
echo "<strong>";
echo "Tänane Tallinna kuupäev ja kellaaeg on - ".
    date("d.m.Y G:i", time())."<br>";
date('d.m.Y G:i', time())."<br>";
echo "</strong>";
echo "<br>";
echo "d-kuupaev 1-31";
echo "<br>";
echo "m - kuu numbrina 1-12";
echo "<br>";
echo "Y - aasta neljakohane";
echo "<br>";
echo "G - tunniformaat 0-23";
echo "<br>";
echo "i - minutid 0-59";
echo "</div>";
?>
<div id="hooaeg">
    <h2>Välja vastavale hooajale pilt</h2>
    <?php
    $today=new DateTime();
    echo "Täna on ".$today->format(' 03.30.2024 ');
    //hooaeg punktid - сезон
    $spring=new DateTime('March 20');
    $summer=new DateTime('June 21');
    $fall=new DateTime('September 22');
    $winter=new DateTime('December 22');

    switch (true){
        //kevad
        case ($today>=$winter && $today<$summer):
            echo "Kevad";
            $pildi_adress='content/img/kevad.jpg';
            break;
            //suvi
        case $today>=$summer && $today<$fall:
            echo "Suvi";
            $pildi_adress='content/img/suvi.jpg';
            break;
            //sügis
        case $today>=$fall && $today<$winter:
            echo "Sügis";
            $pildi_adress='content/img/sugis.jpg';
            break;
        case $today>=$winter && $today<$spring:
            echo "Talv";
            $pildi_adress='content/img/talv.jpg';
            break;


    }

    ?>
    <img src="<?=$pildi_adress?>" alt="hooaja pilt">
</div>
