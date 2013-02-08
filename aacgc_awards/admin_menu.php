<?php

       	

$text = "<table class='fborder' style='width:100%;'>";

$text .= "
<tr><td style='width:30%' class='button'>";
if (e_PAGE == "admin_main.php") 
{$text .= "<b><a style='cursor:hand; text-decoration:none' href='admin_main.php'>>> Main <<</a></b>";}
else
{$text .= "<a style='cursor:hand; text-decoration:none' href='admin_main.php'>Main</a>";}


$text .= "</td></tr><td style='width:30%' class='header'>-</b>";



$text .= "</td></tr>
<tr><td style='width:30%' class='button'>";
if (e_PAGE == "admin_config.php") 
{$text .= "<b><a style='cursor:hand; text-decoration:none' href='admin_config.php'>>> Settings <<</a></b>";}
else
{$text .= "<a style='cursor:hand; text-decoration:none' href='admin_config.php'>Settings</a>";}



$text .= "</td></tr><td style='width:30%' class='header'>-</b>";



$text .= "</td></tr>
<tr><td style='width:30%' class='button'>";
if (e_PAGE == "admin_create_ribbon.php") 
{$text .= "<b><a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_create_ribbon.php'>>> Create Ribbon <<</a></b>";}
else
{$text .="<a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_create_ribbon.php'>Create Ribbon</a>";}



$text .= "</td></tr>
<tr><td style='width:30%' class='button'>";
if (e_PAGE == "admin_create_medal.php") 
{$text .= "<b><a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_create_medal.php'>>> Create Medal <<</a></b>";}
else
{$text .="<a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_create_medal.php'>Create Medal</a>";}



$text .= "</td></tr><td style='width:30%' class='header'>-</b>";



$text .= "</td></tr>
<td style='width:30%' class='button'>";
if (e_PAGE == "admin_edit_ribbon.php") 
{$text .= "<b><a style='cursor:hand; text-decoration:none' href='admin_edit_ribbon.php'>>> Edit Ribbons <<</a></b>";}
 else 
{$text .= "<a style='cursor:hand; text-decoration:none' href='admin_edit_ribbon.php'>Edit Ribbons</a>";}



$text .= "</td></tr>
<tr><td style='width:30%' class='button'>";
if (e_PAGE == "admin_edit_medal.php") 
{$text .= "<b><a style='cursor:hand; text-decoration:none' href='admin_edit_medal.php'>>> Edit Medals<<</a></b>";}
else
{$text .= "<a style='cursor:hand; text-decoration:none' href='admin_edit_medal.php'>Edit Medals</a>";}


$text .= "</td></tr><td style='width:30%' class='header'>-</b>";


$ttl = "Options";



$text .= "</td></tr>
<td style='width:30%' class='button'>";
if (e_PAGE == "admin_give_ribbon.php") 
{$text .= "<b><a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_give_ribbon.php'>>> Give Ribbon <<</a></b>";}
else
{$text .= "<a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_give_ribbon.php'>Give Ribbon</a>";}



$text .="
<tr><td style='width:30%' class='button'>";
if (e_PAGE == "admin_give_medal.php") 
{$text .= "<b><a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_give_medal.php'>>> Give Medal <<</a></b>";}
else
{$text .= "<a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_give_medal.php'>Give Medal</a>";}



$text .= "</td></tr><td style='width:30%' class='header'>-</b>";


$text .= "</td></tr>
<td style='width:30%' class='button'>";
if (e_PAGE == "admin_take_ribbon.php") 
{$text .= "<b><a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_take_ribbon.php'>>> Take Ribbon <<</a></b>";}
else
{$text .= "<a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_take_ribbon.php'>Take Ribbon</a>";}



$text .= "</td></tr>
<td style='width:30%' class='button'>";
if (e_PAGE == "admin_take_medal.php") 
{$text .= "<b><a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_take_medal.php'>>> Take Medal <<</a></b>";}
else
{$text .= "<a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_take_medal.php'>Take Medal</a>";}
		


$text .= "</td></tr><td style='width:30%' class='header'>-</b>";


$text .= "</td></tr>
<td style='width:30%' class='button'>";
if (e_PAGE == "admin_rib_request.php") 
{$text .= "<b><a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_rib_request.php'>>> View Ribbon Requests <<</a></b>";}
else
{$text .= "<a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_rib_request.php'>View Ribbon Requests</a>";}



$text .= "</td></tr>
<td style='width:30%' class='button'>";
if (e_PAGE == "admin_medal_request.php") 
{$text .= "<b><a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_medal_request.php'>>> View Medal Requests <<</a></b>";}
else
{$text .= "<a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_medal_request.php'>View Medal Requests</a>";}


$text .= "</td></tr><td style='width:30%' class='header'>-</b>";



$text .= "</td></tr>";
            


$ttl = "Administration";


//-----------------------------------------------------------------------------------------------------------+



$text .= "
<tr><td style='width:30%' class='button'>";
if (e_PAGE == "admin_vupdate.php") 
{$text .= "<b><a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_vupdate.php'>>> Check For Updates <<</a></b>";}
else
{$text .= "<a style='cursor:hand; cursor:pointer; text-decoration:none;' href='admin_vupdate.php'>Check For Updates</a>";}

$text .= "</td></tr>
<tr><td>
<center><br><br><br>
Donate To AACGC.
<form action='https://www.paypal.com/cgi-bin/webscr' method='post'>
<input type='hidden' name='cmd' value='_s-xclick'>
<input type='hidden' name='hosted_button_id' value='6506985'>
<input type='image' src='https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif' border='0' name='submit' alt='PayPal - The safer, easier way to pay online!'>
<img alt='' border='0' src='https://www.paypal.com/en_US/i/scr/pixel.gif' width='1' height='1'>
</form>
<br><br>
</td></tr>";

$text .= "<tr>
           <td style='width:30%' class='button'>
           <b><a style='cursor:hand; text-decoration:none' href='http://www.aacgc.com/SSGC/e107_plugins/faq/faq.php' target='_blank'>AACGC FAQs</a></b>
           </td>
           </tr>";


$text .= "<tr><td style='width:30%' class='header'>-</b></td></tr>";


$text .= "<tr>
           <td style='width:30%' class='button'>
           <b><a style='cursor:hand; text-decoration:none' href='http://www.aacgc.com/SSGC/e107_plugins/helpdesk3_menu/helpdesk.php' target='_blank'>AACGC HelpDesk</a></b>
           </td>
           </tr>
		   
</table>";

//-----------------------------------------------------------------------------------------------------







$ns -> tablerender("", $text);



?>
