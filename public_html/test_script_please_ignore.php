<?php

/*
 * POST to the Nutitionix endpoint to get our info
 */
$query = $_GET['query'];
$secret ="3b01189e7d22ef5343b93af919a2a592";
$public= "e540e02b94af2ffb8a82381b03e11654";
$animal= "dog"; // can be set via choice
$output= "full"; //sets information gathered to all
$location= "10118"; //empire state building location as default
$code = md5($public . "key=" . $secret . "&location=" . $location . "&animal=" . $animal . "&output=" . $output );
$url = "http://api.petfinder.com/pet.getRandom?key=e540e02b94af2ffb8a82381b03e11654&location=10118&output=full&sig=2418e58c29c03e3fbf69b48105de2478";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'x-app-id:2979e4bf',
    'x-app-key:4490437c2ebd3cb737a7bb8996c40ade',
    'x-remote-user-id:0'
));
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "query=$query");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);

/*
 * Extract data we need from JSON
 */
$decoded= json_decode($data, true);
print_r($decoded['foods'][0]['photo']['thumb']);

for($i = 0; $i < count($decoded['foods']); $i++){
    $name = $decoded['foods'][$i]['food_name'];
    $brandName = $decoded['foods'][$i]['brand_name'];
    $servingQuantity = $decoded['foods'][$i]['serving_qty'];
    $servingUnit = $decoded['foods'][$i]['serving_unit'];
    $calories = $decoded['foods'][$i]['nf_calories'];
    $totalFats = $decoded['foods'][$i]['nf_total_fat'];
    $satFats = $decoded['foods'][$i]['nf_saturated_fat'];
    $cholesterol = $decoded['foods'][$i]['cholesterol'];
    $sodium = $decoded['foods'][$i]['nf_sodium'];
    $carbs = $decoded['foods'][$i]['nf_total_carbohydrate'];
    $sugar = $decoded['foods'][$i]['nf_sugars'];
    $protein = $decoded['foods'][$i]['nf_protein'];
    $thumb = $decoded['foods'][0]['photo']['thumb'];
    $highres = $decoded['foods'][0]['photo']['highres'];


    $postData = array(
        'name' => $name,
        'brandName' => $brandName,
        'servingQuantity' => $servingQuantity,
        'servingUnit' => $servingUnit,
        'calories' => $calories,
        'totalFats' => $totalFats,
        'satFats' => $satFats,
        'cholesterol' => $cholesterol,
        'sodium' => $sodium,
        'carbs' => $carbs,
        'sugar' => $sugar,
        'protein' => $protein,
        'thumb' => $thumb,
        'highres' => $highres
    );

    print_r($postData);

    $poster = json_encode($postData);

    /*
    * POST to API endpoint to create new food entry
    */
    $url2 = "http://www.trackyoself.org/api/food/";
    $ch2 = curl_init($url2);
    curl_setopt($ch2, CURLOPT_URL, $url2);
    curl_setopt($ch2,CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch2, CURLOPT_USERPWD, "cardy31" . ":" . "JA83nq&E");
    curl_setopt($ch2, CURLOPT_POST, 1);
    curl_setopt($ch2, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
    $data2 = curl_exec($ch2);
    curl_close($ch2);

    print_r(json_decode($data2, true));
}

/*
 * Sample XML
 * http://stackoverflow.com/questions/6578832/how-to-convert-xml-into-array-in-php
 */
//$xmlString = "<aaaa Version="1.0">
//   <bbb>
//     <cccc>
//       <dddd Id="id:pass" />
//       <eeee name="hearaman" age="24" />
//     </cccc>
//   </bbb>
//</aaaa>";

$xml = new SimpleXMLElement($xmlString);
echo $xml->bbb->cccc->dddd['Id'];
echo $xml->bbb->cccc->eeee['name'];
// or...........
foreach ($xml->bbb->cccc as $element) {
    foreach($element as $key => $val) {
        echo "{$key}: {$val}";
    }
}
