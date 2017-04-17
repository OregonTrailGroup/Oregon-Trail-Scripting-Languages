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
			$_damage = $damage
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
		public $_traps;
		public $_clothes;
		public $_wagonWheels;
		public $_wagonAxle;
		public $_wagonTongue;
		public $_oxen;
		
		public function __construct($jobCash)
		{
			$_food = 0;
			$_money = $jobCash; #Job
			$_traps = 0;
			$_clothes = 0;
			$_wagonAxle = 0;
			$_wagonWheels = 0;
			$_wagonTongue = 0;

		}

		public function eat($rate)
		{
			$_food -= $rate;
		}


	}

	#class for the whole party
	class Party
	{
		$_members = []; #array containing all party members
		$_health = "Good";	#general health of the party
		$_supplies;	#supplies class instant
		$_livingMembers = 5; #licing members of the party
		$_rate = 3; #rate at which food is eaten

		function __construct($names, $jobCash)
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
		function setRate($newRate)
		{
			$_rate = $newRate;
		}

		#food is reduced based on living party members and ration rate
		function eat()
		{
			$_supplies->eat($_rate * $_livingMembers);
		}

		function kill()
		{
			foreach($_members as $body)
			{
				if($body->$_alive)
				{
					if($body->$health == 0)
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
		function health()
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


			if($average => 0)
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
		function rest($healRate)
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
	class shop
	{
		#costs for various objects
		$_clothes; 
		$_food;
		$_traps;
		$_parts;
		$_yoke;

		function __construct($local)
		{
		#costs are set based on a base cost and increase 
		#with each new location at a set rate
		$_clothes = 10 + 2.5 * $local;
		$_food  = .2 + .1 * $local;
		$_traps  =  2 + 2.5 * $local;
		$_parts  = 10 + 2.5 * $local;
		$_yoke  = 40 + 5 * $local;
		}
	}

	/**
	*Landmarks are stops allong the trail
	*/
	class Landmark
	{
		$_hasShop; #has a shop or not
		$_name; #name of the landmark
		$_distance;	#distance along the trail

		function __construct($hasShop, $name, $distance)
		{
			$_hasShop = $hasShop;
			$_name = $name;
			$_distance $distance;

		}
	}

	/**
	*Type of Landmark, adds depth and hasFerry
	*/
	class River extends Landmark
	{
		$_depth; #depth of the river, invluences fording and rafting
		$_hasFerry; #wheter a ferry is avalable or not

		function __construct($name, $distance, $depth, $hasFerry)
		{
			#notice the super ensures there is no shop avalable
			parent::__construct(false, $name, $distance);

			$_depth = $depth;
			$_hasFerry = $hasFerry;
		}

	}

?>