<?php

//-----------------------------------------------------------
$toprib_title .= "".$pref['toprib_name']."";
//-----------------------------------------------------------

if ($pref['rm_enable_gold'] == "1")
{$gold_obj = new gold();}
$n = "0";
$sql->mySQLresult = @mysql_query("select awarded_user_id, count(awarded_rib_id) as ribbons from ".MPREFIX."advmedsys_awarded2 group by awarded_user_id order by ribbons desc limit 0,".$pref['toprib_count'].";");
$rows = $sql->db_Rows();
if ($rows == 0) 
{$toprib_text .= "No Members Have Ribbons Yet.";}
else
{$toprib_text .= "<table width='100%' class=''><td colspan='2'><b><u>User</u></b></td><td><center><b><u>Ribbons</u></b></td>";

	for ($i=0; $i < $rows; $i++) {
	$result = $sql->db_fetch();
        $user = @mysql_query("select user_name from ".MPREFIX."user where user_id='".$result['awarded_user_id']."'");
	$user = mysql_fetch_array($user);
        


$userorb = $user['user_name'];
 

if ($pref['rm_enable_gold'] == "1"){
$userorb = "<a href='".e_BASE."user.php?id.".$result['awarded_user_id']."'>".$gold_obj->show_orb($result['awarded_user_id'])."</a>";}
else
{$userorb = "<a href='".e_BASE."user.php?id.".$result['awarded_user_id']."'>".$user['user_name']."</a>";}

 $n++;

$toprib_text .= "
<tr>
	<td style='width:0%'>".$n.".</td>
	<td style='width:100%'>".$userorb."</td>
	<td style='width:0%'><center>".$result['ribbons']."</td>
</tr>";
}

	
 $toprib_text .= "</table>";}


if ($pref['rib_enable_stats'] == "1"){
$toprib_text .= "<center><br><a href='".e_PLUGIN."advmedsys/Ribbon_Stats.php'>View Ribbon Stats</a><br></center>";}

if ($pref['rib_enable_request'] == "1"){
$toprib_text .= "<center><br><a href='".e_PLUGIN."advmedsys/requestribbon.php'>Request Ribbon</a><br></center>";}


//------------------------------------------------------------------------------------------------------

$ns -> tablerender($toprib_title, $toprib_text);
?>