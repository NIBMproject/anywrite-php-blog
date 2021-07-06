<div class="container ptb-80">


    <div class="row ">
        <div class="col-12">
            <h1 class="title">Register</h1>
        </div>
    </div>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="up-img-btn">
                        <img src="assets/img/up.png" class="w-100" alt="" id="upimg">
                        <div class="upload-btn">
                            <button class="p-btn w-100">Select Image</button>
                            <input type="file" name="myfile" id="file" onchange="loadFile(event)" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="form-group">
                    <label for="name">Name</label>
                    <br>
                    <input id="name" name="name" type="text">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <br>
                            <input id="email" name="email" type="email">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tp">Telephone Number</label>
                            <br>
                            <input id="tp" name="tp" type="text">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="addr">Address</label>
                    <br>
                    <input id="addr" name="addr" type="text">
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="utype">User type</label>
                            <br>
                            <!-- <input id="email" name="email" placeholder="jhon@abc.com" type="email"> -->
                            <select id="utype" name="utype">
                                <option value="1">Writer</option>
                                <option value="2">Business</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <br>
                            <input id="dob" name="dob" type="date">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <br>
                            <input id="password" name="password" type="password">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="c-password">Confirm Password</label>
                            <br>
                            <input id="c-password" name="cpassword" type="password">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 align-r">

                        <!-- <button class="p-btn align-r m-20-0 w-100" type="submit">Submit</button> -->
                        <div class="form-group w-100">
                            <input type="submit" value="Submit" name="submit" class="p-btn ">
                        </div>

                    </div>


                </div>





            </div>
        </div>
    </form>
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

<!-- validation -->
<?php

if (isset($_POST["submit"])) {
    // print_r($_POST);
    $vali = new Validation();
    $cns = [
        'tp' => 'telephone number',
        'addr' => 'address',
        'dob' => 'date of birth',

    ];
    $ruls = [
        "name" => ["require" => 1, "max" => 100],
        "email" => ["require" => 1, "max" => 200],
        "tp" => ["require" => 1, "max" => 11],
        "addr" => ["require" => 1, "max" => 250],
        "utype" => ["require" => 1],
        "dob" => ["require" => 1],
        "password" => ["require" => 1],
        "cpassword" => ["equalTo" => "password"],


    ];


    $v = $vali->validate($_POST, $ruls, $cns);
}

?>
<?php if (isset($v['isOk'])) : ?>
    <?php if ($v['isOk'] == false) : ?>
        <div class="overlay" onclick="off(this)">
            <div class="validation-errors">
                <ul>
                    <?php

                    foreach ($v['errors'] as $e) {
                        echo "<li>{$e}</li>";
                    }

                    ?>
                </ul>

            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

