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

#general


<!-- START_0c068b4037fb2e47e71bd44bd36e3e2a -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/authorize`


<!-- END_0c068b4037fb2e47e71bd44bd36e3e2a -->

<!-- START_e48cc6a0b45dd21b7076ab2c03908687 -->
## Approve the authorization request.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/authorize`


<!-- END_e48cc6a0b45dd21b7076ab2c03908687 -->

<!-- START_de5d7581ef1275fce2a229b6b6eaad9c -->
## Deny the authorization request.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/oauth/authorize" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/authorize"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/authorize`


<!-- END_de5d7581ef1275fce2a229b6b6eaad9c -->

<!-- START_a09d20357336aa979ecd8e3972ac9168 -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/token" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/token"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/token`


<!-- END_a09d20357336aa979ecd8e3972ac9168 -->

<!-- START_d6a56149547e03307199e39e03e12d1c -->
## Get all of the authorized tokens for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/tokens`


<!-- END_d6a56149547e03307199e39e03e12d1c -->

<!-- START_a9a802c25737cca5324125e5f60b72a5 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/oauth/tokens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/tokens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/tokens/{token_id}`


<!-- END_a9a802c25737cca5324125e5f60b72a5 -->

<!-- START_abe905e69f5d002aa7d26f433676d623 -->
## Get a fresh transient token cookie for the authenticated user.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/token/refresh" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/token/refresh"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/token/refresh`


<!-- END_abe905e69f5d002aa7d26f433676d623 -->

<!-- START_babcfe12d87b8708f5985e9d39ba8f2c -->
## Get all of the clients for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/clients`


<!-- END_babcfe12d87b8708f5985e9d39ba8f2c -->

<!-- START_9eabf8d6e4ab449c24c503fcb42fba82 -->
## Store a new client.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/clients" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/clients"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/clients`


<!-- END_9eabf8d6e4ab449c24c503fcb42fba82 -->

<!-- START_784aec390a455073fc7464335c1defa1 -->
## Update the given client.

> Example request:

```bash
curl -X PUT \
    "http://localhost/oauth/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT oauth/clients/{client_id}`


<!-- END_784aec390a455073fc7464335c1defa1 -->

<!-- START_1f65a511dd86ba0541d7ba13ca57e364 -->
## Delete the given client.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/oauth/clients/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/clients/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/clients/{client_id}`


<!-- END_1f65a511dd86ba0541d7ba13ca57e364 -->

<!-- START_9e281bd3a1eb1d9eb63190c8effb607c -->
## Get all of the available scopes for the application.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/scopes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/scopes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/scopes`


<!-- END_9e281bd3a1eb1d9eb63190c8effb607c -->

<!-- START_9b2a7699ce6214a79e0fd8107f8b1c9e -->
## Get all of the personal access tokens for the authenticated user.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/oauth/personal-access-tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/personal-access-tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/personal-access-tokens`


<!-- END_9b2a7699ce6214a79e0fd8107f8b1c9e -->

<!-- START_a8dd9c0a5583742e671711f9bb3ee406 -->
## Create a new personal access token for the user.

> Example request:

```bash
curl -X POST \
    "http://localhost/oauth/personal-access-tokens" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/personal-access-tokens"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST oauth/personal-access-tokens`


<!-- END_a8dd9c0a5583742e671711f9bb3ee406 -->

<!-- START_bae65df80fd9d72a01439241a9ea20d0 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/oauth/personal-access-tokens/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/oauth/personal-access-tokens/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE oauth/personal-access-tokens/{token_id}`


<!-- END_bae65df80fd9d72a01439241a9ea20d0 -->

<!-- START_745d9b83f143a21e7a9a4a4729c94152 -->
## First setupDB:
Execute command php artisan

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/create-db" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/create-db"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Database succesfully created"
}
```

### HTTP Request
`GET api/create-db`


<!-- END_745d9b83f143a21e7a9a4a4729c94152 -->

