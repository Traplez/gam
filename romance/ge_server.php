<?php
	include_once '../../../engine/cfg.php';
	include_once '../../../engine/ini.php';
	include_once 'reels.php';
 if(!in_array ($status, $can_game,1))
    die();
	
	function winlimit($type)
	{
	global $user_id;
	   $bank=get_bank($user_id,'romance',$type);
	    return $bank;
	}
	
	$userId=$user_id;
	$user_array['login'] = $login;

	$action = isset($_POST['action']) ? $_POST['action'] : 'error';
	$action = str_replace("-","", $action);
	$action = str_replace("`","", $action);
	$action = str_replace("'","", $action);
	
	
	if($action=="show_intro"){
	
	
	setcookie("intro_romance", $_POST['show_intro'],time() + 86400);
	
	
	
	}
	
	
	
    $wild=14;
	$scatter=13;
	$user_balance = floor_format( get_balance($userId) );

	if ($action != 'error')
	{
		$bet = isset($_POST['bet']) ? $_POST['bet'] : 0;
		$line = isset($_POST['lines']) ? $_POST['lines'] : 0;
		$allbet = $bet * $line;
	$_POST['betline']=$_POST['bet'];
	
		if ( $user_balance < 0 )
		{
		    $errorMessage = "error|Ошибка! Ваш баланс ($user_balance) недостаточен для игры";
		    $action = 'error';
		}
		elseif ( $action !='state' && ($bet < 0.01 || 10000 < $bet) )
		{
		    $action = "error";
			$errorMessage = "error|Ошибка! Ваша ставка ($bet) должна быть от 0.01 до 10000";
		}
		elseif ( ($action != 'state') && ($action != 'double') && ($line>30 || $line<0) ) 
		{
		    $action = "error";
			$errorMessage = "error|Ошибка! Выбранное вами количество линий игры ($line) должно быть 20";
		}
		elseif ( ($action == 'spin') && ($user_balance < $allbet ) )
		{
		    $action = "error";
			$errorMessage = "error|Ошибка! Ваш баланс ($user_balance) недостаточен для игры по сделанной ставке ($allbet)";
		}
		
		elseif (($action == 'finish') && !isset($_SESSION['romance_win']))
		{
			$action = 'error';
			$errorMessage = 'error|Ошибка - finish! Попытка повлиять на игру. Ваш аккаунт блокирован';
			block_user($userId);
		}
		elseif (!in_array($action, array('error', 'state', 'spin', 'double', 'freegame', 'finish')))
		{
			$action = 'error';
			$errorMessage = 'error|Ошибка! Попытка повлиять на игру. Ваш аккаунт блокирован';
			block_user($userId);
		}
	}
	
	/*    Error   */
	if ( $action == "error" )
	{
	    $msg= isset($errorMessage) ? $errorMessage : 'error|Ошибка! Неверное действие';
	    ge_serv_show_str($msg);
	}
	
	/*    Init    */
	if ( $action == "state" )
	{
	    ge_serv_show_str( "result=ok&state=0&min=1&id=$user_array[login]&balance=$user_balance");
		if (isset($_SESSION['romance_win']))
			unset($_SESSION['romance_win']);
		if (isset($_SESSION['romance_freeGameCount']))
			unset($_SESSION['romance_freeGameCount']);
		if (isset($_SESSION['romance_d']))
			unset($_SESSION['romance_d']);
			
			if (isset($_SESSION['microbank']))
			unset($_SESSION['microbank']);
			
			$_SESSION['microbank']=0;
	}

	
	/*    Spin   */
	if ( $action == "spin" )
	{
	    $stat_txt = "romance";
		
	    $win1 = 0;
	    $win2 = 0;
	    $win3 = 0;
	    $win4 = 0;
	    $win5 = 0;
	    $win6 = 0;
	    $win7 = 0;
	    $win8 = 0;
	    $win9 = 0;
	    $winall = 0;

	    cange_balance($userId, $allbet*-1);
	    $rowb9 = get_game_settings('romance');
	    $proc4 = $rowb9['g_proc'];
	    $allbet23 = $allbet / 100 * $proc4;
	   change_bank($user_id,'romance',$allbet23,"spin");
	$pr30_shans=rand(1,3);
	$_SESSION['microbank']+=$allbet23;
	    $g_rezim = 5;

	    
		
	    $psym[1] = array( 0, 0, 0, 5,  15, 100 );       
	    $psym[2] = array( 0, 0, 0, 7,  20, 125);       
	    $psym[3] = array( 0, 0, 0, 10,  25, 125 );       
	    $psym[4] = array( 0, 0, 0, 10,  25, 150 );       
	    $psym[5] = array( 0, 0, 0, 10,  25, 150 );       
	    $psym[6] = array( 0, 0, 0, 15,  60, 200  );       
	    $psym[7] = array( 0, 0, 0, 15,  60, 250 );       
	    $psym[8] = array( 0, 0, 0, 15,  60, 300 );       
	    $psym[9] = array( 0, 0, 0, 20,  80, 350 );       
	    $psym[10] = array( 0, 0, 0, 20,  80, 400 );       
	    $psym[11] = array( 0, 0, 0, 30,  100, 450 );       
	    $psym[12] = array( 0, 0, 0, 30,  100, 500 );       
	    $psym[13] = array( 0, 0, 30, 60, 600, 6000 );       
	    $psym[14] = array( 0, 0, 0, 100,  250, 1000 );       
	 
		 
	
		
	   
	 
$lin[0]=array(2,5,8,11,14);
$lin[1]=array(1,4,7,10,13);
$lin[2]=array(3,6,9,12,15);
$lin[3]=array(1,5,9,11,13);
$lin[4]=array(3,5,7,11,15);
$lin[5]=array(2,4,7,10,14);
$lin[6]=array(2,6,9,12,14);
$lin[7]=array(1,4,8,12,15);
$lin[8]=array(3,6,8,10,13);
$lin[9]=array(2,6,8,10,14);
$lin[10]=array(2,4,8,12,14);
$lin[11]=array(1,5,8,11,13);
$lin[12]=array(3,5,8,11,15);
$lin[13]=array(2,5,7,11,13);
$lin[14]=array(3,5,9,11,15);
$lin[15]=array(2,5,7,11,14);
$lin[16]=array(2,5,9,11,14);
$lin[17]=array(1,4,9,10,13);
$lin[18]=array(3,6,7,12,15);
$lin[19]=array(1,6,9,12,13);		
			


			
		
		  /////////////////////////////////////game_setting
		$rnd_bonus=0;
	    $rnd_result =0;
		$gset=spin("spin",$bet,$line);
		if($gset['type']=="bon"){
	    $rnd_bonus =1;
		}
		if($gset['type']=="win"){
		$rnd_result =1;
		} 
		$casbank = $gset['sum']; 
		
		////////////////////////////////////game_setting
		
		$minwin=($casbank/100)*10;
		
	    if ($rnd_result == 1)
	        $mas_win = 1; 
	    else
	        $mas_win = 0;

		
		if ( ($mas_win == 1) && ($casbank < $bet*5) )
			$mas_win = 0;
	
if ( ($rnd_bonus == 1) && ($casbank < $psym[13][3]*$allbet) ){
			$rnd_bonus = 0;
}

	
	    $am = 0;
	$lc=0;
	
	
	if($minwin>100){
	$minwin=100;	
	}
	
	
	///////////////////////////
	    while ( $am < 100000 )
	    {
	        $map_win = array( 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0 );
			
			
	        $mx2=GetRows(false);

			$anim_sym=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
			
	        for ( $k = 0; $k <= 14; ++$k ){
	            $map[$k] = $mx2[$k];
				$anim_sym[$k]=0;
			}
			
			$winString=array("none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none",
			"none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none");
			$scatter_win=0;
			
			
			
			if($rnd_bonus==1 ){
	
	        $reels=array(0,1,2,3,4);
			shuffle($reels);
	        $sccnt=rand(3,5);
	      $_SESSION['romance_mpl']=1;
	      $_SESSION['romance_isFree']=1;
	
	        for($i=0; $i<$sccnt;$i++){

			$map[($reels[$i]*3)+rand(0,2)]=13;

            }			
	        
	        $scatter_win=$allbet*$psym[13][$sccnt];
	        }else{
			$_SESSION['romance_mpl']=0;	
			$_SESSION['romance_isFree']=0;
			}
			
			$rndd=rand(1,8);
			if($rndd==1 && $rnd_bonus!=1){
			$reels=array(0,1,2,3,4);	
			shuffle($reels);
			 $sccnt=rand(1,2);
	        for($i=0; $i<$sccnt;$i++){

			$map[($reels[$i]*3)+rand(0,2)]=13;

            }	
			$scatter_win=$psym[13][$sccnt]*$allbet;
			}
			
			
			
			for($i=1; $i<=14; $i++){
			
			$s1=0;
			$s2=0;
			$s3=0;
			$s4=0;
			$s5=0;
			
			$dbl=1;
			
			if($i==13){
				
            continue;			
			
			}
			
            $anim_sym_tmp=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
for($j=0; $j<=2; $j++){
				
            if($map[$j]==$i || $map[$j]==$wild){
			
			if($map[$j]==$wild){$dbl=2;}
			
			$s1=1;
			$anim_sym_tmp[$j]=1;
			} 
				
			}
			
			//////////////////////////////////////
			
			for($j=3; $j<=5; $j++){
				
            if($map[$j]==$i || $map[$j]==$wild){
			if($map[$j]==$wild){$dbl=2;}
			$s2=1;
			$anim_sym_tmp[$j]=1;
			} 
				
			}
			
			//////////////////////////////////////
			
			
			for($j=6; $j<=8; $j++){
				
            if($map[$j]==$i || $map[$j]==$wild){
			if($map[$j]==$wild){$dbl=2;}
			$s3=1;
			if($s1==1 && $s2==1  ){
			$anim_sym_tmp[$j]=1;
			}
			} 
				
			}
			
			//////////////////////////////////////
			for($j=9; $j<=11; $j++){
				
            if($map[$j]==$i || $map[$j]==$wild){
			if($map[$j]==$wild){$dbl=2;}
			$s4=1;
			if($s1==1 && $s2==1 && $s3==1  ){
			$anim_sym_tmp[$j]=1;
			}
			} 
				
			}
			
			//////////////////////////////////////
			for($j=12; $j<=14; $j++){
				
            if($map[$j]==$i || $map[$j]==$wild){
			if($map[$j]==$wild){$dbl=2;}
			$s5=1;
			
			
			if($s1==1 && $s2==1 && $s3==1 && $s4==1 ){
			$anim_sym_tmp[$j]=1;
			}
			
			} 
				
			}
			//////////////////////////////////////
			
			
			if($s1==1 && $s2==1){
			$map_win[$i]=$psym[$i][2]*$dbl;	
			}
			
			if($s1==1 && $s2==1 && $s3==1){
			$map_win[$i]=$psym[$i][3]*$dbl;	
			}
			
			if($s1==1 && $s2==1 && $s3==1 && $s4==1){
			$map_win[$i]=$psym[$i][4]*$dbl;	
			}
			
			if($s1==1 && $s2==1 && $s3==1 && $s4==1 && $s5==1){
			$map_win[$i]=$psym[$i][5]*$dbl;	
			}
			
			//////////////////////////////////////////////////////
			if($map_win[$i]>0){
			
            for($j=0; $j<15; $j++){
			
			if($anim_sym[$j]!=$anim_sym_tmp[$j]){
			$anim_sym[$j]=1;	
			}
				
			}

			
			}
			/////////////////////////////////////////
			
			
			
			}
			
			
			
	        for ( $k = 1; $k <= 15; ++$k )
	        {
	            ${ "sym".$k } = $map[$k - 1];
	        }
            for ( $k = 1; $k <= 20; ++$k )
	        {
	            ${ "win".$k } = 0;
	        }
			
			$winall=0;
			
	        for ( $k = 1; $k <= 14; ++$k )
	        {
	            ${ "win".$k } = $bet * $map_win[$k];
				$winall+=${ "win".$k };
	        }
			
	      $winall+=$scatter_win;
	        
		
	        ++$am;
	
			
			if ( $mas_win == 1 && $winall == 0 )
	        {
	            $am = 10;
	        }
			if ( $mas_win == 1 && 0 < $winall && $winall>$minwin )
	        {
	            $am = 120000;
	        }
	        if ( $mas_win == 0 && $winall == 0 )
	        {
	            $am = 120000;
	        }
	      
	
	if($rnd_bonus==1){
	
	$am = 120000;
	
	}
	
	if ( $casbank < $winall)
	        {
	            $am = 10;
	        }

	
		
		  
			
			
			
			
					
	if($lc>=1000){
	$mas_win=0;
     $rnd_bonus=0;  
       $pr30_shans=0;   
	}
	$lc++;
	////////////////////////////////////////////////////
	if($am>=120000 && $winall>0){
	
	  
			$bank_result=change_bank($user_id,'romance',$winall*-1,"spin");
			
			
			if($bank_result===false || $bank_result<0){
			
			$mas_win=0;
        $rnd_bonus=0;
        $pr30_shans=0;
		$am=10;
			}
	
	}
	//////////////////////////////////////////////////
	    }
		
		$winall44 = sprintf( "%01.2f", $winall );
		if ( 0 < $winall )
		{
			cange_balance($userId, $winall44);
	       
	$_SESSION['microbank']-=$winall44;
			$_SESSION['romance_win'] = $winall;
		}
		
		$user_balance = floor_format( get_balance($userId) );

$anim_sym_str=implode("|",$anim_sym);
		ge_serv_show_str( "result=ok&anim_sym_str=|$anim_sym_str&info=|$sym1|$sym2|$sym3|$sym4|$sym5|$sym6|$sym7|$sym8|$sym9|$sym10|$sym11|$sym12|$sym13|$sym14|$sym15|". 
    "$bet|$line|$allbet|$winall|0|$allbet|$winall|0|1|0&id=$user_array[login]&balance=$user_balance&scatter_win=$scatter_win");

   	set_stat_game($userId, $user_balance, $allbet,$winall44,$stat_txt);
	}
