<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function if_login(){
        $u_id = session("u_id");
        if(empty($u_id)){
            $this->error('请先登录',U('Index/login'));
        }
    }
    public function index(){
        $this->if_login();
        $this->display();
    }

    public function left(){
        $this->display();
    }

    public function right(){
        $this->display();
    }

    public function top(){
        $this->display();
    }

    public function login(){
        $this->display();
    }

    public function do_login(){
        if(IS_AJAX){
            if(!$_POST["account"]){
                $return = array(
                    "status" => false,
                    "message" => "帐号不能为空"
                );
            } else if(!$_POST["password"]){
                $return = array(
                    "status" => false,
                    "message" => "密码不能为空"
                );
            } else {
                $m_manage = D("manage");
                $data = array(
                    "account" => $_POST["account"],
                    "password" => md5($_POST["password"])
                );
                $result = $m_manage->where($data)->find();
                if($result){
                    session('u_id',$result['id']);
                    session('manage_status',$result['manage_status']);
                    $return = array(
                        "status" => true,
                        "message" => "登录成功"
                    );
                } else {
                    $return = array(
                        "status" => false,
                        "message" => "帐号或密码错误"
                    );
                }
            }
        }

        $this->ajaxReturn($return);
    }

    //退出
    public function login_out(){
        session_destroy();  //清除session
        $this->success("成功安全退出！", "login");
    }


}