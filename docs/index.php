<?php

function tox($mes) {
	if ($mes == '01') {
		$x='января';
	}
	if ($mes == '02') {
		$x='февраля';
	}
	
	if ($mes == '03') {
		$x='марта';
	}
	
	if ($mes == '04') {
		$x='апреля';
	}
	
	if ($mes == '05') {
		$x='мая';
	}
	
	if ($mes == '06') {
		$x='июня';
	}
	
	if ($mes == '07') {
		$x='июля';
	}
	
	if ($mes == '08') {
		$x='августа';
	}
	
	if ($mes == '09') {
		$x='сентября';
	}
	
	if ($mes == '10') {
		$x='октября';
	}
	
	if ($mes == '11') {
		$x='ноября';
	}
	if ($mes == '12') {
		$x='декабря';
	}
	
	
	return($x);
}


function tocur() {
$fpa = fopen('./cur', 'w');	
	$doc_date=$_REQUEST['doc_date'];
	$fam=$_REQUEST['fam'];
	$fam_lat=$_REQUEST['fam_lat'];
	$ima=$_REQUEST['ima'];
	$ima_lat=$_REQUEST['ima_lat'];
	$rod=$_REQUEST['rod'];
	$pol=$_REQUEST['pol'];
	$strana=$_REQUEST['strana'];
	$gorod=$_REQUEST['gorod'];
	
	$pass_num=$_REQUEST['pass_num'];
	$pass_s=$_REQUEST['pass_s'];
	$pass_do=$_REQUEST['pass_do'];
	$pass_who=$_REQUEST['pass_who'];
	$pass_spisok=$_REQUEST['pass_spisok'];
	$pass_man=$_REQUEST['pass_man'];
	
	$card_num=$_REQUEST['card_num'];	
	$card_s=$_REQUEST['card_s'];
	$card_do=$_REQUEST['card_do'];
	$card_date=$_REQUEST['card_date'];
	
	$visa_ser=$_REQUEST['visa_ser'];
	$visa_s=$_REQUEST['visa_s'];	
	$visa_num=$_REQUEST['visa_num'];
	$visa_po=$_REQUEST['visa_po'];
	$visa_date=$_REQUEST['visa_date'];	
	$visa_id=$_REQUEST['visa_id'];
	$visa_prodl=$_REQUEST['visa_prodl'];	
	$visa_prig=$_REQUEST['visa_prig'];
	$visa_vesd=$_REQUEST['visa_vesd'];	
	
	$mig_ser=$_REQUEST['mig_ser'];	
	$mig_num=$_REQUEST['mig_num'];
	
	$uved=$_REQUEST['uved'];	
	
	$pass_who='hand';
	
	fwrite ($fpa, $doc_date."\r\n");
	fwrite ($fpa,$fam."\r\n");
	fwrite ($fpa,$fam_lat."\r\n");
	fwrite ($fpa,$ima."\r\n");
	fwrite ($fpa,$ima_lat."\r\n");
	fwrite ($fpa,$rod."\r\n");	
	fwrite ($fpa,$pol."\r\n");
	fwrite ($fpa,$strana."\r\n");
	fwrite ($fpa,$gorod."\r\n");	
	
	fwrite ($fpa, $pass_num."\r\n");
	fwrite ($fpa,$pass_s."\r\n");
	fwrite ($fpa,$pass_do."\r\n");
	fwrite ($fpa,$pass_who."\r\n");
	fwrite ($fpa,$pass_spisok."\r\n");
	fwrite ($fpa,$pass_man."\r\n");
	
	fwrite ($fpa,$card_num."\r\n");
	fwrite ($fpa,$card_s."\r\n");
	fwrite ($fpa,$card_do."\r\n");
	fwrite ($fpa,$card_date."\r\n");
	
	fwrite ($fpa,$visa_ser."\r\n");
	fwrite ($fpa,$visa_s."\r\n");
	fwrite ($fpa,$visa_num."\r\n");
	fwrite ($fpa,$visa_po."\r\n");
	fwrite ($fpa,$visa_date."\r\n");
	fwrite ($fpa,$visa_id."\r\n");
	fwrite ($fpa,$visa_prodl."\r\n");
	fwrite ($fpa,$visa_prig."\r\n");
	fwrite ($fpa,$visa_vesd."\r\n");
	
	fwrite ($fpa,$mig_ser."\r\n");
	fwrite ($fpa,$mig_num."\r\n");
	
	fwrite ($fpa,$uved."\r\n");		
	
	
fclose($fpa);



}

tocur();

if ($_REQUEST['what'] == 'load') {
	@unlink('./cur');
////////////////////////////////////////////////	
if (isset($_FILES['xml'])) {	
$fileTmpPath = $_FILES['xml']['tmp_name'];
move_uploaded_file($fileTmpPath, './tmp.xml');	
$fpa = fopen('./tmp.xml', 'r');
	while (! feof($fpa)) {
    $trad=trim(fgets($fpa));
	
	
if (strpos($trad, '/name>')) {
$ima=strip_tags($trad);
}
if (strpos($trad, '/nameLat>')) {
$ima_lat=strip_tags($trad);
}
if (strpos($trad, '/surname>')) {
$fam=strip_tags($trad);
}
if (strpos($trad, '/surnameLat>')) {
$fam_lat=strip_tags($trad);
}

if (strpos($trad, 'dateBirthday')) {
$rod=strip_tags($trad);
}
if (strpos($trad, 'gender')) {
$pol=strip_tags($trad);
}
if (strpos($trad, 'country')) {
$strana=strip_tags($trad);
}

if (strpos($trad, '/place')) {
$gorod=strip_tags($trad);
}

if (strpos($trad, 'passportNumber')) {
$pass_num=strip_tags($trad);
}
if (strpos($trad, 'passportDateStart')) {
$pass_s=strip_tags($trad);
}
if (strpos($trad, 'passportDateEnd')) {
$pass_do=strip_tags($trad);
}
if (strpos($trad, 'workPermitNumber')) {
$card_num=strip_tags($trad);
}
if (strpos($trad, 'workPermitDateStart')) {
$card_s=strip_tags($trad);
}
if (strpos($trad, 'workPermitDateEnd')) {
$card_do=strip_tags($trad);
}
if (strpos($trad, 'workPermitDate>')) {
$card_date=strip_tags($trad);
}
if (strpos($trad, 'visaNumber>')) {
$visa_num=strip_tags($trad);
}
if (strpos($trad, 'visaSeries')) {
$visa_ser=strip_tags($trad);
}
if (strpos($trad, 'visaId')) {
$visa_id=strip_tags($trad);
}
if (strpos($trad, 'visaNumberInvite')) {
$visa_prig=strip_tags($trad);
}

if (strpos($trad, 'visaDate>')) {
$visa_date=strip_tags($trad);
}

if (strpos($trad, '/visaDateStart>')) {
$visa_s=strip_tags($trad);
}

if (strpos($trad, '/visaDateEnd>')) {
$visa_po=strip_tags($trad);
}

if (strpos($trad, '/visaDateProlong>')) {
$visa_prodl=strip_tags($trad);
}

if (strpos($trad, '/entryDate>')) {
$visa_vesd=strip_tags($trad);
}

if (strpos($trad, '/documentDate>')) {
$doc_date=strip_tags($trad);
}

if (strpos($trad, '/migrationCardSeries>')) {
$mig_ser=strip_tags($trad);
}

if (strpos($trad, '/migrationCardNumber>')) {
$mig_num=strip_tags($trad);
}

if (strpos($trad, 'documentAdDisDate')) {
$uved=strip_tags($trad);
}

if (strpos($trad, 'immigrationDepartment>')) {
$pass_man=strip_tags($trad);
$pass_who='hand';

}



	}
fclose($fpa);
$fpa = fopen('./cur', 'w');
	fwrite ($fpa, $doc_date."\r\n");
	fwrite ($fpa,$fam."\r\n");
	fwrite ($fpa,$fam_lat."\r\n");
	fwrite ($fpa,$ima."\r\n");
	fwrite ($fpa,$ima_lat."\r\n");
	fwrite ($fpa,$rod."\r\n");	
	fwrite ($fpa,$pol."\r\n");
	fwrite ($fpa,$strana."\r\n");
	fwrite ($fpa,$gorod."\r\n");	
	fwrite ($fpa, $pass_num."\r\n");
	fwrite ($fpa,$pass_s."\r\n");
	fwrite ($fpa,$pass_do."\r\n");
	fwrite ($fpa,$pass_who."\r\n");
	fwrite ($fpa,$pass_spisok."\r\n");
	fwrite ($fpa,$pass_man."\r\n");
	fwrite ($fpa,$card_num."\r\n");
	fwrite ($fpa,$card_s."\r\n");
	fwrite ($fpa,$card_do."\r\n");
	fwrite ($fpa,$card_date."\r\n");
	fwrite ($fpa,$visa_ser."\r\n");
	fwrite ($fpa,$visa_s."\r\n");
	fwrite ($fpa,$visa_num."\r\n");
	fwrite ($fpa,$visa_po."\r\n");
	fwrite ($fpa,$visa_date."\r\n");
	fwrite ($fpa,$visa_id."\r\n");
	fwrite ($fpa,$visa_prodl."\r\n");
	fwrite ($fpa,$visa_prig."\r\n");
	fwrite ($fpa,$visa_vesd."\r\n");
	fwrite ($fpa,$mig_ser."\r\n");
	fwrite ($fpa,$mig_num."\r\n");
	fwrite ($fpa,$uved."\r\n");		
fclose($fpa);	
}	
///////////////////////////////////////////////	
}

