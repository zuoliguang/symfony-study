<?php

namespace AppBundle\Custom;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * 自定义类
 */
class MyController extends Controller
{
	protected function ajaxReturnData($status=200, $meesage='', $data=[])
	{
		$returnData = [
			'status' => $status,
			'meesage' => $meesage,
			'data' => $data
		];
		die( json_encode($returnData) );
	}
}