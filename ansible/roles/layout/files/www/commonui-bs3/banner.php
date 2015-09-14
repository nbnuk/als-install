<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www1.als.scot/atlas/atlas-header/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$atlas_header_bs3 = curl_exec($ch);
curl_close($ch);

echo $atlas_header_bs3;

?>