if (file_exists('./cur'))	{
$fpa = fopen('./cur', 'r');	


$doc_date=trim(fgets($fpa)); $DocumentDate=$doc_date; @list($DocumentDateDay, $DocumentDateMonth, $DocumentDateYear) = explode('.', $doc_date);
$fam=trim(fgets($fpa));  $Surname=$fam; 
$fam_lat=trim(fgets($fpa)); $SurnameLat=$fam_lat; 
$ima=trim(fgets($fpa)); $Name=$ima; 
$ima_lat=trim(fgets($fpa)); $NameLat=$ima_lat;
$rod=trim(fgets($fpa)); $DateBirthday=$rod; @list($DateBirthdayDay, $DateBirthdayMonth, $DateBirthdayYear) = explode('.', $DateBirthday);
$pol=trim(fgets($fpa)); $Gender=$pol;
$strana=trim(fgets($fpa)); $Country=$strana;
$gorod=trim(fgets($fpa)); $Place=$gorod;

$pass_num=trim(fgets($fpa)); $PassportNumber=$pass_num;
$pass_s=trim(fgets($fpa)); $PassportDateStart=$pass_s; @list($PassportDateStartDay, $PassportDateStartMonth, $PassportDateStartYear) = explode('.', $PassportDateStart);
$pass_do=trim(fgets($fpa)); $PassportDateEnd=$pass_do; @list($PassportDateEndDay, $PassportDateEndMonth, $PassportDateEndYear) = explode('.', $PassportDateEnd);
$pass_who=trim(fgets($fpa));
$pass_spisok=trim(fgets($fpa));
$pass_man=trim(fgets($fpa)); $ImmigrationDepartment=$pass_man;

$card_num=trim(fgets($fpa)); $WorkPermitNumber=$card_num;
$card_s=trim(fgets($fpa)); $WorkPermitDateStart=$card_s; @list($WorkPermitDateStartDay, $WorkPermitDateStartMonth, $WorkPermitDateStartYear) = explode('.', $workPermitDateStart);
$card_do=trim(fgets($fpa)); $WorkPermitDateEnd=$card_do; @list($WorkPermitDateEndDay, $WorkPermitDateEndMonth, $WorkPermitDateEndYear) = explode('.', $workPermitDateEnd);
$card_date=trim(fgets($fpa)); $WorkPermitDate=$card_date; @list($WorkPermitDateDay, $WorkPermitDateMonth, $WorkPermitDateYear) = explode('.', $workPermitDate);

$visa_ser=trim(fgets($fpa)); $VisaSeries=$visa_ser;
$visa_s=trim(fgets($fpa)); $VisaDateStart=$visa_s; @list($VisaDateStartDay, $VisaDateStartMonth, $VisaDateStartYear) = explode('.', $VisaDateStart);
$visa_num=trim(fgets($fpa)); $VisaNumber=$visa_num;
$visa_po=trim(fgets($fpa)); $VisaDateEnd=$visa_po; @list($VisaDateEndDay, $VisaDateEndMonth, $VisaDateEndYear) = explode('.', $VisaDateEnd);
$visa_date=trim(fgets($fpa)); $VisaDate=$visa_date; @list($VisaDateDay, $VisaDateMonth, $VisaDateYear) = explode('.', $VisaDate);
$visa_id=trim(fgets($fpa)); $VisaId=$visa_id;
$visa_prodl=trim(fgets($fpa)); $VisaDateProlong=$visa_prodl; @list($VisaDateProlongDay, $VisaDateProlongMonth, $VisaDateProlongYear) = explode('.', $VisaDateProlong);
$visa_prig=trim(fgets($fpa)); $VisaNumberInvite=$visa_prig;
$visa_vesd=trim(fgets($fpa)); $EntryDate=$visa_vesd; @list($EntryDateDay, $EntryDateMonth, $EntryDateYear) = explode('.', $EntryDate);

$mig_ser=trim(fgets($fpa)); $MigrationCardSeries=$mig_ser;
$mig_num=trim(fgets($fpa)); $MigrationCardNumber=$mig_num;
$uved=trim(fgets($fpa)); $DocumentAdDisDate=$uved; @list($DocumentAdDisDateDay, $DocumentAdDisDateMonth, $DocumentAdDisDateYear) = explode('.', $DocumentAdDisDate);
fclose($fpa);



}







