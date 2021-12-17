<nav>
        <ul>
            <li>
                <a href="/">Home</a>
            </li>
            <?php if (isset($_SESSION['logged'])):  ?>
                <li>
                    <a href="/dashboard">Dashboard</a>
                </li>
                <li>
                    <a href="/login/Lgout">Logout</a>
                </li>
            <?php else: ?>
                <li>
                    <?php if (isset ($_COOKIE['emailCookie']) && isset ($_COOKIE['passwdCookie'])): ?>
                        <a href="/login/Lgin">Login</a>
                    <?php else: ?>
                        <a href="/login">Login</a>
                    <?php endif;?>
                </li>
                <li>
                    <a href="/register">Register</a>
                </li>
            <?php endif ;?>
            
        </ul>
    </nav>