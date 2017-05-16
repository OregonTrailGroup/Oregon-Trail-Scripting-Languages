<?php
include 'commonUI.php';
startHTML("The Oregon Trail Game")
?>
    <script>init_count(1);</script>
	<br><img src="assets/title.png"><br>
	<br><img src="assets/separator.png"><br><br>
	<div id="div_info">
        <p id="p_info1">
            Try taking a journey be covered wagon across 2000 miles of plains, rivers, and mountains. Try! On the plains, will you slosh your oxen through mud and water-filled ruts or will you plod through dust six inches deep?
        </p>
        <p id="p_info2">
            How will you cross the rivers? If you have money, you might take a ferry (if there is a ferry). Or, you can ford the river and hope you and your wagon aren't swallowed alive!
        </p>
        <p id="p_info3">
            What about supplies? Well, if you're low on food you can hunt. You might get a buffalo... you might. And there are bears in the mountains.
        </p>
        <p id="p_info4">
            At the Dalles, you can try navigating the Columbia River, but if running the rapids with a makeshift raft makes you queasy, better take the Barlow Road. 
        </p>
        <p id="p_info5">
            If for some reason you don't survive -- your wagon burns, or thieves steal your oxen, or you run out of provisions, or you die of cholera -- don't give up! Try again...and again...until your name is up with the others on The Oregon Top Ten. 
        </p>
        <p id="p_info6">
            The software team responsible for creation of this product includes:<br>Gene Burchette<br>Evan Rittenhouse<br>Adam Wendler<br>Andrew Williamson
        </p>
        <button id="btn_info_continue" class="btngrp_main">CLICK to continue</button>
	</div>
    <a href="index.php"><button id="btn_info_return" class="btngrp_main">Return to Main Menu</button></a>
	<br><img src="assets/separator.png"><br>

<?php
endHTML();