if ($_REQUEST['what'] == 'save') {
	$z='./'.$fam.'_'.$ima.'.xml';
//	$z = iconv('utf-8', 'windows-1251', $z);

$fpa = fopen($z, 'w');	
fwrite($fpa, '<?xml version="1.0" encoding="utf-8"?>'."\r\n");
fwrite($fpa, '<person>'."\r\n");
  fwrite($fpa, '  <name>'.$ima.'</name>'."\r\n");
  fwrite($fpa, '  <nameLat>'.$ima_lat.'</nameLat>'."\r\n");
  fwrite($fpa, '  <surname>'.$fam.'</surname>'."\r\n");
  fwrite($fpa, '  <surnameLat>'.$fam_lat.'</surnameLat>'."\r\n");
  fwrite($fpa, '  <dateBirthday>'.$rod.'</dateBirthday>'."\r\n");
  fwrite($fpa, '  <gender>'.$pol.'</gender>'."\r\n");
  fwrite($fpa, '  <country>'.$strana.'</country>'."\r\n");
  fwrite($fpa, '  <place>'.$gorod.'</place>'."\r\n");
  fwrite($fpa, '  <passportNumber>'.$pass_num.'</passportNumber>'."\r\n");
  fwrite($fpa, '  <passportDateStart>'.$pass_s.'</passportDateStart>'."\r\n");
  fwrite($fpa, '  <passportDateEnd>'.$pass_do.'</passportDateEnd>'."\r\n");
  fwrite($fpa, '  <workPermitNumber>'.$card_num.'</workPermitNumber>'."\r\n");
  fwrite($fpa, '  <workPermitDateStart>'.$card_s.'</workPermitDateStart>'."\r\n");
  fwrite($fpa, '  <workPermitDateEnd>'.$card_do.'</workPermitDateEnd>'."\r\n");
  fwrite($fpa, '  <workPermitDate>'.$card_date.'</workPermitDate>'."\r\n");
  fwrite($fpa, '  <visaNumber>'.$visa_num.'</visaNumber>'."\r\n");
  fwrite($fpa, '  <visaSeries>'.$visa_ser.'</visaSeries>'."\r\n");
  fwrite($fpa, '  <visaId>'.$visa_id.'</visaId>'."\r\n");
  fwrite($fpa, '  <visaNumberInvite>'.$visa_prig.'</visaNumberInvite>'."\r\n");
  fwrite($fpa, '  <visaDate>'.$visa_date.'</visaDate>'."\r\n");
  fwrite($fpa, '  <visaDateStart>'.$visa_s.'</visaDateStart>'."\r\n");
  fwrite($fpa, '  <visaDateEnd>'.$visa_po.'</visaDateEnd>'."\r\n");
  fwrite($fpa, '  <visaDateProlong>'.$visa_prodl.'</visaDateProlong>'."\r\n");
  fwrite($fpa, '  <entryDate>'.$visa_vesd.'</entryDate>'."\r\n");
  fwrite($fpa, '  <documentDate>'.$doc_date.'</documentDate>'."\r\n");
  fwrite($fpa, '  <immigrationDepartment>'.$pass_man.'</immigrationDepartment>'."\r\n");
  fwrite($fpa, '  <migrationCardSeries>'.$mig_ser.'</migrationCardSeries>'."\r\n");
  fwrite($fpa, '  <migrationCardNumber>'.$mig_num.'</migrationCardNumber>'."\r\n");
  fwrite($fpa, '  <documentAdDisDate>'.$uved.'</documentAdDisDate>'."\r\n");
fwrite($fpa, '</person>'."\r\n");

fclose($fpa);

if ($_REQUEST['knop'] == 'Сохранить') {
echo ('<script type="text/javascript"> window.open("./dload.php?t=xml&url='.$fam.'_'.$ima.'.xml", "_blank"); </script>');
}





if ($_REQUEST['knop'] == 'Очистить') {
if(empty($_POST['xdoc_date'])) {
$doc_date='';
}
if(empty($_POST['xfam'])) {
$fam='';
}
if(empty($_POST['xfam_lat'])) {
$fam_lat='';
}
if(empty($_POST['xima'])) {
$ima='';
}
if(empty($_POST['xima_lat'])) {
$ima_lat='';
}
if(empty($_POST['xrod'])) {
$rod='';
}
if(empty($_POST['xpol'])) {
$pol='';
}
if(empty($_POST['xstrana'])) {
$strana='';
}
if(empty($_POST['xgorod'])) {
$gorod='';
}

if(empty($_POST['xpass_num'])) {
$pass_num='';
}
if(empty($_POST['xpass_s'])) {
$pass_s='';
}
if(empty($_POST['xpass_do'])) {
$pass_do='';
}
if(empty($_POST['xpass_who'])) {
$pass_who='';
}
if(empty($_POST['xpass_spisok'])) {
$pass_spisok='';
}
if(empty($_POST['xpass_man'])) {
$pass_man='';
}

if(empty($_POST['xcard_num'])) {
$card_num='';
}
if(empty($_POST['xcard_s'])) {
$card_s='';
}
if(empty($_POST['xcard_do'])) {
$card_do='';
}
if(empty($_POST['xcard_date'])) {
$card_date='';
}

if(empty($_POST['xvisa_ser'])) {
$visa_ser='';
};
if(empty($_POST['xvisa_s'])) {
$visa_s='';
}
if(empty($_POST['xvisa_num'])) {
$visa_num='';
}
if(empty($_POST['xvisa_po'])) {
$visa_po='';
}
if(empty($_POST['xvisa_date'])) {
$visa_date='';
}
if(empty($_POST['xvisa_id'])) {
$visa_id='';
}
if(empty($_POST['xvisa_prodl'])) {
$visa_prodl='';
}
if(empty($_POST['xvisa_prig'])) {
$visa_prig='';
}
if(empty($_POST['xvisa_vesd'])) {
$visa_vesd='';
}

if(empty($_POST['xmig_ser'])) {
$mig_ser='';
}
if(empty($_POST['xmig_num'])) {
$mig_num='';
}

if(empty($_POST['xuved'])) {
$uved='';
}






}




if ($_REQUEST['doc'] == 'РНР') {
$isok=1;
if ($doc_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("doc_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam=='') {
$isok=0;
$valid=$valid.'document.getElementById("fam").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("fam_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima=='') {
$isok=0;
$valid=$valid.'document.getElementById("ima").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("ima_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($rod=='') {
$isok=0;
$valid=$valid.'document.getElementById("rod").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pol=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pol").style.backgroundColor="pink"; '."\r\n"; 
}
if ($strana=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("strana").style.backgroundColor="pink"; '."\r\n"; 
}
if ($gorod=='') {
$isok=0;
$valid=$valid.'document.getElementById("gorod").style.backgroundColor="pink"; '."\r\n"; 
}

if ($pass_num=='') {
$isok=0;
$valid=$valid.'document.getElementById("pass_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_s=='') {
$isok=0;
$valid=$valid.'document.getElementById("pass_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_do=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_who=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_who").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_spisok=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_spisok").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_man=='') {
$isok=0;
$valid=$valid.'document.getElementById("pass_man").style.backgroundColor="pink"; '."\r\n"; 
}

if ($card_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_s=='') {
$isok=0;
$valid=$valid.'document.getElementById("card_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_do=='') {
$isok=0;
$valid=$valid.'document.getElementById("card_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_date").style.backgroundColor="pink"; '."\r\n"; 
}

if ($visa_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_ser").style.backgroundColor="pink"; '."\r\n"; 
};
if ($visa_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_po=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_po").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_id=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_id").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prodl=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prodl").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prig=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prig").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_vesd=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_vesd").style.backgroundColor="pink"; '."\r\n"; 
}

if ($mig_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_ser").style.backgroundColor="pink"; '."\r\n"; 
}
if ($mig_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_num").style.backgroundColor="pink"; '."\r\n"; 
}

if ($uved=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("uved").style.backgroundColor="pink"; '."\r\n"; 
}

if ($valid != '') {
	$valid=$valid.'alert("Невозможно сгенерировать '.$_REQUEST['doc'].' - одно или несколько полей не заполнены.");'."\r\n";
}

///////ESLI OK РНР///////////
if ($isok > 0) {
$f1='./'.$_REQUEST['doc'].'.docx';
$f2='./'.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
$f3=$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';


	
$f1 = iconv('utf-8', 'windows-1251', $f1);
//$f2 = iconv('utf-8', 'windows-1251', $f2);
//$f3 = iconv('utf-8', 'windows-1251', $f3);
//$f2 = './1.docx';
@unlink('./1.docx');
if (file_exists($f1)) {
@copy($f1, './1.docx');

$zip = new ZipArchive;
$fileToModify = 'word/document.xml';
if ($zip->open('./1.docx') === TRUE) {
    //Read contents into memory
    $theContents = $zip->getFromName($fileToModify);
    //Modify contents:
	
require('./rep.php');

	//Delete the old...
    $zip->deleteName($fileToModify);
    //Write the new...
    $zip->addFromString($fileToModify, $theContents);
    //And write back to the filesystem.
    $zip->close();
  //  echo 'ok';
} else {
  //  echo 'failed';
}

@copy('./1.docx', $f2);
echo ('<script type="text/javascript"> window.open("./dload.php?t=doc&url='.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx'.'", "_blank"); </script>');
}
}
/////////////////////////////
}








if ($_REQUEST['doc'] == 'Приглашение') {
$isok=1;
if ($doc_date=='') {
$isok=0;
$valid=$valid.'document.getElementById("doc_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("fam").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam_lat=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("fam_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("ima").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima_lat=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("ima_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($rod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("rod").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pol=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pol").style.backgroundColor="pink"; '."\r\n"; 
}
if ($strana=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("strana").style.backgroundColor="pink"; '."\r\n"; 
}
if ($gorod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("gorod").style.backgroundColor="pink"; '."\r\n"; 
}

if ($pass_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_do=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_who=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_who").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_spisok=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_spisok").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_man=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_man").style.backgroundColor="pink"; '."\r\n"; 
}

if ($card_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_do=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_date").style.backgroundColor="pink"; '."\r\n"; 
}

if ($visa_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_ser").style.backgroundColor="pink"; '."\r\n"; 
};
if ($visa_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_po=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_po").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_id=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_id").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prodl=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prodl").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prig=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prig").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_vesd=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_vesd").style.backgroundColor="pink"; '."\r\n"; 
}

if ($mig_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_ser").style.backgroundColor="pink"; '."\r\n"; 
}
if ($mig_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_num").style.backgroundColor="pink"; '."\r\n"; 
}

if ($uved=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("uved").style.backgroundColor="pink"; '."\r\n"; 
}

if ($valid != '') {
	$valid=$valid.'alert("Невозможно сгенерировать '.$_REQUEST['doc'].' - одно или несколько полей не заполнены.");'."\r\n";
}

///////ESLI OK РНР///////////
if ($isok > 0) {
$f1='./'.$_REQUEST['doc'].'.docx';
$f2='./'.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
$f3=$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
	
$f1 = iconv('utf-8', 'windows-1251', $f1);
//$f2 = iconv('utf-8', 'windows-1251', $f2);
//$f3 = iconv('utf-8', 'windows-1251', $f3);
//$f2 = './1.docx';
@unlink('./1.docx');
if (file_exists($f1)) {
@copy($f1, './1.docx');

$zip = new ZipArchive;
$fileToModify = 'word/document.xml';
if ($zip->open('./1.docx') === TRUE) {
    //Read contents into memory
    $theContents = $zip->getFromName($fileToModify);
    //Modify contents:
	
require('./rep.php');

	//Delete the old...
    $zip->deleteName($fileToModify);
    //Write the new...
    $zip->addFromString($fileToModify, $theContents);
    //And write back to the filesystem.
    $zip->close();
  //  echo 'ok';
} else {
  //  echo 'failed';
}

@copy('./1.docx', $f2);
echo ('<script type="text/javascript"> window.open("./dload.php?t=doc&url='.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx'.'", "_blank"); </script>');
}
}
/////////////////////////////
}









if ($_REQUEST['doc'] == 'Гарантийное') {
$isok=1;
if ($doc_date=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("doc_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("fam").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("fam_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("ima").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("ima_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($rod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("rod").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pol=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pol").style.backgroundColor="pink"; '."\r\n"; 
}
if ($strana=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("strana").style.backgroundColor="pink"; '."\r\n"; 
}
if ($gorod=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("gorod").style.backgroundColor="pink"; '."\r\n"; 
}

if ($pass_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_do=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_who=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_who").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_spisok=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_spisok").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_man=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_man").style.backgroundColor="pink"; '."\r\n"; 
}

if ($card_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_do=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_date").style.backgroundColor="pink"; '."\r\n"; 
}

if ($visa_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_ser").style.backgroundColor="pink"; '."\r\n"; 
};
if ($visa_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_po=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_po").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_id=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_id").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prodl=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prodl").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prig=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prig").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_vesd=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_vesd").style.backgroundColor="pink"; '."\r\n"; 
}

