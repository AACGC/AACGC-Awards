<?php

require_once("../../class2.php");

if(!getperms("P")) {
echo AMS_ADMIN_S1;
exit;
}

require_once(e_ADMIN."auth.php");
require_once(e_HANDLER."form_handler.php"); 
require_once(e_HANDLER."file_class.php");
$rs = new form;
$fl = new e_file;

//-----------------------------------------------------------------------------------------------------------+
if ($_POST['add_medal'] == '1') {
$newmedname = $_POST['medname'];
$newmedpic = $_POST['medal_pic'];
$newmedtxt = $_POST['medal_txt'];
$reason = "";
$newok = "";
if (($newmedname == "") OR ($newmedtxt == "")){
	$newok = "0";
	$reason = "No Name or Details";
} else {
	$newok = "1";
}
if (($newmedpic == "") OR ($newok == "0")){
		If ($newmedpic == "") {
		$reason .= "<br>No Image Selected";	
		}
	$newok = "0";
} else {
	$newok = "1";
}
If ($newok == "0"){
 	$newtext = "
 	<center>
	<b>Failed:<br><br> ".$reason."
	</center>
 	</b>
	";
	$ns->tablerender("AACGC Award System (Create Medal)", $newtext);
}
If ($newok == "1"){
$sql->db_Insert("advmedsys_medals", "NULL, '".$newmedname."', '".$newmedpic."', '".$newmedtxt."'") or die(mysql_error());
$ns->tablerender("", "<center><b>Medal Created</b></center>");
}
}
//-----------------------------------------------------------------------------------------------------------+
$text = "
<form method='POST' action='admin_create_medal.php'>
<br>
<center>
<div style='width:100%'>
<table style='width:80%' class='fborder' cellspacing='0' cellpadding='0'>";
$text .= "
        <tr>
        <td style='width:40%; text-align:right' class='forumheader3'>Medal Name:</td>
        <td style='width:60%' class='forumheader3'>
        <input class='tbox' type='text' name='medname' size='50'>
        </td>
        </tr>
        <tr>
        <td style='width:40%; text-align:right' class='forumheader3'>Medal Details:</td>
        <td style='width:60%' class='forumheader3'>
	        <textarea class='tbox' rows='3' cols='50' name='medal_txt'></textarea>
        </td>
        </tr>";
        $rejectlist = array('$.','$..','/','CVS','thumbs.db','Thumbs.db','*._$', 'index', 'null*', 'blank*');
        $iconpath = e_PLUGIN."aacgc_awards/medals/";
        $iconlist = $fl->get_files($iconpath,"",$rejectlist);

        $text .= "
        <tr>
        <td style='width:40%; text-align:right' class='forumheader3'>Medal Image:</td>
        <td style='width:60%' class='forumheader3'>
        ".$rs -> form_text("medal_pic", 50, $row['medal_pic'], 100)."
        ".$rs -> form_button("button", '', "Show Medals", "onclick=\"expandit('plcico')\"")."
            <div id='plcico' style='{head}; display:none'>";
            foreach($iconlist as $icon){
            $text .= "<a href=\"javascript:insertext('".$icon['fname']."','medal_pic','plcico')\"><img src='".$icon['path'].$icon['fname']."' style='border:0' alt='' /></a> ";
            }
        $text .= "</div>
        </td>
		</tr>
		
        <tr style='vertical-align:top'>
        <td colspan='2' style='text-align:center' class='forumheader'>
		<input type='hidden' name='add_medal' value='1'>
		<input class='button' type='submit' value='Create Medal'>
		</td>
        </tr>
</table>
</div>
<br>
</form>";
	      $ns -> tablerender("AACGC Awards (Create Medal)", $text);
	      require_once(e_ADMIN."footer.php");
?>

