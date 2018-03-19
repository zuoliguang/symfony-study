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
class StudyController extends MyController
{
	/*----系统目录结构-------------------------------------------------*/
	// app: 内含配置文件和模板。大体上，只要不是PHP代码的材料都放在这里。
	// src: PHP程序之所在。
	// web: 它是整个项目的文档根目录，存放可公开访问的文件，比如CSS、图片以及用来执行app（app_dev.php和app.php）的Symfony的前端控制器（front controller）。
	// tests: 自动测试（如Unit tests/单元测试）被存放在这里
	// bin: 用于存放二进制（binary）文件。最重要的是console文件，它被用来在console中执行Symfony命令。
	// var: 自动生成的文件被存放的地方，比如缓存文件（var/cache/）和日志文件（var/logs/）。
	// vendor: 通过依赖管理器Composer，第三方类库、包、bundles被下载到这里。你应该不去编辑这个目录下的东西。

	// ----------------------------------------------------入门操作

	/**
     * @Route("/study/index", name="study_index")
     */
	public function indexAction()
	{
		return new Response(
            '<html><body> Hello World! Symfony! Zuoliguang! </body></html>'
        );
	}

	/**
	 * @Route("/study/api")
	 */
	public function apiAction()
	{
		$data = ['a'=>1,'b'=>2,'c'=>3];
		$this->ajaxReturnData(200, '操作成功', $data);
	}

	/**
	 * @Route("/study/rediect")
	 */
	public function rediectAction()
	{
		return $this->redirectToRoute('study_getint', ['int'=>1228]); // 地址跳转
	}

	/**
	 * @Route("/study/exception")
	 */
	public function exceptionAction()
	{
		throw $this->createNotFoundException('Something does not exist'); // 报错页面
	}

	// ----------------------------------------------------参数传入
	
	/**
	 * @Route("/study/get/{id}/{name}/{key}", name="study_getinfo")
	 */
	public function getAction($id, $name, $key='')
	{
		$data = $id . ":" . $name . ":" . $key;
		$this->ajaxReturnData(200, '操作成功', $data);
	}

	/**
     * @Route("/study/getint/{int}", name="study_getint", requirements={"int": "\d+"})
     */
	public function getintAction($int=0)
	{
		$this->ajaxReturnData(200, '操作成功', $int);
	}

	/**
     * @Route("/study/geturl")
     */
	public function geturlAction()
	{
		// $url = $this->container->get('router')->generate('study_getint', ['int'=>1223]); // 生成路径 /study/getint/{int}
		$url = $this->generateUrl('study_getint', ['int'=>1223]); // 生成路径 /study/getint/{int}
		$this->ajaxReturnData(200, '操作成功', $url);
	}


	/**
	 * @Route("/study/datarequest/{id}", requirements={"id": "\d+"})
	 */
	public function datarequestAction($id=1, Request $request)
	{
		// 管理Session 
		// $session = $request->getSession();
		// $session->set('tip', 'Zuoliguang!');
		// $tip = $session->get('tip', 'NotFoundTheValue');
		// $tipper = $session->get('tipper', 'NotFoundTheValue'); // 获取不存在时的默认值
		// $this->ajaxReturnData(200, '操作成功', ['tip'=>$tip, 'tipper'=>$tipper]);

		// is it an Ajax request?
		// $request->isXmlHttpRequest(); 
	 
	    // retrieve GET and POST variables respectively
	    // $request->query->get('page');
	    // $request->request->get('page');
	 
	    // retrieve SERVER variables
	    // $request->server->get('HTTP_HOST');
	 
	    // retrieves an instance of UploadedFile identified by foo
	    // $request->files->get('foo');
	 
	    // retrieve a COOKIE value
	    // $request->cookies->get('PHPSESSID');
	 
	    // retrieve an HTTP request header, with normalized, lowercase keys
	    // $request->headers->get('host');
	    // $request->headers->get('content_type');
	    
	    // 内部封装的返回json信息的操作
	    // return $this->json(['a'=>1,'b'=>3]);
	}


