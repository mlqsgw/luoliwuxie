<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $m_news = D('news');
        //首页头部图片
        //总会头部图片
        $total_cate_id = 17; //分类id
        $top_images = $m_news->where(array('cate_id' => $total_cate_id))->find();
        //西分会头部图片
        $west_cate_id = 18;
        $west_images = $m_news->where(array('cate_id' => $west_cate_id))->find();
        //东分会头部图片
        $east_cate_id = 19;
        $east_images = $m_news->where(array('cate_id' => $east_cate_id))->find();
        //北分会头部图片
        $north_cate_id = 20;
        $north_images = $m_news->where(array('cate_id' => $north_cate_id))->find();
        //首页跑马灯图片
        $image_status = 16;
        $where = array(
            "cate_id" => $image_status,
            "is_show" => 0
        );
        $image_data = $m_news->where($where)->select();

        $this->assign("top_images",$top_images);
        $this->assign("east_images",$east_images);
        $this->assign("west_images",$west_images);
        $this->assign("north_images",$north_images);
        $this->assign("image_data",$image_data);
        $this->display();
    }

    //登陆页面
    public function login(){
        $this->display();
    }

    //执行登陆
    public function do_login(){
        if(IS_AJAX){
            if(!$_POST['account']){
                $return = array(
                    "status" => false,
                    "message" => "登陆帐号不能为空"
                );
            } elseif(!$_POST['password']){
                $return = array(
                    "status" => false,
                    "message" => "密码不能为空"
                );
            } else {
                $m_users = D('users');
                $where = array(
                    "account" => $_POST['account'],
                    "password" => md5($_POST['password'])
                );
                $result = $m_users->where($where)->find();

                if($result){
                    session('u_id',$result['id']);
                    session('account',$result['account']);
                    $return = array(
                        "status" => true,
                        "message" => "登陆成功"
                    );
                } else {
                    $return = array(
                        "status" => false,
                        "message" => "登陆失败"
                    );
                }
            }
        }

        $this->ajaxReturn($return);
    }

    //注册页面
    public function register(){
        $this->display();
    }

    //执行注册
    public function do_register(){
        if(IS_AJAX){
            if (!$_POST['account']) {
                $return = array(
                    "status" => false,
                    "message" => "帐号不能为空"
                );
            } else if(!$_POST['password']){
                $return = array(
                    "status" => false,
                    "message" => "登陆密码不能为空"
                );
            } else if(!$_POST['phone']){
                $return = array(
                    "status" => false,
                    "message" => "手机号不能为空"
                );
            } else if (!$_POST['email']){
                $return = array(
                    "status" => false,
                    "message" => "邮箱不能为空"
                );
            } else if(!preg_match("/^[0-9a-zA-Z]{6,12}$/", $_POST['account'])){
                $return = array(
                    "status" => false,
                    "message" => "帐号只能是字母和数字组合"
                );
            } else if (!preg_match('/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9a-zA-Z]+$/', $_POST['password'])){
                $return = array(
                    "status" => false,
                    "message" => "密码只能是字母和数字组合"
                );
            } else if(!preg_match("/^1[34578]{1}\d{9}$/",$_POST['phone'])){
                $return = array(
                    "status" => false,
                    "message" => "手机号格式不正确"
                );
            } else if(!preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i",$_POST['email'])){
                $return = array(
                    "status" => false,
                    "message" => "邮箱格式不正确"
                );
            } else {
                $m_users = D('Users');
                $data = array(
                    "account" => $_POST['account'],
                    "password" => md5($_POST['password']),
                    "phone" => $_POST['phone'],
                    "email" => $_POST['email'],
                    "create_time" => time()
                );

                $result = $m_users->data($data)->add();
                if($result){
                    $return = array(
                        "status" => true,
                        "message" => "注册成功"
                    );
                } else {
                    $return = array(
                        "status" => false,
                        "message" => "注册失败"
                    );
                }
            }
        }
        $this->ajaxReturn($return);
    }

    //退出登陆
    public function logout(){
        session_destroy();
        $this->redirect('Index/index');
    }


    //------------------------------联系我们---------------------------------//
    public function contact(){
        $address = array(
            "1" => array(
                "title" => "名称：洛阳理工学院（西分会）",
                "point" => "112.424325,34.619474",
                "address" => "河南省洛阳市洛龙区学子街8号"
            ),
            "2" => array(
                "title" => "名称：洛阳理工学院（东分会）",
                "point" => "112.439283,34.614729",
                "address" => "河南省洛阳市洛龙区王城大道90号"
            ),
            "3" => array(
                "title" => "名称：洛阳理工学院（北分会）",
                "point" => "112.420266,34.655682",
                "address" => "河南省洛阳市涧西区九都路与珠江路交叉口"
            )
        );
        $address = json_encode($address);

        $this->assign("address", $address);
        $this->display();
    }

    //------------------------------消息中心---------------------------------//
    public function news(){
        $status = $_GET['status'];

        $this->assign('status',$status);
        $this->display();
    }

}