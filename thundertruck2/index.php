<?php

	 
	 ////////////////////////////////////////////////////////////////////////////////
	 $keys="49:1;50:2;51:3;52:4;53:5;54:6;55:7;56:8;57:9;13:10;48:10;109:11;107:12";   
	 
	 /////////////////////////
	 $use_logo=$conf['game_use_logo'];
    // $use_bg=$conf['game_use_bg'];
     $use_bg=0;
     $use_jacks=$conf['game_use_jacks'];
     $use_exit1=$conf['game_use_exit1'];
     $use_exit2=$conf['game_use_exit2'];
     $use_collect=$conf['game_use_collect'];
     $use_denom=$conf['game_use_denom'];
     $use_update=$conf['game_use_update'];
     $denom_mode=$conf['game_denom_mode'];
     $win_mode=$conf['game_win_mode'];
     $use_faststop=$conf['game_use_faststop'];
     $stretch_mode=$conf['game_stretch_mode'];
     $use_stretch=$conf['game_use_stretch'];
     $use_fullscreen=$conf['game_use_fullscreen'];
     $use_sound=$conf['game_use_sound'];
     $hide_buttons=$conf['game_hide_buttons'];
     $use_bonus_stop=$conf['game_use_bonus_stop'];
     $use_win_stop=$conf['game_use_win_stop'];
     $use_jack_stop=$conf['game_use_jack_stop'];
     $use_return_stop=$conf['game_use_return_stop'];
     $use_prize_stop=$conf['game_use_prize_stop'];
    // $bg_color=$conf['game_bg_color'];
$float_bet=$conf['float_bet'];
     $bg_color="000000";
	   if(!isset($_COOKIE['intro_wildwater'])){
	$_COOKIE['intro_wildwater']=0;	 
	 }
     $show_intro=$_COOKIE['intro_wildwater'];

	 
  if(!in_array ($status, $can_game)&& !isset($_REQUEST['log_id']))
	{
		$_SESSION['messages'][]=array('er',"Доступ к данной игре вам запрещён!");
    header("location: /");
    die();
	}
	else{
	
		$loger=false;

		
		//значения ставки возьмем из БД, если в БД нет такой опции, то установим значения по-умолчанию
		$bets=isset($conf['bets'])? $conf['bets']: '1,2,3,5,10,15,20,30,40,50,100';
		 
        
		  $ldr_name="index2.swf";
		

		 
		$dnm=rtrim($user_denomination, '0.');
		$param=$ldr_name."?game=$g_name&min=&user=real&CURDENOM=$bets&cur=$dnm&tpl=".THEME_URL;
		$param.="&keys=$keys&use_logo=$use_logo&float_bet=$float_bet&use_bg=$use_bg&use_exit1=$use_exit1&use_exit2=$use_exit2&stretch_mode=$stretch_mode";
		$param.="&use_denom=$use_denom&use_jacks=$use_jacks&use_update=$use_update&use_collect=$use_collect&use_fullscreen=$use_fullscreen";
		$param.="&win_mode=$win_mode&use_faststop=$use_faststop&use_stretch=$use_stretch&use_sound=$use_sound";
		$param.="&use_bonus_stop=$use_bonus_stop&use_win_stop= $use_win_stop&use_jack_stop=$use_jack_stop&hide_buttons=$hide_buttons";
		$param.="&use_return_stop=$use_return_stop&use_prize_stop=$use_prize_stop&denom_mode=$denom_mode&bg_color=$bg_color&show_intro=$show_intro";
    if ($loger)
      $param.="&loger=".$loger;
	  
	  
	 $path="";

	


if (!defined('GAME_NAME'))
    define('GAME_NAME',substr($ge,2));   

  if(isset($smarty))
    {
    $main_templ='game/game.tpl';
		//$smarty->template_dir=array(THEME_DIR.'/game');
		$smarty->assign('param', $param);
		$smarty->assign('path',$path);
    $smarty->assign('title',$ge);
    include_once (ENGINE_DIR."/view.php");
    }
  else
    {
    ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" style="height: 100%">
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=windows-1251" />

<title><?php print $title; ?></title>
</HEAD>
<body bgcolor="#231F20" leftMargin=0 rightMargin=0 bottomMargin=0 topMargin=0 marginheight="0" marginwidth="0" style="height: 100%"> 

<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,18,0" width="100%" height="100%" id="test" align="middle">
<param name="allowFullScreen" value="true" />
<param name="movie" value="<?=$param;?>" />
<param name="bgcolor" value="#231F20" />
<embed src="<?=$param;?>" allowFullScreen="true" bgcolor="#000000" width="100%" height="100%"name="game" align="middle" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
</BODY></HTML>
<?php 
    }  
		
 } ?>