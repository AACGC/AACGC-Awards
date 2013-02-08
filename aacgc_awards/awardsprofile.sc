global $sql,$sql2,$user; 

$suser = "";
$USER_ID = "";


$url = $_SERVER["REQUEST_URI"];
$suser = explode(".", $url);
	if ($suser[1] == 'php?id') {
	$suser = $suser[2];
	}
$SUSER_ID = $suser;

if (USER){


//----------------------------------------------------------------

if ($pref['rib_enable_profiles'] == "1"){

//----------------------------------------------------------------

$a = 0;
$sql->db_Select("advmedsys_awarded2", "*", "awarded_user_id='".$SUSER_ID."'");
while($row = $sql->db_Fetch())
{$a++;}

$ribnames = array();
$ribid = array();

$sql->db_Select("advmedsys_medals2", "*", "ORDER BY rib_id", "");
while($row = $sql->db_Fetch()){
$ribnames[] = $row['rib_name'];
$ribid[] = $row['rib_id'];
$ribpic[] = $row['rib_pic'];
}

if ($a==0){}

else 

{

$ribsu .= "<td class='forumheader3' style='width:50%'><b><u>Total Ribbons</u>: ".$a."</b><br><br><center>";


for($i=0; $i < count($ribnames); $i++){
$sql->db_Select("advmedsys_awarded2", "*", "awarded_rib_id like ".$ribid[$i]." AND awarded_user_id like ".$SUSER_ID, true);
$counter1 = 0;
while($row = $sql->db_Fetch())
{$counter1++;}

if ($counter1 > 0){
$ribsu .= " <a href='".e_PLUGIN."aacgc_awards/ribbon.php?det.".$ribid[$i]."'><img width='".$pref['rib_userimg']."' src='".e_PLUGIN."aacgc_awards/ribbons/".$ribpic[$i]."' alt='".$ribnames[$i]." (".$counter1."x)' /></a> ";}


	}

$ribsu .= "</center></td>";

	}


//-------------------------------------------------------------------------------------

}
else

{$ribsu .= "";}

//-------------------------------------------------------------------------------------

if ($pref['med_enable_profiles'] == "1"){

//-------------------------------------------------------------------------------------

$c = 0;
$sql->db_Select("advmedsys_awarded", "*", "awarded_user_id='".$SUSER_ID."'");
while($row = $sql->db_Fetch())
{$c++;}

$medalnames = array();
$medalid = array();

$sql->db_Select("advmedsys_medals", "*", "ORDER BY medal_id", "");
while($row = $sql->db_Fetch()){
$medalnames[] = $row['medal_name'];
$medalid[] = $row['medal_id'];
$medalpic[] = $row['medal_pic'];
}

if ($c==0){}

else 

{
$medalsu .= "<td class='forumheader3' style='width:50%'><b><u>Total Medals</u>: ".$c."</b><br><br><center>";
	

for($i=0; $i < count($medalnames); $i++)
{
$sql->db_Select("advmedsys_awarded", "*", "awarded_medal_id like ".$medalid[$i]." AND awarded_user_id like ".$SUSER_ID, true);
$counter1 = 0;
while($row = $sql->db_Fetch())
{$counter1++;}
			
if ($counter1 > 0) {
$medalsu .= " <a href='".e_PLUGIN."aacgc_awards/medal.php?det.".$medalid[$i]."'><img width='".$pref['med_userimg']."' src='".e_PLUGIN."aacgc_awards/medals/".$medalpic[$i]."' alt='".$medalnames[$i]." (".$counter1."x)' /></a> ";}

}

$medalsu .= "</center></td>";

}


//-------------------------------------------------------------------------------------

}else
{$medalsu .= "";}

//-------------------------------------------------------------------------------------

}

return "<td class='forumheader3' colspan=2><table style='width:100%'><tr valign=top>".$ribsu.$medalsu."</tr></table>";