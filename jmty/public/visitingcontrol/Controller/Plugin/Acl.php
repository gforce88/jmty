<?php

/**
 * 访问时间控制插件
 * @author xuweiming
 *
 */

class visitingcontrol_Controller_Plugin_Acl extends Zend_Controller_Plugin_Abstract
{
	public function preDispatch(Zend_Controller_Request_Abstract $request)
	{
		$this->syssetting = Zend_Registry::get ( "SYS_SETTING" );
		date_default_timezone_set($this->syssetting["timezone"]);
		
		$currenthour = (int)date("H",time());
		
		if($currenthour>$this->syssetting["onlinetime"]&&$currenthour<$this->syssetting["offlinetime"]){
			
		}else{
			$request->setControllerName('index');
			$request->setActionName('sorry');
		}
	
	}
}