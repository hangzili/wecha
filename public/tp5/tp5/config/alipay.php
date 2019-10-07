<?php
return array (	
		//应用ID,您的APPID。
		'app_id' => "2016101100657044",
		'se'=>'2088102179009700',

		//商户私钥
		'merchant_private_key' => "MIIEowIBAAKCAQEAmKwJZDaNYE2EkI9Va+NEbeHeywrrYFSWjXPi+OK9Y15At8rOWOHWO+fcz6MNOezIeFMjnjig64m8ny8912H2YSdUHy23WOEhYiMMAwbgl+QSzDnTeJXW6iicL1Ct/mKXw/MVijxvgmqpwHDEMlu2G2Aw0B8hBsXUj3LfxyIG7N0kJ0t4TY0Xak7Di8qSVmMM/FZg2jZomKl4wi0G7YweGZpda674C/2+g7zofDZlryiBWb5gbuJLoPQu61D2QjL1wTXielwJHPHV4F6DF277A5davfaT45TxbaSxkHWH9Xj1wZ00ES9JMxMvkr/6iDC1Tl655rzErX7F8rJCIBaCywIDAQABAoIBAFpZdTVZE1Fqjoj+Sg8O7/AXO0HttF3NsUsEyc2AYZPss2ARJQx0mdPZ41L9q1YcSobqrKl12cWKPZX23yIXVzcnjyDkbRysHpV1KCaia0d4MaeqkPtLsWPhpIxbspxYvHe544VrPpJvjQXVtkYXAC4zPq/rvB/F84Tw9n1iJbcGPeDVWSjqGaocqF72oo9YnpVwXVwmxFgEczuPWjfaWuCLMIOpXX2wpYlxo4eod/BWFBFCcUB2mx1dOLSOXzIgU/cT5rOiMFazr/ULCD0rbwQM1ugjHdLgoM0fnzzhB1HlHZtzMTfgRfy6T1t6NYwg5IXJGh7ycIfmj/lIU5o89AECgYEAxezR7JET8y/aP/1uictsMUTBh8tT5rKFMLMr6iNFUwbCiAmCLPg5seTcyK4RtWDe93dXeLjrGzJIYoh140dT/9U8VoA5zv0gh2R88xCUgasF1KKfLeDNGcuECwrjrxlLkgFLG/10hlpMNDH5DlSllwytd8j2okrGnrdQTc4rDrUCgYEAxXgGQj4kNq6wzRcGsKKnIs5Lbhj/BN02X0r5XWBRpzMesPSXc8vbeTouZtHduJdG+ZJpbFanKmLkrrKmj5jeE1aW69JdjdCVRpxxNf4QQUUp2PpuK8emINYVy+5VaP/KpaYEtBiu8mQuZojYjYhOY0gmfJJI/T+BFAMJlDKMu38CgYBYF4SDhzra5TR9gJ3fRKP99b0xZGUOa+xt9YEZL+OeBYc1pw3CWCTNsbA2vYryMJBskjhjaeJyc1nWSSg3JTsUxeKaGW4hW3ZL7ITUZk/CuszYjBzO/Zwr2/IEPC+Ecny5GkxEw/VGCxCZtphEMZaV+TWH9/EV4LQwViSuzJFLdQKBgQCYS+5/zo99gROoyZaGSpwe8v4oBq1Aoh/aNOfIBY5UJtAH6EyaqWI2yBGbiUa4pCvANhSK0vYQcb8voWdmnp7ASWsSq+cthe5rTCLgYndE78PLrbGkoFFXR+X9p25GEenIAhfkkpjzJyLGP8rMtZDHb5EHSId0kjLKLWGI48e4nwKBgB5U+sTMagCFXQOHTf1YC0B3jUYt17DveQbzl2onSy6zbQbXFHpil4Sw2vw3eJpxDMdcmFOJZaptN3tbb/et6grBIopv/USbeF95gB0IHnnyKFZ7NmSsTIp2+xI1LMwAj+FPIHLkdCnMCTL+zjIzrOsBRazI/6xzKtJdNyP0japd",
		
		//异步通知地址
		'notify_url' => "http://47.94.20.198/order/notifypay",
		
		//同步跳转
		'return_url' => "http://47.94.20.198/order/returnpay",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA1aXkUyG2md1x0GWQaUFvew1lJpJDS2QbycZzZStjgkIE0VGfBrhYCoQ/o6EnRCHWDe4x7M6xkpFjrV0EYE5nX3dXpPuCl05MWipHBBZWIMNcIrwM5uk8HmD3WR/gEZQaCzEm5p8vLVedheMXLOAWQwKhB4H3selII7unMO9Wl0eT4Vm0TUVhBNBDkn9Y1rjniTm3NbvR1TXpvYrqYw2sFoEVQWwkGSdizlnXZEP+l749jxEbXXD2mTGqImVWNkCzKi3/Ts1iiFwERuULnMoU2cTpwgBmR4rMGTVb54pr609fkdQ0SoVIJuQKWCTwg5gwqIH43/iIPYxKQFuJn9d2lQIDAQAB",
);