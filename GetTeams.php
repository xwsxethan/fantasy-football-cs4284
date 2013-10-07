#!/usr/bin/php
<?php
// Modify these hardcoded values to change the league scraped
// Should be made into command line arguments or something
$leagueID = 1164514;
$numTeams = 10;

// 3D array to store all the teams in
// is made up of team arrays
$league = array();
// Array to store all the players in 
$team = array();
// Associative Array to store the Player info
$player = array();


//$id = 8; //For testing w/o loop
for ($id=1; $id <= $numTeams; $id++)
	{
//	print "Team ID: " . $id;
	//Get the html for the webpage with the league ID and the current team ID
	$url = "http://games.espn.go.com/ffl/clubhouse?leagueId=" . $leagueID . "&teamId=" . $id . "&seasonId=2013";
	$content = file_get_contents( $url );

	// Acquire team name
	$content = stristr( $content, "<title>" );
	$nameLen = stripos( $content, "-" ) - 8;
	$teamName = substr( $content, 7, $nameLen );
//	print " (" . $teamName . ")\n";

	//Strip everything but the line with the player data
	$content = stristr( $content, "<br clear=" );
	$content = stristr( $content, "<script type=", true );
	$content = stristr( $content, "\"slot_" );

	// Split the string into an array of strings respresenting each line of the table 
	$contentArr = explode("<td id=", $content);

	// Loop through each string in the array
	for ($i=0; $i<sizeof($contentArr); $i++)
		{
		// PlayerID is the first number. Use Regex to find it.
		$matches = array();
		preg_match('/([0-9]+)/', $contentArr[$i], $matches);
		$playerID = $matches[0];
		
		$team[$i]['ID'] = $playerID;

		// The Player's name comes after the word cache="true"
		preg_match('/cache="true">([0-9A-Za-z \/]+)/', $contentArr[$i], $matches);
		$playerName = substr($matches[0], 13);

		$team[$i]['Name'] = $playerName;

		//print $playerName . "(" . $playerID . ")" . "\n";
		}
	$league[$id] = $team;
	}

for ($i=1; $i<=sizeof($league); $i++)
	{
	for ($j=0; $j<sizeof($league[$i]); $j++)		
		{
		print $league[$i][$j]['Name'];
		print "(ID: ";
		print $league[$i][$j]['ID'];
		print "), ";
		}
	print "\n\n";
	}





?>
