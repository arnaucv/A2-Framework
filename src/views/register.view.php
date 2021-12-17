
    <?php
        require ('partials/head.php');
    ?>
    <ul class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li><a href="#">Register</a></li>
    </ul> 
    <br>
    <form action="/register/Reg" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username"><br>
        <label for="paswd">Password</label>
        <input type="password" name="passwd" id="passwd"><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br>
        <label for="role">Role</label>
        <select name="role" id="role">
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
        </select><br>
        <button>SEND</button>
    </form>
<?php
    require ('partials/footer.php');
?>