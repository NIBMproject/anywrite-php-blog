<?php 
//set views
$db = new Db();
$util = new Util();
if(isset($_GET['id'])){
	$data = $db->findRowById("article",$_GET['id']);
}
?>


<div class="container ptb-80" onload="loadComment(<?php echo $data['id']; ?>)">
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
						
	                        <div class="form-group">
	                        	<div class="row">
		                        	<div class="col-10">
		                        		<input placeholder="Your Commnet here..." id="comment"  type="text">
		                        	</div> 
	 
		                        	<div class="col-2">
		                        		 <input style="margin-left: 10px;" type="submit" onclick="addComment(<?php echo $data['id']; ?>)" value="Commnet" id="comment-btn" class="btn ">
		                        	</div>                     		
	                        	</div>


	                        </div>
						

					</div>
				<?php else:?>
					<div class="row" style="text-align: center;">
						<a href="?page=login" style="font-size:18px">If you want to comment,click here to please log in</a>
					</div>
				<?php endif ?>
				<div class="row" id="comment-box">
					<!-- <p>all commesnts with paging limit 20</p> -->
					<div class="row comment-card">
						<div class="row">
							<img src="">
							<div>
								<div class="row">
									name
								</div>
								<div class="row">
									time
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							txt
						</div>
					</div>
				</div>
				<hr>
				<div class="row" style="text-align: center;">
					<a   onclick="loadMorec()" style="text-align:center; cursor: pointer;">Load more..</a>
				</div>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var txt = document.querySelector("#comment");
	var btn = document.querySelector("#comment-btn");
	var cbox = document.querySelector("#comment-box");
	var loadMore = document.querySelector("#loadMore");
	var page = 0;

	


	function loadComment(cmts){
		console.log(cmts)
		var allc = ""
		for(var key of Object.keys(cmts)){
			if(key <= page){
				console.log(key);
				var p = cmts[key]
				for(var c of Object.keys(p)){
					console.log(c);

					str ="<div class='row comment-card'>"+
							"<div class='row'>"+
							"<img src='"+p[c].userPic+"'>"+							
							"<div class='col-10'>"+
								"<div class='row'><p class = 'cuser'>"+
									p[c].userName +
								"</p></div>"+
								"<div class='row'><p class = 'ctime'>"+
									p[c].time+
								"</p></div>"+
							"</div>"+
						"</div>"+
					
						"<div class='row'><p class = 'ctxt'>"+
							p[c].txt+
						"</p></div>"+
						"</div>"
					allc = allc + str;
				}
			}
		}
		cbox.innerHTML = allc;	
	}

	function loadMorec(){
		page = page + 1;

		var xhttp = new XMLHttpRequest();
	    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
		    let data = JSON.parse(this.responseText)
		            // console.log(data);
		    loadComment(data);
            
		       }
		    };
	    xhttp.open("GET", "http/add-comment.php?aid="+"<?php echo $data['id'] ?>", true);
	    xhttp.send(); 

	}

	window.onload = function() {
			var xhttp = new XMLHttpRequest();
		    xhttp.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		            let data = JSON.parse(this.responseText)
		            // console.log(data);
		            loadComment(data);



		            
		       }
		    };
		    xhttp.open("GET", "http/add-comment.php?aid="+"<?php echo $data['id'] ?>", true);
		    xhttp.send(); 
	};

	function addComment(aid){
			var xhttp = new XMLHttpRequest();
		    xhttp.onreadystatechange = function() {
		        if (this.readyState == 4 && this.status == 200) {
		            let data = JSON.parse(this.responseText)
		             loadComment(data);
		            
		       }
		    };
		    xhttp.open("GET", "http/add-comment.php?txt="+txt.value+"&aid="+aid, true);
		    xhttp.send(); 

		    txt.value = "";
	}

</script>


