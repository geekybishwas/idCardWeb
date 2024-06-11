<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Project Title :: ID Card Generator Application

## Introduction

The web application is developed using Laravel 11 and provides a platform for users to print ID cards dynamically. It includes an admin panel with options for uploading photos, entering details such as name, address, date of birth (DOB), card expiry date, and other necessary information for an ID card. The application is designed to be fully dynamic and user-friendly, catering to the printing needs of users without the ability to create new ID cards. User authentication is also implemented for security purposes.

![demo](https://github.com/geekybishwas/idCardWeb/assets/98906853/7c6fd5da-db5e-4200-89a1-439d8dea05db)


## Installation

**Clone the repository:**

The ```git clone``` command copies an existing Git repository to your local machine. This command downloads all the files, branches, and commit history of the repository

```bash
git clone git@github.com:geekybishwas/idCardWeb.git
cd idCardWeb
``` 
## Storage link 

The storage link command creates a symbolic link from public/storage to storage/app/public. This allows you to access the files stored in the storage/app/public directory through the public/storage URL

```bash 
php artisan storage:link
```
    
## Default admin account

To create a default admin account, run the following command:

```bash
php artisan db:seed --class=AdminSeeder
```
Or to run all seeder , run the following command:
```bash
php artisan db:seed --seed
```
**Admin DashBoard**

In the admin dashboard, the admin creates user ID cards. After creating an ID card, the dashboard looks like this:
![demo](https://github.com/geekybishwas/idCardWeb/assets/98906853/7c6fd5da-db5e-4200-89a1-439d8dea05db)

If no user ID card is created by the admin, the page appears blank as shown in below figure:
![Screenshot_20240611_234036](https://github.com/geekybishwas/idCardWeb/assets/98906853/ff6b6e68-3f8f-49b0-9a7b-229d1425c0fd)

In the admin dashboard, when admin click on an ID card, it navigates to the individual ID card page where edit, delete, and print buttons are available as shown in below figure:
![demo1](https://github.com/geekybishwas/idCardWeb/assets/98906853/aaa8646e-1a5c-46f4-9a73-421b7b329262)

**User DashBoard**

When the admin creates an ID card in the admin panel, it will be visible in the user panel only if the user's email is linked to that specific ID card, and the user dashbaord looks like this:
![Screenshot_20240611_232343](https://github.com/geekybishwas/idCardWeb/assets/98906853/fc437b2f-362b-4e4e-9720-e0f7721cb30f)





