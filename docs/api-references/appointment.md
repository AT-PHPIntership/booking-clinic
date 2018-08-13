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
|clinic_id|Number|The clinic is booked appointment|
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
