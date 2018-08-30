## `GET` list apointments of user
```
/api/appointments
```
Get list appointments of user
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer {{token}}
#### Query Pram
| Key | Value| Desciption |
|---|---|---|
| clinic_id | int | Get appointments which user booked in a  specify clinic |
| status | int | Get appointments have secify status `0: Pending`, `1: Confirmed`, `3: Completed`, `4: Cancel` |
| perpage | int | Number record of per page|
| page | int | Page number|
| sort_by | string | Sort by `created_at`, `updated_at`, `book_time` ... |
| order | string | Sort order (`ASC`, `DESC`) |
#### Example
| URL | Description |
|---|---|
| /api/appointments | Get appointments of user |
| /api/appointments?clinic_id=51 | Get appointments which user booked in clinic has id = 51|
| /api/appointments?clinic_id=51&sort_by=book_time&order=DESC | Get latest appointments which user booked in clinic has id = 51 |
| /api/appointments?status=0| Get appointments have Pending status
#### Response
* _Success_
```json
{
    "result": {
        "paginator": {
            "current_page": 1,
            "first_page_url": "http://127.0.0.1:8866/api/appointments?page=1",
            "from": 1,
            "last_page": 2,
            "last_page_url": "http://127.0.0.1:8866/api/appointments?page=2",
            "next_page_url": "http://127.0.0.1:8866/api/appointments?page=2",
            "path": "http://127.0.0.1:8866/api/appointments",
            "per_page": "5",
            "prev_page_url": null,
            "to": 5,
            "total": 7
        },
        "data": [
            {
                "id": 141,
                "description": "delete from appointments wheredelete from appointments wheredelete from appointments wheredelete from appointments wheredelete from appointments wheredelete from appointments where",
                "status": "Pending",
                "clinic_id": 51,
                "user_id": 174,
                "book_time": "2018-08-22 19:53:04",
                "created_at": "2018-08-22 14:44:17",
                "updated_at": "2018-08-22 14:44:17",
                "deleted_at": null,
                "clinic": {
                    "id": 51,
                    "name": "Darby Hoppe"
                }
            },
            {
                "id": 142,
                "description": "delete from appointments wheredelete from appointments wheredelete from appointments wheredelete from appointments wheredelete from appointments where",
                "status": "Completed",
                "clinic_id": 51,
                "user_id": 174,
                "book_time": "2018-08-22 19:53:04",
                "created_at": "2018-08-22 14:47:42",
                "updated_at": "2018-08-22 14:47:42",
                "deleted_at": null,
                "clinic": {
                    "id": 51,
                    "name": "Darby Hoppe"
                }
            },
            {
                "id": 143,
                "description": "delete from appointments wheredelete from appointments wheredelete from appointments wheredelete from appointments where",
                "status": "Confirmed",
                "clinic_id": 51,
                "user_id": 174,
                "book_time": "2018-08-22 19:53:04",
                "created_at": "2018-08-22 14:48:36",
                "updated_at": "2018-08-22 14:48:36",
                "deleted_at": null,
                "clinic": {
                    "id": 51,
                    "name": "Darby Hoppe"
                }
            },
            {
                "id": 144,
                "description": "cc",
                "status": "Completed",
                "clinic_id": 52,
                "user_id": 174,
                "book_time": "2018-08-22 19:50:31",
                "created_at": "2018-08-22 14:48:45",
                "updated_at": "2018-08-22 14:48:45",
                "deleted_at": null,
                "clinic": {
                    "id": 52,
                    "name": "Vivian Williamson"
                }
            },
            {
                "id": 145,
                "description": "sdf",
                "status": "Pending",
                "clinic_id": 53,
                "user_id": 174,
                "book_time": "2018-08-22 19:50:31",
                "created_at": "2018-08-22 14:49:13",
                "updated_at": "2018-08-22 14:49:13",
                "deleted_at": null,
                "clinic": {
                    "id": 53,
                    "name": "Barrett Rippin"
                }
            }
        ]
    },
    "code": 200
}
```

## `POST` user create appointment
```
/api/appointments
```
User create appointment
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer {{token}}

#### Request Body
| Key | Value |Description|
|---|---|---|
|description|Text|Appointment description|
|clinic_id|Number|ID of clinic is booked appointment|
|book_time|Date Time|Appointment book time format(Y-m-d H:i:s)
#### Response
* _Success_
```json
{
    "result": {
        "id": 73,
        "description": "Hello 1",
        "clinic_id": 51,
        "book_time": "2018-08-15 16:00:00",
        "updated_at": "2018-08-15 14:54:01",
        "created_at": "2018-08-15 14:54:01",
        "status": "Pending",
    },
    "code": 201
}
```
* _Error_
``` json
{
    "message": "The given data was invalid.",
    "errors": {
        "book_time": [
            "The book time must be a date after now."
        ],
        "clinic_id": [
            "The selected clinic id is invalid."
        ]
    },
    "code": 422,
    "request": {
        "description": "Hello 1",
        "clinic_id": "200",
        "book_time": "2018-08-14 16:00:00"
    }
}
```
## `PUT` user cancel appointemnt
```
/api/appointments/{appointment}/cancel
```
User cancel specify pending or confirmed appointment
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer {{token}}
* _Success_
```json
{
    "result": {
        "id": 208,
        "description": "7",
        "status": "Cancel",
        "clinic_id": 41,
        "user_id": 174,
        "book_time": "2018-08-25 06:18:20",
        "created_at": "2018-08-23 13:59:54",
        "updated_at": "2018-08-26 17:06:06",
        "deleted_at": null
    },
    "code": 200
}
```
* _Fail_
```json
{
    "error": "Cancel appointment fail",
    "code": 500
}
```

## `GET` examiantion  result
```
/api/appointments/{appointment}/result
```
Get examination result of completed appointment
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
|Authorization|Bearer {{token}}
* _Success_
```json
{
    "result": {
        "clinic": {
            "id": 41,
            "name": "Gisselle Lang",
            "email": "clinic@gmail.com",
            "phone": "0573371536",
            "address": "740 Carleton CornersLake Jeffereyton, MS 61731-1014",
            "description": "Iusto nam in dolor minus. Et voluptatem placeat modi. Quisquam nostrum et odit aut non in eum. A eos laudantium ipsa cumque.",
            "lat": "83.496707",
            "lng": "165.437675",
            "slug": "gisselle-lang",
            "clinic_type_id": 48,
            "deleted_at": null,
            "created_at": "2018-08-19 21:56:44",
            "updated_at": "2018-08-19 21:56:44"
        },
        "examination": {
            "id": 34,
            "diagnostic": "top123",
            "result": "321top",
            "appointment_id": 216,
            "created_at": "2018-08-28 22:39:19",
            "updated_at": "2018-08-28 22:39:19",
            "deleted_at": null
        },
        "user": {
            "id": 174,
            "name": "toptopxxxxxx top",
            "email": "zero8@gmail.com",
            "gender": 0,
            "dob": null,
            "phone": null,
            "address": "da nang11s",
            "created_at": "2018-08-21 22:06:32",
            "updated_at": "2018-08-22 14:10:47"
        }
    },
    "code": 200
}
```
* _Error_
```json
{
    "error": "Get result examination fail",
    "code": 500
}
```
