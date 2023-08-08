<?php
include_once('./_common.php');

/*
$_POST['send_coin'] ='20';
$_POST['amt']='2000000000';
$_POST['receiver']='0x2d4be55565302C88F17C6AD797668737299FE830';
$_POST['eth_addr']='0xE095Ad1E7b9470010dEC93FBDba5E38cFCc0458E';
$_POST['sender']='97885852';
*/

$today = date("Y-m-d H:i:s");
$send_coin= $_POST['send_coin'];
$amount= $_POST['amt'];
$receiver = $_POST['receiver'];
$sender = $_POST['eth_addr'];
$mb_id = $_POST['sender'];
$balanced = $_POST['balanced'];

//교환은 GTT를 보내고 GTS를 받는다.
//GTT받는 쪽은 본사 이며 GTS를 받는 쪽은 회원이다.
//GTS를 본사에서 차감한다 (기본으로 얼마 이상 가진다)
//GTS를 회원 쪽에 증가한다. 

//발송자 (고객의 정보 : gts 값을 차감해준다.
/*
$sender_info  = $DB->get_member_info($data[sender]);
$out_pay[gts_point] = $sender_info[gts_point] + $data[gts];
$result1 = $DB->updateTable(MEM_TABLE, $out_pay, "where mem_id='".$sender_info[mem_id]."'");

$date = getVDate(0);
$data[tel]  = 0;
$data[gtt_token] =$amt/100000000;
$data[gts_point] = $data[gts];
$data[sender]   = trim($receiver);
$data[status] = 2;//처리상태
$data[mode] = 1;//거래형태
$data[take_id] =trim($sender) ;
$data[id] =trim($sender) ;
$data[d_regis] = $date['totime'];
$db_id	= $DB->insertTable(MEM_DEAL, $data);
*/

//수신자 (고객의 정보 : gts 값을 차감해준다.
/*
$recev_info  = $DB->get_member_info($data[receiver]);
$in_pay[mem_point] = $recev_info[mem_point] + $data[amt]/100000000;
$result2 = $DB->updateTable(MEM_TABLE, $in_pay, "where mem_id='".$recev_info[mem_id]."'");
*/

$update_sql = "update g5_member set mb_1 = '{$balanced}',mb_2 = '{$send_coin}' where mb_id = '{$mb_id}' ";
sql_query($update_sql);

$sql = "insert transfer_log set sender = '{$sender}', receiver = '{$receiver}', amount = '{$amount}', send_coin = '{$send_coin}',mb_id = '{$mb_id}' , od_date = '{$today}' ";
sql_query($sql);

echo json_encode(array("result" => "success",  "code" => "0001", "id" =>$mb_id));
?>
