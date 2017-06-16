<?php
ini_set( 'display_errors', "On" );

/*
呼び出されたら、ミスコン、ミスターコン、歌うま、ダンス、
lotteryflagを更新し、
一つのイベントに選んだ人数
ユーザーflagのdanceflag、misterflag、msflagを
更新する。

*/
$mssettei = $_POST['mssettei'];
$mistersettei = $_POST['mistersettei'];
$singersettei = $_POST['singersettei'];
$dancesettei = $_POST['dancesettei'];


	require_once '../class/DBManager.php'; //DBマネージャーの読み込み
	$con = DBConnect();

if($mssettei > 0){

	//ミスコンFlagが1だったら取らない
	$misflag = EventFlagSelect($con,1);
	if($misflag[0][4]==0){

	//ランキング
	$misurank = Ranking($con,1);
	$misran = $misurank[0][0];	

	//ミスコン投票全件取得
	$votemisukon = array();
	$votemisukon = GakusaiVoteDetailidSelect($con,1,$misran);

	//投票人数
	$misuuserct = GakusaiCount($con,$misurank[0][0]);
	$mismax = $misuuserct[0][0]-1;
	
	
		
		//現在の抽選者数
		$userflagcount = UserFlagMsCount($con,1);
		//抽選者数を超えていたら行わない
		if($userflagcount[0][0] != $mssettei){
			//抽選
			$mscnt= $userflagcount[0][0];
			while(true){ //無限に繰り返す
			//ランダム
			$msusernumber = $votemisukon[rand(0, $misuuserct[0][0]-1)][0];
			$msflagget = UserFlagGetAll($con,$msusernumber);
				//被ってなければ抽選する
				if($msflagget[0][2]==0 && $msflagget[0][3]==0 && $msflagget[0][4]==0 && $msflagget[0][5]==0){
				UserFlagMsUpdate($con,$msusernumber,1);
				$mscnt++;
				}
			
				if($mscnt== $mssettei){
				EventFlagLotteryUpdate($con,1,1);
				break; //繰返しの強制終了
				}
			}
		}
		
	
	}
}	

if($mistersettei > 0){

	//ミスターFlagが1だったら取らない
	$misterflag = EventFlagSelect($con,2);
	if($misterflag[0][4]==0){

	//ランキング
	$misterrank = Ranking($con,2);
	$misterran = $misterrank[0][0];	

	//ミスターコン投票全件取得
	$votemisterkon = array();
	$votemisterkon = GakusaiVoteDetailidSelect($con,2,$misterran);

	//投票人数
	$misteruserct = GakusaiCount($con,$misterrank[0][0]);
	$mistermax = $misteruserct[0][0]-1;
	
	
		
		//現在の抽選者数
		$userflagcount2 = UserFlagMisterCount($con,1);
		//抽選者数を超えていたら行わない
		if($userflagcount2[0][0] != $mistersettei){
			//抽選
			$mistercnt= $userflagcount2[0][0];
			while(true){ //無限に繰り返す
			//ランダム
			$misterusernumber = $votemisterkon[rand(0, $misteruserct[0][0]-1)][0];
			$misterflagget = UserFlagGetAll($con,$misterusernumber);
				//被ってなければ抽選する
				if($misterflagget[0][2]==0 && $misterflagget[0][3]==0 && $misterflagget[0][4]==0 && $misterflagget[0][5]==0){
				UserFlagMisterUpdate($con,$misterusernumber,1);
				$mistercnt++;
				}
			
				if($mistercnt== $mistersettei){
				EventFlagLotteryUpdate($con,2,1);
				break; //繰返しの強制終了
				}
			}
		}
		
	
	}
}

if($singersettei > 0){	
	//歌うま
	$singerflag = EventFlagSelect($con,3);
	if($singerflag[0][4]==0){

	//ランキング
	$singerrank = Ranking($con,3);
	$singerran = $singerrank[0][0];	

	//歌うま投票全件取得
	$votesinger = array();
	$votesinger = GakusaiVoteDetailidSelect($con,3,$singerran);

	//投票人数
	$singeruserct = GakusaiCount($con,$singerrank[0][0]);
	$singermax = $singeruserct[0][0]-1;
	
	
		
		//現在の抽選者数
		$userflagcount3 = UserFlagSingerCount($con,1);
		//抽選者数を超えていたら行わない
		if($userflagcount3[0][0] != $singersettei){
			//抽選
			$singercnt= $userflagcount3[0][0];
			while(true){ //無限に繰り返す
			//ランダム
			$singerusernumber = $votesinger[rand(0, $singeruserct[0][0]-1)][0];
			$singerflagget = UserFlagGetAll($con,$singerusernumber);
				//被ってなければ抽選する
				if($singerflagget[0][2]==0 && $singerflagget[0][3]==0 && $singerflagget[0][4]==0 && $singerflagget[0][5]==0){
				UserFlagSingerUpdate($con,$singerusernumber,1);
				$singercnt++;
				}
			
				if($singercnt == $singersettei){
				EventFlagLotteryUpdate($con,3,1);
				break; //繰返しの強制終了
				}
			}
		}
			
	
	}
}

if($dancesettei > 0){
		
	//ダンスFlagが1だったら取らない
	$danceflag = EventFlagSelect($con,4);
	if($danceflag[0][4]==0){

	//ランキング
	$dancerank = Ranking($con,4);
	$danceran = $dancerank[0][0];	

	//歌うま投票全件取得
	$votedance = array();
	$votedance = GakusaiVoteDetailidSelect($con,4,$danceran);

	//投票人数
	$danceuserct = GakusaiCount($con,$dancerank[0][0]);
	$dancemax = $danceuserct[0][0]-1;
	
	
		
		//現在の抽選者数
		$userflagcount4 = UserFlagDanceCount($con,1);
		//抽選者数を超えていたら行わない
		if($userflagcount4[0][0] != $dancesettei){
			//抽選
			$dancecnt= $userflagcount4[0][0];
			while(true){ //無限に繰り返す
			//ランダム
			$danceusernumber = $votedance[rand(0, $danceuserct[0][0]-1)][0];
			$danceflagget = UserFlagGetAll($con,$danceusernumber);
				//被ってなければ抽選する
				if($danceflagget[0][2]==0 && $danceflagget[0][3]==0 && $danceflagget[0][4]==0 && $danceflagget[0][5]==0){
				UserFlagDanceUpdate($con,$danceusernumber,1);
				$dancecnt++;
				}
			
				if($dancecnt== $dancesettei){
				EventFlagLotteryUpdate($con,4,1);
				break; //繰返しの強制終了
				}
			}
		}
			
	

	}
}

	header("Refresh: 0; URL= ../kanri/kanrilottery.php");
	exit;



?>