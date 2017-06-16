<?php

	if(!isset($_SESSION)){
		session_start();
	}

	function schoolJudge(){

	ini_set( 'display_errors', "On" );
	require_once 'DBManager.php';

        require_once 'answerJudgeManager.php';

        //DB接続
		$con = DBConnect();

     //DBManagerから生徒情報を取ってくるメソッドを呼び出す
       $userDetail = getstudent($con);

       //DBManagerからクイズ正解者を取ってくるメソッドを呼び出す
       $particiPant = answerJudge();

	//変数を用意
	$cnt = 0;
	$cnt2 = 0;

	//ソートで学籍番号を昇順にする
	//配列を用意
	$user = array();
	$partici = array();

    //正解者の数だけループ
	foreach($particiPant as $sankasya){
		$partici[$cnt] = $sankasya;	
		$cnt++;
	}

    //生徒の数だけループ
	foreach($userDetail as $row){
		$user[$cnt2] = $row[1];	
		$cnt2++;
	}
	//ソートして入れ直し
	sort($user);
    sort($partici);

	//初期化
	$cnt = 0;
	$cnt2 = 0;

             //参加者人数カウント
             $system = 0;
             $creatib = 0;
             $business = 0;
             $gaigo = 0;
             $iryo = 0;
             $kentiku = 0;
             $komuin = 0;
             $jidousya = 0;

            //参加者の数だけ学校別判定
            foreach($partici as $sankasya){//参加者の数分ループ
                foreach($user as $student){//学生の数文ループ
                    if($student != 0){
                        if($sankasya == $student){
                            //ここで学校判定のクラスを呼ぶ
                            $schoolname = SchoolNameGet($con,$student);

                            //ここで学科判定のクラスを呼ぶ
                            $departmentName = DepartmentNameGet($con,$student);

                            //参加者の学校判定
                            if($schoolname[0] == 'ABCC'){//情報ビジネス
                                if($departmentName[0] == 'ＣＮ科アドバンス' or $departmentName[0] == 'ＣＮ科ベーシック' or $departmentName[0] == '情報工学科' or $departmentName[0] == '組込みシステム科' or $departmentName[0] == '情報システム専攻科' or $departmentName[0] == '情報システム科'){//システム
                                    $system++;
                                }elseif($departmentName[0] == 'ゲームクリエータ科' or $departmentName[0] == 'ゲームクリエータ専攻科' or $departmentName[0] == '漫画・アニメ科' or $departmentName[0] == 'Webクリエータ科' or $departmentName[0] == 'CGクリエータ科'){//クリエイティブ
                                    $creatib++;
                                }elseif($departmentName[0] == '情報ビジネス専攻科' or $departmentName[0] == '情報エキスパート科' or $departmentName[0] == '情報ビジネス科' or $departmentName[0] == '税理士専攻科' or $departmentName[0] == '税理士科' or $departmentName[0] == '情報経理科' or $departmentName[0] == '販売ビジネス科' or $departmentName[0] == '経営ビジネス科'){//ビジネス
                                    $business++;
                                }
                            } elseif($schoolname[0] == 'AFTC'){//外語観光＆製菓
                                $gaigo++;
                            } elseif($schoolname[0] == 'AMFC'){//医療福祉
                                $iryo++;
                            } elseif($schoolname[0] == 'AADC'){//建築＆デザイン
                                $kentiku++;
                            } elseif($schoolname[0] == 'APFC'){//公務員
                                $komuin++;
                            } elseif($schoolname[0] == 'ACET'){//自動車校
                                $jidousya++;
                            }
                        }
                    }
                }
            }

	//DB切断
	dconnect($con);

    //学校判定した学生
	return array($system,$creatib,$business,$gaigo,$iryo,$kentiku,$komuin,$jidousya);
}
             
?>