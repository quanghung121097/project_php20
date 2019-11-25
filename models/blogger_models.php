<?php require_once 'connection.php';
class blogger_models{
	function login($email,$password){
    	// require_once 'views/login.php';
    	$connection=new connection();
    	$query="SELECT * FROM users WHERE status=1 and email='".$email."' and password='".$password."' ";
    	$status=$connection->conn->query($query);
    	$user_login=$status->fetch_assoc();
    	return $user_login;
    	
    }
    function getuserlogin($id){
        $connection=new connection();
        $query="SELECT * FROM users WHERE id=".$id;
        $status=$connection->conn->query($query);
        $userlogin=$status->fetch_assoc();
        return $userlogin;
    }
    function register($name,$email,$password,$re_password){
    	
    	if ($password==$re_password) {
    		$connection=new connection();
            // $token = generateRandomString();
            $query="INSERT INTO users (name,email,password)
            VALUES ('".$name."','".$email."','".$password."');";
            $status=$connection->conn->query($query);
            if ($status) {
                require_once('mail.php');
                
                ob_start();
                require_once('verification.php');
                $TEN = $name;
                
                $result = send_email($email,$TEN,'Bạn vừa đăng ký tài khoản tại http://quanghung.byethost10.com/ vui lòng xác thực email','final project');
                return $status;
            } 
            


        }


    }
    function getcategory(){
        $connection=new connection();
        $query="SELECT * FROM categories Where delete_at is Null";
        $result=$connection->conn->query($query);
        $categories=array();
        while ($row=$result->fetch_assoc()) {
            $categories[]=$row;
        }
        return $categories;
    }
    function getlistposts($user_id){
        $connection=new connection();
        $query="SELECT * FROM posts WHERE delete_at is NULL and user_id=".$user_id;
        $result=$connection->conn->query($query);
        $posts=array();
        while ($row=$result->fetch_assoc()) {
            $posts[]=$row;
        }

        return $posts;
    }
    function detail_post($id){
            $connection=new connection();
            $query="SELECT * FROM posts WHERE id=".$id;
            $post=$connection->conn->query($query)->fetch_assoc();

            return $post;
        }
    function add_post($data,$user_id){
        $connection=new connection();
        $target_dir = "public/user/images/demo/";  // thư mục chứa file upload

        $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]); // link sẽ upload file lên

        if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) { 
            $file_name=basename($_FILES["thumbnail"]["name"]); 
            $query="INSERT INTO posts (title,thumbnail,slug,description,content,category_id,user_id) VALUES ('".$data['title']."','".$file_name."','".$data['slug']."','".$data['description']."','".$data['content1']."','".$data['category_id']."','".$user_id."')";
            
            $status=$connection->conn->query($query);
            return $status;
            
        } else { // Upload file có lỗi 
            echo "Sorry, there was an error uploading your file.";
        }




    }
    function update_process($data){
        $connection=new connection();
            $target_dir = "public/user/images/demo/";  // thư mục chứa file upload

            $target_file = $target_dir . basename($_FILES["thumbnail"]["name"]); // link sẽ upload file lên

            if (move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $target_file)) { 
                $file_name=basename($_FILES["thumbnail"]["name"]); 
                $query="UPDATE posts SET title='".$data['title']."',slug='".$data['slug']."',thumbnail='".$file_name."',category_id='".$data['category_id']."',description='".$data['description']."',content='".$data['content1']."' WHERE id=".$data['id'];
                
                
                
            } else { // Upload file có lỗi 
                $query="UPDATE posts SET title='".$data['title']."',slug='".$data['slug']."',category_id='".$data['category_id']."',description='".$data['description']."',content='".$data['content1']."' WHERE id=".$data['id'];
            }
            $status=$connection->conn->query($query);
            if ($status) {
                return $status;
            } else {
                echo 'error';
            }
        }
        function update($slug){
            $connection=new connection();
            $query_edit="SELECT * FROM posts WHERE slug='".$slug."'";
            $post=$connection->conn->query($query_edit)->fetch_assoc();

            return $post;
        }
        function delete($id){
            $connection =new connection();
            // date_default_timezone_get("Asia/Ho_Chi_Minh");
            // $date=date("Y/m/d h:i:s");

            
            
            $query_="UPDATE posts SET delete_at=CURRENT_TIMESTAMP WHERE id=".$id;

            $status_=$connection->conn->query($query_);
            return $status_;
            


        }
        function addcategory(){
            $connection=new connection();
            $query="SELECT * FROM categories WHERE parent_id is NULL";
            $result=$connection->conn->query($query);
            $categories=array();
            while ($row=$result->fetch_assoc()) {
                $categories[]=$row;
            }
            return $categories;
        }
        function store($data,$id){
            $connection=new connection();
            $query="INSERT INTO categories (name,slug,description,parent_id,user_id) VALUES ('".$data['name']."','".$data['slug']."','".$data['description']."',".$data['parent_id'].",'".$id."')";
            $status=$connection->conn->query($query);
            return $status;
        }
        function approvedcategory($id){
            $connection=new connection();
            $query="UPDATE categories SET approved=1 WHERE id=".$id;
            $status=$connection->conn->query($query);
            return $status;
        }
        function displaycategory($id){
            $connection=new connection();
            $query="UPDATE categories SET status=1 WHERE id=".$id;
            $query1="UPDATE posts SET status=NULL WHERE category_id=".$id;

            $status=$connection->conn->query($query);
            $status1=$connection->conn->query($query1);
            if($status==true&&$status1==true){
                return true;
            }
            
        }
        function hiddencategory($id){
            $connection=new connection();
            $query="UPDATE categories SET status=0 WHERE id=".$id;
            $query1="UPDATE categories SET status=0 WHERE parent_id=".$id;
            $query2="UPDATE posts SET status=0 WHERE category_id IN (SELECT id FROM categories WHERE parent_id='".$id."') OR category_id=".$id;
            $status=$connection->conn->query($query);
            $status1=$connection->conn->query($query1);
            $status2=$connection->conn->query($query2);

            if($status==true&&$status1==true&&$status2==true){
                return true;
            }
        }
        function getlistall(){//lấy các bài viết mới nhất
            $connection=new connection();
            $query_="SELECT * FROM posts WHERE status is NULL AND delete_at is NULL AND approved=1 ORDER BY created_at DESC";
            $result=$connection->conn->query($query_);
            $posts_created_at=array();
            while ($row=$result->fetch_assoc()) {
                $posts_created_at[]=$row;
            }
            return $posts_created_at;
        }
        function hiddenpost($id){
            $connection=new connection();
            $query_="UPDATE posts SET status=0 WHERE id=".$id;

            $status_=$connection->conn->query($query_);
            return $status_;
        }
        function list_approved_post(){
            $connection=new connection();
            $query_="SELECT * FROM posts WHERE status is NULL AND delete_at is NULL AND approved=0 ORDER BY created_at DESC";
            $result=$connection->conn->query($query_);
            $list_approved_post=array();
            while ($row=$result->fetch_assoc()) {
                $list_approved_post[]=$row;
            }
            return $list_approved_post;
        }
        function approved_post($id){
            $connection=new connection();
            $query="UPDATE posts SET approved=1 WHERE id=".$id;

            $status=$connection->conn->query($query);
            return $status;
        }
        function list_status_post(){
            $connection=new connection();
            $query_="SELECT * FROM posts WHERE status=0 AND delete_at is NULL AND approved=1 ORDER BY created_at DESC";
            $result=$connection->conn->query($query_);
            $list_status_post=array();
            while ($row=$result->fetch_assoc()) {
                $list_status_post[]=$row;
            }
            return $list_status_post;
        }
        function status_post($id){
            $connection=new connection();
            $query="UPDATE posts SET status=NULL WHERE id=".$id;

            $status=$connection->conn->query($query);
            return $status;
        }
        function list_users(){
            $connection=new connection();
            $query_="SELECT * FROM users";
            $result=$connection->conn->query($query_);
            $users=array();
            while ($row=$result->fetch_assoc()) {
                $users[]=$row;
            }
            return $users;

        }
        function unlock_user($id){
            $connection=new connection();
            $query="UPDATE users SET status=1 WHERE id=".$id;
            $query_="UPDATE posts SET status=NULL WHERE user_id=".$id;
            $query_cate="UPDATE categories SET status=1 WHERE user_id=".$id;
            $status=$connection->conn->query($query);
            $status_=$connection->conn->query($query_);
            $status_cate=$connection->conn->query($query_cate);
            if ($status==true&$status_==true&$status_cate==true) {
                return true;
            }
        }
        function lock_user($id){
            $connection=new connection();
            $query="UPDATE users SET status=0 WHERE id=".$id;
            $query_="UPDATE posts SET status=0 WHERE user_id=".$id;
            $query_cate="UPDATE categories SET status=0 WHERE user_id=".$id;
            $status=$connection->conn->query($query);
            $status_=$connection->conn->query($query_);
            $status_cate=$connection->conn->query($query_cate);
            if ($status==true&$status_==true&$status_cate==true) {
                return true;
            }
        }
        function update_user($user_id){
            $connection=new connection();
            $query_edit="SELECT * FROM users WHERE id=".$user_id;
            $user=$connection->conn->query($query_edit)->fetch_assoc();

            return $user;
        }
        function update_user_process($data){
            $connection=new connection();
            $target_dir = "public/user/images/demo/"; 
             // print_r($data);
             // die

            $target_file = $target_dir . basename($_FILES["avatar"]["name"]); 

            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) { 
                $file_name=basename($_FILES["avatar"]["name"]); 
                $query="UPDATE users SET name='".$data['name']."',sdt='".$data['sdt']."',avatar='".$file_name."',quote='".$data['quote']."' WHERE id=".$data['id'];
                echo 'aaaa';
                
                
            } else { // Upload file có lỗi 
                $query="UPDATE users SET name='".$data['name']."',sdt='".$data['sdt']."',quote='".$data['quote']."' WHERE id=".$data['id'];
            }
            $status=$connection->conn->query($query);
            if ($status) {
                return $status;
            } else {
                echo 'error';
            }
        }
        function reset_password($id,$password,$old_password,$new_password,$confirm_new_password){
            $connection=new connection();


            if ($old_password==$password&&$new_password==$confirm_new_password) {
                $query="UPDATE users SET password='".$new_password."' WHERE id=".$id;
                $status=$connection->conn->query($query);
                return $status;
            }
        }
        function getcommentbypost($slug){
            $connection=new connection();
            $query="SELECT c.status,c.id_user,c.id,c.content,c.created_at,u.name,u.avatar from comments c JOIN users u on c.id_user = u.id where c.slug_post='".$slug."' AND u.status=1";
            $result=$connection->conn->query($query);
            $comments=array();
            while ($row=$result->fetch_assoc()) {
                $comments[]=$row;
            }
            return $comments;

        }
        function approvedcomment($id){
            $connection=new connection();
            $query_="UPDATE comments SET status=1 WHERE id=".$id;

            $status_=$connection->conn->query($query_);
            return $status_;
        }
        function unapprovedcomment($id){
            $connection=new connection();
            $query_="UPDATE comments SET status=0 WHERE id=".$id;

            $status_=$connection->conn->query($query_);
            return $status_;
        }




}


?>