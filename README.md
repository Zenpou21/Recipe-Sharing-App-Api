# Recipe Sharing App API

A RESTful API built with Laravel for sharing and managing recipes. This API allows users to create, read, update, and delete recipes with structured ingredient data.

## Features

-  Full CRUD operations for recipes
-  Structured ingredient format with name, unit, and quantity
-  JSON responses
-  Request validation

## Technologies Used

- **Laravel** - PHP Framework
- **MySQL** - Database
- **PHP** - Backend Language
- **Composer** - Dependency Manager

## Requirements

- PHP >= 8.1
- Composer
- MySQL or MariaDB
- Laravel 10.x

## Installation

1. **Clone the repository**
```bash
git clone https://github.com/Zenpou21/Recipe-Sharing-App-Api.git
cd Recipe-Sharing-App-Api
```

2. **Install dependencies**
```bash
composer install
```

3. **Environment setup**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure database**

Edit your `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=recipe_sharing_db
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run migrations**
```bash
php artisan migrate
```


1. **Start the development server**
```bash
php artisan serve
```

## Database Structure

### Recipes Table
- `id` - Primary key
- `title` - Recipe name (string)
- `ingredients` - JSON array of ingredients with structure:
  ```json
  [
    {
      "name": "Ingredient name",
      "unit": "Measurement unit",
      "quantity": "Amount"
    }
  ]
  ```
- `instructions` - Cooking instructions (text)
- `timestamps` - Created at and Updated at

## API Endpoints

Base URL: `https://rsa-api.flowcsolutions.com/api`

### Get All Recipes
```http
GET /recipes
```

**Response:**
```json
[
  {
    "id": 1,
    "title": "Chicken Adobo",
    "ingredients":  "[{\"name\":\"Chicken\",\"unit\":\"kg\",\"quantity\":\"1\"}]",
    "instructions": "Cooking instructions here...",
    "created_at": "2026-02-14T00:00:00.000000Z",
    "updated_at": "2026-02-14T00:00:00.000000Z"
  }
]
```

### Get Single Recipe
```http
GET /recipes/{id}
```

**Response:**
```json
{
  "id": 1,
  "title": "Chicken Adobo",
  "ingredients": "[{\"name\":\"Chicken\",\"unit\":\"kg\",\"quantity\":\"1\"}]",
  "instructions": "Cooking instructions here...",
  "created_at": "2026-02-14T00:00:00.000000Z",
  "updated_at": "2026-02-14T00:00:00.000000Z"
}
```

### Create Recipe
```http
POST /recipes
```

**Request Body:**
```json
{
  "title": "New Recipe",
  "ingredients": [
    {
      "name": "Chicken",
      "unit": "kg",
      "quantity": "1"
    },
    {
      "name": "Garlic",
      "unit": "cloves",
      "quantity": "6"
    }
  ],
  "instructions": "Step by step cooking instructions..."
}
```

**Response:**
```json
{
  "message": "Recipe created successfully"
}
```

### Update Recipe
```http
PUT /recipes/{id}
PATCH /recipes/{id}
```

**Request Body:**
```json
{
  "title": "Updated Recipe Name",
  "ingredients": [
    {
      "name": "Chicken",
      "unit": "kg",
      "quantity": "1.5"
    }
  ],
  "instructions": "Updated cooking instructions..."
}
```

**Response:**
```json
{
  "message": "Recipe updated successfully"
}
```

### Delete Recipe
```http
DELETE /recipes/{id}
```

**Response:**
```json
{
  "message": "Recipe deleted successfully"
}
```

## Testing with Postman/Insomnia

1. Import the API endpoints
2. Set base URL to `https://rsa-api.flowcsolutions.com/api`
3. Add `Accept: application/json` header
4. Add `Content-Type: application/json` header for POST/PUT requests

## Project Structure

```
Recipe-Sharing-App-Api/
├── app/
│   ├── Http/Controllers/
│   │   └── RecipeController.php
│   └── Models/
│       └── Recipe.php
├── database/
│   ├── migrations/
│   │   └── 2026_02_12_231650_create_recipes_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── RecipeSeeder.php
├── routes/
│   └── api.php
└── README.md
```
