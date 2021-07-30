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
            $r =  $db->queryExecute("select * from article;");
            ?>
            <?php
            if ($r->num_rows > 0) {
                while ($row = $r->fetch_assoc()) { ?>
                    <div class="row">
                        <h2> <?php echo $row['title']; ?></h2>
                        <img src=" <?php echo $row['image']; ?>" style="height:200px; width:100%;"/>
                        <p> <?php echo $row['content']; ?></p>
                        <a href="#" class=btn>Read More</a>
                    </div>
            <?php }
            }; ?>
        </div>
        <div class="col-4">
            <h2>Tags</h2>
        </div>
    </div>
</div>