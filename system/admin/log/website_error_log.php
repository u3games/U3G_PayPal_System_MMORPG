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
<tr><td>[01/23/2016 11:10 PM] - INDEX.PHP ERROR: SQLSTATE[HY000] [2002] No connection could be made because the target machine actively refused it.
</td></tr><tr><td>[01/25/2016 7:30 PM] - IPN_COINS.PHP ERROR: SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '319006310' for key 'PRIMARY'</td></tr><tr><td>