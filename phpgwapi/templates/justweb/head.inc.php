<?php
  /**************************************************************************\
  * phpGroupWare                                                             *
  * http://www.phpgroupware.org                                              *
  * --------------------------------------------                             *
  *  This program is free software; you can redistribute it and/or modify it *
  *  under the terms of the GNU General Public License as published by the   *
  *  Free Software Foundation; either version 2 of the License, or (at your  *
  *  option) any later version.                                              *
  \**************************************************************************/

  /* $Id$ */

	if($GLOBALS['menuaction'] && is_array($GLOBALS['obj']->public_functions) && $GLOBALS['obj']->public_functions['css'])
	{
		eval("\$app_css = \$GLOBALS['obj']->css();");
	}
	else
	{
		$app_css = '';
	}

	$bodyheader = 'BGCOLOR="'.$GLOBALS['phpgw_info']['theme']['bg_color'].'"';
	if ($GLOBALS['phpgw_info']['server']['htmlcompliant'])
	{
		$bodyheader .= ' BGCOLOR="'.$GLOBALS['phpgw_info']['theme']['bg_color'].'" ALINK="'.$GLOBALS['phpgw_info']['theme']['alink'].'" LINK="'.$GLOBALS['phpgw_info']['theme']['link'].'" VLINK="'.$GLOBALS['phpgw_info']['theme']['vlink'].'"';
	}

	$tpl = CreateObject('phpgwapi.Template',PHPGW_TEMPLATE_DIR);
	$tpl->set_unknowns('remove');
	$tpl->set_file(array('head' => 'head.tpl'));

	$var = Array (
		'webserver_url'	=> $GLOBALS['phpgw_info']['server']['sebserver_url'],
		'home'		=> $GLOBALS['phpgw']->link('/index.php'),
		'appt'		=> $GLOBALS['phpgw']->link('/index.php',Array('menuaction'=>'calendar.uicalendar.day')),
		'todo'		=> $GLOBALS['phpgw']->link('/index.php,Array('menuaction'=>'todo.uitodo.add')),
		'prefs'		=> $GLOBALS['phpgw']->link('/preferences/index.php'),
		'email'		=> $GLOBALS['phpgw']->link('/email/preferences.php'),
		'calendar'		=> $GLOBALS['phpgw']->link('/index.php',Array('menuaction'=>'calender.uicalendar.preferences')),
		'addressbook'	=> $GLOBALS['phpgw']->link('/index.php',Array('menuaction'=>'addressbook.uiaddressbook.preferences')),
		'charset'		=> lang('charset'),
		'font_family'	=> $GLOBALS['phpgw_info']['theme']['font'],
		'website_title'	=> $GLOBALS['phpgw_info']['server']['site_title'],
		'body_tags'		=> $bodyheader,
		'app_css'		=> $app_css
	);
	$tpl->set_var($var);
	$tpl->pfp('out','head');
	unset($tpl);
?>
