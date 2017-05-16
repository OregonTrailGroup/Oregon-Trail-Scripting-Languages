<?php
include 'classes.php';
session_start();
include 'commonUI.php';
startHTML("View Hiscores");
?>
    <div id="div_hiscores">
        <br><img src="assets/Separator2.png"><br>
        The Oregon Top Ten
        <br><img src="assets/Separator2.png"><br>
        <br>

        <p class="p_inline">
            Name<br>
        </p>

        <p class="p_inline">
            Points<br>
        </p>

        <p class="p_inline">
            Rating<br>
        </p>
        <br><br>
        <button id="btn_points" class="btngrp_main">Would you like to see how points are earned?</button>
    </div>

    <div id="div_hidden">
        <br><img src="assets/Separator2.png"><br>
        On Arriving in Oregon
        <br><img src="assets/Separator2.png"><br>
        <p id="p_info1" style="display:inline">
            Your most important resource is the people you have with you. You receive points for each member of your party who arrives safely; you receive more points if they arrive in good health!<br><br>
            <p class="p_inline">
                <div id="div_txtblock">Health of Party</div>
                Good
                Fair
                Poor
                Very Poor
            </p>
            <p class="p_inline">
                <div id="div_txtblock">Points per Person</div><br>
                500<br>
                400<br>
                300<br>
                200<br>
            </p>
        </p>
        <p id="p_info2">
            The resources you arrive with will help you get started in the new land. You receive points for each item you bring safely to Oregon.<br>

            <p class="p_inline">
                <div style="background-color:white;color:black;height:128px;width:128px;">Health of Party</div><br>
                Wagon<br>
                Ox<br>
                Spare wagon part<br>
                Set of Clothing<br>
                <!-- FIXME: BELOW NEEDS TWEAKED SINCE WE'RE NOT DOING HUNTING -->
                Bait (each 50)<br>
                Food (each 25lbs)<br>
                Cash (each 5$)<br>
            </p>
            <p class="p_inline">
                <div style="background-color:white;color:black;height:256px;width:256px;">Points per Person</div><br>
                50<br>
                4<br>
                2<br>
                2<br>
                1<br>
                1<br>
                1<br>
            </p>
        </p>
        <p id="p_info3">
            You receive points for your occupation in the new land. Because more farmers and carpenters were needed than bankers, you receive double points upon arriving in Oregon as a carpenter, and triple points for arriving as a farmer.
        </p>
        <button id="btn_hiscores_continue" class="btngrp_main">CLICK to continue</button>
    </div>
    <a href="index.php"><button id="btn_info_return" class="btngrp_main">Return to Main Menu</button></a>


<?php
endHTML();