if ($mig_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_ser").style.backgroundColor="pink"; '."\r\n"; 
}
if ($mig_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_num").style.backgroundColor="pink"; '."\r\n"; 
}

if ($uved=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("uved").style.backgroundColor="pink"; '."\r\n"; 
}

if ($valid != '') {
	$valid=$valid.'alert("Невозможно сгенерировать '.$_REQUEST['doc'].' - одно или несколько полей не заполнены.");'."\r\n";
}

///////ESLI OK РНР///////////
if ($isok > 0) {
$f1='./'.$_REQUEST['doc'].'.docx';
$f2='./'.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
$f3=$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
	
$f1 = iconv('utf-8', 'windows-1251', $f1);
//$f2 = iconv('utf-8', 'windows-1251', $f2);
//$f3 = iconv('utf-8', 'windows-1251', $f3);
//$f2 = './1.docx';
@unlink('./1.docx');
if (file_exists($f1)) {
@copy($f1, './1.docx');

$zip = new ZipArchive;
$fileToModify = 'word/document.xml';
if ($zip->open('./1.docx') === TRUE) {
    //Read contents into memory
    $theContents = $zip->getFromName($fileToModify);
    //Modify contents:
	
require('./rep.php');

	//Delete the old...
    $zip->deleteName($fileToModify);
    //Write the new...
    $zip->addFromString($fileToModify, $theContents);
    //And write back to the filesystem.
    $zip->close();
  //  echo 'ok';
} else {
  //  echo 'failed';
}

@copy('./1.docx', $f2);
echo ('<script type="text/javascript"> window.open("./dload.php?t=doc&url='.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx'.'", "_blank"); </script>');
}
}
/////////////////////////////
}









if ($_REQUEST['doc'] == 'Виза') {
$isok=1;
if ($doc_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("doc_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("fam").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam_lat=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("fam_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("ima").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima_lat=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("ima_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($rod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("rod").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pol=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pol").style.backgroundColor="pink"; '."\r\n"; 
}
if ($strana=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("strana").style.backgroundColor="pink"; '."\r\n"; 
}
if ($gorod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("gorod").style.backgroundColor="pink"; '."\r\n"; 
}

if ($pass_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_do=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_who=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_who").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_spisok=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_spisok").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_man=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_man").style.backgroundColor="pink"; '."\r\n"; 
}

if ($card_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_do=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_date").style.backgroundColor="pink"; '."\r\n"; 
}

if ($visa_ser=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_ser").style.backgroundColor="pink"; '."\r\n"; 
};
if ($visa_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_po=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_po").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_id=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_id").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prodl=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prodl").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prig=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_prig").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_vesd=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_vesd").style.backgroundColor="pink"; '."\r\n"; 
}

if ($mig_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_ser").style.backgroundColor="pink"; '."\r\n"; 
}
if ($mig_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_num").style.backgroundColor="pink"; '."\r\n"; 
}

if ($uved=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("uved").style.backgroundColor="pink"; '."\r\n"; 
}

if ($valid != '') {
	$valid=$valid.'alert("Невозможно сгенерировать '.$_REQUEST['doc'].' - одно или несколько полей не заполнены.");'."\r\n";
}

///////ESLI OK РНР///////////
if ($isok > 0) {
$f1='./'.$_REQUEST['doc'].'.docx';
$f2='./'.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
$f3=$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
	
$f1 = iconv('utf-8', 'windows-1251', $f1);
//$f2 = iconv('utf-8', 'windows-1251', $f2);
//$f3 = iconv('utf-8', 'windows-1251', $f3);
//$f2 = './1.docx';
@unlink('./1.docx');
if (file_exists($f1)) {
@copy($f1, './1.docx');

$zip = new ZipArchive;
$fileToModify = 'word/document.xml';
if ($zip->open('./1.docx') === TRUE) {
    //Read contents into memory
    $theContents = $zip->getFromName($fileToModify);
    //Modify contents:
	
require('./rep.php');

	//Delete the old...
    $zip->deleteName($fileToModify);
    //Write the new...
    $zip->addFromString($fileToModify, $theContents);
    //And write back to the filesystem.
    $zip->close();
  //  echo 'ok';
} else {
  //  echo 'failed';
}

@copy('./1.docx', $f2);
echo ('<script type="text/javascript"> window.open("./dload.php?t=doc&url='.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx'.'", "_blank"); </script>');
}
}
/////////////////////////////
}









if ($_REQUEST['doc'] == 'Письмо') {
$isok=1;
if ($doc_date=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("doc_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("fam").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam_lat=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("fam_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("ima").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima_lat=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("ima_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($rod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("rod").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pol=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pol").style.backgroundColor="pink"; '."\r\n"; 
}
if ($strana=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("strana").style.backgroundColor="pink"; '."\r\n"; 
}
if ($gorod=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("gorod").style.backgroundColor="pink"; '."\r\n"; 
}

if ($pass_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_do=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_who=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_who").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_spisok=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_spisok").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_man=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_man").style.backgroundColor="pink"; '."\r\n"; 
}

if ($card_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_do=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_date").style.backgroundColor="pink"; '."\r\n"; 
}

if ($visa_ser=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_ser").style.backgroundColor="pink"; '."\r\n"; 
};
if ($visa_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_po=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_po").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_id=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_id").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prodl=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_prodl").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prig=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prig").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_vesd=='') {
$isok=0;
$valid=$valid.'document.getElementById("visa_vesd").style.backgroundColor="pink"; '."\r\n"; 
}

if ($mig_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_ser").style.backgroundColor="pink"; '."\r\n"; 
}
if ($mig_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_num").style.backgroundColor="pink"; '."\r\n"; 
}

if ($uved=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("uved").style.backgroundColor="pink"; '."\r\n"; 
}

if ($valid != '') {
	$valid=$valid.'alert("Невозможно сгенерировать '.$_REQUEST['doc'].' - одно или несколько полей не заполнены.");'."\r\n";
}

///////ESLI OK РНР///////////
if ($isok > 0) {
$f1='./'.$_REQUEST['doc'].'.docx';
$f2='./'.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
$f3=$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
	
$f1 = iconv('utf-8', 'windows-1251', $f1);
//$f2 = iconv('utf-8', 'windows-1251', $f2);
//$f3 = iconv('utf-8', 'windows-1251', $f3);
//$f2 = './1.docx';
@unlink('./1.docx');
if (file_exists($f1)) {
@copy($f1, './1.docx');

$zip = new ZipArchive;
$fileToModify = 'word/document.xml';
if ($zip->open('./1.docx') === TRUE) {
    //Read contents into memory
    $theContents = $zip->getFromName($fileToModify);
    //Modify contents:
	
require('./rep.php');

	//Delete the old...
    $zip->deleteName($fileToModify);
    //Write the new...
    $zip->addFromString($fileToModify, $theContents);
    //And write back to the filesystem.
    $zip->close();
  //  echo 'ok';
} else {
  //  echo 'failed';
}

@copy('./1.docx', $f2);
echo ('<script type="text/javascript"> window.open("./dload.php?t=doc&url='.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx'.'", "_blank"); </script>');
}
}
/////////////////////////////
}







if ($_REQUEST['doc'] == 'Рег') {
$isok=1;
if ($doc_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("doc_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("fam").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("fam_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("ima").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("ima_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($rod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("rod").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pol=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pol").style.backgroundColor="pink"; '."\r\n"; 
}
if ($strana=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("strana").style.backgroundColor="pink"; '."\r\n"; 
}
if ($gorod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("gorod").style.backgroundColor="pink"; '."\r\n"; 
}

if ($pass_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_do=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_who=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_who").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_spisok=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_spisok").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_man=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_man").style.backgroundColor="pink"; '."\r\n"; 
}

if ($card_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_do=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_date").style.backgroundColor="pink"; '."\r\n"; 
}

if ($visa_ser=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_ser").style.backgroundColor="pink"; '."\r\n"; 
};
if ($visa_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_po=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_po").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_date=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_id=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_id").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prodl=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prodl").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prig=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prig").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_vesd=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_vesd").style.backgroundColor="pink"; '."\r\n"; 
}

if ($mig_ser=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("mig_ser").style.backgroundColor="pink"; '."\r\n"; 
}
if ($mig_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("mig_num").style.backgroundColor="pink"; '."\r\n"; 
}

if ($uved=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("uved").style.backgroundColor="pink"; '."\r\n"; 
}

if ($valid != '') {
	$valid=$valid.'alert("Невозможно сгенерировать '.$_REQUEST['doc'].' - одно или несколько полей не заполнены.");'."\r\n";
}

