
    <?php
        require ('partials/head.php');
    ?>
    <main>
    <ul class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li><a href="#">Login</a></li>
    </ul> 
        <form action="/login/Lgin" method="post">                    <!-- Una forma alternativa sería insertarlos en los campos del formulario con cookies  -->
            <input type="email" name="email" placeholder="Email"></input>  <!--  isset($_GET['email']) ? $_GET['email'] : 'nadie' ?>  -->
            <input type="password" name="passwd" placeholder="Password"><br>   <!--  isset($_GET['passwd']) ? $_GET['passwd'] : 'ninguna' ?>  -->
            <label for="rememberMe">Recuerdame en este equipo. (Al hacer click aquí aceptas la política de cookies)</label>
            <input type="checkbox" name="rememberMe" id="rememberMe"><br>
            <button type="submit">Login</button>
        </form>
    <?php
        require ('partials/footer.php');
    ?>