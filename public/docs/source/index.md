---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#Accolade
<!-- START_5030ad2cf171c4751403ffca9f1bb360 -->
## Get Accolades

> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/accolade" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/accolade",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/accolade`


<!-- END_5030ad2cf171c4751403ffca9f1bb360 -->

<!-- START_8f0bd964efd69d91d492928a88f11d33 -->
## Add Accolade

> Example request:

```bash
curl -X POST "http://localhost:8000/api/accolade" \
    -H "Accept: application/json" \
    -d "name"="quas" \
        -d "years"="facere" \
        -d "description"="eos" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/accolade",
    "method": "POST",
    "data": {
        "name": "quas",
        "years": "facere",
        "description": "eos"
    },
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/accolade`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    years | string |  required  | 
    description | string |  required  | Maximum: `250`

<!-- END_8f0bd964efd69d91d492928a88f11d33 -->

<!-- START_21ccea9e94b579ab3f34c891f90bb183 -->
## Get Accolade

> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/accolade/{accolade}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/accolade/{accolade}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/accolade/{accolade}`


<!-- END_21ccea9e94b579ab3f34c891f90bb183 -->

<!-- START_6cbffcd5b1e8db822db35777dbf65646 -->
## Update Accolade

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/accolade/{accolade}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/accolade/{accolade}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/accolade/{accolade}`

`PATCH api/accolade/{accolade}`


<!-- END_6cbffcd5b1e8db822db35777dbf65646 -->

<!-- START_57cb328d8abf1ca2cfc3371c3fd2959f -->
## Delete Accolade

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/accolade/{accolade}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/accolade/{accolade}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/accolade/{accolade}`


<!-- END_57cb328d8abf1ca2cfc3371c3fd2959f -->

#Auth
<!-- START_d7b7952e7fdddc07c978c9bdaf757acf -->
## Register

> Example request:

```bash
curl -X POST "http://localhost:8000/api/register" \
    -H "Accept: application/json" \
    -d "first_name"="sint" \
        -d "last_name"="doloribus" \
        -d "email"="mustafa57@example.net" \
        -d "password"="quis" \
        -d "phone"="-660729256" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/register",
    "method": "POST",
    "data": {
        "first_name": "sint",
        "last_name": "doloribus",
        "email": "mustafa57@example.net",
        "password": "quis",
        "phone": "-660729256"
    },
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/register`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    first_name | string |  required  | Maximum: `255`
    last_name | string |  required  | Maximum: `255`
    email | email |  required  | Maximum: `50`
    password | string |  required  | Minimum: `6`
    phone | numeric |  required  | Must have an exact length of `10`

<!-- END_d7b7952e7fdddc07c978c9bdaf757acf -->

<!-- START_c3fa189a6c95ca36ad6ac4791a873d23 -->
## Login

> Example request:

```bash
curl -X POST "http://localhost:8000/api/login" \
    -H "Accept: application/json" \
    -d "email"="kendra.stanton@example.org" \
        -d "password"="voluptatem" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/login",
    "method": "POST",
    "data": {
        "email": "kendra.stanton@example.org",
        "password": "voluptatem"
    },
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/login`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | Maximum: `255`
    password | string |  required  | Minimum: `6`

<!-- END_c3fa189a6c95ca36ad6ac4791a873d23 -->

<!-- START_d909d63b7e533d9efa8e8c0d296350a0 -->
## Verify email

> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/verify" \
    -H "Accept: application/json" \
    -d "email"="walter.layne@example.com" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/verify",
    "method": "GET",
    "data": {
        "email": "walter.layne@example.com"
    },
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "status_code": 400,
    "messages": {
        "email": [
            "The email field is required."
        ]
    }
}
```

### HTTP Request
`GET api/verify`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | 

<!-- END_d909d63b7e533d9efa8e8c0d296350a0 -->

<!-- START_737ccfb685073c55ab973d56082898ff -->
## Forget Password

> Example request:

```bash
curl -X POST "http://localhost:8000/api/forget-password" \
    -H "Accept: application/json" \
    -d "email"="mitchell.althea@example.org" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/forget-password",
    "method": "POST",
    "data": {
        "email": "mitchell.althea@example.org"
    },
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/forget-password`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | Maximum: `50`

<!-- END_737ccfb685073c55ab973d56082898ff -->

<!-- START_d7e2a170f1e2a7510aacab4ac8c6396f -->
## Reset Password

> Example request:

```bash
curl -X POST "http://localhost:8000/api/set-password" \
    -H "Accept: application/json" \
    -d "email"="everett.spencer@example.org" \
        -d "password"="culpa" \
        -d "token"="enim" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/set-password",
    "method": "POST",
    "data": {
        "email": "everett.spencer@example.org",
        "password": "culpa",
        "token": "enim"
    },
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/set-password`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | email |  required  | 
    password | string |  required  | Minimum: `6`
    token | string |  required  | 

<!-- END_d7e2a170f1e2a7510aacab4ac8c6396f -->

<!-- START_2b6e5a4b188cb183c7e59558cce36cb6 -->
## Get Authenticated User

> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/user" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/user",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "status_code": 500,
    "message": "The token could not be parsed from the request",
    "trace": [
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Facade.php",
            "line": 223,
            "function": "parseToken",
            "class": "Tymon\\JWTAuth\\JWT",
            "type": "->",
            "args": []
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\app\\Api\\Controllers\\UserController.php",
            "line": 166,
            "function": "__callStatic",
            "class": "Illuminate\\Support\\Facades\\Facade",
            "type": "::",
            "args": [
                "parseToken",
                []
            ]
        },
        {
            "function": "getAuthenticatedUser",
            "class": "App\\Api\\Controllers\\UserController",
            "type": "->",
            "args": [
                {
                    "attributes": [],
                    "request": [],
                    "query": [],
                    "server": [],
                    "files": [],
                    "cookies": [],
                    "headers": []
                }
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "call_user_func_array",
            "args": [
                [
                    [],
                    "getAuthenticatedUser"
                ],
                [
                    {
                        "attributes": [],
                        "request": [],
                        "query": [],
                        "server": [],
                        "files": [],
                        "cookies": [],
                        "headers": []
                    }
                ]
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->",
            "args": [
                "getAuthenticatedUser",
                [
                    {
                        "attributes": [],
                        "request": [],
                        "query": [],
                        "server": [],
                        "files": [],
                        "cookies": [],
                        "headers": []
                    }
                ]
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 212,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->",
            "args": [
                {
                    "uri": "api\/user",
                    "methods": [
                        "GET",
                        "HEAD"
                    ],
                    "action": {
                        "middleware": [
                            "api",
                            "jwt.verify"
                        ],
                        "uses": "App\\Api\\Controllers\\UserController@getAuthenticatedUser",
                        "controller": "App\\Api\\Controllers\\UserController@getAuthenticatedUser",
                        "namespace": "App\\Api\\Controllers",
                        "prefix": "api",
                        "where": []
                    },
                    "isFallback": false,
                    "controller": [],
                    "defaults": [],
                    "wheres": [],
                    "parameters": [],
                    "parameterNames": [],
                    "computedMiddleware": null,
                    "compiled": []
                },
                [],
                "getAuthenticatedUser"
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 169,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->",
            "args": []
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 682,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->",
            "args": []
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->",
            "args": [
                {
                    "attributes": [],
                    "request": [],
                    "query": [],
                    "server": [],
                    "files": [],
                    "cookies": [],
                    "headers": []
                }
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->",
            "args": [
                {
                    "attributes": [],
                    "request": [],
                    "query": [],
                    "server": [],
                    "files": [],
                    "cookies": [],
                    "headers": []
                }
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 684,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->",
            "args": [
                []
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 659,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->",
            "args": [
                {
                    "uri": "api\/user",
                    "methods": [
                        "GET",
                        "HEAD"
                    ],
                    "action": {
                        "middleware": [
                            "api",
                            "jwt.verify"
                        ],
                        "uses": "App\\Api\\Controllers\\UserController@getAuthenticatedUser",
                        "controller": "App\\Api\\Controllers\\UserController@getAuthenticatedUser",
                        "namespace": "App\\Api\\Controllers",
                        "prefix": "api",
                        "where": []
                    },
                    "isFallback": false,
                    "controller": [],
                    "defaults": [],
                    "wheres": [],
                    "parameters": [],
                    "parameterNames": [],
                    "computedMiddleware": null,
                    "compiled": []
                },
                {
                    "attributes": [],
                    "request": [],
                    "query": [],
                    "server": [],
                    "files": [],
                    "cookies": [],
                    "headers": []
                }
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 625,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->",
            "args": [
                {
                    "attributes": [],
                    "request": [],
                    "query": [],
                    "server": [],
                    "files": [],
                    "cookies": [],
                    "headers": []
                },
                {
                    "uri": "api\/user",
                    "methods": [
                        "GET",
                        "HEAD"
                    ],
                    "action": {
                        "middleware": [
                            "api",
                            "jwt.verify"
                        ],
                        "uses": "App\\Api\\Controllers\\UserController@getAuthenticatedUser",
                        "controller": "App\\Api\\Controllers\\UserController@getAuthenticatedUser",
                        "namespace": "App\\Api\\Controllers",
                        "prefix": "api",
                        "where": []
                    },
                    "isFallback": false,
                    "controller": [],
                    "defaults": [],
                    "wheres": [],
                    "parameters": [],
                    "parameterNames": [],
                    "computedMiddleware": null,
                    "compiled": []
                }
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 614,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->",
            "args": [
                {
                    "attributes": [],
                    "request": [],
                    "query": [],
                    "server": [],
                    "files": [],
                    "cookies": [],
                    "headers": []
                }
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 176,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->",
            "args": [
                {
                    "attributes": [],
                    "request": [],
                    "query": [],
                    "server": [],
                    "files": [],
                    "cookies": [],
                    "headers": []
                }
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 30,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->",
            "args": [
                {
                    "attributes": [],
                    "request": [],
                    "query": [],
                    "server": [],
                    "files": [],
                    "cookies": [],
                    "headers": []
                }
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 104,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->",
            "args": [
                {
                    "attributes": [],
                    "request": [],
                    "query": [],
                    "server": [],
                    "files": [],
                    "cookies": [],
                    "headers": []
                }
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 151,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->",
            "args": [
                []
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 116,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->",
            "args": [
                {
                    "attributes": [],
                    "request": [],
                    "query": [],
                    "server": [],
                    "files": [],
                    "cookies": [],
                    "headers": []
                }
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Mpociot\\ApiDoc\\Generators\\LaravelGenerator.php",
            "line": 79,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->",
            "args": [
                {
                    "attributes": [],
                    "request": [],
                    "query": [],
                    "server": [],
                    "files": [],
                    "cookies": [],
                    "headers": []
                }
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Mpociot\\ApiDoc\\Generators\\AbstractGenerator.php",
            "line": 222,
            "function": "callRoute",
            "class": "Mpociot\\ApiDoc\\Generators\\LaravelGenerator",
            "type": "->",
            "args": [
                "GET",
                "api\/user",
                [],
                [],
                [],
                {
                    "CONTENT_TYPE": "application\/json",
                    "Accept": "application\/json",
                    "HTTP_HOST": "",
                    "SERVER_NAME": ""
                }
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Mpociot\\ApiDoc\\Generators\\AbstractGenerator.php",
            "line": 88,
            "function": "getRouteResponse",
            "class": "Mpociot\\ApiDoc\\Generators\\AbstractGenerator",
            "type": "->",
            "args": [
                {
                    "uri": "api\/user",
                    "methods": [
                        "GET",
                        "HEAD"
                    ],
                    "action": {
                        "middleware": [
                            "api",
                            "jwt.verify"
                        ],
                        "uses": "App\\Api\\Controllers\\UserController@getAuthenticatedUser",
                        "controller": "App\\Api\\Controllers\\UserController@getAuthenticatedUser",
                        "namespace": "App\\Api\\Controllers",
                        "prefix": "api",
                        "where": []
                    },
                    "isFallback": false,
                    "controller": [],
                    "defaults": [],
                    "wheres": [],
                    "parameters": [],
                    "parameterNames": [],
                    "computedMiddleware": null,
                    "compiled": []
                },
                [],
                {
                    "HTTP_HOST": "",
                    "SERVER_NAME": ""
                }
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Mpociot\\ApiDoc\\Commands\\GenerateDocumentation.php",
            "line": 292,
            "function": "processRoute",
            "class": "Mpociot\\ApiDoc\\Generators\\AbstractGenerator",
            "type": "->",
            "args": [
                {
                    "uri": "api\/user",
                    "methods": [
                        "GET",
                        "HEAD"
                    ],
                    "action": {
                        "middleware": [
                            "api",
                            "jwt.verify"
                        ],
                        "uses": "App\\Api\\Controllers\\UserController@getAuthenticatedUser",
                        "controller": "App\\Api\\Controllers\\UserController@getAuthenticatedUser",
                        "namespace": "App\\Api\\Controllers",
                        "prefix": "api",
                        "where": []
                    },
                    "isFallback": false,
                    "controller": [],
                    "defaults": [],
                    "wheres": [],
                    "parameters": [],
                    "parameterNames": [],
                    "computedMiddleware": null,
                    "compiled": []
                },
                [],
                [
                    "HTTP_HOST: ",
                    "SERVER_NAME: "
                ],
                true
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\mpociot\\laravel-apidoc-generator\\src\\Mpociot\\ApiDoc\\Commands\\GenerateDocumentation.php",
            "line": 95,
            "function": "processRoutes",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->",
            "args": [
                [],
                [],
                "*",
                "api\/*",
                null
            ]
        },
        {
            "function": "handle",
            "class": "Mpociot\\ApiDoc\\Commands\\GenerateDocumentation",
            "type": "->",
            "args": []
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 29,
            "function": "call_user_func_array",
            "args": [
                [
                    [],
                    "handle"
                ],
                []
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 87,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::",
            "args": []
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 31,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::",
            "args": [
                {
                    "contextual": {
                        "Symfony\\Component\\VarDumper\\Server\\DumpServer": {
                            "$host": "tcp:\/\/127.0.0.1:9912"
                        }
                    }
                },
                [
                    [],
                    "handle"
                ],
                []
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 572,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::",
            "args": [
                {
                    "contextual": {
                        "Symfony\\Component\\VarDumper\\Server\\DumpServer": {
                            "$host": "tcp:\/\/127.0.0.1:9912"
                        }
                    }
                },
                [
                    [],
                    "handle"
                ],
                [],
                null
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 183,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->",
            "args": [
                [
                    [],
                    "handle"
                ]
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->",
            "args": [
                [],
                []
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 170,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->",
            "args": [
                [],
                []
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\symfony\\console\\Application.php",
            "line": 901,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->",
            "args": [
                [],
                []
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\symfony\\console\\Application.php",
            "line": 262,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->",
            "args": [
                [],
                [],
                []
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\symfony\\console\\Application.php",
            "line": 145,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->",
            "args": [
                [],
                []
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 89,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->",
            "args": [
                [],
                []
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 122,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->",
            "args": [
                [],
                []
            ]
        },
        {
            "file": "D:\\Chetan\\projects\\agenc\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->",
            "args": [
                [],
                []
            ]
        }
    ]
}
```

