<?php
echo "Mõistatus. Euroopa riik";
// 6 подсказок
$riik = 'Itaalia';
echo "<ol>";
echo "<li>Esimene täht riigis on - " . substr($riik, 0, 1) . "</li>";
echo "<li>Riigi tähtede arv on - " . strlen($riik) . "</li>";
echo "<li>Asenda 'a' tähed '-' märkidega - " . str_replace('a', '-', $riik) . "</li>";
echo "<li>Riigi nimi tagurpidi - " . strrev($riik) . "</li>";
echo "<li>Suured tähed - " . strtoupper($riik) . "</li>";
echo "<li>Väiksed tähed - " . strtolower($riik) . "</li>";
echo "</ol>";
?>
<form method="post">
    <label for="answer">Sisesta oma vastus:</label>
    <input type="text" id="answer" name="answer">
    <button type="submit">Kontrolli</button>
</form>

<?php
if (isset($_POST["answer"])) {
    if (empty($_POST["answer"])) {
        echo "Sisesta oma vastus!";
    } else {
        $userAnswer = trim($_POST["answer"]);
        if (strcasecmp($userAnswer, $riik) === 0) {
            echo "Õige! Tubli!";
        } else {
            echo "Vale vastus. Proovi veel!";
        }
    }
}
highlight_file('moistatus.php');
?>
