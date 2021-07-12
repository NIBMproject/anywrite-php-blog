<div class="container ptb-80">

    <?php
    session_start();
    if (isset($_SESSION)) {
    ?>

        <div class="row">
            <div class="col-12">
                <div class="<?php echo $_SESSION['msg'][0]; ?>">
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

    <form action="http/user_login.php" method="post">
        <div class="row login-form" >
            <div class="col-12 ">
                <div class="login-form">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="title">Login</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <br>
                                <input id="email" name="email" type="email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <br>
                                <input id="password" name="password" type="password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 align-r">

                            <!-- <button class="p-btn align-r m-20-0 w-100" type="submit">Submit</button> -->
                            <div class="form-group w-100">
                                <input type="submit" value="Login" name="submit" class="p-btn ">
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>




</div>