/*    Freegame   */
	if ( $action == "freegame" )
	{
	    $stat_txt = "romance_free";
		
	    $win1 = 0;
	    $win2 = 0;
	    $win3 = 0;
	    $win4 = 0;
	    $win5 = 0;
	    $win6 = 0;
	    $win7 = 0;
	    $win8 = 0;
	    $win9 = 0;
	    $winall = 0;

	  
	    $rowb9 = get_game_settings('romance');
	    $proc4 = $rowb9['g_proc'];
	    $allbet23 = $allbet / 100 * $proc4;
	 
	$pr30_shans=rand(1,3);
	$_SESSION['microbank']+=$allbet23;
	    $g_rezim = 5;

	    
		
	 
	   
	 
	    $psym[1] = array( 0, 0, 0, 5,  15, 100 );       
	    $psym[2] = array( 0, 0, 0, 7,  20, 125);       
	    $psym[3] = array( 0, 0, 0, 10,  25, 125 );       
	    $psym[4] = array( 0, 0, 0, 10,  25, 150 );       
	    $psym[5] = array( 0, 0, 0, 10,  25, 150 );       
	    $psym[6] = array( 0, 0, 0, 15,  60, 200  );       
	    $psym[7] = array( 0, 0, 0, 15,  60, 250 );       
	    $psym[8] = array( 0, 0, 0, 15,  60, 300 );       
	    $psym[9] = array( 0, 0, 0, 20,  80, 350 );       
	    $psym[10] = array( 0, 0, 0, 20,  80, 400 );       
	    $psym[11] = array( 0, 0, 0, 30,  100, 450 );       
	    $psym[12] = array( 0, 0, 0, 30,  100, 500 );       
	    $psym[13] = array( 0, 0, 30, 60, 600, 6000 );       
	    $psym[14] = array( 0, 0, 0, 100,  250, 1000 );       
	 
		 
	
		
	
		
	   
	 
$lin[0]=array(2,5,8,11,14);
$lin[1]=array(1,4,7,10,13);
$lin[2]=array(3,6,9,12,15);
$lin[3]=array(1,5,9,11,13);
$lin[4]=array(3,5,7,11,15);
$lin[5]=array(1,4,8,10,13);
$lin[6]=array(3,6,8,12,15);
$lin[7]=array(2,6,9,12,14);
$lin[8]=array(2,4,7,10,14);
$lin[9]=array(2,4,8,10,14);
$lin[10]=array(2,6,8,12,14);
$lin[11]=array(1,5,7,11,13);
$lin[12]=array(3,5,9,11,15);
$lin[13]=array(2,5,7,11,14);
$lin[14]=array(2,5,9,11,14);
$lin[15]=array(1,5,8,11,13);
$lin[16]=array(3,5,8,11,15);
$lin[17]=array(1,6,7,12,13);
$lin[18]=array(3,4,9,10,15);
$lin[19]=array(1,6,9,12,13);		
			
	   
		
		  /////////////////////////////////////game_setting
		
		$rnd_result =rand(1,3);
		
		$casbank = winlimit("bonus"); 
		
		////////////////////////////////////game_setting
		
		$minwin=0;
		
	    if ($rnd_result == 1)
	        $mas_win = 1; 
	    else
	        $mas_win = 0;

		
		if ( ($mas_win == 1) && ($casbank < $bet*5) )
			$mas_win = 0;
	

	    $am = 0;
	$lc=0;
	
	if($_SESSION['romance_isFree']==1){
		
	$_SESSION['romance_isFree']=0;	
	$_SESSION['romance_freeMode']=$_POST['freeMode'];	
	
	if($_POST['freeMode']==3){
	$_SESSION['romance_mpl']=5;		
	}else if($_POST['freeMode']==1){
	$_SESSION['romance_mpl']=2;		
	}else {
	$_SESSION['romance_mpl']=1;		
	}
	
	
		
	}
	
	if($rnd_bonus==1){
	
	$bonus=rand(1,3);
	
	}else{
	
	$bonus=0;
	
	}
	
	    while ( $am < 100000 )
	    {
	        $map_win = array( 0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0, 0 );
			
			
	        $mx2=GetRows2(false);

			$anim_sym=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
			
	        for ( $k = 0; $k <= 14; ++$k ){
	            $map[$k] = $mx2[$k];
				$anim_sym[$k]=0;
			}
			
			$winString=array("none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none",
			"none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none","none");
			$scatter_win=0;
			
			if($rnd_bonus==1 ){
	
	        $reels=array(0,1,2,3,4);
			shuffle($reels);
	        $sccnt=rand(3,5);
	
	
	        for($i=0; $i<=$sccnt;$i++){

			$map[($reels[$i]*3)+rand(0,2)]=13;

            }			
	        
	        $scatter_win=$allbet*$psym[13][$sccnt];
	        }
			
			
			for($i=1; $i<=14; $i++){
			
			$s1=0;
			$s2=0;
			$s3=0;
			$s4=0;
			$s5=0;
			
			$dbl=1;
			
			if($i==13){
				
            continue;			
			
			}
			
            $anim_sym_tmp=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
for($j=0; $j<=2; $j++){
				
            if($map[$j]==$i || $map[$j]==$wild){
			
			if($map[$j]==$wild){$dbl=2;}
			
			$s1=1;
			$anim_sym_tmp[$j]=1;
			} 
				
			}
			
			//////////////////////////////////////
			
			for($j=3; $j<=5; $j++){
				
            if($map[$j]==$i || $map[$j]==$wild){
			if($map[$j]==$wild){$dbl=2;}
			$s2=1;
			$anim_sym_tmp[$j]=1;
			} 
				
			}
			
			//////////////////////////////////////
			
			
			for($j=6; $j<=8; $j++){
				
            if($map[$j]==$i || $map[$j]==$wild){
			if($map[$j]==$wild){$dbl=2;}
			$s3=1;
			if($s1==1 && $s2==1  ){
			$anim_sym_tmp[$j]=1;
			}
			} 
				
			}
			
			//////////////////////////////////////
			for($j=9; $j<=11; $j++){
				
            if($map[$j]==$i || $map[$j]==$wild){
			if($map[$j]==$wild){$dbl=2;}
			$s4=1;
			if($s1==1 && $s2==1 && $s3==1  ){
			$anim_sym_tmp[$j]=1;
			}
			} 
				
			}
			
			//////////////////////////////////////
			for($j=12; $j<=14; $j++){
				
            if($map[$j]==$i || $map[$j]==$wild){
			if($map[$j]==$wild){$dbl=2;}
			$s5=1;
			
			
			if($s1==1 && $s2==1 && $s3==1 && $s4==1 ){
			$anim_sym_tmp[$j]=1;
			}
			
			} 
				
			}
			//////////////////////////////////////
			
			
			if($s1==1 && $s2==1){
			$map_win[$i]=$psym[$i][2]*$dbl;	
			}
			
			if($s1==1 && $s2==1 && $s3==1){
			$map_win[$i]=$psym[$i][3]*$dbl;	
			}
			
			if($s1==1 && $s2==1 && $s3==1 && $s4==1){
			$map_win[$i]=$psym[$i][4]*$dbl;	
			}
			
			if($s1==1 && $s2==1 && $s3==1 && $s4==1 && $s5==1){
			$map_win[$i]=$psym[$i][5]*$dbl;	
			}
			
			//////////////////////////////////////////////////////
			if($map_win[$i]>0){
			
            for($j=0; $j<15; $j++){
			
			if($anim_sym[$j]!=$anim_sym_tmp[$j]){
			$anim_sym[$j]=1;	
			}
				
			}

			
			}
			/////////////////////////////////////////
			
			
			
			}
			
			$currentMpl=$_SESSION['romance_mpl'];
			
	        for ( $k = 1; $k <= 15; ++$k )
	        {
	            ${ "sym".$k } = $map[$k - 1];
	        }
            for ( $k = 1; $k <= 20; ++$k )
	        {
	            ${ "win".$k } = 0;
	        }
			
			$winall=0;
			
	        for ( $k = 1; $k <= 14; ++$k )
	        {
	            ${ "win".$k } = $bet * $map_win[$k]*$currentMpl;
				$winall+=${ "win".$k };
	        }
			
	      
		  if($winall>0 && $_SESSION['romance_freeMode']==1){
			
		$_SESSION['romance_mpl']++;	
			
           if($_SESSION['romance_mpl']>5){
	      $_SESSION['romance_mpl']=5;
           }
			
		  }else  if($winall<=0 && $_SESSION['romance_freeMode']==1){
			 $_SESSION['romance_mpl']=2;  
		  }
		  
		
	        ++$am;
	
			
			if ( $mas_win == 1 && $winall == 0 )
	        {
	            $am = 10;
	        }
			if ( $mas_win == 1 && 0 < $winall && $winall>$minwin )
	        {
	            $am = 120000;
	        }
	        if ( $mas_win == 0 && $winall == 0 )
	        {
	            $am = 120000;
	        }
	      
	
	if ( $casbank < $winall)
	        {
	            $am = 10;
	        }

	
		
		  
			
			
			
			
					
	if($lc>=1000){
	$mas_win=0;
       
       $pr30_shans=0;   
	}
	$lc++;
	////////////////////////////////////////////////////
	if($am>=120000 && $winall>0){
	
	  
			$bank_result=change_bank($user_id,'romance',$winall*-1,"bonus");
			
			
			if($bank_result===false || $bank_result<0){
			
			$mas_win=0;
        $rnd_bonus=0;
        $pr30_shans=0;
		$am=10;
			}
	
	}
	//////////////////////////////////////////////////
	    }
		
		$winall44 = sprintf( "%01.2f", $winall );
		if ( 0 < $winall )
		{
			cange_balance($userId, $winall44);
	       
	$_SESSION['microbank']-=$winall44;
			$_SESSION['romance_win'] = $winall;
		}
		
		$user_balance = floor_format( get_balance($userId) );
$ws=implode(":",$winString);
	
$anim_sym_str=implode("|",$anim_sym);
		ge_serv_show_str( "result=ok&anim_sym_str=|$anim_sym_str&info=|$sym1|$sym2|$sym3|$sym4|$sym5|$sym6|$sym7|$sym8|$sym9|$sym10|$sym11|$sym12|$sym13|$sym14|$sym15|". 
    "$bet|$line|$allbet|$winall|0|$allbet|$winall|0|1|0&id=$user_array[login]&balance=$user_balance&scatter_win=$scatter_win&curMpl=".$_SESSION['romance_mpl']);

   	set_stat_game($userId, $user_balance, $allbet,$winall44,$stat_txt);
	}
		
	
