
<div class="container ptb-80">
   <div class="row">
       <div class="col-8">
         <?php
          $db = new Db();
          $util = new Util();
          $top = $db->queryExecute("SELECT * FROM article ORDER BY views DESC LIMIT 0,10");
          // print_r($top);
          if ($top->num_rows > 0) {
                while ($row = $top->fetch_assoc()) { ?>
                    <div class="row article-card ">
                        <div class="row">
                            <div class="col-2">
                                <img class="article-user-image" src="<?php echo  $db->findDataById("user",$row['user_id'],"img_path");?>">
                            </div>
                            <div class="col-10 article-user-data">
                                <div class="row article-u-name"><?php echo $db->findDataById("user",$row['user_id'],"name"); ?></div>
                                <div class="row article-p-time"><?php echo $util->getTimeDiff($row['createAt']);?></div>
                            </div>
                        </div>
                        <h2> <?php echo $row['title']; ?></h2>                        
                        <img class="article-image" src=" <?php echo $row['image']; ?>" /> 
                        <div class="row">
                            <p><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $db->findDataById("article",$row['id'],"views"); ?> | <i class="fa fa-comment" aria-hidden="true"></i> 0
                            <a href="?page=read-article&id=<?php echo $row['id']; ?>" class="btn article-btn">Read</a></p>
                        </div>                      
                        
                    </div>
                    <hr>
            <?php }
            }; ?>
       </div>
       <div class="col-4">
           ads
       </div>
   </div>
</div>