<?php

require_once("../../class2.php");
if(!getperms("P")) {exit;}
require_once(e_ADMIN."auth.php");
require_once(e_HANDLER."form_handler.php"); 
require_once(e_HANDLER."file_class.php");
$rs = new form;
$fl = new e_file;
if (e_QUERY) {
        $tmp = explode('.', e_QUERY);
        $action = $tmp[0];
        $id = $tmp[1];
        unset($tmp);
}
//-----------------------------------------------------------------------------------------------------------+
if (isset($_POST['update_ribbon'])) {
        $message = ($sql->db_Update("aacgcawards_ribbons", "rib_pic ='".$_POST['rib_pic']."',rib_name ='".$_POST['rib_name']."', rib_txt ='".$_POST['rib_txt']."' WHERE rib_id='".$_POST['id']."' ")) ? "Updated" : "Update Failed";
}

if (isset($_POST['main_delete'])) {
        $delete_id = array_keys($_POST['main_delete']);
	$sql2 = new db;
    $sql2->db_Delete("aacgcawards_ribbons", "rib_id='".$delete_id[0]."'");
	$sql = new db;
	$sql->db_Delete("aacgcawards_awarded_ribbons", "awarded_rib_id='".$delete_id[0]."'");
}

if (isset($message)) {
        $ns->tablerender("", "<div style='text-align:center'><b>".$message."</b></div>");
}
//-----------------------------------------------------------------------------------------------------------+
if ($action == "") {
        $width = "width:100%";
        $text .= $rs->form_open("post", e_SELF, "myform_".$row['rib_id']."", "", "");
        $text .= "
        <div style='text-align:center'>
        <table style='".$width."' class='fborder' cellspacing='0' cellpadding='0'>
        <tr>
        <td style='width:0%' class='forumheader3'>ID</td>
        <td style='width:0%' class='forumheader3'>Image</td>
        <td style='width:50%' class='forumheader3'>Name</td>
        <td style='width:50%' class='forumheader3'>Details</td>
        <td style='width:0%' class='forumheader3'>Options</td>
        </tr>";
        $sql->db_Select("aacgcawards_ribbons", "*", "ORDER BY rib_id ASC","");
        while($row = $sql->db_Fetch()){
        $text .= "
        <tr>
        <td style='width:' class='forumheader3'>".$row['rib_id']."</td>
        <td style='width:' class='forumheader3'><center><img src='ribbons/".$row['rib_pic']."' alt=''></img></center></td>
        <td style='width:' class='forumheader3'>".$row['rib_name']."</td>
		<td style='width:' class='forumheader3'>".$row['rib_txt']."</td>
        <td style='width:; text-align:center; white-space: nowrap' class='forumheader3'>
        
		<a href='".e_SELF."?edit.{$row['rib_id']}'>".ADMIN_EDIT_ICON."</a>
		<input type='image' title='".LAN_DELETE."' name='main_delete[".$row['rib_id']."]' src='".ADMIN_DELETE_ICON_PATH."' onclick=\"return jsconfirm('".LAN_CONFIRMDEL." [ID: {$row['rib_id']} ]')\"/>
		</td>
        </tr>";
		}
        $text .= "
        </table>
        </div>";
        $text .= $rs->form_close();
	      $ns -> tablerender("AACGC Awards (Edit Ribbon)", $text);
	      require_once(e_ADMIN."footer.php");
}
//-----------------------------------------------------------------------------------------------------------+

//-----------------------------------------------------------------------------------------------------------+

if ($action == "edit")
{
                $sql->db_Select("aacgcawards_ribbons", "rib_id, rib_name, rib_txt, rib_pic", "rib_id = $id");
                $row = $sql->db_Fetch();
        $width = "width:100%";
        $text = "
        <div style='text-align:center'>
        ".$rs -> form_open("post", e_SELF, "MyForm", "", "enctype='multipart/form-data'", "")."
        <table style='".$width."' class='fborder' cellspacing='0' cellpadding='0'>
        <tr>
        <td style='width:0%; text-align:right' class='forumheader3'>Name:</td>
        <td style='width:100%' class='forumheader3'>
            ".$rs -> form_text("rib_name", 60, $row['rib_name'], 100)."
        </td>
        </tr>
        <tr>
        <td style='width:; text-align:right' class='forumheader3'>Details:</td>
        <td style='width:' class='forumheader3'>
            ".$rs -> form_textarea("rib_txt", '59', '3', $row['rib_txt'], "", "", "", "", "")."
        </td>
        </tr>";

        $rejectlist = array('$.','$..','/','CVS','thumbs.db','Thumbs.db','*._$', 'index', 'null*', 'blank*');
        $iconpath = e_PLUGIN."aacgc_awards/ribbons/";
        $iconlist = $fl->get_files($iconpath,"",$rejectlist);

        $text .= "
        <tr>
        <td style='width:; text-align:right' class='forumheader3'>Image:</td>
        <td style='width:' class='forumheader3'>
            ".$rs -> form_text("rib_pic", 60, $row['rib_pic'], 100)."
            ".$rs -> form_button("button", '', "Show Ribbons", "onclick=\"expandit('plcico')\"")."
            <div id='plcico' style='{head}; display:none'>";
            foreach($iconlist as $icon){
                $text .= "<a href=\"javascript:insertext('".$icon['fname']."','rib_pic','plcico')\"><img src='".$icon['path'].$icon['fname']."' style='border:0' alt='' /></a> ";
            }
            $text .= "</div>
        </td></tr>
        <tr style='vertical-align:top'>
        <td colspan='2' style='text-align:center' class='forumheader'>
        ".$rs->form_hidden("id", "".$row['rib_id']."")."
        ".$rs -> form_button("submit", "update_ribbon", "Save", "", "", "")."
        </td>
        </tr>
        </table>
        ".$rs -> form_close()."
        </div>";
	      $ns -> tablerender("AACGC Awards (Edit Ribbon)", $text);
	      require_once(e_ADMIN."footer.php");
}
?>

