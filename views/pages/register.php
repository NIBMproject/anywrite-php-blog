<div class="container ptb-80">
    <div class="row ">
        <div class="col-12">
            <h1 class="title">Register</h1>
        </div>
    </div>
    <form action="" method="post">
        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div>
                        <h1>image</h1>
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

                        <button class="p-btn align-r m-20-0 w-100" type="submit">Submit</button>

                    </div>


                </div>

            </div>
        </div>
    </form>
</div>