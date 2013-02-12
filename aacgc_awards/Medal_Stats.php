<?php

require_once("../../class2.php");
require_once(HEADERF);
if (e_QUERY) {
        $tmp = explode('.', e_QUERY);
        $action = $tmp[0];
        $sub_action = $tmp[1];
        $id = $tmp[2];
        unset($tmp);
}
if ($pref['rm_enable_gold'] == "1")
{$gold_obj = new gold();}

if($pref['awards_usestyle'] == "1"){
$theme = "";
$themea = "forumheader3";
$themeb = "indent";
$themec = "fcaption";}
$title .= "".$pref['mspage_title'].""; 

//------------------------------------# Ribbons Section #--------------------------------------------------------

$text .= "
<a href='".e_PLUGIN."aacgc_awards/Awards.php'><img src='".e_PLUGIN."aacgc_awards/images/back.png' alt='Go Back' /></a>
";      
	  
        $sql->db_Select("aacgcawards_medals", "*", "ORDER BY medal_id","");
        while($row = $sql->db_Fetch()){

$text .= "<table style='width:100%' class='".$themea."' cellspacing='' cellpadding=''>";
$text .= "
	<tr>
		<td colspan='2' class='".$theme."' style='text-align:center'>
			<a href='".e_PLUGIN."aacgc_awards/medal.php?det.".$row['medal_id']."'>
			<img src='".e_PLUGIN."aacgc_awards/medals/".$row['medal_pic']."' alt = '' /><br/>
			<font size='".$pref['med_sfsize']."'>".$row['medal_name']."</font>
		</td>
	</tr>
";


$sql2 = new db;
$sql2->db_Select("aacgcawards_awarded_medals", "*", "awarded_medal_id='".$row['medal_id']."'");
while($row2 = $sql2->db_Fetch()){
$sql3 = new db;
$sql3->db_Select("user", "*", "user_id='".$row2['awarded_user_id']."'");
$row3 = $sql3->db_Fetch();
$sql4 = new db;
$sql4->mySQLresult = @mysql_query("select awarded_user_id, count(awarded_user_id) as medals from ".MPREFIX."aacgcawards_awarded_medals where awarded_medal_id=".$row['medal_id']."
and awarded_user_id=".$row3['user_id'].";");
$rows = $sql4->db_Rows();
for ($i=0; $i < $rows; $i++) {
$result = $sql4->db_fetch();
$c = "".$result['medals']."";}

if ($row3['user_name'] == ""){
$text .= "";}
else{

if ($pref['rm_enable_gold'] == "1"){
$userorb = "".$gold_obj->show_orb($row3['user_id'])."";}
else
{$userorb = $row3['user_name'];}

$text .= "
<tr>
	<td style='width:50%; text-align:center' class='".$themeb."'>".$userorb."</td>
	<td style='width:50%; text-align:center' class='".$themeb."'>".$row2['awarded_date']."</td>
</tr>
";}}


$text .= "</table><br/>";}


//----#AACGC Plugin Copyright&reg; - DO NOT REMOVE BELOW THIS LINE! - #-------+
require(e_PLUGIN . 'aacgc_awards/plugin.php');
$text .= "<br><br><br><br><br><br><br>
<a href='http://www.aacgc.com' target='_blank'>
<font color='808080' size='1'>".$eplug_name." V".$eplug_version."  &reg;</font>
</a>";
//------------------------------------------------------------------------+

$ns -> tablerender($title, $text); 
                                    
require_once(FOOTERF);
?>