<?php 
//set views
$db = new Db();
$util = new Util();
if(isset($_GET['id'])){
	$oldview = $db->findDataById("article",$_GET['id'],"views");
	$db->updateCellById("article",$_GET['id'],"views",$oldview+1);
	$data = $db->findRowById("article",$_GET['id']);
}
?>


<div class="container ptb-80">
	<div class="row">
		<div class="col-12">
			<div class="article-page">
				<h1 class="article-page-title"><?php echo $data['title'] ?></h1>
				<div class="article-p-time"><?php echo $data['views']." views | ".$util->getTimeDiff($data['createAt']);?></div>
				<br>
				<br>
				<div>
					<img class="article-image" style="height: 500px" src="<?php echo $data['image']; ?>">
				</div>
				<br>
				<div>
					<?php echo $data['content']?>
					<br>
					<p><b><i>Written by <?php echo $db->findDataById("user",$data['user_id'],"name"); ?></i></b></p>
				</div>
				<br>
				<hr>
				<?php if ($_SESSION['user']) : ?>
					<div class="row">
						<form action="" method="POST">
	                        <div class="form-group">
	                        	<div class="row">
		                        	<div class="col-10">
		                        		<input placeholder="Your Commnet here..." id="name" name="name" type="text">
		                        	</div> 
	 
		                        	<div class="col-2">
		                        		 <input style="margin-left: 10px;" type="submit" value="Commnet" name="submit" class="btn ">
		                        	</div>                     		
	                        	</div>


	                        </div>
						</form>

					</div>
				<?php else:?>
					<div class="row" style="text-align: center;">
						<a href="?page=login" style="font-size:18px">If you want to comment,click here to please log in</a>
					</div>
				<?php endif ?>
				<div class="row">
					<p>all commesnts with paging limit 20</p>
				</div>

			</div>
		</div>
	</div>
</div>