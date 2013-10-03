#!/usr/bin/php
<?php
// Modify these hardcoded values to change the league scraped
// Should be made into command line arguments or something
$leagueID = 1164514;
$numTeams = 10;

for ($id=1; $id <= $numTeams; $id++)
	{
	print "Team ID: " . $id;
	//Get the html for the webpage with the league ID and the current team ID
	$url = "http://games.espn.go.com/ffl/clubhouse?leagueId=" . $leagueID . "&teamId=" . $id . "&seasonId=2013";
	$content = file_get_contents( $url );

	// Acquire team name
	$content = stristr( $content, "<title>" );
	$nameLen = stripos( $content, "-" ) - 8;
	$teamName = substr( $content, 7, $nameLen );
	print " (" . $teamName . ")\n";


	//Strip everything but the line with the player data
	$content = stristr( $content, "<br clear=" );
	$content = stristr( $content, "<script type=", true );

	$contentArr = explode("cache=", $content);

	for ($i=1; $i<sizeof($contentArr); $i++)
		{
		$contentArr[$i] = substr( $contentArr[$i], 7);
		if (preg_match('/([A-Z])/',$contentArr[$i][0]))
			{
			print stristr($contentArr[$i], "<", true);
			print "\n\n";
			}
		}
	}
?>
