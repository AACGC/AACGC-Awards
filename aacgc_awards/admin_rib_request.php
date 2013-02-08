<?php


/*
#######################################
#     e107 website system plguin      #
#     AACGC Adv Ribbons & Medals V5.0 #
#     by Reid Baughman AKA M@CH!N3    #
#     http://www.aacgc.com            #
#     admin@aacgc.com                 #
#######################################
*/

require_once("../../class2.php");
if(!getperms("P")) {
echo "";
exit;
}
require_once(e_ADMIN."auth.php");
require_once(e_HANDLER."form_handler.php"); 
require_once(e_HANDLER."file_class.php");

$rs = new form;
if (isset($_POST['main_delete'])) {
        $delete_id = array_keys($_POST['main_delete']);
	$sql2 = new db;
    $sql2->db_Delete("advmedsys_medals_request", "request_id='".$delete_id[0]."'");
	
}

//-----------------------------------------------------------------------------------------------------------+

if ($action == "") {

        $text .= $rs->form_open("post", e_SELF, "myform_".$row['request_id']."", "", "");
        $text .= "
        <div style='text-align:center'>
        <table style='width:95%' class='fborder' cellspacing='0' cellpadding='0'>
        <tr>
        <td style='width:' class='forumheader3'>Request ID</td>
        <td style='width:25%' class='forumheader3'>User</td>
        <td style='width:25%' class='forumheader3'>Reason</td>
        <td style='width:25%' class='forumheader3'>Ribbon</td>
        <td style='width:' class='forumheader3'>Options</td>
       </tr>";
        $sql->db_Select("advmedsys_medals_request", "*", "ORDER BY request_id ASC","");
        while($row = $sql->db_Fetch()){
        $text .= "
        <tr>
        <td style='width:' class='forumheader3'>".$row['request_id']."</td>
        <td style='width:25%' class='forumheader3'>".$row['user_name']."</td>
        <td style='width:25%' class='forumheader3'>".$row['reason_wanted']."</td>
        <td style='width:25%' class='forumheader3'>".$row['ribbon_wanted']."</td>
        <td style='width:' class='forumheader3'>
        
		<a href='".e_SELF."?edit.{$row['request_id']}'>".ADMIN_EDIT_ICON."</a>
		<input type='image' title='".LAN_DELETE."' name='main_delete[".$row['request_id']."]' src='".ADMIN_DELETE_ICON_PATH."' onclick=\"return jsconfirm('".LAN_CONFIRMDEL." [ID: {$row['request_id']} ]')\"/>
		</td>
        </tr>";
		}
        $text .= "
        </table>
        </div>";
        $text .= $rs->form_close();
	      $ns -> tablerender("Ribbon Requests", $text);
	      require_once(e_ADMIN."footer.php");
}
//-----------------------------------------------------------------------------------------------------------+