///////ESLI OK РНР///////////
if ($isok > 0) {
$f1='./'.$_REQUEST['doc'].'.xlsx';
$f2='./'.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.xlsx';
$f3=$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.xlsx';
	
$f1 = iconv('utf-8', 'windows-1251', $f1);
//$f2 = iconv('utf-8', 'windows-1251', $f2);
//$f3 = iconv('utf-8', 'windows-1251', $f3);
//$f2 = './1.docx';
@unlink('./1.xlsx');
if (file_exists($f1)) {
@copy($f1, './1.xlsx');

$zip = new ZipArchive;
$fileToModify = 'xl/sharedStrings.xml';
if ($zip->open('./1.xlsx') === TRUE) {
    //Read contents into memory
    $theContents = $zip->getFromName($fileToModify);
    //Modify contents:
	
require('./rep.php');

	//Delete the old...
    $zip->deleteName($fileToModify);
    //Write the new...
    $zip->addFromString($fileToModify, $theContents);
    //And write back to the filesystem.
    $zip->close();
  //  echo 'ok';
} else {
  //  echo 'failed';
}

@copy('./1.xlsx', $f2);
echo ('<script type="text/javascript"> window.open("./dload.php?t=doc&url='.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.xlsx'.'", "_blank"); </script>');
}
}
/////////////////////////////
}








if ($_REQUEST['doc'] == 'Ход') {
$isok=1;
if ($doc_date=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("doc_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("fam").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("fam_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("ima").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("ima_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($rod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("rod").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pol=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pol").style.backgroundColor="pink"; '."\r\n"; 
}
if ($strana=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("strana").style.backgroundColor="pink"; '."\r\n"; 
}
if ($gorod=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("gorod").style.backgroundColor="pink"; '."\r\n"; 
}

if ($pass_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_do=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_who=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_who").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_spisok=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_spisok").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_man=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_man").style.backgroundColor="pink"; '."\r\n"; 
}

if ($card_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_do=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_date=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_date").style.backgroundColor="pink"; '."\r\n"; 
}

if ($visa_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_ser").style.backgroundColor="pink"; '."\r\n"; 
};
if ($visa_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_po=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_po").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_id=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_id").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prodl=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prodl").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prig=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prig").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_vesd=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_vesd").style.backgroundColor="pink"; '."\r\n"; 
}

if ($mig_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_ser").style.backgroundColor="pink"; '."\r\n"; 
}
if ($mig_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_num").style.backgroundColor="pink"; '."\r\n"; 
}

if ($uved=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("uved").style.backgroundColor="pink"; '."\r\n"; 
}

if ($valid != '') {
	$valid=$valid.'alert("Невозможно сгенерировать '.$_REQUEST['doc'].' - одно или несколько полей не заполнены.");'."\r\n";
}

///////ESLI OK РНР///////////
if ($isok > 0) {
$f1='./'.$_REQUEST['doc'].'.docx';
$f2='./'.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
$f3=$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
	
$f1 = iconv('utf-8', 'windows-1251', $f1);
//$f2 = iconv('utf-8', 'windows-1251', $f2);
//$f3 = iconv('utf-8', 'windows-1251', $f3);
//$f2 = './1.docx';
@unlink('./1.docx');
if (file_exists($f1)) {
@copy($f1, './1.docx');

$zip = new ZipArchive;
$fileToModify = 'word/document.xml';
if ($zip->open('./1.docx') === TRUE) {
    //Read contents into memory
    $theContents = $zip->getFromName($fileToModify);
    //Modify contents:
	
require('./rep.php');

	//Delete the old...
    $zip->deleteName($fileToModify);
    //Write the new...
    $zip->addFromString($fileToModify, $theContents);
    //And write back to the filesystem.
    $zip->close();
  //  echo 'ok';
} else {
  //  echo 'failed';
}

@copy('./1.docx', $f2);
echo ('<script type="text/javascript"> window.open("./dload.php?t=doc&url='.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx'.'", "_blank"); </script>');
}
}
/////////////////////////////
}









if ($_REQUEST['doc'] == 'Ход без пластика') {
$isok=1;
if ($doc_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("doc_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("fam").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("fam_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("ima").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("ima_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($rod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("rod").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pol=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pol").style.backgroundColor="pink"; '."\r\n"; 
}
if ($strana=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("strana").style.backgroundColor="pink"; '."\r\n"; 
}
if ($gorod=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("gorod").style.backgroundColor="pink"; '."\r\n"; 
}

if ($pass_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_do=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_who=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_who").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_spisok=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_spisok").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_man=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_man").style.backgroundColor="pink"; '."\r\n"; 
}

if ($card_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_do=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("card_date").style.backgroundColor="pink"; '."\r\n"; 
}

if ($visa_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_ser").style.backgroundColor="pink"; '."\r\n"; 
};
if ($visa_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_po=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("visa_po").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_id=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_id").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prodl=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prodl").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prig=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prig").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_vesd=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_vesd").style.backgroundColor="pink"; '."\r\n"; 
}

if ($mig_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_ser").style.backgroundColor="pink"; '."\r\n"; 
}
if ($mig_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_num").style.backgroundColor="pink"; '."\r\n"; 
}

if ($uved=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("uved").style.backgroundColor="pink"; '."\r\n"; 
}

if ($valid != '') {
	$valid=$valid.'alert("Невозможно сгенерировать '.$_REQUEST['doc'].' - одно или несколько полей не заполнены.");'."\r\n";
}

///////ESLI OK РНР///////////
if ($isok > 0) {
$f1='./'.$_REQUEST['doc'].'.docx';
$f2='./'.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
$f3=$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
	
$f1 = iconv('utf-8', 'windows-1251', $f1);
//$f2 = iconv('utf-8', 'windows-1251', $f2);
//$f3 = iconv('utf-8', 'windows-1251', $f3);
//$f2 = './1.docx';
@unlink('./1.docx');
if (file_exists($f1)) {
@copy($f1, './1.docx');

$zip = new ZipArchive;
$fileToModify = 'word/document.xml';
if ($zip->open('./1.docx') === TRUE) {
    //Read contents into memory
    $theContents = $zip->getFromName($fileToModify);
    //Modify contents:
	
require('./rep.php');

	//Delete the old...
    $zip->deleteName($fileToModify);
    //Write the new...
    $zip->addFromString($fileToModify, $theContents);
    //And write back to the filesystem.
    $zip->close();
  //  echo 'ok';
} else {
  //  echo 'failed';
}

@copy('./1.docx', $f2);
echo ('<script type="text/javascript"> window.open("./dload.php?t=doc&url='.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx'.'", "_blank"); </script>');
}
}
/////////////////////////////
}








if ($_REQUEST['doc'] == 'Трудовой договор') {
$isok=1;
if ($doc_date=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("doc_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("fam").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("fam_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("ima").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("ima_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($rod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("rod").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pol=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pol").style.backgroundColor="pink"; '."\r\n"; 
}
if ($strana=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("strana").style.backgroundColor="pink"; '."\r\n"; 
}
if ($gorod=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("gorod").style.backgroundColor="pink"; '."\r\n"; 
}

if ($pass_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_do=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_who=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_who").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_spisok=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_spisok").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_man=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_man").style.backgroundColor="pink"; '."\r\n"; 
}

if ($card_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_do=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_date=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_date").style.backgroundColor="pink"; '."\r\n"; 
}

if ($visa_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_ser").style.backgroundColor="pink"; '."\r\n"; 
};
if ($visa_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_po=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_po").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_id=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_id").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prodl=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prodl").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prig=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prig").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_vesd=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_vesd").style.backgroundColor="pink"; '."\r\n"; 
}

if ($mig_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_ser").style.backgroundColor="pink"; '."\r\n"; 
}
if ($mig_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_num").style.backgroundColor="pink"; '."\r\n"; 
}

if ($uved=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("uved").style.backgroundColor="pink"; '."\r\n"; 
}

if ($valid != '') {
	$valid=$valid.'alert("Невозможно сгенерировать '.$_REQUEST['doc'].' - одно или несколько полей не заполнены.");'."\r\n";
}

///////ESLI OK РНР///////////
if ($isok > 0) {
$f1='./'.$_REQUEST['doc'].'.docx';
$f2='./'.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
$f3=$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
	
$f1 = iconv('utf-8', 'windows-1251', $f1);
//$f2 = iconv('utf-8', 'windows-1251', $f2);
//$f3 = iconv('utf-8', 'windows-1251', $f3);
//$f2 = './1.docx';
@unlink('./1.docx');
if (file_exists($f1)) {
@copy($f1, './1.docx');

$zip = new ZipArchive;
$fileToModify = 'word/document.xml';
if ($zip->open('./1.docx') === TRUE) {
    //Read contents into memory
    $theContents = $zip->getFromName($fileToModify);
    //Modify contents:
	
require('./rep.php');

	//Delete the old...
    $zip->deleteName($fileToModify);
    //Write the new...
    $zip->addFromString($fileToModify, $theContents);
    //And write back to the filesystem.
    $zip->close();
  //  echo 'ok';
} else {
  //  echo 'failed';
}

@copy('./1.docx', $f2);
echo ('<script type="text/javascript"> window.open("./dload.php?t=doc&url='.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx'.'", "_blank"); </script>');
}
}
/////////////////////////////
}