<!-- START_9357c0a600c785fe4f708897facae8b8 -->
## Create super

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/signup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/signup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/auth/signup`


<!-- END_9357c0a600c785fe4f708897facae8b8 -->

<!-- START_a925a8d22b3615f12fca79456d286859 -->
## Login user and create token

> Example request:

```bash
curl -X POST \
    "http://localhost/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/auth/login`


<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_153d2119af6a72086ba88bc83d58b6b2 -->
## Create company

> Example request:

```bash
curl -X POST \
    "http://localhost/api/company" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/company"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/company`


<!-- END_153d2119af6a72086ba88bc83d58b6b2 -->

<!-- START_56a3d62a5759f4f59b42a3732b8ba8e3 -->
## Create address

> Example request:

```bash
curl -X POST \
    "http://localhost/api/address" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/address"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/address`


<!-- END_56a3d62a5759f4f59b42a3732b8ba8e3 -->

<!-- START_11fac7d46fe4d28c53f98ddf0cb0fed2 -->
## Get all daily schedules

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/daily-schedules" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/daily-schedules"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/daily-schedules`


<!-- END_11fac7d46fe4d28c53f98ddf0cb0fed2 -->

<!-- START_9720157a99e1aaac59969f126c8280ca -->
## Get daily schedule by id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/daily-schedules/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/daily-schedules/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/daily-schedules/{id}`


<!-- END_9720157a99e1aaac59969f126c8280ca -->

<!-- START_4b7b86242973c30265fec155a23556f9 -->
## Create daily schedule

> Example request:

```bash
curl -X POST \
    "http://localhost/api/daily-schedules" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/daily-schedules"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/daily-schedules`


<!-- END_4b7b86242973c30265fec155a23556f9 -->

<!-- START_030e38736e953d3002755b280a74d4e4 -->
## Update a daily schedule

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/daily-schedules/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/daily-schedules/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/daily-schedules/{id}`


<!-- END_030e38736e953d3002755b280a74d4e4 -->

<!-- START_0ee6ffa55f353fed468edf3f8ef4ba1f -->
## Delete a daily schedule by id

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/daily-schedules/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/daily-schedules/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/daily-schedules/{id}`


<!-- END_0ee6ffa55f353fed468edf3f8ef4ba1f -->

<!-- START_1c7f19d8f1a3da4c0d026282e84fe65c -->
## Restore a daily schedule SOFT DELETED by id
Automatically cascade timeslot, break, fixedbreak

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/daily-schedules/restore/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/daily-schedules/restore/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/daily-schedules/restore/{id}`


<!-- END_1c7f19d8f1a3da4c0d026282e84fe65c -->

<!-- START_03ea3cfd200bc866f4b80a60f27eef75 -->
## Get all rotations except default company settings

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/rotations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rotations"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/rotations`


<!-- END_03ea3cfd200bc866f4b80a60f27eef75 -->

<!-- START_31de9f63c687013bff98e90fc950cea4 -->
## Get rotation by id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/rotations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rotations/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/rotations/{id}`


<!-- END_31de9f63c687013bff98e90fc950cea4 -->

<!-- START_3f92972615cc3a90706492874a77cb7a -->
## Create rotation

> Example request:

```bash
curl -X POST \
    "http://localhost/api/rotations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rotations"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/rotations`


<!-- END_3f92972615cc3a90706492874a77cb7a -->

<!-- START_591cef4dd008e39ee41e51c3e40df6e1 -->
## Update a rotation

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/rotations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rotations/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/rotations/{id}`


<!-- END_591cef4dd008e39ee41e51c3e40df6e1 -->

<!-- START_81f02bf4457fb5b782bb9dc1056fa948 -->
## Delete a rotation by id

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/rotations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rotations/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/rotations/{id}`


<!-- END_81f02bf4457fb5b782bb9dc1056fa948 -->

