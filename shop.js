// Persists the bought item to the PHP server
function buyItem(id, qty, cost)
{
    $.get("buy.php", {itemID: id, itemQty: qty, itemPrice: cost}, (response) => console.log(response), "json");
}

// Updates displayed quantities
function updateQuantities()
{
    // Normalize money to fix floating point error
    money = Math.round(money * 100) / 100;
    $("#money").text(money.toFixed(2));
    $("#oxenCount").text(oxen[0]);
    $("#foodCount").text(food[0]);
    $("#clothesCount").text(clothes[0]);
    $("#wheelsCount").text(wheels[0]);
    $("#axlesCount").text(axles[0]);
    $("#tonguesCount").text(tongues[0]);
    $("#baitCount").text(bait[0]);
}

// Click event listeners for every button
$(document).ready(function () {
    $("button#ox").click(function() {
        if (oxen[1] <= money)
        {
            oxen[0] += 2;
            money -= oxen[1];
            updateQuantities();
            buyItem(7, 2, oxen[1]);
        }
        else
        {
            alert("Not enough money!");
        }
    });

    $("button#food").click(function() {
        if (food[1] <= money)
        {
            food[0] += 10;
            money -= food[1] * 10;
            updateQuantities();
            buyItem(0, 10, food[1]);
        }
        else
        {
            alert("Not enough money!");
        }
    });

    $("button#clothes").click(function() {
        if (clothes[1] <= money)
        {
            clothes[0]++;
            money -= clothes[1];
            updateQuantities();
            buyItem(3, 1, clothes[1]);
        }
        else
        {
            alert("Not enough money!");
        }
    });

    $("button#bait").click(function(){
        if (bait[1] <= money)
        {
            bait[0]++;
            money -= bait[1];
            updateQuantities();
            buyItem(2, 1, bait[1]);
        }
        else
        {
            alert("Not enough money!");
        }
    });

    $("button#tongue").click(function() {
        if (tongues[1] <= money)
        {
            tongues[0]++;
            money -= tongues[1];
            updateQuantities();
            buyItem(6, 1, tongues[1]);
        }
        else
        {
            alert("Not enough money!");
        }
    });

    $("button#wheel").click(function() {
        if (wheels[1] <= money)
        {
            wheels[0]++;
            money -= wheels[1];
            updateQuantities();
            buyItem(4, 1, wheels[1]);
        }
        else
        {
            alert("Not enough money!");
        }
    });

    $("button#axle").click(function() {
        if (axles[1] <= money)
        {
            axles[0]++;
            money -= axles[1];
            updateQuantities();
            buyItem(5, 1, axles[1]);
        }
        else
        {
            alert("Not enough money!");
        }
    });
});