if ($_REQUEST['doc'] == 'Доп. соглашение') {
$isok=1;
if ($doc_date=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("doc_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("fam").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("fam_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("ima").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("ima_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($rod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("rod").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pol=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pol").style.backgroundColor="pink"; '."\r\n"; 
}
if ($strana=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("strana").style.backgroundColor="pink"; '."\r\n"; 
}
if ($gorod=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("gorod").style.backgroundColor="pink"; '."\r\n"; 
}

if ($pass_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_do=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_who=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_who").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_spisok=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_spisok").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_man=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_man").style.backgroundColor="pink"; '."\r\n"; 
}

if ($card_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_do=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_date=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_date").style.backgroundColor="pink"; '."\r\n"; 
}

if ($visa_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_ser").style.backgroundColor="pink"; '."\r\n"; 
};
if ($visa_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_po=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_po").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_id=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_id").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prodl=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prodl").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prig=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prig").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_vesd=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_vesd").style.backgroundColor="pink"; '."\r\n"; 
}

if ($mig_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_ser").style.backgroundColor="pink"; '."\r\n"; 
}
if ($mig_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_num").style.backgroundColor="pink"; '."\r\n"; 
}

if ($uved=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("uved").style.backgroundColor="pink"; '."\r\n"; 
}

if ($valid != '') {
	$valid=$valid.'alert("Невозможно сгенерировать '.$_REQUEST['doc'].' - одно или несколько полей не заполнены.");'."\r\n";
}

///////ESLI OK РНР///////////
if ($isok > 0) {
$f1='./'.$_REQUEST['doc'].'.docx';
$f2='./'.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
$f3=$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.docx';
	
	
$f1 = iconv('utf-8', 'windows-1251', $f1);
//$f2 = iconv('utf-8', 'windows-1251', $f2);
//$f3 = iconv('utf-8', 'windows-1251', $f3);
//$f2 = './1.docx';
@unlink('./1.docx');
if (file_exists($f1)) {
@copy($f1, './1.docx');

$zip = new ZipArchive;
$fileToModify = 'word/document.xml';
if ($zip->open('./1.docx') === TRUE) {
    //Read contents into memory
    $theContents = $zip->getFromName($fileToModify);
    //Modify contents:
	
require('./rep.php');

	//Delete the old...
    $zip->deleteName($fileToModify);
    //Write the new...
    $zip->addFromString($fileToModify, $theContents);
    //And write back to the filesystem.
    $zip->close();
  //  echo 'ok';
} else {
  //  echo 'failed';
}

@copy('./1.docx', $f2);
echo ('<script type="text/javascript"> window.open("./dload.php?t=doc&url='.$f3.'", "_blank"); </script>');
}
}
/////////////////////////////
}









if ($_REQUEST['doc'] == 'Принятие') {
$isok=1;
if ($doc_date=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("doc_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("fam").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("fam_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("ima").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("ima_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($rod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("rod").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pol=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pol").style.backgroundColor="pink"; '."\r\n"; 
}
if ($strana=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("strana").style.backgroundColor="pink"; '."\r\n"; 
}
if ($gorod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("gorod").style.backgroundColor="pink"; '."\r\n"; 
}

if ($pass_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_do=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_who=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_who").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_spisok=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_spisok").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_man=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_man").style.backgroundColor="pink"; '."\r\n"; 
}

if ($card_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_do=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_date=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_date").style.backgroundColor="pink"; '."\r\n"; 
}

if ($visa_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_ser").style.backgroundColor="pink"; '."\r\n"; 
};
if ($visa_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_po=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_po").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_id=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_id").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prodl=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prodl").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prig=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prig").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_vesd=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_vesd").style.backgroundColor="pink"; '."\r\n"; 
}

if ($mig_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_ser").style.backgroundColor="pink"; '."\r\n"; 
}
if ($mig_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_num").style.backgroundColor="pink"; '."\r\n"; 
}

if ($uved=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("uved").style.backgroundColor="pink"; '."\r\n"; 
}

if ($valid != '') {
	$valid=$valid.'alert("Невозможно сгенерировать '.$_REQUEST['doc'].' - одно или несколько полей не заполнены.");'."\r\n";
}

///////ESLI OK РНР///////////
if ($isok > 0) {
$f1='./'.$_REQUEST['doc'].'.xlsx';
$f2='./'.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.xlsx';
$f3=$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.xlsx';
	
$f1 = iconv('utf-8', 'windows-1251', $f1);
//$f2 = iconv('utf-8', 'windows-1251', $f2);
//$f3 = iconv('utf-8', 'windows-1251', $f3);
//$f2 = './1.docx';
@unlink('./1.xlsx');
if (file_exists($f1)) {
@copy($f1, './1.xlsx');

$zip = new ZipArchive;
$fileToModify = 'xl/sharedStrings.xml';
if ($zip->open('./1.xlsx') === TRUE) {
    //Read contents into memory
    $theContents = $zip->getFromName($fileToModify);
    //Modify contents:
	
require('./rep.php');

	//Delete the old...
    $zip->deleteName($fileToModify);
    //Write the new...
    $zip->addFromString($fileToModify, $theContents);
    //And write back to the filesystem.
    $zip->close();
  //  echo 'ok';
} else {
  //  echo 'failed';
}

@copy('./1.xlsx', $f2);
echo ('<script type="text/javascript"> window.open("./dload.php?t=doc&url='.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.xlsx'.'", "_blank"); </script>');
}
}
/////////////////////////////
}










if ($_REQUEST['doc'] == 'Увольнение') {
$isok=1;
if ($doc_date=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("doc_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("fam").style.backgroundColor="pink"; '."\r\n"; 
}
if ($fam_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("fam_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("ima").style.backgroundColor="pink"; '."\r\n"; 
}
if ($ima_lat=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("ima_lat").style.backgroundColor="pink"; '."\r\n"; 
}
if ($rod=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("rod").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pol=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pol").style.backgroundColor="pink"; '."\r\n"; 
}
if ($strana=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("strana").style.backgroundColor="pink"; '."\r\n"; 
}
if ($gorod=='') {
  $isok=0;
  $valid=$valid.'document.getElementById("gorod").style.backgroundColor="pink"; '."\r\n"; 
}

if ($pass_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_do=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_who=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_who").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_spisok=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("pass_spisok").style.backgroundColor="pink"; '."\r\n"; 
}
if ($pass_man=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("pass_man").style.backgroundColor="pink"; '."\r\n"; 
}

if ($card_num=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_s=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_do=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_do").style.backgroundColor="pink"; '."\r\n"; 
}
if ($card_date=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("card_date").style.backgroundColor="pink"; '."\r\n"; 
}

if ($visa_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_ser").style.backgroundColor="pink"; '."\r\n"; 
};
if ($visa_s=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_s").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_num").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_po=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_po").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_date=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_date").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_id=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_id").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prodl=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prodl").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_prig=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_prig").style.backgroundColor="pink"; '."\r\n"; 
}
if ($visa_vesd=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("visa_vesd").style.backgroundColor="pink"; '."\r\n"; 
}

if ($mig_ser=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_ser").style.backgroundColor="pink"; '."\r\n"; 
}
if ($mig_num=='') {
///$isok=0;
///$valid=$valid.'document.getElementById("mig_num").style.backgroundColor="pink"; '."\r\n"; 
}

if ($uved=='') {
 $isok=0;
 $valid=$valid.'document.getElementById("uved").style.backgroundColor="pink"; '."\r\n"; 
}

if ($valid != '') {
	$valid=$valid.'alert("Невозможно сгенерировать '.$_REQUEST['doc'].' - одно или несколько полей не заполнены.");'."\r\n";
}

///////ESLI OK РНР///////////
if ($isok > 0) {
$f1='./'.$_REQUEST['doc'].'.xlsx';
$f2='./'.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.xlsx';
$f3=$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.xlsx';
	
$f1 = iconv('utf-8', 'windows-1251', $f1);
//$f2 = iconv('utf-8', 'windows-1251', $f2);
//$f3 = iconv('utf-8', 'windows-1251', $f3);
//$f2 = './1.docx';
@unlink('./1.xlsx');
if (file_exists($f1)) {
@copy($f1, './1.xlsx');

$zip = new ZipArchive;
$fileToModify = 'xl/sharedStrings.xml';
if ($zip->open('./1.xlsx') === TRUE) {
    //Read contents into memory
    $theContents = $zip->getFromName($fileToModify);
    //Modify contents:
	
require('./rep.php');

	//Delete the old...
    $zip->deleteName($fileToModify);
    //Write the new...
    $zip->addFromString($fileToModify, $theContents);
    //And write back to the filesystem.
    $zip->close();
  //  echo 'ok';
} else {
  //  echo 'failed';
}

@copy('./1.xlsx', $f2);
echo ('<script type="text/javascript"> window.open("./dload.php?t=doc&url='.$_REQUEST['doc'].'_'.$fam.'_'.$ima.'.xlsx'.'", "_blank"); </script>');
}
}
/////////////////////////////
}























}
?>



