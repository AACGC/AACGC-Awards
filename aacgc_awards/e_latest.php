<?php

$ribreq = $sql -> db_Count("aacgcawards_medals_request");
$text .= "
<div style='padding-bottom: 2px;'>
<img src='".e_PLUGIN."aacgc_awards/images/icon_16.png' style='width: 16px; height: 16px; vertical-align: bottom' alt=''>Ribbon Requests: ".$ribreq."
</div>";

$medreq = $sql -> db_Count("aacgcawards_ribbons_request");
$text .= "
<div style='padding-bottom: 2px;'>
<img src='".e_PLUGIN."aacgc_awards/images/icon_16.png' style='width: 16px; height: 16px; vertical-align: bottom' alt=''>Medal Requests: ".$medreq."
</div>";

//-----------------------------------------------


?>