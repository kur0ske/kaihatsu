<?php

	if(!isset($_SESSION)){
		session_start();
	}

	function sankaCount(){

		ini_set( 'display_errors', "On" );
		require_once 'DBManager.php';

        //DB接続
		$con = DBConnect();


        //DBManagerから生徒情報を取ってくるメソッドを呼び出す
       $userDetail = getstudent($con);

       //DBManagerからクイズ参加者を取ってくるメソッドを呼び出す
       $particiPant = getParticipant2($con);

        //変数を用意
        $cnt = 0;
        $cnt2 = 0;

        //ソートで学籍番号を昇順にする
        //配列を用意
        $user = array();
        $partici = array();

        //参加者の数だけループ
        foreach($particiPant as $sankasya){
            $partici[$cnt] = $sankasya[0];	
            $cnt++;
        }

        //学生の数だけループ
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
             $system2 = 0;
             $creatib2 = 0;
             $business2 = 0;
             $gaigo2 = 0;
             $iryo2 = 0;
             $kentiku2 = 0;
             $komuin2 = 0;
             $jidousya2 = 0;

            //参加者の数だけ学校別判定
            foreach($partici as $sankasya){
                foreach($user as $student){
                    if($student != 0){
                        if($sankasya == $student){
                            //ここで学校判定のクラスを呼ぶ
                            $schoolname = SchoolNameGet($con,$student);

                            //学科判定のクラスを呼ぶ
                            $departmentName = DepartmentNameGet($con,$student);

                            //参加者の学校判定
                            if($schoolname[0] == 'ABCC'){//情報ビジネス
                                if($departmentName[0] == 'ＣＮ科アドバンス' or $departmentName[0] == 'ＣＮ科ベーシック' or $departmentName[0] == '情報工学科' or $departmentName[0] == '組込みシステム科' or $departmentName[0] == '情報システム専攻科' or $departmentName[0] == '情報システム科'){
                                    $system2++;
                                }elseif($departmentName[0] == 'ゲームクリエータ科' or $departmentName[0] == 'ゲームクリエータ専攻科' or $departmentName[0] == '漫画・アニメ科' or $departmentName[0] == 'Webクリエータ科' or $departmentName[0] == 'CGクリエータ科'){
                                    $creatib2++;
                                }elseif($departmentName[0] == '情報ビジネス専攻科' or $departmentName[0] == '情報エキスパート科' or $departmentName[0] == '情報ビジネス科' or $departmentName[0] == '税理士専攻科' or $departmentName[0] == '税理士科' or $departmentName[0] == '情報経理科' or $departmentName[0] == '販売ビジネス科' or $departmentName[0] == '経営ビジネス科'){
                                    $business2++;
                                }
                            } elseif($schoolname[0] == 'AFTC'){//外語観光＆製菓
                                $gaigo2++;
                            } elseif($schoolname[0] == 'AMFC'){//医療福祉
                                $iryo2++;
                            } elseif($schoolname[0] == 'AADC'){//建築＆デザイン
                                $kentiku2++;
                            } elseif($schoolname[0] == 'APFC'){//公務員
                                $komuin2++;
                            } elseif($schoolname[0] == 'ACET'){//自動車校
                                $jidousya2++;
                            }
                        }
                    }
                }
            }
	//DB切断
	dconnect($con);

    //学校判定した学生
	return array($system2,$creatib2,$business2,$gaigo2,$iryo2,$kentiku2,$komuin2,$jidousya2);
}
?>