<?php
    if(!isset($_SESSION)){
		session_start();
	}
function Rate(){

ini_set( 'display_errors', "On" );

        //DBManagerのファイルを読み込む
        require_once 'DBManager.php';

		require_once 'sankaCount.php';

        require_once 'schoolJudgeManager.php';

		$con = DBConnect();

        //参加者数の取得
        list($system2,$creatib2,$business2,$gaigo2,$iryo2,$kentiku2,$komuin2,$jidousya2) = sankaCount();

        //正解者数の取得
        list($system,$creatib,$business,$gaigo,$iryo,$kentiku,$komuin,$jidousya) = schoolJudge();

        //情報（システム）の正解率
        if($system != 0){
            $systemRate = ($system/$system2)*100;
        }elseif($system == 0){
            $systemRate = 0;
        }

        //情報（クリエイティブ）の正解率
        if($creatib != 0){
            $creatibRate = ($creatib/$creatib2)*100;
        }elseif($creatib == 0){
            $creatibRate = 0;
        }

        //情報（ビジネス）の正解率
        if($business != 0){
            $businessRate = ($business/$business2)*100;
        }elseif($business == 0){
            $businessRate = 0;
        }

        //外語観光&製菓の正解率
        if($gaigo != 0){
            $gaigoRate = ($gaigo/$gaigo2)*100;
        }elseif($gaigo == 0){
            $gaigoRate = 0;
        }

        //医療の正解率
        if($iryo != 0){
            $iryoRate = ($iryo/$iryo2)*100;
        }elseif($iryo == 0){
            $iryoRate = 0;
        }

        //建築の正解率
        if($kentiku != 0){
            $kentikuRate = ($kentiku/$kentiku2)*100;
        }elseif($kentiku == 0){
            $kentikuRate = 0;
        }

        //公務員の正解率
        if($komuin != 0){
            $komuinRate = ($komuin/$komuin2)*100;
        }elseif($komuin == 0){
            $komuinRate = 0;
        }
        
        //自動車の正解率
        if($jidousya != 0){
            $jidousyaRate = ($jidousya/$jidousya2)*100;
        }elseif($jidousya == 0){
            $jidousyaRate = 0;
        }
            
        
        //学校ごとの正解率を返す
        return array($systemRate,$creatibRate,$businessRate,$gaigoRate,$iryoRate,$kentikuRate,$komuinRate,$jidousyaRate);
    }
?>