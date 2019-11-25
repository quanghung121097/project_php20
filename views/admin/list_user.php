<?php require_once 'header.php'; ?>
<h3 class="text-center">--- USERS---</h3>
        <a href="#" class="btn btn-primary"></a>
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Avatar</th>
                <th>Email</th>
                <th>Trạng thái</th>
                <th>Action</th>
            </thead>
            <?php foreach ($users as $item) { ?>
                <tr>
                    <td><?=$item['id']?></td>
                    <td><?=$item['name']?></td>
                    <td><img src="public/user/images/demo/<?=$item['avatar']?>" width="100px" height="100px"></td>
                    <td><?=$item['email']?></td>
                    <td><?php if ($item['status']==1) {
                    	echo 'Hoạt động';
                        if ($item['role']==1) {
                            echo '/Admin';
                        }else {
                            echo '/Blooger';
                        }
                    } else {
                    	echo 'Đã khóa';
                    } ?></td>
                    <td>
                    	<?php if ($item['status']==1) {?>
                    		<a href="index.php?mod=blogger&act=lock_user&id=<?=$item['id']?>" class="btn btn-danger">Khóa</a>
                    	<?php } else { ?>
                    		<a href="index.php?mod=blogger&act=unlock_user&id=<?=$item['id']?>" class="btn btn-primary">Bỏ Khóa</a>
                    	<?php } ?>
                        <!-- 
                        
                        <a href="#>" class="btn btn-danger">Delete</a> -->
                    </td>
                </tr>
                
            <?php } ?>
            
        </table>
<?php require_once 'footer.php'; ?>