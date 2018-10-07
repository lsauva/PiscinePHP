<?php

function    get_hash($data)
{
	return (hash('whirlpool', $data));
}

function		redirect($path)
{
	header('Location: '.$path);
	exit(0);
}

function    db_connect()
{
	static		$db = NULL;
	global		$db_server;
	global		$db_username;
	global		$db_password;
	global		$db_name;
	if (!$db)
	{
		$db = mysqli_connect(
			$db_server,
			$db_username,
			$db_password,
			$db_name
		);
	}
	return ($db);
}

// function    db_insert($table, $datas)
// {
// 	if (!$table || !($db = db_connect()))
// 		return (FALSE);
    
    
//         $req = db_get_insert_req($table, $datas);
// 	return (db_exec($req, $datas));
// }

// function    getLastEntry($table)
// {
// 	$return = db_exec('SELECT id FROM '.$table.' ORDER BY id DESC LIMIT 1');
// 	if (isset($return[0]))
// 		return (intval($return[0]['id']));
// 	return (FALSE);
// }

?>
