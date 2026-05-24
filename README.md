[README.md](https://github.com/user-attachments/files/28187999/README.md)
# CRUD BLOG API

API CRUD Blog menggunakan Laravel Sanctum.

## Features
- Register
- Login
- Create Blog
- Get All Blog
- Update Blog
- Delete Blog
- Upload Image
- Authentication Sanctum

---

# Authentication

## Register

### Endpoint
POST /api/register

### Request Body

{
  "name": "Amanda",
  "email": "aamand@gmail.com",
  "password": "654321"
}
---

## Login

### Endpoint
POST /api/login

### Request Body

{
  "email": "aamand@gmail.com",
  "password": "654321"
}
---

# Blog API

Gunakan token login untuk semua endpoint blog.

## Headers

Authorization: Bearer TOKEN
Accept: application/json
---

## Create Blog

### Endpoint
POST /api/blogs

### Body
form-data

| KEY | TYPE |
|---|---|
| title | Text |
| description | Text |
| image | File |

---

## Get All Blog

### Endpoint
GET /api/blogs

---

## Update Blog

### Endpoint
POST /api/blogs/{id}

---

## Delete Blog

### Endpoint
DELETE /api/blogs/{id}
