<?php 
$db = new Db();

if ($_SESSION['user']) : ?>
<div class="container ptb-80">
	<div class="row">
		<div class="col-12">
			<?php
				$sqlq = "SELECT * FROM article WHERE user_id = {$_SESSION['user']['id']} ORDER BY createAt DESC";
				// echo $sqlq;
				$data = $db->queryExecute($sqlq);
				if($data->num_rows > 0){
					while($row = $data->fetch_assoc()){
						?>
						<div class="row" style="padding:10px ; box-shadow: 0px 0px 5px #aaaaaa; border-radius: 4px;">
							<div class="col-4">
								<img class="w-100" style=" object-fit: cover; height: 12rem; border-radius: 4px;" src="<?php echo$row['image']?>">
							</div>
							<div class="col-6">
								<div class="row" style="padding: 0px 10px 10px 10px;">
									<h2><?php echo $row['title'] ?></h2>
									<p style="color: gray; margin-top: -20px;">Cereate at <?php echo $row['createAt'] ?></p>
									<p style="color: gray; margin-top: -15px;"><?php echo $row['views'] ?> views</p>
									<a href="?page=read-article&id=<?php echo $row['id'] ?>"><i>View on site</i></a>
								</div>
							</div>
							<div class="col-2">
								<form method="post" action="http/delete-or-edit-article.php">
									<div class="form-group">
										<div class="row">
											<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
											<input class="btn" name="delete" type="submit" value="Delete" style="background-color:red;"></input>
											<input class="btn" name="update" type="submit" value="Edit" style="background-color:green;"></input>
										</div>
									</div>
								</form>
							</div>
						</div>
						<br>
						<!-- <hr> -->
						<br>

						<?php
					}
				}else{
					?>
					<div class="row">
						<a href="?page=new-article">You have no article,click here to create newone</a>
					</div>
					<?php
				}

			 ?>
		</div>
	</div>
</div>
<?php endif ?>