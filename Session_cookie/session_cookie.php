<?php
    // Session
    session_start();
    $_SESSION['s_user'] = "Ravi_session";

    // Cookie
    setcookie("c_user", "Chandan_cookie", time() + 60);

    echo "your session value is " . $_SESSION['s_user'];
    echo "<br/>";
    echo "your cookie value is " . $_COOKIE['c_user'];
?>