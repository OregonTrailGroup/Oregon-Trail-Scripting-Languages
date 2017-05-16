<?php
include 'classes.php';
session_start();
include 'commonUI.php';
startHTML("View Hiscores");
include 'scoresAndDeaths.php';
$db = new OregonTrailDatabase("eritte2", "eritte2");
$scores = [];
if ($db->connect()) {
    $scores = $db->getScores();
}
?>
    <div id="div_hiscores" class="vertical-layout">
        <br><img src="assets/Separator2.png"><br>
        The Oregon Top Ten
        <br><img src="assets/Separator2.png"><br>
        <br>

        <!-- prints the scores as a table -->
        <table>
            <tr>
                <th> Name </th>
                <th> Points </th>
            </tr>

            <?php 
            foreach ($scores as $score) {
            ?>
                <tr>
                    <td>
            <?php
                        echo $score['name'];
            ?>
                    </td>
                    <td>
            <?php
                        echo $score['score'];
            ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>

        <br><br>
        <button id="btn_points" class="btngrp_main">Would you like to see how points are earned?</button>
    </div>

    <div id="div_hidden" class="vertical-layout">
        <br><img src="assets/Separator2.png"><br>
        On Arriving in Oregon
        <br><img src="assets/Separator2.png"><br>
        <p id="p_info1">
            Your most important resource is the people you have with you. You receive points for each member of your party who arrives safely; you receive more points if they arrive in good health!<br><br>
            <table class="vertical-layout">
                <tr> <th><div id="div_txtblock" class="horizontal-layout">Health of Party</div></th> <th><div id="div_txtblock" class="horizontal-layout">Points per Person</div></th></tr>
                <tr> <td>Good</td> <td>500</td> </tr>
                <tr> <td>Fair</td> <td>400</td> </tr>
                <tr> <td>Poor</td> <td>300</td> </tr>
                <tr> <td>Very Poor</td> <td>200</td> </tr>
            </table>
        </p>
        <p id="p_info2">
            The resources you arrive with will help you get started in the new land. You receive points for each item you bring safely to Oregon.<br>

            <table class="vertical-layout" id="tbl_points_hidden">
                <tr id="imgs"> <th><div id="div_txtblock" class="horizontal-layout">Resources of Party</div></th> 
                    <th><div id="div_txtblock" class="horizontal-layout">Points per Item</div></th> </tr>
                <tr> <td>Wagon</td> <td>50</td> </tr>
                <tr> <td>Ox</td> <td>4</td> </tr>
                <tr> <td>Spare wagon part</td> <td>2</td> </tr>
                <tr> <td>Set of Clothing</td> <td>2</td> </tr>
                <tr> <td>Bait (each 50)</td> <td>1</td> </tr>
                <tr> <td>Food (each 25lbs)</td> <td>1</td> </tr>
                <tr> <td>Cash (each $5)</td> <td>1</td> </tr>
            </table>

        </p>
        <p id="p_info3">
            You receive points for your occupation in the new land. Because more farmers and carpenters were needed than bankers, you receive double points upon arriving in Oregon as a carpenter, and triple points for arriving as a farmer.
        </p>
        <button id="btn_hiscores_continue" class="btngrp_main">CLICK to continue</button>
    </div>
    <a href="index.php"><button id="btn_info_return" class="btngrp_main">Return to Main Menu</button></a>


<?php
endHTML();
