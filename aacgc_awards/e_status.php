<?php

$ribgiv = $sql -> db_Count("aacgcawards_awarded_ribbons");
$text .= "
<div style='padding-bottom: 2px;'>
<img src='".e_PLUGIN."aacgc_awards/images/icon_16.png' style='width: 16px; height: 16px; vertical-align: bottom' alt=''>Ribbons: ".$ribgiv."
</div>";


$medgiv = $sql -> db_Count("aacgcawards_awarded_medals");
$text .= "
<div style='padding-bottom: 2px;'>
<img src='".e_PLUGIN."aacgc_awards/images/icon_16.png' style='width: 16px; height: 16px; vertical-align: bottom' alt=''>Medals: ".$medgiv."
</div>";



?>