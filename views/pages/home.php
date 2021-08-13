<div class="container ptb-80">
    <!-- <div class="row">
        <div class="col-12">
            <a href="?page=new-article">New article</a>
        </div>
    </div> -->
    <div class="row">
        <div class="col-8">
            <div class="row">
                <input type="text" name="">
            </div>
            <?php
            $db = new Db();
            $pg = new Pagination("article",5);

            if(isset($_GET['p']) == false ){
                $r = $pg->getPageContent(1);
            }else{
               
                $r = $pg->getPageContent($_GET['p']);
                
            }

            // $r = $pg->getPageContent();
            // $r =  $db->queryExecute("select * from article order by createAt desc;");

            ?>
            <?php
            if ($r->num_rows > 0) {
                while ($row = $r->fetch_assoc()) { ?>
                    <div class="row article-card">
                        <h2> <?php echo $row['title']; ?></h2>
                        <p class="article-user-data">By <?php echo $db->findDataById("user",$row['user_id'],"name"); ?> at <?php echo $row['createAt']?></p>
                        <img class="article-image" src=" <?php echo $row['image']; ?>" />
                        
                        <a href="#" class="btn article-btn">Read</a>
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
            <h2>Tags</h2>
        </div>
    </div>
</div>