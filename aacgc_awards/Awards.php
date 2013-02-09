<?php

require_once("../../class2.php");
require_once(HEADERF);

if ($pref['rm_enable_gold'] == "1")
{$gold_obj = new gold();}

$title .= "".$pref['armpage_title'].""; 

$themea = "forumheader3";
$themeb = "indent";

//------------------------------------# Ribbons #--------------------------------------------------------

$text .= "
<table style='width:100%' class='' cellspacing='' cellpadding=''>
	<tr>
		<td colspan='3' style='text-align:center' class=''><font size='3'><b><u>Ribbons</u></b></font></td>
	</tr>
	<tr>
		<td colspan='3' style='text-align:center' class=''><div style='height:10px'></div></td>
	</tr>
";		
		
        $sql->db_Select("aacgcawards_ribbons", "*", "ORDER BY rib_id","");
        while($row = $sql->db_Fetch()){

$text .= "
	<tr>
		<td style='width:0%' class='".$themea."'>
			<a href='".e_PLUGIN."aacgc_awards/ribbon.php?det.".$row['rib_id']."'>
			<img width='".$pref['rib_img1']."' src='".e_PLUGIN."aacgc_awards/ribbons/".$row['rib_pic']."' alt = '' />
			</a>
		</td>
		<td style='width:; text-align:left' class='".$themea."'>
			<a href='".e_PLUGIN."aacgc_awards/ribbon.php?det.".$row['rib_id']."'><font size='".$pref['rib_fsize']."'>".$row['rib_name']."</font></a>
		</td>
		<td style='width:0%' class='".$themea."' rowspan='2'>
			<a href='".e_PLUGIN."aacgc_awards/ribbon.php?det.".$row['rib_id']."'>
			<img width='".$pref['rib_img2']."' src='".e_PLUGIN."aacgc_awards/ribbons_large/".$row['rib_pic']."' alt='".$row['rib_name']."' />
			</a>
		</td>
	</tr>
	<tr>

		<td colspan='2' style='width:100%' class='".$themeb."'>
			<a href='".e_PLUGIN."aacgc_awards/ribbon.php?det.".$row['rib_id']."'><font size='".$pref['rib_fsize']."'>".$row['rib_txt']."</font>
		</td>
	</tr>
";

if ($pref['rib_enable_userlist'] == "1"){

$text .= "<tr><td colspan='3'>";

		$sql2 = new db;
		$sql2->db_Select("aacgcawards_awarded_ribbons", "*", "awarded_rib_id=".$row['rib_id']." LIMIT 0,".$pref['ribdet_count']."","");
		while($row2 = $sql2->db_Fetch()){
		$sql3 = new db;
		$sql3->db_Select("user", "*", "user_id='".$row2['awarded_user_id']."'","");
		$row3 = $sql3->db_Fetch();

		if ($pref['rm_enable_gold'] == "1"){
		$userorb = "<a href='".e_BASE."user.php?id.".$row3['user_id']."'>".$gold_obj->show_orb($row3['user_id'])."</a>";}
		else
		{$userorb = "<a href='".e_BASE."user.php?id.".$row3['user_id']."'>".$row3['user_name']."</a>";}

$text .= "".$userorb." (".$row2['awarded_date'].") , ";}
$text .= "</td></tr>";}

$text .= "
	<tr>
		<td colspan='3' style='text-align:center' class=''><div style='height:20px'></div></td>
	</tr>
";}
	
$text .= "</table><br/><br/>";    

//-----------------------------------# Medals #-----------------------------------------+


$text .= "
<table style='width:100%' class='' cellspacing='' cellpadding=''>
	<tr>
    	<td style='width:100%; text-align:center' colspan='3' class=''><font size='3'><b><u>Medals</u></b></font></td>
	</tr>
	<tr>
		<td colspan='3' style='text-align:center' class=''><div style='height:10px'></div></td>
	</tr>		
";


        $sql->db_Select("aacgcawards_medals", "*", "ORDER BY medal_id","");
        while($row = $sql->db_Fetch()){
			
$text .= "
	<tr>
		<td style='width:0%' class='".$themea."'>
			<a href='".e_PLUGIN."aacgc_awards/medal.php?det.".$row['medal_id']."'>
			<img width='".$pref['med_img1']."' src='".e_PLUGIN."aacgc_awards/medals/".$row['medal_pic']."' alt = '".$row['medal_name']."' />
			</a>
		</td>
		<td style='width:; text-align:left' class='".$themea."'>
			<a href='".e_PLUGIN."aacgc_awards/medal.php?det.".$row['medal_id']."'><font size='".$pref['med_fsize']."'>".$row['medal_name']."</font></a>
		</td>
		<td style='width:0%' class='".$themea."' rowspan='2'>
			<a href='".e_PLUGIN."aacgc_awards/medal.php?det.".$row['medal_id']."'>
			<img width='".$pref['med_img2']."' src='".e_PLUGIN."aacgc_awards/medals_large/".$row['medal_pic']."' alt='".$row['medal_name']."' />
			</a>
		</td>
	</tr>
	<tr>

		<td colspan='2' style='width:100%' class='".$themeb."'>
			<a href='".e_PLUGIN."aacgc_awards/medal.php?det.".$row['medal_id']."'><font size='".$pref['med_fsize']."'>".$row['medal_txt']."</font></a>
		</td>
	</tr>
";

if ($pref['med_enable_userlist'] == "1"){

$text .= "<tr><td colspan='3'>";

$sql2 = new db;
$sql2->db_Select("aacgcawards_awarded_medals", "*", "awarded_medal_id=".$row['medal_id']." LIMIT 0,".$pref['meddet_count']."","");
while($row2 = $sql2->db_Fetch()){
$sql3 = new db;
$sql3->db_Select("user", "*", "user_id='".$row2['awarded_user_id']."'","");
$row3 = $sql3->db_Fetch();

if ($pref['rm_enable_gold'] == "1"){
$userorb = "<a href='".e_BASE."user.php?id.".$row3['user_id']."'>".$gold_obj->show_orb($row3['user_id'])."";}
else
{$userorb = "<a href='".e_BASE."user.php?id.".$row3['user_id']."'>".$row3['user_name']."</a>";}

$text .= "".$userorb." (".$row2['awarded_date'].") , ";}}

$text .= "</td></tr>";

$text .= "
	<tr>
		<td colspan='3' style='text-align:center' class=''><div style='height:20px'></div></td>
	</tr>
";}


$text .= "</table><br/><br/>";

$text .= "<table style='width:100%' class='' cellspacing='' cellpadding=''>";

//------------------------------------------# Ribbons Counter #---------------------------------------                                            


	    $ribcounter = $sql -> db_Count("aacgcawards_awarded_ribbons");
	    $riblast = 0;
        $currentunixtime = time();
        $threedaysagounix = $currentunixtime - (60*60*24*3);
        $sql->db_Select("aacgcawards_awarded_ribbons", "*", "", "");
        while($row = $sql->db_Fetch()){
	    $dateindb = $row['awarded_date'];
	    $dateexp = explode(".",$dateindb);
	    $dateunix = mktime(0,0,0,$dateexp[1],$dateexp[0],$dateexp[2]);
	    if ($dateunix > $threedaysagounix) {
		$riblast = $riblast + 1;}}

$text .= "
	<tr>
		<td style='width:50%; text-align:right' class='forumheader3'>Total Ribbons Given:</td>
		<td style='width:50%' class='forumheader3'><B>".$ribcounter."</B></td>
	</tr>
	<tr>
		<td style='width:50%; text-align:right' class='forumheader3'>Ribbons Given Last 3 Days:</td>
		<td style='width:50%' class='forumheader3'><B>".$riblast."</B></td>
	</tr>
";

	        
//------------------------------------------# Total Medals Counter #---------------------------------------                                            

	    $medcounter = $sql -> db_Count("aacgcawards_awarded_medals");
	    $medlast = 0;
        $currentunixtime = time();
        $threedaysagounix = $currentunixtime - (60*60*24*3);
        $sql->db_Select("aacgcawards_awarded_medals", "*", "", "");
        while($row = $sql->db_Fetch()){
	    $dateindb = $row['awarded_date'];
	    $dateexp = explode(".",$dateindb);
	    $dateunix = mktime(0,0,0,$dateexp[1],$dateexp[0],$dateexp[2]);
	    if ($dateunix > $threedaysagounix) {
		$medlast = $medlast + 1;}}

$text .= "
	<tr>
		<td style='width:50%; text-align:right' class='forumheader3'>Total Medals Given:</td>
		<td style='width:50%' class='forumheader3'><B>".$medcounter."</B></td>
	</tr>
	<tr>
		<td style='width:50%; text-align:right' class='forumheader3'>Medals Given Last 3 Days:</td>
		<td style='width:50%' class='forumheader3'><B>".$medlast."</B></td>
	</tr>
";

$text .= "</table>";


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