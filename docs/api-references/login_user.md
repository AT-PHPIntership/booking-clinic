## `POST` login user
```
/api/auth/login
```
Login user
#### Request Headers
| Key | Value |
|---|---|
|Accept|application/json
#### Response
* _Success_
```json
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijk3NDA5M2U4ZjRlZDU2ZjBkNDUyMzMyM2Q4NjcxYzE1NDZmZjMyYmEyZmNkNjA3YzZhY2Q5MTM3MTRjOGFjMjI5ODY3NTRiYTdjNDdhZTY0In0.eyJhdWQiOiIxIiwianRpIjoiOTc0MDkzZThmNGVkNTZmMGQ0NTIzMzIzZDg2NzFjMTU0NmZmMzJiYTJmY2Q2MDdjNmFjZDkxMzcxNGM4YWMyMjk4Njc1NGJhN2M0N2FlNjQiLCJpYXQiOjE1MzQyNTUzODMsIm5iZiI6MTUzNDI1NTM4MywiZXhwIjoxNTY1NzkxMzgzLCJzdWIiOiI1NyIsInNjb3BlcyI6W119.IBXB5aiJRSnEI1XrOBajLLNZDklrHbnEeP3mCziF9WW-zXxx2A-HFxp1Tn6nhJh8slUqjUzpYPOpDAXnxH_G93ATGZuQ2H8LcSJeA6bQQOdoMA_UXx3zunzjTU4MtUUmTeMTFOYyF-wuUj37Ipr6zhHd6Bt2ol0fRoOls9zUpcFqS1RaBPuE1CBQVoyS7b4lFsgQVu_gRiYgwHOjLX3CR2ZaUWm0lnpJiykYo9kS96vGo0SPu1snv4ia1YylW07DDDTAqsPRUNE0Y1pyACNb7kzY2WYIoPI_nN9nzHgIVU9_BvLQXKPXclAyOawFGQ-AxSISYP9nK9S65CUuSzKVzRab0yFdiLb02piNbp6UeK1q5vF9-T4Gfu37FUjzbQjd40ySc6LmZRVv1Ypq1hpzbfcO4ccxavf3zRF2LQaz3uTutXtwTNBl2N_1ivKXSrpfzh9Fd6Jz8OGgYiVsS9te1JxUQcMeugUlQN06noBNkSO3WCjJXx7zKkGsz_13lM8HOz28UU-faJnDsr5335e0_skHTeZPzWj-wWV5I26RFZKKEVjdKgLd0yXke2gEzfN7t11ZsJDkzylYUMcjIffxpDeIF9L8E8iuoNqvd_OZLJWDPaISDUeANMNqHhDXemJj6yysLlqrZp436pngeBhHmqgaY8QpShsEv9eOqgu-waQ",
    "token_type": "Bearer",
    "expires_at": "2019-08-14 21:03:03"
}
```
* _Error_
``` json
{
    "error": "Unauthorized",
    "code": 401
}
```
