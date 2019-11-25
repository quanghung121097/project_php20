<?php 
$mod=isset($_GET['mod'])?$_GET['mod']:'user';
$act=isset($_GET['act'])?$_GET['act']:'home';
switch ($mod) {

	case 'user':
	require_once 'controllers/home_controllers.php';
	$user_obj=new home_controllers();
	switch ($act) {

		case 'home':
		$user_obj->home();

		break;
		case 'listposts':
		$user_obj->listposts();

		break;
		case 'post':
		$user_obj->post();

		break;
		case 'search':
		$user_obj->search();

		break;
		case 'addcomment':
		$user_obj->addcomment();

		break;
		default:
		echo 'act lỗi';
		break;
	}
	break;
	case 'blogger':
	require_once 'controllers/blogger_controller.php';
	$blogger_obj=new blogger_controller();
	switch ($act) {

		case 'login':
		if (isset($_SESSION['user'])) {
			header('location: index.php?mod=blogger&act=home_admin');
		} else {
			require_once 'views/admin/login.php';
		}
		
		break;
		case 'login_process':
		$blogger_obj->login();
		break;
		case 'logout':
		{	
			session_destroy();
			require_once 'controllers/home_controllers.php';
			$user_obj=new home_controllers();
			
			$user_obj->home();
		}
		break;
		case 'register':
		require_once 'views/admin/register.php';
		break;
		case 'register_process':
		$blogger_obj->register_process();
		break;
		case 'verify':
		$blogger_obj->verify_process();
		break;
		case 'home_admin':
		if (isset($_SESSION['user'])) {
			$blogger_obj->home_admin();
		} else {
			require_once 'views/admin/login.php';
		}
		break;
		case 'list_post':
		$blogger_obj->list_post_blogger();
		break;
		case 'detail_post':
		$blogger_obj->detail_post();
		break;
		case 'add_post':
		$blogger_obj->add_post_blogger();
		break;
		case 'add_post_process':
		$blogger_obj->add_post_blogger_process();
		break;
		case 'edit_post':
		$blogger_obj->edit_post();
		break;
		case 'update':
		$blogger_obj->edit_post_process();
		break;
		case 'delete':
		$blogger_obj->delete();
		break;
		case 'deleteadmin':
		$blogger_obj->deleteadmin();
		break;
		case 'update_info':
		$blogger_obj->update_info();
		break;
		case 'update_user_process':
		$blogger_obj->update_user_process();
		break;
		case 'reset_password':
		$blogger_obj->reset_password();
		break;
		case 'update_password':
		$blogger_obj->update_password();
		break;
		case 'addcategory':
		$blogger_obj->addcategory();
		break;
		case 'addcategoryprocess':
		$blogger_obj->addcategoryprocess();
		break;
		case 'hiddenpost':
		$blogger_obj->hiddenpost();
		break;
		case 'list_approved_post':
		$blogger_obj->list_approved_post();
		break;
		case 'approved_post':
		$blogger_obj->approved_post();
		break;
		case 'list_status_post':
		$blogger_obj->list_status_post();
		break;
		case 'status_post':
		$blogger_obj->status_post();
		break;
		case 'list_user':
		$blogger_obj->list_user();
		break;
		case 'lock_user':
		$blogger_obj->lock_user();
		break;
		case 'unlock_user':
		$blogger_obj->unlock_user();
		break;
		case 'list_categories':
		$blogger_obj->list_categories();
		break;
		case 'approvedcategory':
		$blogger_obj->approvedcategory();
		break;
		case 'displaycategory':
		$blogger_obj->displaycategory();
		break;
		case 'hiddencategory':
		$blogger_obj->hiddencategory();
		break;
		case 'getlistall':
		$blogger_obj->getlistall();
		break;
        case 'list_comment':
		$blogger_obj->list_comment();
		break;
		case 'approvedcomment':
		$blogger_obj->approvedcomment();
		break;
		case 'unapprovedcomment':
		$blogger_obj->unapprovedcomment();
		break;
		default:
		echo 'act lỗi';
		break;
	}
	break;
	
	default:
	echo 'mod lỗi';
	break;
}

?>






