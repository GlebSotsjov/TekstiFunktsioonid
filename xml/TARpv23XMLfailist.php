<?php
if (isset($_GET['code'])) {die(highlight_file(__FILE__));}

$ruhm = simplexml_load_file("Tarpv23.xml");

// Funktsioon otsib õpilasi nende juuksevärvi järgi /
// Функция ищет учеников с их цветом волос
function otsingJuuksevarv($paring) {
    global $ruhm;
    $opilanevastus = array();
    foreach ($ruhm->opilane as $opilane) {
        if (substr(strtolower($opilane->juuksevarv), 0, strlen($paring)) == strtolower($paring)) {
            array_push($opilanevastus, $opilane);
        }
    }
    return $opilanevastus;
}

// Lisab uue õpilase XML-i ja salvestab faili /
// Добавляет нового ученика в XML и сохраняет файл
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nimi']) && isset($_POST['koduleht']) && isset($_POST['sugu']) && isset($_POST['juuksevarv'])) {
    $uusOpilane = $ruhm->addChild('opilane');
    $uusOpilane->addChild('nimi', htmlspecialchars($_POST['nimi']));
    $uusOpilane->addChild('koduleht', htmlspecialchars($_POST['koduleht']));
    $uusOpilane->addChild('sugu', htmlspecialchars($_POST['sugu']));
    $uusOpilane->addChild('juuksevarv', htmlspecialchars($_POST['juuksevarv']));
    $ruhm->asXML('Tarpv23.xml');
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TARpv23 rühm Veebirakendus</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightcyan;
            color: gray;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: black;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }

        th, td {
            padding: 10px;
            border: 1px solid white;
            text-align: center;
        }

        th {
            background-color: blue;
            color: white;
        }

        a {
            color: blue;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="text"], select {
            padding: 8px;
            width: 200px;
            border: 1px solid white;
            border-radius: 4px;
            margin-right: 10px;
            text-align: center;
        }

        input[type="submit"] {
            padding: 8px 15px;
            background-color: white;
            color: black;
            border: none;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: lightcyan;
        }
    </style>
</head>
<body>
<h2>Õpilaste rühm TARpv23</h2>

<!-- Vorm otsimiseks / Форма поиска -->
<form method="post" action="?">
    <label for="otsing">Otsi juuksevärvi:</label>
    <input type="text" id="otsing" name="otsing" placeholder="Sisesta juuksevärv">
    <input type="submit" value="OK">
</form>

<?php
// Näitab konkreetse õpilase juuksevärvi, kui otsingut ei toimu, naaseb algsesse asendisse /
// Показывает определенный цвет волос ученика , если поиска нет возврощает в исходное положение
if (!empty($_POST['otsing'])) {
    $opilanevastus = otsingJuuksevarv($_POST['otsing']);
    echo "<table>";
    echo "<tr>";
    echo "<th>Sugu</th>";
    echo "<th>Koduleht</th>";
    echo "<th>Juuksevärv</th>";
    echo "</tr>";

    foreach ($opilanevastus as $opilane) {
        echo "<tr>";
        echo "<td>" . $opilane->sugu . "</td>";
        echo "<td><a href='https://" . $opilane->koduleht . "' target='_blank'>" . $opilane->nimi . "</a></td>";
        echo "<td>" . $opilane->juuksevarv . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    ?>
    <table>
        <tr>
            <th>Sugu</th>
            <th>Koduleht</th>
            <th>Juuksevärv</th>
        </tr>

        <?php
        foreach ($ruhm as $opilane) {
            echo "<tr>";
            echo "<td>" . $opilane->sugu . "</td>";
            echo "<td><a href='https://" . $opilane->koduleht . "' target='_blank'>" . $opilane->nimi . "</a></td>";
            echo "<td>" . $opilane->juuksevarv . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <?php
}
?>

<h2>Lisa uus õpilane</h2>
<!-- Vorm uue õpilase lisamiseks / Форма добавления нового ученика -->
<form method="post" action="">
    <input type="text" name="nimi" placeholder="Nimi" required>
    <input type="text" name="koduleht" placeholder="Koduleht" required>
    <select name="sugu" required>
        <option value="mees">mees</option>
        <option value="naine">naine</option>
    </select>
    <input type="text" name="juuksevarv" placeholder="Juuksevarv" required>
    <input type="submit" value="Lisa">
</form>

</body>
</html>
