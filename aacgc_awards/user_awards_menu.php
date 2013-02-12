<?php

if($pref['awards_usestyle'] == "1"){
$theme = "";
$themea = "forumheader3";
$themeb = "indent";
$themec = "fcaption";}

$medrib_title = "".$pref['rmmenu_title']."";

//-----------------------------------------------------------
if ($pref['rib_enable_userribbons'] == "1"){

	$c = 0;
	$sql->db_Select("aacgcawards_awarded_ribbons", "*", "awarded_user_id='".USERID."'");
	while($row = $sql->db_Fetch()){$c++;}
	$ribnames = array();
	$ribid = array();

	$sql->db_Select("aacgcawards_ribbons", "*", "ORDER BY rib_id", "");
	while($row = $sql->db_Fetch()){
	$ribnames[] = $row['rib_name'];
	$ribid[] = $row['rib_id'];
	$ribpic[] = $row['rib_pic'];
	$id = $tmp[2];}
	if ($c==0){

$medrib_text .= "<i>You Have Not Earned Any Ribbons Yet</i><br/><br/>";

}
else
{

$medrib_text .= "
<table style='width:100%' class='".$theme."' cellspacing='' cellpadding=''>
	<tr>
		<td colspan='3' class='".$themec."'><b>Ribbons: ".$c."</b></td>
	</tr>
";

	for($i=0; $i < count($ribnames); $i++){
	$sql->db_Select("aacgcawards_awarded_ribbons", "*", "awarded_rib_id like ".$ribid[$i]." AND awarded_user_id like ".USERID, true);
	$counter1 = 0;
	while($row = $sql->db_Fetch()){
	$counter1++;}
	if ($counter1 > 0) {

$medrib_text .= "
	<tr>
		<td style='width:0%' class='".$themea."'>
			<a href='".e_PLUGIN."aacgc_awards/ribbon.php?det.".$ribid[$i]."'>
			<img width='".$pref['ribcount_userimg']."' src='".e_PLUGIN."aacgc_awards/ribbons/".$ribpic[$i]."' align='middle' alt='' />
			</a>
		</td>
		<td style='width:100%' class='".$themea."'><font size='".$pref['ribcount_fsize']."'>".$ribnames[$i]."</font></td>
		<td style='width:0%' class='".$themea."'>".$counter1."x</td>
	</tr>
";}}

$medrib_text .= "</table><br/><br/>";}}

//------------------------------------------------------------------------------------------------------
if ($pref['med_enable_usermedals'] == "1"){

	$c = 0;
	$sql->db_Select("aacgcawards_awarded_medals", "*", "awarded_user_id='".USERID."'");
	while($row = $sql->db_Fetch()){$c++;}
	$medalnames = array();
	$medalid = array();
	$sql->db_Select("aacgcawards_medals", "*", "ORDER BY medal_id", "");
	while($row = $sql->db_Fetch()){
	$medalnames[] = $row['medal_name'];
	$medalid[] = $row['medal_id'];
	$medalpic[] = $row['medal_pic'];
    $id = $tmp[2];}

if ($c==0){

$medrib_text .= "You Have Not Earned Any Medals Yet<br>";

}
else
{

$medrib_text .= "
<table style='width:100%' class='".$theme."' cellspacing='' cellpadding=''>
	<tr>
		<td colspan='3' class='".$themec."'><b>Medals: ".$c."</b></td>
	</tr>
";
	for($i=0; $i < count($medalnames); $i++){
	$sql->db_Select("aacgcawards_awarded_medals", "*", "awarded_medal_id like ".$medalid[$i]." AND awarded_user_id like ".USERID, true);
	$counter1 = 0;
	while($row = $sql->db_Fetch()){
	$counter1++;}
	if ($counter1 > 0) {

$medrib_text .= "
	<tr>
		<td style='width:0%' class='".$themea."'>
			<a href='".e_PLUGIN."aacgc_awards/medal.php?det.".$medalid[$i]."'>
			<img width='".$pref['medcount_userimg']."' src='".e_PLUGIN."aacgc_awards/medals/".$medalpic[$i]."' align='middle' alt=''>
			</a>
		</td>
		<td style='width:100%' class='".$themea."'><font size='".$pref['medcount_fsize']."'>".$medalnames[$i]."</font></td>
        <td style='width:0%' class='".$themea."'>".$counter1."x</td>
	</tr>
";
}}

$medrib_text .= "</table><br/><br/>";}}

//------------------------------------------------------------------------------------------------------

	$ribcounter = $sql -> db_Count("aacgcawards_awarded_ribbons");
	$riblast = 0;
	$currentunixtime = time();
	$threedaysagounix = $currentunixtime - (60*60*24*3);
	$sql->db_Select("aacgcawards_awarded_ribbons", "*", "", "");
	while($row = $sql->db_Fetch()){
	$dateindb = $row['awarded_date'];
	$dateexp = explode("/",$dateindb);
	$dateunix = mktime(0,0,0,$dateexp[1],$dateexp[0],$dateexp[2]);
	if ($dateunix > $threedaysagounix) 
	{$riblast = $riblast + 1;}}


$medrib_text .= "
<table style='width:100%' class='".$themea."' cellspacing='' cellpadding=''>
	<tr>
		<td style='width:50%; text-align:right' class='".$theme."'>Total Ribbons Given: </td>
		<td style='width:50%' class='".$themeb."'> <b>".$ribcounter."</b></td>
	</tr>
	<tr>
		<td style='width:; text-align:right' class='".$theme."'>Last 3 days: </td>
		<td style='width:' class='".$themeb."'> <b>".$riblast."</b></td>
	</tr>
";


//-----------------------


	$medcounter = $sql -> db_Count("aacgcawards_awarded_medals");
	$medlast = 0;
	$currentunixtime = time();
	$threedaysagounix = $currentunixtime - (60*60*24*3);
	$sql->db_Select("aacgcawards_awarded_medals", "*", "", "");
	while($row = $sql->db_Fetch()){
	$dateindb = $row['awarded_date'];
	$dateexp = explode("/",$dateindb);
	$dateunix = mktime(0,0,0,$dateexp[1],$dateexp[0],$dateexp[2]);
	if ($dateunix > $threedaysagounix) 
	{$medlast = $medlast + 1;}}


$medrib_text .= "
	<tr>
		<td style='width:; text-align:right' class='".$theme."'>Total Medals Given: </td>
		<td style='width:' class='".$themeb."'> <b>".$medcounter."</b></td>
    </tr>
	<tr>
		<td style='width:; text-align:right' class='".$theme."'>Last 3 days: </td>
		<td style='width:' class='".$themeb."'> <b>".$medlast."</b></td>
	</tr>
</table>
";

//------------------------------------------------------------------------------------------------------

$ns -> tablerender($medrib_title, $medrib_text);

?>