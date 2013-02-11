<?php

require_once("../../class2.php");
if(!getperms("P")) {
echo AMS_ADMIN_S1;
exit;
}
require_once(e_ADMIN."auth.php");
require_once(e_HANDLER."form_handler.php"); 
require_once(e_HANDLER."file_class.php");
require_once(e_HANDLER."calendar/calendar_class.php");
$cal = new DHTML_Calendar(true);
function headerjs()
{
	global $cal;
	require_once(e_HANDLER."calendar/calendar_class.php");
	$cal = new DHTML_Calendar(true);
	return $cal->load_files();
}
//-----------------------------------------------------------------------------------------------------------+
if ($_POST['medaltodb'] == "1") {
	
$offset = $pref['awards_dateoffset'];
$awarddate = $_POST['awarded_date']  + ($offset * 60 * 60);
$medid = $tp->toDB($_POST['medal']);
$uid = $tp->toDB($_POST['user']);
$count = $tp->toDB($_POST['count']);
$date = $tp->toDB($awarddate);

$sql->db_Select("user", "*", "user_id='".$uid."'");
while($row = $sql->db_Fetch()){
$usern2 = $row[user_name];}
$i = 1;
while ($i <= $count):
$sql->db_Insert("aacgcawards_awarded_medals", "NULL,'".$medid."' , '".$uid."', '".$date."'");
$i++;
endwhile;
$txt = "<center><b>Successfully gave  ".$count." medal(s) to ".$usern2."!</b><center>";
$ns -> tablerender("", $txt);
}
//-----------------------------------------------------------------------------------------------------------+


//-----------------------------------------------------------------------------------------------------------------------------
$med_title = "AACGC Awards (Give Medal)";

$text = "
<form method='POST' action='admin_give_medal.php'>
<br>
<center>
<div style='width:100%'>
<table style='width:60%' class='fborder' cellspacing='0' cellpadding='0'>
	<tr>
		<td style='width:30%; text-align:right' class='forumheader3'>Select User:</td>
		<td style='width:70%' class='forumheader3'>
		<select name='user' size='1' class='tbox' style='width:100%'>
                ";
	        $sql->db_Select("user", "user_id, user_name", "ORDER BY user_name ASC","");
    		    while($row = $sql->db_Fetch()){
    		    $usern = $row[user_name];
    		    $userid = $row[user_id];

        $text .= "<option name='user' value='".$userid."'>".$usern."</option>";}



 


        $text .= "</td></tr>
        <tr>
        <td style='width:30%; text-align:right' class='forumheader3'>Medal:</td>
        <td style='width:70%' class='forumheader3'>
		<select name='medal' size='1' class='tbox' style='width:100%'>";
		$sql->db_Select("aacgcawards_medals", "medal_id, medal_name", "ORDER BY medal_id ASC","");
        while($row = $sql->db_Fetch()){
         $text .= "<option name='medal' value='".$row['medal_id']."'>".$row['medal_name']."</option>";
        }
        $text .= "
		</td>
		</tr>
		<tr>
        <td style='width:30%; text-align:right' class='forumheader3'>Number:</td>
        <td style='width:70%' class='forumheader3'>
		<select name='count' size='1' class='tbox' style='width:100%'>
		<option name='count' value='1'>1</option>
		<option name='count' value='2'>2</option>
		<option name='count' value='3'>3</option>
		<option name='count' value='4'>4</option>
		<option name='count' value='5'>5</option>
		<option name='count' value='6'>6</option>
		<option name='count' value='7'>7</option>
		<option name='count' value='8'>8</option>
		<option name='count' value='9'>9</option>
		<option name='count' value='10'>10</option>
        </td>
		</tr>
		<tr>
        <td style='width:; text-align:right' class='forumheader3'>Date Awarded:</td>
		<td style='width:' class='forumheader3'>";

$text .= $cal->make_input_field(
           array('firstDay'       => 1,
                 'showsTime'      => true,
                 'showOthers'     => true,
                 'ifFormat'       => '%s',
                 'weekNumbers'    => false,
                 'timeFormat'     => '12'),
           array('style'       => 'color: #840; background-color: #ff8; border: 1px solid #000; text-align: center',
                 'name'        => 'awarded_date',
                 'value'       => ''));
		
$text .="</td>";

$text .="</tr>
        <tr>
        <td colspan='2' style='text-align:center' class='forumheader'>
		<input type='hidden' name='medaltodb' value='1'>
		<input class='button' type='submit' value='Give Medal' style='width:150px'>
		</td>
        </tr>
        </table>
        </div>";


	      $ns -> tablerender($med_title, $text);


//-----------------------------------------------------------------------------------------------------------------------------
	      require_once(e_ADMIN."footer.php");
?>