<?php

$key = 'kgy4qz245v5kg9fahg2zyv7v';
$secret = 'Du4xddhWCj';
$sig = md5($key.$secret.time());

$state = 'nj';
$zip = '08872';


$urlstate = '<h4>http://news-api.patch.com/v1.1/states/'.$state.'/stories?dev_key='.$key.'&sig='.$sig.'</h4>';
$urlzip = '<h4>http://news-api.patch.com/v1.1/zipcodes/'.$zip.'/stories?dev_key='.$key.'&sig='.$sig.'</h4>';
echo "<h3>State:</h3>".$urlstate."<br />";
echo "<h3>Zip:</h3>".$urlzip;

?>