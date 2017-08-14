<?php

namespace App\Traits;

use SoapClient;
use \StdClass;
use DB;

/**
 * This trait contains methods needed to obtain and interact with users already existing on the Zanibal platform
 *
 * @author Omadoye Abraham <omadoyeabraham@gmail.com>
 */

trait ObtainZanibalUsers
{

	/**
	 * Determine if a user with the passed in email address already exists on the Zanibal platform
	 * 
	 * @param  String $email The email to be searched for
	 * @return Bool
	 */
	function userExistsOnZanibal($email)
	{

		$sqlQuery = "   SELECT EMAILADDRESS1 FROM zebroker_prod.partner
						WHERE EMAILADDRESS1 IS NOT NULL
						AND EMAILADDRESS1 = '$email'
   					 ";

   		$zanibalUser = DB::connection('zanibal')->select(DB::raw($sqlQuery));

   		// One or more zanibal Users have been registered with the passed in email.
   		if(count($zanibalUser))
   		{
   			return true;
   		}

   		return false;	
	}

	function getWSDL()
	{
		return new SoapClient('https://zanibal.cardinalstone.com/ebclient/services/MobileClientService?wsdl', array("trace" => 1, "exceptions" => 1, "login" => 'cardinal_portal', "password" => 'oYLvArku%75'));
	}

}




?>