<?php
$autod=simplexml_load_file("auto.xml");

//otsing function

function otsingAutonumbriJargi($paring){
    global $autod;
    $paringVastus=array();
    foreach($autod->auto as $auto){
        if(substr(strtolower($auto->autonumber),0, strlen($paring))==strtolower($paring)){
            array_push($paringVastus,$auto);
        }
    }
    return $paringVastus;
}

?>
<!Doctype html>
<html lang="et">
    <head>
<title>Autode andmed xml failist</title>
        <style>
            table,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 5px;
            }

            tr:nth-child(odd) {
                background-color: #8F9AA5;
            }
        </style>
</head>
    <body>
<h2>Autode andmed xml failist</h2>
<div>
    Esimene auto andmed:
    <?php
    echo $autod->auto[0]->mark;
    echo ", ";
    echo $autod->auto[0]->autonumber;
    echo ", ";
    echo $autod->auto[0]->omanik;
    echo ", ";
    echo $autod->auto[0]->v_aasta;

    ?>
</div>
<!--Otsing-->
<form method="post" action="?">
    <label for="otsing"></label>
    <input type="text" id="otsing" name="otsing" placeholder="autonumber">
    <input type="submit" value="OK">
</form>
<br>
<br>
<?php
    if(!empty($_POST['otsing'])){
        $paringVastus=otsingAutonumbriJargi($_POST['otsing']);
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Mark</th>";
        echo "<th>Autonumber</th>";
        echo "<th>Omanik</th>";
        echo "<th>Aasta</th>";
        echo "</tr>";

        foreach($paringVastus as $auto){
            echo "<tr>";
            echo "<td>".$auto->mark."</td>";
            echo "<td>".$auto->autonumber."</td>";
            echo "<td>".$auto->omanik."</td>";
            echo "<td>".$auto->v_aasta."</td>";
            echo "</tr>";
        }
    }
    else{
?>

<table border="1">
    <tr>
        <th>Mark</th>
        <th>Autonumber</th>
        <th>omanik</th>
        <th>Väljastamise aasta</th>
    </tr>

        <?php
        foreach($autod as $auto){
            echo "<tr>";
            echo "<td>".$auto->mark."</td>";
            echo "<td>".$auto->autonumber."</td>";
            echo "<td>".$auto->omanik."</td>";
            echo "<td>".$auto->v_aasta."</td>";
            echo "</tr>";
        }

        ?>

</table>
<?php
}
?>

</body>
</html>