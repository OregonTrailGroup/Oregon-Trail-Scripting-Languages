<?php

class OregonTrailDatabase 
{
    static $host = "localhost";
    private $_username;
    private $_password;
    private $_dbConnection;

    // Constructs a new connection to the database given a username and password
    public function __construct($username, $password)
    {
        $this->_username = $username;
        $this->_password = $password;
        $this->_dbConnection = NULL;
    }

    // Closes the DB connection when this is destroyed
    public function __destruct()
    {
        if ($this->_dbConnection)
        {
            mysql_close($this->_dbConnection);
        }
    }

    // Connects to the database. Returns TRUE on success and FALSE on failure.
    public function connect()
    {
        $this->_dbConnection = mysql_connect(self::$host, $this->_username, $this->_password);

        if ($this->_dbConnection)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    // Verifies that we're connected to the database, throws an error otherwise
    private function _verifyConnection()
    {
        if (!$this->_dbConnection)
        {
            throw new Exception("You're not connected to the database.");
        }
    }

    // Adds a death
    public function addDeath($name, $miles, $message, $month, $day)
    {
        $this->_verifyConnection();
        $queryString = "INSERT INTO eritte2.tombstones (`name`, `distance`, `message`, `date`) VALUES ('".$name."', '".$miles."', '".$message."', DATE '1848-".$month."-".$day."')";
        
        mysql_query($queryString);
    }

    // Adds a score
    public function addScore($name, $score)
    {
        $this->_verifyConnection();
        $queryString = "INSERT INTO eritte2.scores (`name`, `score`) VALUES ('".$name."', ".$score.")";

        mysql_query($queryString);
    }

    // Gets a tombstone in a distance interval. Returns associative array {"name", "message", "date"} if there is a tombstone at the specified distance or FALSE otherwise
    public function getDeath($milesLow, $milesHigh)
    {
        $this->_verifyConnection();
        $queryString = "SELECT `name`, `message`, `date` FROM eritte2.tombstones WHERE `distance` >= ".$milesLow." AND `distance` <= ".$milesHigh." LIMIT 1";

        $result = mysql_query($queryString);

        return mysql_fetch_assoc($result);
    }

    // Gets the top 10 scores or less depending on the contents of the database as an array of associative arrays: {"name", "score"}
    public function getScores()
    {
        $this->_verifyConnection();
        $queryString = "SELECT `name`, `score` FROM eritte2.scores ORDER BY `score` ASC LIMIT 10";

        $results = array();
        $result = mysql_query($queryString);

        while ($row = mysql_fetch_assoc($result))
        {
            array_push($results, $row);
        }

        return $results;
    }
}