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
$title .= "".$pref['rspage_title'].""; 

//------------------------------------# Ribbons Section #--------------------------------------------------------

$text .= "
<a href='".e_PLUGIN."aacgc_awards/Awards.php'><img src='".e_PLUGIN."aacgc_awards/images/back.png' alt='Go Back' /></a>
";


 
        $sql->db_Select("aacgcawards_ribbons", "*", "ORDER BY rib_id","");
        while($row = $sql->db_Fetch()){

$text .= "<table style='width:100%' class='".$themea."' cellspacing='' cellpadding=''><tr>";

$text .= "<td colspan='2' class=''><center><br>
<a href='ribbondet.php?det.".$row['rib_id']."'><img width='80px' src='".e_PLUGIN."aacgc_awards/ribbons/".$row['rib_pic']."' alt = 'AACGC Ribbon'></img>
<br>
<font size='".$pref['rib_sfsize']."'>".$row['rib_name']."</font></center></td></tr>";


		$sql2 = new db;
		$sql2->db_Select("aacgcawards_awarded_ribbons", "*", "awarded_rib_id='".$row['rib_id']."' order by awarded_date asc");
		while($row2 = $sql2->db_Fetch()){
		$sql3 = new db;
		$sql3->db_Select("user", "*", "user_id='".$row2['awarded_user_id']."'");
		$row3 = $sql3->db_Fetch();

		$dformat = $pref['awards_dateformat'];
		$offset = $pref['awards_dateoffset'];
		$time = $row2['awarded_date'] + ($offset * 60 * 60);
		$awarddate = date($dformat, $time);
		
		if ($pref['rm_enable_gold'] == "1"){
		$userorb = "".$gold_obj->show_orb($row3['user_id'])."";}
		else
		{$userorb = $row3['user_name'];}


$text .= "
	<tr>
		<td style='width:50%; text-align:center' class='".$themeb."'><a href='".e_BASE."user.php?id.".$row3['user_id']."'>".$userorb."</a></td>
		<td style='width:50%; text-align:center' class='".$themeb."'>".$awarddate."</td>
	</tr>
";}

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