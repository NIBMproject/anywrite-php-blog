<div class="topnav" id="myTopnav">
  <div class="logo">
    <h1>AnyWrite</h1>
  </div>

  <div class="nav">
    <a id="logo-link" href="#">AnyWrite</a>



    <a href="?page=home">Home</a>
    <a href="?page=top10">Top 10</a>
    <?php if (isset($_SESSION['user'])) : ?>

      <a href="?page=new-article">New article</a>

      <div class="dropdown">
        <button class="dropbtn">
         
          <?php echo $_SESSION['user']['name']; ?>
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
          <a href="#">Profile</a>
          <a href="?page=my-article">My article</a>
          <a href="http/log_out.php">Logout</a>
        </div>
      </div>





    <?php else : ?>

      <a href="?page=login">Login</a>
      <a href="?page=register">Sign up</a>

    <?php endif; ?>

    <a>
      <div class="search">
      
        <form method="GET" action="">
        <input type="hidden" name="page" value="home">
        <input type="hidden" name="p" value="1">
        <input type="hidden" name="c" value="0">
        <input type="text"
          placeholder=" Search Here"
          name="q">
        <button type="submit">
          <i class="fa fa-search"
            style="font-size: 18px;">
          </i>
        </button>
        </form>
      
      </div>
    </a>

    <a href="javascript:void(0);" style="font-size: 15px" class="icon" onclick="myFunction()">&#9776;</a>


  </div>
</div>

<script>
  function myFunction() {
    var x = document.getElementById("myTopnav");

    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
</script>