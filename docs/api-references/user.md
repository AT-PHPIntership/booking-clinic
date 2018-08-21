# User
## `POST` register user
```
/api/register
```
Register user
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
#### Request Body
| Key | Value | Description
|---|---|---|
|name|text| User name|
|email|email|User email|
|password|text|User password|
|password_confirmation|text|Password confirmation|
|gender|number|User gender 0 or 1|
|dob|date| Date of birth nullable|
|phone|phone| User phone nullable|
|address|text| User address nullable|

#### Response
* _Success_
```json
{
    "result": "Successfully created user!",
    "code": 201
}
```
* _Error_
``` json
{
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email has already been taken."
        ],
        "dob": [
            "The dob does not match the format Y-m-d."
        ],
        "phone": [
            "The phone must be a number.",
            "The phone must be between 8 and 12 digits."
        ],
        "gender": [
            "The gender field must be true or false."
        ]
    },
    "code": 422,
    "request": {
        "name": "hongquan",
        "email": "hongquan@gmail.com",
        "dob": "1995-22-a",
        "gender": 3,
        "phone": "0123456789a",
        "password": "secret",
        "password_confirmation": "secret"
    }
}
```

## `POST` login user
```
/api/login
```
Login user
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
#### Request Body
| Key | Value | Description
|---|---|---|
|name|text| User name|
|password|text|User password|
|remember_me|number|Remember user|
#### Response
* _Success_
```json
{
    "result": {
        "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQxNzk4MmIxNzRlNjgyMjNlM2ZhNjA3ZmVhMzE4OWNiN2FiMTk0ZjBkZWFlNzFhMDEzNDk5ZTAxNTRkY2Q3ODQzZTg3Njc1MzFkMDE4NDY2In0.eyJhdWQiOiIxIiwianRpIjoiNDE3OTgyYjE3NGU2ODIyM2UzZmE2MDdmZWEzMTg5Y2I3YWIxOTRmMGRlYWU3MWEwMTM0OTllMDE1NGRjZDc4NDNlODc2NzUzMWQwMTg0NjYiLCJpYXQiOjE1MzQ0MTcyNzAsIm5iZiI6MTUzNDQxNzI3MCwiZXhwIjoxNTY1OTUzMjcwLCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.xGW27br7z38_Pi8Gb2Bny-mulBGpIoPbFud_vFR6RdmF3mXKTkqDhA6uxtASv3jMCYTkJUoRp5XLJX2JV417sY5PPyx-w-RZuT-W6q272C7sJysGd7mICbLJ-ITEilHBk7du7tSqjQSNRkTLubkl6caQNw3YV_IQFx4r0CfYYRxyNFJSSmLsWM2HLGhJ-ckhi_zqwS-6aCCDf-GudxdAqM39HmpG0RyytkuOh9fAtNrxqI_Q887qQU3gqZj65djA-dP2F06Bckt5N6QYxffmYP_Vc9dRnVu3sFAPMcMIX0DZqFo91QEByX_CkJp4J1eSBZx8hrPUT0CFPd-CN-ZfofSTOYfSXC_RO8DG37_72b9zU4679WQ5JhQu3FcCZzbwf05rmG-bieftxPSLr5oYJAfSzPyLfeDMpS8dHXkK-zZZ-he7HFsBF8Dh8eIWrKdHn_5EqnYr3D0vWffr2qXbgOJ-GN519yKueI3TP_eZHaxRFFmJxIpO1w77Y0Hyl-MwVILY_MQKzHQWorQI6aXXczdRY7hhgQ4CHnRTTeuDrupYhShnEgH30PKW0mj_QPC9G9aY1uzRnK1iGO9D456LOH1TY0gxrNuSnvrC6REOvLe25IpiH5AWOfvLEZ6zmH0AJFsa7F5-Pj-auEdewL9jCjx6TxuoDq5B52wVHFbbGJY",
        "token_type": "Bearer",
        "expires_at": "2018-08-23 18:01:10"
    },
    "code": 200
}
```
* _Error_
``` json
{
    "message": "The given data was invalid.",
    "errors": {
        "email": [
            "The email must be a valid email address."
        ]
    },
    "code": 422,
    "request": {
        "email": "top2203@gmailcom",
        "password": "secret",
        "remember_me": 1
    }
}
```
* _Fail_
``` json
{
    "error": "Email or password is incorrect",
    "code": 401
}
```
## `GET` logout user
```
/api/logout
```
logout user
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer {{token}}
```json
{
    "result": "Successfully logged out",
    "code": 200
}
```

### `GET` User
```
/api/user
```
Get detail user

#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer {{token}}

#### Response
* _Success_
```json
{
    "id": 1,
    "name": "Gianni Hauck",
    "email": "hai@gmail.com",
    "gender": 1,
    "dob": "2001-09-19",
    "phone": "866.503.0711",
    "address": "9767 Jovanny LocksParkertown, WA 04857",
    "created_at": "2018-08-17 13:46:20",
    "updated_at": "2018-08-17 13:50:30"
}
```
* _Fail_
```json
{
    "message": "Unauthenticated."
}
```
## `PUT` change password user
```
/api/password
```
change password user
#### Request Header
| Key | Value |
| --- | --- |
| Accept | application/json |
| Authorization | Bearer {{token}} |
#### Request Body
| Key | Value | Description
|---|---|---|
|current_password|text| Current User password|
|new_password|text| New user password|
|new_password_confirmation|text| New user password confirmation|
* _Success_
```json
{
    "result": "Your password is changed",
    "code": 200
}
```
