<?php require_once 'header.php';?>
<h3 align="center">----------------------</h3>
<h3 align="center">Reset Password</h3>
<hr>
<center>
	<form action="index.php?mod=blogger&act=update_password" method="POST" role="form" style="width: 30%;">
		<div class="form-group">
			<label for="">Mật khẩu cũ:</label>
			<input type="password" class="form-control" id="" placeholder="" name="old_password" >
		</div>
		<div class="form-group">
			<label for="">Mật khẩu mới:</label>
			<input type="password" class="form-control" id="" placeholder="" name="new_password">
		</div>
		<div class="form-group">
			<label for="">Xác nhận mật khẩu:</label>
			<input type="password" class="form-control" id="" placeholder="" name="confirm_new_password">
		</div>
		<?php 
              if (isset($_SESSION['error_repass'])) {
                echo '<div class="alert alert-danger">'.$_SESSION['error_repass'].'</div>';
             }
             ?>

		<button type="submit" class="btn btn-primary" >RESET</button>
	</form>
</center>

<?php require_once 'footer.php'; ?>