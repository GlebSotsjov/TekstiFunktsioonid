<?php
echo "Mõistatus. Euroopa riik";
// 6 подсказок при помощи текстовых функций
// выводить списком <ul> / <ol>
$riik='Itaalia';
echo "<ol>";
echo "<li>Esimene täht riigis on - ".substr($riik,0,1);
echo "</li>";
echo "<li>Riigi tähtede arv on - ".strlen($riik);
echo "</li>";
echo "<li>Kui mõnes kohas vahetada, siis tuleb see nii välja - ".substr_replace($riik,'',1,4);
echo "<li> - ";
echo $riik[1];
echo $riik[4];
echo "<li> - ";
echo "<li> - ";
echo "</ol>";

