<?php

require_once("../../class2.php");
if (!defined('e107_INIT'))
{exit;}
if (!getperms("P"))
{header("location:" . e_HTTP . "index.php");
exit;}
require_once(e_ADMIN . "auth.php");
if (!defined('ADMIN_WIDTH'))
{define(ADMIN_WIDTH, "width:100%;");}

include(e_HANDLER."ren_help.php");

$offset = $pref['awards_dateoffset'];
$time = time()  + ($offset * 60 * 60);
$ctime = $time;
$dformat = $pref['awards_dateformat'];
$date = date($dformat, $ctime);

if (e_QUERY == "update")
{
    $pref['armpage_title'] = $tp->toDB($_POST['armpage_title']);
    $pref['rib_fsize'] = $tp->toDB($_POST['rib_fsize']);
    $pref['rib_img1'] = $tp->toDB($_POST['rib_img1']);
    $pref['rib_img2'] = $tp->toDB($_POST['rib_img2']);
    $pref['rib_ffsize'] = $tp->toDB($_POST['rib_ffsize']);
    $pref['rib_fimg'] = $tp->toDB($_POST['rib_fimg']);
    $pref['rib_userimg'] = $tp->toDB($_POST['rib_userimg']);
    $pref['rib_userfsize'] = $tp->toDB($_POST['rib_userfsize']);
    $pref['med_fsize'] = $tp->toDB($_POST['med_fsize']);
    $pref['med_ffsize'] = $tp->toDB($_POST['med_ffsize']);
    $pref['med_img1'] = $tp->toDB($_POST['med_img1']);
    $pref['med_img2'] = $tp->toDB($_POST['med_img2']);
    $pref['med_fimg'] = $tp->toDB($_POST['med_fimg']);
    $pref['med_userimg'] = $tp->toDB($_POST['med_userimg']);
    $pref['med_userfsize'] = $tp->toDB($_POST['med_userfsize']);
    $pref['rib_fsizer'] = $tp->toDB($_POST['rib_fsizer']);
    $pref['rib_imgr'] = $tp->toDB($_POST['rib_imgr']);
    $pref['med_fsizer'] = $tp->toDB($_POST['med_fsizer']);
    $pref['med_imgr'] = $tp->toDB($_POST['med_imgr']);
    $pref['toprib_name'] = $tp->toDB($_POST['toprib_name']);
    $pref['toprib_count'] = $tp->toDB($_POST['toprib_count']);
    $pref['topmed_name'] = $tp->toDB($_POST['topmed_name']);
    $pref['topmed_count'] = $tp->toDB($_POST['topmed_count']);
    $pref['meddet_count'] = $tp->toDB($_POST['meddet_count']);
    $pref['ribdet_count'] = $tp->toDB($_POST['ribdet_count']);
    $pref['rmmenu_title'] = $tp->toDB($_POST['rmmenu_title']);
    $pref['rspage_title'] = $tp->toDB($_POST['rspage_title']);
    $pref['mspage_title'] = $tp->toDB($_POST['mspage_title']);
    $pref['ribcount_userimg'] = $tp->toDB($_POST['ribcount_userimg']);
    $pref['medcount_userimg'] = $tp->toDB($_POST['medcount_userimg']);
    $pref['ribcount_fsize'] = $tp->toDB($_POST['ribcount_fsize']);
    $pref['medcount_fsize'] = $tp->toDB($_POST['medcount_fsize']);
    $pref['numrib'] = $tp->toDB($_POST['numrib']);
    $pref['nummed'] = $tp->toDB($_POST['nummed']);
    $pref['awards_header'] = $tp->toDB($_POST['awards_header']);
    $pref['awards_intro'] = $tp->toDB($_POST['awards_intro']);
    $pref['awards_dateoffset'] = $tp->toDB($_POST['awards_dateoffset']);
    $pref['awards_dateformat'] = $tp->toDB($_POST['awards_dateformat']);

if (isset($_POST['rib_enable_forums'])) 
{$pref['rib_enable_forums'] = 1;}
else
{$pref['rib_enable_forums'] = 0;}

if (isset($_POST['med_enable_forums'])) 
{$pref['med_enable_forums'] = 1;}
else
{$pref['med_enable_forums'] = 0;}

if (isset($_POST['rib_enable_profiles'])) 
{$pref['rib_enable_profiles'] = 1;}
else
{$pref['rib_enable_profiles'] = 0;}

if (isset($_POST['med_enable_profiles'])) 
{$pref['med_enable_profiles'] = 1;}
else
{$pref['med_enable_profiles'] = 0;}

if (isset($_POST['rib_enable_request'])) 
{$pref['rib_enable_request'] = 1;}
else
{$pref['rib_enable_request'] = 0;}

if (isset($_POST['med_enable_request'])) 
{$pref['med_enable_request'] = 1;}
else
{$pref['med_enable_request'] = 0;}

if (isset($_POST['rib_enable_userlist'])) 
{$pref['rib_enable_userlist'] = 1;}
else
{$pref['rib_enable_userlist'] = 0;}

if (isset($_POST['med_enable_userlist'])) 
{$pref['med_enable_userlist'] = 1;}
else
{$pref['med_enable_userlist'] = 0;}

if (isset($_POST['rib_enable_userribbons'])) 
{$pref['rib_enable_userribbons'] = 1;}
else
{$pref['rib_enable_userribbons'] = 0;}

if (isset($_POST['med_enable_usermedals'])) 
{$pref['med_enable_usermedals'] = 1;}
else
{$pref['med_enable_usermedals'] = 0;}

if (isset($_POST['rib_enable_stats'])) 
{$pref['rib_enable_stats'] = 1;}
else
{$pref['rib_enable_stats'] = 0;}

if (isset($_POST['med_enable_stats'])) 
{$pref['med_enable_stats'] = 1;}
else
{$pref['med_enable_stats'] = 0;}

if (isset($_POST['rm_enable_gold'])) 
{$pref['rm_enable_gold'] = 1;}
else
{$pref['rm_enable_gold'] = 0;}

if (isset($_POST['rm_enable_forumrname'])) 
{$pref['rm_enable_forumrname'] = 1;}
else
{$pref['rm_enable_forumrname'] = 0;}

if (isset($_POST['rm_enable_forummname'])) 
{$pref['rm_enable_forummname'] = 1;}
else
{$pref['rm_enable_forummname'] = 0;}

    save_prefs();
    $led_msgtext = "Settings Saved";
}

