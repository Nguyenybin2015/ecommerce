# KingShoe API Project

This is an KingShoe API project developed by group 4.

## Table of Contents

- [Description](#description)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [API Endpoints](#endpoints)
- [Postman Collection](#postman-collection)

<div id='description'/>
## Description

This repository contains the source code for an e-commerce API developed using PHP. The API provides endpoints for user registration, login, managing products, shopping cart functionality, and more.

<div id='features'/>
## Features

List the key features of your e-commerce project. For example:
- User authentication
- Product catalog
- Shopping cart functionality
- Checkout process
- Order tracking

<div id='installation'/>
## Installation

Describe how to install and set up your project locally. Include any dependencies that need to be installed and provide step-by-step instructions.

```bash
# Clone the repository
git clone https://github.com/Nguyenybin2015/ecommerce.git

# Change into the project directory
cd ecommerce

# Install dependencies
composer require firebase/php-jwt

# Run init database file
```


<div id='postman-collection'/>
## Postman Collection

For detailed API documentation and examples, you can refer to the [Postman Collection](https://www.getpostman.com/collections/0e38cb6c-b88a-4988-98f0-ac3d4a8d13a8) associated with this project.

<div id='endpoints'/>
## API Endpoints

### 1. Register

- **Method:** POST
- **URL:** [http://localhost/api-ecommerce/api/controllers/register.php](http://localhost/api-ecommerce/api/controllers/register.php)
- **Request Body:**
  ```json
  {
      "name": "nhom4",
      "email": "nhom4@gmail.com",
      "password": "nhom4web"
  }
  ```

### 2. Login

- **Method:** POST
- **URL:** [http://localhost/api-ecommerce/api/controllers/login.php](http://localhost/api-ecommerce/api/controllers/login.php)
- **Request Body:**
  ```json
  {
      "email": "nhom4@gmail.com",
      "password": "nhom4web"
  }
  ```

### 3. Info User

- **Method:** GET
- **URL:** [http://localhost/api-ecommerce/api/controllers/user.php](http://localhost/api-ecommerce/api/controllers/user.php)
- **Authentication:** Bearer Token

### 4. Add Product (ADMIN)

- **Method:** POST
- **URL:** [http://localhost/api-ecommerce/api/controllers/product.php](http://localhost/api-ecommerce/api/controllers/product.php)
- **Authentication:** Bearer Token
- **Request Body:**
  ```formdata
  {
      "nameProduct": "shoe01",
      "priceProduct": "100000",
      "idSizeProduct": "42",
      "idColorProduct": "1",
      "idBrandProduct": "1",
      "descriptionProduct": "glay 1",
      "amountProduct": "5",
      "imageFile": [Image File]
  }
  ```

### 5. Get a Product

- **Method:** GET
- **URL:** [http://localhost/api-ecommerce/api/controllers/product.php?id_shoe=31](http://localhost/api-ecommerce/api/controllers/product.php?id_shoe=31)
- **Authentication:** Bearer Token

### 6. Delete a Product

- **Method:** DELETE
- **URL:** [http://localhost/api-ecommerce/api/controllers/product.php?id_shoe=31](http://localhost/api-ecommerce/api/controllers/product.php?id_shoe=31)
- **Authentication:** Bearer Token

### 7. Get All Products (ADMIN)

- **Method:** GET
- **URL:** [http://localhost/api-ecommerce/api/controllers/getAllProduct.php](http://localhost/api-ecommerce/api/controllers/getAllProduct.php)
- **Authentication:** Bearer Token

### 8. Add Shopping Cart

- **Method:** POST
- **URL:** [http://localhost/api-ecommerce/api/controllers/shopping-cart.php](http://localhost/api-ecommerce/api/controllers/shopping-cart.php)
- **Authentication:** Bearer Token
- **Request Body:**
  ```formdata
  {
      "id_shoe": "1",
      "quantity": "10"
  }
  ```

### 9. Get User Shopping Cart

- **Method:** GET
- **URL:** [http://localhost/api-ecommerce/api/controllers/shopping-cart.php?id_user=6551d632d3c1c](http://localhost/api-ecommerce/api/controllers/shopping-cart.php?id_user=6551d632d3c1c)
- **Authentication:** Bearer Token

### 10. Update User Shopping Cart

- **Method:** PUT
- **URL:** [http://localhost/api-ecommerce/api/controllers/shopping-cart.php?id_order=6553c3e6dd250&quantity=14](http://localhost/api-ecommerce/api/controllers/shopping-cart.php?id_order=6553c3e6dd250&quantity=14)
- **Authentication:** Bearer Token

### 11. Delete User Shopping Cart

- **Method:** DELETE
- **URL:** [http://localhost/api-ecommerce/api/controllers/shopping-cart.php?id_order=6553c3e6dd250](http://localhost/api-ecommerce/api/controllers/shopping-cart.php?id_order=6553c3e6dd250)
- **Authentication:** Bearer Token

### 12. Update Product

- **Method:** PUT
- **URL:** [http://localhost/api-ecommerce/api/controllers/product.php?id_shoe=2&nameProduct=UpdateProduct&priceProduct=9876&idSizeProduct=41&idColorProduct=2&idBrandProduct=2&description=UpdateProduct](http://localhost/api-ecommerce/api/controllers/product.php?id_shoe=2&nameProduct=UpdateProduct&priceProduct=9876&idSizeProduct=41&idColorProduct=2&idBrandProduct=2&description=UpdateProduct)
- **Authentication:** Bearer Token

