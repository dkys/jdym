<?php
namespace Admin\Model;
use Think\Model;

class AdminModel extends Model
{
    //登录验证
    public $_login_validate = array(
        array('username', 'require', '用户名不能为空', 1),
        array('password', 'require', '密码不能为空', 1),
        array('chk_code', 'require', '验证码不能为空', 1),
        array('chk_code', 'chk_code', '验证码不正确', 1, 'callback'),
    );

    //验证码验证
    public function chk_code($code)
    {
        $Verify = new \Think\Verify();
        return $Verify->check($code);
    }

    //校验用户名密码
    public function login()
    {

        //先取出用户提交的用户名
        $username = $this->username;
        $password = $this->password;

        //判断帐号是否存在

        $user = $this->where(array(
            'username' => array('eq', $username)
        ))->find();


        if ($user) {

            if ($user['password'] == md5($password)) {

                //登录成功把ID和username存到session中
                session('id', $user['id']);
                session('username', $user['username']);
                session('password', md5($user['password']));
                return true;
            } else {
                $this->error = "密码不正确";
                return false;
            }
        } else {
            $this->error = "用户不存在 ";
            return false;
        }
    }

    //修改密码
    public function gaimi($data)
    {
        $mpass = $data['mpass'];
        $newpass = $data['newpass'];
        //获取用户id
        $id = session('id');
//        dump($id);die;
        //获取当前用户密码
        $info = $this->field('password')->find($id);
        //dump($info['password']);die;
        //校验原密码是否正确
        if ($info['password'] === md5($mpass)) {
            return $this->where(array(
                'id' => array('eq', $id)
            ))->setField('password', md5($newpass));
        } else {
            $this->error = '原密码输入错误';
            return false;
        }


    }

}