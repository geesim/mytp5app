<?php
/** 
* common.php 
*  
*
* @author      geesim<geesim126@gmail.com> 
* @version     1.0.
* @since       1
*/


/**   
* @desc generate random token
* 
* @access  
* @param int arg desc
* @see http://blog.csdn.net/u014477164/article/details/78285496
* @datetime alt+d
* @return \think\Response 
*/ 
function randomToken($length = 32){  
 
    if (function_exists('random_bytes')) {  
        return bin2hex(random_bytes($length));  
    }  
    if (function_exists('mcrypt_create_iv')) {  
        return bin2hex(mcrypt_create_iv($length, MCRYPT_DEV_URANDOM));  
    }   
    if (function_exists('openssl_random_pseudo_bytes')) {  
        return bin2hex(openssl_random_pseudo_bytes($length));  
    }  
}

/**   
* @desc generate salt string
* 
* @access public
* @param int arg desc
* @see http://blog.csdn.net/u014477164/article/details/78285496
* @datetime 
* @return string 
*/ 
function salt(){  
    return substr(strtr(base64_encode(hex2bin(randomToken(32))), '+', '.'), 0, 44);  
}

/**   
* @desc password
* 
* @access public 
* @param string $pwd password string
* @param string $salt salt string
* @author geesim<geesim126@gmail.com>
* @datetime alt+d
* @return mixed 
*/ 
function saltPwd($pwd, $salt)
{
	$result = '';

	if($pwd && $salt)
	{
		$result = md5(md5($pwd).$salt);
	}
	return $result;
}