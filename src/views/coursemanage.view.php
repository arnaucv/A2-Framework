<?php
        require ('partials/head.php');
    ?>
<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/dashboard">Dashboard</a></li>
  <li><a href="#">Course Management</a></li>
</ul>
<div class="title">
  <h1>Welcome to the course manager, admin <?php echo $_SESSION['username'] ?>.</h1>
</div>
<main>
  <div class="card">
    <h3>Course List:</h3><br>
    <table>
      <?php 
        foreach ($course as $rowCourse1) { ?>
          <tr>
            <td><?=  $rowCourse1[0] ; ?> - <?=  $rowCourse1[1] ; ?></td>
          </tr>
      <?php } ?>
    </table>
  </div>
  <div class="card">
    <h3>Subject List:</h3><br>
    <table>
      <?php 
        foreach ($subject as $rowCourse2) { ?>
          <tr>
            <td><?=  $rowCourse2[0] ; ?> - <?=  $rowCourse2[1] ; ?></td>
          </tr>
      <?php } ?>
    </table>
  </div>
  <div class="card">
    <h3>Assign users to courses:</h3><br>
    <form action="coursemanage/assignCourse" method="post">
      <label for="userId">User Id</label>
      <input type="text" name="userId" id="userId" placeholder="user id"><br>
      <label for="courseName">Course Id</label>
      <input type="text" name="courseId" id="courseId" placeholder="course id"><br>
      <button type="submit">Assign Course</button>
    </form><br>
  </div>
  <div class="card">
    <h3>Assign subjects to courses:</h3><br>
    <form action="coursemanage/assignSubject" method="post">
      <label for="subjectId">Subject Id</label>
      <input type="text" name="subjectId" id="subjectId" placeholder="subject id"><br>
      <label for="courseId2">Course Id</label>
      <input type="text" name="courseId2" id="courseId2" placeholder="course id"><br>
      <button type="submit">Assign Subject</button>
    </form><br>
  </div>
</main>
  <?php
      require ('partials/footer.php');
  ?>