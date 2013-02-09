<?php
require_once("../../class2.php");
if(!getperms("P")) {exit;}
require_once(e_ADMIN."auth.php");
require_once(e_HANDLER."form_handler.php"); 
require_once(e_HANDLER."file_class.php");
$rs = new form;
$fl = new e_file;
//-----------------------------------------------------------------------------------------------------------+
if ($_POST['add_ribbon'] == '1') {
$newribname = $_POST['ribname'];
$newribpic = $_POST['rib_pic'];
$newribtxt = $_POST['rib_txt'];
$reason = "";
$newok = "";
if (($newribname == "") OR ($newribtxt == "")){
	$newok = "0";
	$reason = "No name or description was entered";
} else {
	$newok = "1";
}
if (($newribpic == "") OR ($newok == "")){
		If ($newribpic == "0") {
		$reason .= "No picture selected<br>";	
		}
	$newok = "0";
} else {
	$newok = "1";
}
If ($newok == "0"){
 	$newtext = "
        <center>
        <b>Can not creat ribbon<br>
        <br>".$reason."
	</center>
 	</b>
	";
	$ns->tablerender(Error, $newtext);
}
If ($newok == "1"){
$sql->db_Insert("aacgcawards_ribbons", "NULL, '".$newribname."', '".$newribpic."', '".$newribtxt."'") or die(mysql_error());
$ns->tablerender("", "<center><b>Successful created!</b></center>");
}
}
//-----------------------------------------------------------------------------------------------------------+
$text = "
<form method='POST' action='admin_create_ribbon.php'>
<br>
<center>
<div style='width:100%'>
<table style='width:80%' class='fborder' cellspacing='0' cellpadding='0'>";
$text .= "
        <tr>
        <td style='width:40%; text-align:right' class='forumheader3'>Ribbon Name:</td>
        <td style='width:60%' class='forumheader3'>
        <input class='tbox' type='text' name='ribname' size='50'>
        </td>
        </tr>
        <tr>
        <td style='width:40%; text-align:right' class='forumheader3'>Ribbon description:</td>
        <td style='width:60%' class='forumheader3'>
	<textarea class='tbox' rows='3' cols='50' name='rib_txt'></textarea>
        </td>
        </tr>";
        $rejectlist = array('$.','$..','/','CVS','thumbs.db','Thumbs.db','*._$', 'index', 'null*', 'blank*');
        $iconpath = e_PLUGIN."aacgc_awards/ribbons/";
        $iconlist = $fl->get_files($iconpath,"",$rejectlist);

        $text .= "
        <tr>
        <td style='width:40%; text-align:right' class='forumheader3'>Ribbon picture :</td>
        <td style='width:60%' class='forumheader3'>
        ".$rs -> form_text("rib_pic", 50, $row['rib_pic'], 100)."
        ".$rs -> form_button("button", '', "Show Ribbons", "onclick=\"expandit('plcico')\"")."
            <div id='plcico' style='{head}; display:none'>";
            foreach($iconlist as $icon){
            $text .= "<a href=\"javascript:insertext('".$icon['fname']."','rib_pic','plcico')\"><img src='".$icon['path'].$icon['fname']."' style='border:0' alt='' /></a> ";
            }
        $text .= "</div>
        </td>
		</tr>
		
        <tr style='vertical-align:top'>
        <td colspan='2' style='text-align:center' class='forumheader'>
		<input type='hidden' name='add_ribbon' value='1'>
		<input class='button' type='submit' value='Create Ribbon'>
		</td>
        </tr>
</table>
</div>
<br>
</form>";
	      $ns -> tablerender("AACGC Awards (Create Ribbon)", $text);
	      require_once(e_ADMIN."footer.php");
?>

