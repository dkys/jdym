<?php

namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		//判断登录
		$id = session('id');
		if(!$id)
			$this->error('请登录后访问',U('Login/login'),1);
	}
}