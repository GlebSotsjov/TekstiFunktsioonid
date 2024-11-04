<?php
echo "Tere Hommikust!";
echo "<br>";
$muutuja ="PHP on skriptikeel";
echo "<strong>";
echo $muutuja;
echo "</strong>";
echo "<br>";
// Tekstifunktsioonid
echo "<h2>Tekstifunktsioonid</h2>";
$tekst='Esmaspäev on 4.november';
echo $tekst;
// kõik tähed on suured
echo "<br>";
echo strtoupper($tekst);
// kõik tähed on väiksed
echo "<br>";
echo strtolower($tekst);
// iga sõna algab suure tähega
echo "<br>";
echo ucwords($tekst);
// teksti pikkus
echo "<br>";
echo "Teksti pikkus - ".strlen($tekst);
//eraldame esimesed 5 tähte
echo "<br>";
echo "Esimesed 5 tähte - ".substr($tekst,0,5);
//leiame on positsiooni
echo "<br>";
$otsin="on";
echo "On asukoht lauses on - ".strpos($tekst,$otsin);
// eralda esimene sõna kuni $otsin
echo "<br>";
echo substr($tekst,0,strpos($tekst,$otsin));
//eralda peale esimest sõna, alates 'on'
echo "<br>";
echo substr($tekst,strpos($tekst,$otsin));
echo "<br>";
echo "<h2>Kasutame veebis kasutavaid näidised</h2>";
// sõnade arv lauses
echo "<br>";
echo "sõnade arv lauses - ".str_word_count($tekst);
//Teksti kärpimine
$tekst2 = ' 	Põhitoestus võetakse ära 11.11 kui võlgnevused ei ole paranadatud   ';
echo "<br>";
echo "<pre>$tekst2</pre>";
echo "<br>";
echo "<pre>".trim($tekst2);
echo "<br>";
echo "<pre>".ltrim($tekst2);
echo "<br>";
echo "<pre>".rtrim($tekst2);
echo "<br>";
$tekst2 = 'Põhitoestus võetakse ära 11.11 kui võlgnevused ei ole paranadatud';
echo trim($tekst2, "a, v, k..p, d");
echo "<br>";


echo "<h2>Tekst kui massiiv</h2>";
//Tekst kui massiiv
echo "<br>";
$tekst3 = 'Minu nimi on Gleb';
echo $tekst3[13]; 				//G
echo '<br>';
echo $tekst3[6]; 				//i
echo "<br>";
echo "<br>";
$tekst3 = 'Minu nimi on Gleb';
echo substr($tekst3, 3, 5);		//u nim
echo '<br>';
echo substr($tekst3, 1, 13);	//inu nimi on G
echo '<br>';
echo substr($tekst3, -8, 7);		//on Gle
echo '<br>';
echo "<br>";
$tekst3 = 'Minu nimi on Gleb';
print_r(str_word_count($tekst3, 1));		//Array ( [0] => Minu [1] => Nimi [2] => on [3] => Gleb)
echo '<br>';
echo "<br>";
$tekst3 = 'Minu nimi on Gleb';
$sona = str_word_count($tekst3, 1);
echo $sona[2];							//on
echo '<br>';
echo "<br>";
$tekst3 = 'Minu nimi on Gleb';
print_r(str_word_count($tekst3, 2));
//Array ( [0] => Minu [5] => nimi [10] => on [13] => Gleb )