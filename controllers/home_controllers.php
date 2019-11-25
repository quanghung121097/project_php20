<?php session_start(); require_once 'models/home_models.php';
require_once 'models/pager.php';
class home_controllers
{
	function home(){
		$models_obj=new home_models();
		$categories=$models_obj->getcategory_parent();
		$posts_views_3=$models_obj->get3postbyview();
		$posts_by_search=$models_obj->getpostbysearch();

		$posts_created_at=$models_obj->getpostbycreated_at();
		$trang_hientai=(isset($_GET['page']))?$_GET['page']:1;
		$pagination =new pagination(count($posts_created_at),$trang_hientai,6,5);
		$paginationHTML=$pagination->showPagination();
		$limit=$pagination->_nItemOnPage;
		$vitri=($trang_hientai-1)*$limit;
		$posts_created_at=$models_obj->getpostbycreated_at($vitri,$limit);
		$posts_created_at_asc=$models_obj->getpostascbycreated_at();
		$posts_views_5=$models_obj->get5postbyview();
		require_once 'views/user/home.php';

	}
	function listposts(){
		$id=$_GET['id'];
		$models_obj=new home_models();
		$categories=$models_obj->getcategory_parent();
		$posts_by_search=$models_obj->getpostbysearch();
		
		$posts_created_at_asc=$models_obj->getpostascbycreated_at();
		$posts_views_5=$models_obj->get5postbyview();
		$listpostsbycategory=$models_obj->listpostsbycategory($id);
		$trang_hientai=(isset($_GET['page']))?$_GET['page']:1;
		$pagination =new pagination(count($listpostsbycategory),$trang_hientai,6,5);
		$paginationHTML=$pagination->showPagination();
		$limit=$pagination->_nItemOnPage;
		$vitri=($trang_hientai-1)*$limit;
		$listpostsbycategory=$models_obj->listpostsbycategory($id,$vitri,$limit);
		$category_in_listposts=$models_obj->getcategory_in_listposts($id);
		require_once 'views/user/list_posts_bycategory.php';
	}
	function post(){
		$slug=$_GET['slug'];
		$models_obj=new home_models();
		$categories=$models_obj->getcategory_parent();
		$posts_by_search=$models_obj->getpostbysearch();
		$getpost=$models_obj->getpost($slug);
		$posts_created_at_asc=$models_obj->getpostascbycreated_at();
		$posts_views_5=$models_obj->get5postbyview();
		$comments=$models_obj->getcommentpost($slug);
		require_once 'views/user/post.php';
	}
	function search(){
		$models_obj=new home_models();
		if (isset($_POST['searchposts'])) {
			$key=$_POST['searchposts'];
			$categories=$models_obj->getcategory_parent();
			$posts_by_search=$models_obj->getpostbysearch();
			$posts_created_at_asc=$models_obj->getpostascbycreated_at();
			$posts_views_5=$models_obj->get5postbyview();
			$searchposts=$models_obj->search($key);
			if ($searchposts==true) {
				$_SESSION['search']=$searchposts;
			}
			require_once 'views/user/search.php';
		}
	}
	function addcomment(){
		$models_obj=new home_models();
		if (isset($_SESSION['user'])==true) {
			$id_user=$_SESSION['user']['id'];
			$slug_post=$_POST['slug_post'];
			$content=$_POST['content'];
			$status=$models_obj->addcomment($id_user,$slug_post,$content);
			if ($status==true) {
				header('location: '.$_SERVER['HTTP_REFERER']);
			} else {
				echo 'chưa thêm cmt';
			}
			
		}

	}


}


