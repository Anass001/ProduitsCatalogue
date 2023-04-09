# ProduitsCatalogue
Application de gestion de produits, construite avec Symfony (MySQL + Twig + Flex + Form + Bootstrap)

## Requirements
* PHP 8.1.0 or higher
* PDO-MySQL PHP extension enabled

## Installation
Clone the code repository and install its dependencies
```
$ git clone https://github.com/Anass001/ProduitsCatalogue my_project
$ cd my_project/
$ composer install
```

## Usage

There's no need to configure anything before running the application. There are
2 different ways of running this application depending on your needs:

**Option 1.** [Download Symfony CLI][4] and run this command:

```bash
$ cd my_project/
$ symfony serve
```

Then access the application in your browser at the given URL (<https://localhost:8000> by default).

**Option 2.** Use a web server like Nginx or Apache to run the application.

On your local machine, you can run this command to use the built-in PHP web server:

```bash
$ cd my_project/
$ php -S localhost:8000 -t public/
```
