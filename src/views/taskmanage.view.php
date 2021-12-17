    <?php
        require ('partials/head.php');
    ?>
<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li><a href="/dashboard">Dashboard</a></li>
  <li><a href="#">Task Management</a></li>
</ul>
<div class="title">
  <h1>Welcome to your task manager <?php echo $_SESSION['username'] ?>.</h1>
</div>
<main>
  <div id="listSelect">
    <h3>Select one of your task lists:</h3><br>
    <label for="listSelection">List Selection: </label>
    <?php if ($result != NULL or isset($_SESSION['currentList'])) : ?>
      <form action="/taskmanage" method="post">
        <select name="listSelection" id="listSelection" cont="Select List">
          <?php
          foreach ($result as $row) { ?>
              <option value="<?= $row; ?>"><?= $row; ?></option>
              <?php } ?>
        </select>
        <button type="submit">Show Tasks</button>
      <?php endif; ?>
      </form>

      <?php if ($tasks != NULL) : ?>
        <table>
          <?php 
          foreach ($tasks as $rowTask) { ?>
            <tr>
                <td><?=  $rowTask ; ?></td>
            </tr>
          <?php } ?>
        </table>
      </div>
      <?php endif; ?>
      <?php if (isset($_SESSION['currentList'])) : { ?>
          <div id="taskTable">
            <h3>Create a new task for the selected list:</h3>
            <form action="taskmanage/createTask" method="post">
              <label for="taskName">Task Name</label>
              <input type="text" name="taskName" id="taskName">
              <input type="text" name="taskDescription" id="taskDescription" placeholder="Task Description"><br>
              <button type="submit">Create Task</button>
            </form><br>
        <?php }
      endif; ?>
          
  </div>
  <div id="createListForm">
    <form action="taskmanage/createList" method="post">
      <label for="listName">Create a new task List</label><br>
      <input type="text" name="listName" placeholder="List Name" id="listName"></input>
      <button type="submit">Create List</button>
    </form>
  </div>
</main>
  <?php
      require ('partials/footer.php');
  ?>