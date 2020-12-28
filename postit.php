<?php
$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');
$envoyer = htmlspecialchars($_POST['envoyer']);
$nom = htmlspecialchars($_POST['nom']);
$msg = htmlspecialchars($_POST['message']);
if (!empty($envoyer)) {
    $smileys = array(
        ':)',
        ':D',
        ':l',
        ':z',
        ':(',
        ':--',
        '-p-',
        ':-[]',
        ':||',
        ':-*',
        '-d-',
        '-OO-',
        '-SFl-',
        '-$-',
        '-¨-',
        '-bounce-',
        );
    $out = array(
        '<img src="img/01.png" alt=""/>',
        '<img src="img/02.png" alt=""/>',
        '<img src="img/03.png" alt=""/>',
        '<img src="img/05.png" alt=""/>',
        '<img src="img/04.png" alt=""/>',
        '<img src="img/06.png" alt=""/>',
        '<img src="img/07.png" alt=""/>',
        '<img src="img/08.png" alt=""/>',
        '<img src="img/09.png" alt=""/>',
        '<img src="img/010.png" alt=""/>',
        '<img src="img/011.png" alt=""/>',
        '<img src="img/012.png" alt=""/>',
        '<img src="img/013.png" alt=""/>',
        '<img src="img/014.png" alt=""/>',
        '<img src="img/015.png" alt=""/>',
        '<img src="img/016.gif" alt=""/>',
    );
    $msgrep=str_replace($smileys, $out, $msg);

    setcookie("mchat", $nom, time() + 3600);  /* expire dans 1 heure */
    //$reponse=$bdd->query('SELECT * FROM usersmsg');
    $reponse = $bdd->query("INSERT INTO usersmsg(nom,msg) VALUES ('$nom','$msgrep')");
    header('Location: index.php');
}
?>

