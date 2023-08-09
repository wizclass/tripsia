<?php
if($member['mb_id'] == 'admin'){
$menu['menu750'] = array (
    array('300250', '공지사항관리(Notice)', G5_ADMIN_URL.'/bbs/board.php?bo_table=notice','',1),
    array('300200', '뉴스관리(News)', G5_ADMIN_URL.'/bbs/board.php?bo_table=news','',1),
    array('300300', '서포트(Support)', G5_ADMIN_URL.'/board_support.php','',1),
    array('300700', 'FAQ관리', G5_ADMIN_URL.'/faqmasterlist.php', 'scf_faq', 1),
    array('300400', 'KYC 회원인증', G5_ADMIN_URL.'/bbs/board.php?bo_table=kyc','',1),
    array('300500', '이용약관/개인정보 취급방침', G5_ADMIN_URL.'/bbs/board.php?bo_table=agreement','',1),
    array('700100', '팝업관리', ''.G5_ADMIN_URL.'/newwinlist.php', 'scf_poplayer'),
);
}else{
    $menu['menu300'] = array (
    array('300250', '공지사항관리(Notice)', G5_ADMIN_URL.'/bbs/board.php?bo_table=notice','',1),
    array('300200', '뉴스&공지게시판(News)', G5_ADMIN_URL.'/bbs/board.php?bo_table=notice','',1),
    array('300300', '서포트(Support)', G5_ADMIN_URL.'/board_support.php','',1),
    array('300700', 'FAQ관리', G5_ADMIN_URL.'/faqmasterlist.php', 'scf_faq', 1),
    array('300400', 'KYC 회원인증', G5_ADMIN_URL.'/bbs/board.php?bo_table=kyc','',1),
    array('300500', '이용약관/개인정보 취급방침', G5_ADMIN_URL.'/bbs/board.php?bo_table=agreement','',1),
    array('700100', '팝업관리', ''.G5_ADMIN_URL.'/newwinlist.php', 'scf_poplayer'),
    );
}
?>