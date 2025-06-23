# Mobile Shop Management System

A **Laravel-based web portal** for managing mobile phone sales, supporting multiple user roles: **cashiers**, **admins**, and **super admins**.

## 🚀 Features

- 📱 Sell and manage mobile phones
- 👥 Role-based access control (Cashier, Admin, Super Admin)
- 📦 Inventory management
- 📊 Sales tracking and reporting
- 🔐 Secure authentication & authorization
- ⚙️ Admin dashboard with user and store controls

## 🛠️ Tech Stack

- **Backend**: Laravel (PHP)
- **Frontend**: Blade
- **Database**: MySQL

## 🔧 Setup Instructions

1. **Clone the repository**
```bash
   git clone https://github.com/affan-ch/Mobile-Shop-POS.git
   cd mobile-shop-pos
  ```

2. **Install dependencies**

```bash
   composer install
   npm install && npm run dev
   ```

3. **Set up environment file**

```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   Update `.env` with your DB credentials.

5. **Run migrations**

```bash
   php artisan migrate
   ```

6. **Start the server**

```bash
   php artisan serve
   ```

## 👥 User Roles

| Role        | Permissions                                |
| ----------- | ------------------------------------------ |
| Cashier     | Create and process sales                   |
| Admin       | Manage inventory and oversee sales         |
| Super Admin | Full access: manage users, roles, and data |

## 📄 License

This project is licensed under the [MIT License](LICENSE).

---

Feel free to contribute or customize for your own shop's needs!

