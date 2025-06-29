# Mobile Shop Management System

A **Laravel-based web portal** for managing mobile phone sales, supporting multiple user roles: **Cashiers**, **Admins**, and **Super Admins**.

![GitHub repo size](https://img.shields.io/github/repo-size/affan-ch/Mobile-Shop-POS)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/affan-ch/Mobile-Shop-POS)

---

## 🚀 Features

* 📱 Sell and manage mobile phones
* 👥 Role-based access control (Cashier, Admin, Super Admin)
* 📦 Inventory management
* 🧾 Invoice generation and printing
* 🛠️ Warranty claim handling
* 📊 Comprehensive reporting system
* 🔐 Secure authentication & authorization
* ⚙️ Admin and Super Admin dashboards with full control

---

## ✅ Fully Implemented Modules

### 🔹 Shop Dashboard

1. **Login**

   * Simple login using Email & Password.

2. **Dashboard**

   * Displays shop name and number of products.

3. **Inventory Management**

   * Add, view, search, edit, and delete products.
   * View detailed product information.

4. **Point of Sale (POS)**

   * View/search products, add custom price and quantity.
   * Capture customer details, apply discount.
   * Save and print invoice.

5. **Invoices**

   * Total sales (this month & overall).
   * Search, view, and print all invoices.

6. **Warranty**

   * Search invoice by ID and validate warranty.
   * Add claim (quantity cannot exceed purchase qty, within warranty period).
   * Save and print claim invoice.

7. **Claims**

   * Search claims by ID and view all claims.

---

### 🔸 Admin Panel

1. **Login**

2. **Dashboard**

   * Displays total number of shops under the admin.

3. **Shops Management**

   * View, search, edit (name/email/password/access).
   * View shop-specific inventory, sales, and warranty claims.
   * Delete shop.

4. **Reports**

   * Generate and download Sales, Warranty, Inventory, Revenue, and Discount reports.
   * Filter by shop (all or selected), start date, and end date.

---

### 🔸 Super Admin Panel

1. **Login**

2. **Dashboard**

   * Overview of number of admins and shops.

3. **Admins Management**

   * Add, edit (name, email, access), change password.
   * Search and delete admins.

4. **Shops Management**

   * Add, edit (name, email, password, access).
   * Assign admins to shops.
   * View assigned admins.
   * View specific shop’s inventory, sales, and claims.
   * Delete and search shops.

5. **Reports**

   * Generate and download (Excel) Sales, Warranty, Inventory, Revenue, and Discount reports.
   * Filterable by shop(s), start and end dates.

> ⚠️ **Note**: If a shop’s access is blocked by **either Admin or Super Admin**, the shop **cannot log in**.

---

## 🛠️ Tech Stack

* **Backend**: Laravel (PHP)
* **Frontend**: Blade (Laravel Templating Engine)
* **Database**: MySQL

---

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
   Update your `.env` file with DB credentials.

5. **Run migrations**

```bash
php artisan migrate
```

6. **Start the server**

```bash
php artisan serve
```

---

## 👥 User Roles

| Role            | Description                                               |
| --------------- | --------------------------------------------------------- |
| **Cashier**     | Handles inventory, POS, invoices, warranty & claims       |
| **Admin**       | Manages shops, inventory, sales, and report generation    |
| **Super Admin** | Full system control: admins, shops, access, and reporting |

---

## 📄 License

This project is licensed under the [MIT License](LICENSE).

---

Feel free to contribute or customize it to suit your mobile shop’s specific needs!
