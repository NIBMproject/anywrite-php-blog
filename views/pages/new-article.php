<?php 
$db = new Db();
if ($_SESSION['user']) : ?>

    <div class="container ptb-80">
        <?php if (isset($_SESSION['msg'])) {
        ?>
            <div class="row">
                <div class="col-12">
                    <div class="<?php echo $_SESSION['msg'][0] ?>">
                        <ul>
                            <?php
                            foreach ($_SESSION['msg'][1] as $i) {
                                echo "<li>{$i}</li>";
                            }
                            unset($_SESSION['msg']);
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="row">
            <div class="col-12">
                <h1 class="title">New Article</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-12">
                <form action="http/newarticle.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="up-img-btn">
                                        <img src="assets/img/pl.png" class="w-100" alt="" id="upimg">
                                        <div class="upload-btn">
                                            <button class="btn w-100">Select Image</button>
                                            <input type="file" name="cover" id="file" onchange="loadFile(event)" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="row" style="margin-left:10px;margin-top: 10px;">
                                    <div class="row">
                                        <label for="title">Title</label>
                                        <br>
                                        <input id="title" name="title" type="text">
                                    </div>
                                    <div class="row">
                                        <label for="category">Category</label>
                                        <br>
                                        <select id="category" name="category">
                                            <?php $cate = $db->queryExecute("SELECT * FROM categories"); 
                                            if($cate->num_rows > 0){
                                                while($row = $cate->fetch_assoc()){
                                                    
                                                    echo "<option value='{$row['id']}''>{$row['name']}</option>";
                                                    
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <!-- <textarea name="contex" id="editor" colo>

                </textarea> -->
                    <textarea name="contex" id="" style="width: 100%;" cols="30" rows="20"></textarea>

                    <div class="row">
                        <div class="col-2 align-r">

                            <!-- <button class="p-btn align-r m-20-0 w-100" type="submit">Submit</button> -->
                            <div class="form-group w-100">
                                <input type="submit" value="Publish" name="submit" class="btn ">
                            </div>

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        var loadFile = function(event) {
            // console.log(event.target.files[0]);
            var img = document.querySelector("#upimg");
            img.src = URL.createObjectURL(event.target.files[0]);
            img.onload = function() {
                URL.revokeObjectURL(img.src);
            }
        }

        var off = function(x) {
            x.style.display = "none";
        }

        CKEDITOR.replace( 'contex' ,{
            removeButtons: 'Cut,Copy,Paste,Undo,Redo,Anchor,image',
            contentsCss: "body {font-size: 20px;}",

        });
         CKEDITOR.config.height = 500;
    </script>


<?php else : ?>

    <h1>Please Log in</h1>

<?php endif; ?>