### HTTP Request
`GET api/user`


<!-- END_2b6e5a4b188cb183c7e59558cce36cb6 -->

#Certificate
<!-- START_20357dac1999c588c85ffe24bc8cdd8d -->
## Get Certificates

> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/certificate" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/certificate",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/certificate`


<!-- END_20357dac1999c588c85ffe24bc8cdd8d -->

<!-- START_63fc0e87430a7e884b4feef38a9ab61a -->
## Add Certificate

> Example request:

```bash
curl -X POST "http://localhost:8000/api/certificate" \
    -H "Accept: application/json" \
    -d "name"="odit" \
        -d "years"="sit" \
        -d "description"="non" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/certificate",
    "method": "POST",
    "data": {
        "name": "odit",
        "years": "sit",
        "description": "non"
    },
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/certificate`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    years | string |  required  | 
    description | string |  required  | Maximum: `250`

<!-- END_63fc0e87430a7e884b4feef38a9ab61a -->

<!-- START_d4de594f6e18a81ef1d37b4e4c7a8fe3 -->
## Get Certificate

> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/certificate/{certificate}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/certificate/{certificate}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/certificate/{certificate}`


<!-- END_d4de594f6e18a81ef1d37b4e4c7a8fe3 -->

<!-- START_359fc0e6c033060787ded1d7676a4d05 -->
## Update Certificate

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/certificate/{certificate}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/certificate/{certificate}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/certificate/{certificate}`

`PATCH api/certificate/{certificate}`


<!-- END_359fc0e6c033060787ded1d7676a4d05 -->

<!-- START_ff42e90196178b087d14163d009b736c -->
## Delete Certificate

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/certificate/{certificate}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/certificate/{certificate}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/certificate/{certificate}`


