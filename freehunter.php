<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
//-----------------This API was made by w01000001ssim 26/12/2020--------------
/*Uses simple_html_dom library to:
give you access to json file that contains publicly shared google drive folder and its content with some info*/
/*header('Content-type: application/json');

header('Content-type:application/json;charset=utf-8');*/

//most viewed product type
//increase number of views
//----->//in utube go to your video after other famus videos then like it
//the selected product with lowest price notification
//map fiha marker 3la kol blasa fiha selected product ta3ek


include_once('simple_html_dom.php');


//$url='https://www.freelancer.com/api/contests/0.1/contests/active/?contest_upgrades[]=guaranteed&job_details=1&entry_counts=1&compact=1&offset=';


$url='https://www.freelancer.com/api/contests/0.1/contests/?statuses[]=active&compact=true&contest_upgrades[]=guaranteed&statuses[]=active&job_details=1&entry_counts=true&offset=';
    

//$iurl='https://www.freelancer.com/api/contests/0.1/contests/active/?contest_upgrades[]=guaranteed&job_details=1&entry_counts=1&compact=1&offset=0&limit=0';

    $all_contests = array(); 


/*$iurl='https://www.freelancer.com/api/contests/0.1/contests/?statuses[]=active&job_details=1&entry_counts=true&offset=0';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $iurl);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$ires=json_decode(curl_exec($curl));
curl_close($curl);*/


//for ($i=0; $i <ceil(($ires->result->total_count)/100) +1; $i++) { 

for ($i=0; $i <14; $i++) { 
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url . ($i*100));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$res=json_decode(curl_exec($curl));

$page_contests = $res->result->contests;
curl_close($curl);
//loop through pages
foreach ($page_contests as $value) {
 $all_contests[] = $value;
}
if(count($page_contests)<100){
break;
}
}
  echo json_encode($all_contests);

$fp = fopen('data.json', 'w');
               fwrite($fp, json_encode($all_contests));
               fclose($fp);



?>










