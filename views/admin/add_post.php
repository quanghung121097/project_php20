<?php require_once 'header.php'; ?>
<div class=" container">
	<h2 class="page-title">Article Demo <small>Out of the box form</small></h2>
	<div class="row">
		<div class="col-lg-8">
			<section class="widget">
				<header>
					<h4><i class="fa fa-file-alt"></i> Article <small>Create new or edit existing article</small></h4>
				</header>
				<div class="body">
					<form action="index.php?mod=blogger&act=add_post_process" method="POST" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="">Title</label>
							<input type="text" class="form-control" id="" placeholder="" name="title">
						</div>

						<div class="form-group">
							<label for="">Category</label>
							<select class="form-control" id="" placeholder="" name="category_id">
								<?php  foreach ($categories as $cate) { ?>
									<option value="<?=$cate['id']?>" ><?=$cate['name']?></option>
								<?php } ?>
							</select>
							<div class="form-group">
								<label for="">Content</label>
								<textarea class="form-control" id="" placeholder="" name="content1"></textarea>
							</div>
							<div class="form-group">
								<label for="">Thumbnail</label>
								<input type="file" class="form-control" id="" placeholder="" name="thumbnail">
							</div> 
							<div class="form-group">
								<label for="">Slug</label>
								<input type="text" class="form-control" id="" placeholder="" name="slug">
							</div>
							<div class="form-group">
								<label for="">Description</label>
								<input type="text" class="form-control" id="" placeholder="" name="description">
							</div>
							<button type="submit" class="btn btn-primary">Add</button>
						</form>
					</div>
				</section>
			</div>

		</div>
	</div>
	<?php require_once 'footer.php'; ?>