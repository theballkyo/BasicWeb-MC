<?php
//mysql infomation
define("DB_HOST","127.0.0.1");
define("DB_USER","root");
define("DB_PW","1234");
define("DB_NAME","minecraft");

//เปิดรับสมัครสมาชิก ?
define("OP_REG",true);
//เปิด Donate ? # ให้ปรับเป็น false เท่านั้นเนื่องจากระบบ ยังไม่เสร็จ อาจมีปัญหาการปั้มตังได้หรือเติมแล้วเงินไม่เข้า!!!
define("OP_DONATE",false);

//Donate Setting --------------------------------------------------------------------------
// กำหนด API Passkey
define('API_PASSKEY', 'ใส่ API passkey ที่ช่องนี้เท่านั้น');
//อัตรา โดเนท
define("TMN_50","5000");// Point ที่ได้รับเมื่อเติมเงินราคา 50 บาท
define("TMN_90","9000");// Point ที่ได้รับเมื่อเติมเงินราคา 90 บาท
define("TMN_150","15000");// Point ที่ได้รับเมื่อเติมเงินราคา 150 บาท
define("TMN_300","30000");// Point ที่ได้รับเมื่อเติมเงินราคา 300 บาท
define("TMN_500","50000");// Point ที่ได้รับเมื่อเติมเงินราคา 500 บาท
define("TMN_1000","100000");// Point ที่ได้รับเมื่อเติมเงินราคา 1000 บาท
//END --------------------------------------------------------------------------------------

//Warnning ! *** if you don't know - don't edit!!! ***
//Set plugin iconomy
define("TB_ICONOMY","iconomy");
define("ICONOMY_FIELD_USER","username");
define("ICONOMY_FIELD_BALANCE","balance");

//install plugin jobs ?
define("JOBS",false);
//install plugin Pstone ?
define("PSTONES",false);
//install plugin iconomy
define("ICONOMY",false);
//install plugin auctionlife ?
define("AUCTIONLIFE",false);
define("AT_PREFIX","WA2_");

define("DB_AUTH","authme");
define("DB_AUTH_SETENCRYPT","sha1");
define("systemcheck","");

define("PATH_SKIN","images/skins/");	//ที่อยู่ของไดเรคทอรี่ เก็บสกินส่วนตัว
define("PATH_CLOAK","images/cloaks/");	//ที่อยู่ไดเรคทอรี่ เก็บผ้าคลุมส่วนตัว

?>