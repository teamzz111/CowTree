# CowTree

CowTree is a web-based cattle management system. Ranches (*ganaderías*) use it to keep a registry of their animals, track each animal's lineage, and view it as an interactive **family tree**.

> **Context:** early-career / university project (2018). It is kept here as a portfolio reference and is no longer maintained.

Live demo (historical): http://andreslargo.com/cowtree

## Features

- **Login and users** with a role per user (*cargo*), each linked to a ranch.
- **Ranch registry**: name, location, ranch colors (*divisa*), bloodlines (*encastes*) and lines.
- **Animal registry** with detailed records: name, status, destination, age, sex, branding and weaning, birth date, bloodline, phenotype, defects, rating, behavior, and father and mother.
- **Genealogy trees**: create named trees from the registered animals and their parents, render them graphically (JointJS), and reassign parents when records change.
- **Dashboard** with totals and tables of registered users, cattle and ranches.
- **PDF reports** of the registered herd (TCPDF).

## Tech stack

PHP · MySQL · JavaScript / jQuery · JointJS · Bootstrap · C3.js / D3 · TCPDF · PHPMailer

## Project structure

```
index.html, login.html   Landing and login pages
app/                     Dashboard and forms (ranches, animals, trees, reports, PDF)
backend/                 PHP endpoints (login, create/update animals, ranches, users, parents)
backend/Arbol/           Tree rendering (JointJS)
backend/schema.sql       MySQL schema (structure only)
```

## Running locally

1. Import `backend/schema.sql` into a MySQL database (it creates an empty `cowtree` database).
2. Set the database connection values in `backend/Conexion.php`.
3. Serve the project root with PHP (for example XAMPP, or `php -S localhost:8000`) and open `login.html`.

## Team

Andrés Largo ([@teamzz111](https://github.com/teamzz111)) and Erika Infante ([@MonoAncestral](https://github.com/MonoAncestral)).
