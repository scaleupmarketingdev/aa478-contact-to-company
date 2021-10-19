<?php
//Test Connection

// create/update a new contact "7-25-2019"
require_once("isdk.php");	
$app = new iSDK;
 
if( $app->cfgCon("aa478")){ 

	$contactId = $_REQUEST['contactId'];
	$IndustryType = $_REQUEST['IndustryType'];
	$Delegate = $_REQUEST['Delegate'];
	$Speaker = $_REQUEST['Speaker'];
	$IndustryDescription = $_REQUEST['IndustryDescription'];
	  
	//Search CompanyId and Name using contactId
	$returnFields = array('Company','CompanyID');
	$contacts = $app->dsFind('Contact',1,0,'Id',$contactId,$returnFields);
	
	foreach($contacts as $contact){
		$companyId = $contact['CompanyID'];
		$companyname = $contact['Company'];
	}
	 
	//Search Company String and match with the above result and extract AccountID   
	$returnFields = array('AccountId');
	$result = $app->dsFind('Company',1,0,'Company',$companyname,$returnFields);
	
	foreach($result as $results){
		$companyname2 = $results['Company'];
		$accountId = $results['AccountId'];
	} 	
	  
	//If missing field dont insert 
	if($Speaker == ''){
		$grp = array('_IndustryType' =>	$IndustryType,
			'_IndustryDescription' => $IndustryDescription,
			'_Delegate' => $Delegate);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	}		
	elseif($IndustryType == ''){
		$grp = array('_SpeakerType' => $Speaker,
			'_IndustryDescription' => $IndustryDescription,
			'_Delegate' => $Delegate);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	}
	elseif($Delegate == ''){
		$grp = array('_IndustryType' => $IndustryType,
			'_IndustryDescription' => $IndustryDescription,
			'_Speaker' => $Speaker);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	}elseif($IndustryDescription == ''){
		$grp = array('_IndustryType' =>	$IndustryType,
			'_SpeakerType' => $Speaker,
			'_Delegate' => $Delegate);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	} 
	//SCAN IF 2 VARIABLEs are missing
	//------------------------------Speaker---------------------------------
	elseif($Speaker == '' AND $Delegate == ''){
		$grp = array('_IndustryType' =>	$IndustryType,
		'_IndustryDescription' => $IndustryDescription);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	}
	elseif($Speaker == '' AND $IndustryType == ''){
		$grp = array('_Delegate' => $Delegate,
		'_IndustryDescription' => $IndustryType);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	}
	elseif($Speaker == '' AND $IndustryDescription == ''){
		$grp = array('_IndustryType' =>	$IndustryType,
		'_Delegate' => $Delegate);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	}
	//---------------------------------
	//---------------------------------Delegate----------------------
	elseif($Delegate == '' AND $IndustryType == ''){
		$grp = array('_IndustryDescription' =>	$IndustryDescription,
		'_Speaker' => $Speaker);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	}
	elseif($Delegate == '' AND $IndustryDescription == ''){
		$grp = array('_Speaker' =>	$Speaker,
		'_IndustryType' => $IndustryType);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	}
	//------------------------------
	//--------------------------------IndustryType-------------------
	elseif($Delegate == '' AND $IndustryDescription == ''){
		$grp = array('_Speaker' =>	$Speaker,
		'_IndustryType' => $IndustryType);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	} 
	//-----------------------------
	//End scan for 2 variables
	//SCAN IF 3 VARIABLEs are missing
	elseif($Delegate == '' AND $IndustryType == '' AND $IndustryDescription == ''){
		$grp = array('_Speaker' => $Speaker);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	}
	elseif($Speaker == '' AND $IndustryType == '' AND $IndustryDescription == ''){
		$grp = array('_Delegate' => $Delegate);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	}
	elseif($Speaker == '' AND $Delegate == '' AND $IndustryDescription == ''){
		$grp = array('_IndustryType' => $IndustryType);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	}
	elseif($Speaker == '' AND $Delegate == '' AND $IndustryType == ''){
		$grp = array('_IndustryDescription' => $IndustryDescription);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	}
	//insert all
	elseif(isset($IndustryType) AND isset($Delegate) AND isset($Speaker) AND isset($IndustryDescription)){ 
		$grp = array('_IndustryType' => $IndustryType,
			'_IndustryDescription' => $IndustryDescription,
			'_Speaker' => $Speaker,
			'_Delegate' => $Delegate);
			$grpID = $app->dsUpdate("Company",$accountId,$grp);
	} 
}
?>  