<!-- START_a30e606e8d4160e37b7d449bac7c648d -->
## api/check-super-admin
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/check-super-admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/check-super-admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "message": "Super administrator exists."
}
```

### HTTP Request
`GET api/check-super-admin`


<!-- END_a30e606e8d4160e37b7d449bac7c648d -->

<!-- START_0fe74167d4966221df6ec9bf01efba7f -->
## Update company settings

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/company/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/company/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/company/{id}`


<!-- END_0fe74167d4966221df6ec9bf01efba7f -->

<!-- START_c10043ee51908bdb310d6e7822700ac7 -->
## Get all users

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/activity-logs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/activity-logs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/activity-logs`


<!-- END_c10043ee51908bdb310d6e7822700ac7 -->

<!-- START_50359b14fc7a6954725e7c9c691e568d -->
## Create user type

> Example request:

```bash
curl -X POST \
    "http://localhost/api/user-type" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user-type"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/user-type`


<!-- END_50359b14fc7a6954725e7c9c691e568d -->

<!-- START_bd39cce640f6cb352bc704b61b36a46f -->
## Get all user type

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user-type" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user-type"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/user-type`


<!-- END_bd39cce640f6cb352bc704b61b36a46f -->

<!-- START_7e7ae6e573598177347de3966f518edd -->
## Get user type by id
included also user rights

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user-type/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user-type/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/user-type/{id}`


<!-- END_7e7ae6e573598177347de3966f518edd -->

<!-- START_2c8fd78ff938d795d83945fd4ceba3c2 -->
## Delete a user type

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/user-type/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user-type/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/user-type/{id}`


<!-- END_2c8fd78ff938d795d83945fd4ceba3c2 -->

<!-- START_050e85345a02635a3d34cd7118f3e2fe -->
## Update a user type

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/user-type/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user-type/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/user-type/{id}`


<!-- END_050e85345a02635a3d34cd7118f3e2fe -->

<!-- START_fc1e4f6a697e3c48257de845299b71d5 -->
## Get all users

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/users`


<!-- END_fc1e4f6a697e3c48257de845299b71d5 -->

<!-- START_12e37982cc5398c7100e59625ebb5514 -->
## Create super

> Example request:

```bash
curl -X POST \
    "http://localhost/api/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/users`


<!-- END_12e37982cc5398c7100e59625ebb5514 -->

<!-- START_fceddd82d8c88376fcee403bd01f165a -->
## Delete a user by id

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/users/{id}`


<!-- END_fceddd82d8c88376fcee403bd01f165a -->

<!-- START_9332edb67641ad6a0c477285396a59e6 -->
## Update a user

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/users/{id}`


<!-- END_9332edb67641ad6a0c477285396a59e6 -->

<!-- START_456bb5b213494d65caf9dc1d92afb602 -->
## Get user rights by user_type_id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/user-right/user-type-id/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/user-right/user-type-id/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/user-right/user-type-id/{id}`


<!-- END_456bb5b213494d65caf9dc1d92afb602 -->

<!-- START_8f41217bf023ddef5d8995d7c7c7e2e2 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/devices" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/devices"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/devices`


<!-- END_8f41217bf023ddef5d8995d7c7c7e2e2 -->

<!-- START_db11958cf7a8ce5e41eb2c29fd6cdbdf -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/device/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/device/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/device/{id}`


<!-- END_db11958cf7a8ce5e41eb2c29fd6cdbdf -->

<!-- START_a815cdd6f24022c016224199e8f63426 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/device" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/device"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/device`


<!-- END_a815cdd6f24022c016224199e8f63426 -->

<!-- START_72e7ecd78dd682ca2d704f59b4d18fee -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/device/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/device/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/device/{id}`


<!-- END_72e7ecd78dd682ca2d704f59b4d18fee -->

<!-- START_46e85382da3f480dbbbb9c11f4e85f82 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/device/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/device/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/device/{id}`


<!-- END_46e85382da3f480dbbbb9c11f4e85f82 -->

<!-- START_0254d5c04bbe9f5cd84cce4f479f982c -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/devicetypes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/devicetypes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/devicetypes`


