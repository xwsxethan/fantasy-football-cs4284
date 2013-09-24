<?php
class Player
{
    // Variable Declarations
	// Note: for defense name = team name
    private $name, $position, $team, $nextWeek, $fantasyTeam, $injury, $passingYards, 
	$passingTDs, $passInterceptions, $rushYards, $rushTDs, $receptions, $receptionYards, 
	$receptionTDs, $returnTDs, $twoPointConversions, $fumblesLost, $offensiveFumRetTDs, 
	$fg19, $fg29, $fg39, $fg49, $fg50, $sacks, $defInterceptions, $fumRecoveries, 
	$blocks, $retTDs, $ptsAllowed;
	//Things we could add: Defense yards and TDs allowed for passing and rushing
	

    // Constructor
    public function __construct($name, $position, $team, $nextWeek, $fantasyTeam, $injury,
	$passingYards, $passingTDs, $passInterceptions, $rushYards, $rushTDs, $receptions, 
	$receptionYards, $receptionTDs, $returnTDs, $twoPointConversions, $fumblesLost, 
	$offensiveFumRetTDs, $fg19, $fg29, $fg39, $fg49, $fg50, $sacks, $defInterceptions, 
	$fumRecoveries, $blocks, $retTDs, $ptsAllowed) 
	{
        $this->name = $name;
		$this->position = $position;
		$this->team = $team;
		$this->nextWeek = $nextWeek;
		$this->fantasyTeam = $fantasyTeam;
		$this->injury = $injury; 
		$this->passingYards = $passingYards;
		$this->passingTDs = $passingTDs;
		$this->passInterceptions = $passInterceptions;
		$this->rushYards = $rushYards;
		$this->rushTDs = $rushTDs;
		$this->receptions = $receptions;
		$this->receptionYards = $receptionYards;
		$this->receptionTDs = $receptionTDs;
		$this->returnTDs = $returnTDs;
		$this->twoPointConversions = $twoPointConversions;
		$this->fumblesLost = $fumblesLost;
		$this->offensiveFumRetTDs = $offensiveFumRetTDs;
		$this->fg19 = $fg19;
		$this->fg29 = $fg29;
		$this->fg39 = $fg39;
		$this->fg49 = $fg49;
		$this->fg50 = $fg50;
		$this->sacks = $sacks;
		$this->defInterceptions = $defInterceptions;
		$this->fumRecoveries = $fumRecoveries;
		$this->blocks = $blocks;
		$this->retTDs = $retTDs;
		$this->ptsAllowed = $ptsAllowed;
    }
	
	public function __get($property) 
	{
		if (property_exists($this, $property)) {
			return $this->$property;
		}
	}

	public function __set($property, $value) 
	{
		if (property_exists($this, $property)) {
			$this->$property = $value;
		}
    return $this;
	}
}
?>