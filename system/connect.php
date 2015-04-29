<?php

/*
 * This program is free software: you can redistribute it and/or modify it under
 * the terms of the GNU General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or (at your option) any later
 * version.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more
 * details.
 * 
 * You should have received a copy of the GNU General Public License along with
 * this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * PayPal System - Connect
 */

// Game Server Database Config
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= '';

// Login Server Database Config
$login_host		= 'localhost';
$login_user		= 'root';
$login_pass		= '';
$login_database = '';

// Telnet Config
$telnet_host		= '';
$telnet_port		= '';
$telnet_pass		= '';

// Connect and select game server database
$db_link = mysqli_connect($db_host, $db_user, $db_pass);
mysqli_set_charset($db_link,'utf8');
$db_select = mysqli_select_db($db_link, $db_database);

// Connect and select login server database
$db_link2 = mysqli_connect($login_host, $login_user, $login_pass);
mysqli_set_charset($db_link2,'utf8');
$db_select2 = mysqli_select_db($db_link2, $login_database);

// Select
mysqli_select_db($db_link, $db_database);
mysqli_select_db($db_link2, $login_database);
?>