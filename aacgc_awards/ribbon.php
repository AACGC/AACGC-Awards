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

$theme = "";
$themea = "forumheader3";
$themeb = "indent";

//-----------------------------------------------------------
$text .= "
<a href='".e_PLUGIN."aacgc_awards/Awards.php'><img src='".e_PLUGIN."aacgc_awards/images/back.png' alt='Go Back' align='left' /></a>
<a href='".e_PLUGIN."aacgc_awards/requestribbon.php?det.".intval($sub_action)."'><img src='".e_PLUGIN."aacgc_awards/images/request.png' alt='Request' align='right' /></a>
";

		$sql->db_Select("aacgcawards_ribbons", "*", "rib_id='".intval($sub_action)."'");
        $row = $sql->db_Fetch();

$text .= "
<table style='width:100%' class='".$themea."' cellspacing='' cellpadding=''>
	<tr>
		<td style='text-align:center' class='".$themeb."'><font size='3'><b>".$row['rib_name']."</b></font></td>
	</tr>
   <tr>
		<td style='text-align:center' class='".$theme."'><img src='".e_PLUGIN."aacgc_awards/ribbons_large/".$row['rib_pic']."' alt='".$row['rib_name']."' align='center' /></td>
	</tr>
    <tr>
        <td style='width:100%' class='".$themeb."'>".$row['rib_txt']."</td>
    </tr>
</table>
";



$text .= "<br></br>
<table style='width:100%' class='".$themea."' cellspacing='' cellpadding=''>
	<tr>
		<td style='text-align:center' class='".$theme."'><b><u>Awarded Members</u>:</b><br/><br/></td>
	</tr>
";


		$sql2 = new db;
        $sql2->db_Select("aacgcawards_awarded_ribbons", "*", "awarded_rib_id='".$row['rib_id']."' ORDER BY awarded_date DESC");
        while($row2 = $sql2->db_Fetch()){
		$sql3 = new db;
        $sql3->db_Select("user", "*", "user_id='".$row2['awarded_user_id']."'");
        $row3 = $sql3->db_Fetch();

		if ($pref['rm_enable_gold'] == "1"){
		$userorb = "<a href='".e_BASE."user.php?id.".$row2['awarded_user_id']."'>".$gold_obj->show_orb($row2['awarded_user_id'])."</a>";}
		else
		{$userorb = "<a href='".e_BASE."user.php?id.".$row2['awarded_user_id']."'>".$row3['user_name']."</a>";}
	 
$text .= "
	<tr>
    	<td style='text-align:center' class='".$themeb."'>
			<a href='".e_BASE."user.php?id.".$row2['awarded_user_id']."'>".$userorb."</a> - ".$row2['awarded_date']."
		</td>
	</tr>
";}



$text .= "
	<tr>
		<td style='text-align:center' class='".$theme."'><br/><img width='50px' src='".e_PLUGIN."aacgc_awards/ribbons/".$row['rib_pic']."' alt='".$row['rib_name']."' align='center'/></td>
	</tr>
</table>
";

//----#AACGC Plugin Copyright&reg; - DO NOT REMOVE BELOW THIS LINE! - #-------+
require(e_PLUGIN . 'aacgc_awards/plugin.php');
$text .= "<br><br><br><br><br><br><br>
<a href='http://www.aacgc.com' target='_blank'>
<font color='808080' size='1'>".$eplug_name." V".$eplug_version."  &reg;</font>
</a>";
//------------------------------------------------------------------------+

$ns -> tablerender("Ribbon Details",$text);

require_once(FOOTERF);

?>