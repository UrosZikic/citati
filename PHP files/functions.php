<?php
//random picture function
//Funkcija rand10 se poziva 3 puta iz structure.php
// $numHold prima broj iz $randNum u niz samo ukoliko ga nema. Ovaj uslov proverava While petlja, ona se vrti sve dok ne nadje prve 3 jednistvene vrednosti putem $randNum.
// $randNum daje nasumicnu vrednost izmedju 1-10 jer postoji 10 mogucih slika koje se mogu dobiti.
// pronadjene vrednosti se prosledjuju u putanju do slike i na taj nacin se uvek postavljaju 3 razlicite slike pri ucitavanju stranice.
$numHold = [];
function rand10()
{
  global $numHold;
  $randNum = rand(1, 10);
  while (in_array($randNum, $numHold)) {
    $randNum = rand(1, 10);
  }
  array_push($numHold, $randNum);
  return "../images/img_" . $randNum . ".jpg";
}


// date
// Ova funkcija vraca trenutni datum kroz $date promenljivu i trenutno vreme kroz $time promenljivu
function dateNow()
{
  $date = date("j.m.Y");

  return $date;
}

// $file_contents = file('F:/ITB domaci/projekat/file.txt');
// quote extraction
// extractQuote funkcija prima parametar koji upotpunjuje putanju do .txt fajla. parametri => love, work, motivation, health
//$quote i $author nizovi kroz petlju preuzimaju predodredjene redove tekst fajla
//$randIndex preuzima nasumicno izbaran broj od 0 do 9 (brojevi predstavljaju indekse), i prosledjuje se u return.
//$quote i $author ce uvek izbacivati nasumican citat i autora tog citata.
function extractQuote($type)
{
  $file = __DIR__ . "/../texts/$type.txt";
  $file_contents = file($file);

  $quote = [];
  $author = [];

  for ($i = 0; $i < count($file_contents); $i++) {
    if ($i % 2 == 0) {
      array_push($quote, $file_contents[$i]);
    } else {
      array_push($author, $file_contents[$i]);
    }
  }
  $randIndex = rand(0, 9);
  return $quote[$randIndex] . "<br>" . $author[$randIndex];
}


// randquote
//ova funkcija se aktivira prilikom otvaranja stranice a uslov za njenu aktivaciju je da opcije za posebnu vrstu citata nisu kliknute, na taj nacin
//nasumicni citat dobijamo samo jednom.
function randQuote()
{
  if (!isset($_POST['love']) && !isset($_POST['work']) && !isset($_POST['motivation']) && !isset($_POST['health'])) {
    $randQuote = rand(1, 4);
    if ($randQuote == 1) {
      return extractQuote("love");
    } elseif ($randQuote == 2) {
      return extractQuote("work");
    } elseif ($randQuote == 3) {
      return extractQuote("motivation");
    } else {
      return extractQuote("health");
    }
  }
}


?>