	// ---------------------------------------------------数据库

	/**
	 * @Route("/study/user_add")
	 */
	public function user_addAction()
	{
		// 创建模型类
		$member = new Member();

		// 设置属性
		$member->setName('Zuoliguang');
		$member->setAge(23);
		$member->setTel('12345678901');
		$member->setAddress('北京市测试地址');
		$member->setExtInfo('这个只是一个测试信息11111');

		// 获取管理类
		$em = $this->getDoctrine()->getManager();
		$em->persist($member); // 声明要存储的类
		$em->flush(); // 项数据库添加数据

		return new Response('Save new Member with id '.$member->getId());
	}

	/**
	 * @Route("/study/user_get")
	 */
	public function user_getAction()
	{
		$id = 2;
		$member = $this->getDoctrine()->getRepository('AppBundle:Member')->find($id);

		$member = $this->getDoctrine()->getRepository('AppBundle:Member')->findAll();
		
		$member = $this->getDoctrine()->getRepository('AppBundle:Member')->findByExtInfo('这个只是一个测试信息11111');
		
		$names = ['name'=>'aaa'];
		$order = ['id'=>'DESC']; // 排序操作
		$member = $this->getDoctrine()->getRepository('AppBundle:Member')->findOneBy($names);
		$member = $this->getDoctrine()->getRepository('AppBundle:Member')->findBy($names);
		$member = $this->getDoctrine()->getRepository('AppBundle:Member')->findBy($names, $order);
		
		header("Content-type:text/html;charset=utf-8");
		echo '<pre>';
		print_r($member);
		echo '</pre>';
		die();
	}

	/**
	 * @Route("/study/user_update")
	 */
	public function user_updateAction()
	{
		$em = $this->getDoctrine()->getManager();
		$id = 3;
		$member = $em->getRepository('AppBundle:Member')->find($id);

		$member->setName('zlg');
		$member->setAge(23);
		$member->setTel('12345678901');
		$member->setAddress('北京市测试地址');
		$member->setExtInfo('这个只是一个测试信息3333');
		$em->flush();
		return new Response('修改结束');
	}

	/**
	 * @Route("/study/user_del")
	 */
	public function user_delAction()
	{
		$id = 5;
		$em = $this->getDoctrine()->getManager();
		$member = $em->getRepository('AppBundle:Member')->find($id);
		$em->remove($member);
		$em->flush();
		return new Response('删除结束');
	}


	/**
	 * @Route("/study/user_sql")
	 */
	public function user_sqlAction()
	{
		$em = $this->getDoctrine()->getManager();
		//1、自己写sql 注意：该位置的sql要使用symfony自己的sql语法规则
		$sql = "SELECT m FROM AppBundle:Member m WHERE m.name = :name ORDER BY m.id DESC ";
		$query = $em->createQuery($sql)->setParameter('name', 'bbb');
		$member = $query->getResult();

		// 2、构造器查询
		$repository = $this->getDoctrine()->getRepository('AppBundle:Member');
		$query = $repository->createQueryBuilder('m')->where('m.name = :name')->setParameter('name', 'ccc')->orderBy('m.id', 'DESC')->getQuery();
		$member = $query->getResult();

		header("Content-type:text/html;charset=utf-8");
		echo '<pre>';
		print_r($member);
		echo '</pre>';
		die();
	}

	// ---------------------------------------------------模板

	/**
	 * @Route("/study/view")
	 */
	public function viewAction()
	{
		$data = [];

		$data['tip'] = "Hi~,I'm study Controller!";
		
		$data['arr'] = [
			['id'=>1, 'name'=>'a'],
			['id'=>2, 'name'=>'ab'],
			['id'=>3, 'name'=>'abc'],
			['id'=>4, 'name'=>'abcd'],
			['id'=>5, 'name'=>'abcde'],
		];

		$data['description'] = "<script>alert('test');</script>";
		
		return $this->render('study/test.html.twig', $data);
	}


}