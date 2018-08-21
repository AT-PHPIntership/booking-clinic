## Clinic API

### `GET` Clinics
```
/api/clinics
```
Get list clinics

#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Query Param
| Key | Value | Description |
|---|---|---|
| clinic_type_id | int | Get clinics belong to clinic type |
| perpage | int | Number record of per page|
| page | int | Page number|
| sort_by | string | Sort by `name`, `email`, `created_at` ... |
| order | string | Sort order (`ASC`, `DESC`) |

#### Example
| URL | Description |
|---|---|
| /api/clinics | Get all clinic |
| /api/clinics?clinic_type_id=2 | Get clinics belong to clinic type has id = 2 |
| /api/clinics?sort_by=name | Get clinics with sorted name and order ASC |
| /api/clinics?clinic_type_id=1&sort_by=created_at&order=DESC&perpage=2 | Get newest clinics has clinic_type_id = 1 and number of record each page is 2 |

#### Response
```json
{
    "result": {
        "paginator": {
            "current_page": 1,
            "first_page_url": "http://127.0.0.1:8000/api/clinics?page=1",
            "from": 1,
            "last_page": 51,
            "last_page_url": "http://127.0.0.1:8000/api/clinics?page=51",
            "next_page_url": "http://127.0.0.1:8000/api/clinics?page=2",
            "path": "http://127.0.0.1:8000/api/clinics",
            "per_page": "1",
            "prev_page_url": null,
            "to": 1,
            "total": 51
        },
        "data": [
            {
                "id": 1,
                "name": "Virgie Klein II",
                "email": "macejkovic.max@example.net",
                "phone": "84594843121",
                "address": "27365 Aniyah ShoalsNew Martina, SD 46177-3815",
                "description": "Omnis delectus nulla laudantium veritatis voluptates. Facere iste voluptatem reprehenderit porro voluptate. Ipsum perferendis rerum beatae.",
                "lat": "-55.345867",
                "lng": "-52.012190",
                "slug": "virgie-klein-ii",
                "clinic_type_id": 8,
                "deleted_at": null,
                "created_at": "2018-08-17 13:46:21",
                "updated_at": "2018-08-17 13:46:21",
                "images": [
                    {
                        "id": 1,
                        "path": "http://127.0.0.1:8000/images/clinic-2.png",
                        "clinic_id": 1,
                        "created_at": "2018-08-17 13:46:22",
                        "updated_at": "2018-08-17 13:46:22"
                    },
                    {
                        "id": 2,
                        "path": "http://127.0.0.1:8000/images/clinic-5.png",
                        "clinic_id": 1,
                        "created_at": "2018-08-17 13:46:22",
                        "updated_at": "2018-08-17 13:46:22"
                    },
                    {
                        "id": 3,
                        "path": "http://127.0.0.1:8000/images/clinic-5.png",
                        "clinic_id": 1,
                        "created_at": "2018-08-17 13:46:22",
                        "updated_at": "2018-08-17 13:46:22"
                    }
                ],
                "clinic_type": {
                    "id": 8,
                    "name": "quidem"
                }
            }
        ]
    },
    "code": 200
}
```

### `GET` Clinic
```
/api/clinics/{id}
```
Get detail clinic

#### Parameter
| Field | Type | Description |
|-------|------|-------------|
| id | Integer | Id of Clinic |

#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json

#### Example
| URL | Description |
|---|---|
| /api/clinics/1 | Get clinic with id = 1 |

#### Response
* _Success_
```json
{
    "result": {
        "id": 1,
        "name": "Virgie Klein II",
        "email": "macejkovic.max@example.net",
        "phone": "84594843121",
        "address": "27365 Aniyah ShoalsNew Martina, SD 46177-3815",
        "description": "Omnis delectus nulla laudantium veritatis voluptates. Facere iste voluptatem reprehenderit porro voluptate. Ipsum perferendis rerum beatae.",
        "lat": "-55.345867",
        "lng": "-52.012190",
        "slug": "virgie-klein-ii",
        "clinic_type_id": 8,
        "deleted_at": null,
        "created_at": "2018-08-17 13:46:21",
        "updated_at": "2018-08-17 13:46:21",
        "images": [
            {
                "id": 1,
                "path": "http://127.0.0.1:8000/images/clinic-2.png",
                "clinic_id": 1,
                "created_at": "2018-08-17 13:46:22",
                "updated_at": "2018-08-17 13:46:22"
            },
            {
                "id": 2,
                "path": "http://127.0.0.1:8000/images/clinic-5.png",
                "clinic_id": 1,
                "created_at": "2018-08-17 13:46:22",
                "updated_at": "2018-08-17 13:46:22"
            },
            {
                "id": 3,
                "path": "http://127.0.0.1:8000/images/clinic-5.png",
                "clinic_id": 1,
                "created_at": "2018-08-17 13:46:22",
                "updated_at": "2018-08-17 13:46:22"
            }
        ],
        "clinic_type": {
            "id": 8,
            "name": "quidem"
        }
    },
    "code": 200
}
```
* _Fail_
```json
{
    "error": "Clinic not found",
    "code": 404
}
```
