<?php
	/**
	* 
	*/
	class PartyMember
	{
		public $_alive = true; #alive or dead
		public $_name;         #party member's first name
		public $_health = 100; #health, maximum 100, death at 0, 
								#illness cured 90 up,
								#illness possible at 75 bellow

		public $_illness = false; #is ill/ is not ill
		public $_illnessName = null; #name of illness
		public $_damage = 0; #damage done by illness

		#constructor
		public function __construct($name)
		{
			$_name = $name;
		}

		#induces injury or illness
		public function catchCold($name, $damage)
		{
			$_illness = true;
			$_illnessName = $name;
			$_damage = $damage;
		}

		#heals occur at rests
		public function heal($healRate)
		{
			if ($health >= 90)
			{
				$_illness = false;
				$_illnessName = null;
			}
			if ($health < 100)
			{
				$_health += $healRate;
			}
		}

		#member takes damage when ill or durring event
		public function takeDamage()
		{
			$_health -= $damage; 
		}

		#kills member
		public function die()
		{
			$_alive = false;
		}
	}


	#class for the stack or supplies avalable to the party
	class Supplies 
	{
		# amount of each supply
		public $_food;
		public $_money;
		public $_bait;
		public $_clothes;
		public $_wagonWheels;
		public $_wagonAxle;
		public $_wagonTongue;
		public $_oxen;
	

		public function __construct($jobCash)
		{
			$_food = 0;
			$_money = $jobCash; #Job
			$_bait = 0;
			$_clothes = 0;
			$_wagonAxle = 0;
			$_wagonWheels = 0;
			$_wagonTongue = 0;

		}

		public function eat($rate)
		{
			$_food -= $rate;
		}

		public function setItem($ID, $amount)
		{
			switch ($ID)
			{ 
			case 0:
				$_food += $amount;
				break;
				
			case 1:
				$_money += $amount;
				break;

			case 2:
				$_bait += $amount;
				break;

			case 3:
				$_clothes += $amount;
				break;

			case 4:
				$_wagonWheels += $amount;
				break;

			case 5:
				$_wagonAxle += $amount;
				break;

			case 6:
				$_wagonTongue += $amount;
				break;

			case 7:
				$_oxen += $amount;
				break;
			}


		}

	}

	#class for the whole party
	class Party
	{
		public $_members = []; #array containing all party members
		public $_health = "Good";	#general health of the party
		public $_supplies;	#supplies class instant
		public $_livingMembers = 5; #licing members of the party
		public $_rate = 3; #rate at which food is eaten

		public function __construct($names, $jobCash)
		{
			# names are given to constructor and made into party members
			$_members[0] = new PartyMember($names[0]);
			$_members[1] = new PartyMember($names[1]);
			$_members[2] = new PartyMember($names[2]);
			$_members[3] = new PartyMember($names[3]);
			$_members[4] = new PartyMember($names[4]);

			#supplies made by passing in starting money
			$_supplies = new Supplies($jobCash);


		}

		#set ration rate
		public function setRate($newRate)
		{
			$_rate = $newRate;
		}

		#food is reduced based on living party members and ration rate
		public function eat()
		{
			$_supplies->eat($_rate * $_livingMembers);
		}

		#checks if any members can be killed (has 0 health)
		public function killCheck()
		{
			foreach($_members as $body)
			{
				if($body->$_alive)
				{
					if($body->$health <= 0)
					{
						$body->$_alive = false;
						$_livingMembers-=1;
					}
				}
			}

			#code for when all members are dead
			#ends game
		}

		#averages health and assigns a rating
		public function health()
		{
			$sum = 0;
			$average = 0;
			foreach ($_members as $body) {
				if($body->$_alive)
				{
					$_sum += $body;
				}
			}

			$average = $sum / $_livingMembers;


			if($average <= 0)
			{
				$_health = "Game Over";
			}
			else if($average >= 75)
			{
				$_health = "Good";
			}
			else if($average > 50)
			{
				$_health = "Fair";
			}
			else if($average > 25)
			{
				$_health = "Poor";
			}
			else 
			{
				$_health = "Bad";
			}

		}

		#rest function that calls each member's heal function
		public function rest($healRate)
		{
			foreach ($_members as $body) 
			{
				if($body->$_alive)
				{
					$body->heal($healRate);
				}
			}	
		}

	}

	/**
	*shops that can be seen at landmarks
	*/
	class Shop
	{
		#costs for various objects
		public $_clothes; 
		public $_food;
		public $_bait;
		public $_parts;
		public $_yoke;

		public function __construct($local)
		{
		#costs are set based on a base cost and increase 
		#with each new location at a set rate
		$_clothes = 10 + 2.5 * $local;
		$_food  = .2 + .1 * $local;
		$_bait  =  2 + 2.5 * $local;
		$_parts  = 10 + 2.5 * $local;
		$_yoke  = 40 + 5 * $local;
		}
	}

	/**
	*Landmarks are stops allong the trail
	*/
	class Landmark
	{
		public static $_numShops = 0;
		public $_hasShop; #has a shop or not
		public $_shopIndex; # if this has a shop, the index of the shop
		public $_name; #name of the landmark
		public $_distance;	#distance along the trail

		public function __construct($hasShop, $name, $distance)
		{
			$_hasShop = $hasShop;
			$_name = $name;
			$_distance = $distance;
			
			if ($_hasShop == TRUE)
			{
				self::$_numShops++;
				$this->_shopIndex = self::$_numShops;
			}
			else
			{
				$this->_shopIndex = -1;
			}
		}
	}

	/**
	*Type of Landmark, adds depth and hasFerry
	*/
	class River extends Landmark
	{
		public $_depth; #depth of the river, invluences fording and rafting
		public $_hasFerry; #wheter a ferry is avalable or not

		public function __construct($name, $distance, $depth, $hasFerry)
		{
			#notice the super ensures there is no shop avalable
			parent::__construct(false, $name, $distance);

			$_depth = $depth;
			$_hasFerry = $hasFerry;
		}

		#states: return 0 for no chance of bad event
		#1 -  chance of minor event
		#2 - chance of major bad event
		#chance based on river depth
		public function ford()
		{
			if ($_depth <= 2.5)
			{
				return 0;
			}
			elseif ($_depth < 3.0) {
				return 1;
			}
			else{return 2;}
		}

	}

	/**
	* contains values related to traveling
	*/
	class Journey
	{
		public $_maxDate = array('January' => 31,
						  'Febuary' => 28,
						  'March' => 31,
						  'April' => 30,
						  'May' => 31,
						  'June' => 30,
						  'July' => 31,
						  'August' => 31,
						  'September' => 30,
						  'October' => 31,
						  'November' => 30,
						  'December' => 31);
		public $_months = array('January','Febuary','March','April',
						  'May','June','July','August',
						  'September','October','November','December');

		public $_date; #current date, constantlly increments 
		public $_month;
		public $_distance; #distance traveled
		public $_weather; #current weather, effects events
		public $_locations; #array of all landmarks
		public function __construct($date, $month, $locations)
		{
			$_date = $date;
			$_month = $_month;

			$_distance = 0;
			$_weather = "sunny";
			$_locations =  $location;

			# code...
		}

		public function nextLandmark()
		{
			#searches the array for the next highest location based on
			#current location
			foreach ($_locations as $local) {
				if($_distance < $local->$_distance)
					{
						return $local;
					}			
				}
		}

		#increments the day
		public function incrementDay()
		{
			#increase day
			$_date += 1;
			#checks if Day is higher then max days for the month
			if($_date > $_maxDate[$_month])
			{
				#resset date to 1, move to next month
				$_date = 1;
				$monthI = array_search($_month, $_months) + 1;

				#loop month back to 0
				if($monthI > 11){$monthI = 0;}

				$_month = $_months[$monthI];
			}
		}

		# Binary searches the locations array for a specified landmark given a distance
		# Gets returned in the format [index, object] or null if nothing was found
		public function getLandmark($distance)
		{
			$hi = count($this->_locations) - 1;
			$lo = 0;

			while ($lo != $hi)
			{
				$mid = floor(($hi + $lo) / 2);

				if ($this->_locations[$mid]->_distance == $distance)
				{
					return array($mid, $this->_locations[$mid]);
				}
				else if ($distance < $this->_locations[$mid]->_distance)
				{
					$hi = $mid - 1;
				}
				else if ($distance > $this->_locations[$mid]->_distance)
				{
					$lo = $mid + 1;
				}
			}

			// Check a size-1 partition just in case
			if ($this->_locations[$hi]->_distance == $distance)
			{
				return array( $hi, $this->_locations[$hi] );
			}
			else
			{
				return null;
			}
		}
	}

# Found on the PHP website
function erase_session()
{
	// Initialize the session.
	// If you are using session_name("something"), don't forget it now!
	session_start();

	// Unset all of the session variables.
	$_SESSION = array();

	// If it's desired to kill the session, also delete the session cookie.
	// Note: This will destroy the session, and not just the session data!
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}

	// Finally, destroy the session.
	session_destroy();
}

# Since this is a pure PHP file, it's best practice to leave the end tag off
# to avoid extraneous whitespace issues
