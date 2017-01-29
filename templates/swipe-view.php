<?php
/**
 * Script to get a new animal every time the "Swipe" page loads
 */
require("../includes/config.php");
$secret ="3b01189e7d22ef5343b93af919a2a592";
$public= "e540e02b94af2ffb8a82381b03e11654";
$animal= "dog"; // can be set via choice
$output= "full"; //sets information gathered to all
$location= "10118"; //empire state building location as default
// creates the signature for accessing the api
$code = md5($secret . "key=" . $public . "&location=10118&animal=" . $animal . "&output=" . $output . "&format=json" );
// final processed line used to access the api
$url = "http://api.petfinder.com/pet.getRandom?key=" . $public . "&location=10118&animal=" . $animal . "&output=full&format=json&sig=" . $code;
echo $url;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);

print_r($data);

$decoded = json_decode($data);

$name = $decoded;
print_r($name);
print_r("XD");

?>

<!--HTML for the structure of the page-->
<div class="body-wrapper">
    <div class="col-sm-3" id="reject-div">
        <button type="submit" class="btn btn-danger" id="reject">Bad</button>
    </div>

    <div class="col-sm-6" id="swipe-pic">
        <img src="http://i.imgur.com/NoDketJ.jpg">
        <h1>Name</h1>
        <h2>Sex</h2>
        <h2>Age</h2>
    </div>

    <div class="col-sm-3" id="accept-div">
        <button type="submit" class="btn btn-submit" id="accept">Good</button>
    </div>
</div>

<!--Arrow keys left/right-->
<script>
    document.onkeydown = function(e) {
        if (e.keyCode == '37') {
            // left
            $.post("submitSwipe.php",
                {
                    accept : "false"
                },
                function(data, status){
                    alert("Data: " + data + "\nStatus: " + status);
                });
        } else if (e.keyCode == '39') {
            // right
            $.post("submitSwipe.php",
                {
                    accept : "true"
                },
                function(data, status){
                    alert("Data: " + data + "\nStatus: " + status);
                });
        }
    };
</script>

<!--Buttons clicked left/right-->
<script>
    $("#reject").click(function(){
        $.post("submitSwipe.php",
            {
                accept : "false",
                AnimalCode : "animalcode" // This should be updated to use the proper variable from the API
            },
            function(data, status){
                alert("Data: " + data + "\nStatus: " + status);
            });
    });
    $("#accept").click(function(){
        $.post("submitSwipe.php",
            {
                accept : "false",
                AnimalCode : "animalcode" // This should be updated to use the proper variable from the API
            },
            function(data, status){
                alert("Data: " + data + "\nStatus: " + status);
            });
    });
</script>