<!-- END_0254d5c04bbe9f5cd84cce4f479f982c -->

<!-- START_ff209c52395f07d0d60f6fcbd8119e12 -->
## api/access-modes
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/access-modes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/access-modes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/access-modes`


<!-- END_ff209c52395f07d0d60f6fcbd8119e12 -->

<!-- START_9f7124fe77e524cbf4771cec620b6433 -->
## api/thrift
> Example request:

```bash
curl -X POST \
    "http://localhost/api/thrift" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/thrift"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/thrift`


<!-- END_9f7124fe77e524cbf4771cec620b6433 -->

<!-- START_101bc5bee6630e1ee4522e5f22e06ac3 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/access-schedules" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/access-schedules"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/access-schedules`


<!-- END_101bc5bee6630e1ee4522e5f22e06ac3 -->

<!-- START_0817e46d4ffbee3027d4f4ee259dc175 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/access-schedule/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/access-schedule/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/access-schedule/{id}`


<!-- END_0817e46d4ffbee3027d4f4ee259dc175 -->

<!-- START_fd0d93b4b8c8a6f4b0fc99f6f0000984 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/access-schedule" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/access-schedule"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/access-schedule`


<!-- END_fd0d93b4b8c8a6f4b0fc99f6f0000984 -->

<!-- START_b8c0bf43b97154f8451e583ba2903e39 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/access-schedule/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/access-schedule/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/access-schedule/{id}`


<!-- END_b8c0bf43b97154f8451e583ba2903e39 -->

<!-- START_2cbc24ec60bbae9f7603123bef6f2ba1 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/access-schedule/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/access-schedule/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/access-schedule/{id}`


<!-- END_2cbc24ec60bbae9f7603123bef6f2ba1 -->

<!-- START_26005b2e87e495e140d8452db69ff663 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/access-schedule-slots/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/access-schedule-slots/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/access-schedule-slots/{id}`


<!-- END_26005b2e87e495e140d8452db69ff663 -->

<!-- START_6eec52c9b8cb6c9dd5616c15a18a8759 -->
## Update daily schedules penalty values with id in Array

> Example request:

```bash
curl -X POST \
    "http://localhost/api/daily-schedules/update-penalty" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/daily-schedules/update-penalty"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/daily-schedules/update-penalty`


<!-- END_6eec52c9b8cb6c9dd5616c15a18a8759 -->

<!-- START_b33162fc28bfff631160c9fdb43de755 -->
## Updated timeslots using tolerance defaults values
with daily_schedule_id in list

> Example request:

```bash
curl -X POST \
    "http://localhost/api/daily-schedules/update-tolerance" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/daily-schedules/update-tolerance"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/daily-schedules/update-tolerance`


<!-- END_b33162fc28bfff631160c9fdb43de755 -->

<!-- START_c83e8ec2e2d5f2118225f3e037d1da59 -->
## Get daily schedule by id and a datetime

> Example request:

```bash
curl -X POST \
    "http://localhost/api/daily-schedules/1/by-datetime" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/daily-schedules/1/by-datetime"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/daily-schedules/{id}/by-datetime`


<!-- END_c83e8ec2e2d5f2118225f3e037d1da59 -->

<!-- START_bae11997b154be660d3457fc4989a0a5 -->
## Get daily schedule by id and a datetime

> Example request:

```bash
curl -X POST \
    "http://localhost/api/rotations/1/by-datetime" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/rotations/1/by-datetime"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/rotations/{id}/by-datetime`


<!-- END_bae11997b154be660d3457fc4989a0a5 -->

<!-- START_3aac2bb7626ac77bafff787a4bddb59e -->
## Get all departments

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/departments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/departments"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/departments`


<!-- END_3aac2bb7626ac77bafff787a4bddb59e -->

<!-- START_13479cb5bd328c8b4cb71374f6c088af -->
## Get daily schedule by id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/departments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/departments/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/departments/{id}`


<!-- END_13479cb5bd328c8b4cb71374f6c088af -->

