<?php

$config = parse_ini_file('/home/tmelick/public_html/assignment4B/private/config.ini');
			$resid=MySQLi_Connect($config['severname'],$config['username'],$config['password'],$config['dbname']);		
					if(MySQLi_Connect_Errno()) {
						echo "<tr align='center'> <td colspan='5'> Failed to connect to MySQL </td> </tr>";
					}
					else {
					}

?>
