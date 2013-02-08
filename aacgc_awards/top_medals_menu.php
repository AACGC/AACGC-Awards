<?php
//-----------------------------------------------------------
$topmed_title .= "".$pref['topmed_name']."";
//-----------------------------------------------------------

if ($pref['rm_enable_gold'] == "1")
{$gold_obj = new gold();}
$n = "0";
$sql->mySQLresult = @mysql_query("select awarded_user_id, count(awarded_medal_id) as medals from ".MPREFIX."advmedsys_awarded group by awarded_user_id order by medals desc limit 0,".$pref['topmed_count'].";");
$rows = $sql->db_Rows();
if ($rows == 0) 
{$topmed_text .= "No Members Have Medals Yet.";}
else
{$topmed_text .= "<table width='100%' class=''><td colspan='2'><b><u>User</u></b></td><td><b><u>Medals</u></b></td>";

	for ($i=0; $i < $rows; $i++) {
	$result = $sql->db_fetch();
        $user = @mysql_query("select user_name from ".MPREFIX."user where user_id='".$result['awarded_user_id']."'");
	$user = mysql_fetch_array($user);

    
if ($pref['rm_enable_gold'] == "1")
{$userorb = "<a href='".e_BASE."user.php?id.".$result['awarded_user_id']."'>".$gold_obj->show_orb($result['awarded_user_id'])."</a>";}
else
{$userorb = "<a href='".e_BASE."user.php?id.".$result['awarded_user_id']."'>".$user['user_name']."</a>";}

$n++;

$topmed_text .= "
<tr>
	<td style='width:0%'>".$n.".</td>
	<td style='width:100%'>".$userorb."</td>
	<td style='width:0%'>".$result['medals']."</td>
</tr>
";}
	

$topmed_text .= "</table>";}


if ($pref['med_enable_stats'] == "1"){
$topmed_text .= "<center><br><a href='".e_PLUGIN."advmedsys/Medal_Stats.php'>View Medal Stats</a><br></center>";}


if ($pref['med_enable_request'] == "1"){
$topmed_text .= "<center><br><a href='".e_PLUGIN."advmedsys/requestmedal.php'>Request Medal</a><br></center>";}


//------------------------------------------------------------------------------------------------------
$ns -> tablerender($topmed_title, $topmed_text);

?>