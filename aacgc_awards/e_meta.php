<?php

if (e_PAGE == "forum_viewtopic.php") {
	require_once(e_PLUGIN."forum/templates/forum_viewtopic_template.php");
	$forum_old = "{POSTS}";
	$forum_new = "{POSTS}{AWARDSFORUM}";
	$FORUMTHREADSTYLE = str_replace($forum_old, $forum_new, $FORUMTHREADSTYLE);
	$FORUMREPLYSTYLE = str_replace($forum_old, $forum_new, $FORUMREPLYSTYLE);
}


if (e_PAGE == "user.php") {

	require_once(e_THEME."/templates/user_template.php");

	$user_old = "{USER_SIGNATURE}";
	$user_new = "{AWARDSPROFILE} {USER_SIGNATURE}";
	
$USER_FULL_TEMPLATE = str_replace($user_old, $user_new, $USER_FULL_TEMPLATE);

}



?>