<!-- START_b002b7c6ad7a3a78a8d833aed62c535e -->
## Create department

> Example request:

```bash
curl -X POST \
    "http://localhost/api/departments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/departments"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/departments`


<!-- END_b002b7c6ad7a3a78a8d833aed62c535e -->

<!-- START_0ca934857b45d7aeb93a38485e457319 -->
## Update a daily schedule

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/departments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/departments/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/departments/{id}`


<!-- END_0ca934857b45d7aeb93a38485e457319 -->

<!-- START_e10eccf96f26be00dca3f43a4f534bb8 -->
## Delete a department by id

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/departments/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/departments/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/departments/{id}`


<!-- END_e10eccf96f26be00dca3f43a4f534bb8 -->

<!-- START_4b94bd9de767d708f579234b4b4bc7de -->
## Get all sites

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/sites" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/sites"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/sites`


<!-- END_4b94bd9de767d708f579234b4b4bc7de -->

<!-- START_db27e11e1b9735f2d7db45565862c145 -->
## Get site by id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/sites/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/sites/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/sites/{id}`


<!-- END_db27e11e1b9735f2d7db45565862c145 -->

<!-- START_0ebc8c1e23f5fffe2bde49996df7e6a8 -->
## Create department

> Example request:

```bash
curl -X POST \
    "http://localhost/api/sites" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/sites"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/sites`


<!-- END_0ebc8c1e23f5fffe2bde49996df7e6a8 -->

<!-- START_5c735973cfbd0edc25ddcb9c8ddd8610 -->
## Update  site

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/sites/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/sites/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/sites/{id}`


<!-- END_5c735973cfbd0edc25ddcb9c8ddd8610 -->

<!-- START_00e90caed6de37f0a44ce5288c2ab262 -->
## Delete a site by id

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/sites/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/sites/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/sites/{id}`


<!-- END_00e90caed6de37f0a44ce5288c2ab262 -->

<!-- START_bbf5f53764a43af9eab11504db0c39b5 -->
## Get all employees

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/employees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/employees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/employees`


<!-- END_bbf5f53764a43af9eab11504db0c39b5 -->

<!-- START_e18b0defbe71083f20bc8e0b8a318966 -->
## Get employee by id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/employees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/employees/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/employees/{id}`


<!-- END_e18b0defbe71083f20bc8e0b8a318966 -->

<!-- START_42af3d8d5862fde3052509cbae29451c -->
## Create employee

> Example request:

```bash
curl -X POST \
    "http://localhost/api/employees" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/employees"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/employees`


<!-- END_42af3d8d5862fde3052509cbae29451c -->

<!-- START_5f616d76ae413ee85c101df6506be432 -->
## Update a employee

> Example request:

```bash
curl -X POST \
    "http://localhost/api/employees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/employees/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/employees/{id}`


<!-- END_5f616d76ae413ee85c101df6506be432 -->

<!-- START_078af1426867aa2ed1af7fcb1bab261d -->
## Delete a employee by id

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/employees/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/employees/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/employees/{id}`


<!-- END_078af1426867aa2ed1af7fcb1bab261d -->

<!-- START_f61e14e126559b8cf56fbee098230161 -->
## api/summary/totals
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/summary/totals" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/summary/totals"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/summary/totals`


<!-- END_f61e14e126559b8cf56fbee098230161 -->

<!-- START_20e83f2bbe73482938f83dee14e6c023 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/biometrics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/biometrics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/biometrics`


<!-- END_20e83f2bbe73482938f83dee14e6c023 -->

<!-- START_c67d04f53515d189980e37dbbc233369 -->
## api/biometrics/bulk
> Example request:

```bash
curl -X POST \
    "http://localhost/api/biometrics/bulk" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/biometrics/bulk"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/biometrics/bulk`


<!-- END_c67d04f53515d189980e37dbbc233369 -->