<!-- END_ff42e90196178b087d14163d009b736c -->

#Company
<!-- START_c6a2542e6f559a7fbbee119164fba6c4 -->
## Get Companies

> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/company" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/company",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/company`


<!-- END_c6a2542e6f559a7fbbee119164fba6c4 -->

<!-- START_153d2119af6a72086ba88bc83d58b6b2 -->
## Add Company

> Example request:

```bash
curl -X POST "http://localhost:8000/api/company" \
    -H "Accept: application/json" \
    -d "name"="aut" \
        -d "website_url"="id" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/company",
    "method": "POST",
    "data": {
        "name": "aut",
        "website_url": "id"
    },
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/company`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Maximum: `50`
    website_url | string |  required  | 

<!-- END_153d2119af6a72086ba88bc83d58b6b2 -->

<!-- START_ad3856c2e686f6bdc3e894e8203049bc -->
## Get Company

> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/company/{company}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/company/{company}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/company/{company}`


<!-- END_ad3856c2e686f6bdc3e894e8203049bc -->

<!-- START_2ecc0bb9bcbb89fc130ff0e2da45de7e -->
## Update Company

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/company/{company}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/company/{company}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/company/{company}`

`PATCH api/company/{company}`


<!-- END_2ecc0bb9bcbb89fc130ff0e2da45de7e -->

<!-- START_17894c0b6f5be7517e5738594a8a845f -->
## Delete Company

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/company/{company}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/company/{company}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/company/{company}`


