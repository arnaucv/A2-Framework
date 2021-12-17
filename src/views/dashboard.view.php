
    <?php
        require ('partials/head.php');
    ?>
     <ul class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li><a href="#">Dashboard</a></li>
    </ul> 
    <div class="title">
      <h1>WELCOME TO YOUR DASHBOARD <?php echo $_SESSION['username']?>.</h1>
      <h2>YOUR CURRENT SET EMAIL IS <?php echo $_SESSION['email']?> AND YOU ARE A <?php echo $_SESSION['role']?></h2>
    </div>
    <div class="interactive">
      <div class="card">
        <h3>Manage your lists:</h3><br>
        <a href="/taskmanage"><button>Task Management</button></a>
      </div>
      <?php if ($_SESSION['role']=="admin"): ?>
        <div class="card">
          <h3>Manage courses:</h3><br>
          <a href="/coursemanage"><button>Course Management</button></a>
        </div>
      <?php endif;?>

      <?php if (isset ($course[0]['courseName'])): ?>
        <div class="card">
          <h3>Your course <?php echo $course[0]['courseName'] ?>:</h3><br>
          <?php 
            foreach ($subjects as $row) {
              echo $row."<br>";
            }
          ?>
        </div>
      <?php endif;?>
      
    </div>
    <?php
        require ('partials/footer.php');
    ?>