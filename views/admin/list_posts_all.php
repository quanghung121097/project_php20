<?php require_once 'header.php'; ?>
<h3 class="text-center">--- POSTS ---</h3>
		<table class="table">
			<thead>
				<th>ID</th>
				<th>Tile</th>
				<th>Thumbnail</th>
				<th>Description</th>
				<th>Action</th>
			</thead>
			<?php foreach ($all_posts_created_at as $item) {?>
				<tr>
					<td><?=$item['id']?></td>
					<td><?=$item['title']?></td>
					<td>
						<img src="public/user/images/demo/<?=$item['thumbnail']?>" width="100px" height="100px">
					</td>
					<td><?=$item['description']?></td>
					<td>
						<a href="index.php?mod=blogger&act=detail_post&id=<?=$item['id']?>" class="btn btn-primary">Xem chi tiết</a>
						<a href="index.php?mod=blogger&act=hiddenpost&id=<?=$item['id']?>" class="btn btn-success">Ẩn</a>
						<a href="index.php?mod=blogger&act=deleteadmin&id=<?=$item['id']?>" class="btn btn-danger">Xóa</a>
						<a href="index.php?mod=blogger&act=list_comment&slug=<?=$item['slug']?>" class="btn btn-primary">Comments</a>
					</td>
				</tr>
			<?php } ?>


		</table>
<?php require_once 'footer.php'; ?>