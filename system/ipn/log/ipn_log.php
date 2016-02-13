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

[01/29/2016 6:39 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Fri, 29 Jan 2016 17:39:44 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=XufLKaLWLKBe89oBkaxPSb4lW1I-x2ytOe4AKU7CKZmxAl4Umi0gpRvXAKeQwjrYVH4vqnZPUHMvKlFUyzdB0xCEtCF0OTNLmdnQHv6--FF4w4m6eCxW6kWtZ3r-T4VsKdijJvT2KQ-kUwSi_4lZTXVTjSMBe7vyHIZVFnEGdnCxTPDWMpgSKqE-QmsNtFku2844LzN809DrLuiQinV51GTZAZ5oqoTrw0a5-q__tEki4SmmsntL9-ntyUkQUWhC7SdxDklAYIYk7eftjEGcRX45XAaMA3YK-WtGIQo8bogaxMNkU2QZzcW7pubrVBh4nbgF-GH_ONX47ECFQZfke8MDpdroJCxgVDohREO-usGVN10daX2IUOd9m3KFI_u8fDJqPzVkXDrIWQcShRs47lvdz4OZMy6PEvJtMF_o03G7_DxtL0KrIxcjU58; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Mon, 26-Jan-2026 17:39:44 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sun, 28-Jan-2018 17:39:44 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454089184189740; path=/; expires=Sun, 21-Jan-46 17:39:44 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: c4f3b5ee2a75c
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3768822614; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/29/2016 6:39 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Fri, 29 Jan 2016 17:39:52 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=5iAWT-y7Vm7z6xrg_UuYsH--JCYg6bjuWCBdYPxSasHhx0dLggZYocKsTBHBo4F-gARiB58VX01Y0AdGQPluOSAEFMY6mfTOMd9OrEDs7AN-_K4XvOQeePgfzdG21M7nflGrrsTqragqKSWFawmTf80i7NaWE5YCqv1qHC-ajOA0G9t6bEbQnhxHKcb-j0J-WSxUIGQ22-BMfNK3wgwqmhHTmZiW888iciEuYXj_BZL0XSe0iQXw26DIjPO5-nGzWzADEcgS_Xy-ICWY8N0-0b9Kj2XsUM5Oii3sLxBoUofbyoeo_Hp1dYRlym8KMnmtXq5oeUd43rpUbclFwYex06A7eIAoBr7Kw60IVm3QG65-24gx9wOFYgB0ZFGnTIhgUmvnE-6SxKWejIKIoUUhlYMN5se-q1LobCq28tLNPtXt2QONEFZjWdVTsj8; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Mon, 26-Jan-2026 17:39:52 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sun, 28-Jan-2018 17:39:52 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454089192478790; path=/; expires=Sun, 21-Jan-46 17:39:52 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 979d21b770cd7
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3903040342; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/29/2016 7:42 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Fri, 29 Jan 2016 18:42:48 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=FH3WcXAEVap8uRerQGLPsM9njO3QTHtJz91V9xAAec6y5WYme-lvojiQv6Dv3GTDsusf5Zgp0TE1Tf-Ki1G_gCo1srk1FxhSbhHT6N-G2O0ka2UFEFlMaq3c51r47ngGjCGMuEJjoQbBE2bxnhrrqYNZTGQaCAKRk7cd8S_8awMVVuJ9lQ5h6ajdYvdO9nRovJYNuhk1MPzfrocLFK3bv75CiEMgoSPLyyeBl-xlOelt1YSSwuArTFOmE5J9kHujegXhA7zLD_eXHCy-87bR1pheRTBxMtfjzn3usyAe66LUYVMnPfHbWmBV3wUN6o9GDUTyFli58c4hpzqIKk-Q1cMONxbckVabMytalltsMpOO5D7Xn82OfVTxbE2hD2n9f9294dqsm9XayEnk7S7fNhz1v84Yj4hy73MXLPhUuPiTx3_wxivZhErFBk4; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Mon, 26-Jan-2026 18:42:48 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sun, 28-Jan-2018 18:42:48 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454092968338543; path=/; expires=Sun, 21-Jan-46 18:42:48 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 31c5303b4ea5f
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D2830281558; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/30/2016 12:18 AM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Fri, 29 Jan 2016 23:18:07 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=PEI_5wnA6XF5DV413Rxa3qpaf_RdU2lf0vnWseN-RRR3EAZUnidlRVaWACBfN_nXkQ8eQcIHJ0Heht_4PKsURrzAZgp90QR7biE93qMq45UZD5rFniDiMdkQexC_272loUSPdn0Ah6Hw4R8_HJVI4cTgifiezgeq7HuL2LEzQtLvoixC4UPJHEgFBi_WGFikphXzS1Rbx2LcW46XlXM16NeDYm46IBGsL05oYgY4LQ0KoLN3P7jf7mN1qasZDdq99SOk5DOe2V6MvKvLs-l7VVU-HjpS2IpljLf2CrkWsVh8ydDM7ectbala9JACkYDDOFm-AW1E9cQt8gHDD5xgoatG6xYRBpeiepsTE1WaLL1KIoNAQMPHh3s3LOpwlkWXMwVCna0Sb9eijLmqJHELvggny5rqLHtJAQOXlTiEYI8eAp35mNs1_7wNqWa; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Mon, 26-Jan-2026 23:18:08 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sun, 28-Jan-2018 23:18:08 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454109487599437; path=/; expires=Sun, 21-Jan-46 23:18:07 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 38b4401a8e272
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D804498262; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/30/2016 12:18 AM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=1057424280, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier, payment_date=15:18:18 29 Jan 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AFcWxV21C7fd0v3bYYYRCpSSRl31AJPuheQTad2dlpwyBL072fWkGZeH, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=10, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Fri, 29 Jan 2016 23:18:34 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=sr1D3JyC5gbkEkkll7cKv1vbg7sBZHwACNhaNlokrdZtCV-iN1oGWdub5P1iRhWq2BYIf98seXHzN6DAIDPgkLt0M2JZLH8dDpNfUJdLdYc6ocztb7oUEcfi2axQ5zjQA0le7Cu-V8Nkb4cjYMHuijM1J2kV9dpWfT8d-7n9Jz-21-_3XOB9o7n_WQT0MRBmZN58WoZqrW6Di-N58lx_hoq4Me0_aFdcgGdiZ_EWYfyxprgRMD5k9r5u1VO68z7onnUTPE4S8-s2cMhH7EMkRqurWpoJpwDP0bddqE9dOKi1nAYlrJCkY5DeN3y3SGmhQnEz0CUbvIDVnkGqAyXmpE_e5h0x28koCX0txRJ0mMiWlHMhUxtQiz2F_aG5ZrQA6GD7IhlLUYhIw-jgUGGDNhvfv5KpQYTRLw3BB3jDOBBwpejHghGd2zbm0fu; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Mon, 26-Jan-2026 23:18:34 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sun, 28-Jan-2018 23:18:34 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454109514191921; path=/; expires=Sun, 21-Jan-46 23:18:34 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: ca7df952abfb
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1257483094; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[01/31/2016 1:45 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 12:45:02 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=68UXVafb1GH8l7lPmLSys7SlF3zMI4Zi53eCoUSoWvYyrJ3ocDQGhYDnE3FbAj2d8mVryHRP-E3ArSEbz7pgTygGx9OUJ3ZGk3qYoEBmT-HqHD8vXyqWYT8cAgVDy6oZNOnA0oQ-iBnwk8MztPLWbZ0ICN-SgQNh2L5cfeOU98ooJtKbTYHornHO9vpapwcvZJaq1FtCaGYd-QWUbw9CBa3pW0w6FLxFbFaFEHn4ILr7MdO2Uqe7-hvqR5MSWivRq0tXuVer_x9byb7lpXeT-yyZM5B00RWtVwhQMxAv7s6DB0nnJlVD-76OlD6WD1FQTykop8HqN171OMl482YmWzn5fA9ZepAfZq3227jnHKXfBwjIi3pq87egzGwjJUbILniZQdaotnPEmUCJntKYEnu7FedUdkaC1nWu99LpcdOwEyIVNyfZHWw4xgG; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 12:45:02 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 12:45:02 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454244302340984; path=/; expires=Tue, 23-Jan-46 12:45:02 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: f98143d04eaa4
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3456216662; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/31/2016 2:45 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 13:45:00 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=PHzHdhTMsCititEo16GPKyCwqY69unbRkuHhB42tDvBJyvFzS0fUSg129lAO4yWFOlCy6XaXXvpuqN3ZVIAi0vf6UUxFsbX1OXY4zBZJidLQRwiFlQ6jBpqjC5AM-PGR4OM81uQVWOBtuG-f4Rlz3Ii0a9mffkQFFnOK_LUxCwUmiXpgN3ICFIzb9Jxf89njw8RUeao02DMPF3zfjj8S6S68K74ODk9hlvnYtwAtsW6vSb5WPpH2gsq7fTX84YG_YeS5B3YpAoQpJPFzueV1RGh2nphshxpnGlYxL9tQig3jHhBMuK0v2mKZnDV7hjCfrjV83vBBFoVtl7JLKjea0kCSReuxDHqZrWcjK40fwElE1Qz-gV5QTS-E5a-GK-PMB7pQ7bIoAemmqiArFboyRr-REghi1SSkrY6ghPCxPaP3Dl5DEvaw48gbaaS; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 13:45:01 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 13:45:01 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454247900838383; path=/; expires=Tue, 23-Jan-46 13:45:00 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 663520bfc8d77
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3692015190; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/31/2016 3:53 PM] - SUCCESS!
IPN POST Vars from Paypal:
transaction_subject=dasoldier, txn_type=web_accept, payment_date=06:53:12 Jan 31, 2016 PST, last_name=buyer, residence_country=NL, pending_reason=unilateral, item_name=Donation, payment_gross=, mc_currency=EUR, payment_type=instant, protection_eligibility=Ineligible, verify_sign=ACUe-E7Hjxmeel8FjYAtjnx-yjHAASvYxOmqUW7R9dtQ.gPKNUUransj, payer_status=verified, test_ipn=1, tax=0.00, payer_email=lineage2vision-buyer@gmail.com, txn_id=55B55472HW263893H, quantity=0, receiver_email=test.seller@account.com, first_name=test, payer_id=9ZHACZHV8LXDW, item_number=, payment_status=Pending, mc_gross=1.00, custom=dasoldier, charset=windows-1252, notify_version=3.8, ipn_track_id=cef2de4123363, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 14:53:23 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=lpqiowipMSyNnwJ4cj5-xf8dbB_oanmqs8pgtF5G4KJ29RsxBtv7ARnY9iGYpSYKmC243iSSqXxDdO_ayi9lv9BKBoI32wmiP1Xg09hgGBZEVVSPH5B0hVHGWstFiO9V3fNH7k9IOTH63ra8J1TukfsxndGQV5Aizyn3NQwaiGR5xNZTjuw3_xFqUeXbtcSvq9CnIbqKhMAkZNwh0MvU2ZZkjMywYE5w6ZU4u9kWdFQwH0UWnkEPziehAUu25vgcHCVhMbTK5NsenIeD9q7kLweB1duDIIyqxfY8UDGDzp3fWg2sWIP0vXNF-IRgSi0MwMqrzlY9QZuBmhAVH4o_bK1dUVqTAS7mdueYRZRpTPGjqGF4L9y1FT19S0x5Nr5CoQSfLu_S_kbeeQhVy6G0DhXkksx-AcGnKo20s9jNdGh3zjdGU3d0k_bFAz0; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 14:53:23 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 14:53:23 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454252003340851; path=/; expires=Tue, 23-Jan-46 14:53:23 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: d7d44c264e145
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3810504278; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[01/31/2016 4:03 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 15:03:33 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=oqNILcJ9pfICgORG5qVj_lYL8NhHs--Y3vK3DTdRaUApLMDxdw9sfM_p53OBSl8O8cZFedS1BMDl_deCFmRG1nQGv9_0pHVK8QiF97RjxmrJWUSLlUEqPRWfxx4JPCBfBELpzbSvl2O3cZOk11mt5_hnnwTumkTZJLuzm60_uQGbHZ_9tvR9z434br0XPMEusZiwrUmwErmjBjF7EW81hPTMGOESUDbkQEfUze2sBPQOOUskKHQWoaq7bTZdAIdEIOChUHgM4VAyXKyIC80F2Ln0NnnsJpCl4Ps_dQ2jW0VPfl5TPnXLXnVy3e4h6mj0pQFFMncRN2ypbkjmBjX0IGZOwZq649gJLrhr7layZGENa4yUJL_2TMe7U3YwrmFiRHAw8duS3gA2axrMLyb6qbUuDwKczaU_K_kxWb6pyztSFlaZvNuzxLVWJnC; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 15:03:33 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 15:03:33 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454252613683051; path=/; expires=Tue, 23-Jan-46 15:03:33 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 6e756822a1c50
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1159900758; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/31/2016 4:03 PM] - SUCCESS!
IPN POST Vars from Paypal:
transaction_subject=dasoldier, txn_type=web_accept, payment_date=06:58:17 Jan 31, 2016 PST, last_name=buyer, residence_country=NL, pending_reason=unilateral, item_name=Donation, payment_gross=, mc_currency=EUR, payment_type=instant, protection_eligibility=Ineligible, verify_sign=A8RQ0F8gkUzMctcqZ4r9aZzwD7JUAqSeS8WT2EVOI0jPlKEVh4hr3FiS, payer_status=verified, test_ipn=1, tax=0.00, payer_email=lineage2vision-buyer@gmail.com, txn_id=0JW74062PN925101G, quantity=0, receiver_email=test.seller@account.com, first_name=test, payer_id=9ZHACZHV8LXDW, item_number=, payment_status=Pending, mc_gross=1.00, custom=dasoldier, charset=windows-1252, notify_version=3.8, ipn_track_id=e628ed2e495ce, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 15:03:45 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=Cly5Nvqcw9SG2IBsWANymXgL2OTTvhs6c00OwOcD5GLzqffbN6l58G06J7SqcMbErpIt6Ln-A_pUjRBAndGTJD8yE5CfDjcs_NF_PqJ398x0nMToAKRMN5_o1NOO05iELE9ar6lP0yHzlOuir4_nETl-LW0RtU4HSn7-wq09P9XRVrfWMeMdJem99yQxyPxx9LZ8JV-Qf3Iv4baZ6c_QWaxFRON3fXmNnt5hh0WzWY5t1dAC2Aj-gBO7wb5hqE2qEj1XoqYfYfAyr5_D9Pr5BI82mmY6yXaSkDIWZWY-p82onBFSHZ2gmPAoorFFy202d_jpQqH-gOp8DhafzA7F5v01bSE0vdnH8KhkHShU4cWiQgGSipnUO_TYw7v42aYcK84CuJ_oF1QFvbQNnLWUVHoKCFg-BSeHY3rRVZGnwb7-4GBsOCKNN6bMcte; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 15:03:45 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 15:03:45 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454252625251641; path=/; expires=Tue, 23-Jan-46 15:03:45 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: d6c9bae438832
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1361227350; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[01/31/2016 4:04 PM] - SUCCESS!
IPN POST Vars from Paypal:
transaction_subject=dasoldier, txn_type=web_accept, payment_date=07:04:25 Jan 31, 2016 PST, last_name=buyer, residence_country=NL, pending_reason=unilateral, item_name=Donation, payment_gross=, mc_currency=EUR, payment_type=instant, protection_eligibility=Ineligible, verify_sign=AcE2uah9fzGQIYibH799J4hdOjH.AejFyzmuAHHyuJGxItp0UiN1NZE1, payer_status=verified, test_ipn=1, tax=0.00, payer_email=lineage2vision-buyer@gmail.com, txn_id=38B89404RD905305E, quantity=0, receiver_email=test.seller@account.com, first_name=test, payer_id=9ZHACZHV8LXDW, item_number=, payment_status=Pending, mc_gross=1.00, custom=dasoldier, charset=windows-1252, notify_version=3.8, ipn_track_id=af394ed63671b, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 15:04:31 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=K5PqJkb1Dvve6BxcxsVILFDIalCVK4LGuoP2vfTUXq8eRv6ZkX9wiyGhtyV9rE1JqoKkb8S8EmsUqxVtzYk4bSvlhFjTJUFu3mVy4kaBe6p2lWoq8UV9SeH1069hNzteXUKccS7gSobY7dqf-sSU0D3DwJrxJf7TNeMUeLS1IftK7YfeiLhHkDlmVtF_L5fq39jTMfIIlKrR1h0BZjz4AqdfD33vq3TFTaoEwddZD7BFOfysr_yNeToMgbCLNU-IkDShiIcUrf6Ouh3OGu_op6002Hd_q6jrplf4LCShYHNs3LYGGmXoQpvxs8rtXrw8_F_lPe655bOJ0eAOtdnYmhPnvXJ4-_IOMAFFru5WfxvKc6Knho5qguQoSh_4g2JXVF7eqDU7omFOjmNdLIye-Em96MsNAIL1LdygMCTSh_0bzoB0T1W6oTMzVk8; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 15:04:32 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 15:04:32 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454252671735458; path=/; expires=Tue, 23-Jan-46 15:04:31 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 7334756caf335
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D2132979286; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[01/31/2016 4:06 PM] - SUCCESS!
IPN POST Vars from Paypal:
transaction_subject=dasoldier, txn_type=web_accept, payment_date=06:51:18 Jan 31, 2016 PST, last_name=buyer, residence_country=NL, pending_reason=unilateral, item_name=Donation, payment_gross=, mc_currency=EUR, payment_type=instant, protection_eligibility=Ineligible, verify_sign=ADmhMw5gqASpvy.X38.nDdwooKz7AmU4ATRHDXfpmjfoVEjBaLaN7M8y, payer_status=verified, test_ipn=1, tax=0.00, payer_email=lineage2vision-buyer@gmail.com, txn_id=21W42478FJ169373K, quantity=0, receiver_email=test.seller@account.com, first_name=test, payer_id=9ZHACZHV8LXDW, item_number=, payment_status=Pending, mc_gross=5.00, custom=dasoldier, charset=windows-1252, notify_version=3.8, ipn_track_id=6823f99960377, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 15:06:51 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=3fOr8_NYJzOj2ck6iHZKyfPJ3ATHj21U4hsCtDmLHYUVoOLCEm5lIuJFFOgKkPSigFv_atCPS0oIbLPUTEtQ4t33eOqrliwLGhD9hgKMdQcQD_zY0z81P4AMZVBRfuGJs9PTkFslGF2T2LtNG0A_KrNQb7zjm3PaJBylolayZpL5HwdJi4JneMkhTCV6McVQ2atKJmKEQ_sGXI95IItua-CQrcdB0mN9LsSq3tWstP2o9HKDP6kXOtacMvRA2yEyq8tWksD3jE5NMsyn3kI_ZuD0YBD8kXuW3t7_D80ruzwwAyZkVaPquYl81BlvdUeT1KmlWwi2ZuDtd77y_8Vd4W1rm2j79TVXPHM3AbylZklqN4v2R7xpEGfLUlr-ZTmV9c1A12FzpOYvp7AGpEGLOpYk1nJ13HOKAyyVNCP1Le6u5Vl3_sq4nowAj4O; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 15:06:51 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 15:06:51 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454252811297739; path=/; expires=Tue, 23-Jan-46 15:06:51 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 204f156b43a3a
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D186887766; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[01/31/2016 4:18 PM] - SUCCESS!
IPN POST Vars from Paypal:
transaction_subject=dasoldier, txn_type=web_accept, payment_date=07:18:25 Jan 31, 2016 PST, last_name=buyer, residence_country=NL, pending_reason=unilateral, item_name=Donation, payment_gross=, mc_currency=EUR, payment_type=instant, protection_eligibility=Ineligible, verify_sign=Ae-XDUZhrxwaCSsmGO9JpO33K7P1APQSdYqr5XEM0dUdslG7KjtExy0Q, payer_status=verified, test_ipn=1, tax=0.00, payer_email=lineage2vision-buyer@gmail.com, txn_id=60236137DU244815U, quantity=0, receiver_email=test.seller@account.com, first_name=test, payer_id=9ZHACZHV8LXDW, item_number=, payment_status=Pending, mc_gross=1.00, custom=dasoldier, charset=windows-1252, notify_version=3.8, ipn_track_id=d01ecbc2d41d4, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 15:18:31 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=XHihObCMlh02mLwVLv2pQ7tADVyKQbj77Nh23ix6HY-g2WnWGMLZLOjGsdX0Xenfhijt96n_s_gGzXgaaI1o4FED29Rtp2LyE8k8is6hZbFcFu2SRz4NLn7yK-olq7YSapPMYNd_F3nhovmDWWebqNooNQibctHFhRMrCqMYdZIZCovf4FuFebIQMOn_9I_KhXurqQ0HiuO7jgK4B1w6vyw1HY2a2xOz5MKLKp6I2O5APllsE9EoK6GUKU3MHH-ayU_Xh9OTxmH-HWIgEai6f604CqJqmii4m1UgI7LzADXiDDnTqyZj8O2wPuqsJKOPVyb-jKWaWfrD_MaGONGO9KaT787JTfRfbgqHrokidvyzfKF7hbowTZNycja6e9mVVD7W9anpN7E6MOsNQyfKiM_ly3d66oqiSQU-nPIpb4xz_qE7igiDN6hdz9K; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 15:18:31 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 15:18:31 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454253511156714; path=/; expires=Tue, 23-Jan-46 15:18:31 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 1bc451cf21dd5
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3341135446; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[01/31/2016 4:21 PM] - SUCCESS!
IPN POST Vars from Paypal:
transaction_subject=dasoldier, txn_type=web_accept, payment_date=07:21:02 Jan 31, 2016 PST, last_name=buyer, residence_country=NL, pending_reason=unilateral, item_name=Donation, payment_gross=, mc_currency=EUR, payment_type=instant, protection_eligibility=Ineligible, verify_sign=AgePMPfbDDc05TM5uouG2O9s9U74AIKTt7Y8DBqT34-ecsIVx8bgrM85, payer_status=verified, test_ipn=1, tax=0.00, payer_email=lineage2vision-buyer@gmail.com, txn_id=4HY441577H196154K, quantity=0, receiver_email=test.seller@account.com, first_name=test, payer_id=9ZHACZHV8LXDW, item_number=, payment_status=Pending, mc_gross=1.00, custom=dasoldier, charset=windows-1252, notify_version=3.8, ipn_track_id=d2d8ec7f814fd, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 15:21:12 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=osOpLKUHS0kAFd3UL9Bvi_rMfJGQLEFivlF2ZEaJoEGO7NUFoiMKNfzf-PGWd-RcICzESbD60wiI8yFGZy-K9NdL56y-S0EV_NNrFvkfEtBzCJDJl5o4nynTaKcPT9Xz_8MchOvQU_NbqWg1tl6S7CQH8nms5XXDqUcGjCvRGpM5LsFvLh8pNrAYOMih47Pmw3iJRL7xiKhunr4Ca4dTJ0UUfJh3-zbR9ZsxXm43m77CbFTLDUDqfvmpiRVVHSBKPZtVk68FnGyre_C3f_aBc1T2PbPyCn9EmhgJxzgoXrgAGmlwN8ksoB20ic4McHqzopg3Wk0b3O-h2xqBCeeLek4XaXu4kc7FAZJ2rfL50GmDkcusDEA01mjt6rQ979l9kX2tg-lYEfJGxXuP4YlRMCAL_8LuqwyNqMVDxCIDaF5sCDG4BF4aZo8Hzxy; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 15:21:13 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 15:21:13 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454253672828485; path=/; expires=Tue, 23-Jan-46 15:21:12 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 5a592623c60ec
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1747365462; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[01/31/2016 4:23 PM] - SUCCESS!
IPN POST Vars from Paypal:
transaction_subject=dasoldier, txn_type=web_accept, payment_date=07:23:09 Jan 31, 2016 PST, last_name=buyer, residence_country=NL, pending_reason=unilateral, item_name=Donation, payment_gross=, mc_currency=EUR, payment_type=instant, protection_eligibility=Ineligible, verify_sign=AfzPPZH.t0ety8o.ciNBEdPv7r-OAQ6m971197zbpxfuBUKsWrMhnbXq, payer_status=verified, test_ipn=1, tax=0.00, payer_email=lineage2vision-buyer@gmail.com, txn_id=25H956353W642954N, quantity=0, receiver_email=test.seller@account.com, first_name=test, payer_id=9ZHACZHV8LXDW, item_number=, payment_status=Pending, mc_gross=1.00, custom=dasoldier, charset=windows-1252, notify_version=3.8, ipn_track_id=cc737e811e1e9, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 15:23:14 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=etYZvEn5MABd4WXGDuJI6yzLAMnFGvfMORTP6VoIGqUVMULZpvIbfyuDcBnV4OmJ_TkaSwtujZGfGX_y_GcD1KrPyjEqYacCzk_no5H67sga8uaadnMSgVmO1wWhxrl5q99977NejZ07z_pB5FNUYd3mRJS1EVvqAc5TJyaMfqKlK3Z5g-ZTuXjASn1ReeqXu6g1Xutz0lFB8nghZh7s_DJow-O3pYzrkJNVZjb0ZMrkh9CY7s2TSR9cCJLAeRYvAfO2dwYV6rUduXPon48QE3Lf-nKHc-N-9d_6bsLp5Rt4bRQcpRpbObE0_ODdckxuYw3WhV4P3plMbJ0F89cpH1Q957m0BWnuS4YouCh7ho934-1tagOBIA85msdapKbb4a2Xqj3NsLEMDZPkDsoZHBTa7Enl5e9Ag7XqbjnddqNHeoobw67PHi94mSa; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 15:23:14 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 15:23:14 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454253794583420; path=/; expires=Tue, 23-Jan-46 15:23:14 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: ef1998288a5f0
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3794185814; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[01/31/2016 4:26 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 15:26:50 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=0raUuViRA5yhlLmndB0k_7NZlGzuL6M4c-WczyxiAgWZPu3wwJjkZ4i_pqWYUovb6bN4waTON86SZ2sH1ySkE3xvhll4byaK6VWd7sDypFNfP2LI6oAYQ4AYQM_DZMAaX-kDo7QzDX5zeFnVQjf0il8kq3HGkMwLV8lhqrhnxPw2S0b8DhtrjkDvYcverleS2dOqimSSPIAKqpuj11M8Hz5cuZwvPzEzPgWucCnBMREaB2dzasDPHwXJjyGUef4KieIGP4Vj5G_98mdVX1Nb45Ow-jpHRojMTxYWTgVxiDQZX7xyU2rrcSLf4PtM_AUUqA6yT3jWmQ_GX56UZs13OwFe_BFaqhKEQKiAmAA8IUU63ON4vrx3oxu7s7X_R8OnLqDiOMn1n329YDIqGUHG6c56S7A8hYwFgjH_hmerz5f52a8GToX7v2owlCq; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 15:26:51 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 15:26:51 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454254010786521; path=/; expires=Tue, 23-Jan-46 15:26:50 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 405f5c8cbb6f2
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3123162710; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/31/2016 4:28 PM] - SUCCESS!
IPN POST Vars from Paypal:
transaction_subject=dasoldier, txn_type=web_accept, payment_date=07:27:55 Jan 31, 2016 PST, last_name=buyer, residence_country=NL, pending_reason=unilateral, item_name=Donation, payment_gross=, mc_currency=EUR, payment_type=instant, protection_eligibility=Ineligible, verify_sign=ANwj2ldcKmqmiSFrG5nY8O1EmuxUAyuYFoe-ECbZIy3V8bsw2se07LxP, payer_status=verified, test_ipn=1, tax=0.00, payer_email=lineage2vision-buyer@gmail.com, txn_id=7EP37800U0053281U, quantity=0, receiver_email=test.seller@account.com, first_name=test, payer_id=9ZHACZHV8LXDW, item_number=, payment_status=Pending, mc_gross=5.00, custom=dasoldier, charset=windows-1252, notify_version=3.8, ipn_track_id=de9d961b9ec0d, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 15:28:00 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=upgdDMsakjwsumF3Yc2ttk8XfMJLpysM0B82LZGsRy_rxGLy_f1f1rEIMyPnPo2hEKOvAp5ypSUvLnPUY1UKyPi7aswoAVWyYcqxY4ofGTr2VKJ3DuOgB28de9VuIYmSNnnM5QTNho0zAg0KAap6dCoF3Ertik8aG2E_wTdOH49k_l8b9Gxd_YPu3uKh-nR3hEywbHKZTrly_olfbpbB4agRJkPMQLNtkb6I9REw2pd_Z_wVR2a4JTkjOtY6qjEbGfwgs2-UCkHp45M4zC5BOEVRJbNnzOj0wCohopnMA9lcOaAvA-8XTRBt6XxhyD1bl2mKlJqxYpdglTC6jaFRwr18GAG99r8HPlRAmv-BEXPce-g4wtuIsb8KRRSo10Qj2Oi7OFWUedRnrFASOgMg7OFEfynOA0TienB8Fg-QschV1euobgOAd1RxPUa; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 15:28:01 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 15:28:01 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454254080954982; path=/; expires=Tue, 23-Jan-46 15:28:00 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 2c39c05ae5230
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D2666070; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[01/31/2016 4:40 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 15:40:08 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=L1wLFOWMghF598i7i-nVyts_UefEdcyWk11fz6cDcFCWVHIhTllHNVkwCanQLQ6SpDc8galHGeS-aIdIHfefCfEmCIxnCZuYzHeB2f5XAezmBRJoJoR88VCwSbm8XgRvpFlpduJSNNoS16-EA0vlyNvrqkXXP4NksweVqwQpbaMdHFdtu-BEDz3ig3kT-W_Rmze9v32eH7dOU9toH9wlNzKI0vBfZomEhklLHzxaHViwYr0jMpCDh7kz2c9XzFNIqb1U2nAhBv1KwvDmBriN9VAKxMVJexpanuIC1L-bVHEzLl47cONfycIz9tmp6YmjnWHkjA9FuemW2qx8Wi4dbi07OZ7y-Rgfexx0X7Q_pqzUu8SgSY56lWnUBWlzC3RadiP6sadYoXlc3VBJuv74Tik4oQdNJ7lPRg59Wlj0i7fi0j42zvnYAHXSFLe; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 15:40:08 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 15:40:08 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454254808312553; path=/; expires=Tue, 23-Jan-46 15:40:08 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 3d81fac3482b4
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3626675798; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/31/2016 4:41 PM] - SUCCESS!
IPN POST Vars from Paypal:
transaction_subject=dasoldier, txn_type=web_accept, payment_date=07:41:01 Jan 31, 2016 PST, last_name=buyer, residence_country=NL, pending_reason=multi_currency, item_name=Donation, payment_gross=, mc_currency=EUR, business=lineage2vision-facilitator@gmail.com, payment_type=instant, protection_eligibility=Ineligible, verify_sign=Arx.kGKxeEEPMNWUYsQmfcUVshCtAlJkHPzMwb0fA-uGs3eb3Q1p0k5Q, payer_status=verified, test_ipn=1, tax=0.00, payer_email=lineage2vision-buyer@gmail.com, txn_id=9DB8616947392844E, quantity=0, receiver_email=lineage2vision-facilitator@gmail.com, first_name=test, payer_id=9ZHACZHV8LXDW, receiver_id=KT553JBK9WQMN, item_number=, payment_status=Pending, mc_gross=1.00, custom=dasoldier, charset=windows-1252, notify_version=3.8, ipn_track_id=e733d652a8207, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 15:41:05 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=mKSh1jvnu9ChH1XFAvzltvDlFOX1ck1RAD-4jmJJXbpDZZ_-_TISS5DQYPxg1gQBnjqeO9fRhMriHx4La3htJ1CT1ppKtoS6meovJiWmLOB0f7PnpC-QOe8aeqkFJ58Ax35fIUlG6CvhKf6di99gMWrtukyjcOZ7j4MdaMzpkekX-teGo7w_fL46WpAt6tzyIH21EKpHO1aW74nfiONOkpg5zTd-aFE0naaS3lAVo0hCalcsibOqHA6vIXv4kZv_sL-LTg1wKqDQ7TSkNOm3yr2IbBNA_jX8UEMRxEqlhbn0ZVNCXhVMm9OyxTL88xp-g91E9zs3XFj0l6bzRvlndMd0Xjf9yt9HF-R2vEl8RfG8fKwjrPpzfeInuvDaToUDECH2waW_D82dgmekYwFFrXElxig6E8RXLL36vYmrG5vvxFHAaWFAGxh-W9u; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 15:41:05 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 15:41:05 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454254865463429; path=/; expires=Tue, 23-Jan-46 15:41:05 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 595768686cdc0
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D288075350; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[01/31/2016 8:11 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 19:11:17 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=uK5WoM1HoIqkmZUcOa1jvqRmyq8XT9K2GFbHElLV_HQ8DLysr4UKp2C1Ubw7yuPTyYwZ3sqRVpOkgXN7k0cfO9dWLqEy0ZazEGT5f5nz1XGUBW7ttHUB5Zws9QKXkf6YGVIwduN89myysS42S2Q63biWwO_o7lB4IyzHKtIb_L2-gsWDyoAezaxFVGNlgIbTH-BBpfVwhoi6ZYbsGh2cDvKVw1m9GSuf9PelozH4Bf9fjuKoRjHaJILeWwD0J9eUEpARPlXz6wYRTaqZ_mwDP37_rSSQCXl1-fKzupcZM9co9FnnwBvBZtaRezMOWMa2ye0VeSjD8RPOB_mGwXjvTilAffh-K0QHKVwMzwuh7-4AeQK4iusInBLG8F7sm_hULly49T0rPTIovdHsBcBFj3lvonD34wex8fIE4-nBNR38NHrdZIeRORIRzka; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 19:11:17 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 19:11:17 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454267477638154; path=/; expires=Tue, 23-Jan-46 19:11:17 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: ba6efaa097d4a
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1432137302; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/31/2016 8:19 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 19:19:49 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=ElcxIDAKRQPAN-Es3b2PwCo1EoDkrA9pPEtT2Z6DGjtyrh9S-oJVTo20SVAqP7haw-gwNUJByIH5eJvD3RdsYnmS2nlhQyjPrk2m9TBC5yOwb_0rRoZ6418Ug6noAuaMJ5_tVzjyvWLA5FtcmyhjqDEq3xeg45rw5f_nkfN-MYKjy1oXMsWX6jWppNIIV5bUgmYRAwHfeKm2sM8beUumPjpEq5v_5QaljAsDkW9b9WMVskQDJX6uLGN4cIqG6yTbX8wzMmKUUejvMvGYLl6W4exbL9LXwxhFsG2LMNWuDIW3J89AqTqmQ-ml0go6MWFZxu2E5SYh5X3g3NA7R5Eg_pf1iK8LH5guaoIrXPC_si-Wb2BQug2t6S7BSEHfWOqHZQFPj0F56vzFd9GteL9cQD7u5KTJ6YV2WVQ5JcpvYQ_kJGC_fULrSjISnxO; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 19:19:49 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 19:19:49 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454267989528524; path=/; expires=Tue, 23-Jan-46 19:19:49 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 828ec0117d0fd
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1432268374; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/31/2016 9:14 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 20:14:08 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=upIsEEdNdFryIblZUSq4gsLc7SUtuHTJPO35YHBQLFSK-aOkxp6yWEACHhYJywf5oWAsiRO1pTg8xjPwqAg1PSQRi3hZFSrPmVt0ZS9kDBkJPfl_-5nr8kRSnQYwd3eBOpqyov2sUG1FRWTWODuXevu1A2bGuupfVCyi4IY5PKhjL6HVOVSPr6eCyL7qrMcmMNKR6MU2QOsN1VfgYZWYkzZIYh9sVIkKNaY0kX6uMEAgBQEWjxYfUYyt-l9yz0QdCND348cv2lMELcqljD6bJ-fHOnCLDhbw83NjNwz56vMYzPwsts1rm1hxW-WQC1LbgEzBjWpB-TfJsPXeV-pN23Iu_0E5nFXVEr-wMSp5UYh5LwPT_8yhsP1SzgMaZ90XqgT9cvn7PRwsb5CSMnKwObyOay3M9YZX1hEYYpnqHdXYoF4Kiq_qFlCJvRm; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 20:14:08 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 20:14:08 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454271248023352; path=/; expires=Tue, 23-Jan-46 20:14:08 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: ca550ad411df
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D275492438; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[01/31/2016 9:21 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 20:21:08 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=YqESjyVUNCyppDWOBntzrZNeuNFcfdqxL8wYbmbfSZeofqAaKz-JTwGBDN2qdDWOKANvJjL0t4KvPJ3qtj2ooqGzecUAHLcY98yfUsUwK1PKr_rdkcZHgPLHUpP8lTcNi6EHBBtGHC1Tti2rHIvBFFowqT2FC1tSz9zOVBaAO0CZDInkO7n0RV0D1SIK3lhSX1wP0_vc7QU_s8QlsAjq-m6XSB-JfwN29LU_nVHDinANBWnK2GzrgBqbSTKIhLUn12bxt4NrRsvdxFw9xYvybpzSS4-_7do-V39I7OqpN6zscaXU_dPD5EgNiPqi0nX_z86sqYDkMBRP45F0ZBAZyog78rqR-d-weqMayAUz1LPc13ShDAZpErRSk7XW0s8Mf6ectiPMflmFVXWC5IYoCh1ObqCJHL8dN3HH_AniDq75vV0r8YhLg0Z82H8; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 20:21:08 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 20:21:08 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454271668488766; path=/; expires=Tue, 23-Jan-46 20:21:08 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: cb8e0a3b730f2
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3027021398; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/01/2016 12:28 AM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 31 Jan 2016 23:28:50 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=68sgosaMGd1sROKOKg_zBmwIxjqBX5gMAY7iaPq75pLK4-daEMc2o_h1twhAmfykmBrDW3BNpGyLziaCOuoiH8aH7ymPKKPQJKpEDatV-OQCG8DC0of5UVoq0LUuDY2-A3VmyPyXu9wTUg32fdz_kg_v37K5a7nvWv9vnGORs-xmtq2M1CQL2v-U6zsFV6LRwBj8SAxVx9JM8qIHEcNPUTjcXVwiRGFukylB90P2bDm2ntxgetXcbW1pcX0f6Tv5sFy22ca-LntFFokWoPVnbIrIkC86022rkIyDolifYNRBGZ0lcvIVdPZg_oOjFefCgYFu6o-K1QNq611E3PMs6P9sEua56fUsx7OdYyHbTq_kYszjPQtDGl7PIHUXS6AOz_vVHHKiTdLAotoTSUvStAQ7QwIXFP4ETBWLkF_9o2mT24P1bfNuI7UKXSy; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 28-Jan-2026 23:28:50 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 30-Jan-2018 23:28:50 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454282930420847; path=/; expires=Tue, 23-Jan-46 23:28:50 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 16bd08a62b09
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D2996350550; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/01/2016 6:36 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 01 Feb 2016 17:36:00 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=QcQHsSJ7tKN2aO6SucpaYQdf5BoxwgpXu9V3DnpHlt1DZgMb5WG9lSL60DhGRvi8Ud-loNMQBOnOAz6JvMpZprbvQEJXet1xyUAh_mFFO8RCt3Zl5RsnzzOjFc9NNoSBbW3kGkpU4DWAIMCPfwFpaDcgxhJCfjjmWB6JpvZCo8RpMLDuWCMm-SW8UvLcsgLNJESLWpBEG6ZOKtUGSz4xdCQ9Yt-M7_YJEVXX5eCr4E4js71FrmqAo4KKzR6y7A840yQfHWQBPR4p4CC92xXjhgEly97lrWHmxwnVY0zyiadbS5davurVSwrYHF2XUZxeebFfPZ2Xqbkbr8HWnPMZv9oomewv37euYdqkT5KSLOlHtM89XVofEC32KjDLbQ8Zt2h1CQQa08KWZPRqe6eyzdjG8edyutwUk1U2Tc6BY4mMTo3x26KQ4C-rzXm; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 29-Jan-2026 17:36:00 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 31-Jan-2018 17:36:00 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454348160386363; path=/; expires=Wed, 24-Jan-46 17:36:00 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: a58f379b5a6fb
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D2157424470; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/01/2016 6:40 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=475343376, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|coins, payment_date=09:38:34 1 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AFcWxV21C7fd0v3bYYYRCpSSRl31ADADe-yiQ1Ld9Mr7OgDBQALw2sG6, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=10, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 01 Feb 2016 17:40:00 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=fo5gIyGej2tX_GAz1xFo93BalDzzmtVVAVqMyPpGKNs6ZZUlEiSaq4x4T3CNgoWgOVfAx8TR6bkQ2m4SZeXKd_ZVt0c4dlIxw_ekZ0OYN6B4Ig75guw4Ti9XTK3ms3a81nEXDpkda7OVqJaTasda_Ch-xYzN1EbnbejB1I4bfKKHxpQHwbRTb4Ny7Yn3zNW_ixHRaPUjdLnKuwopA7WxZUm8WyZN6KzKcz3xOZF3KQX755U5Ckzv1pNJdVbmU76ACTm69Bd88zNPdu9_evkO9_TjzXyjaA0zCuLuSR5iTHtPQA8RGIlDaZwaJZcAd-o8LHw6SFNaKMNSL-PNY5L6gH3iiwDoHZ1aiBVcWbAuh7bA_VuMI68FVg20JvhJ69R_7BCRWVjfRRRrDyW1Z7Q1wFw73cuCq_i6nfWP5eqJEQpPXlDbH7M6radXBhu; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 29-Jan-2026 17:40:00 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 31-Jan-2018 17:40:00 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454348400556353; path=/; expires=Wed, 24-Jan-46 17:40:00 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 99029892835d4
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1889054550; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/01/2016 6:40 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=155739364, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|coins, payment_date=09:39:59 1 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=Ake6fFiN7SUbDgku3cKqYMk4DtwmAG-r5N2RxXbI6kNVEh61T5BPhN4t, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=1, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 01 Feb 2016 17:40:48 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=SHGuDJ8TxJoip8O0iFxJqFOKrmta1aF3H19dbFdXpiPYlOYvXiTIqdOkFkDk3ga3eCMXKB0mQDHa7NLnkWsKNu7f_50ywqhC-WIl2JH5a9kCx0bBIPIqP8gSkJmmxoB9d4utMHrWbbd3fdg9D5sNXLFUQa_zx-siSjcFM_DBp3vFZIlijESW2S5HhGO4AEpqUQUNUejYKBwc3kJ73uNhTQotM9Kec7GgvKmyNqdKhgc-ajOIKYZh13wUzABSYnj4uxvWz81mJQhNvJtCK_S_sK4cqbH3_WYQusADLyS9uZg-YmWJ9T60ilufKNRyUPJ_T_QRsUi3Eeth85ajfYHH6rz7-TBsXkllrw3NzjwXXHACrljEr1ffYLGrEBvciNSuf0M6UtLZjsGeF9vJHw37DmV0RzKQdjSRurD6tsHDSaTe-BZ_Ci-i7R13YQK; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 29-Jan-2026 17:40:48 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 31-Jan-2018 17:40:48 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454348448645717; path=/; expires=Wed, 24-Jan-46 17:40:48 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 8e3fa8d29991e
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D2694360918; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/01/2016 6:43 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=208566107, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|karma, payment_date=09:40:47 1 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AFcWxV21C7fd0v3bYYYRCpSSRl31AIhZ5N5IflqXpivCL95SS8QvySCx, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=2, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 01 Feb 2016 17:43:24 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=1WFdwSpTyh1xSbdklBfjcCxEM0W8hwqphOs6MrhZHRYZj7Z4tvNSB8j3PA8DenV5az1uGcd1SHrSlREZP-HxLpl9k0Rs8L_KYwtN4d9hCleb937jXaArjwBXUBUIciUYLx9wY598Xs0W7-brcqnduhpdtCSvRBO8tYiG5po7MhIXjP8lC5fatwT_X8MATkRjNCipXcsIsde-maTa9GaDhKxPZOEPiOzG4exrl9Km7_LC8NtmjOh0Z0G1oiRQpSGqpAwJ0R_1164-RGdL33Yz0igH8-WpZ6vBQotHRp4KDq1SvThPSo0cJ5yxWHt-NuLEqh60EMmJ1aPao_8KGTwJ-dfaASOrcWDIeagmSPsk8jFmMf8ccUombxTbOq6htkrrBk-71C6xSXojC0JTUJuhkJEoTb89b6DXyZ1j7qXxLFSj7uvEDgHcJzTn-CC; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 29-Jan-2026 17:43:24 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 31-Jan-2018 17:43:24 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454348604495464; path=/; expires=Wed, 24-Jan-46 17:43:24 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: d5ba0c507460c
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1016704854; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/01/2016 6:44 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, shipping=3.04, payer_id=TESTBUYERID01, first_name=John, mc_fee=0.44, txn_id=861567229, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|karma, payment_date=09:43:22 1 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AFcWxV21C7fd0v3bYYYRCpSSRl31As64.ajJFBxwX7D.p548QlNq59oh, address_country=United States, address_status=confirmed, payment_status=Completed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=3, mc_gross1=9.34, address_state=CA, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 01 Feb 2016 17:44:36 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=pvH1yeZgWk0oQnUy6ZgalWX4hiV_Q0gzR1MFf7810hmB5q-GxB2jv3xX_9NP7vA8Z5jjeqr1YWTpcYWKKS0nltLyV63cc8mCu0jmqpuGYgoYVy8lKY4dGb5HL08iCvlGkUS0uSD_QknYN9sVGnN5AWpL1YDrRmZ_xh4UdJ5CKAqQFGdJl_b5Q3dLjEh1Sc4eWAWSR7lWYkRBVUo_rplU-39JbnGwLuJql0IRhl_lw1vO7wsRtUyv9FKokuCVZF33ouFaEML7Q1FIQSHMtzuZgA18M4EcvEo2ucgll3JX6Hzkx7Jo7lI-7RLM5b4UZOYJIVDg5iPHhUgaDj3aJq46qmSA5hheADNUUb3yuNw1sONq_4l4wbuak0NdIU3Tg4sZ05A0Ye3n1_LhBuHHfKnc0Q-miAHBje4wxn6glpF4pTTJUivJ12m8gwCsJNy; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 29-Jan-2026 17:44:37 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 31-Jan-2018 17:44:37 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454348676853216; path=/; expires=Wed, 24-Jan-46 17:44:36 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: fcad0a39cc56f
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D2224664406; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/01/2016 6:45 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, shipping=3.04, payer_id=TESTBUYERID01, first_name=John, mc_fee=0.44, txn_id=552512303, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|karma, payment_date=09:44:35 1 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AFcWxV21C7fd0v3bYYYRCpSSRl31AvL7lsmANCoDPKP8ffhT3mCPnem5, address_country=United States, address_status=confirmed, payment_status=Completed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=5, mc_gross1=9.34, address_state=CA, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 01 Feb 2016 17:45:57 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=TxrgzHI6k6rE_F0yXuR8K3J1K6wizuTocIQAnoDTZdjAHmv89k1bXci6glS8lbj0sXhHYdk9o2pKNc5CeXH5bKkn0YYL6AZZZiPq1LmIpy1CaO9BuMuQcMCNXUMl0ALpADZ187ClyFZ1_A_Z1z1JaY_QomeRI0pR66Li5ppiTkJIvQBsoERqDilpAGvW7L3tF0Jd-VTZe6JivcO2jz9PaNxm41S7P5izOcAH5AskCeTvutda32YryyB1lBog2FUiHG34ZXmfQMK4y8DjYKlp31tCuTgu6aC3nDGruAEKgf7cTTpaM-xc40RQ8frKNX8FlTDrVQTlPnjUN2QDd0M85mqSoQPt9gVELdb69EmFX4YMqQzTi7OMDLH7_-abxxUXn1OEoQZSXg6zQOKZQL7DyHqr8zw1olES56yfbNhg63z2WKEhv7DxlteZv2q; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 29-Jan-2026 17:45:57 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 31-Jan-2018 17:45:57 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454348757658722; path=/; expires=Wed, 24-Jan-46 17:45:57 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 2d982a449cc29
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3583618902; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/01/2016 6:47 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=464954751, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|karma, payment_date=09:45:56 1 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=A6B.NPy59lC79FvggeNslQNTKj4uASeBzB9uFlKRbRBezHnC6QXdwbM8, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=10, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 01 Feb 2016 17:47:17 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=71A3VUARK_WQeYHSG8P5iUyK0Xh6P7S6Dv5EQY-SS_1mt4l6oLPQ7m8ZPCZh7WSGBdI3wwH1M-j3yO9EzvSHNaMIbTT77-1blbP69glbEI7inijcV2pDP6BYIH8ymO8cMV6uDlMwmXQxJamWz9UfkLF6AChXWmHaSsK6jv1zvyg5o72-iFzLRwg8J4O7Yq-THn0mT89oQmQgUMrFRvF2hQexY_EARGrKN9gHIWEQDLKyeCL4gNn4AgALwzMaAqdsplXO0QEA6habAsMxt4xsoxi5OjIX5MUgRATKP_sHXiV8BT_c2saTEKx9quvw_o7OMndsgSBXDZAdAXLf0D-RdVkCBkEjBpZcWKeGi-vVch7yITyluQz6qt0ytz92WkZkh9qENXIMrtJfFij925lu38z__U5Y9xGgOeOkEuWv_xt7G8q8lHr-LelQ-Ku; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 29-Jan-2026 17:47:17 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 31-Jan-2018 17:47:17 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454348837501564; path=/; expires=Wed, 24-Jan-46 17:47:17 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 57848974766ad
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D630894422; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/01/2016 6:58 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 01 Feb 2016 17:58:28 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=Uhf7aaRUVR2LiM_QaPp-QQhe4-LQQlJwOMoUWw-GdbRWRmpz549NaoSjaXxZRPP-86hDvlWdKh4BQh9XwsT55YKWsXFiRjPlERdAz0U-M_T4i8G4CAvtXnlMBW4YkdZ3KVE2Ln2tjeuD3_D8mtOdZzbmUjN2veDzYybWC3Qk3-Z-tNulqIVUnA8RVBxA6eBOQ5X11GY4K_77PEwIKhmRWgUIbGpN_8Ks_Mxq4xzX855N-fVvDq_ZSQsPmJqqxA_SG0qp7TOONAJEK6dqjATJWMnLK9IO2xUi2x9MlY2gqbVchhXz8wIHwTjA9g-bhLAthpdZL1GUkaFLl3710Qsq_Bj4YJ5kq5tTQc30nzypZ6wIqj67J9dhXnXCYlQHcEtbwISPE6uvAvtMuLu9bbDkQMOeuqLfxqXmoqSogxn8iq1ZA8t2-iHgTu2WW_G; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 29-Jan-2026 17:58:28 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 31-Jan-2018 17:58:28 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454349508438051; path=/; expires=Wed, 24-Jan-46 17:58:28 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 10963a3466686
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3298602838; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/01/2016 6:59 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=634388768, receiver_email=seller@paypalsandbox.com, quantity=1, custom=blabla|coins, payment_date=09:58:55 1 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=ALqovWPeRCcK69cOdiHuO7xPCNgIAwEyauobCxDGouBsnkzjs9TbTrVf, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=10, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 01 Feb 2016 17:59:29 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=8WFKMYglvPL2Cfhrf4WJZUQ8mIjx7v4C8eCaLHKMwPhIYqFnBvFyMRYB3lwSUVLMDlR2HsztbqkwgPV7EcbMCkOyUqElYNXy4IEw8HMGQSjVX8GfTIiQVheAvmqqWm-j8Zv3PhqmEjqRuEG_AyLF_twf3My_P9ILaeERYHxjaHiHEakrtYWNg0bSB73WQx5kK4gqOD1_NYMHFZ2JFGncs4Vxcue33_3OT-22euxs26g_SL4CashYlgggL1ilJ9o9uKVhOdqWwD8tDcekWV0I4PtYi1dGeQ-fzdESVW1WTS34CuHPA7sUQKFRzERrj4NHhRMOY7VjK-aFcpmSObC9tngTwV3XnX5YiudVYkSTlBHMqZ3zukJTGC3gT0wvdZyJL3c-tCqMsdEdEihrOdtL_GGygJKQZQWPqVXG9NrA2RBTjbTsQ97ZvJr8KDa; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 29-Jan-2026 17:59:29 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 31-Jan-2018 17:59:29 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454349569069272; path=/; expires=Wed, 24-Jan-46 17:59:29 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: eeddaa61cee4
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D27111254; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/01/2016 7:21 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 01 Feb 2016 18:21:30 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=ae-96u3o3SOXwrE4nroybVIX7s46Uq8Le3OfwFDzHS4KrtZi57clTe-1LSquQixQ-XN6mYBJD9o4UTOepH-xahVyNw_0YT5G_3MSahN7262B_K7U5JxLWPuni8nS2xhk1QcA4cISwjXsQfYvv1dMVJNTB9yq9g9iUAUy1_0nsU-pjN4ySX_YmOAwWkdIbAZODqgq4IpHmNaWIGpkU2NEeDpqA1qRDKDfKBxxHC5d3SugUn2LCfgNBli-rj8TtpBydOxNyfTDEvAemLfz5-NouWZlUTGBgoLJYPxeqgcvL2k2w5HGgcmDAohdgfNMtvKIxssxiz4sNJkdEjFdOBrf2JekqU21GJVNQaLCj4gzOt3MxuV0e4uuLcRREDTtax5_ppwxLzdgLa9ixkHJrYqJPi3BZ1kN9YxVcFE5JL4cgRk-R7PSFaLQ49RF2K8; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 29-Jan-2026 18:21:31 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 31-Jan-2018 18:21:31 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454350890981891; path=/; expires=Wed, 24-Jan-46 18:21:30 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 50ef1a08ebcfd
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D715304790; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/01/2016 7:29 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 01 Feb 2016 18:29:41 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=ibakgAaXDDZrTWmtBIyhPFwtUp7blc1LhwtTH1F7sWc_UnK3ZSs0hIFIqaaHByEmPdoAXNgHqoFR63TOEgXGpoJoM1hJ03i50jPBGgv4zc0Ejb_8yy_qrKxM3v4rseqJn76cw7_i3u7MGgq-rvkjDY87HRrom-4HQipy2NVazQSMm6MZzietrlfhsPoa64zTDLrsfp_qfJ8Xbg9cMMpVdtREA5rSWLm-065ZMLOgKWEqaLywxnA6ULgSUvjlcRaW8daGVot9wk-IrBjaXHYfc5b4hFrmqV55E41VSJVN6r7cpiPpkkSp1uP6OT57gngRU0F879rtjOmis3fCnW00EhaEv8c_zV8aPRbosbDDoOKXsBPw9R3wlLc_Zs1CoDmhgTN7OH3UCLs6oemkKnOsFQJBdcbJFpJ9vfctkhnIjtwLRi38yJ2PvdeLAgW; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 29-Jan-2026 18:29:42 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 31-Jan-2018 18:29:42 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454351381960362; path=/; expires=Wed, 24-Jan-46 18:29:41 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 721ae297e5c40
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D363114326; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/01/2016 7:43 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 01 Feb 2016 18:43:03 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=SE55EJQrYO3eX7eKvgYOBEf1la3ShteJKXIB0qSVuSN--H0fQhJfakhK9LyuGk94juGN-EzHgNElwUyCQrA0q4QsVvfXQ6kxlz6L_1s-gHcdGlvGiwzQ1TQzA644Joha7raXTCI9X_XRToYO-JsW3TofJffnTgxhu5YzJbmxtRfCKo1lZl-ZlluBS50f0BATeKJ7WTFAyADVlVz0xZxr5VJgRzvj57A3S6RaDCnFwte7GLIUXb-8uiK34vKts6t1IUEbxHDDoK8joDbDK2Kb84vb_o8MYCGGkVFowt2xiBrXP2Z4I2kTfAo_o6XYkbuPh7WWzmC47wdH4Rou5BquboKBjZgg2eusxGAJhNwDy4eC33Nm_bLkWBKuqKjJCLlyrmyPH52qRBmxWQkroth_RxutGQk_aJtvbRi6nM76b2xQmj9YJ47Y7jCgFQm; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 29-Jan-2026 18:43:03 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 31-Jan-2018 18:43:03 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454352183583231; path=/; expires=Wed, 24-Jan-46 18:43:03 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 1e415d0c89cb7
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D933736278; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/01/2016 8:32 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 01 Feb 2016 19:32:48 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=URBCWtibsfTS_2-IIs8RbTqzVwtn13FrdTziEBgGxEBmsU9m9NT4sGFxpMrXxPK_fDW_1P6Tp6M4B3Cl31xfsg0_c-wcfh_EN24e1PY_ptSuOMjCz8cTtcdYWl--4XuT1TXhNVTrufAvl_oK37abBKUVEsCMV40yrSdvRj6Ae6eEQ0zVX-St7hDGj8iRErQFMZWicPQ-FQh61WacCY-3jTJ3pv8ibfMnt3mjMptrdc1dycRixwDAuo9FThxC0MxsdcMD0uP5smpxSKD1FI9zXRy2xo_mdMPg0wEQ7dYI_sTjSKzuKbUuqaoQDvBGgXRSRBk-5WX9YsH8zi4XAmnssnPcrcrrUV0eGhqu5aONkLdd2Z7kq8yN1-E6XurW9Gccb1bOOe-bVRf4XJN4tgZb94ih7C8QBoEaV0tSSG0sH0dQI2zW-5ADqfZGHcG; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 29-Jan-2026 19:32:49 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 31-Jan-2018 19:32:49 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454355168922556; path=/; expires=Wed, 24-Jan-46 19:32:48 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 63f83998dd4d9
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3769806678; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/02/2016 5:29 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Tue, 02 Feb 2016 16:29:25 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=Arm-Uf_8kEY9aY6iI-5yTXYnzXut9mi6b6ZzQEQTrLZMj021CxDyFl_orqslHAfsQoXlrFvSD-dkP6hm43gFOxMg-aEkP8SpuKfUj9C3mXgyQsBE7TRIFLhc1bJKAjK8_bK0KQsXjn2PPdT_MASNQoogXVsnti9KN1phMzLeFzNzTZDAE8DupZAWA9vFq1cwgFcF5q6vC-iQAHLUSn50nhzUt9yQFeLb-cwFGM9rn0P9SPdIsmnjbWOGt4NTEuqJQU6QnxCxWB5_ndrdObkkhpV_Jlwlv5q5O9a3N2HiPiIqhfBUkFw4nRxfoPl4hK7FMxAKeA-oMGU40DQe2OLyjSOJYhnPJN2BHu4z1RzW2s5KQ0-Mt9L_ejFb4FumaZI946LpRN1R_5VvMA09Nj4SJVHdiwRkbkR7OlPAercWY_k0-7k4YSYJ3ZF6Hm8; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Fri, 30-Jan-2026 16:29:25 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Thu, 01-Feb-2018 16:29:25 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454430565566286; path=/; expires=Thu, 25-Jan-46 16:29:25 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: ee2417ba8680b
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1708765270; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/03/2016 12:23 AM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Tue, 02 Feb 2016 23:23:17 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=hi11lQdos5dJcU0hVPLnA86M7yHjFafCpZC5XVSAJRiKs58-4jMnroef23Po_x76RVOizzbB13pjSBg0b_Mx3JGzmuv8BxL0SUBnMeZch_5whajTeBv6LwXaWsYDSwbbgS3_tsJUnRC2oBR9br9EsiJM3gE0j7vCIfQWkPUyes1c8OCXsUhvODMaeALbbZOHHQyTppirfg_JNu2VUsqZ6pOePTWodBeKnFkVs9UIQvmoFtRYUNB5-z-JuasoBgdnpIRBoRkLVkTqgxI1o6QcuXjXc2N3veOdeyuJQ2mKp_DmF60MjH54wMdSylzWEfsXUaW9qgTr4vJd0agpLBzDWRgSJryOOVgS2PA8NSm3nhhMklOFAZsDa8QmYIvD0PzGXrJz_lTvgwAyGVcU-ereAZoLkB8tyZOn3rZDHFLkyg7JUeRpvbuwevMoFm8; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Fri, 30-Jan-2026 23:23:17 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Thu, 01-Feb-2018 23:23:17 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454455397613160; path=/; expires=Thu, 25-Jan-46 23:23:17 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 5ac4d83990c07
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1698345302; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/03/2016 12:25 AM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=320427401, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|Pkpoints, payment_date=15:24:33 2 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AFcWxV21C7fd0v3bYYYRCpSSRl31AgyW0j7dLbLAB5bgoLVa6SdVa24X, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=2, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Tue, 02 Feb 2016 23:25:55 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=2JTpS0gIjfnrA6mUxsHKIVNWO05oUbWdM_n1D9tVzNV_nhxPXvqmxKTJWrjxDSOGEzH8helWb6z9DJb0aRWFhXPYPj7jXrfrkSbpgguER7jK-rWthe4ZbtWmBf20zTFJ4hBsSWPhFNa95BrE_g0goVWO_vY8w9b5IYSeH_VRZDSQhNW2p5i-in-8jm_gW4KyOTcNXJcdDYqxKlYQ6zZyZrJusE1ffg0AXSiNRKdkTTMcPQY22bqoZacG2j-7HoIwcgXMx45PmxTcBZqckHL_aHHC2i5ZtrhlJaN5veAQQqHIFnkDK8oYSpSuKDsRij_6sXNe_SFovrkbwGwY8n3XxiWjeOJfqxGx7qeHDuxNnsB8c03whp-gKANMplYPGpymcIZJ7BIlpBMxdquHbTQ39Ux3sz132J0iT0apO4eOTQAeQePHeVLrDKv1Hq8; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Fri, 30-Jan-2026 23:25:55 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Thu, 01-Feb-2018 23:25:55 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454455555614403; path=/; expires=Thu, 25-Jan-46 23:25:55 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 60fb56ce91fd7
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D54243670; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/03/2016 12:26 AM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=268658467, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|Pkpoints, payment_date=15:25:53 2 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AAN90xhoXe5TQ9YSSeGmrVY2.yF2Aa1tLjyloaCeQQlBimdxzZnqKaio, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=2, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Tue, 02 Feb 2016 23:26:35 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=dLscM4q2TYHHENybeb07GoIMG2Jz2IKFMnCz5QPbF3Qnv7qswQTPrhxjYr8QInmSQxMPa-1uXMCyKKdV_S-Vg5RTS2r_CD_BEFkt1Bo3FGNuV5TVcwMX3LS01gZ0l8E-R7ndqNjl-4YetC0mHKRVfLpygb8BvvfMCO_f0r3gzaukzqmuAQ6Knb5NIgzcJjyJAfiub8YRhWB5pCS8K77NDJCtLvnyZiNyG0kkUvkVDvOHrM2QI9GFiDsiGb80ECW2jatSBsfL_uOPs-g-oGjm2Z_xZxTKttJKr7YWL9yUILcYfhjNnYlYTzLPV9F28KT3SzZrA4v01TrYTg-1fVlw3RFFB6u8PQHE9DYuaTFiEweFWGt9QkPmL412AeLO99hRmxXEj22_IdWUuVQJ4Tl3gh-VrxCdyRQ49pAPZNmTXpHOfyZ8WvRLIqmRNfa; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Fri, 30-Jan-2026 23:26:36 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Thu, 01-Feb-2018 23:26:36 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454455596015775; path=/; expires=Thu, 25-Jan-46 23:26:36 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 1a3e612ae8c5c
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D725332310; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/04/2016 8:10 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Thu, 04 Feb 2016 19:10:45 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=oMGDH8j7ue7M7EktL-1llgZ0RIw0NtzQ6Kg7HLNYtDtG109D53l7ioEsJS9L_sGCC3k6yznm5vU7eawF1TrUI9t8Zr2qXwaAE5C-wxeM9NHlvAYm5WlJeLfFvDuN_gVF47y4HKqcg9Y5VPrZDnnkuH28RPdWYM6ViMdHg2ndf6utEP8zx13QminltE0akWoeeL768M9PQHmA10T5oty7sVMyvd1NlzpWe0P_-fpAUlPNLbIog_T-4nNFeFYFG6mX8bxItKGqTRCBGQmQoIPh1zKuo6Mzfa3Z5OxW19gTnot4yUMA4XO_ChyxWR5NlrYqaHHGR7dIeXynXOfvdl5FcP26cp7CUn4cRFV8FoyI7sqA6yEBXteWDTZoQKpMF5WdsT5yNvV0Hr8kbjBVIt9IMaHKRiaVommTzZkxwzpkRIQ_LzMs_SI8xpeNLQa; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sun, 01-Feb-2026 19:10:45 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sat, 03-Feb-2018 19:10:45 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454613045139825; path=/; expires=Sat, 27-Jan-46 19:10:45 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 7295bc611ddfd
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D899855190; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/04/2016 8:13 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Thu, 04 Feb 2016 19:13:35 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=hXFD9e7smgOqZVBnjV420CxjK9Ew5cW2OJnjB9uD4g_75VKaWFwLu9l6Tg3ge9UVfdQ9ysdjR6EVwO3sLawmi1mCyTy0I4NSDoiFINlA3L3A9wip5E4yJqLZ0eqCAw-MKm8p42d7qYRFsS4HZmmcfudYo6LGuWW02-7gnaamukg1oscufM3-AfPffgVQrHJczGTveitxiHilVJ7g9BZ429nBfLzYneQO7WOBDtgezlVTiNAByhFB_nMSUKjexVlP_-XtX2pddwNeWihL8ES3EAcF7YilUhtY_O9RAyyqnkxmsEy88F_UI8vvi6kY72e6KPWvzQhQxbgiKQIQIjj2_gCGTuJLK-RuhvjVp_YmgZHsr92gdETdkqTOTCuYcI5QVDePjxZDZWAxZeUXYvoZ_sW-bxe7hp8tveVQciqUBD9AdFWNOTk8qUs6vnW; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sun, 01-Feb-2026 19:13:35 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sat, 03-Feb-2018 19:13:35 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454613215419653; path=/; expires=Sat, 27-Jan-46 19:13:35 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 2074f98a61a0a
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3751981910; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/04/2016 8:26 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Thu, 04 Feb 2016 19:26:47 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=WwWJNyAQm2r9sEz2IRbkwtyQyHGLmfFQYKJLJTRc8mZ90m8_d4Rir_t5_Fk0lhbQGO-Nu0QgopUOnoOt_Jof5YnNQ5GnAwnPzAF5hxkoc6QE55HsBGTrnX3-MKwbX8bQLl6m-0OzJXDTc59aTBd3DBOxl8xITW-eIRTfsjfEI7TKdahL-_HCVlBkKuoBlnpAeSNXO1cwa3oIDIcuDy3QYcUsrs7NXZIOlirbx2Rnh2oG0P3FO9n9vM2O7RFBVGmSWLY7rvq75Z5mYksgjQZ8ZxtQl4Zw4gLRNj2TL4ZuaNGsJXe-mEQt7tC3BVBdc2KdEl5jTCNs7NuYN1OEZ1CBrZDf4R_D3wo0p2UW5sBa_Uz5U2NHtblKq-OMUZIPqE7CkiclQk2WoslBy44HIKOk0PNbQhKtHVn8Tpc9230L5elOqgXCauBy9vBR9l4; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sun, 01-Feb-2026 19:26:47 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sat, 03-Feb-2018 19:26:47 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454614007639079; path=/; expires=Sat, 27-Jan-46 19:26:47 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 469e4b7e9805a
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D4154831702; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/04/2016 10:56 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Thu, 04 Feb 2016 21:56:03 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=L_zJagSOimZo6V4eqPjcS21CB6N7QbsF32jc9dqC9ELxnzWhyl72g6bCcb7kwXa64zm-bBvaIJKK7F0u2yAUkyJo92SYOql19IKK8xhLKQxiMzr3fA5VV7fWFZj2VXcgRQreSLVQzIZ27xPLOxqCWEj6XEvuY7LM8uXlDVtvLpTjsMVAx8gsqDGcLOXL9TgR3n5WWkBWn0N1zpo8JbyIyLDfb0PxrytnZWD-64L_0-QTE1nFsCpjbp9tHhnrZthc9Tn91iLRk9mhvKsDGBsq75XZ4l2uPxoeMrxNRLtEAq7OzAQnLMPfDt15ZaO1auRPga1_DhKrX3MjfmxTtAl-70RRtYuoEVPZNYdRonD49DtHS9BGAP7w4VTKYktdFvIKvhYfGs5S6HxeKxhW4dbxZtFicklFx5m9JRb4ZR8j9wqarVKYkI0YmgHN3Nu; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sun, 01-Feb-2026 21:56:04 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sat, 03-Feb-2018 21:56:04 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454622963762317; path=/; expires=Sat, 27-Jan-46 21:56:03 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: ff72c288b5531
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D4090016598; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/04/2016 10:59 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=829424736, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|Coins, payment_date=13:56:28 4 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AFcWxV21C7fd0v3bYYYRCpSSRl31AnS2ZvjSBuAEf1DDjM-7ykKku2Uz, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=10, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Thu, 04 Feb 2016 21:59:05 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=VpPKzYa_X1ZfRQlP1-_75aPnh_QHMUkwAbuEDEJtFLxUgCsbidfLBUE1NAcPTXvqCqUacPSLgzZSHcuXzLxfUELoNWAF1vCIwETVo2YFeKQX3_dM3NW6RbLeUtAgTmJ2v9ufb678cBkYxozRgh1NClXsl6RL-YIEemU8cY6mFhpM4cfZYGe83iU5emTQ8yCmBY9Hio2cfjDMIXgxgHaI-Kg1sVgXfgCeily_5stDLGE_H0WA3_AzzeMjee9rm72-fTPUknRinoaeA7KOx9x-AcCbRIE7E_ZJ9C06vqpC1aZqfiajyO2rzTk9nKfwZI0mc48bbhNnthV4db_EIgNLamVP2dvRpvILfo-9-Fc0zJJGb0nv_Ih8OBvrL6k5GfZxq2hMrm49XnMTa5FE86CNX0r2vUOv_tk_mCFWhkkaAHoB-9EpgqZFW5rL7gq; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sun, 01-Feb-2026 21:59:05 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sat, 03-Feb-2018 21:59:05 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454623145290575; path=/; expires=Sat, 27-Jan-46 21:59:05 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 4548794642658
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D2848568150; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/04/2016 11:01 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=194947951, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|Karma, payment_date=13:59:03 4 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AFcWxV21C7fd0v3bYYYRCpSSRl31A2rkQNr0AIWJ5XKTdRyIi93WA-7z, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=3, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Thu, 04 Feb 2016 22:01:20 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=vCHSMUlo4x-Ot7Yxc87E4MFQCGtEjjiHRvN2ks-uTzBInE9AkAgsZIkQuTg2qh7EPqLkKGBh2Vi4_aqOQn6iKiNgLwUa30XBpCG2FRRvjzv3uZbVawLnSc1M3cuqT-ud7t0ELbjRQ0rQBtLV5PsWDLsX3wrS6IrfK-eflgcI9L25CMT0bA2sm8LFmGBH5bgniiL7zBtGHDNj3PzAGtYIOi8nwhx1BiHATj4Ll-zdqdyQTGVwm7OH7yRNAYICiSfN2dHEh1WYmV1u0RXsrG5X6lYjCWqHkSQue8IgLfDL3k9RVaU4Fl3eAWr1GWQNRWAQGmsQstV0QGAGG7ClKUWXguGwdfhwVdr0Uck65GAJWLXTCRYAiin8gkpsI1fcQld40cVe9v1tdqnGncSFcFIT0znFBOmQCvKgWy8x5hP-VATzoNV8R9KMGMdqTz8; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sun, 01-Feb-2026 22:01:21 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sat, 03-Feb-2018 22:01:21 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454623281179601; path=/; expires=Sat, 27-Jan-46 22:01:21 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 6bd47c9b2704a
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D835367766; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/04/2016 11:09 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=194947951, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|Pkpoints, payment_date=13:59:03 4 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=A7zRrlLhQ0Zu6qIHXswa0nA3Ej9pAcClsC8f.8iYTVi3Cw31g4LJUSk2, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=2, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Thu, 04 Feb 2016 22:09:11 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=BkiR8pX8ntmS5J63snTCUOPjOmtllf0iw4E5qhjWU3Pefam9P6ZSkkwDbP-tmNSqw3K7FLsqJEUBESvSyDNw6ETDsA0nmesgLZKtk-GsAnm7XSEpT29dGziKenGZU3nGstamyl_7RGNiFC36i-aPY0eQyUYfoZD1vEXajuqyJBsoj7vklmZ3oItgg3_0GIoJKmGSRWwmn0JPrlYDsR34A4woFfVo-9Cmn4J2zSA3kJ4ewEvhxUvOqfLPAe0UkaT2tdyNtO912VCLv-llcqJ1wFHRDBELmtpjlfKupy1-3Q_epadlpQTjtIvpJVEthQcES5WrIJZULZkCELZCtbChy7I2YzDrplhtsF8EqtMDjCC2COwetP4guNorbchMXQVAQIvvsw1jr0xSrYq3K2c8ktmioX1gAIsLfyN77fxEHar7Mwr5FXI04cC2poG; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sun, 01-Feb-2026 22:09:12 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sat, 03-Feb-2018 22:09:12 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454623751774330; path=/; expires=Sat, 27-Jan-46 22:09:11 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: de7caf93b9016
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D130855766; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/04/2016 11:10 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Thu, 04 Feb 2016 22:10:01 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=ARaphMbKINc460u_Cyyj0XXyvQ19Zd9WNh5CYFxQ00XM2zJ5mbLZlvoEosHOpLhUbYaow6KXGHdCseMkd-oQFpWWj1yosf89MQmH5d5Iy6VW7C2Xlrq1bop76MxsCrorJeiLp29H8ZRV2ZVB0pj8rQBcJuXCkLhr5r5QbcVxVAvhnNJ5ClVTtzfG1NOR4eHGVGO8ew3kTjKHzZu6Vkol-9DmBM92KBQBDJH--hMA0BvOCLvbUdJukkfhsxZYhVKEtNUBBm4g5JA1IBtul_AHGGUW7vjGfFA5dpcT8BIJoGdUskyfDubHXEMQawCniEA4TbPpk2LCxLFwblkG1wYB7g0RDstPfHYNmUB0yqfLqJDIgMVi1Y_wmVtR8pFACJObHElBghdv-Ib1GoDtMgZ5Y9fjTupU1WGpW5Cjp66EnxiLqNrznAhzqX3xhae; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sun, 01-Feb-2026 22:10:01 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sat, 03-Feb-2018 22:10:01 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454623801515902; path=/; expires=Sat, 27-Jan-46 22:10:01 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 950e3f1a79c29
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D969716566; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/04/2016 11:11 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=644771249, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|Pkpoints, payment_date=14:09:10 4 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AanTrjl5yJ7AanZHIRIgh9Y1KrGiApvTnOPqAvpJ9UfTIochB7zbLFCv, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=2, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Thu, 04 Feb 2016 22:11:17 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=Nk6FAcjSPRrZRfmxgo9wOYfF2-4JAggcb3QWSoX6hYpZ9sGafPZaxrfnep1EeAv3QMtApVEcXw8ZoYmTX_imBjNGs1UIrX3OF2DG3egu8nfSXNhVakvMw6MkHBRgX8bxO33Fb7gma-IHXXJrUsP7lQ_XYzKKI6_WPLhWfbobWFZs0QSDzAL-afmmq1iMBi7kCQ9awJ3lC0TjsrHEpvpF0nAATxIZjvpKuTFYl13w6omxynB2Cc6JCOWsP2pJB1LYsymTHGjgH7c1NB0OiZ3g5Qa6mc3A5Y7B7_odKTJh4OHXDS9o4wC_GfNQygajodgRInVlQGDn-WDDj9eVjxKZk7KrZ7mnJl9tzr4QJUvXl0keJ2FQUzkwUvLPAwe-MMuc-kvPDhpmhiEOr6es0_G67xX9G2Oa9t9fKFmpco_wMr-uECRAHI9h1Mhrxbi; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sun, 01-Feb-2026 22:11:17 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sat, 03-Feb-2018 22:11:17 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454623877204279; path=/; expires=Sat, 27-Jan-46 22:11:17 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 2bcebd7c2ceb2
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D2244784982; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/05/2016 7:14 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Fri, 05 Feb 2016 18:14:10 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=mZiOjyoURD4q5JeRWJI0HgCWiJU0mMdms7JR6Pem8Qsn4Uz42WteXhwjROxw9Ap7gQG-657jKtphFbROMepiZJG_XpF3tsylc87YjRMOssvz_2OTiCw1f6KkbXRYlefFPXWG28WAVs8Hx4xZUS6YkozBVXgG7_aWvUCb-Bk2WWLE38ITli4ghDcHCzmyViPqVBcB97BF0LLSLpTg6s23lNKudr1wmCrytJY5jjChUIJQ6LFzNX0iHxrnnzzvjMNqlQCeAJarvLO7A8uEfG-hJifwjzZfESjuDZqzZiPumIvwcU-k3jcIVI6-VvBvKpgmk3DtxsCbLHyJU8jSG8R_s4p0yPIs01lnsAiCrMbz9OaOX5rqg7Lvhj4ACHlTLy8I0pxmm8OP3464oxtyKkLGTOJDEwznCTyuY6J9w2mUr8PyJL5ZiYOUc2nHG1K; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Mon, 02-Feb-2026 18:14:10 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sun, 04-Feb-2018 18:14:10 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454696050148526; path=/; expires=Sun, 28-Jan-46 18:14:10 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: bfab18f81fb90
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1927722070; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/07/2016 3:41 AM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 07 Feb 2016 02:41:36 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=DYvLyvhKrswWQnPlsxONROG9CUKG4msMTEp-tF0I_e7RldH8CKsPBjH7UYlaZ_XTLmPAr0tyyzxo1iXJ0NYBbb0Ld6PTmS9eO4vUDmlDaiSll29iO1Xq3r784_QLQSzv4HvSdk-tf0w_SIKrK86tiTgo9CKXFh74dt9_5ieEK2l576XsTeBxvHNvak1X1MTWEbczxQnItEyTg0fygEHrrfDaSAhamatVxQbDwlBQZ0bUeTeY1PThbkoZswBuwuDxeNab51xxcee9PHIsAawMVXHLkqZOZ3EaaU4beZq9XiY3dl7vvGn1Em-kRMA61R7aClahi81ZdWJE2VJr4eXJnADFzdasphP95Iv4fkASCg9NgaC6lcHjSFTunGeUG6CFqJOSsChbrCJSzmSdJNuYIUIy23GgINapMNGPbVRqHJuOuohEafiHptwYco8; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 04-Feb-2026 02:41:36 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 06-Feb-2018 02:41:36 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454812896357955; path=/; expires=Tue, 30-Jan-46 02:41:36 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 9d7fb1f1534c7
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3769546326; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/07/2016 7:01 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 07 Feb 2016 18:01:42 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=y1BtSPzpvtEl3ftyCkgWajYMnOfJhr2npKUIH8vXeSt-hCn4rLSsVDRAWgAS2GApClRwlyQGmmIaRB4V5RaFLYET2GZaXTb5Ug-NTO1JXpbVLG5xhyu3g-glBxmUl2mTEivjlm2oTrJQHci-3YAaVzqhV_7PY1R3B3wJM1jdJPtrnUjw-nKDAZd73RBuijvvB26-C6aE4tS6SZQBGhX25j-PIX-sIOB3J8gQfrX_6D2YquP1voeDXa6QYGdKib9CtYh-WD8CdxIYz6Ae5Tivaqt81wonX6949x8xjhKewWjoLsfVGyFgv3W0ww0M-SEbDMx_rvd08wJ1XAxRt8QlCjQC5vO1jFCr7LdtC1oOylCgS0f7ilTsjY5nxbPKuv27FWW-f5rs9jYDRgjzMsIzPT8rFM-vDB4i-Aro3QOk7aymjFutX-JsZed-EUS; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 04-Feb-2026 18:01:42 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 06-Feb-2018 18:01:42 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454868102222748; path=/; expires=Tue, 30-Jan-46 18:01:42 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 73159b5d324f9
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D2256975702; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/08/2016 12:14 AM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sun, 07 Feb 2016 23:14:40 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=xb3k5Bo2OLEqoi2_5vsGEj7iSv3XfDUU8Hn4TFWKqOJkRcLSTH5exDSWXmcLJtA6tjTt_5NEVY2VWWldTsFC8oesOSVLG73vjjWwXIjnUJui32VnN8j3qXKSzTyRAvTn6mmiAY8lSTg-nU1aZ-2rKikTm3E_NdbqTHiCsA0TsVI7zjJN2E2qzZR4o2KYFJXBtKMUNTPPhju-DRht74QWLwHhSTZ0YpkkwPmwf-F86OWv2auj4Ql5I2CbsqVYea26097wLtQlVOuxcsYJqLoJBQP22ItjN5790pfRBV09eHrAgPKaVAVNVC3yZCxmYWyoixWBgHPk_Aogd9G1zRRWaJIAiRpQMKQ_XKgmsP2c2vt_ykgghDrZ_ZyPFtMEOD047z2BQ8BC--qxQS1PLeHo0tETx2nJX1ErwGnsNOtVTvz4_SZu9blCvsFgtw4; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Wed, 04-Feb-2026 23:14:40 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Tue, 06-Feb-2018 23:14:40 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454886880173763; path=/; expires=Tue, 30-Jan-46 23:14:40 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: b2a4668025d34
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3771709270; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/08/2016 10:00 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Mon, 08 Feb 2016 21:00:03 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=uEwQ7pIDCxLGrUGm7ZnSc1zf3avoj7nH6fl90joTxXPi_bmMdUM6q9syD6oeqQu4_3ESElhD_i3lUK7Xxiq-Jyvhl3ei50oIp5XzWoIh2dQnzaid_DsqUzNrbIUluwNuS13jv-Y25YnYOBlT9Kg5AjcTuGIEKOsOCl0G1T7LHXvNbnPXWPwgu8YbwyI-2doB-601-_TAm7Z78HG2yA41oeqvvJIJJrsVYlnJ9wnDp-K-or4IjQxaQ6yq4oLo-sC_uZomW0Nt10Q6BRvrg8sQUxvfVJplG4JPcHtP9DHgHxS_jZHs-OU2VZoleVkhb1y7-Cknqm6tHdRMMo6LzASJ4lKFTRhrKm91q0tyHY8LKOMOG7Yl0PoNQT24aYkYyHKiOfDFs8yWA6SsNBIJDgqn1LSPW-u2m4To7a5kFq-qfqaFaSqIH-GZQDfZ_Ie; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Thu, 05-Feb-2026 21:00:03 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Wed, 07-Feb-2018 21:00:03 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1454965203660122; path=/; expires=Wed, 31-Jan-46 21:00:03 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 6121e93b9cb8d
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D3540105558; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/09/2016 5:22 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Tue, 09 Feb 2016 16:22:34 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=TyxtYFXbwO_1EXiATG0R9uRWCIntBh0I-NpscDyYybe1eVOekLsk7rv4PTOW4WAH9wJKA-IqfeTCRCfNiHC_N11B1vC1iKHWsC8Q6j1xt6L2HUUCoW8kdoHyVaaCRUXngUs0Pws95xuSjgWm35zENMtpCF5US6HuhqGzeTYt1-59dMkSDHADBEQnLemSuFvrvyWGDA5rt3bo51O8oAcjj5gFEBnVcriK5rBu13R0h13KA_Gxanf6VEyV8eivyZ71svaFDHLgkXJ5-GOf-SaW_GWVFAJPWsoy5Dr64lNgoR0HlFDVLAt_vk0UVMNUPkYisxqJaAZHMwuvTHQUeug0vD96Nu9qsdPwamZUW5pwov1Uf7UAqpIaCcKPfy2RZ7vGEaRqvucCmjRpuivoOaePg7p2TRidC5wtjLPp1IHRPqUH6E52CM_NF95SY_e; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Fri, 06-Feb-2026 16:22:35 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Thu, 08-Feb-2018 16:22:35 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455034954945656; path=/; expires=Thu, 01-Feb-46 16:22:34 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: 91db905be2d66
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1242741334; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/09/2016 6:29 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Tue, 09 Feb 2016 17:29:54 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=Hggu_dP6DJElKxci1rbcTaVS5SKhzFwy2vWMkl3z3eyEycusf6B_aqrmcUsay0QAj62Xfdhui2OVVLEcq3O_DsJj1MkHbeBeA1VDlkUIq4xQZY0n-LMEFK6k5iUM8ZwsdRmf6IFmyLswRJeffnnxzIsjwxi9DJOMCRXf9AL21jrdd5X8-yHWazaUdbRpBH6VjAWsDThbWtc7uh9RQxOHtvCHMMztmr2Z4YhWSTApxKcJ67fJmvDpW3TrW8wjBvIAvugKDL2yH3KJdd2h047O9laloAiECfgqOwXVlLsVxE-lfCWr2KEFM3rY4GISD-YJZQsb9ME_eDQaoxgI2_ZTn281QNeeXsnA6msr-crH9R5q9BBPLPgoj4GpKRcNmhAnb5aj3xc7yBD0TpcLBp27MPNnkSU0UuYk2TOdQ-HPB4183jW5O-spIuiFpg0; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Fri, 06-Feb-2026 17:29:54 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Thu, 08-Feb-2018 17:29:54 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455038994565096; path=/; expires=Thu, 01-Feb-46 17:29:54 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: 2511e30f85fc1
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D304265814; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/09/2016 6:31 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Tue, 09 Feb 2016 17:31:17 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=4skczKGbeQQIRPEzkYd0bCIw9YHZ93R6E-Z2KUubLDsbzBZ9BB7gVQrarfJpcEAsaphPA9PlUUlJkDZp5jvtkNjVwp3iP3g1IENIOKmyIozig-2DFO7m-x1n_umttxUiGodzrltfNnGujei5dFOL4-Nb65QZBj-xXVKEhHqrAtBDqiA_S5SGxRYKersFG7eSPFLooDOAVFvzRDKOmUY__82CbcKnHys_gvQGdEyw_Sv-2aQJy63FIzrBdVaUqsgSEsLAmQ1l62SLdadFzjdjmx8Yk26PTeJoPDhzLdh1JRwYgOdHG63SI8-p0ZZZ-8ngEnkUPTS9qNDvxuLGev_hzLQSbURYdgXoHWqgAoihtAqIW8vRjAlLskHJJMK6IiC3JzJFtpIDDdUZYy2mMBXkwABjSYRKdAqINolGIQQoLAw8uJk4sR12Fu-9XkK; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Fri, 06-Feb-2026 17:31:17 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Thu, 08-Feb-2018 17:31:17 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455039077605643; path=/; expires=Thu, 01-Feb-46 17:31:17 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: 52ff11ae8f2a2
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D1696774742; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/09/2016 11:52 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Tue, 09 Feb 2016 22:52:14 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=URv8JZf7C_ws2RK4edg0sdJaXYqSJ47BQiMgvQ3B2MzoGRpkIzaGMHVOPCRT5gVRERfwar6thadYiPcy4dinRtHz30IM8iEq7fr3R6kuirvmNlgpucVzHD5kz4fJ1tHm1kJ00NxX03d3gghcnPultg0SSTjd1wE72Bz8O545OeMcYJve5YdcabN9iMB5mjwxRQIAf42o-Jom6CklCr3zAebj-Xoe0dYHdmjPuhnAukRRp4n4GIujkN4udPmibZpjnZbsvYBuSbwYF2gPduarqyTfh_2dbh8uyQa2mUwOBVpUqXvKx7f1ZSHuUThHfUFlOKkYRzZwKXwU8Zvc97jqioF2hQFqCUbQvYEzRZsSqb5p4DMOH0TGf3fkVY_fBIZVP1mOf9KeTlE7rkpQVCaV9JGMOsN7jnSRCrUmi2YkltU3k_zzK41DQhIFB7K; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Fri, 06-Feb-2026 22:52:14 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Thu, 08-Feb-2018 22:52:14 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455058334593112; path=/; expires=Thu, 01-Feb-46 22:52:14 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: d3fe58198bf8c
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D2657991254; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/10/2016 12:49 AM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Tue, 09 Feb 2016 23:49:39 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=9Efj1YOKj0WaEtrcGjBd67tQld606w6BFKhA5H-1ss79vmHIu7bV6GCGpGJ36alpza4yBVSme2I43ICKLx8KjcbPKzeUylfDa38vN1XVjhADhwNsdj-5gFX8Tm2ST0n8iWuLF5aCvPKH33tqCH8i3qPwjH10NgSrEUUaKQ4IC2atsN3yR91y8mDDYIu5qQp5sWM4ogSvmqB8U9qoVO8JKrXQfAgsHt3b5EH6XtyU9wOuAs8x1brph4KU1wQcsniRNtCHld8ZQY7OZSPyxfqKEGQQPU3dvyZjR4_DVJfCfsUQ27_YLx11SeAcE0iglM4_6hLXrVQKKBMj_-QUnMTlDmRhoUKgSfGp4QF8KRuOVER_Q3uZq8oVWYMGbGadO2MDafshBtP1q39GtXzRlxZMTZCjaYcP8ywaNMMOC24dkeF_2KO_-oQc_km5tzC; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Fri, 06-Feb-2026 23:49:39 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Thu, 08-Feb-2018 23:49:39 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455061779467968; path=/; expires=Thu, 01-Feb-46 23:49:39 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: b7517e466e01f
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D880%26app%3Dappdispatcher%26TIME%3D326875734; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/10/2016 8:11 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Wed, 10 Feb 2016 19:11:28 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=bsqob2oT1wZ8C_1oqaRO9v-3dJ05HLnxt-yWDq9sDPkGl4a2l_UmTHDrzvwY2bsIdvtvhEW5zr8Gpg6KHZk8tmgbKjgR6RRdXOe4r1MNW1XhVkQ-J-r0la2wQuawuHgJL0cs_dZ5qw7VtBr0pJNRW0C3jdLgtCEskhtFrlUsIGxwwXNaLw-BMd_U49KyUmsYgR47nZIZHzt9PJLBff8R_HaNCW5axcDaEdWtbeSh8CvdqE5NqIRGF74JVkjd5N_szRJatmdNJdfYfa7EU3_JV7WAR2LHbhxqgApJKKD0yjdrNw5Y4SnbyXDNOLfy3TODtNZSGx-mDvmR3g0iDbxsFtH9pCzD9LSbsAmEMGMhX3ndzQbqrwh4Id-pCe4fKbg-YyaC3K7pTsyAuYZLIbj9iA_zpyn19WMtobtks3s2egoK3kufTwww41K1yiW; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sat, 07-Feb-2026 19:11:28 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Fri, 09-Feb-2018 19:11:28 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455131488496892; path=/; expires=Fri, 02-Feb-46 19:11:28 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: e3f8549753bc
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D1619770198; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/10/2016 8:30 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Wed, 10 Feb 2016 19:30:46 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=rGWitzJRalIA6qEUGFyad8aSYuu4lIsWcqt4Ik0tlz-Y8YFV4mjXV1_IDos-wPtoZXsyjNPwaSt_3MH-uz-8ZPKWamMcrZxzkxH9Bo31uNQXZjFnH2AME73pqC3CMaftV2QWUzec363_avEhM0u0kvMnLgIr10Q2tgPM9Y9hQtRPQSBrSsqdv2S6ASZHQg52RWX96K8I84AiWjqKwSPtBUSEWUMJeUrlYsQ4PauF4SFHtYuXTDWRTuHV48JCygWqUGhDOof7-Jo93HcJPWMkVZswUWnHHj6V0Xzre0Sod_uAbgqy3z0VJwmBqu3PUb0Ubpeu-PcS4z4M75SYyObm20QC3wiRbmTi3hfmF1tt_4lHz_k3Ua-mwyx5Uvft49xkKJOZgqlqCNcifDOofukaIBc34SXC1j52g8qQMZ7mO1m8EGbx58wjQi9WzCq; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sat, 07-Feb-2026 19:30:47 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Fri, 09-Feb-2018 19:30:47 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455132646965106; path=/; expires=Fri, 02-Feb-46 19:30:46 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: cbcb1d99e71fc
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D3868179286; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/10/2016 8:56 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Wed, 10 Feb 2016 19:56:54 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=zILhEEQ3-SZvD54DVvIbE3tEWIywiKAPa8Eleh5Y8BQlPQMpSp4EyIllQASy-k7DEQy6ZXXCrujwroqSKJVMO_88915tOXLiwRzas7etmTmB0tzzyKbZ49H0W4L4qQiBnMFkWcoJy_RE5O6LvOXezs-mYyFaYgfGjFfjcn6csg2cFlY96Mv1BV7VJCXTbCr1yfGmeo_G3fk_jGP4znVjO6bkERFFjeSFIsx3zAgVeNwb4d5-Fyn5vjj80tQ86YXSXF1kOFC_0j9iuaA9uCGTP4DTV57tbnSIpXDkn_3RotzQcJ6LqsRSMDq1FpNYNntW4n3iow3pdtkgtG0jqvdffNZZUvdJZggriquqo-M1-O_Z4QMd0Y6TrEALFCDHb8K2zhg6VTfm_tkV8Ou0_3NoKEZ2KMaoM0EIr3zU5KFvjBLlky2mOaGaIFrWCLy; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sat, 07-Feb-2026 19:56:54 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Fri, 09-Feb-2018 19:56:54 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455134214207873; path=/; expires=Fri, 02-Feb-46 19:56:54 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: 4676b96d2e673
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D110541654; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/10/2016 9:35 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Wed, 10 Feb 2016 20:35:54 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=XBHXVhsT64qlQbnKZFHL5IPE4VSSHYnDCqSY2APHd_seBikkB-a7Gbd2xgpavqBcnOUnHalHBzhQuCJDG3VnN4Xbguik9td7K2uBMt_j3urkdjzQWp1g4x71kw2JjefxFIfyQtD9gbRi5feHjd4IKdU40pbeI5SQkfvrOUu7Zp7HPS8LOAlOokwkuX8s8UwKhqrMNM6DXEIu_nn4h68lSiTs4nr5Vue2F6jJrqw9UQYEWuDX3hs8Vw62NV0lCvPmG8hVOvzzqPS8SyMyzUFJ9K7EyVWfLY5d-GxL7luaExFMDV9-cZgIoQ29nWlZWffipDgpTwdXxwSYvRoNnpjoeaLfDz-JNe4r2pGsFhZFfhNL4DU9z6gI_JPlp5d_rA9H5gERbishuaEiXUHHvx-ObsEgCf8o7Ef1AuPEvSaxwFPtDq4LAS3Munfb6be; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sat, 07-Feb-2026 20:35:55 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Fri, 09-Feb-2018 20:35:55 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455136554955071; path=/; expires=Fri, 02-Feb-46 20:35:54 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: db871688e4e55
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D715111254; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/10/2016 11:43 PM] - SUCCESS!
IPN POST Vars from Paypal:
transaction_subject=dasoldier|Coins, txn_type=web_accept, payment_date=14:42:53 Feb 10, 2016 PST, last_name=buyer, residence_country=NL, pending_reason=multi_currency, item_name=Donation, payment_gross=, mc_currency=EUR, business=lineage2vision-facilitator@gmail.com, payment_type=instant, protection_eligibility=Ineligible, verify_sign=AiPC9BjkCyDFQXbSkoZcgqH3hpacAjy4aRNyVE1MXFOn-nE7yM1guqmQ, payer_status=verified, test_ipn=1, tax=0.00, payer_email=lineage2vision-buyer@gmail.com, txn_id=98M2554353449673P, quantity=0, receiver_email=lineage2vision-facilitator@gmail.com, first_name=test, payer_id=9ZHACZHV8LXDW, receiver_id=KT553JBK9WQMN, item_number=, payment_status=Pending, mc_gross=1.00, custom=dasoldier|Coins, charset=windows-1252, notify_version=3.8, ipn_track_id=1b32c74dd8c8d, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Wed, 10 Feb 2016 22:43:03 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=132sMptEFXsaN6Dj8YGA6xgoHKH3mdfi0xEpsG1YTrAHWHgFAfaBN2TOejsjpUfKcoXe5d50_XIH5HkIowvTKTOiTm8iuODJcI4gqrK4NICgKrB9irCCMGG8GnVb07kL3nRaD71eOrUryAFFnEd-5FDxLNaJSn4DIX64b_z94N0IfeClmG0LEmgUvKpZBZ-eKVS6DWX3aPAEf4C5pxKDgHFRUZ6YmKIsgnqbqJFXj2mz5Cu9PwuW3Mss57_HZkW5ZeegHWKwGHiJYpOAZVwg7KbGAxDr9rLuf4CJFc2nkfkQmDC7LPZmFkrnFEeZGDHCPLtU2Q5b5Sjw1skeY5Qgje8RPn08wfAs8XtoZiseVIrHdHD4hAemj--NIL2EHY8JfpSfBHUpOyGWWpD3ARe4FcB2JgW_OHGE44ZJrwfRa6_Rjz6zmam9T4gdDh0; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sat, 07-Feb-2026 22:43:04 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Fri, 09-Feb-2018 22:43:04 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455144183812019; path=/; expires=Fri, 02-Feb-46 22:43:03 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: 476cc063c22ee
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D4156341078; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/10/2016 11:46 PM] - SUCCESS!
IPN POST Vars from Paypal:
transaction_subject=dasoldier|Coins, txn_type=web_accept, payment_date=14:46:41 Feb 10, 2016 PST, last_name=buyer, residence_country=NL, pending_reason=multi_currency, item_name=Donation, payment_gross=, mc_currency=EUR, business=lineage2vision-facilitator@gmail.com, payment_type=instant, protection_eligibility=Ineligible, verify_sign=AQU0e5vuZCvSg-XJploSa.sGUDlpACXShVWth4KXMCnN.eW9JS5aHEXY, payer_status=verified, test_ipn=1, tax=0.00, payer_email=lineage2vision-buyer@gmail.com, txn_id=7FB44852UK6606143, quantity=0, receiver_email=lineage2vision-facilitator@gmail.com, first_name=test, payer_id=9ZHACZHV8LXDW, receiver_id=KT553JBK9WQMN, item_number=, payment_status=Pending, mc_gross=5.00, custom=dasoldier|Coins, charset=windows-1252, notify_version=3.8, ipn_track_id=8d418330b9e71, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Wed, 10 Feb 2016 22:46:47 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=56-7DdMb16v-va0V197zvIgKejZOtkvu05eAlXsmgGRXGQGSKagak8zdh8u1gZLIvVlm0PMH7HRmOOMbmI68zQr1Cpwcu19yOxSFcQ_Qp6daHqzQ-C163XfcQC7WarIawtTWePrmBbUzbpuRphxIvVwv4g9Y3EcEj9W6MEtN9xc_AXzDMCdcqavPF_zLCP1B1F4TjOMcOR5-x2FzsBjQuE_Oz8lHJ3uCH5TzkE5t0cib1Bgj06vjFniiuqYxmEMQu2zmY2baPn5Hr5R3tO6dcjSO-H6DwZzBzUxptqCMqE3M9EJLLdOWo7X8ahubvYQtAyKxRR9vfW2W-5Uh9ZSI1B6njuoGtcBenWEfRtbA_xTIKigZIjj_h1W9kWC-aos21jFIZAH527hmvoDOHOOhUvIbzSTTS7mEYo9rPsbsRaO1ES-vRB9IXn95wJO; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sat, 07-Feb-2026 22:46:47 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Fri, 09-Feb-2018 22:46:47 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455144407542378; path=/; expires=Fri, 02-Feb-46 22:46:47 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: a4e6d5a67f4bc
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D3619535702; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/11/2016 5:34 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Thu, 11 Feb 2016 16:34:09 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=_HKsTeyJDSu3zT0RARHCKQNTnBTfrMkEesMXvl17ZCw6jWLIJrA81xH3MZiRj2LQCxFEM4EhWco_S7Hs2MQJWV5QxOL-Dy1m3C6k1vCXG9x0yCKw15t8-41JAFOBuRp5WFsYEigbmxYpziHUtys_zqFLjO55_2creQlMYRikLp-TiaE_onznc9RsOdmfZDqFg4JyY62Vq5X_nuHMUc-Sp2jeCvUbb4GiiRjH6_kBP2JqM0nU8aw1JWSqwJQS5XUZEO0mch7_VoUncFV1gCzz1jua4ZjocbhV2c0MPlATQPrPtXN-bOja7-QnhLoqzBlIbJBoL6tSU__yl1a8p2d9aOqj4ZgnHS6XFofcJwhZlCwwsuXVvFbnjXkYNA4G0DfcyfizusQt_YeW8ajeMfKY4MCUIdvGHs8vki4_o_siN0u20ubkHqb5ezPqTFK; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sun, 08-Feb-2026 16:34:09 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sat, 10-Feb-2018 16:34:09 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455208449469710; path=/; expires=Sat, 03-Feb-46 16:34:09 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: 4678881b6e1f3
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D28884054; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/11/2016 6:37 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Thu, 11 Feb 2016 17:37:10 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=bqFFFqwpU5wT3XvTkddDOA99OIFtLrLBSdl4SnXxdO7AOtk5FY1Miax_mgs8qodUp9L_IZC3-GoY2l3j2dePXz3wSY20Q3ZKKBJ8y3SttYx1SZz2wwhIi5g_I_iS_FM5KBKvW-bLnmJ3BM1ZH4bQs4tgJNTONkR9obNjdoeObuagcrTATrRsz1bPqMAjhPBRvr-BlED1-uFhnebNk_5Bb6d3kdLZuDXQtPNYk0jiwNF3LWNsSlKn8XhtK-O4GbJaFfDWxypaP9dVC3sjnQyay0TlcSF8HZ7nOiWEnnyPwMPf6dVG5H5KK7ziPwi-8ynTO4TGQjXZBC9NCZesFEJpInbozdB9CUmni6oNmGpm_l9rYjcgGIzvUUoraNQ-r813whRBSvqrBZuLnmv_poVFkei_oXEK1CWu_jZJHqZixN9EANiXGcpuLYLjpSG; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sun, 08-Feb-2026 17:37:11 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sat, 10-Feb-2018 17:37:11 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455212230746541; path=/; expires=Sat, 03-Feb-46 17:37:10 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: 1460c82fb21b2
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D3334913110; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/11/2016 6:49 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, shipping=3.04, payer_id=TESTBUYERID01, first_name=John, mc_fee=0.44, txn_id=302784178, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|Coins, payment_date=09:40:52 11 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AiPC9BjkCyDFQXbSkoZcgqH3hpacAGz5NSRX9zlgrA0MR8noT58SSl2f, address_country=United States, address_status=confirmed, payment_status=Completed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=10, mc_gross1=9.34, address_state=CA, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Thu, 11 Feb 2016 17:49:42 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=xIHl8jTmILZzpI-ZjZDc1ZHl0E2_6zIh7tRXMG_iQVKVQwshTd7Jm9W-hA9a3IY9qmSZENywM9dgjTy0LeamzlShz8iaMW-mmx9z0kBApZKs-ek2CybEDOhcVc8csyIQqrDsGgvAlbvYRpxiGFXyvDijxR_2wJs5gUXAP9JgmGfOi81_aEnQcWuYyZH8AAVWWGx-GNRxe-s26Lx7lOEdic3auCZiXsCKfDdYpsKfKRsj1vRBZyzRK8Zrzcby5MQn1x_9--f_zxomT-_E7UGeGFtAbYanxUvhKRtzz6rmdvuolI5PxlRONun-3LAESojyJb1q6PZTWTieqOtd9oJpodWL1DcMfIwRxNuE0bR_c8D0saNf7mUyOxMIvkPJPcR_dD687sHvA6PlKC-xosdOuYD8AxxuuB9JBuI_stzy8v0VfYHlUdExZpdZYK0; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Sun, 08-Feb-2026 17:49:42 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sat, 10-Feb-2018 17:49:42 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455212982228338; path=/; expires=Sat, 03-Feb-46 17:49:42 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: 666b24443359e
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D3066674262; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/12/2016 7:17 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Fri, 12 Feb 2016 18:17:44 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=NvM7qtCxXtQ_ZGI91Ncj3KaWNYox-UnOw48tP_vOOkaNq20MfapEZCyKypcW-Wxly4Ff8OQSwiND-BCJiPIptdNIc99Bd5GGlRp3ew6ItusWLaWfhHpi5L4QSOZe_su-DYGbq9a4aYIJHcdDYZjOZLFSlJPkSSDO25D5bZ1h_B51FeFLFHqdE20yu7dw3OkoraeosY7Mf0LhD9OXf_FDncBx3TU7W8N5d-b_oGUnyL94x4QtlrWXoNhf4zt_2u9MZkERRVKepFfDCr72pW8X102tXvmSn7hEFOup7k8yTEHgQHE2Pyb33vbBCmkL0RjVt5QLbJ6yt-oJkJiSVMfvL8b0_CxfW_HL_5a2veyk-jk5eqkX9RaGuNy8vAH6hO3G-5TOCe20KcLVaf7Ct8peuD7SWHD5qw-I5_mXj8wkKXz-e1Rx7P_ytC472im; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Mon, 09-Feb-2026 18:17:45 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sun, 11-Feb-2018 18:17:45 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455301064875712; path=/; expires=Sun, 04-Feb-46 18:17:44 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: 7634881dd1136
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D3357654614; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/12/2016 7:57 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Fri, 12 Feb 2016 18:57:29 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=L2UerkAJ3nCMajLtcFwDHunSHGRdCbRraCCYP_z-e_uRdMV3lDITkPZmE1FikY7-6vHaerbOBYF2mAgwn7P-7cuZHUacqzI82tooEF5oqzmjqpGjWWQxOrdlR_CYnuZ9ITi1li4Y0SrsgQGN87edKFpdMvOocsclb0pfXPT5SeloP8QCPJI9GV8-tZJwVvrlc4pvU9mr6v4olce91wPiZ7nWAgVwjpnLaQ2AyilDVYy4z-VjalIwm8BBLOh_tzMq0d6lpFpRIJoMrPh-CD6rvmVIc1qNhaqRDR_EvmerxmqiAKXb1VYgvLLvcFW6GB-Vjstpe1Qu8rWkcBoXv_Hme-9Ci8RvnQOMwG219WGt6xLn1KQuB-W0l5rcjCoJqojAlv0bPKsKeFZHEjBcGDzud8rXBTX-1GNvRnhTEVvTCfLA7mgVghxH-aLFERq; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Mon, 09-Feb-2026 18:57:29 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sun, 11-Feb-2018 18:57:29 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455303449052890; path=/; expires=Sun, 04-Feb-46 18:57:29 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: c47b162b813b
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D422297174; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/13/2016 12:19 AM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Fri, 12 Feb 2016 23:19:27 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=L0Aqu-F2fBjzcxJ8PzDzmQ1-BiAJBf2LV57LKkMUQ0c8tARWu07qqEpTJSkazxVY0MOHPOx_tYQyzHQcEjNPlNGrKkAo1NjwEf0GRTIKkYNyTVWkenrInvRFf30A2OU5LgWZA8BpUDz0hd10gXV3sxBsOa1w-ztn7x7wVpuy6l5mM9durXAWDBNTIqwhajM1UEkpbgwaI7IRHfv7Ue8OCjCD_gzER99zKknyB8svTQPUskkDdL7NfCXWzVSq8T0dIR9ufZvyLHxF7Kuq1NegeC3SFwxhqpzU_ohqcH1SwbZ-NS8n371Q76xmqDY3ULXm7XWbFuAGJYjrBvUOpm4S7d5WuehG5qkT_YMXGy5-xj3ajRuvxv2EWlM3dulFTmR2NVXhy_xvBhiP8ZkCi521v03lUl3EfarfU7VNIgoV_pN_ByTJ53tKtDm0zEm; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Mon, 09-Feb-2026 23:19:27 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Sun, 11-Feb-2018 23:19:27 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455319167392694; path=/; expires=Sun, 04-Feb-46 23:19:27 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
HTTP_X_PP_AZ_LOCATOR: sandbox3
Paypal-Debug-Id: 67a038c75b689
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D2137570902; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/13/2016 7:44 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sat, 13 Feb 2016 18:44:46 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=DDPIjW5GZOkXoOR2mnlvJpSwyL-YP5R3lxZ0jHM6rnAWOfYRqCoA1xBH2H75Bxv-v23kBehZ7_DtZiBxFJrzUyItku4s1DgP2Y4IDKZhHOV3fdDo6lyx1OhQoMH8LoPrtN-HhotrddQj6nhdnIV5n2vwVjuzX41ZL8xtpxzn_MJEZXrBLJggrz7fcxJG7_zEMTuPqiWOdcVXIxM4Sfp9j3p904DtyuJGbbXB1ATsZ0-RWICQioYj6XBopcVs6VywJEnoVjPKCiaVXF2S53vKwN_3AoyG1w0Q68v5G_4ZNSDrqqzNrJvQsw_QQJlHTAJbt7tYLWJxW9qdd6T27WX3C1G6e7CmLglBGndYH82cSDwKjVmoMaX9G8XV2leEMThHxb-KtsoHef7AdI0it5xa0lOOQhIeAgFG6Vj104TQwTsQUOQP-f4sLq3N72q; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Tue, 10-Feb-2026 18:44:46 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Mon, 12-Feb-2018 18:44:46 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455389086305123; path=/; expires=Mon, 05-Feb-46 18:44:46 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 2a62046f45ea7
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D2658778966; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/13/2016 7:45 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sat, 13 Feb 2016 18:44:55 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=a0ERvgtiJz5OFdYw4QQJAVLvDKH4xniMJGIqgI_8ePK9qJuSD0_MdA1wLiC7XzSW7H6KqhjjSou6Y7NHnmdbyH91CA85uQD9v8i0TxfkVBFy2UQ2n1VqAo-UV5ij2-HjSLg9G7nssfWMm9BjkN5x00pLGHHP5g_re-ygZKlX06RW5T36w8ZLR77jixT-U05Dsq_c8kXG-Zx7Cbd52nmFN3X-Buwnjj6wwwOFQTmhIUkJygG8Dnng66WHktAef9SaQrWUzfsS9QgGSxMuBOVv2BZnpxbPS5MKFPdnwovE1AT0n3Xy4unNTUm_T6RzuG48tlXFHpDNn8B2whEQx3cm9OTyZnMI6O5PGmWV5M_7tYGE6uhV4E7TMj-TzqWkzl1tWX6IskNrXPeiI4VxCxtJggTxi1CGWv0VMJQwDs9ZcoFYTARpBd7nFlKRFcm; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Tue, 10-Feb-2026 18:44:56 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Mon, 12-Feb-2018 18:44:56 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455389095823991; path=/; expires=Mon, 05-Feb-46 18:44:55 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: a3b68fc4c515e
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D2809773910; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/13/2016 7:49 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, shipping=3.04, payer_id=TESTBUYERID01, first_name=John, mc_fee=0.44, txn_id=477155096, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|Shirt|Enchitems, payment_date=10:47:34 13 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AD5oYQzmj9wgfknuGlyUqHHJIsL6ANC5sCEIqDCh9xrPB9YhYmHqgLQW, address_country=United States, address_status=confirmed, payment_status=Completed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=10, mc_gross1=9.34, address_state=CA, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sat, 13 Feb 2016 18:49:22 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=S_BD8Cmv6pzOwpfr025OaZj8X4bEBA-pau4eOoOv1TreAfxJHSWe9J17j-itUvFWwcDcgc0F7B3GazmfabnH-3mqfMTg6LEj8_B7qEfGnBFM1rfAPMq9SQD_QDY5ywmhQ08Vn4z1p9FPOUnLJTIDtaEBjciMAeHU76OjE9b_hVdpv-5L4J6rhrpdM4u6q4-LPYwUh2IRrOxJhLeTJ8UGP-FbklthKqFQV78f3WWIUj54A1t9xf0_LykkKcYR_R7d9nIv3qTcc1Y6PRnlaQHE4lBT3WvphYiFn8CKk8njBXkrRqxNCq8kZZfAWq1P_9IJB95zrVg41y7zhroCGz9FRi_hftlYbtitfNAduOI7cvRdQi59-K2mflcI4biIEySc5p6sbNrN9AdbY-rDa8TGSJxCJFctAT8SkFtcgKgKRsYHLIPO44xMse5t5sm; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Tue, 10-Feb-2026 18:49:23 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Mon, 12-Feb-2018 18:49:23 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455389362894536; path=/; expires=Mon, 05-Feb-46 18:49:22 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: af2c86abd62ea
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D2994388822; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/13/2016 8:06 PM] - FAIL: IPN Validation Failed.
IPN POST Vars from Paypal:

IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sat, 13 Feb 2016 19:06:03 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=hW3ZKPu8tobYgBHfRpJU-fGCAayX_eS-CGa8TafPSbVcNv-BY6kw1o5GD4gbjEzNV4q4-DK78UmRjMR_3jRIzmLLYcwIVG2HXbbcrllKIVprNReGSPbGuMOEp1gatodl-unQtSRKlF4dDUp5ixAdNAHe0PcGEFrl3feYnIsSKrl2dQ3Q3cBElAVpkW6drt6eYfPzhmskveXksR0S1iENEd1QbcyRkc0XiAl_yND3kZJhgKMgz6ROOAKl_c6gdR3pRTIb-AnbQQ-TRQTgVtagksGzleYF_WlW4iXtb7_h5KRJAQuKmVFYm4maJKE6FnC94m0zFo8i87_0qI3noLppNlg9HcSR2klUAvB83pVT47j9zdaPea7dO682R87XLoBPkVbc47yWVpLhm4aaL8OlLSUk1chVMevNoaD-4zViHddX3YNqFmigaE7fHQe; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Tue, 10-Feb-2026 19:06:03 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Mon, 12-Feb-2018 19:06:03 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455390363401372; path=/; expires=Mon, 05-Feb-46 19:06:03 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 7416356e5dd71
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D2608774998; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

