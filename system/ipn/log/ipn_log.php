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
 * PayPal System
 * File security
 */

if (!in_array($_SERVER['REMOTE_ADDR'], array(@$allowed_client1,@$allowed_client2,@$allowed_client3,@$allowed_client4,@$allowed_client5)))
{
	header("HTTP/1.0 403 Forbidden");
	die("You are not allowed to access this file.");
}
?>

<tr><td>
