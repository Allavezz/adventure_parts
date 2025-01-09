# Backend Project - Adventure Parts

This is my frontend project for the Full Stack Web development course that I'm taking at [FLAG](https://https://flag.pt/curso/full-stack-web-developer).

## Table of contents

- [Usage](#usage) -[Download required tools](#download-required-tools) -[Configuration](#configuration) -[Install Depencencies](#install-dependencies)
- [Overview](#overview)
  - [Context](#context)
  - [The challenge](#the-challenge)
  - [The solution](#the-solution) -[Screenshots](#screenshots)
- [Process](#process) -[Built with](#built-with) -[Technics and Tools](#technics-and-tools)
- [Improvements and Future](#imporvements-and-future)

## Usage

Here are the steps to start this project.
This project uses LAMP/MAMP.

Clone or Download this repository to start.

### Download required tools

Download and install MAMP/XAMP/etc.
Download and install the latest PHP.

### Configuration

Store the project folder in the htdocs folder (htdocs must be empty!).

Create a .ENV file at the root of the project with:
DB_HOST = "localhost"
DB_NAME = "backend_project"
DB_USER = "root"
DB_PASSWORD = ""
(might be different to windows users).

Run MAMP/XAMP/etc.
Turn ON Apache, MySQL and PHP.
Go to localhost/phpMyAdmin5 and import the database provided in the project folder.

### Install Depencencies

`npm install`

atm the only dependency of this project is Sass.
You can use it my running: sass --watch scss:css on your terminal

Backoffice--
admin@admin.com
12345678

## Overview

### Context

Backend project for my course at [FLAG](https://https://flag.pt/curso/full-stack-web-developer).

Requirements for the project:

- Extensive use of PHP + MySQL.
- Use REST fundamentals correctly when creating APIs.
- Use MVC pattern: Models, Views, Controllers.
- Use GIT.
- Create frontoffice.
- Create backoffice.
- Implement all necessary CRUD functionalities.
- Safe authentication across all the backoffice
- Usage of some AJAX
- Usage of a .ENV file to store sensitive information
- Use all the standard validation and sanitization to prevent SQL Injection, XSS and CSRF.
- Send correct http status codes and error messages.

### The challenge

The client its a company that builds aftermarket parts for several motorcycles.
The request is to build a platform where potential users can learn about the company, about the packages available to purchase, can order buy the packages, leave queries to the company.
The company must be able to do CRUD operations and manage everything independently. Example, doing CRUD of the categories, products, stock, prices, products descriptions, user shipping details, admins, etc.

### The solution

A complete PHP multipage aplication with:

- Homepage: A Image slider where the company can highlight products to increase the sales. A section with all the categories available with links to a gallery with all the products filtered for that category. A section with information about the company.

- Parts: A page where the user can filter and see all the products by desired category, with a link on echa product to a page with all the product details like features, stock, price and more.

- Contact: A page with a detailed form where the users can submit all the desired queries.

- Cart: A modern cart with ajax where users can quicly change quantities or remove products.

- Backoffice: backoffice with all the tools and pages necessary to autonomously operate the website, and be able to do bussiness without any constrains.

### Screenshots

![](./screenshots/Captura%20de%20ecrã%202024-10-30,%20às%2023.39.34.png)
![](./screenshots/Captura%20de%20ecrã%202024-10-30,%20às%2023.40.35.png)

## Process

### Built with

- SEmantic HTML5 markup
- PHP: Hypertext Preprocessor
- CSS
- JavaScript
- Sass

### Technics and tools

tbd

## Improvements and future

Improvements:

- Create email verification at register.
- Create a user profile area where users can update information, see purchase history, see bills, etc.
- Create more content section for the products.
- Implement php mailer to send the contact queries to the company email as well.
- Implement payment methods.
- Severely AJAX the backoffice.

Future:

- Keep learning more and more about PHP.
