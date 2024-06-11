<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Project Name

## Introduction

Brief description of your project.

## Installation

**Clone the repository:**

   The ```git clone``` command copies an existing Git repository to your local machine. This command downloads all the files, branches, and commit history of the repository.
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
    ````
    Or
    ```
        php artisan db:seed --seed
    ```