/*   Риск-игра  */
	if ( $action == "double" )
	{
		$doubleMode=$_POST['dmode'];
		
		if (!isset($_SESSION['romance_win']))
		{
			ge_serv_show_str( 'error|Ошибка! Попытка повлиять на игру. Ваш аккаунт блокирован');
			block_user($userId);
		}
		else
		{
		    $d = isset($_SESSION['romance_d']) ? $_SESSION['romance_d'] + 1 : 1;
			$_SESSION['romance_d'] = $d;
			$winall = $_SESSION['romance_win'];
			$betBegin = $winall; cange_balance($userId, $winall*-1);
			
			$bet = isset($_POST['bet']) ? $_POST['bet'] : 0;
			$winall44 = sprintf( "%01.2f", $winall );
		 
		$double_bank_sum=$winall; 
		 
		$_SESSION['microbank']+=$winall44;

			$row_bon=get_game_settings('romance');
			$g_shansdouble=$row_bon['g_rezerv'];
			
			
			if($dmode==2){
			$shans = rand( 1, $g_shansdouble );	
			}else{
			$shans = rand( 1, $g_shansdouble );	
			}
			
			if ( $shans == 1 )
				
			if($dmode==2){
			$winall2 = $winall * 4;	
			}else{
			$winall2 = $winall * 2;	
			}
			
				
				
			$casbank = winlimit("double");
			
		    if ( $casbank < $winall2 || $shans != 1 || $d > 5 )
		    {
				$winall2 = 0;
				
			}

			
			if($dmode==1){
			
			if ( $winall2 > 0 )
			{
				if ( $bet == 0 )
					$deler = rand(0,1);
				if ( $bet == 1 )
					$deler = rand(2,3);
				
				$_SESSION['romance_win']+=$_SESSION['romance_win2'];
				
			}

			if ( $winall2 == 0 )
			{
				if ( $bet == 0 )
					$deler = rand(2,3);
				if ( $bet == 1 )
					$deler = rand(0,1);
				
				
			$_SESSION['romance_win']=$_SESSION['romance_win2'];	
				
			}
			
			}else{/// *4
				
			if ( $winall2 > 0 )
			{
				if ( $bet == 0 ){
				$deler = 0;	
				}
				if ( $bet == 1 ){
				$deler = 1;	
				}
				if ( $bet == 2 ){
				$deler = 2;	
				}
				if ( $bet == 3 ){
				$deler = 3;	
				}
				$_SESSION['romance_win']+=$_SESSION['romance_win2'];
			}

			if ( $winall2 == 0 )
			{
				
				if ( $bet == 0 ){
				$crds=array(1,2,3);
 				shuffle($crds);
				$deler = $crds[0];	
				}
				if ( $bet == 1 ){
				$crds=array(0,2,3);
 				shuffle($crds);
				$deler = $crds[0];	
				}
				if ( $bet == 2 ){
				$crds=array(1,0,3);
 				shuffle($crds);
				$deler = $crds[0];	
				}
				if ( $bet == 3 ){
				$crds=array(1,2,0);
 				shuffle($crds);
				$deler = $crds[0];	
				}
				$_SESSION['romance_win']=$_SESSION['romance_win2'];
			}	
				
			}

			$stat_txt = "romance_double";
			$winall44 = sprintf( "%01.2f", $winall2 );
            unset($_SESSION['romance_win2']);
			
			
			set_stat_game($userId, $user_balance, $betBegin,$winall44,$stat_txt);
			if ($winall2 > 0)
			{
			
			$double_bank_sum-=$winall2; 
			
				cange_balance($userId, $winall44);
			   
			$_SESSION['microbank']-=$winall44;
				$_SESSION['romance_win'] = $winall2;
			}
			
			if($double_bank_sum!=0){
			change_bank($user_id,'romance',$double_bank_sum,"double");
			}
			
			$user_balance = floor_format( get_balance($userId) );
			
			ge_serv_show_str( "result=ok&dwin=$winall2&info=$deler&id=$login&balance=$user_balance");
			
		}
	}
		

?>

