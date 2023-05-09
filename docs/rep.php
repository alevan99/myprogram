<?php
$wrd1='Country';
$wrd2='DateBirthday';
$wrd3='DateBirthdayDay';
$wrd4='DateBirthdayMonth';
$wrd5='DateBirthdayYear';
$wrd6='DocumentAdDisDate';
$wrd7='DocumentAdDisDateDay';
$wrd8='DocumentAdDisDateMonth';
$wrd9='DocumentAdDisDateYear';
$wrd0='DocumentDate';
$wrd11='DocumentDateDay';
$wrd12='DocumentDateMonth';
$wrd13='DocumentDateYear';
$wrd14='EntryDate';
$wrd15='EntryDateDay';
$wrd16='EntryDateMonth';
$wrd17='EntryDateYear';
$wrd18='Gender';
$wrd19='ImmigrationDepartment';
$wrd20='MigrationCardNumber';
$wrd21='MigrationCardSeries';
$wrd22='Surname';
$wrd23='SurnameLat';
$wrd24='PassportDateEnd';
$wrd25='PassportDateEndDay';
$wrd26='PassportDateEndMonth';
$wrd27='PassportDateEndYear';
$wrd28='PassportDateStart';
$wrd29='PassportDateStartDay';
$wrd30='PassportDateStartMonth';
$wrd31='PassportDateStartYear';
$wrd32='PassportNumber';
$wrd33='Place';
$wrd34='Name';
$wrd35='NameLat';
$wrd36='VisaDate';
$wrd37='VisaDateDay';
$wrd38='VisaDateEnd';
$wrd39='VisaDateEndDay';
$wrd40='VisaDateEndMonth';
$wrd41='VisaDateEndYear';
$wrd42='VisaDateMonth';
$wrd43='VisaDateProlong';
$wrd44='VisaDateProlongDay';
$wrd45='VisaDateProlongMonth';
$wrd46='VisaDateProlongYear';
$wrd47='VisaDateStart';
$wrd48='VisaDateStartDay';
$wrd49='VisaDateStartMonth';
$wrd50='VisaDateStartYear';
$wrd51='VisaDateYear';
$wrd52='VisaId';
$wrd53='VisaNumber';
$wrd54='VisaNumberInvite';
$wrd55='VisaSeries';
$wrd56='WorkPermitDate';
$wrd57='WorkPermitDateDay';
$wrd58='WorkPermitDateEnd';
$wrd59='WorkPermitDateEndDay';
$wrd60='WorkPermitDateEndMonth';
$wrd61='WorkPermitDateEndYear';
$wrd62='WorkPermitDateMonth';
$wrd63='WorkPermitDateStart';
$wrd64='WorkPermitDateStartDay';
$wrd65='WorkPermitDateStartMonth';
$wrd66='WorkPermitDateStartYear';
$wrd67='WorkPermitDateYear';
$wrd68='WorkPermitNumber';

$wrd69='DateBirthdayMonthX';
$wrd70='DocumentAdDisDateMonthX';
$wrd71='DocumentDateMonthX';
$wrd72='EntryDateMonthX';
$wrd73='PassportDateEndMonthX';
$wrd74='PassportDateStartMonthX';
$wrd75='VisaDateEndMonthX';
$wrd76='VisaDateMonthX';
$wrd77='VisaDateProlongMonthX';
$wrd78='VisaDateStartMonthX';
$wrd79='WorkPermitDateEndMonthX';
$wrd80='WorkPermitDateMonthX';
$wrd81='WorkPermitDateStartMonthX';
$wrd82='GenderM';
$wrd83='GenderF';
$wrd84='PlaceX';
$wrd85='IfaX';
$wrd86='Strany';

for ($w = 1; $w <= 86; $w++) {
$wrd=${'wrd'.$w};

   @${$wrd.'Day'}=substr(${$wrd}, 0, 2);
   @${$wrd.'Month'}=substr(${$wrd}, 3, 2);
   @${$wrd.'Year'}=substr(${$wrd}, 6, 4);

if ($Gender == 'male') {
	$GenderM = 'X';
	$GenderF = ' ';
	$IfaX='';
}
if ($Gender == 'female') {
	$GenderM = ' ';
	$GenderF = 'X';
	$IfaX='А';
}

if ($Country == 'Вьетнам') {
	$Strany = 'Вьетнама';
}

if ($Country == 'Индия') {
	$Strany = 'Индии';
}
if ($Country == 'Шри-Ланка') {
	$Strany = 'Шри-Ланки';
}


$PlaceX=$Country.', '.$Place;

$DateBirthdayMonthX=tox($DateBirthdayMonth);
$DocumentAdDisDateMonthX=tox($DocumentAdDisDateMonth);
$DocumentDateMonthX=tox($DocumentDateMonth);
$EntryDateMonthX=tox($EntryDateMonth);
$PassportDateEndMonthX=tox($PassportDateEndMonth);
$PassportDateStartMonthX=tox($PassportDateStartMonth);
$VisaDateEndMonthX=tox($VisaDateEndMonth);
$VisaDateMonthX=tox($VisaDateMonth);
$VisaDateProlongMonthX=tox($VisaDateProlongMonth);
$VisaDateStartMonthX=tox($VisaDateStartMonth);
$WorkPermitDateEndMonthX=tox($WorkPermitDateEndMonth);
$WorkPermitDateMonthX=tox($WorkPermitDateMonth);
$WorkPermitDateStartMonthX=tox($WorkPermitDateStartMonth);

mb_internal_encoding("UTF-8");


  $theContents = str_replace($wrd.'<', ${$wrd}.'<', $theContents);
  $theContents = str_replace(mb_strtoupper($wrd).'<', mb_strtoupper(${$wrd}.'<'), $theContents);
  
  $theContents = str_replace($wrd.' ', ${$wrd}.' ', $theContents);
  $theContents = str_replace(mb_strtoupper($wrd).' ', mb_strtoupper(${$wrd}.' '), $theContents); 
  
  $theContents = str_replace($wrd.',', ${$wrd}.',', $theContents);
  $theContents = str_replace(mb_strtoupper($wrd).',', mb_strtoupper(${$wrd}.','), $theContents);   
  
  $theContents = str_replace($wrd.'.', ${$wrd}.'.', $theContents);
  $theContents = str_replace(mb_strtoupper($wrd).'.', mb_strtoupper(${$wrd}.'.'), $theContents);   
  
for ($i = 1; $i <= 31; $i++) {
$s=${$wrd};
$x='';
@$x=mb_substr($s, $i-1, 1);
if ($wrd != '') {
 $theContents = str_replace($wrd.$i.'<', $x.'<', $theContents);
 $theContents = str_replace($wrd.$i.' ', $x.' ', $theContents);
 $theContents = str_replace($wrd.$i.'.', $x.'.', $theContents);
 $theContents = str_replace($wrd.$i.',', $x.',', $theContents);
 
 $theContents = str_replace(mb_strtoupper($wrd.$i).'<', mb_strtoupper($x).'<', $theContents);
 $theContents = str_replace(mb_strtoupper($wrd.$i).' ', mb_strtoupper($x).' ', $theContents);
 $theContents = str_replace(mb_strtoupper($wrd.$i).'.', mb_strtoupper($x).'.', $theContents);
 $theContents = str_replace(mb_strtoupper($wrd.$i).',', mb_strtoupper($x).',', $theContents);
 
 
}
}

}

?>