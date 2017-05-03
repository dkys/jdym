<?php

namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller
{
	public function login()
	{

		if(IS_POST)
		{
		$model = D("Admin");
//			 dump($_POST);die;

			if($model->validate($model->_login_validate)->create())
			{
				if($model->login())
				{
					$this->success('登录成功',U('Index/index'),1);
					exit;
				}
			}

			$this->error($model->getError());
		}
		$this->display();
	}
    public function logout()
    {
        session(null);
        $this->success('退出成功',U('login'),1);
        return true;
    }
	//生成图片验证码
	public function chk_code()
	{
		$Verify  = new \Think\Verify(array(
			'length'=> 3,
			'useNoise'=>false
		));
		$Verify->entry();
	}
}