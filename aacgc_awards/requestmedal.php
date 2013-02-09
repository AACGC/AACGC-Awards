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
if(USER){
//----------------------------------------------
if ($_POST['add_request'] == '1') {
$newname = $_POST['user_name'];
$newreason = $_POST['reason_wanted'];
$newmed = $_POST['medal_wanted'];

$sql->db_Insert("aacgcawards_medals_request", "NULL, '".$newname."', '".$newreason."', '".$newmed."'") or die(mysql_error());

$ns->tablerender("", "<center><b>Request Sent</b></center>");

require_once(FOOTERF);}

//---------------------------------------------------------------------------

        $sql->db_Select("aacgcawards_medals", "*", "medal_id='".intval($sub_action)."'");
        $row = $sql->db_Fetch();
		
$text .= "<table style='' class=''><tr><td class='fcaption' colspan=2><center>Medal Chosen</center></td></tr>";
$text .= "<tr>
<td class='forumheader3'><font size='".$pref['rib_fsizer']."'>".$row['medal_name']."</font></td>
<td style='width:15%' class='forumheader3'><center><img width='".$pref['rib_imgr']."' src='".e_PLUGIN."advmedsys/medalimg/".$row['medal_pic']."' alt = 'AACGC Medal'></img></center></td>";

$text .= "</table>";

//-------------       

$text .= "<br><br><center>
<form method='POST' action='requestmedal.php'>
<table style='width:100%' class='forumheader3'>
	<tr>
		<td style='width:50%'>Your Name:</td>
		<td style='width:50%'><input class='tbox' type='text' name='user_name' size='50' value='".USERNAME."'></td>
	</tr><tr>
		<td style='width:50%'>Reason For Request:</td>
		<td style='width:50%'><input class='tbox' rows='3' cols='50' name='reason_wanted' size='50'></td>
	</tr><tr>
		<td style='width:50%'>Medal Name:</td>
		<td style='width:50%'><input class='tbox' type='text' name='medal_wanted' size='50' value='".$row['medal_name']."'></td>
	</tr>
</table>

<br><br>

<input type='hidden' name='add_request' value='1'>
<input class='button' type='submit' value='Submit'>

</form>
";
//-------------
}
$ns -> tablerender("Request Medals Form", $text);
require_once(FOOTERF);
?>