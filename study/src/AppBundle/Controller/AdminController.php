<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Custom\MyController; // 自定义类
use AppBundle\Entity\Member;

/**
* 学习类
*/
class AdminController extends MyController
{
	/**
     * @Route("/admin")
     */
	public function indexAction()
	{
		return new Response(
            '<html><body> Hello World! Symfony! Admin! </body></html>'
        );
	}


}