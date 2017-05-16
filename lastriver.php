<?php
include "classes.php";
session_start();
include "commonUI.php";
startHTML("lastriver");

$money = $_SESSION["playParty"]->_supplies->_money;

if($money >= 500)
{
?>
<p>
	<br>To reach Oregon, you may take the 500 dollar toll road or raft<br><br>
	<a href="end.php?toll=1"><button>Take the toll road</button></a><br><br>
	<a href="lastraft.php"><button>Take the Raft</button></a><br><br>
</p>
<?php
}
else{
?>
<p>
	<br>To reach Oregon, you may take the 500 dollar toll road or raft<br><br>
	However, Because you have too little money you must raft<br><br>
	<a href="lastraft.php"><button>Take the Raft</button></a><br><br>
</p>

<?php
}

?>
