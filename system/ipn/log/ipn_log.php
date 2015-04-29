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

if (!in_array($_SERVER['REMOTE_ADDR'], array('SADFX#$FCVX','SADFX#$FCVX2',)))
{
	header("HTTP/1.0 403 Forbidden");
	die("You are not allowed to access this file.");
}

?>

[04/26/2014 1:34 AM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=0.00, mc_fee=0.00, txn_id=358697352, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier, payment_date=16:25:12 25 Apr 2014 PDT, address_country_code=US, address_zip=95131, tax=0.00, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AMsxtyoFVXwl0f5BhkargM0.qMGgA37deNtXgP.e8OLr2hSSldWqQKBs, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=10.00, address_state=CA, mc_gross1=0.00, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Fri, 25 Apr 2014 23:34:35 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=8seQ7PPn9EoVTX1gl4EnCJE0qglR0RYBlgAHKTzwhcmRoL1Bei7XLrVf6OxG3i_D0Wjk1yAJwY15F_8uy3vfsM5jJO455shU-eUxZhtFjfVCeKBFXgRm_PeC_dVpOzncpRHBeqarCDVWbON2P8ieN_2Cu2HTW5T8JP5iP_kr7f6tZbJk0KYjizCQVnPAXncyE9NiuuHWmhDY0veptF00Y9r5wKVmjUL8auRUBwOR7F_Uul-l5qF_H7LOW5AcpaM721jjPx8D0TABFVlEVkgf-RORWE08Dq5r8bbNBzt-Nfj5OQreUkTlOB-NT5HrSRYGgdNeg4Xsm4AVq-NxKXekD4JqEynvsM-gVQ35d_d3g7nga8ShQVDIWfSxdNwekr05vsPkcPvzdqx_u0bjWNcNCk0tw2aOdDNgq4Ug6Nwchz22wKuyvV5Sjie27E4; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Mon, 22-Apr-2024 23:34:35 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sun, 24-Apr-2016 23:34:35 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.109.11.1398468875366035; path=/; expires=Sun, 17-Apr-44 23:34:35 GMT
Connection: close
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dslingshot%26TIME%3D200366675; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Set-Cookie: Apache=10.72.128.11.1398468875315907; path=/; expires=Sun, 17-Apr-44 23:34:35 GMT
Vary: Accept-Encoding
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0



