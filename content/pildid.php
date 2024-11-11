<h2>Töö pildifailidega</h2>
<a href="https://www.metshein.com/unit/php-pildifailidega-ulesanne-14/">PHP – Töö pildifailidega</a>
<form method="post" action="">

    <select name="pildid">
        <option value="">Vali pilt</option>
        <?php
        $kataloog = 'content/img';
        if (is_dir($kataloog)) {
            //pildid
            $asukoht = opendir($kataloog);
            while (($rida = readdir($asukoht)) !== false) {
                if ($rida != '.' && $rida != '..') {
                    echo "<option value='$rida'>$rida</option>\n";
                }
            }
            closedir($asukoht);
        } else {
            echo "<option disabled>Kaust ei leitud!</option>";
        }
        ?>
    </select>
    <input type="submit" value="Vaata">
    <input name="random" type="submit" value="random picture">
</form>

<?php
if (!empty($_POST['pildid'])) { //kui kasutaja vajuta "vaata"nupp, siis näitame ripp loendit
    $pilt = $_POST['pildid'];
    $pildi_aadress = 'content/img/'. $pilt;

    if (file_exists($pildi_aadress)) {
        $pildi_andmed = getimagesize($pildi_aadress);

        $laius = $pildi_andmed[0];
        $korgus = $pildi_andmed[1];
        $formaat = $pildi_andmed[2];

        $max_laius = 120;
        $max_korgus = 90;

        // Вычисление масштаба
        if ($laius <= $max_laius && $korgus <= $max_korgus) {
            $ratio = 1;
        } elseif ($laius > $korgus) {
            $ratio = $max_laius / $laius;
        } else {
            $ratio = $max_korgus / $korgus;
        }

        // Новые размеры
        $pisi_laius = round($laius * $ratio);
        $pisi_korgus = round($korgus * $ratio);

        echo '<h3>Originaal pildi andmed</h3>';
        echo "Laius: $laius px<br>";
        echo "Kõrgus: $korgus px<br>";
        echo "Formaat: " . ($formaat == 1 ? 'GIF' : ($formaat == 2 ? 'JPG' : ($formaat == 3 ? 'PNG' : 'Tundmatu'))) . "<br>";

        echo '<h3>Uue pildi andmed</h3>';
        echo "Arvutatud suhe: $ratio <br>";
        echo "Laius: $pisi_laius px<br>";
        echo "Kõrgus: $pisi_korgus px<br>";
        echo "<img width='$pisi_laius' height='$pisi_korgus' src='$pildi_aadress' alt='Pisipilt'><br>";
    } else {
        echo '<p style="color: red;">Valitud faili ei leitud!</p>';
    }
}
?>
<h2>Ül1. Suvaline pilt – koosta kood, mis valib kataloogist suvalise pildi</h2>
    <?php
    function get_rand_img($dir) {
        if (!is_dir($dir)) {
            return "Cataloog ei vaata";
        }

        $list = scandir($dir);
        $arr = array();

        foreach ($list as $file) {
            $file_path = $dir . '/' . $file;

            if (is_file($file_path)) {
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($ext, ['gif', 'jpeg', 'jpg', 'png'])) {
                    $arr[] = $file;
                }
            }
        }

        if (empty($arr)) {
            return "";
        }

        $img = $arr[array_rand($arr)];
        return $dir . '/' . $img;
    }

    $random_image = get_rand_img('content/img');
    if (strpos($random_image, 'Catalog') !== 0 && strpos($random_image, 'Caatalog') !== 0) {
        echo '<img src="' . $random_image . '" style="max-width: 120px; max-height: 120px;" alt="Random pilt">';
    } else {
        echo '<p>' . $random_image . '</p>';
    }

    ?>


