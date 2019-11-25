<?php 
session_start();
require_once 'models/blogger_models.php';
class blogger_controller{
	function login()
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$models_obj=new blogger_models();
		$user_login=$models_obj->login($email,md5($password)); 
		if ($user_login==true) {
			$_SESSION['user']=$user_login;

			header('location: index.php?mod=blogger&act=home_admin');
			if (isset($_SESSION['error_user'])) {
				unset($_SESSION['error_user']);
			}

		}else {
			$_SESSION['error_user']="sai thông tin đăng nhập";
			header('location: index.php?mod=blogger&act=login');
		}

	}
	function home_admin(){
		$id=$_SESSION['user']['id'];
		$models_obj=new blogger_models();
		$userlogin=$models_obj->getuserlogin($id);
		require_once 'views/admin/home.php';
	}
	function register_process(){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$re_password=$_POST['re_password'];
		$models_obj=new blogger_models();
		$status=$models_obj->register($name,$email,md5($password),md5($re_password));
		if ($status==true) {
			header('location: index.php?mod=blogger&act=login');
			if (isset($_SESSION['error_register'])) {
				unset($_SESSION['error_register']);
			}
		}else{
			$_SESSION['error_register']="email đã được sử dụng";
			header('location: index.php?mod=blogger&act=register');
		}


	}
	function add_post_blogger(){
		$models_obj=new blogger_models();
		$categories=$models_obj->getcategory();
		$id=$_SESSION['user']['id'];
		$userlogin=$models_obj->getuserlogin($id);
		require_once 'views/admin/add_post.php';
	}
	function list_post_blogger(){
		$user_id=$_SESSION['user']['id'];
		$models_obj=new blogger_models();
		$posts=$models_obj->getlistposts($user_id);
		$id=$_SESSION['user']['id'];
		$userlogin=$models_obj->getuserlogin($id);
		require_once 'views/admin/list_posts.php';
	}
	function detail_post(){
		$id=$_GET['id'];
		$models_obj=new blogger_models();
		$post=$models_obj->detail_post($id);
		$id=$_SESSION['user']['id'];
		$userlogin=$models_obj->getuserlogin($id);
		require_once 'views/admin/detail_post.php';
	}
	function add_post_blogger_process(){
		$user_id=$_SESSION['user']['id'];
		$data=$_POST;
		$models_obj=new blogger_models();
		$posts=$models_obj->getlistposts($user_id);
		$status=$models_obj->add_post($data,$user_id);
		if ($status==true) {
			header('location: index.php?mod=blogger&act=list_post');
		} else {
			header('location: index.php?mod=blogger&act=add_post');
		}
	}
	function edit_post(){
		$slug=$_GET['slug'];
		$models_obj=new blogger_models();
		$categories=$models_obj->getcategory();
		$post=$models_obj->update($slug);
		$id=$_SESSION['user']['id'];
		$userlogin=$models_obj->getuserlogin($id);
		require_once 'views/admin/edit_post.php';
	}
	function edit_post_process(){
		$user_id=$_SESSION['user']['id'];
		$data=$_POST;
		$models_obj=new blogger_models();
		$posts=$models_obj->getlistposts($user_id);
		$status=$models_obj->update_process($data);
		if ($status==true) {
			header('location: index.php?mod=blogger&act=list_post');
		} else {
			header('location: index.php?mod=blogger&act=edit_post');
		}
	}
	function delete(){
		$user_id=$_SESSION['user']['id'];
		$id=$_GET['id'];
		$models_obj=new blogger_models();
		$status=$models_obj->delete($id);
		if ($status) {
			header('location: index.php?mod=blogger&&act=list_post');
		} else {
			echo 'error';
		}
		
		
	}
	function addcategory(){
		$models_obj=new blogger_models();
		$categories=$models_obj->addcategory();
		$id=$_SESSION['user']['id'];
		$userlogin=$models_obj->getuserlogin($id);
		require_once 'views/admin/add_category.php';
	}
	function addcategoryprocess(){
		$id=$_SESSION['user']['id'];
		$data=$_POST;
		$data['parent_id']=($data['parent_id']==0)?'NULL':$data['parent_id'];
		$models_obj=new blogger_models();
		$status=$models_obj->store($data,$id);
		if ($status) {
			header('location: index.php?mod=blogger&&act=list_categories');
		} else {
			echo 'error';
		}
	}
	function list_categories(){
		$models_obj=new blogger_models();
		$categories=$models_obj->getcategory();
		$id=$_SESSION['user']['id'];
		$userlogin=$models_obj->getuserlogin($id);
		require_once 'views/admin/list_categories.php';
	}
	function approvedcategory(){
		$id=$_GET['id'];
		$models_obj=new blogger_models();
		$status=$models_obj->approvedcategory($id);
		if ($status) {
			header('location: index.php?mod=blogger&act=list_categories');
		} else {
			echo 'error';
		}
	}
	function displaycategory(){
		$id=$_GET['id'];
		$models_obj=new blogger_models();
		$status=$models_obj->displaycategory($id);
		if ($status) {
			header('location: index.php?mod=blogger&act=list_categories');
		} else {
			echo 'error';
		}
	}
	function hiddencategory(){
		$id=$_GET['id'];
		$models_obj=new blogger_models();
		$status=$models_obj->hiddencategory($id);
		if ($status) {
			header('location: index.php?mod=blogger&act=list_categories');
		} else {
			echo 'error';
		}
	}
	function getlistall(){
		$models_obj=new blogger_models();
		$all_posts_created_at=$models_obj->getlistall();
		$id=$_SESSION['user']['id'];
		$userlogin=$models_obj->getuserlogin($id);
		require_once 'views/admin/list_posts_all.php';
	}
	function hiddenpost(){
		$id=$_GET['id'];
		$models_obj=new blogger_models();
		$posts_created_at=$models_obj->getlistall();
		$status=$models_obj->hiddenpost($id);
		if ($status) {
			header('location: index.php?mod=blogger&act=getlistall');
		} else {
			echo 'error';
		}


	}
	function deleteadmin(){
		$id=$_GET['id'];
		$models_obj=new blogger_models();
		$status=$models_obj->delete($id);
		if ($status) {
			header('location: index.php?mod=blogger&&act=getlistall');
		} else {
			echo 'error';
		}
	}
	function list_approved_post(){
		$models_obj=new blogger_models();
		$list_approved_post=$models_obj->list_approved_post();
		$id=$_SESSION['user']['id'];
		$userlogin=$models_obj->getuserlogin($id);
		require_once 'views/admin/list_approved_post.php';
	}
	function approved_post(){
		$id=$_GET['id'];
		$models_obj=new blogger_models();
		$status=$models_obj->approved_post($id);
		if ($status) {
			header('location: index.php?mod=blogger&act=list_approved_post');
		} else {
			echo 'error';
		}

		
	}
	function list_status_post(){
		$models_obj=new blogger_models();
		$list_status_post=$models_obj->list_status_post();
		$id=$_SESSION['user']['id'];
		$userlogin=$models_obj->getuserlogin($id);
		require_once 'views/admin/poststatus.php';
	}
	function status_post(){
		$id=$_GET['id'];
		$models_obj=new blogger_models();
		$status=$models_obj->status_post($id);
		if ($status) {
			header('location: index.php?mod=blogger&act=list_status_post');
		} else {
			echo 'error';
		}

		
	}
	function list_user(){
		$models_obj=new blogger_models();
		$users=$models_obj->list_users();
		$id=$_SESSION['user']['id'];
		$userlogin=$models_obj->getuserlogin($id);
		require_once 'views/admin/list_user.php';
	}
	function unlock_user(){
		$id=$_GET['id'];
		$models_obj=new blogger_models();
		$status=$models_obj->unlock_user($id);
		if ($status) {
			header('location: index.php?mod=blogger&act=list_user');
		} else {
			echo 'error';
		}

	}
	function lock_user(){
		$id=$_GET['id'];
		$models_obj=new blogger_models();
		$status=$models_obj->lock_user($id);
		if ($status) {
			header('location: index.php?mod=blogger&act=list_user');
		} else {
			echo 'error';
		}

	}
	function update_info(){
		$user_id=$_SESSION['user']['id'];
		$models_obj=new blogger_models();
		$user=$models_obj->update_user($user_id);
		$id=$_SESSION['user']['id'];
		$userlogin=$models_obj->getuserlogin($id);
		require_once 'views/admin/edit_user.php';
	}
	function update_user_process(){
		$user_id=$_SESSION['user']['id'];
		$data=$_POST;

		$models_obj=new blogger_models();

		$status=$models_obj->update_user_process($data);
		if ($status==true) {
			header('location: index.php?mod=blogger&act=home_admin');
		} else {
			header('location: index.php?mod=blogger&act=update_info');
		}
	}
	function reset_password(){
		$models_obj=new blogger_models();
		$id=$_SESSION['user']['id'];
		$userlogin=$models_obj->getuserlogin($id);
		require_once 'views/admin/resetpass.php';
	}
	function update_password(){
		$id=$_SESSION['user']['id'];
		$password=$_SESSION['user']['password'];

		$old_password=$_POST['old_password'];
		$new_password=$_POST['new_password'];
		$confirm_new_password=$_POST['confirm_new_password'];
		$models_obj=new blogger_models();
		
		$status=$models_obj->reset_password($id,$password,md5($old_password),md5($new_password),md5($confirm_new_password));
		if ($status==true) {
			header('location: index.php?mod=blogger&act=login');
			if (isset($_SESSION['error_repass'])) {
				unset($_SESSION['error_repass']);
			}
			// session_destroy();
			// require_once 'views/login.php';
		} else {
			
			$_SESSION['error_repass']="Mật khẩu cũ hoặc xác nhận mật khẩu không đúng";
			header('location: index.php?mod=blogger&act=reset_password');
		}
	}
    function list_comment(){
		$slug=$_GET['slug'];
		$models_obj=new blogger_models();
		$comments=$models_obj->getcommentbypost($slug);
		$id=$_SESSION['user']['id'];
		$userlogin=$models_obj->getuserlogin($id);
		require_once 'views/admin/list_comments.php';


	}
	function approvedcomment(){
		$id=$_GET['id'];
		$slug=$_GET['slug'];
		$models_obj=new blogger_models();
		$status=$models_obj->approvedcomment($id);
		if ($status) {
			header('location: index.php?mod=blogger&act=getlistall');
		} else {
			echo 'error';
		}
	}
	function unapprovedcomment(){
		$id=$_GET['id'];
		$models_obj=new blogger_models();
		$status=$models_obj->unapprovedcomment($id);
		if ($status) {
			header('location: index.php?mod=blogger&act=getlistall');
		} else {
			echo 'error';
		}
	}


}

?>