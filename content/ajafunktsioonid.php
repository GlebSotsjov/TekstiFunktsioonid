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
    echo "Täna on ".$today->format(' 8.11.2024 ');
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
    <img src="<?=$pildi_adress?>" alt="hooaja pilt" width="100px">
</div>
<div id="koolivaheaeg">
    <h2>Mitu päeva on koolivaheajani 23.12.2024</h2>
    <?php
    $kdate=date_create_from_format('d.m.Y', '23.12.2024');
    $date=date_create();
    $diff=date_diff($kdate,$date);
    echo "jääb ".$diff->days." päeva ";

    ?>
    <div id="sunnipaev">
        <h2>Mitu päeva on minu sünnipaeva</h2>
        <?php
        $mdate=date_create_from_format('d.m.Y', '17.09.2025');
        $date=date_create();
        $diff=date_diff($mdate,$date);
        echo "jääab ".$diff->days." päeva ";
        ?>

    </div>
</div>
<div id="vanus">
    <h2>Kasutaja vanuse leidmine</h2>
    <form method="post" action="">
        Sissesta oma sünnikuupäev
        <input type="date" name="synd" placeholder="dd.mm.yyyy">
        <input type="sumbit" value="OK">
    </form>
    <?php
    if(isset($_POST["synd"])){
        if(empty($_POST["synd"])){
            echo "sissesta oma Sünnipäeva kuupäaev";
        }
        else{
            $sdate=date_create($_POST["synd"]);
            $date=date_create();
            $interval=date_diff($sdate,$date);
            echo "Sinu vanus ".$interval->format("%y")." aastat vana";
        }
    }
    ?>
</div>
<div id="kuu">
    <h2>Massivi abil näidata kuu nimega.</h2>
    <?php
    $kuud = array(1=>'Jaanuar','Veebruar','Märts','Aprill','Mai','Juuni','Juuli','August','September','Oktober','November','December');
    $paev=date('d');
    $year=date('Y');
    $kuu=date('m');
    $kuu=$kuud[date('n')];
    echo $paev.'.'.$kuu.'.'.$year.' ';

    ?>

</div>