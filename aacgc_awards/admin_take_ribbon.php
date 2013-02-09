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

function getmedcount($ribcuid) {
	$mcount = 0;
    $sql0000001 = new db;
    $sql0000001->db_Select("aacgcawards_awarded_ribbons","*", "awarded_user_id='".$ribcuid."'");
    while($row0000001 = $sql0000001->db_Fetch()) {
        $mcount++;
	}
    return $mcount;
}

//-----------------------------------------------------------------------------------------------------------+
if (isset($_POST['rib_delete'])) {
        $delete_id = array_keys($_POST['rib_delete']);
        $message = ($sql->db_Delete("aacgcawards_awarded_ribbons", "awarded_id ='".$delete_id[0]."' ")) ? "Deleted" : "Deletion Failed" ;
}
if (isset($message)) {
        $ns->tablerender("", "<div style='text-align:center'><b>".$message."</b></div>");
}
//-----------------------------------------------------------------------------------------------------------+
$text .="
<form method='POST' action='admin_take_ribbon.php'>
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
        <input type='hidden' name='ribbontake' value='1'>
		<center><input class='button' type='submit' value='Show Ribbons' style='width:150px'></center>
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
//-----------------------------------------------------------------------------------------------------------+
If ($_POST['ribbontake'] == "1") {
$text .= "	
<form method='POST' action='admin_take_ribbon.php'>
<div style='text-align:center'>
<table style='width:90%' class='fborder' cellspacing='0' cellpadding='0'>
        <tr>
        <td style='width:0%' class='forumheader3'>ID</td>
        <td style='width:0%' class='forumheader3'>Ribbon Picture</td>
        <td style='width:50%' class='forumheader3'>Ribbon Name</td>
        <td style='width:50%' class='forumheader3'>Ribbon Date</td>
        <td style='width:0%' class='forumheader3'>Delete Ribbon</td>
        </tr>";
		
        $sql->db_Select("aacgcawards_awarded_ribbons", "*", "awarded_user_id='".$selecteduserid."'");
        while($row = $sql->db_Fetch()){
        $sql2->db_Select("aacgcawards_ribbons", "*", "rib_id='".$row['awarded_rib_id']."'");
        $row2 = $sql2->db_Fetch();
		
        $text .= "
        <tr>
        <td style='width:' class='forumheader3'>".$row['awarded_id']."</td>
        <td style='width:' class='forumheader3'><center><img width='50px' src='ribbons/".$row2['rib_pic']."' alt=''></img></center></td>
        <td style='width:' class='forumheader3'>".$row2['rib_name']."</td>
        <td style='width:' class='forumheader3'>".$row['awarded_date']."</td>
        <td style='width:; text-align:center; white-space: nowrap' class='forumheader3'>
		<input type='image' title='".LAN_DELETE."' name='rib_delete[".$row['awarded_id']."]' src='".ADMIN_DELETE_ICON_PATH."' onclick=\"return jsconfirm('".LAN_CONFIRMDEL." [ID: {$row['awarded_id']} ]')\"/>
		</td>
        </tr>";
                }
        $text .= "
        </table>
        </div>";
        $text .= $rs->form_close();	
}
	      $ns -> tablerender("AACGC Awards (Take Ribbon)", $text);
	      require_once(e_ADMIN."footer.php");
?>

