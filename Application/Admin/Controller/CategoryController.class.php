<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller {
	public function if_login(){
		$u_id = session("u_id");
		if(empty($u_id)){
			$this->error('请先登录',U('Index/login'));
		}
	}

    public function cate_list(){
		$this->if_login();

        //获取分类列表数据
        $m_category = D('category');
        $where = array(
            "is_show" => 1
        );
        $data_cate = $m_category->where($where)->select(); //显示的分类数据

	    $page_num = 15; //每页显示的记录数
	    $p = isset($_GET['p']) ? $_GET['p'] : 1; //获取当前页数
	    $list = $m_category->where(array('is_del' => 0))->order('id desc')->page($p.",$page_num")->select();
	    $count = $m_category->where(array('is_del' => 0))->count();  //查询满足要求的总记录数
	    $Page = new \Think\Page($count,$page_num); //实例化分页类 传入总记录数和每页显示的记录数
	    $show = $Page->show();  //分页显示输出

	    $this->assign('data_cate_all',$list); //赋值数据集
	    $this->assign('page', $show); //赋值分页输出
	    $this->assign('count',$count);//结果总记录
	    $this->assign('p',$p);
        $this->assign("data_cate",$data_cate);
        $this->display();
    }

    public function cate_edite(){
	    $this->if_login();
	    $this->display();
    }

    //图片上传
    public function img_upload(){
	    $this->if_login();

	    $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize= 3145728 ;// 设置附件上传大小
        $upload->exts =array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        // 使用最大权限0777创建文件
        if(!is_dir('./Uploads/category/'))mkdir('./Uploads/category/',0777);
        $upload->savePath= './category/'; // 设置附件上传目录
        $info = $upload->upload();//上传文件
        return $info;
    }

    //添加分类
    public function cate_add() {
	    $this->if_login();

	    if (IS_AJAX) {
            if ($_POST['pid'] == '') {
                $return = array(
                    "status" => false,
                    "message" => '所属分类不能为空！'
                );
            } else if (!$_POST['cate_name']) {
                $return = array(
                    "status" => false,
                    "message" => '分类名称不能为空！'
                );
            } else if (!$_POST['cate_content']) {
                $return = array(
                    "status" => false,
                    "message" => '分类说明不能为空！'
                );
            } else {
                $m_category = D('category');
                $data = array(
                    "parent_id" => $_POST['pid'],
                    "cate_name" => $_POST['cate_name'],
                    "cate_content" => $_POST['cate_content'],
                    "create_time" => time()
                );

                $return = $m_category->data($data)->add();
                if ($return) {
                    $return = array(
                        "status" => true,
                        "message" => ''
                    );
                }
            }
        }

        $this->ajaxReturn($return);
    }

    //是否显示
    public function is_show(){
	    $this->if_login();

	    if(IS_AJAX){
            $id = $_POST['id'];
            $type_id = $_POST['type_id'];

            $m_category = D('category');
            $where = array(
                "id" => $id
            );
            $data["is_show"] = $type_id;
            $reture = $m_category->where($where)->save($data);
        }

        $this->ajaxReturn($reture);
    }

    //分类查看
    public function category_look(){
	    $this->if_login();

	    if (IS_AJAX) {
            $id = $_POST["id"];
            $m_category = D('category');
            $return = $m_category->where(array('id' => $id))->find();
        }

        $this->ajaxReturn($return);
    }

    //分类编辑
    public function category_edit(){
	    $this->if_login();

	    //获取分类列表数据
        $m_category = D('category');
        $where = array(
            "is_show" => 1
        );
        $data_cate = $m_category->where($where)->select(); //显示的分类数据
        $id = $_GET["id"];
        $category_data = $m_category->where(array("id" => $id))->find();

        $this->assign("data_cate",$data_cate);
        $this->assign("category_data",$category_data);
        $this->display();
    }

    //提交编辑
    public function category_edit_do(){
	    $this->if_login();

	    if (IS_AJAX){
            $id = $_POST["id"];
            $edit_data = array(
                "parent_id" => $_POST["parent_id"],
                "cate_name" => $_POST["cate_name"],
                "cate_content" => $_POST["cate_content"]
            );

            $m_category = D('category');
            $return = $m_category->where(array("id" => $id))->save($edit_data);
        }

        $this->ajaxReturn($return);
    }

    //新增信息页面
    public function content_list(){
	    $this->if_login();

	    //获取分类列表数据
        $m_category = D('category');
        $where = array(
            "is_show" => 1
        );
        $data_cate = $m_category->where($where)->select(); //显示的分类数据

        //获取信息数据
        $m_news = D('News');
        $page_num = '10'; //每页显示的记录数
        $p = isset($_GET['p']) ? $_GET['p'] : 1; //获取当前页数
        $list = $m_news->where(array("is_show" => 0))->order('id desc')->page($p.",$page_num")->relation(true)->select(); //获取所以数据

        $count = $m_news->count(); //总条数
        $page = new \Think\Page($count,$page_num); //实例化分页类 传入总记录数和每页显示的记录数
        $show = $page->show(); //分页显示输出

        $this->assign('p',$p); //赋值分页输出
        $this->assign('page',$show); //赋值分页输出
        $this->assign('count', $count); //结果总记录数
        $this->assign("news_data",$list);
        $this->assign("data_cate",$data_cate);
        $this->display();
    }

    //执行信息添加
    public function content_add(){
	    $this->if_login();

	    $data = array(
            "cate_id" => intval($_POST['cate_id']),
            "news_title" => $_POST['news_title'],
            "news_content" => $_POST['news_content'],
            "create_time" => time()
        );

        if (!$data["cate_id"]) {
            $return = "所属栏目不能为空";
        } else if (!$data["news_title"]){
            $return = "标题不能为空";
        } else if (!$data["news_content"]) {
            $return = "内容不用为空";
        } else {
            $m_news = D("news");
            $result = $m_news->data($data)->add();

            if($result){
                $insert_id = $result; //获取当前插入id

                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728 ;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './Uploads/'; //设置附近上传根目录
                $upload->savePath = ''; // 设置附件上传(子)目录
                $upload->saveName = array('uniqid',''); //上传文件的保存规则
                $upload->autoSub = true; //自动使用子目录保存上传文件
                $upload->subName = array('date', 'Ymd'); //文件名称
                $info = $upload->uploadOne($_FILES['images']);//上传文件

                if(!$info){
                    //上传错误提示错误信息
                    $return = $upload->getError();
                } else {
                    //上传成功获取上传文件名字 并插入数据库
                    $data = array(
                        "images_name" => $info["savename"],
                        "images" => $info['savepath'].$info['savename']
                    );
//                    $img_url = $info['savepath'].$info['savename'];
//                    $re = $m_news->where(array("id" => $insert_id))->setField('images',$img_url);
                    $re = $m_news->where(array("id" => $insert_id))->save($data);

                    if ($re) {
                        $return = "添加成功";
                    } else {
                        $return = "添加失败";
                    }
                }


            } else {
                $return = "添加失败";
            }
        }

        echo"<script language='javascript' >alert('$return');window.location.href='content_list'</script>";
    }

    //信息查看
    public function content_look() {
	    $this->if_login();

	    if(IS_AJAX){
            $id = $_POST["id"];
            $m_news = D("news");
            $find_data = $m_news->where(array("id" => $id))->relation(true)->find();
        }

        $this->ajaxReturn($find_data);
    }

    //信息修改页面
    public function content_edit(){
	    $this->if_login();

	    //获取分类列表数据
        $m_category = D('category');
        $where = array(
            "is_show" => 1
        );
        $data_cate = $m_category->where($where)->select(); //显示的分类数据

        $id = $_GET["id"];
        $m_news = D('news');
        $data = $m_news->where(array("id" => $id))->relation(true)->find();

        $this->assign("data_cate",$data_cate);
        $this->assign("data",$data);
        $this->display();
    }

    //执行信息修改
    public function do_content_edit(){
	    $this->if_login();

        $id = $_POST['id'];
        $data = array(
            "cate_id" => intval($_POST['cate_id']),
            "news_title" => $_POST['news_title'],
            "news_content" => $_POST['news_content'],
        );

        if (!$data["cate_id"]) {
            $return = "所属栏目不能为空";
        } else if (!$data["news_title"]){
            $return = "标题不能为空";
        } else if (!$data["news_content"]) {
            $return = "内容不用为空";
        } else if (!$_FILES['images']['name']) {
            $m_news = D("news");
            $re = $m_news->where(array("id" => $id))->save($data);
            if ($re) {
                $return = "修改成功";
            } else {
                $return = "修改失败";
            }
        } else {
            $m_news = D("news");
            $result = $m_news->where(array("id" => $id))->save($data);

            if($result){
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728 ;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './Uploads/'; //设置附近上传根目录
                $upload->savePath = ''; // 设置附件上传(子)目录
                $upload->saveName = array('uniqid',''); //上传文件的保存规则
                $upload->autoSub = true; //自动使用子目录保存上传文件
                $upload->subName = array('date', 'Ymd'); //文件名称
                $info = $upload->uploadOne($_FILES['images']);//上传文件

                if(!$info){
                    //上传错误提示错误信息
                    $return = $upload->getError();
                } else {
                    //上传成功获取上传文件名字 并插入数据库
                    $data = array(
                        "images_name" => $info["savename"],
                        "images" => $info['savepath'].$info['savename']
                    );
//                    $img_url = $info['savepath'].$info['savename'];
//                    $re = $m_news->where(array("id" => $insert_id))->setField('images',$img_url);
                    $re = $m_news->where(array("id" => $id))->save($data);

                    if ($re) {
                        $return = "修改成功";
                    } else {
                        $return = "修改失败";
                    }
                }


            } else {
                $return = "修改失败";
            }
        }
        echo"<script language='javascript' >alert('$return');window.location.href='content_list'</script>";
    }

    //信息删除
    public function content_delete(){
	    $this->if_login();

	    if (IS_AJAX) {
            $id = $_POST['id'];
            $m_news = D('news');
            $data['is_show'] = 1;

            $return = $m_news->where(array("id" => $id))->save($data);
        }

        $this->ajaxReturn($return);
    }



}