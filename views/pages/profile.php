


<div class="container ptb-80">

<?php 
if ($_SESSION['user']) : ?>


<?php
// session_start();
// print_r($_SESSION['v_errors']);
if(isset($_SESSION['msg'])){
?>
    <div class="row">
        <div class="col-12">
            <div class="<?php echo $_SESSION['msg'][0] ?>">
                <ul>
                    <?php
                    foreach($_SESSION['msg'][1] as $i){
                        echo "<li>{$i}</li>";
                    }
                    unset($_SESSION['msg']);                    
                    ?>
                </ul>
            </div>
        </div>
    </div>
<?php } ?>
    <div class="row ">
        <div class="col-12">
            <h1 class="title">Profile</h1>
        </div>
    </div>
    <form action="http/user-update.php" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="up-img-btn">
                        <img src="<?php echo $_SESSION['user']['img_path'] ?>" class="w-100" alt="" id="upimg">
                        <div class="upload-btn">
                            <button class="btn w-100">Select Image</button>
                            <input type="file" name="myfile" id="file" onchange="loadFile(event)" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <label for="name">Name</label>
                    <br>
                    <input id="name" name="name" type="text" value="<?php echo $_SESSION['user']['name'] ?>">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <br>
                            <input id="email" name="email" type="email" value="<?php echo $_SESSION['user']['email'] ?>"  readonly disabled>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tp">Telephone Number</label>
                            <br>
                            <input id="tp" name="tp" type="text" value="<?php echo $_SESSION['user']['telephone'] ?>">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="addr">Address</label>
                    <br>
                    <input id="addr" name="addr" type="text" value="<?php echo $_SESSION['user']['address'] ?>">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="utype">User type</label>
                            <br>
                            <!-- <input id="email" name="email" placeholder="jhon@abc.com" type="email"> -->
                            <select id="utype" name="utype" disabled>
                                <option value="1" >Writer</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <br>
                            <input id="dob" name="dob" type="date" value="<?php echo $_SESSION['user']['dob'] ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 align-r">

                        <!-- <button class="p-btn align-r m-20-0 w-100" type="submit">Submit</button> -->
                        <div class="form-group w-100">
                            <input type="submit" value="Update" name="submit" class="btn ">
                        </div>

                    </div>

                </div>



            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-3">
            <p></p>
        </div>
        <div class="col-9">
            <hr>
            <div class="row ">
                <div class="col-12">
                    <h1 class="title">Change Password</h1>
                </div>
            </div>
            <form action="http/change-password.php" method="POST">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="password">Old Password</label>
                            <br>
                            <input id="password" name="old-password" type="password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <br>
                            <input id="password" name="password" type="password">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="c-password">Confirm New Password</label>
                            <br>
                            <input id="c-password" name="cpassword" type="password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 align-r">

                        
                        <div class="form-group w-100">
                            <input type="submit" value="Change Password" name="submit" class="btn ">
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
</script>


<?php else : ?>

    <h1>Please Log in</h1>

<?php endif; ?>


