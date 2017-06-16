<?php
    ini_set('display_errors',"On");

    session_start();

    //DBManagerのファイルを読み込む
    require_once './DBManager.php';

    //DBManagerを読み込む
    //$db = new DBManager();

    //DBに接続する関数
    $con = DBconnect();

    //ローカルストレージから値を取得
    //$usernumber = $_POST["usernumber"];

    //kuizuID取得
    //$kuizuID = $_SESSION['kuizuID'];

    //クイズ１or２？
    //function result(){

  /*      //DBManagerから生徒情報を取ってくるメソッドを呼び出す
       $userDetail = getUser($con,1401016);
echo $userDetail[0][1];
       //DBManagerから参加者を取ってくるメソッドを呼び出す
       $particiPant = getParticipant($con,1401016);

        //回答率を計算する問題を取ってくるメソッドを呼び出す
        $kuizuDetail = getKuizu($con,1);
echo $kuizuDetail[0][2];
         //DBManagerから参加者の回答結果を取ってくるメソッドを呼び出す
        //$userKuizu = getParticipant($con);

       if($kuizuDetail[0][1] == 1){//kuizuIDが1なら

            //参加者の数だけ学校別判定
            foreach($particiPant as $sankasya){
                if($sankasya[0][0] == $userDetail[0][1]){//参加者と学生情報の学籍番号
                    
                    //参加者人数カウント
                    $joho = 0;
                    $gaigo = 0;
                    $iryo = 0;
                    $kentiku = 0;
                    $komuin = 0;
                    $jidousya = 0;

                    //参加者の学校判定
                    if($userDetail[0][3] == 'ABCC'){//情報ビジネス
                        
                    } elseif($userDetail[0][3] == 'AFTC'){//外語観光＆製菓
                        $gaigo++;
                    } elseif($userDetail[0][3] == 'AMFC'){//医療福祉
                        $iryo++;
                    } elseif($userDetail[0][3] == 'AADC'){//建築＆デザイン
                        $kentiku++;
                    } elseif($userDetail[0][3] == 'APFC'){//公務員
                        $komuin++;
                    } elseif($userDetail[0][3] == 'ACET'){//自動車校
                        $jidousya++;
                    }
            }elseif($kuizuDetail[0][1] == 2){//クイズIDが2なら
            //クイズ2の参加者で正解者を出力

                    }
                }
            }
        //}
echo $userDetail[0][3];*/

    //正解判定
    function answerJudge(){
        //正解者のカウント
        $cnt = 0;

        //DBManagerから参加者を取ってくるメソッドを呼び出す
       $particiPant = getParticipant($con,1401016);

       //回答率を計算する問題を取ってくるメソッドを呼び出す
        $kuizuDetail = getKuizu($con,1);
       
       //参加者の数だけループ
       foreach($particiPant as $sankasya){
            //参加者の回答=正解の回答
            if($sankasya[2] == $kuizuDetail[0][3]){//参加者の回答が正解の場合
                //正解者の学籍番号を配列に入れる
                $correct[$cnt] = $sankasya[0];
                echo $correct[$cnt];
                $cnt++;
            } 
        }
    }
    dconnect($con);
?>