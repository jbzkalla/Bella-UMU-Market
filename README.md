# Bella UMU Market

Bella UMU Market is the official student-to-student marketplace designed specifically for the Uganda Martyrs University community. Our platform provides a safe, reliable, and affordable way for students to exchange goods—whether it's electronics for study, furniture for hostels, or textbooks for the next semester.

## Features

- **Storefront & Categories**: Browse clearly defined categories like Home & Living, Books & Stationery, Men's Fashion, and more.
- **Student Community Feed**: Connect, ask questions, and share updates with fellow UMU students in the community section.
- **Dynamic Cart & Checkout**: Modern shopping cart system with seamless checkout functionality.

## Account Roles & Login Instructions

Bella UMU Market supports three distinct account types. Below are the real credentials for accounts currently registered in the system:

---

### 1. User (Buyer / Personal Account)
Users can browse, add to cart, and purchase items.
- **Registration**: `http://localhost/bella/E-Market-Place/source/signUp.php` → Select **Personal**
- **Login URL**: `http://localhost/bella/E-Market-Place/source/signIn.php`

#### Live Account in System:
| Name | Email | Password | Type |
|---|---|---|---|
| Abenawe Reachel | abenawe.racheal@stud.umu.ac.ug | *(set at registration — use your own)* | Personal |

> **Note:** User passwords are securely hashed (bcrypt) in the database. If you need to test with this account, use the password you set when you registered it, or create a new Personal account via the sign-up page.

---

### 2. Seller (Business Account)
Sellers can create a store profile, upload products, and manage their inventory.
- **Registration**: `http://localhost/bella/E-Market-Place/source/signUp.php` → Select **Business**
- **Login URL**: `http://localhost/bella/E-Market-Place/source/signIn.php`

> There are no active Business accounts in the system yet. Register one via the sign-up page.

---

### 3. Administrator
Admins manage the platform from the built-in Admin Dashboard.
- **Login URL**: `http://localhost/bella/E-Market-Place/source/signIn.php` → Click **Administrator Portal**

#### Live Admin Account in System:
| Name | Email | Password |
|---|---|---|
| kato | katoj589@gmail.com | admin1234 |

The Administrator Portal gives full access to:
- Platform-wide metrics (Buyers, Sellers, Products)
- User & Seller management (Edit / Drop)
- Product management (Edit / Drop)

---

## Technology Stack

- PHP
- HTML & CSS (Custom modern design layout)
- JavaScript
- MySQL
