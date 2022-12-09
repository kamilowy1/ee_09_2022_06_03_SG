<!DOCTYPE html>
<html lang="pl">
<head> 
<meta charset="utf-8">
<title>Opinie klientów</title>
<link rel="stylesheet" type="text/css" href="styl3.css"/>
</head>
<body>

<div id="baner">
<h1> Hurtownia spożywcza</h1>
</div>

   <div id="główny">
    <h2> Opinie naszych klientów </h2>

<?php

//połączenie z bazą
$server = "localhost";
$user = "root";
$passwd = "";
$dbname = "hurtownia";

$conn = mysqli_connect($server,$user,$passwd,$dbname);
/*
if (!$conn) {
    die ("fatal error" .mysqli_error($conn));
} echo "jest okej";
*/

//pobranie wartosci 
$sql = "SELECT klienci.zdjecie, klienci.imie, opinie.opinia FROM klienci, opinie WHERE klienci.id=opinie.Klienci_id AND klienci.Typy_id in(2,3)";
$wynik = mysqli_query($conn,$sql);
while ($wynik1 = mysqli_fetch_row($wynik)) {
    echo "
    <div class='opinia'>
      <img src='$wynik1[0]' alt='klient'>
      <blockquote>$wynik1[2]</blockquote>
      <h4>$wynik1[1]</h4>
      </div>
      ";
}


?>
   </div>

           <div id="stopka1">
            <h3> Współpracują z nami </h3>
            <a href="http://sklep.pl/">Sklep 1</a>
           </div>
                  
                <div id="stopka2">
                 <h3> Nasi top klienci </h3>
<?php

$sql2 = "SELECT imie, nazwisko, punkty FROM klienci ORDER BY punkty DESC limit 3";
$wynik2 = mysqli_query($conn,$sql2);
echo "<ol>";
while ($wiersz2 = mysqli_fetch_row($wynik2)) {
    echo "<li>$wiersz2[0] $wiersz2[1], $wiersz2[2] pkt</li>";
}
echo "</ol>"
?>
                </div>
                
                         <div id="stopka3">
                          <h3> Skontaktuj się </h3>
                          <p>telefon: 111222333</p>
                         </div>
  
                             <div id="stopka4">
                              <h3> Autor: 000000000 </h3>
                             </div>

</body>
</html>