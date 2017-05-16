<?php

include "commonUI.php";

startHTML("The Last River");
?>

<div class="overlay vertical-layout">
    <h3>THE LAST RAFT</h3>
    <img src="assets/Separator.png" />
    <p>You've come to the Columbia River and must direct your family and wagon to safety in Oregon City!</p>
    <p>Your wagon can only withstand 5 collsions with the rocks in the river. If you crash more than 5 times, you and your family will drown and perish!</p>
    <p>Click the left and right buttons at the bottom of the screen to direct the raft.</p>
    <h4>Good Luck!</h4>
    <button id="start">Start Rafting!</button>
</div>

<table class="river">
    <tr> 
       <td id="00"></td> 
       <td id="01"></td> 
       <td id="02"></td> 
       <td id="03"></td> 
       <td id="04"></td> 
       <td id="05"></td> 
    </tr>
    <tr> 
       <td id="10"></td> 
       <td id="11"></td> 
       <td id="12"></td> 
       <td id="13"></td> 
       <td id="14"></td> 
       <td id="15"></td> 
    </tr>
    <tr> 
       <td id="20"></td> 
       <td id="21"></td> 
       <td id="22"></td> 
       <td id="23"></td> 
       <td id="24"></td> 
       <td id="25"></td> 
    </tr>
    <tr> 
       <td id="30"></td> 
       <td id="31"></td> 
       <td id="32"></td> 
       <td id="33"></td> 
       <td id="34"></td> 
       <td id="35"></td> 
    </tr>
    <tr> 
       <td id="40"></td> 
       <td id="41"></td> 
       <td id="42"></td> 
       <td id="43"></td> 
       <td id="44"></td> 
       <td id="45"></td> 
    </tr>
    <tr> 
       <td id="50"></td> 
       <td id="51"></td> 
       <td id="52"></td> 
       <td id="53"></td> 
       <td id="54"></td> 
       <td id="55"></td> 
    </tr>
    <tr> 
       <td id="60"></td> 
       <td id="61"></td> 
       <td id="62"></td> 
       <td id="63"></td> 
       <td id="64"></td> 
       <td id="65"></td> 
    </tr>
</table>

<div>
    <button id="moveLeft" class="inline"><-</button>
    <button id="moveRight" class="inline">-></button>
</div>

<p>Crashes remaining: <span id="crashes">5</span></p>

<div id="playerWon" style="display: none;">
    <p>You made it!</p>
    <a href="end.php?=0"><button>Go to Oregon City</button></a>
</div>

<div id="playerDied" style="display: none;">
    <p>You have crashed and drowned...</p>
    <a href="gameover.php"><button>Continue</button></a>
</div>
<script src="lastraft.js" type="text/javascript"></script>

<?php
endHTML();
?>