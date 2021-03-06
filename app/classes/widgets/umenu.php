<?php
namespace APP\WIDGETS;

class LANGUAGE {
	public static function SWITCHER($user=false){
		$lang=\CORE::init()->lang;
		$result='';
		if($user){

			if($lang=='ru'){
				$result='<ul class="nav navbar-nav">
				<li class="dropdown">
	              <a href="#" title="Русский" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <small><i class="langflag langflag-ru"></i></small>&nbsp; Русский
	              <span class="caret"></span></a>
	              <ul class="dropdown-menu">
	                <li>
	                	<a href="./?lang=tj" class="change_language" rel="tj">
	                		<small><i class="langflag langflag-tj"></i></small>&nbsp; Тоҷикӣ
	                	</a>
	                </li>
	              </ul>
	            </li>
		    </ul>
	        ';
			} else {
				$result='<ul class="nav navbar-nav">
				<li class="dropdown">
	              <a href="#" title="Тоҷикӣ" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <small><i class="langflag langflag-tj"></i></small>&nbsp; Тоҷикӣ
	              <span class="caret"></span></a>
	              <ul class="dropdown-menu">
	                <li>
	                	<a href="./?lang=ru" class="change_language" rel="ru">
	                		<small><i class="langflag langflag-ru"></i></small>&nbsp; Русский
	                	</a>
	                </li>
	              </ul>
	            </li>
		    </ul>
	        ';
			}

		} else {

			if($lang=='ru'){
				$result='<div class="form-group">
	            <div class="dropdown">
	              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
	                <i class="langflag langflag-ru"></i>&nbsp;<small>Русский</small>
	                <span class="caret"></span>
	              </button>
	              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
	                    <li role="usermenu">
	                        <a role="menuitem" tabindex="-1" href="./?lang=tj" class="change_language" rel="tj">
	                        <i class="langflag langflag-tj"></i>&nbsp;<small>Тоҷикӣ</small>
	                        </a>
	                    </li>                    
	              </ul>
	            </div>
	        </div>
	        ';
			} else {
				$result='<div class="form-group">
	            <div class="dropdown">
	              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
	                <i class="langflag langflag-tj"></i>&nbsp;<small>Тоҷикӣ</small>
	                <span class="caret"></span>
	              </button>
	              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
	                    <li role="usermenu">
	                        <a role="menuitem" tabindex="-1" href="./?lang=ru" class="change_language" rel="ru">
	                        <i class="langflag langflag-ru"></i>&nbsp;<small>Русский</small>
	                        </a>
	                    </li>                    
	              </ul>
	            </div>
	        </div>
	        ';
			}

		}
		return $result;
	}
}

class UMENU {
	public function show(){
		\CORE::msg('debug','umenu');
		$UI=\CORE\UI::init();
		$USER=\USER::init();
		$UI->pos['js'].='<script>
$(document).ready(function() {

	function change_language(xlang){
		$.post("./?lang="+xlang, function(){
			location.reload();
		});
	}  

	$("a.change_language").click(function(e){
		e.preventDefault();
		var xlang = $(this).attr("rel");
		change_language(xlang);
	});

});
</script>
';

		if($USER->auth()){
			// authorized users
			$UI->pos['mainmenu'].='
            <li><a href="./?c=map">'.\CORE::t('map','Map').'</a></li>
	        <li><a href="./?c=vs">'.\CORE::t('dvs','Visualization').'</a></li>
            <li><a href="./?c=od">'.\CORE::t('opendata','Open Data').'</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              '.\CORE::t('apps','Applications').' <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="./?c=apps">'.\CORE::t('app_frm','Registration form').'</a></li>
                <li><a href="./?c=apps&act=status">'.\CORE::t('status_check','Status check').'</a></li>
              </ul>
            </li>
			<li><a href="./?c=page&act=about">'.\CORE::t('about_project','About the project').'</a></li>
			';
			$UI->pos['user1'].='
			<ul class="nav navbar-nav">
				'.LANGUAGE::SWITCHER(true).'
				<li class="dropdown">
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
				  <small><i class="glyphicon glyphicon-cog"></i>&nbsp;</small>
				  '.$USER->get('username').'
	              <span class="caret"></span></a>
	              <ul class="dropdown-menu">
	                <!--<li>
	                	<a href="./?c=user&act=profile">
	                		<small><i class="glyphicon glyphicon-user"></i>&nbsp;</small> 
				    		<span class="text">'.\CORE::t('profile','Profile').'</span>
	                	</a>
	                </li>-->
	                <!--<li>
	                	<a href="./?c=user&act=change_password">
	                		<small><i class="glyphicon glyphicon-pencil"></i>&nbsp;</small> 
				    		<span class="text">'.\CORE::t('change_password','Change password').'</span>
	                	</a>
	                </li>
	                -->
	                <li class="divider"></li>
	                <li>
	                	<a href="./?c=user&act=logout">
	                		<small><i class="glyphicon glyphicon-off"></i>&nbsp;</small> 
				    		<span class="text">'.\CORE::t('logout','Logout').'</span>
	                	</a>
	                </li>
	              </ul>
	            </li>
		    </ul>
			';
		} else {
			// guests
			$UI->pos['mainmenu'].='
	        <li><a href="./?c=map">'.\CORE::t('map','Map').'</a></li>
	        <li><a href="./?c=vs">'.\CORE::t('dvs','Visualization').'</a></li>
			<li><a href="./?c=od">'.\CORE::t('opendata','Open Data').'</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              '.\CORE::t('apps','Applications').' <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="./?c=apps">'.\CORE::t('app_frm','Application form').'</a></li>
                <li><a href="./?c=apps&act=status">'.\CORE::t('status_check','Status check').'</a></li>
              </ul>
            </li>
            <li><a href="./?c=page&act=about">'.\CORE::t('about_project','About the project').'</a></li>
			';
			$UI->pos['user1'].='<form action="./?c=user&act=login" method="post" class="navbar-form">
			'.LANGUAGE::SWITCHER();
			$UI->pos['user1'].='<div class="form-group">
					<input type="text" name="login" placeholder="'.\CORE::t('user','User').'" value="'.\COOKIE::get('lastuser').'" class="form-control" style="width:150px;">
				</div>
				<div class="form-group">
					<input type="password" name="password" placeholder="'.\CORE::t('password','Password').'" class="form-control" style="width:150px;">
				</div>
				<button type="submit" class="btn btn-warning">'.\CORE::t('signin','SignIn').'</button>
			';
			$UI->pos['user1'].='</form>
			';
		}		
	}
}