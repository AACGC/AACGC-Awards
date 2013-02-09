global $post_info, $sql;
$postowner  = $post_info['user_id'];

//-----------------------------------------------------------------------------------------------

if ($pref['med_enable_forums'] == "1"){

$sql->db_Select("aacgcawards_awarded_medals", "*", "awarded_user_id='".$postowner."' LIMIT 0,".$pref['nummed']."");
while($row = $sql->db_Fetch()){
if ($row['awarded_id'] == ""){
$medalscount = "";}
else
{$medalscount = "<br>Last ".$pref['nummed']." Medals Recieved:";}

$sql2 = new db;
$sql2->db_Select("aacgcawards_medals", "*", "medal_id=".$row['awarded_medal_id']." LIMIT 0,".$pref['nummed']."");
while($row2 = $sql2->db_Fetch()){

$medals .= "<br><img width='".$pref['med_fimg']."' src='".e_PLUGIN."aacgc_awards/medals/".$row2['medal_pic']."'></img>";

if ($pref['rm_enable_forummname'] == "1"){
$medals .= " - <font size='".$pref['med_ffsize']."'>".$row2['medal_name']."</font><br>";}

}}}

//-----------------------------------------------------------------------------------------------

if ($pref['rib_enable_forums'] == "1"){
$sql->db_Select("aacgcawards_awarded_ribbons", "*", "awarded_user_id='".$postowner."' LIMIT 0,".$pref['numrib']."");
while($row = $sql->db_Fetch()){

if ($row['awarded_id'] == "")
{$recentrcount = "";}
else
{$recentrcount = "<br>Last ".$pref['numrib']." Ribbons Recieved:";}

$recentr .= "<marquee height='100px' scrollamount='2' onMouseover='this.scrollAmount=0' onMouseout='this.scrollAmount=2' direction='up' loop='true'>";

$sql2 = new db;
$sql2->db_Select("aacgcawards_ribbons", "*", "rib_id='".$row['awarded_rib_id']."'");
while($row3 = $sql2->db_Fetch()){

$recentr .= "<br><img width='".$pref['rib_fimg']."' src='".e_PLUGIN."aacgc_awards/ribbons/".$row3['rib_pic']."'></img>";

if ($pref['rm_enable_forumrname'] == "1"){
$recentr .= " - <font size='".$pref['rib_ffsize']."'>".$row3['rib_name']."</font><br>";}

}}}

$recentr .= "</marquee>";
}


//-----------------------------------------------------------------------------------------------

return "".$medalsf."<br/>".$medalscount."".$medals."<br/>".$recentrcount."".$recentr."";

