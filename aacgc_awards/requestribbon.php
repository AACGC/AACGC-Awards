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
$newrib = $_POST['ribbon_wanted'];


$sql->db_Insert("advmedsys_medals_request", "NULL, '".$newname."', '".$newreason."', '".$newrib."'") or die(mysql_error());

$ns->tablerender("", "<center><b>Request Sent</b></center>");

 require_once(FOOTERF);}

//----------------------------------------------------------------------------------------------------

        $sql->db_Select("advmedsys_medals2", "*", "rib_id='".intval($sub_action)."'");
        $row = $sql->db_Fetch();
		
$text .= "
<table style='width:100%' class=''>
	<tr>
		<td class='fcaption' colspan=2><center>Ribbon Chosen</center></td>
	</tr><tr>
		<td class='forumheader3'><font size='".$pref['rib_fsizer']."'>".$row['rib_name']."</font></td>
		<td style='width:15%' class='forumheader3'><img width='".$pref['rib_imgr']."' src='".e_PLUGIN."aacgc_awards/ribbons/".$row['rib_pic']."' alt = ''></td>
	</tr>
</table>
";


//-------------       

$text .= "<br><br><center>
<form method='POST' action='requestribbon.php'>
<table style='' class='forumheader3'><tr>
<td style='width:50%'>Your Name:</td>
<td style='width:50%'><input class='tbox' type='text' name='user_name' size='50' value='".USERNAME."'></td>
</tr><tr>
<td style='width:50%'>Reason For Request:</td>
<td style='width:50%'><input class='tbox' rows='3' cols='50' name='reason_wanted' size='50'></td>
</tr><tr>
<td style='width:50%'>Ribbon Name:</td>
<td style='width:50%'><input class='tbox' type='text' name='ribbon_wanted' size='50' value='".$row['rib_name']."'></td>
</tr></table>
<br><br>
<input type='hidden' name='add_request' value='1'>
<input class='button' type='submit' value='Submit'>
</form>
";
         
}
   
$ns -> tablerender("", $text);
require_once(FOOTERF);

?>