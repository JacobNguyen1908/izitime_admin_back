# Description
Web based time management software

# API Documentation
## For Devices
### 1. Request token authentification
```http
POST /oauth/token
```

| Parameter | Type | Required | Description | Value | 
| :--- | :--- | :--- | :--- | :--- |
| `grant_type` | `string` | **Required** |  | client_credentials
| `client_id` | `string` | **Required** | Client ID, command `php artisan passport:client --client` | 
| `client_secret` | `string` | **Required**  | Client secret, command `php artisan passport:client --client`|
| `scope` | `string` | **Required** |  | *

### 2. Insert timeclocks
```http
POST /api/time-clocks/from-device
```

| Parameter | Type | Required | Description | Value | 
| :--- | :--- | :--- | :--- | :--- |
| `timeclocks` | `array` | **Required** | List timeclocks


# Notes
## Test
<details>
<summary>1. Single process</summary>
We have two configurations file for phpunit `phpunit.xml` and `phpunit.xml.dist`. These two files configure testsuites and also specify database to test

```javascript
// test with empty database
php artisan test -c phpunit.xml.dist --testsuite FeatureEmptyDB
// test with cloned database (data existed)
php artisan test -c phpunit.xml --testsuite FeatureDBVM
```
</details>
<details>
<summary>2. Multi-processes (to review)</summary>
Multi-processes execution tests in order to reduce duration using library `Paratest` <https://github.com/paratestphp/paratest>

```javascript
// 4 processeurs 
vendor/bin/paratest -p4 --testsuite FeatureDBVM 

// 8 processeurs 
vendor/bin/paratest -p4 --testsuite FeatureDBVM 
```

Laravel 8.x also can run in parallel tests
```javascript
php artisan test --parallel --testsuite FeatureDBVM
```
But for now, we cannot use this `parallel` method because of conflicts dues to multiple transactions that are executed in same time
</details>



## Migration
```shell
php artisan migrate

php artisan migrate --path database/migrations/2025_08_24_104436_insert_triggers_functions.php  
```

`--env=testing` add this parameter to migrate in testing database

## Queue
In `.env` change:
- `QUEUE_CONNECTION = database`
- `BROADCAST_DRIVER = pusher` to enable websocket communication with frontend

Run command:
- On local, `php artisan queue:listen --timeout=0`
- On production `php artisan queue:work --timeout=0`
