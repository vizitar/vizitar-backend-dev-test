## Purchase Order Management API Documentation

This API provides endpoints for managing customers, products, and purchase orders in a purchase order registration system. It is built using the PHP Laravel framework and utilizes a relational database. By default, MySQL is used as the database engine, but users have the flexibility to choose between SQLite, MySQL, or Postgres based on their preferences.

### Requirements

- PHP >= 7.4
- Composer
- Laravel framework
- MySQL

### Installation

1. Install dependencies:

   ```bash
   composer install

2. Update the `.env` file with your database credentials. Example:

   ```dotenv
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=<db_name>
   DB_USERNAME=<username>
   DB_PASSWORD=<password>

3. Run the database migrations and seed the database:

   ```bash
   php artisan migrate --seed

## API Endpoints
The following tables list the available API endpoints along with their corresponding HTTP methods and descriptions.

### Customers
| Method | Endpoint            | Description                  |
|--------|---------------------|------------------------------|
| GET    | /api/customers      | Get all customers            |
| POST   | /api/customers      | Create a new customer        |
| PUT    | /api/customers/{id} | Update an existing customer  |
| DELETE | /api/customers/{id} | Delete a customer            |

#### JSON Request Example
```json
{
    "name": "John Doe",
    "email": "john@example.com",
    "address": "123 Main St"
}
```

### Products
| Method | Endpoint            | Description                  |
|--------|---------------------|------------------------------|
| GET    | /api/products       | Get all products             |
| POST   | /api/products       | Create a new product         |
| PUT    | /api/products/{id}  | Update an existing product   |
| DELETE | /api/products/{id}  | Delete a product             |

#### JSON Request Example
```json
{
    "name": "Product A",
    "description": "Description of Product A",
    "price": 10.99
}
```

### Purchase Orders
| Method | Endpoint                    | Description                          |
|--------|-----------------------------|--------------------------------------|
| GET    | /api/purchase-orders        | Get all purchase orders              |
| POST   | /api/purchase-orders        | Create a new purchase order          |
| PUT    | /api/purchase-orders/{id}   | Update an existing purchase order    |
| DELETE | /api/purchase-orders/{id}   | Delete a purchase order              |

#### JSON Request Example
```json
{
    "customer_id": 1,
    "status": "Open",
    "quantity": 5
}
```