<!-- START_00440cd9ef73fcb3c3a03b57fbf05d54 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/biometrics/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/biometrics/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/biometrics/{id}`


<!-- END_00440cd9ef73fcb3c3a03b57fbf05d54 -->

<!-- START_360d10bf8d0818b59b2046c32d80468a -->
## Get all biometric data of one employee

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/biometrics/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/biometrics/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/biometrics/{employee_id}`


<!-- END_360d10bf8d0818b59b2046c32d80468a -->

<!-- START_ca2a833ee882d500442db111d5722c9e -->
## api/time-clocks
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/time-clocks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/time-clocks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/time-clocks`


<!-- END_ca2a833ee882d500442db111d5722c9e -->

<!-- START_e8113bdad4ecf255e3c0822d197c1d1b -->
## api/time-clocks
> Example request:

```bash
curl -X POST \
    "http://localhost/api/time-clocks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/time-clocks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/time-clocks`


<!-- END_e8113bdad4ecf255e3c0822d197c1d1b -->

<!-- START_7e9a756c1fb593e2f06d5275b9582bc7 -->
## api/time-clocks/{id}
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/time-clocks/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/time-clocks/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/time-clocks/{id}`


<!-- END_7e9a756c1fb593e2f06d5275b9582bc7 -->

<!-- START_1dd19306d7a41b7fcb485acdfc1e4db0 -->
## api/time-clocks/{id}
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/time-clocks/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/time-clocks/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/time-clocks/{id}`


<!-- END_1dd19306d7a41b7fcb485acdfc1e4db0 -->

<!-- START_5609f635d88160bf8266ebe03ad04ce9 -->
## api/counters
> Example request:

```bash
curl -X POST \
    "http://localhost/api/counters" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/counters"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/counters`


<!-- END_5609f635d88160bf8266ebe03ad04ce9 -->

<!-- START_2215a90e53915f80f301771038b15b72 -->
## api/counters
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/counters" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/counters"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/counters`


<!-- END_2215a90e53915f80f301771038b15b72 -->

<!-- START_8c80a58542f23220564e02d856d8b8d8 -->
## api/counters/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/counters/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/counters/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/counters/{id}`


<!-- END_8c80a58542f23220564e02d856d8b8d8 -->

<!-- START_b852dfe0fddd4bcb9400b71dc522ddf1 -->
## api/counters/{id}
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/counters/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/counters/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/counters/{id}`


<!-- END_b852dfe0fddd4bcb9400b71dc522ddf1 -->

<!-- START_30d413a7cf818f8a1c6933b28d330e51 -->
## api/counters/{id}
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/counters/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/counters/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/counters/{id}`


<!-- END_30d413a7cf818f8a1c6933b28d330e51 -->

<!-- START_2aa1702083e0953ce53f2471a5746017 -->
## Get all anomaly types

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/anomaly-types" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/anomaly-types"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/anomaly-types`


<!-- END_2aa1702083e0953ce53f2471a5746017 -->

<!-- START_60d072d2604236f8c99e52a4b291037b -->
## Update ananomaly types

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/anomaly-types" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/anomaly-types"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/anomaly-types`


<!-- END_60d072d2604236f8c99e52a4b291037b -->

<!-- START_6dd03b5e7829a63d4de4354869e6ca13 -->
## api/public-holidays
> Example request:

```bash
curl -X POST \
    "http://localhost/api/public-holidays" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/public-holidays"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/public-holidays`


<!-- END_6dd03b5e7829a63d4de4354869e6ca13 -->

<!-- START_b35d060caf279fb43d5ba1661dfe92bd -->
## api/public-holidays/bulk
> Example request:

```bash
curl -X POST \
    "http://localhost/api/public-holidays/bulk" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/public-holidays/bulk"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/public-holidays/bulk`


<!-- END_b35d060caf279fb43d5ba1661dfe92bd -->

<!-- START_4bc9185aef2f6e65630e13f834f15bdc -->
## api/public-holidays
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/public-holidays" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/public-holidays"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/public-holidays`


<!-- END_4bc9185aef2f6e65630e13f834f15bdc -->

<!-- START_1206552ce801eeb77927434603080373 -->
## api/public-holidays/{id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/public-holidays/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/public-holidays/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/public-holidays/{id}`