7
INVALID
0

</td></tr><tr><td>

[02/13/2016 8:06 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, first_name=John, payer_id=TESTBUYERID01, shipping=3.04, mc_fee=0.44, txn_id=761794256, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|Enchitems|Shirt, payment_date=11:05:47 13 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AFcWxV21C7fd0v3bYYYRCpSSRl31AJEfSsUQe2UZup7APTtXH0Vh9syg, address_country=United States, payment_status=Completed, address_status=confirmed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=10, address_state=CA, mc_gross1=9.34, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sat, 13 Feb 2016 19:06:18 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=9D1pRROtC6_cK9nJc4a3fEHM0F6xtZVthztqgYjZTC-cLznfitR0CQOMBOElmt-cmmqNa9L8TAoUq9y-8ifJaZFjwNDNlAdqs1T4ZJdflwRLo4YMGid0AoYHBpP4homTuIiy5GtKGIQgdLdy2k-eJPXBL4vNJupUmXrZ_6QEQjezHaUN3jV-VfX16oVby_ztGFyauEQsu7zMczlncL4iBVZppO_Wj-Y_79c4-x4gJujnudAfZ0W7d-w-q-9KR4plTu_-XNfN-_ZP6alq6UW52d0uh78l8hcA6rIoEhcOg8VJWo3q6IIDIDyliiIOtt3gExoTV4hykRNFzHO-1bMpBZOPZT9f4ZJ-mDMGOffdwxUoGlhDLeYAsgv7O-dDzvkNyodGUA94tBJ82Z4Mi0KgCZCv15xFDuOZu_ZNn7FyXrfn8anDHUewN5KYOHe; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Tue, 10-Feb-2026 19:06:19 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Mon, 12-Feb-2018 19:06:19 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455390378883134; path=/; expires=Mon, 05-Feb-46 19:06:18 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: e5b19d5ed1f4f
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D2860433238; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

[02/13/2016 8:09 PM] - SUCCESS!
IPN POST Vars from Paypal:
residence_country=US, invoice=abc1234, address_city=San Jose, shipping=3.04, payer_id=TESTBUYERID01, first_name=John, mc_fee=0.44, txn_id=157432666, receiver_email=seller@paypalsandbox.com, quantity=1, custom=dasoldier|Enchitems|Helmet, payment_date=11:06:17 13 Feb 2016 PST, address_country_code=US, address_zip=95131, tax=2.02, item_name=something, address_name=John Smith, last_name=Smith, receiver_id=seller@paypalsandbox.com, item_number=AK-1234, verify_sign=AfU3MTH5ffDUxCZPgMvwTQfSyZkcALeLtjpPbNdRtbyX4kpRguByO77r, address_country=United States, address_status=confirmed, payment_status=Completed, business=seller@paypalsandbox.com, payer_email=buyer@paypalsandbox.com, notify_version=2.1, txn_type=web_accept, test_ipn=1, payer_status=verified, mc_currency=USD, mc_gross=15, mc_gross1=9.34, address_state=CA, payment_type=instant, address_street=123, any street, 
IPN Response from Paypal Server:
 HTTP/1.1 200 OK
Date: Sat, 13 Feb 2016 19:08:56 GMT
Server: Apache
X-Frame-Options: SAMEORIGIN
Set-Cookie: c9MWDuvPtT9GIMyPc3jwol1VSlO=gqSz-vmfDtVeIgjy9QfvuXDCugDC9uf_tDhoHLq_ab-mGW0pWnBuG_wCwFl13qqZBXfHeZqHOOQ1Jrh4vLJ3g00Z48Dzj6sHpyJ-z0VTvCDOOttChvkdLxRRn4Fm1UooGtjoRNPC00nbxla-DRcXw5br1Zg_BFo4KGVnrlytIQpdViQh5G0hkbBaqcpKaywNVr3ikvvAWrMaxgrQV72jREna4L8w-_SR4iaWR41RY_jBgTtzcqJz1vfSghBiQx3NdiSsqdHH9_Gk2Ag7RZ0my-uZhxuwNhi-URqy4Xkb168FYkRYblnd9vLKm3UI1A6K0W_Cy9pBaoFrCpH7t0Zt3b0tsX4bpLM88TSJ6p1mH37QZ30rG3BKmOBU3rDplC_h5GOyyTlBoJI5Ya8ojRKNO-fS0nUJeUZM0zj7eZ_quRirEB1pS5Jwr6iOFc8; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: cookie_check=yes; expires=Tue, 10-Feb-2026 19:08:56 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navcmd=_notify-validate; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: navlns=0.0; expires=Mon, 12-Feb-2018 19:08:56 GMT; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: Apache=10.72.108.11.1455390536496267; path=/; expires=Mon, 05-Feb-46 19:08:56 GMT
Vary: Accept-Encoding,User-Agent
Connection: close
Paypal-Debug-Id: 96e537d274d3a
Set-Cookie: X-PP-SILOVER=name%3DSANDBOX3.WEB.1%26silo_version%3D1880%26app%3Dappdispatcher%26TIME%3D1216331606; domain=.paypal.com; path=/; Secure; HttpOnly
Set-Cookie: X-PP-SILOVER=; Expires=Thu, 01 Jan 1970 00:00:01 GMT
Strict-Transport-Security: max-age=14400
Transfer-Encoding: chunked
Content-Type: text/html; charset=UTF-8

8
VERIFIED
0

</td></tr><tr><td>

