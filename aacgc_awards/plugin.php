<?php


$eplug_name = "AACGC Awards";
$eplug_version = "1.0";
$eplug_author = "M@CH!N3";
$eplug_url = "http://www.aacgc.com";
$eplug_email = "admin@aacgc.com";
$eplug_description = "Give out Ribbons & Medals to your website/clan members! Adjust image sizes, font size, enable/disable features (forum display, profile display, request option) Menus included ( top ribbons, top medals, recent awarded) and adjustment on how many show in menus and menu titles.";
$eplug_compatible = "";
$eplug_readme = "";
$eplug_compliant = FALSE;
$eplug_module = FALSE;
$eplug_status = TRUE;
$eplug_latest = TRUE;


$eplug_folder      = "aacgc_awards";

$eplug_menu_name   = "AACGC Awards";

$eplug_conffile    = "admin_main.php";

$eplug_logo        = "logo.png";
$eplug_icon        = e_PLUGIN."aacgc_awards/images/icon_32.png";
$eplug_icon_small  = e_PLUGIN."aacgc_awards/images/icon_16.png";
$eplug_caption     = "AACGC Awards";  


$eplug_link      = TRUE;
$eplug_link_name = "Awards";
$eplug_link_url  = e_PLUGIN."aacgc_awards/Awards.php";

$eplug_table_names = array("advmedsys_medals", "advmedsys_medals2", "advmedsys_awarded", "advmedsys_awarded2", "advmedsys_medals_request", "advmedsys_medals2_request");

$eplug_tables = array(

"CREATE TABLE ".MPREFIX."advmedsys_medals(medal_id int(11) NOT NULL auto_increment,medal_name varchar(50) NOT NULL,medal_pic varchar(120) NOT NULL,medal_txt text NOT NULL,PRIMARY KEY  (medal_id)) ENGINE=MyISAM;",

"CREATE TABLE ".MPREFIX."advmedsys_awarded(awarded_id int(11) NOT NULL auto_increment,awarded_medal_id int(11) NOT NULL,awarded_user_id varchar(11) NOT NULL,awarded_date text NOT NULL,PRIMARY KEY  (awarded_id)) ENGINE=MyISAM;",

"CREATE TABLE ".MPREFIX."advmedsys_medals2(rib_id int(11) NOT NULL auto_increment,rib_name varchar(50) NOT NULL,rib_pic varchar(120) NOT NULL,rib_txt text NOT NULL,PRIMARY KEY  (rib_id)) ENGINE=MyISAM;",

"CREATE TABLE ".MPREFIX."advmedsys_awarded2(awarded_id int(11) NOT NULL auto_increment,awarded_rib_id int(11) NOT NULL,awarded_user_id varchar(11) NOT NULL,awarded_date text NOT NULL,PRIMARY KEY  (awarded_id)) ENGINE=MyISAM;",

"CREATE TABLE ".MPREFIX."advmedsys_medals_request(request_id int(11) NOT NULL auto_increment,user_name text NOT NULL,reason_wanted text NOT NULL,ribbon_wanted text NOT NULL,PRIMARY KEY  (request_id)) ENGINE=MyISAM;",

"CREATE TABLE ".MPREFIX."advmedsys_medals2_request(request_id int(11) NOT NULL auto_increment,user_name text NOT NULL,reason_wanted text NOT NULL,medal_wanted text NOT NULL,PRIMARY KEY  (request_id)) ENGINE=MyISAM;");

$eplug_prefs = array(
"armpage_title" => "Awards",
"rib_fsize" => "2",
"rib_img1"=> "80",
"rib_img2"=> "100",
"rib_fimg"=> "40",
"rib_ffsize" => "1",
"rib_userfsize" => "1",
"rib_userimg"=> "40",
"med_fsize"=> "2",
"med_img1"=> "80",
"med_img2"=> "100",
"med_ffsize"=> "2",
"med_fimg"=> "40",
"med_userfsize" => "1",
"med_userimg"=> "40",
"rib_fsizer"=> "1",
"rib_imgr"=> "40",
"med_fsizer"=> "1",
"med_imgr"=> "40",
"toprib_name"=> "Top 10 Ribbons Menu",
"topmed_name"=> "Top 10 Medals Menu",
"toprib_count"=> "10",
"topmed_count"=> "10",
"ribdet_count"=> "0",
"meddet_count"=> "0",
"rib_enable_forums"=> "1",
"med_enable_forums"=> "1",
"rib_enable_profiles"=> "1",
"med_enable_profiles"=> "1",
"rib_enable_request"=> "1",
"med_enable_request"=> "1",
"rib_enable_userlist"=> "0",
"med_enable_userlist"=> "0",
"rmmenu_title"=> "Total Ribbons & Medals Awarded Menu",
"rib_enable_userribbons"=> "0",
"med_enable_usermedals"=> "0",

);

$eplug_done = "Install Complete";
$eplug_upgrade_done = "Upgrade Complete";


$upgrade_table_names = "";
$upgrade_alter_tables = "";
$upgrade_remove_prefs = "";
$upgrade_add_prefs = "";

?>
