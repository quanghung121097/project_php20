<?php 
require_once 'connection.php';


class home_models{
		function getcategory_parent(){//lấy danh mục cha
			$connection=new connection();
			$query="SELECT * FROM categories WHERE delete_at is NULL AND parent_id is NULL AND approved=1 AND status= 1";
			$result=$connection->conn->query($query);
			$categories=array();
			while ($row=$result->fetch_assoc()) {
				$categories[]=$row;
			}

			return $categories;
		}
		function get3postbyview(){//lấy 3 bài viết nhiều lượt xem nhất
			$connection=new connection();

			$query_="SELECT p.created_at,p.thumbnail,p.slug,p.description,p.view_count,p.title,u.name,u.avatar FROM posts p JOIN users u on p.user_id = u.id WHERE p.delete_at is NULL AND p.status is NULL AND p.approved=1 and u.status=1 ORDER BY view_count DESC LIMIT 3";
			$result=$connection->conn->query($query_);
			$posts_views_3=array();
			while ($row=$result->fetch_assoc()) {
				$posts_views_3[]=$row;
			}
			return $posts_views_3;
		}
		function get5postbyview(){//lấy 5 bài viết nhiều lượt xem nhất
			$connection=new connection();

			$query_="SELECT p.created_at,p.thumbnail,p.slug,p.description,p.view_count,p.title,u.name,u.avatar FROM posts p JOIN users u on p.user_id = u.id WHERE p.delete_at is NULL AND p.status is NULL AND p.approved=1 and u.status=1 ORDER BY view_count DESC LIMIT 5";
			$result=$connection->conn->query($query_);
			$posts_views_5=array();
			while ($row=$result->fetch_assoc()) {
				$posts_views_5[]=$row;
			}
			return $posts_views_5;
		}
		function getpostbysearch(){//lấy các bài viết nhiều lượt tìm kiếm nhất
			$connection=new connection();

			$query_="SELECT * FROM posts p JOIN users u on p.user_id = u.id WHERE p.delete_at is NULL AND p.status is NULL AND p.approved=1 and u.status=1 ORDER BY search_count DESC LIMIT 3" ;

			$result=$connection->conn->query($query_);
			$posts_by_search=array();
			while ($row=$result->fetch_assoc()) {
				$posts_by_search[]=$row;
			}
			return $posts_by_search;
		}
		function getpostbycreated_at($vitri=-1,$limit=-1){//lấy các bài viết mới nhất
			$connection=new connection();
			$query_="SELECT p.description,p.thumbnail,p.title,p.id,p.slug,p.view_count,p.created_at,c.name FROM posts p JOIN categories c on p.category_id = c.id WHERE p.status is NULL AND p.delete_at is NULL AND p.approved=1 AND c.approved=1 AND c.status=1 ORDER BY p.created_at DESC";
			if ($vitri>-1&&$limit>1) {
				$query_.=" limit $vitri,$limit";
			}
			$result=$connection->conn->query($query_);
			$posts_created_at=array();
			while ($row=$result->fetch_assoc()) {
				$posts_created_at[]=$row;
			}
			return $posts_created_at;
		}
		function getpostascbycreated_at(){//lấy 3 bài viết cũ nhất
			$connection=new connection();
			$query_="SELECT p.description,p.thumbnail,p.title,p.id,p.slug,p.view_count,p.created_at,c.name FROM posts p JOIN categories c on p.category_id = c.id WHERE p.status is NULL AND p.delete_at is NULL AND p.approved=1 AND c.approved=1 AND c.status=1 and c.delete_at is null ORDER BY p.created_at asc limit 3";
			$result=$connection->conn->query($query_);
			$posts_created_at_asc=array();
			while ($row=$result->fetch_assoc()) {
				$posts_created_at_asc[]=$row;
			}
			return $posts_created_at_asc;
		}
		function listpostsbycategory($id,$vitri=-1,$limit=-1){
			$connection=new connection();
			$query="SELECT *FROM posts where status is NULL AND approved=1 and delete_at is NULL AND ( category_id in (SELECT id FROM categories WHERE parent_id=".$id." AND approved=1 AND status=1) or category_id=".$id." ) ORDER BY created_at DESC ";
			if ($vitri>-1&&$limit>1) {
				$query.=" limit $vitri,$limit";
			}
			$result=$connection->conn->query($query);
			$listpostsbycategory=array();
			while ($row=$result->fetch_assoc()) {
				$listpostsbycategory[]=$row;
			}
			return $listpostsbycategory;
		}
		function getcategory_in_listposts($id){
			$connection=new connection();
			$query="SELECT name,thumbnail from categories where status=1 AND approved=1 AND delete_at is NULL and id=".$id;
			$result=$connection->conn->query($query);
			$category_in_listposts=$result->fetch_assoc();
			return $category_in_listposts;
		}
		function getpost($slug){
			$connection=new connection();
			$query="SELECT p.content,u.email,p.description,p.thumbnail,p.title,p.id,p.slug,p.view_count,p.created_at,u.name,u.avatar,u.quote from posts p JOIN users u on p.user_id = u.id where p.status is NULL AND p.approved=1 AND p.delete_at is NULL and u.status=1 and p.slug='".$slug."'";
			$query_="UPDATE posts SET view_count = view_count + 1 WHERE slug ='".$slug."'";
			if (isset($_SESSION['search'])) {
				$query_1="UPDATE posts SET search_count = search_count + 1 WHERE slug ='".$slug."'";
				$result1=$connection->conn->query($query_1);
			}
			
			unset($_SESSION['search']);
			$result=$connection->conn->query($query);
			$result_=$connection->conn->query($query_);
			$getpost=$result->fetch_assoc();
			return $getpost;
		}
		function search($key){
			$connection=new connection();
			$query="SELECT p.description,p.thumbnail,p.title,p.id,p.slug,p.view_count,p.created_at,c.name FROM posts p JOIN categories c on p.category_id = c.id where p.status is NULL AND p.approved=1 AND p.delete_at is NULL and p.title like '%".$key."%' AND c.approved=1 AND c.status=1 and c.delete_at is null ORDER BY p.created_at DESC" ;

			$result=$connection->conn->query($query);
			$searchposts=array();
			while ($row=$result->fetch_assoc()) {
				$searchposts[]=$row;
			}
			return $searchposts;
		}

		function addcomment($id_user,$slug_post,$content){
			$connection=new connection();

			$query="INSERT INTO comments (id_user,slug_post,content)
			VALUES (".$id_user.",'".$slug_post."','".$content."')";
			$status=$connection->conn->query($query);
			return $status;

		}
		function getcommentpost($slug){
			$connection=new connection();
			$query="SELECT c.id_user,c.content,c.created_at,u.name,u.avatar from comments c JOIN users u on c.id_user = u.id where c.slug_post='".$slug."' AND c.status=1 AND u.status=1";
			$result=$connection->conn->query($query);
			$comments=array();
			while ($row=$result->fetch_assoc()) {
				$comments[]=$row;
			}
			return $comments;
		}

		
		


		
	}



	?>