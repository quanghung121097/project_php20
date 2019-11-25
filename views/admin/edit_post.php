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
					<form action="index.php?mod=blogger&act=update" method="POST" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="">Title</label>
							<input type="text" class="form-control" id="" placeholder="" name="title" value="<?=$post['title']?>">
							<input type="hidden" class="form-control" id="" placeholder="" name="id" value="<?=$post['id']?>">

						</div>

						<div class="form-group">
							<label for="">Description</label>
							<input type="text" class="form-control" id="" placeholder="" name="description" value="<?=$post['description']?>">
						</div>
						<div class="form-group">
							<label for="">Thumbnail</label>
							<img src="public/user/images/demo/<?=$post['thumbnail']?>" width="100px" height="100px">
							<input type="file" class="form-control" id="" placeholder="" name="thumbnail">
						</div>
						<div class="form-group">
							<label for="">Content</label>
							<textarea class="form-control" id="" placeholder="" name="content1"></textarea>
						</div>
						<div class="form-group">
							<label for="">Slug</label>
							<input type="text" class="form-control" id="" placeholder="" name="slug" value="<?=$post['slug']?>">
						</div>

						<div class="form-group">
							<label for="">Category</label>
							<select class="form-control" id="" placeholder="" name="category_id">
								<?php  foreach ($categories as $cate) { ?>
									<option  <?php if($cate['id']==$post['category_id']) echo 'selected'; ?>  value="<?=$cate['id']?>" ><?=$cate['name']?></option>
								<?php } ?>
							</select>
						</div>
						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</section>
		</div>

	</div>
</div>
<?php require_once 'footer.php'; ?>