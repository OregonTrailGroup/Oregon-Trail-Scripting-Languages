<?php
include "scoresAndDeaths.php";

$db = new OregonTrailDatabase("root", "eritte2");
$db->connect();

echo "Inserting data into database...";

$db->addDeath("Evan", 500, "He died of dysentery", 1, 3);
$db->addScore("Evan", 9001);
$db->addScore("Lupoli", 3);
$db->addScore("Gene", 9002);
$db->addScore("Adam", 9003);
$db->addScore("Andrew", 9004);

$tombstone = $db->getDeath(400, 600);

echo "Tombstone: ".$tombstone["name"]." died on ".$tombstone["date"]." with the message: ".$tombstone["message"];

$scores = $db->getScores();
$index = 1;

foreach ($scores as $score)
{
    echo "#".$index.": ".$score["name"]." -> ".$score["score"];
}