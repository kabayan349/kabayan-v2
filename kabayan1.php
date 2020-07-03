<?php
date_default_timezone_set('Asia/Jakarta');
include "function.php";
ulang:
    // function change(){
    echo color("red", "             SCRIPT GRATIS TIDAK DI JUAL \n");
    echo color("white", "           Time  : " . date('[d-m-Y] [H:i:s]') . "   \n");
    echo color("white", "                    Never Extinct         \n");
    echo color("white", "                  Format Kode 62*** \n");
    $nama = nama();
    $email = str_replace(" ", "", $nama) . mt_rand(100, 999);
    echo color("white", " NOMOR  : ");
    // $no = trim(fgets(STDIN));
    $nohp = trim(fgets(STDIN));
    $nohp = str_replace("62", "62", $nohp);
    $nohp = str_replace("(", "", $nohp);
    $nohp = str_replace(")", "", $nohp);
    $nohp = str_replace("-", "", $nohp);
    $nohp = str_replace(" ", "", $nohp);

    if (!preg_match('/[^+0-9]/', trim($nohp)))
    {
        if (substr(trim($nohp) , 0, 3) == '62')
        {
            $hp = trim($nohp);
        }
        else if (substr(trim($nohp) , 0, 1) == '0')
        {
            $hp = '62' . substr(trim($nohp) , 1);
        }
        elseif (substr(trim($nohp) , 0, 2) == '62')
        {
            $hp = '6' . substr(trim($nohp) , 1);
        }
        else
        {
            $hp = '1' . substr(trim($nohp) , 0, 13);
        }
    }
    $data = '{"email":"' . $email . '@gmail.com","name":"' . $nama . '","phone":"+' . $hp . '","signed_up_country":"ID"}';
    $register = request("/v5/customers", null, $data);
    if (strpos($register, '"otp_token"'))
    {
        $otptoken = getStr('"otp_token":"', '"', $register);
        echo color("white", " KODE OTP..") . "\n";
        otp:
            echo color("white", " Otp : ");
            $otp = trim(fgets(STDIN));
            $data1 = '{"client_name":"gojek:cons:android","data":{"otp":"' . $otp . '","otp_token":"' . $otptoken . '"},"client_secret":"83415d06-ec4e-11e6-a41b-6c40088ab51e"}';
            $verif = request("/v5/customers/phone/verify", null, $data1);
            if (strpos($verif, '"access_token"'))
            {
                echo color("white", "BERHASIL MENDAFTAR\n");
                $token = getStr('"access_token":"', '"', $verif);

                $myfile = fopen("sessions.txt", "w") or die("Unable to open file!");
                $txt = $token;
                fwrite($myfile, $txt);
                fclose($myfile);

                $uuid = getStr('"resource_owner_id":', ',', $verif);
                echo color("white", "+] Your access token : " . $token . "\n\n");
                save("token.txt", $token);
                echo color("white", "\n▬▬▬▬▬▬▬▬▬▬▬▬CLAIM VOUCHER▬▬▬▬▬▬▬▬▬▬▬▬");
                echo "\n" . color("white", "CLAIM A..");
                echo "\n" . color("white", " Please wait");
                for ($a = 1;$a <= 3;$a++)
                {
                    echo color("white", ".");
                    sleep(35);
                }
                $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2206"}');
                $message = fetch_value($code1, '"message":"', '"');
                if (strpos($code1, 'Promo kamu sudah bisa dipakai'))
                {
                    echo "\n" . color("green", "Message: " . $message);
                    gotogocar;
                }
                else
                {
                    echo "\n" . color("white", " Message: " . $message);
                    gocar:
                        echo "\n" . color("white", "CLAIM B.. ");
                        echo "\n" . color("white", " Please wait");
                        for ($a = 1;$a <= 3;$a++)
                        {
                            echo color("white", ".");
                            sleep(5);
                        }
                        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"COBAGOFOOD2206"}');
                        $message = fetch_value($code1, '"message":"', '"');
                        if (strpos($code1, 'Promo kamu sudah bisa dipakai.'))
                        {
                            echo "\n" . color("green", "Message: " . $message);
                            gotogofood;
                        }
                        else
                        {
                            echo "\n" . color("white", " Message: " . $message);
                            gofood:
                                echo "\n" . color("white", "CLAIM C..");
                                echo "\n" . color("white", " Please wait");
                                for ($a = 1;$a <= 3;$a++)
                                {
                                    echo color("white", ".");
                                    sleep(0);
                                }
                                $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":""}');
                                $message = fetch_value($code1, '"message":"', '"');
                                echo "\n" . color("white", " Message: " . $message);
                                sleep(2);
                                $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=13&page=1', $token);
                                $total = fetch_value($cekvoucher, '"total_vouchers":', ',');
                                $voucher1 = getStr1('"title":"', '",', $cekvoucher, "1");
                                $voucher2 = getStr1('"title":"', '",', $cekvoucher, "2");
                                $voucher3 = getStr1('"title":"', '",', $cekvoucher, "3");
                                $voucher4 = getStr1('"title":"', '",', $cekvoucher, "4");
                                $voucher5 = getStr1('"title":"', '",', $cekvoucher, "5");
                                $voucher6 = getStr1('"title":"', '",', $cekvoucher, "6");
                                $voucher7 = getStr1('"title":"', '",', $cekvoucher, "7");
                                $voucher8 = getStr1('"title":"', '",', $cekvoucher, "8");
                                $voucher9 = getStr1('"title":"', '",', $cekvoucher, "9");
                                $voucher10 = getStr1('"title":"', '",', $cekvoucher, "10");
                                $voucher11 = getStr1('"title":"', '",', $cekvoucher, "11");
                                $voucher12 = getStr1('"title":"', '",', $cekvoucher, "12");
                                $voucher13 = getStr1('"title":"', '",', $cekvoucher, "13");
                                echo "\n" . color("white", " Total voucher " . $total . " : ");
                                echo "\n" . color("white", " 1. " . $voucher1);
                                echo "\n" . color("white", " 2. " . $voucher2);
                                echo "\n" . color("white", " 3. " . $voucher3);
                                echo "\n" . color("white", " 4. " . $voucher4);
                                echo "\n" . color("white", " 5. " . $voucher5);
                                echo "\n" . color("white", " 6. " . $voucher6);
                                echo "\n" . color("white", " 7. " . $voucher7);
                                echo "\n" . color("white", " 8. " . $voucher8);
                                echo "\n" . color("white", " 9. " . $voucher9);
                                echo "\n" . color("white", " 10. " . $voucher10);
                                echo "\n" . color("white", " 11. " . $voucher11);
                                echo "\n" . color("white", " 12. " . $voucher12);
                                echo "\n" . color("white", " 13. " . $voucher13);
                                echo "\n";
                                $expired1 = getStr1('"expiry_date":"', '"', $cekvoucher, '1');
                                $expired2 = getStr1('"expiry_date":"', '"', $cekvoucher, '2');
                                $expired3 = getStr1('"expiry_date":"', '"', $cekvoucher, '3');
                                $expired4 = getStr1('"expiry_date":"', '"', $cekvoucher, '4');
                                $expired5 = getStr1('"expiry_date":"', '"', $cekvoucher, '5');
                                $expired6 = getStr1('"expiry_date":"', '"', $cekvoucher, '6');
                                $expired7 = getStr1('"expiry_date":"', '"', $cekvoucher, '7');
                                $expired8 = getStr1('"expiry_date":"', '"', $cekvoucher, '8');
                                $expired9 = getStr1('"expiry_date":"', '"', $cekvoucher, '9');
                                $expired10 = getStr1('"expiry_date":"', '"', $cekvoucher, '10');
                                $expired11 = getStr1('"expiry_date":"', '"', $cekvoucher, '11');
                                $expired12 = getStr1('"expiry_date":"', '"', $cekvoucher, '12');
                                $expired13 = getStr1('"expiry_date":"', '"', $cekvoucher, '13');



                                $myfile = fopen("sessions.txt", "r") or die("Unable to open file!");
$token = fread($myfile,filesize("sessions.txt"));



echo "\n".color("white","Claim maning?: y/n ");
        $pilihan = trim(fgets(STDIN));
        if($pilihan == "y" || $pilihan == "Y"){
        echo color("white","▬▬▬▬▬▬▬▬▬▬▬▬CLAIM VOUCHER▬▬▬▬▬▬▬▬▬▬▬▬");
        echo "\n".color("white","Claim A..");
        echo "\n".color("white","Please wait");
        for($a=1;$a<=3;$a++){
        echo color("white",".");
        sleep(1);
        }




        
        $code1 = request('/go-promotions/v1/promotions/enrollments', $token, '{"promo_code":"PESANGOFOOD2206"}');
        $message = fetch_value($code1,'"message":"','"');
        if(strpos($code1, 'Promo kamu sudah bisa dipakai')){
        echo "\n".color("green"," Message: ".$message);
        }else{
        echo "\n".color("white"," Message: ".$message);
        sleep(1);
        $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
        $total = fetch_value($cekvoucher,'"total_vouchers":',',');
        $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
        $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
        $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
        $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
        $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
        $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
        $voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
        $voucher8 = getStr1('"title":"','",',$cekvoucher,"8");
        $voucher9 = getStr1('"title":"','",',$cekvoucher,"9");
        $voucher10 = getStr1('"title":"','",',$cekvoucher,"10");
        $voucher11 = getStr1('"title":"','",',$cekvoucher,"11");
        $voucher12 = getStr1('"title":"','",',$cekvoucher,"12");
        $voucher13 = getStr1('"title":"','",',$cekvoucher,"13");
        $voucher14 = getStr1('"title":"','",',$cekvoucher,"14");
        $voucher15 = getStr1('"title":"','",',$cekvoucher,"15");
        echo "\n".color("white"," Total voucher ".$total." : ");
        echo "\n".color("white"," 1. ".$voucher1);
        echo "\n".color("white"," 2. ".$voucher2);
        echo "\n".color("white"," 3. ".$voucher3);
        echo "\n".color("white"," 4. ".$voucher4);
        echo "\n".color("white"," 5. ".$voucher5);
        echo "\n".color("white"," 6. ".$voucher6);
        echo "\n".color("white"," 7. ".$voucher7);
        echo "\n".color("white"," 8. ".$voucher8);
        echo "\n".color("white"," 9. ".$voucher9);
        echo "\n".color("white"," 10. ".$voucher10);
        echo "\n".color("white"," 11. ".$voucher11);
        echo "\n".color("white"," 12. ".$voucher12);
        echo "\n".color("white"," 13. ".$voucher13);
        echo "\n".color("white"," 14. ".$voucher14);
        echo "\n".color("white"," 15. ".$voucher15);
        $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
        $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
        $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
        $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
        $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
        $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
        $expired7 = getStr1('"expiry_date":"','"',$cekvoucher,'7');
        $expired8 = getStr1('"expiry_date":"','"',$cekvoucher,'8');
        $expired9 = getStr1('"expiry_date":"','"',$cekvoucher,'9');
        $expired10 = getStr1('"expiry_date":"','"',$cekvoucher,'10');
        $expired11 = getStr1('"expiry_date":"','"',$cekvoucher,'11');
        $expired12 = getStr1('"expiry_date":"','"',$cekvoucher,'12');
        $expired13 = getStr1('"expiry_date":"','"',$cekvoucher,'13');
        $expired14 = getStr1('"expiry_date":"','"',$cekvoucher,'14');
        $expired15 = getStr1('"expiry_date":"','"',$cekvoucher,'15');
        fclose($myfile);
        











        $myfile = fopen("sessions.txt", "r") or die("Unable to open file!");
        $token = fread($myfile,filesize("sessions.txt"));
        
        
        echo "\n".color("white","Claim terus ?: y/n ");
                $pilihan = trim(fgets(STDIN));
                if($pilihan == "y" || $pilihan == "Y"){
                echo color("white","▬▬▬▬▬▬▬▬▬▬▬▬CLAIM VOUCHER▬▬▬▬▬▬▬▬▬▬▬▬");
                $data = '{"referral_code":"G-ZDJYTYX"}';    
                $claim = request("/customer_referrals/v1/campaign/enrolment", $token, $data);
                $message = fetch_value($claim,'"message":"','"');
                if(strpos($claim, 'Promo kamu sudah bisa dipakai')){
                echo "\n".color("green"," Message: ".$message);
                gofood;
                }else{
                echo "\n".color("green"," Refferal: ".$message);
                sleep(1);
                $cekvoucher = request('/gopoints/v3/wallet/vouchers?limit=10&page=1', $token);
                $total = fetch_value($cekvoucher,'"total_vouchers":',',');
                $voucher1 = getStr1('"title":"','",',$cekvoucher,"1");
                $voucher2 = getStr1('"title":"','",',$cekvoucher,"2");
                $voucher3 = getStr1('"title":"','",',$cekvoucher,"3");
                $voucher4 = getStr1('"title":"','",',$cekvoucher,"4");
                $voucher5 = getStr1('"title":"','",',$cekvoucher,"5");
                $voucher6 = getStr1('"title":"','",',$cekvoucher,"6");
                $voucher7 = getStr1('"title":"','",',$cekvoucher,"7");
                $voucher8 = getStr1('"title":"','",',$cekvoucher,"8");
                $voucher9 = getStr1('"title":"','",',$cekvoucher,"9");
                $voucher10 = getStr1('"title":"','",',$cekvoucher,"10");
                $voucher11 = getStr1('"title":"','",',$cekvoucher,"11");
                $voucher12 = getStr1('"title":"','",',$cekvoucher,"12");
                $voucher13 = getStr1('"title":"','",',$cekvoucher,"13");
                $voucher14 = getStr1('"title":"','",',$cekvoucher,"14");
                $voucher15 = getStr1('"title":"','",',$cekvoucher,"15");
                echo "\n".color("white"," Total voucher ".$total." : ");
                echo "\n".color("white"," 1. ".$voucher1);
                echo "\n".color("white"," 2. ".$voucher2);
                echo "\n".color("white"," 3. ".$voucher3);
                echo "\n".color("white"," 4. ".$voucher4);
                echo "\n".color("white"," 5. ".$voucher5);
                echo "\n".color("white"," 6. ".$voucher6);
                echo "\n".color("white"," 7. ".$voucher7);
                echo "\n".color("white"," 8. ".$voucher8);
                echo "\n".color("white"," 9. ".$voucher9);
                echo "\n".color("white"," 10. ".$voucher10);
                echo "\n".color("white"," 11. ".$voucher11);
                echo "\n".color("white"," 12. ".$voucher12);
                echo "\n".color("white"," 13. ".$voucher13);
                echo "\n".color("white"," 14. ".$voucher14);
                echo "\n".color("white"," 15. ".$voucher15);
                $expired1 = getStr1('"expiry_date":"','"',$cekvoucher,'1');
                $expired2 = getStr1('"expiry_date":"','"',$cekvoucher,'2');
                $expired3 = getStr1('"expiry_date":"','"',$cekvoucher,'3');
                $expired4 = getStr1('"expiry_date":"','"',$cekvoucher,'4');
                $expired5 = getStr1('"expiry_date":"','"',$cekvoucher,'5');
                $expired6 = getStr1('"expiry_date":"','"',$cekvoucher,'6');
                $expired7 = getStr1('"expiry_date":"','"',$cekvoucher,'7');
                $expired8 = getStr1('"expiry_date":"','"',$cekvoucher,'8');
                $expired9 = getStr1('"expiry_date":"','"',$cekvoucher,'9');
                $expired10 = getStr1('"expiry_date":"','"',$cekvoucher,'10');
                $expired11 = getStr1('"expiry_date":"','"',$cekvoucher,'11');
                $expired12 = getStr1('"expiry_date":"','"',$cekvoucher,'12');
                $expired13 = getStr1('"expiry_date":"','"',$cekvoucher,'13');
                $expired14 = getStr1('"expiry_date":"','"',$cekvoucher,'14');
                $expired15 = getStr1('"expiry_date":"','"',$cekvoucher,'15');
                fclose($myfile);
        
        
        
                 }
          }
        















         }
  }








                                
                                }
                            }
                        }
                        else
                        {
                            echo color("white", "-] OTP SALAH");
                            echo "\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
                            echo color("white", "!] INPUT ULANG..\n");
                            gotootp;
                        }
                    }
                    else
                    {
                        echo color("white", "-] NOMOR SALAH");
                        echo "\n▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬▬\n\n";
                        echo color("white", "!] MASUKAN LAGI\n");
                        ulang;
                    }
                    //  }
                    
