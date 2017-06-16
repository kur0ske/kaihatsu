<?php



function DBConnect(){//データベースに接続

    try {
//データベースに接続 //
$con = mysqli_connect("", "","","");

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

//入場管理の出席情報データを検索
	function getuser($con,$s,$t){

	try{

		$result = mysqli_query($con,'select user.usernumber,user.username,userflag.attendanceFlag from user,userflag where  user.userschool = \''.$s.'\' AND user.usertype = \''.$t.'\' AND user.usernumber = userflag.usernumber;') or die('select user.usernumber,user.username,userflag.attendanceFlag from user,userflag where  user.userschool = \''.$s.'\' AND user.usertype = \''.$t.'\' AND user.usernumber = userflag.usernumber;');

		return $result;

	}catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}

//入場管理のカードのIDと一致するデータを検索
	 function search($con,$id){
	 try{
		$boolean = "false";
		$result = mysqli_query($con,'SELECT * FROM user WHERE userid = \''.$id.'\';');
		while($data = mysqli_fetch_array($result)){
		$boolean = "true";
		}
	}catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
	
		return $boolean;
	}

//入場管理の手入力で入れた学籍番号と一致するデータを検索
  	function carsearch($con,$id){
	try{
		$x = "null";
		$result = mysqli_query($con,'SELECT * FROM user WHERE usernumber = '.$id.';');
		while($data = mysqli_fetch_array($result)){
		$x = $data['username'];
		}
		}catch(Exception $e){
            	//SQLの発行を失敗した際のエラーメッセージ
           	 exit('SQL失敗。'.$e->getMessage());
	        }
		return $x;
	}

//入場管理のカードでユーザーFlagを更新
	function userupdate($con,$id){
	try{
		$result = mysqli_query($con,'UPDATE userflag INNER JOIN user ON user.usernumber = userflag.usernumber SET attendanceFlag = 1 WHERE user.userid = \''.$id.'\';') or die('UPDATE userflag INNER JOIN user ON user.usernumber = userflag.usernumber SET attendanceFlag = 1 WHERE user.userid = '.$id.';');

	
		}catch(Exception $e){
            	//SQLの発行を失敗した際のエラーメッセージ
           	 exit('SQL失敗。'.$e->getMessage());
	        }
	}

//入場管理の手入力でユーザーFlagを更新
	function caruserupdate($con,$id){
	try{
		$result = mysqli_query($con,'UPDATE userflag SET attendanceFlag = 1 WHERE usernumber = '.$id.';') or die('UPDATE userflag SET attendanceFlag = 1 WHERE usernumber = '.$id.';');

		}catch(Exception $e){
            	//SQLの発行を失敗した際のエラーメッセージ
           	 exit('SQL失敗。'.$e->getMessage());
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

//usernumberと一致したユーザーFlagの全件検索
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

//usernumberと一致した投票テーブルの全件検索
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

//テーブルの最終番号更新
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

//テーブルの最終番号全件検索
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

//ユーザーFlag抽選全件検索
 function UserFlagLotteryGet($con){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from userflag where danceFlag = 1 OR misterFlag =1 OR msFlag =1 OR singerFlag =1');
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
			return mysqli_insert_id($con);
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
function IventDetailDelete($con,$iventdetailid){
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
function IventMgDelete($con,$iventid,$iventdetailid){
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

//ユーザーFlag情報更新
//歌うま情報更新（抽選結果更新）
function UserFlagSingerUpdate($con,$usernumber,$singerflag){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"UPDATE userflag SET singerFlag='$singerflag' WHERE usernumber='$usernumber'");
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

//学祭投票のイベント詳細IDのCount
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

//イベントFlag情報更新
//前夜祭公開・非公開情報更新
function ZenyasaiFlagUpdate($con,$kanrizenyasaiflag,$gakusaiid){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"UPDATE gakusaiflag SET zenyasaiFlag='$kanrizenyasaiflag' WHERE gakuensaiid= '$gakusaiid'");
			if (!$result_flag) {
	    		die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}

//イベントFlag情報更新
//本祭公開・非公開情報更新
function HonsaiFlagUpdate($con,$kanrihonsaiflag,$gakusaiid){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"UPDATE gakusaiflag SET honsaiFlag='$kanrihonsaiflag' WHERE gakuensaiid= '$gakusaiid'");
			if (!$result_flag) {
	    		die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}

//イベントFlag情報更新
//クイズ公開・非公開情報更新
function QuizFlagUpdate($con,$kanriquizflag,$gakusaiid){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"UPDATE gakusaiflag SET quizFlag='$kanriquizflag' WHERE gakuensaiid= '$gakusaiid'");
			if (!$result_flag) {
	    		die('UPDATEクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

}

//ミスコン抽選者数カウント
 function UserFlagMsCount($con,$msflag){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select count(usernumber) from userflag where msFlag= '.$msflag);
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
    }

//ミスターコン抽選者数カウント	
	 function UserFlagMisterCount($con,$misterflag){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select count(usernumber) from userflag where misterFlag= '.$misterflag);
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
    }

//歌うま抽選者数カウント	
		 function UserFlagSingerCount($con,$singerflag){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select count(usernumber) from userflag where singerFlag= '.$singerflag);
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
    }
	
	//ダンス抽選者数カウント	
		 function UserFlagDanceCount($con,$danceflag){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select count(usernumber) from userflag where danceFlag= '.$danceflag);
			while ($data = mysqli_fetch_array($queryset)){
				array_push($arr, $data);
			}
			return $arr;
        }catch(Exception $e){
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
    }




//testvote投票機能(負荷テスト関数)
function TestVoteInsert($con,$testid,$testdetailid){
        try{
        	//SQL文を発行
			$result_flag = mysqli_query($con,"INSERT INTO testvote (testid,testdetailid) VALUES ('$testid','$testdetailid')");
			if (!$result_flag) {
	    		die('INSERTクエリーが失敗しました。'.mysql_error());
			}
    	} catch (Exception $e) {
            //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }
}
?>
