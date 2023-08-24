<?
$is_debug = 0;

if(isset($_GET['debug'])){
  $is_debug = 1;
}

 if(strpos($_SERVER['HTTP_USER_AGENT'],'webview//1.0') !== false){ 
    $is_webview = true;
 }else{ 
    $is_webview = false;
 }

$Ether_API_KEY ="V3G3VI316K8BCTGDFQG6QGUAZ4MM1GN9WJ";


$title = "VCT :: Victor wallet";
$header_logo ="/wallet/images/victor/logo_header.png";
$main_logo = "";
$encrypt = "Y"; // 암호화 설정 Y:사용, N: 사용안함

/* 모드 설정*/
$pre_sql = "SELECT * FROM wallet_setting ";
$pre_row = sql_fetch($pre_sql);

if(strtolower($pre_row['mode']) == 'test'){
    $mode = 'test';
}

// if(isset($default['de_token_price'])){
//     $exchange_rate = $default['de_token_price']; // 교환시 비율
// }else{
//     $exchange_rate =1;
// }

if(strtolower($mode) == 'test'){
    //  테스트모드일때
    define('NETWORK','ropsten');
    define('ETHERSCAN_ENDPOINT','api-ropsten');
    define('VCT_COMPANY_ADDR','0x5Cc8C164F0cB14bf72E15C8021c27fdEb3313c8a');
    define('VCT_CONTRACT', '0x0b49e59bc424e9f616eb86fd3002757eab4c8a28'); // victor 테스트
    // define('VCT_CONTRACT', '0xcd20bc3d4fc1f5654ec8aca99a9c5b412b4f1696'); // GIO 테스트
}else{
  define('NETWORK','mainnet');
  define('ETHERSCAN_ENDPOINT','API');
  define('VCT_COMPANY_ADDR',$default['de_coin_account']);
  define('VCT_CONTRACT', '0x31C785fcbA8429e1E566a0110D75ee42687aac9B');
  // define('VCT_CONTRACT', '0x35ec9cd695fdd9b3af678a7a199f00aae1ad87d8');

}

define('Ether_API_KEY','V3G3VI316K8BCTGDFQG6QGUAZ4MM1GN9WJ');
define('PROJECT_ID','56c41b4d65e048f9acb9d73fe5844172');
define('WEB3_ENDPOINT','https://'.NETWORK.'.infura.io/v3/'.PROJECT_ID);


$token_arr = array(
  'vct'=>array(
    'addr'=>VCT_CONTRACT,
    'symbol'=>'USDT',
    'coin_img'=>'/img/victor/vct_coin.png',
    'coin_symbol_img'=>'/img/victor/token_symbol_circle.png',
    'decimal'=>'8',
    'decimal_numeric'=>'100000000',
    'color'=>'gold',
    'id'=>'Victor-K'
  )
);

$point_arr = array(
  'symbol'=>'MASK',
  'point_img'=>'/img/victor/point_symbol.png',
  'point_symbol_img'=>'/img/victor/point_symbol_circle.png',
  'color'=>'royalblue',
  'id'=>'mask'

);



if( isset($_REQUEST['token']) ){
  $_token= $token_arr[strtolower($_REQUEST['token'])];
}else{
  $_token= $token_arr['vct'];
}
$token_address = $_token['addr']; // 토큰 컨트렉트
$token_symbol = $_token['symbol']; // 코인 심볼
$token_img = $_token['coin_img']; // 코인이미지
$token_symbol_img = $_token['coin_symbol_img']; // 코인 심볼
$token_decimal = $_token['decimal']; // 자릿수
$token_color = $_token['color']; // 토큰컬러
$token_id = $_token['id']; // 토큰명
$token_decimal_numeric = $_token['decimal_numeric']; // 데시멜 0 갯수

// 포인트
$point_symbol = $point_arr['symbol'];
$point_img = $point_arr['point_img'];
$point_symbol_img = $point_arr['point_symbol_img'];
$point_id = $point_arr['id'];
?>

<?if(strtolower($mode) == 'test' && USE_WALLET){?>
    <div class='prev_mode' style='background:black;color:white;text-align:center'><?=strtoupper(NETWORK)?> TEST MODE</div>
<?}?>


<script>
    var WEB3_ENDPOINT = "<?=WEB3_ENDPOINT?>";
    var TokenContract = "<?=VCT_CONTRACT?>";
</script>
