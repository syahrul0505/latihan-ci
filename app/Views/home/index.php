<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Halo Kawan.. Yuk kita belajar web programming..!!!<br>
 Nilai 1 = <?= $nilai1; ?>
 Nilai 2 = <?= $nilai2; ?>
 ini hasil dari pemodelan dengan methode penjumlahan yaitu <?=
$nilai1 . " + " . $nilai2 . " = " . $hasil; ?>
<marquee behavior="" direction="">EZ</marquee>
</body>
</html>

{
	"info": {
		"_postman_id": "ca3a7641-0b9c-4e72-93cf-1d538fee8bce",
		"name": "[Sandbox] QRIS MPM Inbound Copy",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
		"_exporter_id": "2694357",
		"_collection_link": "https://restless-meadow-685989.postman.co/workspace/BRIAP~b4ee5dc9-7a6f-487d-b9fa-48eb7d8300e9/collection/2694357-ca3a7641-0b9c-4e72-93cf-1d538fee8bce?action=share&source=collection_link&creator=2694357"
	},
	"item": [
		{
			"name": "MPM-Inbound Sandbox Copy",
			"item": [
				{
					"name": "Generate QR MPM Dinamis",
					"event": [
						{
							"listen": "prerequest",
							"script": {
								"exec": [
									"function getPath(url) {\r",
									"    var pathRegex = /.+?\\:\\/\\/.+?(\\/.+?)(?:#|\\?|$)/;\r",
									"    var result = url.match(pathRegex);\r",
									"    return result && result.length > 1 ? result[1] : ''; \r",
									"}\r",
									" \r",
									"function getQueryString(url) {\r",
									"    var arrSplit = url.split('?');\r",
									"    return arrSplit.length > 1 ? url.substring(url.indexOf('?')+1) : ''; \r",
									"}\r",
									" \r",
									"function getAuthHeader(httpMethod, requestUrl, requestBody) {\r",
									"    var requestPath = getPath(requestUrl);\r",
									"    if (httpMethod == 'GET' || !requestBody) {\r",
									"        requestBody = ''; \r",
									"    } else {\r",
									"        requestBody = requestBody;\r",
									"    }\r",
									"    \r",
									"    Date.prototype.toIsoString = function() {\r",
									"        var tzo = -this.getTimezoneOffset(),\r",
									"            dif = tzo >= 0 ? '+' : '-',\r",
									"            pad = function(num) {\r",
									"                var norm = Math.floor(Math.abs(num));\r",
									"                return (norm < 10 ? '0' : '') + norm;\r",
									"            };\r",
									"        return this.getFullYear() +\r",
									"            '-' + pad(this.getMonth() + 1) +\r",
									"            '-' + pad(this.getDate()) +\r",
									"            'T' + pad(this.getHours()) +\r",
									"            ':' + pad(this.getMinutes()) +\r",
									"            ':' + pad(this.getSeconds()) + \r",
									"            dif + pad(tzo / 60) +\r",
									"            ':' + pad(tzo % 60);\r",
									"    }\r",
									"\r",
									"    var dt = new Date();\r",
									"    var timestamp = dt.toIsoString();\r",
									"    postman.setEnvironmentVariable('timestamp', timestamp);\r",
									"\r",
									"    console.log(JSON.stringify(JSON.parse(requestBody), null, 0));\r",
									"\r",
									"    var hash = CryptoJS.SHA256(JSON.stringify(JSON.parse(requestBody), null, 0));\r",
									"\r",
									"    payload = httpMethod + \":\" + requestPath + \":\" + pm.environment.get('token') + \":\" \r",
									"        + hash.toString(CryptoJS.enc.Hex) + \":\" + timestamp;\r",
									"\r",
									"    postman.setEnvironmentVariable('signature_payload', payload);\r",
									"    \r",
									"    var hmacSignature = CryptoJS.HmacSHA512(payload, pm.environment.get('client_secret'));\r",
									"    return hmacSignature;\r",
									"}\r",
									"\r",
									"postman.setEnvironmentVariable('signature', getAuthHeader(request['method'], request['url'], request['data']));\r",
									"\r",
									"function generateRandomIntegerInRange(min, max) {\r",
									"    return Math.floor(Math.random() * (max - min + 1)) + min;\r",
									"}\r",
									"\r",
									"let value5 = generateRandomIntegerInRange(10000000000, 99999999999);\r",
									"postman.setEnvironmentVariable('external-id', value5);"
								],
								"type": "text/javascript"
							}
						}
					],
					"request": {
						"auth": {
							"type": "oauth2",
							"oauth2": [
								{
									"key": "addTokenTo",
									"value": "header",
									"type": "string"
								}
							]
						},
						"method": "POST",
						"header": [
							{
								"key": "X-TIMESTAMP",
								"value": "{{timestamp}}",
								"type": "text"
							},
							{
								"key": "X-SIGNATURE",
								"value": "{{signature}}",
								"type": "text"
							},
							{
								"key": "ORIGIN",
								"value": "www.hostname.com",
								"type": "text"
							},
							{
								"key": "X-PARTNER-ID",
								"value": "456001",
								"type": "text"
							},
							{
								"key": "X-EXTERNAL-ID",
								"value": "{{idempotency}}",
								"type": "text"
							},
							{
								"key": "X-IP-ADDRESS",
								"value": " 172.24.281.24",
								"type": "text"
							},
							{
								"key": "X-DEVICE-ID",
								"value": " 09864ADCASA",
								"type": "text"
							},
							{
								"key": "X-LATITUDE",
								"value": " -6.108841",
								"type": "text"
							},
							{
								"key": "X-LONGITUDE",
								"value": " 106.7782137",
								"type": "text"
							},
							{
								"key": "CHANNEL-ID",
								"value": " 95221",
								"type": "text"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\n    \"partnerReferenceNo\": \"1234567890133\",\n    \"amount\": {\n        \"value\": \"123456.00\",\n        \"currency\": \"IDR\"\n    },\n    \"feeAmount\": {\n        \"value\": \"123456.00\",\n        \"currency\": \"IDR\"\n    },\n    \"merchantId\": \"000001000001178\",\n    \"terminalId\": \"10080032\"\n}",
							"options": {
								"raw": {
									"language": "json"
								}
							}
						},
						"url": {
							"raw": "https://sandbox.partner.api.bri.co.id/v1.0/qr-dynamic-mpm/qr-mpm-generate-qr",
							"protocol": "https",
							"host": [
								"sandbox",
								"partner",
								"api",
								"bri",
								"co",
								"id"
							],
							"path": [
								"v1.0",
								"qr-dynamic-mpm",
								"qr-mpm-generate-qr"
							]
						}
					},
					"response": [
						{
							"name": "Generate QR MPM Dinamis",
							"originalRequest": {
								"method": "POST",
								"header": [
									{
										"key": "X-TIMESTAMP",
										"value": "{{timestamp}}",
										"type": "text"
									},
									{
										"key": "X-SIGNATURE",
										"value": "{{signature}}",
										"type": "text"
									},
									{
										"key": "ORIGIN",
										"value": "www.hostname.com",
										"type": "text"
									},
									{
										"key": "X-PARTNER-ID",
										"value": "456001",
										"type": "text"
									},
									{
										"key": "X-EXTERNAL-ID",
										"value": "{{idempotency}}",
										"type": "text"
									},
									{
										"key": "X-IP-ADDRESS",
										"value": " 172.24.281.24",
										"type": "text"
									},
									{
										"key": "X-DEVICE-ID",
										"value": " 09864ADCASA",
										"type": "text"
									},
									{
										"key": "X-LATITUDE",
										"value": " -6.108841",
										"type": "text"
									},
									{
										"key": "X-LONGITUDE",
										"value": " 106.7782137",
										"type": "text"
									},
									{
										"key": "CHANNEL-ID",
										"value": " 95221",
										"type": "text"
									}
								],
								"body": {
									"mode": "raw",
									"raw": "{\n    \"partnerReferenceNo\": \"1234567890133\",\n    \"amount\": {\n        \"value\": \"123456.00\",\n        \"currency\": \"IDR\"\n    },\n    \"feeAmount\": {\n        \"value\": \"123456.00\",\n        \"currency\": \"IDR\"\n    },\n    \"merchantId\": \"000001000001178\",\n    \"terminalId\": \"10080032\"\n}",
									"options": {
										"raw": {
											"language": "json"
										}
									}
								},
								"url": {
									"raw": "https://sandbox.partner.api.bri.co.id/v1.0/qr-dynamic-mpm/qr-mpm-generate-qr",
									"protocol": "https",
									"host": [
										"sandbox",
										"partner",
										"api",
										"bri",
										"co",
										"id"
									],
									"path": [
										"v1.0",
										"qr-dynamic-mpm",
										"qr-mpm-generate-qr"
									]
								}
							},
							"status": "OK",
							"code": 200,
							"_postman_previewlanguage": "json",
							"header": [
								{
									"key": "Date",
									"value": "Tue, 10 May 2022 18:34:18 GMT"
								},
								{
									"key": "Content-Type",
									"value": "application/json; charset=utf-8"
								},
								{
									"key": "Content-Length",
									"value": "361"
								},
								{
									"key": "Connection",
									"value": "keep-alive"
								},
								{
									"key": "X-Bri-Reqid",
									"value": "b3631c55-061b-4090-bf7b-ea4e8a87a888"
								},
								{
									"key": "BRI-Signature",
									"value": "TfJVI7ygnH+YtjRAyHDt+ZoaYlECD4Qym+B3ozM5ZNo="
								},
								{
									"key": "BRI-Timestamp",
									"value": "2022-05-10T18:34:18.495Z"
								},
								{
									"key": "Strict-Transport-Security",
									"value": "31536000"
								}
							],
							"cookie": [],
							"body": "{\n    \"responseCode\": \"2004700\",\n    \"responseMessage\": \"Successful\",\n    \"partnerReferenceNo\": \"1234567890133\",\n    \"qrContent\": \"00020101021226650013ID.CO.BRI.WWW011893600002011010355402150000010000011780303UME520448125303360540612345655020256061234565802ID5916NEW SERIES PHONE6009PEKANBARU6105281136222011889013392449320397363043EA2\",\n    \"additionalInfo\": {\n        \"referenceNo\": \"924493203973\"\n    }\n}"
						}
					]
				},
				{
					"name": "Query Payment QR MPM Dinamis",
					"event": [
						{
							"listen": "prerequest",
							"script": {
								"exec": [
									"function getPath(url) {\r",
									"    var pathRegex = /.+?\\:\\/\\/.+?(\\/.+?)(?:#|\\?|$)/;\r",
									"    var result = url.match(pathRegex);\r",
									"    return result && result.length > 1 ? result[1] : ''; \r",
									"}\r",
									" \r",
									"function getQueryString(url) {\r",
									"    var arrSplit = url.split('?');\r",
									"    return arrSplit.length > 1 ? url.substring(url.indexOf('?')+1) : ''; \r",
									"}\r",
									" \r",
									"function getAuthHeader(httpMethod, requestUrl, requestBody) {\r",
									"    var requestPath = getPath(requestUrl);\r",
									"    if (httpMethod == 'GET' || !requestBody) {\r",
									"        requestBody = ''; \r",
									"    } else {\r",
									"        requestBody = requestBody;\r",
									"    }\r",
									"    \r",
									"    Date.prototype.toIsoString = function() {\r",
									"        var tzo = -this.getTimezoneOffset(),\r",
									"            dif = tzo >= 0 ? '+' : '-',\r",
									"            pad = function(num) {\r",
									"                var norm = Math.floor(Math.abs(num));\r",
									"                return (norm < 10 ? '0' : '') + norm;\r",
									"            };\r",
									"        return this.getFullYear() +\r",
									"            '-' + pad(this.getMonth() + 1) +\r",
									"            '-' + pad(this.getDate()) +\r",
									"            'T' + pad(this.getHours()) +\r",
									"            ':' + pad(this.getMinutes()) +\r",
									"            ':' + pad(this.getSeconds()) + \r",
									"            dif + pad(tzo / 60) +\r",
									"            ':' + pad(tzo % 60);\r",
									"    }\r",
									"\r",
									"    var dt = new Date();\r",
									"    var timestamp = dt.toIsoString();\r",
									"    postman.setEnvironmentVariable('timestamp', timestamp);\r",
									"\r",
									"    console.log(JSON.stringify(JSON.parse(requestBody), null, 0));\r",
									"\r",
									"    var hash = CryptoJS.SHA256(JSON.stringify(JSON.parse(requestBody), null, 0));\r",
									"\r",
									"    payload = httpMethod + \":\" + requestPath + \":\" + pm.environment.get('token') + \":\" \r",
									"        + hash.toString(CryptoJS.enc.Hex) + \":\" + timestamp;\r",
									"\r",
									"    postman.setEnvironmentVariable('signature_payload', payload);\r",
									"    \r",
									"    var hmacSignature = CryptoJS.HmacSHA512(payload, pm.environment.get('client_secret'));\r",
									"    return hmacSignature;\r",
									"}\r",
									"\r",
									"postman.setEnvironmentVariable('signature', getAuthHeader(request['method'], request['url'], request['data']));\r",
									"\r",
									"function generateRandomIntegerInRange(min, max) {\r",
									"    return Math.floor(Math.random() * (max - min + 1)) + min;\r",
									"}\r",
									"\r",
									"let value5 = generateRandomIntegerInRange(10000000000, 99999999999);\r",
									"postman.setEnvironmentVariable('external-id', value5);"
								],
								"type": "text/javascript"
							}
						}
					],
					"request": {
						"auth": {
							"type": "oauth2",
							"oauth2": [
								{
									"key": "tokenType",
									"value": "",
									"type": "string"
								},
								{
									"key": "accessToken",
									"value": "{{token}}",
									"type": "string"
								},
								{
									"key": "addTokenTo",
									"value": "header",
									"type": "string"
								}
							]
						},
						"method": "POST",
						"header": [
							{
								"key": "X-TIMESTAMP",
								"value": "{{timestamp}}",
								"type": "text"
							},
							{
								"key": "X-SIGNATURE",
								"value": "{{signature}}",
								"type": "text"
							},
							{
								"key": "ORIGIN",
								"value": "www.hostname.com",
								"type": "text"
							},
							{
								"key": "X-PARTNER-ID",
								"value": "456001",
								"type": "text"
							},
							{
								"key": "X-EXTERNAL-ID",
								"value": "{{idempotency}}",
								"type": "text"
							},
							{
								"key": "X-IP-ADDRESS",
								"value": " 172.24.281.24",
								"type": "text"
							},
							{
								"key": "X-DEVICE-ID",
								"value": " 09864ADCASA",
								"type": "text"
							},
							{
								"key": "X-LATITUDE",
								"value": " -6.108841",
								"type": "text"
							},
							{
								"key": "X-LONGITUDE",
								"value": " 106.7782137",
								"type": "text"
							},
							{
								"key": "CHANNEL-ID",
								"value": " 95221",
								"type": "text"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\n    \"originalReferenceNo\": \"1234567890200\",\n    \"serviceCode\": \"17\",\n    \"additionalInfo\": {\n        \"terminalId\": \"10080032\"\n    }\n}",
							"options": {
								"raw": {
									"language": "json"
								}
							}
						},
						"url": {
							"raw": "https://sandbox.partner.api.bri.co.id/v1.0/qr-dynamic-mpm/qr-mpm-query",
							"protocol": "https",
							"host": [
								"sandbox",
								"partner",
								"api",
								"bri",
								"co",
								"id"
							],
							"path": [
								"v1.0",
								"qr-dynamic-mpm",
								"qr-mpm-query"
							]
						}
					},
					"response": [
						{
							"name": "Query Payment QR MPM Dinamis",
							"originalRequest": {
								"method": "POST",
								"header": [
									{
										"key": "X-TIMESTAMP",
										"value": "{{timestamp}}",
										"type": "text"
									},
									{
										"key": "X-SIGNATURE",
										"value": "{{signature}}",
										"type": "text"
									},
									{
										"key": "ORIGIN",
										"value": "www.hostname.com",
										"type": "text"
									},
									{
										"key": "X-PARTNER-ID",
										"value": "456001",
										"type": "text"
									},
									{
										"key": "X-EXTERNAL-ID",
										"value": "{{idempotency}}",
										"type": "text"
									},
									{
										"key": "X-IP-ADDRESS",
										"value": " 172.24.281.24",
										"type": "text"
									},
									{
										"key": "X-DEVICE-ID",
										"value": " 09864ADCASA",
										"type": "text"
									},
									{
										"key": "X-LATITUDE",
										"value": " -6.108841",
										"type": "text"
									},
									{
										"key": "X-LONGITUDE",
										"value": " 106.7782137",
										"type": "text"
									},
									{
										"key": "CHANNEL-ID",
										"value": " 95221",
										"type": "text"
									}
								],
								"body": {
									"mode": "raw",
									"raw": "{\n        \"originalReferenceNo\":\"000008526955\",\n        \"serviceCode\":\"17\",\n        \"additionalInfo\":{\n           \"terminalId\": \"10049258\"\n        }\n}",
									"options": {
										"raw": {
											"language": "json"
										}
									}
								},
								"url": {
									"raw": "https://sandbox.partner.api.bri.co.id/v1.0/qr-dynamic-mpm/qr-mpm-query",
									"protocol": "https",
									"host": [
										"sandbox",
										"partner",
										"api",
										"bri",
										"co",
										"id"
									],
									"path": [
										"v1.0",
										"qr-dynamic-mpm",
										"qr-mpm-query"
									]
								}
							},
							"status": "OK",
							"code": 200,
							"_postman_previewlanguage": "json",
							"header": [
								{
									"key": "Date",
									"value": "Tue, 10 May 2022 18:33:35 GMT"
								},
								{
									"key": "Content-Type",
									"value": "application/json; charset=utf-8"
								},
								{
									"key": "Content-Length",
									"value": "439"
								},
								{
									"key": "Connection",
									"value": "keep-alive"
								},
								{
									"key": "X-Bri-Reqid",
									"value": "d4fc63a4-a149-4f05-b63d-2b3eb7c6295e"
								},
								{
									"key": "BRI-Signature",
									"value": "p8ngFwEPePzPEtAZ7CToy/2KdT7xUcMVeFEAlks2N4c="
								},
								{
									"key": "BRI-Timestamp",
									"value": "2022-05-10T18:33:35.220Z"
								},
								{
									"key": "Strict-Transport-Security",
									"value": "31536000"
								}
							],
							"cookie": [],
							"body": "{\n    \"responseCode\": \"2005100\",\n    \"responseMessage\": \"Successful\",\n    \"originalReferenceNo\": \"000008526955\",\n    \"serviceCode\": \"17\",\n    \"latestTransactionStatus\": \"00\",\n    \"transactionStatusDesc\": \"Successfully\",\n    \"amount\": {\n        \"value\": \"1500100\",\n        \"currency\": \"IDR\"\n    },\n    \"terminalId\": \"10049258\",\n    \"additionalInfo\": {\n        \"customerName\": \"I GEDE TONI DHARMAWAN\",\n        \"customerNumber\": \"9360015723456789\",\n        \"invoiceNumber\": \"10009121031000912103\",\n        \"issuerName\": \"Finnet 2\",\n        \"mpan\": \"9360000201102921379\"\n    }\n}"
						}
					]
				}
			]
		}
	]
}