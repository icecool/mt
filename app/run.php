<?php
$pages=array(
    'home'=>'home',
    'user'=>'user',
    'admin'=>'admin',
    'about'=>'about',
    'about_opendata'=>'about_opendata',
    'team'=>'team',
    );
\CORE\UI::init()->set_pages($pages);
\CORE::init()->set_modules(array(
	'frm'=>1,
	'stat'=>1,
	'map'=>1,
	'vs'=>1,
	'od'=>1,
	'apps'=>1,
	));
$UMENU = new \APP\WIDGETS\UMENU;
$UMENU->show();