<!-- END_17894c0b6f5be7517e5738594a8a845f -->

#Location
<!-- START_b304d8a5ba91fce59e5bcd210ea5d53e -->
## Get Locations

> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/location" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/location",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/location`


<!-- END_b304d8a5ba91fce59e5bcd210ea5d53e -->

<!-- START_f5462d9db30f96861f4f9153cc759d23 -->
## Add Location

> Example request:

```bash
curl -X POST "http://localhost:8000/api/location" \
    -H "Accept: application/json" \
    -d "address_1"="non" \
        -d "address_2"="facilis" \
        -d "city"="molestiae" \
        -d "country"="veniam" \
        -d "zip_code"="sunt" \
        -d "longitude"="dolorum" \
        -d "latitude"="temporibus" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/location",
    "method": "POST",
    "data": {
        "address_1": "non",
        "address_2": "facilis",
        "city": "molestiae",
        "country": "veniam",
        "zip_code": "sunt",
        "longitude": "dolorum",
        "latitude": "temporibus"
    },
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/location`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    address_1 | string |  required  | 
    address_2 | string |  required  | 
    city | string |  required  | 
    country | string |  required  | 
    zip_code | string |  required  | 
    longitude | string |  required  | 
    latitude | string |  required  | 

<!-- END_f5462d9db30f96861f4f9153cc759d23 -->

<!-- START_26301b7a8b0dff0425a34bb7a293bea8 -->
## Get Location

> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/location/{location}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/location/{location}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/location/{location}`


