# User Management System

## Overview

This project is a User Management System that uses Laravel as the backend to create an API and Vue.js for the frontend. The system allows an admin to perform CRUD (Create, Read, Update, Delete) operations on users. The project comes with seeded data that includes a default admin user.

## Features

- User authentication (login/logout)
- CRUD operations on users
- User listing
- User editing
- User deletion

## Technologies Used

- Laravel (Backend)
- Vue.js (Frontend)
- MySQL (Database)

## Project Structure

```
laravel-vue
├── laravel
│   ├── app
│   ├── bootstrap
│   ├── config
│   ├── database
│   │   ├── factories
│   │   ├── migrations
│   │   └── seeders
│   ├── public
│   ├── resources
│   ├── routes
│   ├── storage
│   └── tests
├── vuejs
│   ├── src
│   │   ├── assets
│   │   ├── components
│   │   ├── views
│   │   ├── App.vue
│   │   ├── main.js
│   └── public
└── README.md
```

## Getting Started

### Prerequisites

- PHP >= 7.4
- Composer
- Node.js >= 12.x
- NPM or Yarn
- MySQL

### Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/mealyus/laravel-vue.git
   cd laravel-vue
   ```

2. **Backend Setup** (Laravel):

   - Navigate to the `laravel` directory:
     ```bash
     cd laravel
     ```

   - Install Composer dependencies:
     ```bash
     composer install
     ```

   - Copy the `.env.example` to `.env` and configure your database settings:
     ```bash
     cp .env.example .env
     ```

   - Generate the application key:
     ```bash
     php artisan key:generate
     ```

   - Run migrations and seed the database:
     ```bash
     php artisan migrate --seed
     ```

3. **Frontend Setup** (Vue.js):

   - Navigate to the `vuejs` directory:
     ```bash
     cd ../vuejs
     ```

   - Install NPM dependencies:
     ```bash
     npm install
     # or
     yarn install
     ```

   - Build the frontend assets:
     ```bash
     npm run dev
     # or
     yarn dev
     ```

### Running the Application

- **Start the Laravel server**:
  ```bash
  cd ../laravel
  php artisan serve
  ```

- **Access the application**:
  Open your browser and navigate to `http://localhost:8000`.

### Default Admin User

- **Email**: `admin@example.com`
- **Password**: `admin!123`

### Usage

1. **Login**:
   - Use the default admin credentials to log in.

2. **User Management**:
   - After logging in, you will see a list of users.
   - You can add a new user, edit existing users, or delete users.

### API Endpoints

- **Login**: `POST /api/login`
- **Get Users**: `GET /api/users`
- **Create User**: `POST /api/users`
- **Update User**: `PUT /api/users/{id}`
- **Delete User**: `DELETE /api/users/{id}`

### Seeded Data

The project includes a seeder that creates a default admin user. You can find the seeder in `database/seeders/DatabaseSeeder.php` in the `laravel` directory.

### Contributing

If you wish to contribute to this project, please fork the repository and create a pull request with your changes.

### License

This project is licensed under the MIT License. See the `LICENSE` file for more details.

### Contact

For any issues or questions, please open an issue on GitHub.

---