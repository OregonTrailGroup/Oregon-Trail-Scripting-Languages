var gameLoop;
var wagonPosition = 3;
var rockPositions = [[0, 0, 0, 0, 0, 0], 
                     [0, 0, 0, 0, 0, 0], 
                     [0, 0, 0, 0, 0, 0], 
                     [0, 0, 0, 0, 0, 0], 
                     [0, 0, 0, 0, 0, 0], 
                     [0, 0, 0, 0, 0, 0]];
var lives = 5;
var numIterations = 0;
var generateRocks = false;

function startGameLoop(loopMe)
{
    gameLoop = window.setInterval(loopMe, 750);
}

function stopGameLoop()
{
    window.clearInterval(gameLoop);
}

function gameLoopIteration()
{
    // Make table full of water again
    $("td").removeClass().addClass("water");
    let rocks;

    // Generate a new row of rocks if necessary
    if (numIterations < 50)
    {
        // Every other iteration generate rocks
        if (generateRocks) 
        {
            rocks = [1, 1, 1, 1, 1, 1];
            let removedRocks = Math.floor(Math.random() * 5 + 1);

            for (let i = 0; i < removedRocks; i++)
            {
                let remove = Math.floor(Math.random() * 6);
                rocks[remove] = 0;
            }
        }
        else 
        {
            rocks = [0, 0, 0, 0, 0, 0];
        }

        generateRocks = !generateRocks;
    }
    else if (numIterations == 50) // Generate "OREGON"
    {
        rocks = [2, 2, 2, 2, 2, 2];
    }
    else // Generate land tiles post-"OREGON"
    {
        rocks = [3, 3, 3, 3, 3, 3];
    }

    numIterations++;

    // Push the new row to the back of the array
    rockPositions.push(rocks);

    for (let row = 0; row < 7; row++)
    {
        for (let col = 0; col < 6; col++)
        {
            let tableCell = $(`td#${row}${col}`);

            switch (rockPositions[row][col])
            {
                case 1:
                tableCell.addClass("rock");
                break;

                case 2:
                tableCell.text("OREGON"[col]);
                tableCell.addClass("land");
                break;

                case 3:
                tableCell.text("");
                tableCell.addClass("land");
            }
        }
    }

    // Shift the oldest row off the front of the array
    let rocksToCheck = rockPositions.shift();
    $("td#0" + wagonPosition).addClass("wagon");

    // Check to see if we hit a rock
    if (rocksToCheck[wagonPosition] == 1)
    {
        if (lives == 0)
        {
            $("#playerDied").show();
            stopGameLoop();
        }
        else
        {
            lives--;
            $("#crashes").text(lives);
        }
    }
    else if (rocksToCheck[wagonPosition] == 2)
    {
        $("#playerWon").show();
        stopGameLoop();
    }
}

function move(direction)
{
    $(".wagon").removeClass("wagon");
    wagonPosition += direction;

    if (wagonPosition < 0)
    {
        wagonPosition = 0;
    }

    if (wagonPosition > 5)
    {
        wagonPosition = 5;
    }

    $(`td#0${wagonPosition}`).addClass("wagon");
}

$(document).ready(function() {
    $("button#start").click(function() {
        $("div.overlay.vertical-layout").hide();
        startGameLoop(gameLoopIteration);
    });

    $("button#moveLeft").click(() => move(-1));
    $("button#moveRight").click(() => move(1));
});