<!-- END_1206552ce801eeb77927434603080373 -->

<!-- START_1784853f6736428467dc64b70f16b118 -->
## api/public-holidays/{id}
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/public-holidays/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/public-holidays/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/public-holidays/{id}`


<!-- END_1784853f6736428467dc64b70f16b118 -->

<!-- START_77c5331e0f9394c9e0b27ac37918eea5 -->
## api/public-holidays/{id}
> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/public-holidays/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/public-holidays/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/public-holidays/{id}`


<!-- END_77c5331e0f9394c9e0b27ac37918eea5 -->

<!-- START_f443ea76726431dfa138e86556d52815 -->
## Get planning between two dates

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/planning/from/1/to/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/planning/from/1/to/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/planning/from/{start}/to/{end}`


<!-- END_f443ea76726431dfa138e86556d52815 -->

<!-- START_c494c2eed4824ee6457f543bc2499cac -->
## api/planning/insert/rotation
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/planning/insert/rotation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/planning/insert/rotation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/planning/insert/rotation`


<!-- END_c494c2eed4824ee6457f543bc2499cac -->

<!-- START_bf53fd4651f2b9cb284c4028b750fc79 -->
## api/planning/insert/daily-schedule
> Example request:

```bash
curl -X PUT \
    "http://localhost/api/planning/insert/daily-schedule" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/planning/insert/daily-schedule"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/planning/insert/daily-schedule`


<!-- END_bf53fd4651f2b9cb284c4028b750fc79 -->

<!-- START_b82dccbdd905c05b7b513b69158336fc -->
## Get address by id

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/address/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/address/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/address/{id}`


<!-- END_b82dccbdd905c05b7b513b69158336fc -->

<!-- START_56571a9047cf19155b07f3bc7d4dec9c -->
## Create address

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/address/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/address/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/address/{id}`


<!-- END_56571a9047cf19155b07f3bc7d4dec9c -->

<!-- START_8e9e2f7b6568d14b197402543cdaa874 -->
## Create token password reset

> Example request:

```bash
curl -X POST \
    "http://localhost/api/password/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/password/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/password/create`


<!-- END_8e9e2f7b6568d14b197402543cdaa874 -->

<!-- START_28b16f279c1333c2efecf8a89e31b59d -->
## Find token password reset

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/password/find/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/password/find/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "This password reset token is invalid."
}
```

### HTTP Request
`GET api/password/find/{token}`


<!-- END_28b16f279c1333c2efecf8a89e31b59d -->

<!-- START_8ad860d24dc1cc6dac772d99135ad13e -->
## Reset password

> Example request:

```bash
curl -X POST \
    "http://localhost/api/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/password/reset`


<!-- END_8ad860d24dc1cc6dac772d99135ad13e -->

<!-- START_28bbe8055fe6f6be27965f27dff6f5e1 -->
## Check if user are authenticated

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/auth/check-if-authenticated" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/check-if-authenticated"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthorized"
}
```

### HTTP Request
`GET api/auth/check-if-authenticated`


<!-- END_28bbe8055fe6f6be27965f27dff6f5e1 -->

<!-- START_16928cb8fc6adf2d9bb675d62a2095c5 -->
## Logout user (Revoke the token)

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/auth/logout`


<!-- END_16928cb8fc6adf2d9bb675d62a2095c5 -->

<!-- START_ff6d656b6d81a61adda963b8702034d2 -->
## Get the authenticated User

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/auth/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/auth/user`


<!-- END_ff6d656b6d81a61adda963b8702034d2 -->

<!-- START_4a5979a19accf982d0cfb4700b7a4252 -->
## Get the company

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/auth/company" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/auth/company"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/auth/company`


<!-- END_4a5979a19accf982d0cfb4700b7a4252 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Redirect to login page frontend

> Example request:

```bash
curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthorized"
}
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->


