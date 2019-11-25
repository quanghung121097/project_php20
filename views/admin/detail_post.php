<?php require_once 'header.php'; ?>
<div class="container">
	<h3 class="text-center">--- POSTS ---</h3>
	<table class="table">

		<tr>
			<td style="color: #DF0101">ID :</td>
			<td><?=$post['id']?></td>
		</tr>
		<tr>
			<td style="color: #DF0101">Tile :</td>
			<td><?=$post['title']?></td>
		</tr>
		<tr>
			<td style="color: #DF0101">thumbnail :</td>
			<td>
				<img src="public/user/images/demo/<?=$post['thumbnail']?>" widtd="100px" height="100px">
			</td>
		</tr>
		<tr>
			<td style="color: #DF0101">Description :</td>
			<td><?=$post['description']?></td>
		</tr>
		<tr>
			<td style="color: #DF0101">Slug :</td>
			<td><?=$post['slug']?></td>
		</tr>
		<tr>
			<td style="color: #DF0101">Content :</td>
			<td><?=$post['content']?></td>
		</tr>
		<tr>
			<td style="color: #DF0101">view_count :</td>
			<td><?=$post['view_count']?></td>
		</tr>
		<tr>
			<td style="color: #DF0101">Category_id :</td>
			<td><?=$post['category_id']?></td>
		</tr>




	</table>
</div>
<?php require_once 'footer.php'; ?>