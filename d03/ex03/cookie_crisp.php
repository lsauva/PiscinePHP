<?php
$action = $_GET['action'];
$name = $_GET['name'];
$value = $_GET['value'];

if (isset($action) && isset($name) && isset($value)) {
    switch ($action) {
        case 'set':
            setcookie($name, $value);
            break;
        case 'get':
            echo($value."\n");
            break;
        case 'del':
            unset($_COOKIE[$name]);
            break;
        default:
            break;
    }
}
?>
<?php
$action = $_GET['action'];
$name = $_GET['name'];
$value = $_GET['value'];
if ($name && $action)
{
    if ($action == "set" && $value)
    {
        setcookie($name, $value);
    }
    else if (!$value)
    {
        if ($action == "get" && $_COOKIE[$name])
            echo $_COOKIE[$name]."\n";
        else if ($action = "del")
            setcookie($name, "", time() - 1);
    }
}
?>
