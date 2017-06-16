<?php



function DBConnect(){//データベースに接続

    try {
//データベースに接続 //
$con = mysqli_connect("localhost", "gakusai","gakusai","test");

//文字コードをセット//
mysqli_set_charset($con,"utf8");

return $con;
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

function DBDConnect($con){//データベース切断
    try {
	
	$con2 = mysqli_close($con);
		if (!$con2) {
			  exit('データベースとの接続を閉じられませんでした。');
		}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}


function kanricheck($con,$id,$pass){//セッション確認、ログイン認証

    try {
	
	//SQL文をセット//
	$queryset = mysqli_query($con,"SELECT kanriid,kanripass FROM kanriuser where kanripass = '".$pass."'AND kanriid = ".$id)or die('query error' . mysql_error());
			$arr = array();
		while ($data = mysqli_fetch_array($queryset)){
			array_push($arr, $data);
		}
		return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}


 function UserFlagGet($con,$usernumber){
        try{
        	//SQL文を発行
			$queryset = mysqli_query($con,'select attendanceFlag from userflag where usernumber= '.$usernumber);
			
			if($row =  mysqli_fetch_array($queryset)){
				$flag = $row[0];
			}else{
				$flag = 0;
			}

			return $flag;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
    }


 function UsernumberSelect($con,$usernumber){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from user where usernumber = '.$usernumber);
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
    }

//ivent情報全件取得
function IventSelectAll($con){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from ivent');
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}

//ivent情報全件取得（iventid）
function IventSelect($con,$iventid){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from ivent where iventid ='.$iventid);
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}

//iventdetail全件検索
function IventDetailSelectAll($con){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from iventdetail');
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}

//iventdetail全件検索
function IventDetailSelect($con,$iventdetailid){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from iventdetail where iventdetailID ='.$iventdetailid);
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}

//iventmg全件検索(iventid)
function IventMgSelect($con,$iventid){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from iventmg where iventid ='.$iventid);
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}

//gakusaivote全件検索
function GakusaiVoteSelect($con,$iventid){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from gakusaivote where iventid ='.$iventid);
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}

//gakusaivote iventdetailid一致全件検索
function GakusaiVoteDetailidSelect($con,$iventid,$iventdetailid){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from gakusaivote where iventid ='.$iventid.' and iventdetailID='.$iventdetailid);
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}

//gakusaivoteUsernumber一致検索
function GakusaiVoteUsernumberSelect($con,$iventid,$usernumber){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from gakusaivote where iventid ='.$iventid.' and usernumber ='.$usernumber);
					while ($data = mysqli_fetch_array($queryset)){
					array_push($arr, $data);
				}
			
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}


//gakusaivote投票機能
function GakusaiVoteInsert($con,$usernumber,$iventid,$iventdetailid){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"INSERT INTO gakusaivote (usernumber,iventid,iventdetailID) VALUES ('$usernumber','$iventid','$iventdetailid')");
			if (!$result_flag) {
	    		die('INSERTクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}

//cookieの最終番号更新
//一般の参加者用
function CookieUpdate($con,$terminal){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,'UPDATE cookie SET terminal='.$terminal);
			if (!$result_flag) {
	    		die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}

//cookie全件検索
function CookieSelect($con){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,"select * from cookie");
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}

//iventflag検索(iventid)
function EventFlagSelect($con,$iventid){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from iventflag where iventid='.$iventid);
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}

//iventfla全検索  
function EventFlagSelectAll($con){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from iventflag');
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}

//ユーザーFlag全件検索（usernumber）
 function UserFlagGetAll($con,$usernumber){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from userflag where usernumber= '.$usernumber);
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

    }

//イベントごとのランキング検索
function Ranking($con,$iventid){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'SELECT iventdetail.iventdetailID,iventdetail.iventpp,iventdetail.imgurl,COUNT(gakusaivote.iventdetailID) AS rank FROM gakusaivote,iventdetail WHERE gakusaivote.iventid ='.$iventid.' AND iventdetail.iventdetailID=gakusaivote.iventdetailID GROUP BY gakusaivote.iventdetailID ORDER BY rank DESC');
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}


//イベント詳細情報登録機能
function IventDetailInsert($con,$iventpp,$comment,$imgurl){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"INSERT INTO iventdetail (iventpp,comment,imgurl) VALUES ('$iventpp','$comment','$imgurl')");
			if (!$result_flag) {
	    		die('INSERTクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}

//イベント詳細情報更新
function IventDetailUpdate($con,$iventdetailid,$iventpp,$comment,$imgurl){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"UPDATE iventdetail SET iventpp='$iventpp',comment='$comment',imgurl='$imgurl' WHERE iventdetailID='$iventdetailid'");
			if (!$result_flag) {
	    		die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}

//イベント詳細情報削除
function IventDetailDelete($con,$iventdetailid){//選択されたのタグの、タグ職業関連を削除

    try {
	//SQL文をセット//
		$result_flag = mysqli_query($con,'DELETE FROM iventdetail WHERE iventdetailID ='.$iventdetailid);

			if (!$result_flag) {
	    	die('DELETEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

//イベントID紐づけ情報登録機能
function IventMgInsert($con,$iventid,$iventdetailid){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"INSERT INTO iventmg (iventid,iventdetailID) VALUES ('$iventid','$iventdetailid')");
			if (!$result_flag) {
	    		die('INSERTクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}

//イベントID紐づけ情報削除
function IventMgDelete($con,$iventid,$iventdetailid){//選択されたのタグの、タグ職業関連を削除

    try {
	//SQL文をセット//
		$result_flag = mysqli_query($con,'DELETE FROM iventmg WHERE iventid = '.$iventid.' AND iventdetailID ='.$iventdetailid);

			if (!$result_flag) {
	    	die('DELETEクエリーが失敗しました。'.mysql_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
    }
}

//ユーザーflag情報更新
function UserFlagUpdate($con,$usernumber,$attendanceflag,$danceflag,$misterflag,$msflag){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"UPDATE userflag SET attendanceFlag='$attendanceflag',danceFlag='$danceflag',misterFlag='$misterflag',msFlag='$msflag' WHERE usernumber='$usernumber'");
			if (!$result_flag) {
	    		die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}


//ユーザーFlag情報更新
//出席情報更新
function UserFlagAttendUpdate($con,$usernumber,$attendanceflag){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"UPDATE userflag SET attendanceFlag='$attendanceflag' WHERE usernumber='$usernumber'");
			if (!$result_flag) {
	    		die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}

//ユーザーFlag情報更新
//ダンス情報更新（抽選結果更新）
function UserFlagDanceUpdate($con,$usernumber,$danceflag){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"UPDATE userflag SET danceFlag='$danceflag' WHERE usernumber='$usernumber'");
			if (!$result_flag) {
	    		die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}

//ユーザーFlag情報更新
//ミスターコン情報更新（抽選結果更新）
function UserFlagMisterUpdate($con,$usernumber,$misterflag){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"UPDATE userflag SET misterFlag='$misterflag' WHERE usernumber='$usernumber'");
			if (!$result_flag) {
	    		die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}

//ユーザーFlag情報更新
//ミスコン情報更新（抽選結果更新）
function UserFlagMsUpdate($con,$usernumber,$msflag){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"UPDATE userflag SET msFlag='$msflag' WHERE usernumber='$usernumber'");
			if (!$result_flag) {
	    		die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}

//イベントFlag情報更新
//投票開始終了情報更新
function EventFlagVoteUpdate($con,$iventid,$voteflag){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"UPDATE iventflag SET voteFlag='$voteflag' WHERE iventid='$iventid'");
			if (!$result_flag) {
	    		die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}

//イベントFlag情報更新
//イベント公開・非公開情報更新
function EventFlagReleaseUpdate($con,$iventid,$releaseflag){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"UPDATE iventflag SET releaseFlag='$releaseflag' WHERE iventid='$iventid'");
			if (!$result_flag) {
	    		die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}

//イベントFlag情報更新
//イベント結果公開・非公開情報更新
function EventFlagResultUpdate($con,$iventid,$resultflag){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"UPDATE iventflag SET resultFlag='$resultflag' WHERE iventid='$iventid'");
			if (!$result_flag) {
	    		die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}

//イベントFlag情報更新
//イベント抽選結果公開・非公開情報更新
function EventFlagLotteryUpdate($con,$iventid,$lotteryflag){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"UPDATE iventflag SET lotteryFlag='$lotteryflag' WHERE iventid='$iventid'");
			if (!$result_flag) {
	    		die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}

 function GakusaiCount($con,$iventdetailid){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select count(iventdetailID) from gakusaivote where iventdetailID= '.$iventdetailid);
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
    }
 //gakusaiflag全検索  
function GakusaiFlagSelectAll($con){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from gakusaiflag');
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}
?>