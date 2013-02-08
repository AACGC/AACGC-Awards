<?php

require_once("../../class2.php");
if(!getperms("P")) {
exit;
}
require_once(e_ADMIN."auth.php");
require_once(e_HANDLER."form_handler.php"); 
require_once(e_HANDLER."file_class.php");
$rs = new form;
$selecteduserid = $_POST['user_sel_id'];

function getmedcount($medcuid) {
	$mcount = 0;
    $sql0000001 = new db;
    $sql0000001->db_Select("advmedsys_awarded","*", "awarded_user_id='".$medcuid."'");
    while($row0000001 = $sql0000001->db_Fetch()) {
        $mcount++;
	}
    return $mcount;
}
//-----------------------------------------------------------------------------------------------------------+
if (isset($_POST['medal_delete'])) {
        $delete_id = array_keys($_POST['medal_delete']);
        $message = ($sql->db_Delete("advmedsys_awarded", "awarded_id ='".$delete_id[0]."' ")) ? AMS_ADMIN_S23 : AMS_ADMIN_S24 ;
}
if (isset($message)) {
        $ns->tablerender("", "<div style='text-align:center'><b>".$message."</b></div>");
}
//-----------------------------------------------------------------------------------------------------------+
$text ="
<form method='POST' action='admin_take_medal.php'>
<br>
<center>
<div style='width:100%'>
<table style='width:60%' class='fborder' cellspacing='0' cellpadding='0'>
	<tr>
		<td style='width:30%; text-align:right' class='forumheader3'>Select User:</td>
		<td style='width:70%' class='forumheader3'>
		<select name='user_sel_id' size='1' class='tbox' style='width:100%'>";
	        $sql->db_Select("user", "user_id, user_name", "ORDER BY user_name ASC","");
    		    while($row = $sql->db_Fetch()){
    		    $usern = $row[user_name];
    		    $userid = $row[user_id];
    		    $umedc = getmedcount($userid);
    		    If ($umedc > 0) {
    		    if ($userid == $selecteduserid) {
			        $text .= "<option name='user_sel_id' value='".$userid."' selected>".$usern."</option>";
				} else {
			        $text .= "<option name='user_sel_id' value='".$userid."'>".$usern."</option>";					
				}
				}
	        	}
        $text .= "
		</td>
    </tr>
    <tr>
    <td colspan='2' 'style='width:70%' class='forumheader3'>
        <input type='hidden' name='medaltake' value='1'>
		<center><input class='button' type='submit' value='Show Medals' style='width:150px'></center>
	</td>
	</tr>
</table>
</div>
</center>
<br>
</form>
<br>
";
//-----------------------------------------------------------------------------------------------------------+
If ($_POST['medaltake'] == "1") {
$text .= "	
<form method='POST' action='admin_take_medal.php'>
<div style='text-align:center'>
<table style='width:90%' class='fborder' cellspacing='0' cellpadding='0'>
        <tr>
        <td style='width:0%' class='forumheader3'>ID</td>
        <td style='width:0%' class='forumheader3'>Image</td>
        <td style='width:50%' class='forumheader3'>Name</td>
        <td style='width:50%' class='forumheader3'>Date</td>
        <td style='width:0%' class='forumheader3'>Options</td>
        </tr>";
		
        $sql->db_Select("advmedsys_awarded", "*", "awarded_user_id='".$selecteduserid."'");
        while($row = $sql->db_Fetch()){
        $sql2->db_Select("advmedsys_medals", "*", "medal_id='".$row['awarded_medal_id']."'");
        $row2 = $sql2->db_Fetch();
		
        $text .= "
        <tr>
        <td style='width:' class='forumheader3'>".$row['awarded_id']."</td>
        <td style='width:' class='forumheader3'><center><img width='50px' src='medals/".$row2['medal_pic']."' alt='' /></center></td>
        <td style='width:' class='forumheader3'>".$row2['medal_name']."</td>
        <td style='width:' class='forumheader3'>".$row['awarded_date']."</td>
        <td style='width:; text-align:center; white-space: nowrap' class='forumheader3'>
		<input type='image' title='".LAN_DELETE."' name='medal_delete[".$row['awarded_id']."]' src='".ADMIN_DELETE_ICON_PATH."' onclick=\"return jsconfirm('".LAN_CONFIRMDEL." [ID: {$row['awarded_id']} ]')\"/>
		</td>
        </tr>";
                }
        $text .= "
        </table>
        </div>";
        $text .= $rs->form_close();	
}
	      $ns -> tablerender("AACGC Awards (Take Medal)", $text);
	      require_once(e_ADMIN."footer.php");
?>
