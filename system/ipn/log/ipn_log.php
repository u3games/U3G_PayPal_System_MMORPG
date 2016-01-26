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

<tr><td>[04/26/2014 1:34 AM] - SUCCESS!
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
</td></tr><tr><td>


[01/25/2016 7:26 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 25 Jan 2016 18:26:22 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=9vfaM763W-yvezGWyDP-mOaVqSbJm0QHuYLPCSxJGndd-paatOeeqnAKE1Lh3qIbfwS8K-m2ZWlAJZVkN5qraFlFaG6y3XOLKxbJVtHiCiCLBJmX_usrvlaQYsOq3AAzl6Col0ZMpQbKB8zlsfDu2HI1kGJXaoWEaZz8ofzeaFt79dKJkH_-F4HMWMkD899hVg_d0jWMVMd_aD-STxda56mk_ua51rJ-h3BesCyVmm6rDKgUrorOOaqgJudTDl3CoELyO4o_8ULeP7Nyvqsj_gRWcmvISEqxDQ4K-y4H4LcuAFHPLDcUIvHZ9hBee5sYLmdGW0VDy_7WONpzoWLNnTMAAYEBQqGdWGiYDZOI0vtAq_q2NSjyATkbs_l57vREHQcCCAwTtjw703gv8r61hA8VsTwDM_KGjTOFbp2sqYx0cMIDL6b9_AYkQUS; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 22-Jan-2026 18:26:23 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 24-Jan-2018 18:26:23 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1453746382814798; path=/; expires=Wed, 17-Jan-46 18:26:22 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: bd47787ec3231
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3462964822; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/25/2016 7:26 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 25 Jan 2016 18:26:26 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=o-r-VAea2Dbw7Jko8Lq3osTO1RPanHp_BFaMbxRNpYmRHzlofn-DHNG2vHa3iY_3Mmr4i8A6-arVhuR9qmUjSc3YpvmpefjeaytS2i41jW0RM4fNGZjgvuYfZLsqV7Z1aCmxKSzRiVk0G-2Cd6P7E4cTZ30duJ5UQunYqoKCh9w9ZeCkhUrWL3rp-1NyGj3o69LRD-uxa66cYUni7MIj0ojY6XNfF77QDg_VqQTc-3VOLywJ1jU8b4RoP-NV3FxLpZr1VmYa7XFla4Aaq_V11PBsTO7ruNbKKOjO0tOpvXMPQklnFwGWa2OCTpBj_F5ODwkyCbbihRUfQ9MxOiplPIjedTBsIHRtTN-GlIRnQCFdqkpcg4opc0GWkGVJ5Jpa-iH-sm71KtrG_57p9xasE4_SMhsdYn9Aa3RxHANu1IKXrdTbTfjEMDwB81G; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 22-Jan-2026 18:26:27 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 24-Jan-2018 18:26:27 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1453746386808188; path=/; expires=Wed, 17-Jan-46 18:26:26 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 790112ac0a5c
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3530073686; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/25/2016 7:27 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 25 Jan 2016 18:27:07 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=ylqiZpGBQdvu_Sv7eoscY_uiRdp0zo8JhgbwJt_P3SmRrAdZVVOFNKb1ZtSAKHk2og3WDZtlxRO7GjxeQe4TFKXc-P7TVJwQjxbeFtcOrAwiCi0wB_mIopNwt8QAy8yjPM0eyQyD1HkeVt320asNTtHS5byhWNpcQnzDWgSJb9XaZYWZs9PzTGA9s5p2aglRuRO06q_eVoqK6WbrFmAR2pKg9TriUQwnxVglx83Vh_Ib9Rud-MrJbImMsWz_wg4d3MpjCVQC7OB1cu-PJ9bqKo8suUdJQ1UHzpPT-tBZSD85dYKpUOS9sluv6L6RKHU5vSisgl0nPLz_dbEnkIAJJt3VkfxX30eT6798V1BWehC5TOOdeilZle2-LleWLnF-BwRtwg62otqCsnWWMqT3NGlTPRro4kG9sPX11IPOdFT3dhMU0FN8lMZC14i; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 22-Jan-2026 18:27:08 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 24-Jan-2018 18:27:08 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1453746427815010; path=/; expires=Wed, 17-Jan-46 18:27:07 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 31762a40c2f07
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D4217939542; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/25/2016 7:27 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=242254402, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier, payment_date=10:27:38 25 Jan 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AiPC9BjkCyDFQXbSkoZcgqH3hpacAYFHK9rRuNcqEcwp.QwgmAeLAR94, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=1, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 25 Jan 2016 18:27:48 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=qDJw2sAtQErSi0V_75k__AYaPuD9-PyfrtIPRXX-N4a_lDJ3FFoQKMmbtuoZYoZsmVg06AJNP1GD3_bUlDcAqHM6L4JCCKcciLAx4k8geZ3_Ss82QuF-isjUdkxPb_QIxE6f0iHHWm69W9eA9xY3E2Qf8c4sr2PnlSpi5h7bv4Sl4HBpO7SQQmHyHiJGtvvvsqp5aDIbneSQbQ73ldQMXO2_tmP7HBtHuQBvjY6IdR1TsH0qcrHlzN8TDU-UAQzHFoZz0TlabY8XVbxwCkEtPtGrUE8X520wsT5NMQe8J2lMdwrnvSDTA1gZdcgCn4aa88G8sjGnJkFpxH7YzMDjJO2C7nRUe_Aq_4OH05KivvilugOISJVhjI-OjKHQ1_FME-tBA8VEquFJvLMap1X66rd37zX_vbdKzEU3V6joglqtJ-ONQqs-yy-t1yO; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 22-Jan-2026 18:27:49 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 24-Jan-2018 18:27:49 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1453746468922032; path=/; expires=Wed, 17-Jan-46 18:27:48 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 3247c524dcf71
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D610903638; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[01/25/2016 7:28 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=319006310, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier, payment_date=10:27:47 25 Jan 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AarF6tBIi4nZE5wgkxHonL9C3mlBAcPIXEErcNB4033GwpcMRwLZR28d, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=5, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 25 Jan 2016 18:28:30 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=xh81UrIvxUTlB8zXJ6KGHaTg6h233uYTG7ZyCrAAs1rJMdypfMzjYHwmfFCZjwn-RRhZzL-K0lox2g3CL3tnKzRSZKuvsyQIfsQRuV7aO1BkrllrhVt-oDBesEN-wLkC3lgB_2HKwVZMv-jWP-99mDPi48LBsGn2H-KarQTQ-q7dlCvC6QQ5QYZ-p8l1FDoqEWb74WNqVGoFf1imGBOHZXiltYdWRK6EAl-fgvcyKee65D5977uVUz7UEL-PB4TQxbM-JZwOzFTdwt03f-MFIk8idhgQSy-eZUYFmFTI3xOodUYFG-7guSSkdDbYOCgos97RvtNjNyNsDIeB49hMJsrl1qenevh8AkUQc_ax639jrW14WZcJKG-W7Gj-8URPYL8Hwvo0fiIK8-he7QT6Q7uCOA8YGh1jOo29pTXQFdQQAXmGaF4S77ELLSa; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 22-Jan-2026 18:28:30 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 24-Jan-2018 18:28:30 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1453746510297710; path=/; expires=Wed, 17-Jan-46 18:28:30 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 934a0c3e44b18
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1315546710; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[01/25/2016 7:28 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=357696909, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier, payment_date=10:28:28 25 Jan 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AGXWETO2ri2OgON7e-tkncGu707iAzmeKzBb6SQAR885zpccN14mv-YB, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=10, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 25 Jan 2016 18:28:55 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=7M4p-X3GUQ6aek2AMRBs4GyrbP5fPd8OZwSIDX-yoVsCUfTG8_0A2wnyxE3rQQ4SIW-GQ9zEbbTWLu2jKAC8JO8NpOzu2m3MT-vO75YF8iK9-mUJae94LT9bbb_4FtgtpspHTVD0AALE8BwiRPe9b-5-tV3sdt6_e1lFs0kAbAZshws8l3Uay8Ru1-RcdY20Ppxnxc2swwy2jflaSi7K06vFY35mad3OQjZWQpR-XPpEY1umnblSbELVmexzo8nwhyXI0dnNTgGDCRBNUQ7cJEEpvEbGrwfHM7G-R4ha6Ld4UeWBSqj4Pc5-jpMZuUKKHa6uGVjchg1KyXilJKvIyRP2U-QL0BvY-AyZpzBDZPAYZ2ESG2DtqJeOnA6vyDhcqnxFGgi3-lsGObeD0EzBtqXO-j_Ob-uG5aGxEVjsCDES7Ztdw8_KJTyMtIy; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 22-Jan-2026 18:28:55 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 24-Jan-2018 18:28:55 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1453746535671392; path=/; expires=Wed, 17-Jan-46 18:28:55 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 921f65d69fcee
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1734977110; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[01/25/2016 7:29 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=247854231, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier, payment_date=10:28:53 25 Jan 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AOHRFv1hUk2cIKjDQ4qeBM5o9synAu6lZgL8W0tPL7hfiuhO9RaY3taa, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=20, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 25 Jan 2016 18:29:26 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=-yR1wDnxhiGAJlTaadXl5a44-r_cZ59afyd21wEMzfJCbFFuG-nqufAo031BYHHnsrWJBkwna2q8OgogIg0rJxsSucvaXisPXSFIm8Kf7ej2Vx30h3u4wkV-G3gEzZ5D7nBOToGhagtkEp65OfNyhhkSrjyMGPj1V8GSXgpAmjE8zNXAa_KPV40P1C8q1HdCV9J-5azVVrkYfIaJjPkelkE5Hq5Cr77FOgqwKdPo6pxKu49TDQSKDojaaIjddKcQEiTRlgGnJe6Z8JOTlGnv0zFXgCFSQ586V91eC1_Cs0K5oMacue-cflhPyEORXNCdaVXDhOFKFoeqOwe0MmUPv3e5CNEWXNsYlb2TuelQ5yCkSUlTxRUacwcWobAnK41N8JVwHDhd1Snrk9p4s8lcuEboU_sodJvIPgQblKnmvkT3-C4jfTW7JaSrxKC; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 22-Jan-2026 18:29:26 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 24-Jan-2018 18:29:26 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1453746566251742; path=/; expires=Wed, 17-Jan-46 18:29:26 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 7747bd9939540
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D2255070806; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[01/25/2016 7:30 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=319006310, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier, payment_date=10:27:47 25 Jan 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AFcWxV21C7fd0v3bYYYRCpSSRl31ATdeSuqiQ00A9WaK3yOoY1T4C0OT, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=5, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 25 Jan 2016 18:30:05 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=jhIbQgP2tsmsR8q49IGrus2rA_rULw5kSjWEvo8V-WvmymL38Y7-halRKydGxjIVT58cZtwMejXjBHva7r4wa2e-erIHNzxBQ5IHOOtyncwviJVt5jhJL-8tPGh7Ws2bJALTn0uM_E6hy1pzwhLWb5OGKn3Qr7AWT_pO6bC-uYw95ftcQrNxSfYwxiGV59lS2emBj7bdKNEZ-iPctxuiD4Jn6iVsmpezGD1xFo7D-x_x3Wex2IFkIatPYAutVoZoMdZuMkmqPAzBd7utM9QlDVtz_8viGgAp2umYG3JJXR4vYPLoet4CUccsZjMIzclsY2ofE00S4oEZoB6555sakWBTfV60LnBg4Sj1_5jr-m-B8pYdECpwikDqdkSyxz8WTP6QMuio6OIaKi9Efy9Wh-Aw38vGpRkcqpyxpT_DB9ZOkIJcTqjrjQ2Jmt4; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 22-Jan-2026 18:30:05 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 24-Jan-2018 18:30:05 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1453746605486148; path=/; expires=Wed, 17-Jan-46 18:30:05 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 5d7ef1af729ed
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D2909382230; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

