<?php

    if(!isset($_SESSION)){
    session_start();
    }

    function answerJudge(){

    ini_set('display_errors',"On");

    //DBManagerのファイルを読み込む
    require_once 'DBManager.php';

    //DBに接続する関数
    $con = DBConnect();

        //DBManagerから参加者を取ってくるメソッドを呼び出す
       $particiPant = getParticipant2($con);
       //回答率を計算する問題を取ってくるメソッドを呼び出す
       $kuizuDetail = getKuizuAll($con);



        //正解者のカウント
        $cnt = 0;
       //参加者の数だけループ
       foreach($particiPant as $sankasya){
            //参加者の回答=正解の回答
            if($sankasya[2] == $kuizuDetail[0][3]){//参加者の回答が正解の場合
                //正解者の学籍番号を配列に入れる
                $correct[$cnt] = $sankasya[0];
                //正解者数カウント
                $cnt++;
            } 
        }
            //DB切断
            dconnect($con);

            //正解者の学籍番号を返す
            return $correct;
    }
    
?>