<!-- END_26301b7a8b0dff0425a34bb7a293bea8 -->

<!-- START_29a0803630f8c8cdea6d646f16316f39 -->
## Update Location

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/location/{location}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/location/{location}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/location/{location}`

`PATCH api/location/{location}`


<!-- END_29a0803630f8c8cdea6d646f16316f39 -->

<!-- START_4ccfbc8c44394bf0b00ed6ff3255329f -->
## Delete Location

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/location/{location}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/location/{location}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/location/{location}`


<!-- END_4ccfbc8c44394bf0b00ed6ff3255329f -->

#Portfolio
<!-- START_482ca2b46f59b7a4c6f506d1c29e27f3 -->
## Get Portfolios

> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/portfolio" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/portfolio",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/portfolio`


<!-- END_482ca2b46f59b7a4c6f506d1c29e27f3 -->

<!-- START_ed06d70e6afb4546063108fd74883b7a -->
## Add Portfolio

> Example request:

```bash
curl -X POST "http://localhost:8000/api/portfolio" \
    -H "Accept: application/json" \
    -d "title"="qui" \
        -d "description"="est" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/portfolio",
    "method": "POST",
    "data": {
        "title": "qui",
        "description": "est"
    },
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/portfolio`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    title | string |  required  | 
    description | string |  required  | 

<!-- END_ed06d70e6afb4546063108fd74883b7a -->

<!-- START_ec5efa7296773ee1a9239ff0200084dd -->
## Get Portfolio

> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/portfolio/{portfolio}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/portfolio/{portfolio}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/portfolio/{portfolio}`


<!-- END_ec5efa7296773ee1a9239ff0200084dd -->

<!-- START_0f4dbfb84accfebf37a64548564fe55f -->
## Update Portfolio

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/portfolio/{portfolio}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/portfolio/{portfolio}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/portfolio/{portfolio}`

`PATCH api/portfolio/{portfolio}`


<!-- END_0f4dbfb84accfebf37a64548564fe55f -->

<!-- START_af32612e25d198e827a608a59e018153 -->
## Delete Portfolio

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/portfolio/{portfolio}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/portfolio/{portfolio}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/portfolio/{portfolio}`


<!-- END_af32612e25d198e827a608a59e018153 -->

#Service
<!-- START_ea84a78219560615c4ff37e1fa296629 -->
## Get Services

> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/services" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/services",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/services`


<!-- END_ea84a78219560615c4ff37e1fa296629 -->

<!-- START_8bfc14d193e92d543a0784b5f6d0ed5c -->
## Add Service

> Example request:

```bash
curl -X POST "http://localhost:8000/api/services" \
    -H "Accept: application/json" \
    -d "name"="autem" \
        -d "category"="rem" \
        -d "focus"="cum" 
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/services",
    "method": "POST",
    "data": {
        "name": "autem",
        "category": "rem",
        "focus": "cum"
    },
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/services`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    category | string |  required  | 
    focus | string |  required  | 

<!-- END_8bfc14d193e92d543a0784b5f6d0ed5c -->

<!-- START_801a92ef65179289ff8517eda2335be7 -->
## Get Service

> Example request:

```bash
curl -X GET -G "http://localhost:8000/api/services/{service}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/services/{service}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/services/{service}`


<!-- END_801a92ef65179289ff8517eda2335be7 -->

<!-- START_9ec03a54d47a6c8a5548081841160aed -->
## Update Service

> Example request:

```bash
curl -X PUT "http://localhost:8000/api/services/{service}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/services/{service}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/services/{service}`

`PATCH api/services/{service}`


<!-- END_9ec03a54d47a6c8a5548081841160aed -->

<!-- START_54d05102548371f477ac36a6e49c0924 -->
## Delete Service

> Example request:

```bash
curl -X DELETE "http://localhost:8000/api/services/{service}" \
    -H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost:8000/api/services/{service}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/services/{service}`


<!-- END_54d05102548371f477ac36a6e49c0924 -->