<html>
<head>
<meta charset="utf-8">
  <title>Генерация документов</title>
</head>
<body>


<script type="text/javascript">

function dat(edit){
var ogo = document.getElementById(edit);
var s = ogo.value;
var w = s.replace(/\D/g, "");
var z = w.substr(0,8);
if (z.length == 0) {
var	x = z+'__.__.____';
var k = 0;
}
if (z.length == 1) {
var	x = z+'_.__.____';
var k = 1;
}
if (z.length == 2) {
var	x = z+'.__.____';
var k = 2;
}
if (z.length == 3) {
var	x = z[0]+z[1]+'.'+z[2]+'_.____';
var k = 4;
}
if (z.length == 4) {
var	x = z[0]+z[1]+'.'+z[2]+z[3]+'.____';
var k = 5;
}
if (z.length == 5) {
var	x = z[0]+z[1]+'.'+z[2]+z[3]+'.'+z[4]+'___';
var k = 7;
}
if (z.length == 6) {
var	x = z[0]+z[1]+'.'+z[2]+z[3]+'.'+z[4]+z[5]+'__';
var k = 8;
}
if (z.length == 7) {
var	x = z[0]+z[1]+'.'+z[2]+z[3]+'.'+z[4]+z[5]+z[6]+'_';
var k = 9;
}
if (z.length == 8) {
var	x = z[0]+z[1]+'.'+z[2]+z[3]+'.'+z[4]+z[5]+z[6]+z[7];
var k = 10;
}
var q = x.substr(0,10);
ogo.value = q;
ogo.selectionStart = k;
ogo.selectionEnd = k;
}
</script>



<script type="text/javascript">
function select_value(){
var target = document.getElementById('pass_man');
var zogo = document.getElementById('pass_spisok');

var s = zogo.value;
target.value = s;
//alert(s);
}
</script>




<center><table border="1" width="40%" style="border-collapse:collapse;">
<tr><td>
<form enctype="multipart/form-data" method="POST" action="./index.php">
<input type="hidden"  name="what" value="load">
<center>Загрузка XML</center>
<center><input type="file" name="xml" onchange="javascript:this.form.submit();"></center>
</form>
</td>
<form action="./index.php" method="POST" id="myform">
<td>
<center><input style="height:40px; width:130px" name="knop" type="submit" value="Очистить"></center>
</td>
<td>
<input type="hidden"  name="what" value="save">
<center><input style="height:40px; width:130px" type="submit" name="knop" value="Сохранить"></center>
</td></tr>
</center></table>
<br>
<center><table border="1" width="65%" style="border-collapse:collapse;">
<tr>
<td width="15%" colspan="4"><b>Дата договора</b></td>
</tr>
<tr>
<td width="15%">Дата:</td><td width="35%"><input size="30" name="doc_date" id="doc_date" value="<?php echo $doc_date; ?>" type="text" placeholder="__.__.____" oninput="dat('doc_date');"><input type="checkbox" name="xdoc_date"></td><td width="15%">&nbsp;</td><td width="35%">&nbsp;</td>
</tr>

<tr>
<td width="15%" colspan="4"><br><b>Личная информация</b></td>
</tr>
<tr>

<tr>
<td width="15%">Фамилия:</td><td width="35%"><input size="30" type="text" name="fam" id="fam" value="<?php echo $fam; ?>"><input type="checkbox" name="xfam"></td><td width="15%">Фамилия лат:</td><td width="35%"><input size="30" type="text" name="fam_lat" id="fam_lat" value="<?php echo $fam_lat; ?>"><input type="checkbox" name="xfam_lat"></td>
</tr>

<tr>
<td width="15%">Имя:</td><td width="35%"><input size="30" type="text" name="ima" id="ima" value="<?php echo $ima; ?>"><input type="checkbox" name="xima"></td><td width="15%">Имя лат:</td><td width="35%"><input size="30" type="text" name="ima_lat" id="ima_lat" value="<?php echo $ima_lat; ?>"><input type="checkbox" name="xima_lat"></td>
</tr>

<tr>
<td width="15%">г.р:</td><td width="35%"><input size="30" name="rod" id="rod" value="<?php echo $rod; ?>" type="text" placeholder="__.__.____" id="rod" oninput="dat('rod');"><input type="checkbox" name="xrod"></td></td><td width="15%">Пол:</td><td width="35%">

<?php
if ($pol == '') {
echo '<input size="30" name="pol" id="z1" type="radio" value="male" checked>Мужской&nbsp;<input name="pol" type="radio" value="female" id="z2">Женский'."\r\n";
}
if ($pol == 'male') {
echo '<input size="30" name="pol" id="z1" type="radio" value="male" checked>Мужской&nbsp;<input name="pol" type="radio" value="female" id="z2">Женский'."\r\n";
}
if ($pol == 'female') {
echo '<input size="30" name="pol" id="z1" type="radio" value="male">Мужской&nbsp;<input name="pol" type="radio" value="female" id="z2" checked>Женский'."\r\n";
}

?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="xpol"></td>
</tr>


<tr>
<td width="15%">Страна:</td><td width="35%">
<select name="strana" id="strana" style="width: 200px;" onchange='document.getElementById("myform").submit();'>
<?php 

$dop='';
	if ($strana == 'Вьетнам') {
	$dop='selected';
	}
    echo '<option '.$dop.' value="Вьетнам">Вьетнам</option>'."\r\n";
    
$dop='';
	if ($strana == 'Шри-Ланка') {
	$dop='selected';
	}
    echo '<option '.$dop.' value="Шри-Ланка">Шри-Ланка</option>'."\r\n";
	
$dop='';
	if ($strana == 'Индия') {
	$dop='selected';
	}
    echo '<option '.$dop.' value="Индия">Индия</option>'."\r\n";	
?>
</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="xstrana">
</td>

<td width="15%">Город:</td><td width="35%"><input size="30" type="text" name="gorod" id="gorod" value="<?php echo $gorod; ?>"><input type="checkbox" name="xgorod"></td>

</tr>










<tr>
<td width="15%" colspan="4"><br><b>Паспорт</b></td>
</tr>

<tr>
<td width="15%">Номер:</td><td width="35%"><input size="30" type="text" name="pass_num" id="pass_num" value="<?php echo $pass_num; ?>"><input type="checkbox" name="xpass_num"></td><td width="15%">&nbsp;</td><td width="35%">&nbsp;</td>
</tr>

<tr>
<td width="15%">Срок с:</td><td width="35%"><input size="30" name="pass_s" id="pass_s" value="<?php echo $pass_s; ?>" type="text" oninput="dat('pass_s');" placeholder="__.__.____"><input type="checkbox" name="xpass_s"></td>
<td width="15%">Срок до:</td><td width="35%"><input size="30" name="pass_do" id="pass_do" value="<?php echo $pass_do; ?>" type="text" placeholder="__.__.____" oninput="dat('pass_do');"><input type="checkbox" name="xpass_do"></td>
</tr>


<tr>
<?php
if ($pass_who == '') {
?>
<td width="15%">Выдан:</td><td width="35%"><input size="30" name="pass_who" id="p1" type="radio" value="hand" checked>Вручную&nbsp;<input name="pass_who" type="radio" value="man" id="p2">Из списка</td><td width="15%">Кем:</td><td width="35%">
<select name="pass_spisok" id="pass_spisok" style="display:none;  width: 300px;" onchange="select_value()">
<?php
}
?>

<?php
if ($pass_who == 'hand') {
?>
<td width="15%">Выдан:</td><td width="35%"><input size="30" name="pass_who" id="p1" type="radio" value="hand" checked>Вручную&nbsp;<input name="pass_who" type="radio" value="man" id="p2">Из списка</td><td width="15%">Кем:</td><td width="35%">
<select name="pass_spisok" id="pass_spisok" style="display:none;  width: 300px;" onchange="select_value()">
<?php
}
?>

<?php
if ($pass_who == 'man') {
?>
<td width="15%">Выдан:</td><td width="35%"><input size="30" name="pass_who" id="p1" type="radio" value="hand">Вручную&nbsp;<input name="pass_who" type="radio" value="man" id="p2" checked>Из списка</td><td width="15%">Кем:</td><td width="35%">
<select name="pass_spisok" id="pass_spisok" style="display:none;  " onchange="select_value()">
<?php
}
?>


