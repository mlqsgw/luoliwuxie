<?php
namespace Admin\Controller;
use Think\Controller;
class ManageController extends Controller {
    public function if_login(){
        $u_id = session("u_id");
        if(empty($u_id)){
            $this->error('请先登录',U('Index/login'));
        }
    }

    //管理员列表
    public function manage_list(){
        $this->if_login();

        $m_manage = D('manage');
        $page_num = 15; //每页显示的记录数
        $p = isset($_GET['p']) ? $_GET['p'] : 1; //获取当前页数
        $manage_data = $m_manage->where(array('is_del' => 0))->order('id desc')->page($p.",$page_num")->select();
        $count = $m_manage->where(array('is_del' => 0))->count();  //查询满足要求的总记录数
        $Page = new \Think\Page($count,$page_num); //实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();  //分页显示输出

        //用户信息
        $u_id = $_SESSION['u_id'];
        $user_data = $m_manage->where(array('id' => $u_id))->find();
        $this->assign("user_data", $user_data);

        $this->assign('manage_data',$manage_data); //赋值数据集
        $this->assign('page', $show); //赋值分页输出
        $this->assign('count',$count);//结果总记录
        $this->assign('p',$p);
        $this->display();
    }

    //管理员添加
    public function manage_add(){
        $this->if_login();
        $m_manage = D('manage');
        $manage_status = $_SESSION['manage_status'];
        if($manage_status != 1){
            $return = "没有操作权限";
        } else if(!$_POST['name']) {
            $return = "昵称不能为空";
        } else if (!$_POST['account']) {
            $return = "帐号不能为空";
        } else if (!$_POST['password']) {
            $return = "密码不能为空";
        } else if (!$_POST["email"]) {
            $return = "邮箱不能为空";
        } else {
            $data = array(
                "name" => $_POST["name"],
                "account" => $_POST["account"],
                "password" => md5($_POST["password"]),
                "email" => $_POST["email"],
                "creat_time" => time()
            );

            $result = $m_manage->data($data)->add();
            if ($result) {
                $return = "添加成功";
            } else {
                $return = "添加失败";
            }

        }
        echo"<script language='javascript' >alert('$return');window.location.href='manage_list'</script>";
    }

    //管理员修改
    public function manage_edit(){
        $this->if_login();

        $id = $_GET['id'];

        $m_manage = D('manage');
        $manage_data = $m_manage->where(array('id'=> $id))->find();

        $this->assign("manage_data", $manage_data);
        $this->display();
    }

    //执行管理员修改
    public function do_manage_edit(){
        $this->if_login();
        $manage_status = $_SESSION['manage_status'];
        if (IS_AJAX) {
            if($manage_status !=1){
                $return = array(
                    "status" => false,
                    "message" => "没有操作权限"
                );
            }else if(!$_POST['email']){
                $return = array(
                    "status" => false,
                    "message" => "邮件不能为空"
                );
            }else if (!$_POST['name']){
                $return = array(
                    "status" => false,
                    "message" => "昵称不能为空"
                );
            }else {
                $m_manage = D('manage');
                $data = array(
                    "email" => $_POST['email'],
                    "name" => $_POST['name']
                );
                $id = $_POST['id'];
                $result = $m_manage->where(array('id'=>$id))->data($data)->save();
                if($result){
                    $return = array(
                        "status" => true,
                        "message" => "修改成功"
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

	//管理员删除
	public function manage_delete(){
        $this->if_login();
        $manage_status = $_SESSION['manage_status'];
        if(IS_AJAX){
            if($manage_status != 1){
                $return = array(
                    "status" => false,
                    "message" => "没有操作权限"
                );
            } else {
                $id = $_POST['id'];
                $m_manage = D('manage');

                $return = $m_manage->where(array('id'=> $id))->delete();
                if ($return) {
                    $return = array(
                        "status" => true,
                        "message" => "删除成功"
                    );
                }else{
                    $return = array(
                        "status" => false,
                        "message" => "删除失败"
                    );
                }
            }
		}

		$this->ajaxReturn($return);
	}

}