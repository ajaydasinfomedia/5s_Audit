Good luck
<html>
<div id="results"></div>
</html>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
var uniqueRandoms = ["t1","t2","t3","f1","f2","f3"];
var numRandoms = 6;
function makeUniqueRandom() {
    // refill the array if needed
    if (!uniqueRandoms.length) {
        for (var i = 0; i < numRandoms; i++) {
            uniqueRandoms.push(i);
        }
    }
    var index = Math.floor(Math.random() * uniqueRandoms.length);
    var val = uniqueRandoms[index];
    
    // now remove that value from the array
    uniqueRandoms.splice(index, 1);
    
    return val;
    
}

for (var i = 0; i < 6; i++) {
    var rand = makeUniqueRandom();
    if (i == 0) {
        $("#results").append("Player 1<br>");
    }
    if (i == 2) {
        $("#results").append("<br>Player 2<br>");
    }
    if (i == 4) {
        $("#results").append("<br>Player 3<br>");
    }
    
    $("#results").append(rand + "  ");
}
</script>
