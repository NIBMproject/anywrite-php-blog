<div class="container ptb-80">
    <!-- <div class="row">
        <div class="col-12">
            <a href="?page=new-article">New article</a>
        </div>
    </div> -->
    <div class="row">
        <div class="col-8">

            <?php
            $db = new Db();
            $pg = new Pagination("article",5);
            $util = new Util();

            if(isset($_GET['p']) == false && isset($_GET['c']) == false && isset($_GET['q']) == false){

                $_SESSION['cid'] = 0;                
                $r = $pg->getPageContent(1,0,"");
            }else{
                
                $_SESSION['cid'] = $_GET['c'];                
                $r = $pg->getPageContent($_GET['p'],$_SESSION['cid'],$_GET['q']);
                
            }


            ?>



            <?php
            if ($r->num_rows > 0) {
                while ($row = $r->fetch_assoc()) { ?>
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

            <br>
            <br>
            <br>
            <br>
            <div class="row">
                <div class="page-links">
                <?php
                    $pg->getLinks();
                 ?>
                </div>
            </div>
        </div>
        <div class="col-4">
            

            <div class="cate-list">
                <ul>
                    <h2>Categories</h2>
                    <li><a href="?page=home&p=1&c=0&q=">All(<?php echo $db->getDataCountTable("article"); ?>)</a></li>
                    <?php

                        $cate = $db->queryExecute("SELECT * FROM categories");
                        if($cate->num_rows > 0){
                            while($row = $cate->fetch_assoc()){ ?>
                                <li><a href="?page=home&p=1&c=<?php echo $row['id']?>&q="><?php echo $row['name'] ?>
                                (<?php echo $db->getDataCount("article","category_id",$row['id']); ?>)
                                </a></li>
                            <?php }
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>