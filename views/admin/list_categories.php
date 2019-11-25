<?php require_once 'header.php'; ?>
<div class="content container">
	<h2 class="page-title">Tables - <span class="fw-semi-bold">Static</span></h2>
	<div class="row">
		<div class="col-md-12">
			<section class="widget">
				<header>
					<h4>
						Table <span class="fw-semi-bold">Styles</span>
					</h4>
					<div class="widget-controls">
						<a href="#"><i class="glyphicon glyphicon-cog"></i></a>
						<a data-widgster="close" href="#"><i class="glyphicon glyphicon-remove"></i></a>
					</div>
				</header>
				<div class="body">
					<table class="table">
						<thead>
							<th>ID</th>
							<th>Name</th>
							

							<th>Danh mục chứa</th>
							<th>Status</th>
							<th>Action</th>
						</thead>
						<?php  foreach ($categories as $item) { $i=$item['id'] ?>
						<tr>
							<td><?=$item['id']?></td>
							<td><?=$item['name']?></td>
							
							<td><?php
							if ($item['parent_id']==NULL) {
								echo"Danh mục cha";
							} else {
								foreach ($categories as $key) {
									if ($key['id']==$item['parent_id']) {
										echo $key['name'];
									}
								}

								
								
							}
							?></td>
							<td><?php if ($item['approved']==1) {
								echo 'Đã duyệt';
							} else {
								echo 'Chưa duyệt';
							} ?></td>
							<td>
								<?php if ($userlogin['role']==1) {
									if ($item['approved']==1) {?>
										
										<?php if ($item['status']==1) {?>
											<i class="far fa-laugh-beam btn-lg" style="color: #FE642E;"></i>
											<a href="index.php?mod=blogger&&act=hiddencategory&id=<?=$item['id']?>" class="btn btn-danger">Ẩn</a>
										<?php } else {?>
											<i class="far fa-sad-cry btn-lg " style="color: #FE642E;"></i>
											<a href="index.php?mod=blogger&&act=displaycategory&id=<?=$item['id']?>" class="btn btn-success">Hiện</a>
										<?php } ?>

									<?php } else {?>
										<a href="index.php?mod=blogger&&act=approvedcategory&id=<?=$item['id']?>" class="btn btn-primary">Phê Duyệt</a>
									<?php }

								}else {?>
									<i class="fas fa-exclamation-triangle btn-warning"></i>
								<?php } ?>
								
							</td>
						</tr>
						<?php ; } ?>
					</table>
					
				</div>
			</section>
		</div>
	</div>
</div>
<?php require_once 'footer.php'; ?>