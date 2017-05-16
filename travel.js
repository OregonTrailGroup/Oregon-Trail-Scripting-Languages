var gameLoop;
var buttonsVisible = false;
var slowdown = 1.0;
var isGameloopDisallowed = false;
var livingMembers = 5;
var newDistance = oldDistance;

function startGameLoop(func)
{
    gameLoop = window.setInterval(func, 4000);
    $("img#wagon").addClass("animatedWagon");
}

function stopGameLoop()
{
    window.clearInterval(gameLoop);
    $("img#wagon").removeClass("animatedWagon");
}

function gameLoopIteration()
{
    // Clear the messages
    $("p#messageArea").text("");

    // Eat
    $.get("travel-sync.php", {eat: true}, function(response) {
        $("span#foodSpan").text(response.remainingFood);
        console.log("Remaining food: " + response.remainingFood);
    }, "json");

    // Do health check
    $.get("travel-sync.php", {getHealth: true}, function(response) {
        $("span#partyHealth").text(response.overallHealth);
        $("span#livingMembers").text(response.livingMembers);
        livingMembers = response.livingMembers;

        if (response.nowDead.length > 0 )
        {
            let dead = "";

            for (let index = 0; index < response.nowDead.length; index++)
            {
                dead += response.nowDead[index] + " ";
            }

            $("p#messageArea").append("The following people have died: " + dead + ". ");
        }
    }, "json");

    // Advance time

    $.get("travel-sync.php", {progress: slowdown, nextDay: true}, function(response) {
        if (response.newDistance == nextLandmark)
        {
            $("div#nextLandmark").show();
            stopGameLoop();
            isGameloopDisallowed = true;
        }

        oldDistance = newDistance;
        newDistance = response.newDistance;
        $("span#totalDistance").text(response.newDistance);
        $("span#date").text(response.newDay);
    }, "json");

    // Random events & handling

    $.get("randomEvents.php", {startLocation: oldDistance, endLocation: newDistance}, function(response) {
        if (response.grave_marker)
        {
            stopGameLoop();
            $("div.overlay").show();
            $("span#graveName").text(response.grave_marker.name);
            $("p#graveMessage").text(response.grave_marker.message);
            $("span#graveDate").text(response.grave_marker.date);
        }

        if (response.weather_change)
        {
            $("span#weather").text(response.weather_change.weather);
            slowdown = response.weather_change.slow_factor;
        }

        if (response.thief_steal)
        {
            itemQuantities[response.thief_steal.id][0] += response.thief_steal.qty;
            $(`span#${itemQuantities[response.thief_steal.id][1]}`).text(itemQuantities[response.thief_steal.id][0]);

            let itemNames = [" pounds of food", " dollars", " pounds of bait", " clothes", 
                " wagon wheels", " wagon axles", " wagon tongues", " yokes of oxen"];
            $("p#messageArea").append(`Thieves have stolen ${response.thief_steal.qty}${itemNames[response.thief_steal.id]}. `);
        }

        if (response.find_wagon)
        {
            itemQuantities[response.find_wagon.id][0] += response.find_wagon.qty;
            $(`span#${itemQuantities[response.find_wagon.id][1]}`).text(itemQuantities[response.find_wagon.id][0]);

            let itemNames = [" pounds of food", " dollars", " pounds of bait", " clothes", 
                " wagon wheels", " wagon axles", " wagon tongues", " yokes of oxen"];
            $("p#messageArea").append(`You found a wagon with ${response.find_wagon.qty}${itemNames[response.find_wagon.id]}. `);
        }

        if (response.wagon_broke)
        {
            let parts = ["wheel", "axle", "tongue"];
            let part = 4 + response.wagon_broke.wagon_part;

            if (itemQuantities[part] <= 0)
            {
                $("div#nextLandmark").hide();
                $("div#partyDied").show();
                stopGameLoop();
                isGameloopDisallowed = true;
            }

            $("p#messageArea").append(`Your wagon's ${parts[response.wagon_broke.wagon_part]} broke. `);
        }

        if (response.got_sick)
        {
            $("p#messageArea").append(`${response.got_sick.party_member} has come down with ${response.got_sick.sick_name}. `);
        }
    }, "json");

    // Check for no remaining living members

    if (livingMembers <= 0)
    {
        isGameloopDisallowed = true;
        stopGameLoop();
        $("div#nextLandmark").hide();
        $("div#partyDied").show();
    }
}

// Called when the user passes time via CommonActions
function timePassed(response)
{
    $("span#date").text(response.date);
    $("span#partyHealth").text(response.partyHealth);
    livingMembers = response.livingMembers;
    $("span#livingMembers").text(livingMembers);

    if (livingMembers <= 0)
    {
        isGameloopDisallowed = true;
        stopGameLoop();
        $("div#nextLandmark").hide();
        $("div#partyDied").show();
    }
}

$(document).ready(function() {
    startGameLoop(gameLoopIteration);

    $("button#showActions").click(function() {
        if (!isGameloopDisallowed)
        {
            $(".button_hide").toggle();
            buttonsVisible = !buttonsVisible;

            if (buttonsVisible) {
                stopGameLoop();
                $("button#showActions").text("Return to the trail");
            }
            else {
                startGameLoop(gameLoopIteration);
                $("button#showActions").text("Examine Your Surroundings");
            }
        }
    });

    $("button#dismissGrave").click(function() {
        if (!isGameloopDisallowed)
        {
            startGameLoop(gameLoopIteration);
        }
        $("div.overlay").hide();
    })
});