<?php
namespace Admin\Controller;
use Think\Controller;
class UsersController extends Controller {
    public function if_login(){
        $u_id = session("u_id");
        if(empty($u_id)){
            $this->error('请先登录',U('Index/login'));
        }
    }

    //会员列表
    public function user_list(){
        $this->if_login();

        $m_users = D('users');
        $page_num = 15; //每页显示的记录数
        $p = isset($_GET['p']) ? $_GET['p'] : 1; //获取当前页数
        $list = $m_users->where(array('is_del' => 0))->order('id desc')->page($p.",$page_num")->select();
        $count = $m_users->where(array('is_del' => 0))->count();  //查询满足要求的总记录数
        $Page = new \Think\Page($count,$page_num); //实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();  //分页显示输出

        $this->assign('list',$list); //赋值数据集
        $this->assign('page', $show); //赋值分页输出
        $this->assign('count',$count);//结果总记录
        $this->assign('p',$p);
        $this->display();
    }

    //会员添加
    public function user_add(){
        $this->if_login();

        $m_users = D('users');
        if (!$_POST['account']) {
            $return = "帐号不能为空";
        } else if (!$_POST['password']) {
            $return = "密码不能为空";
        } else if (!$_POST["email"]) {
            $return = "邮箱不能为空";
        } else {
            $data = array(
                "account" => $_POST["account"],
                "password" => md5($_POST["password"]),
                "phone" => $_POST["phone"],
                "email" => $_POST["email"],
                "create_time" => time()
            );

            $result = $m_users->data($data)->add();
            if ($result) {
                $return = "添加成功";
            } else {
                $return = "添加失败";
            }

        }
        echo"<script language='javascript' >alert('$return');window.location.href='user_list'</script>";
    }

    //会员修改
    public function user_edit(){
        $this->if_login();

        $id = $_GET['id'];

        $m_users = D('users');
        $users_data = $m_users->where(array('id'=> $id))->find();

        $this->assign("users_data", $users_data);
        $this->display();
    }

    //执行会员修改
    public function do_user_edit(){
        $this->if_login();

        if (IS_AJAX) {
            if(!$_POST['email']){
                $return = array(
                    "status" => false,
                    "message" => "邮件不能为空"
                );
            }else if (!$_POST['phone']){
                $return = array(
                    "status" => false,
                    "message" => "电话不能为空"
                );
            }else {
                $m_users = D('users');
                $data = array(
                    "email" => $_POST['email'],
                    "phone" => $_POST['phone']
                );
                $id = $_POST['id'];

                $result = $m_users->where(array('id'=>$id))->data($data)->save();

                if($result){
                    $return = array(
                        "status" => true,
                    );
                } else {
                    $return = array(
                        "status" => false,
                        "message" => "修改失败"
                    );
                }
            }
        }
        $this->ajaxReturn($return);
    }

    //会员删除
    public function user_delete(){
        $this->if_login();

        if(IS_AJAX){
            $id = $_POST['id'];
            $m_users = D('users');
            $return = $m_users->where(array('id'=> $id))->delete();
        }

        $this->ajaxReturn($return);
    }

    //密码重置数据获取
    public function get_user(){
        $this->if_login();

        if(IS_AJAX){
            $id = $_POST['id'];
            $m_users = D('users');
            $user_data = $m_users->where(array('id' => $id))->find();
        }

        $this->ajaxReturn($user_data);
    }

    //执行密码修改
    public function password_reset(){
        $this->if_login();

        if(IS_AJAX){
            $id = $_POST['id'];
            $password = $_POST['password'];
            $m_users = D('users');
            $data["password"] = md5($password);

            $result = $m_users->where(array('id' => $id))->data($data)->save();
        }
        $this->ajaxReturn($result);
    }

}