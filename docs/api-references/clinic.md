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
            "last_page": 18,
            "last_page_url": "http://127.0.0.1:8000/api/clinics?page=18",
            "next_page_url": "http://127.0.0.1:8000/api/clinics?page=2",
            "path": "http://127.0.0.1:8000/api/clinics",
            "per_page": "3",
            "prev_page_url": null,
            "to": 3,
            "total": 52
        },
        "data": [
            {
                "id": 1,
                "name": "Miss Ashly Beahan II",
                "email": "price.albert@example.net",
                "phone": "02193934835",
                "address": "82088 Vivianne StravenueAlejandrinburgh, DE 55195-1910",
                "description": "Commodi perferendis officiis impedit autem nihil esse. Ea voluptatem tempora nam similique repellat. Unde optio illum molestiae quod qui.",
                "lat": "-80.779429",
                "lng": "-95.977483",
                "slug": "miss-ashly-beahan-ii",
                "clinic_type_id": 8,
                "deleted_at": null,
                "created_at": "2018-08-08 03:38:29",
                "updated_at": "2018-08-08 03:38:29"
            },
            {
                "id": 2,
                "name": "Natalie Huel IV",
                "email": "tremblay.aurelio@example.net",
                "phone": "0366775442",
                "address": "13071 Christiansen BranchPort Sandyside, DE 00473",
                "description": "Ut illo labore quibusdam iste ducimus vero qui. Quo vel rerum soluta fugit et eos deserunt. Molestias voluptatum ipsa soluta perspiciatis ab.",
                "lat": "-42.188129",
                "lng": "-138.517511",
                "slug": "natalie-huel-iv",
                "clinic_type_id": 9,
                "deleted_at": null,
                "created_at": "2018-08-08 03:38:29",
                "updated_at": "2018-08-08 03:38:29"
            },
            {
                "id": 3,
                "name": "Prof. Cole Ebert V",
                "email": "shanel.swaniawski@example.org",
                "phone": "02101415905",
                "address": "63684 Hintz SpringsLabadiefurt, ND 74008-9941",
                "description": "A nostrum in voluptas. Aliquam excepturi tenetur at sapiente distinctio sed accusantium. Enim et voluptas minima neque. Provident facere vel mollitia.",
                "lat": "-82.969071",
                "lng": "152.940602",
                "slug": "prof-cole-ebert-v",
                "clinic_type_id": 10,
                "deleted_at": null,
                "created_at": "2018-08-08 03:38:29",
                "updated_at": "2018-08-08 03:38:29"
            }
        ]
    },
    "code": 200
}
```
