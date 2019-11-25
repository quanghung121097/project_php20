<?php require_once 'header.php'; ?>
<h3 align="center">----------------------</h3>
<h3 align="center">Thông tin cá nhân</h3>
<hr>
<center>
	<div style="width: 40%;">
		<form action="index.php?mod=blogger&act=update_user_process" method="POST" role="form" enctype="multipart/form-data">
			<input type="hidden" value="<?=$user['id']?>" name="id" >
			<div class="form-group">
				<label for="">Name</label>
				<input type="text" class="form-control" id="" placeholder="" name="name" value="<?=$user['name']?>">
			</div>
			<div class="form-group">

				<label for="">avatar</label>
				<img src="public/user/images/demo/<?=$user['avatar']?>" width="100px" height="100px">
				<input type="file" class="form-control" id="avatar" name="avatar">
			</div>
			<div class="form-group">
				<label for="">Số điện thoại</label>
				<input type="number" class="form-control" id="" placeholder="" name="sdt" value="<?=$user['sdt']?>">
			</div>
			<div class="form-group">
				<label for="">Quote</label>
				<input type="text" class="form-control" id="" placeholder="" name="quote" value="<?=$user['quote']?>">
			</div>

			<button type="submit" class="btn btn-primary" >UPDATE</button>
		</form>
	</div>
</center>
<?php require_once 'footer.php'; ?>