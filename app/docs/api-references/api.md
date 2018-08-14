# BOOKING CLINIC

## `GET`  list clinic types
```
/api/clinic-types
```
Get list all clinic types
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
#### Response
```json
{
    "result": [
        {
            "id": 1,
            "name": "Đa khoa",
            "created_at": "2018-08-14 03:33:21",
            "updated_at": null
        },
        ,
        {
            "id": 2,
            "name": "Ngoại khoa",
            "created_at": "2018-08-14 03:33:21",
            "updated_at": null
        },
        {
            "id": 3,
            "name": "Nội khoa",
            "created_at": "2018-08-14 03:33:21",
            "updated_at": null
        },
        {
            "id": 4,
            "name": "Răng hàm mặt",
            "created_at": "2018-08-14 03:33:21",
            "updated_at": null
        },
        {
            "id": 5,
            "name": "Tai mũi họng",
            "created_at": "2018-08-14 03:33:21",
            "updated_at": null
        },
        {
            "id": 6,
            "name": "Sản nhi",
            "created_at": "2018-08-14 03:33:21",
            "updated_at": null
        },
        {
            "id": 7,
            "name": "Phục hồi chức năng",
            "created_at": "2018-08-14 03:33:21",
            "updated_at": null
        },
    ],
    "code": 200
}
```