$admin_title = "AACGC Awards (Settings)";
//--------------------------------------------------------------------


$text .= "
<form method='post' action='" . e_SELF . "?update' id='confadvmedsys'>
	<table style='" . ADMIN_WIDTH . "' class='fborder'>
		<tr>
			<td colspan='3' class='fcaption'><b>Main Display Settings:</b></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Date Format:<br/>(<a href='http://php.net/manual/en/function.date.php' target=_blank'>PHP Date Formats</a>)</td>
			<td colspan='2'  class='forumheader3'>
				<input class='tbox' type='text' size='10' name='awards_dateformat' value='".$tp->toFORM($pref['awards_dateformat' ])."' /> (Currently: ".$date.")
			</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Date offset:<br/>(If using hours)</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='awards_dateoffset' value='".$tp->toFORM($pref['awards_dateoffset' ])."' /> (+/- hours)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Display Page Title:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='60' name='armpage_title' value='".$tp->toFORM($pref['armpage_title'])."' /></td>
		</tr>
		<tr>
        	<td style='width:' class='forumheader3'>Page Header:</td>
        	<td style='width:' class='forumheader3'>
	    		<textarea class='tbox' rows='5' cols='100' name='awards_header' onselect='storeCaret(this);' onclick='storeCaret(this);' onkeyup='storeCaret(this);'>".$pref['awards_header']."</textarea><br>";

$text .= display_help('helpb', 'forum');

$text .= "</td> 
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Ribbon Font Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='rib_fsize' value='".$tp->toFORM($pref['rib_fsize'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Right Ribbon Image Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='rib_img1' value='".$tp->toFORM($pref['rib_img1'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Left Ribbon Image Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='rib_img2' value='".$tp->toFORM($pref['rib_img2'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Medal Font Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='med_fsize' value='".$tp->toFORM($pref['med_fsize'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Right Medal Image Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='med_img1' value='".$tp->toFORM($pref['med_img1'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Left Medal Image Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='med_img2' value='".$tp->toFORM($pref['med_img2'])."' />px</td>
		</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Awarded Members Under Ribbon Details:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rib_enable_userlist'] == 1 ? "<input type='checkbox' name='rib_enable_userlist' value='1' checked='checked' />" : "<input type='checkbox' name='rib_enable_userlist' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Awarded Members Under Medal Details:</td>
		        <td colspan=2 class='forumheader3'>".($pref['med_enable_userlist'] == 1 ? "<input type='checkbox' name='med_enable_userlist' value='1' checked='checked' />" : "<input type='checkbox' name='med_enable_userlist' value='0' />")."</td>
	        </tr>
		<tr>
			<td style='width:30%' class='forumheader3'># of Users Below Ribbon Details:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='ribdet_count' value='".$tp->toFORM($pref['ribdet_count'])."' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'># of Users Below Medals Details:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='meddet_count' value='".$tp->toFORM($pref['meddet_count'])."' /></td>
		</tr>






		<tr>
			<td colspan='3' class='fcaption'><b>Request Option Settings:</b></td>
		</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Allow Ribbon Requests:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rib_enable_request'] == 1 ? "<input type='checkbox' name='rib_enable_request' value='1' checked='checked' />" : "<input type='checkbox' name='rib_enable_request' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Allow Medal Requests:</td>
		        <td colspan=2 class='forumheader3'>".($pref['med_enable_request'] == 1 ? "<input type='checkbox' name='med_enable_request' value='1' checked='checked' />" : "<input type='checkbox' name='med_enable_request' value='0' />")."</td>
	        </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Ribbon Font Size On Request Page:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='rib_fsizer' value='".$tp->toFORM($pref['rib_fsizer'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Ribbon Image Size On Request Page:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='rib_imgr' value='".$tp->toFORM($pref['rib_imgr'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Medal Font Size On Request Page:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='med_fsizer' value='".$tp->toFORM($pref['med_fsizer'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Medal Image Size On Request Page:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='med_imgr' value='".$tp->toFORM($pref['med_imgr'])."' />px</td>
		</tr>







		<tr>
			<td colspan='3' class='fcaption'><b>Stats Pages Settings:</b></td>
		</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Ribbon Stats Link On Ribbons Menu:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rib_enable_stats'] == 1 ? "<input type='checkbox' name='rib_enable_stats' value='1' checked='checked' />" : "<input type='checkbox' name='rib_enable_stats' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Medal Stats Link On Medals Menu:</td>
		        <td colspan=2 class='forumheader3'>".($pref['med_enable_stats'] == 1 ? "<input type='checkbox' name='med_enable_stats' value='1' checked='checked' />" : "<input type='checkbox' name='med_enable_stats' value='0' />")."</td>
	        </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Ribbon Stats Page Name:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='60' name='rspage_title' value='".$tp->toFORM($pref['rspage_title'])."' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Medals Stats Page Name:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='60' name='mspage_title' value='".$tp->toFORM($pref['mspage_title'])."' /></td>
		</tr>










			<tr>
			<td colspan='3' class='fcaption'><b>User Awarded / Counter Menus Settings:</b></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Awarded / Counter Menu Name:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='60' name='rmmenu_title' value='".$tp->toFORM($pref['rmmenu_title'])."' /></td>
		</tr>
	    <tr>
		        <td style='width:30%' class='forumheader3'>Show User's Ribbons On Menu:</td>
		        <td colspan='2' class='forumheader3'>".($pref['rib_enable_userribbons'] == 1 ? "<input type='checkbox' name='rib_enable_userribbons' value='1' checked='checked' />" : "<input type='checkbox' name='rib_enable_userribbons' value='0' />")."</td>
	    </tr>
	    <tr>
		        <td style='width:30%' class='forumheader3'>Show User's Medals On Menu:</td>
		        <td colspan='2' class='forumheader3'>".($pref['med_enable_usermedals'] == 1 ? "<input type='checkbox' name='med_enable_usermedals' value='1' checked='checked' />" : "<input type='checkbox' name='med_enable_usermedals' value='0' />")."</td>
	    </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Users Ribbon Font Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='ribcount_fsize' value='".$tp->toFORM($pref['ribcount_fsize'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Users Ribbon Image Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='ribcount_userimg' value='".$tp->toFORM($pref['ribcount_userimg'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Users Medal Font Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='medcount_fsize' value='".$tp->toFORM($pref['medcount_fsize'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Users Medal Image Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='medcount_userimg' value='".$tp->toFORM($pref['medcount_userimg'])."' />px</td>
		</tr>

		
		
		<tr>
			<td colspan='3' class='fcaption'><b>Top Member Menus Settings:</b></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Ribbon Menu Name:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='60' name='toprib_name' value='".$tp->toFORM($pref['toprib_name'])."' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Medal Menu Name:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='60' name='topmed_name' value='".$tp->toFORM($pref['topmed_name'])."' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'># of Users on Ribbon Menu:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='toprib_count' value='".$tp->toFORM($pref['toprib_count'])."' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'># of Users on Medal Menu:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='topmed_count' value='".$tp->toFORM($pref['topmed_count'])."' /></td>
		</tr>



		<tr>
			<td colspan='3' class='fcaption'><b>Forum Settings:</b></td>
		</tr>
	        <tr>
		        <td style='width:30%' class='forumheader3'>Show Recent Ribbons In Forums:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rib_enable_forums'] == 1 ? "<input type='checkbox' name='rib_enable_forums' value='1' checked='checked' />" : "<input type='checkbox' name='rib_enable_forums' value='0' />")."</td>
	        </tr>
	        <tr>
		        <td style='width:30%' class='forumheader3'>Show Ribbons Names Forums:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rm_enable_forumrname'] == 1 ? "<input type='checkbox' name='rm_enable_forumrname' value='1' checked='checked' />" : "<input type='checkbox' name='rm_enable_forumrname' value='0' />")."</td>
	        </tr>
	        <tr>
		        <td style='width:30%' class='forumheader3'>Show Recent Medals In Forums:</td>
		        <td colspan=2 class='forumheader3'>".($pref['med_enable_forums'] == 1 ? "<input type='checkbox' name='med_enable_forums' value='1' checked='checked' />" : "<input type='checkbox' name='med_enable_forums' value='0' />")."</td>
	        </tr>
	        <tr>
		        <td style='width:30%' class='forumheader3'>Show Medals Names Forums:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rm_enable_forummname'] == 1 ? "<input type='checkbox' name='rm_enable_forummname' value='1' checked='checked' />" : "<input type='checkbox' name='rm_enable_forummname' value='0' />")."</td>
	        </tr>
                <tr>
			<td style='width:30%' class='forumheader3'>Number of Recent Ribbons:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='numrib' value='".$tp->toFORM($pref['numrib'])."' /></td>
		</tr>
                <tr>
			<td style='width:30%' class='forumheader3'>Forum Ribbon Font Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='rib_ffsize' value='".$tp->toFORM($pref['rib_ffsize'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Forum Ribbon Image Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='rib_fimg' value='".$tp->toFORM($pref['rib_fimg'])."' />px</td>                        
                </tr>
                <tr>
			<td style='width:30%' class='forumheader3'>Number of Recent Medals:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='nummed' value='".$tp->toFORM($pref['nummed'])."' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Forum Medal Font Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='med_ffsize' value='".$tp->toFORM($pref['med_ffsize'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Forum Medal Image Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='med_fimg' value='".$tp->toFORM($pref['med_fimg'])."' />px</td>
                        
                </tr>



		<tr>
			<td colspan='3' class='fcaption'><b>User Profile Settings:</b>  (Only Works On Default E107 Profiles, Altenate Profiles Plugin Not Suported Yet)</td>
		</tr>
	        <tr>
		        <td style='width:30%' class='forumheader3'>Show Ribbons In Profiles:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rib_enable_profiles'] == 1 ? "<input type='checkbox' name='rib_enable_profiles' value='1' checked='checked' />" : "<input type='checkbox' name='rib_enable_profiles' value='0' />")."</td>
	        </tr>
	        <tr>
		        <td style='width:30%' class='forumheader3'>Show Medals In Profiles:</td>
		        <td colspan=2 class='forumheader3'>".($pref['med_enable_profiles'] == 1 ? "<input type='checkbox' name='med_enable_profiles' value='1' checked='checked' />" : "<input type='checkbox' name='med_enable_profiles' value='0' />")."</td>
	        </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Profile Ribbon Font Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='rib_userfsize' value='".$tp->toFORM($pref['rib_userfsize'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Profile Ribbon Image Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='rib_userimg' value='".$tp->toFORM($pref['rib_userimg'])."' />px</td>
                </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Profile Medal Font Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='med_userfsize' value='".$tp->toFORM($pref['med_userfsize'])."' />px</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Profile Medal Image Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='15' name='med_userimg' value='".$tp->toFORM($pref['med_userimg'])."' />px</td>
                        
        </tr>
		
		
		
		

		
		
		
		
		
		<tr>
			<td colspan='3' class='fcaption'><b>Other Settings:</b></td>
		</tr>
		<tr>
		        <td style='width:30%' class='forumheader3'>Enable Gold System Support:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rm_enable_gold'] == 1 ? "<input type='checkbox' name='rm_enable_gold' value='1' checked='checked' />" : "<input type='checkbox' name='rm_enable_gold' value='0' />")."(shows orbs, must have gold sytem 4.x and gold orbs 1.x installed)</td>
	   </tr>
	   
	   
	   
	   
	   
	   
       <tr>
			<td colspan='3' class='fcaption' style='text-align: left;'><input type='submit' name='update' value='Save Settings' class='button' /></td>
		</tr>
</table>
</form>";





$ns->tablerender($admin_title, $text);
require_once(e_ADMIN . "footer.php");
?>
