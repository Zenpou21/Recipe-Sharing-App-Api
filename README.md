# Recipe Sharing App API

A RESTful API built with Laravel for sharing and managing recipes. This API allows users to create, read, update, and delete recipes with structured ingredient data.

## Features

- 📝 Full CRUD operations for recipes
- 🍲 Structured ingredient format with name, unit, and quantity
- 🇵🇭 Pre-seeded with Filipino food recipes
- 🔄 JSON responses
- ✅ Request validation

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
git clone <repository-url>
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

6. **Seed the database** (Optional - includes Filipino recipes)
```bash
php artisan db:seed
```

7. **Start the development server**
```bash
php artisan serve
```

The API will be available at `https://rsa-api.flowcsolutions.com/api`

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

## Seeded Recipes

The database includes 5 Filipino recipes:
1. **Chicken Adobo** - Classic Filipino braised chicken
2. **Sinigang na Baboy** - Sour pork soup
3. **Pancit Canton** - Stir-fried noodles
4. **Lumpia Shanghai** - Filipino spring rolls
5. **Kare-Kare** - Peanut-based oxtail stew

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

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
