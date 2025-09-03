# Project Setup Guide

## Prerequisites
Ensure you have the following installed on your system:

- **XAMPP** (For Apache, MySQL, and PHP)
- **Composer** (Dependency Manager for PHP)
- **Git** (Optional but recommended)

---

## Installation on Windows

### 1. Install XAMPP
- Download and install XAMPP from [https://www.apachefriends.org/](https://www.apachefriends.org/).
- Open XAMPP Control Panel and start **Apache** and **MySQL**.

### 2. Install Composer
- Download and install Composer from [https://getcomposer.org/download/](https://getcomposer.org/download/).
- Verify installation using:
  ```sh
  composer --version
  ```

### 3. Clone the Laravel Project
```sh
git clone https://github.com/Zaid-Ahmed-404/Artfolio.git
cd your-project
```

### 4. Install Dependencies
```sh
composer install
```


Edit the `.env` file and set up database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=artfolio
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Generate Application Key
```sh
php artisan key:generate
```

### 8. Create Admin User
```sh
php artisan make:filament-user
```

### 8. Run Migrations
```sh
php artisan migrate
```


### 9. Start the Server
```sh
php artisan serve
```
Access the project at: [http://127.0.0.1:8000](http://127.0.0.1:8000)

# Screenshots
## Login

<img width="1846" height="934" alt="Image" src="https://github.com/user-attachments/assets/28762c44-c9ea-43c6-96e3-6420606344ef" />

## Images and Data from Api

<img width="1846" height="934" alt="Image" src="https://github.com/user-attachments/assets/72067217-3c0f-493f-8efd-f6f995bd6757" />

## Search Feature on Images

<img width="1846" height="934" alt="Image" src="https://github.com/user-attachments/assets/259b3084-6ccd-4920-84f8-881d8f71fa3f" />

## Add Image from computer

<img width="1846" height="934" alt="Image" src="https://github.com/user-attachments/assets/51586063-b3b4-4619-974f-e705fc5adaef" />

## Editing Image 

<img width="1846" height="934" alt="Image" src="https://github.com/user-attachments/assets/e3e61ab7-3fe0-473c-b649-40bb83ff58b8" />

## List of Images

<img width="1846" height="934" alt="Image" src="https://github.com/user-attachments/assets/b324b658-f336-4de9-8024-61c827693fd7" />


## Favorite Images

<img width="1846" height="934" alt="Image" src="https://github.com/user-attachments/assets/f3ab9431-3602-4495-92a4-be0f6aa8d263" />



