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
echo "<pre>".trim($tekst2)."";
echo "<br>";
echo "<pre>".ltrim($tekst2)."</pre>";
echo "<br>";
echo "<pre>".rtrim($tekst2)."</pre>";
echo "<br>";
$tekst2 = 'Põhitoestus võetakse ära 11.11 kui võlgnevused ei ole paranadatud';
echo trim($tekst2, "a, v, k..p, d");
//Tekst kui massiiv
echo "<br>";
$tekst3 = 'All thinking men are atheists';
echo $tekst[0]; 				//A
echo '<br>';
echo $tekst[4]; 				//t