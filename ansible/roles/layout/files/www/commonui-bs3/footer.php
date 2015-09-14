<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://www1.als.scot/atlas/atlas-footer/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$atlas_footer_bs3 = curl_exec($ch);
curl_close($ch);

echo $atlas_footer_bs3;

?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-65706150-1', 'auto');
  ga('send', 'pageview');
</script>