<?php
if ($strana == '') {
	
	
	
echo '<option selected value=""> </option>'."\r\n";	
echo '<option  value="ИММИГРАЦИОННЫЙ ДЕПАРТАМЕНТ">ИММИГРАЦИОННЫЙ ДЕПАРТАМЕНТ</option>'."\r\n";
echo '<option  value="ДЕПАРТАМЕНТ ИММИГРАЦИИ">ДЕПАРТАМЕНТ ИММИГРАЦИИ</option>'."\r\n";
}
if ($strana == 'Вьетнам') {
echo '<option selected value=""> </option>'."\r\n";	
echo '<option  value="ИММИГРАЦИОННЫЙ ДЕПАРТАМЕНТ">ИММИГРАЦИОННЫЙ ДЕПАРТАМЕНТ</option>'."\r\n";
echo '<option  value="ДЕПАРТАМЕНТ ИММИГРАЦИИ">ДЕПАРТАМЕНТ ИММИГРАЦИИ</option>'."\r\n";
}
if ($strana == 'Шри-Ланка') {
echo '<option selected value=""> </option>'."\r\n";	
echo '<option  value="УПРАВЛЕНИЕ Г. КОЛОМБО">УПРАВЛЕНИЕ Г. КОЛОМБО</option>'."\r\n";
echo '<option  value="АДМИНИСТРАЦИЯ КОЛОМБО">АДМИНИСТРАЦИЯ КОЛОМБО</option>'."\r\n";
}

if ($strana == 'Индия') {
echo '<option selected value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>'."\r\n";	
}


?>

</select>
<?php
if ($pass_who == '') {
?>
<input size="30" type="text" name="pass_man" id="pass_man" value="<?php echo $pass_man; ?>" style="display:block;">
<?php
}
?>

<?php
if ($pass_who == 'hand') {
?>
<input size="30" type="text" name="pass_man" id="pass_man" value="<?php echo $pass_man; ?>" style="display:block;">
<?php
}
?>

<?php
if ($pass_who == 'man') {
?>
<input size="30" type="text" name="pass_man" id="pass_man" value="<?php echo $pass_man; ?>" style="display:block;">
<?php
}
?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="xpass_man">

</td>
</tr>


<tr>
<td width="15%"colspan="4"><br><b>Пластик</b></td>
</tr>

<tr>
<td width="15%">Номер:</td><td width="35%"><input size="30" type="text" name="card_num" id="card_num" value="<?php echo $card_num; ?>"><input type="checkbox" name="xcard_num"></td><td width="15%">C:</td><td width="35%"><input size="30" name="card_s" id="card_s" value="<?php echo $card_s; ?>" type="text" oninput="dat('card_s');" placeholder="__.__.____"><input type="checkbox" name="xcard_s"></td>
</tr>
<tr>
<td width="15%">Выдано:</td><td width="35%"><input size="30" type="text" name="card_date" id="card_date" value="<?php echo $card_date; ?>" oninput="dat('card_date');" placeholder="__.__.____"><input type="checkbox" name="xcard_date"></td><td width="15%">По:</td><td width="35%"><input size="30" name="card_do" id="card_do" value="<?php echo $card_do; ?>" type="text" oninput="dat('card_do');" placeholder="__.__.____"><input type="checkbox" name="xcard_do"></td>
</tr>

<tr>
<td width="15%"colspan="4"><br><b>Виза</b></td>
</tr>

<tr>
<td width="15%">Серия:</td><td width="35%"><input size="30" type="text" id="visa_ser" name="visa_ser" value="<?php echo $visa_ser; ?>"><input type="checkbox" name="xvisa_ser"></td><td width="15%">С:</td><td width="35%"><input size="30" name="visa_s" id="visa_s" value="<?php echo $visa_s; ?>" type="text" oninput="dat('visa_s');" placeholder="__.__.____"><input type="checkbox" name="xvisa_s"></td>
</tr>

<tr>
<td width="15%">Номер:</td><td width="35%"><input size="30" type="text" name="visa_num" id="visa_num" value="<?php echo $visa_num; ?>"><input type="checkbox" name="xvisa_num"></td><td width="15%">По:</td><td width="35%"><input size="30" name="visa_po" id="visa_po" value="<?php echo $visa_po; ?>" type="text" oninput="dat('visa_po');" placeholder="__.__.____"><input type="checkbox" name="xvisa_po"></td>
</tr>

<tr>
<td width="15%">Дата выдачи:</td><td width="35%"><input size="30" name="visa_date" id="visa_date" value="<?php echo $visa_date; ?>" type="text" oninput="dat('visa_date');" placeholder="__.__.____"><input type="checkbox" name="xvisa_date"></td><td width="15%">ID визы:</td><td width="35%"><input size="30" type="text" name="visa_id" id="visa_id" value="<?php echo $visa_id; ?>"><input type="checkbox" name="xvisa_id"></td>
</tr>

<tr>
<td width="15%">Продлить до:</td><td width="35%"><input size="30" name="visa_prodl" id="visa_prodl" value="<?php echo $visa_prodl; ?>" type="text" oninput="dat('visa_prodl');" placeholder="__.__.____"><input type="checkbox" name="xvisa_prodl"></td><td width="15%">Номер приг-я:</td><td width="35%"><input size="30" type="text" name="visa_prig" id="visa_prig" value="<?php echo $visa_prig; ?>"><input type="checkbox" name="xvisa_prig"></td>
</tr>


<tr>
<td width="15%">Въезд:</td><td width="35%"><input size="30" name="visa_vesd" id="visa_vesd" value="<?php echo $visa_vesd; ?>" type="text" oninput="dat('visa_vesd');" placeholder="__.__.____"><input type="checkbox" name="xvisa_vesd"></td></td><td width="15%">&nbsp;</td><td width="35%">&nbsp;</td>
</tr>



<tr>
<td width="15%"colspan="4"><br><b>Миграционная карта</b></td>
</tr>

<tr>
<td width="15%">Серия:</td><td width="35%"><input size="30" type="text" name="mig_ser" id="mig_ser" value="<?php echo $mig_ser; ?>"><input type="checkbox" name="xmig_ser"></td><td width="15%">Номер:</td><td width="35%"><input size="30" type="text" name="mig_num" id="mig_num" value="<?php echo $mig_num; ?>"><input type="checkbox" name="xmig_num"></td>
</tr>

<tr>
<td width="15%" colspan="4"><br><b>Уведомление</b></td>
</tr>

<tr>
<td width="15%">Дата зак/ув:</td><td width="35%"><input size="30" name="uved" id="uved" value="<?php echo $uved; ?>" type="text" oninput="dat('uved');" placeholder="__.__.____"><input type="checkbox" name="xuved"></td><td width="15%">&nbsp;</td><td width="35%">&nbsp;</td>
</tr>

</center></table>
<br>
<center><table border="1" width="65%" style="border-collapse:collapse;">
<tr>
<td width="16.6%"><center><input style="height:40px; width:130px" type="submit" name="doc" value="РНР"></td></center>
<td width="16.6%"><center><input style="height:40px; width:130px" type="submit" name="doc" value="Приглашение"></td></center>
<td width="16.6%"><center><input style="height:40px; width:130px" type="submit" name="doc" value="Гарантийное"></td></center>
<td width="16.6%"><center><input style="height:40px; width:130px" type="submit" name="doc" value="Виза"></td></center>
<td width="16.6%"><center><input style="height:40px; width:130px" type="submit" name="doc" value="Письмо"></td></center>
<td width="16.6%"><center><input style="height:40px; width:130px" type="submit" name="doc" value="Рег"></td></center>
</tr>


<tr>
<td width="16.6%"><center><input style="height:40px; width:130px" type="submit" name="doc" value="Ход"></td></center>
<td width="16.6%"><center><input style="height:40px; width:130px" type="submit" name="doc" value="Ход без пластика"></td></center>
<td width="16.6%"><center><input style="height:40px; width:130px" type="submit" name="doc" value="Трудовой договор"></td></center>
<td width="16.6%"><center><input style="height:40px; width:130px" type="submit" name="doc" value="Доп. соглашение"></td></center>
<td width="16.6%"><center><input style="height:40px; width:130px" type="submit" name="doc" value="Принятие"></td></center>
<td width="16.6%"><center><input style="height:40px; width:130px" type="submit" name="doc" value="Увольнение"></td></center>
</tr>



</table></center>

</form>



<?php




?>


<script>
  document.addEventListener("DOMContentLoaded", hiddenCloseclick());
  document.getElementById('p2').addEventListener("click", hiddenCloseclick);
	function hiddenCloseclick() {
	let x = document.getElementById('pass_man');
	let y = document.getElementById('pass_spisok');
      	  x.style.display = "none";
	  	 y.style.display = "block";
    };
	
  </script>

<script>
  document.addEventListener("DOMContentLoaded", hiddenCloseclick2());
  document.getElementById('p1').addEventListener("click", hiddenCloseclick2);
	function hiddenCloseclick2() {
	let x = document.getElementById('pass_man');
	let y = document.getElementById('pass_spisok');
      	  y.style.display = "none";
	  	 x.style.display = "block";
    };
	
  </script>


<script>
  document.addEventListener("DOMContentLoaded", hiddenCloseclickzzz());
  document.getElementById('pass_spisok').addEventListener("change", hiddenCloseclickzzz);
	function hiddenCloseclickzzz() {
	let xz = document.getElementById('pass_man');
	let yz = document.getElementById('pass_spisok');


    };
		 
  </script>



<script>
<?php
echo($valid);
?>
</script>
</body>