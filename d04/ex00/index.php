<?php
session_start();
$login = $passwd = "";
echo htmlspecialchars($_SERVER["PHP_SELF"]);
if (isset($_GET['login'])) {
    $_SESSION['login'] = $_GET['login'];
    if (isset($_GET['passwd']))
        $_SESSION['passwd'] = $_GET['passwd'];
}
if (isset($_SESSION['login']))
    $login = $_SESSION['login'];
else
    $login = '';
if (isset($_SESSION['passwd']))
    $password = $_SESSION['passwd'];
else
    $password = '';

?>
<html>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
            Identifiant: <input type="text" name="login" value="<?php echo $login ?>"/><br/>
            <br />
            Mot de passe: <input type="password" name="passwd" id="pwd" value="<?php echo $password ?>"/>
            <input type="submit" value="OK">
        </form>
    </body>
</html>
