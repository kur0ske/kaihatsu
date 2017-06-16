<?php


    //データベースへ接続
    function DBConnect(){
        try{
            //データベースに接続
            $con = mysqli_connect("localhost", "gakusai","gakusai","test");

            //文字コードをセット
            mysqli_set_charset($con,"utf8");

            return $con;
        } catch(Exception $e) {
            echo('システムエラーが発生しました');
        }
    }

    //データベース切断
    function dconnect($con){
        try{
            $con2 = mysqli_close($con);
            if (!$con2){
                exit('データベースとの接続を閉じられませんでした');
            }
        } catch(Exception $e){
            echo('システムエラーが発生しました');
        }
    }

    //セッション確認、ログイン認証
    function Login($con,$id,$pass){
        try{
            //SQL文をセット
	$queryset = mysqli_query($con,"SELECT kanriid,kanripass FROM kanriuser where kanripass = '".$pass."'AND kanriid = ".$id)or die('query error' . mysql_error());
		$arr = array();
	    while($row = mysqli_fetch_array($queryset)){
            array_push($arr,$data);
        }
		return 'true';
    } catch (Exception $e) {
       //SQLの発行を失敗した際のエラーメッセージ
            exit('SQL失敗。'.$e->getMessage());
        }

        }

    //クイズ登録
    function KuizuRegi($con,$iventid,$question,$bingoAnswer,$dummy1,$dummy2,$dummy3){
        try{
            //SQL文をセット
            $result_flag = mysqli_query($con,"INSERT INTO kuizu (iventid,question,bingoAnswer,dummy1,dummy2,dummy3) VALUES ('$iventid','$question','$bingoAnswer','$dummy1','$dummy2','$dummy3')");
			if (!$result_flag) {
	    	die('INSERTクエリーが失敗しました。'.mysqli_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
        }
    }

    //クイズ削除
    function kuizuDel($con,$kuizuID){
        try{
            //SQL文をセット//
		    $result_flag = mysqli_query($con,'DELETE FROM kuizu WHERE kuizuid ='.$kuizuID);
			if (!$result_flag) {
	    	die('DELETEクエリーが失敗しました。'.mysqli_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
        }
    }

    //クイズ取得
    function getKuizu($con,$kuizuID){
        try{
            //SQL文をセット
            $queryset = mysqli_query($con,'SELECT * FROM kuizu WHERE kuizuID ='.$kuizuID);
                
                //kuizuIDの情報を格納する配列
                $kuizu = array();

                //kuizuIDが一致した行を出力
                while($row = mysqli_fetch_array($queryset)){
                    array_push($kuizu,$row);
                }
                return $kuizu;
        }catch (Exception $e){
            echo('システムエラーが発生しました');
        }
    }

    //クイズ取得
    function getKuizuAll($con){
        try{
            //SQL文をセット
            $queryset = mysqli_query($con,'SELECT * FROM kuizu');
                
                //kuizuIDの情報を格納する配列
                $kuizu = array();

                //kuizuIDが一致した行を出力
                while($row = mysqli_fetch_array($queryset)){
                    array_push($kuizu,$row);
                }
                return $kuizu;
        }catch (Exception $e){
            echo('システムエラーが発生しました');
        }
    }


    //参加者の取得
    function getParticipant($con,$usernumber){
        try{
            //SQL文をセット
            $queryset = mysqli_query($con,'SELECT * FROM participant WHERE usernumber ='.$usernumber);
                
                //参加者の情報を格納する配列
                $student = array();

                //学籍番号が一致した行を出力
                while ($data = mysqli_fetch_array($queryset)){
                array_push($student,$data);
                }
                return $student;
            } catch (Exception $e) {
                    echo ('システムエラーが発生しました');
        }
    }

    //学生情報の取得
    function getUser($con,$usernumber){
        try{
            //SQL文をセット
            $queryset = mysqli_query($con,'SELECT * FROM user WHERE usernumber ='.$usernumber);
            
            //生徒の情報を格納する配列
            $studentdetail = array();

            //学籍番号が一致した生徒を取得
            while($data = mysqli_fetch_array($queryset)){
                array_push($studentdetail,$data);
            }
            return $studentdetail;
        } catch(Exception $e){
            echo('システムエラーが発生しました');
        }
    }

    //クイズの回答取得
    function getAnswer($con,$kuizuID){
        try{
            //SQL文セット
            $queryset = mysqli_query($con,'SELECT * FROM kuizu WHERE KUIZUID ='.$kuizuID);

            //クイズの回答情報を格納する配列
            $Answer = array();

                //kuizuIDが一致した行を出力
                while($data = mysqli_fetch_array($queryset)){
                    $Answer[0] = $data["bingoAnswer"];
                    $Answer[1] = $data["dummy1"];
                    $Answer[2] = $data["dummy2"];
                    $Answer[3] = $data["dummy3"];
                }
                return $Answer;
            } catch (Exception $e) {
            echo ('システムエラーが発生しました');
        }
    }

    //参加者クイズ回答登録
    function answerRegi($con,$usernumber,$kuizuid,$answer){
        try{
            //SQL文をセット
            $result_flag = mysqli_query($con,"INSERT INTO participant (usernumber,kuizuID,userAnswer) VALUES ('$usernumber','$kuizuid','$answer')");
			if (!$result_flag) {
	    	die('INSERTクエリーが失敗しました。'.mysqli_error());
			}
    } catch (Exception $e) {
            echo ('システムエラーが発生しました');
        }
    }

    //学生取得
    function getstudent($con){
        try{
            //SQL文をセット
            $queryset = mysqli_query($con,'SELECT * FROM user');
                
                //kuizuIDの情報を格納する配列
                $user = array();

                //kuizuIDが一致した行を出力
                while($row = mysqli_fetch_array($queryset)){
                    array_push($user,$row);
                }
                return $user;
        }catch (Exception $e){
            echo('システムエラーが発生しました');
        }
    }

    //参加者の取得
    function getParticipant2($con){
        try{
            //SQL文をセット
            $queryset = mysqli_query($con,'SELECT * FROM participant');
                
                //参加者の情報を格納する配列
                $student = array();

                //学籍番号が一致した行を出力
                while ($data = mysqli_fetch_array($queryset)){
                array_push($student,$data);
                }
                return $student;
            } catch (Exception $e) {
                    echo ('システムエラーが発生しました');
        }
    }

    //学校名取得
    function SchoolNameGet($con,$id){
        try{
            //SQL文をセット
            $queryset = mysqli_query($con,"SELECT userschool FROM user WHERE usernumber = $id");
                
                //学籍番号が一致した行を出力
                while ($data = mysqli_fetch_array($queryset)){
                    $school = $data;
                }
                return $school;
            } catch (Exception $e) {
                    echo ('システムエラーが発生しました');
        }
    }

    //学科名取得
    function DepartmentNameGet($con,$id){
        try{
            //SQL文をセット
            $queryset = mysqli_query($con,"SELECT usertype FROM user WHERE usernumber = $id");
                
                //学籍番号が一致した行を出力
                while ($data = mysqli_fetch_array($queryset)){
                    $school = $data;
                }
                return $school;
            } catch (Exception $e) {
                    echo ('システムエラーが発生しました');
        }
    }

    //学籍番号とクイズID一致検索
function particiSerch($con,$usernumber,$kuizuid){
        try{
			$arr = array();
        	//SQL文を発行
			$queryset = mysqli_query($con,'select * from participant where usernumber ='.$usernumber.' and kuizuid ='.$kuizuid);
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