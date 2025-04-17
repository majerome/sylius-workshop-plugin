<h1 align="center">Majerome Sylius Workshop Plugin</h1> 

<div align="center">

![Sylius](https://img.shields.io/badge/sylius-1.13-brightgreen)
![Packagist Version](https://img.shields.io/packagist/v/majerome/sylius-workshop-plugin)
![Packagist Downloads](https://img.shields.io/packagist/dt/majerome/sylius-workshop-plugin)
![Maintenance](https://img.shields.io/maintenance/no/2025)
![License](https://img.shields.io/badge/license-MIT-blue)

</div>

![Sylius](https://sylius.com/wp-content/uploads/2021/03/sylius-logo_sylius-logo-light-1024x422.jpg)

[Sylius Practical Mastery Course](https://academy.sylius.com/course/sylius-practical-mastery-course/)

[Chapter 25.2 - How to create a Plugin](https://academy.sylius.com/lesson/25-2-how-to-create-a-plugin/)

---

<p>
This plugin is the product of Sylius training. 
It allows you to add a “Brand” entity, with those features :

- Back Office Grid: creation, edition, deletion,
- Assignment to a category "automotive" or "electronics.",
- Workflow for brand validation by State Machine, 
- Association brands-products, and listing of branded products.
</p>

---

## Installation

1. Add the plugin to your `composer.json` file:
```
composer require majerome/sylius-workshop-plugin --no-scripts
```

2. Empty the cache:
```
bin/console cache:clear
```
3. Apply the migrations:
```
bin/console sylius:migrations:diff
```
- Choose namespace ```
[0] App\Migrations```  .

- Execute the migration:
```
[WARNING] You have 1 available migrations to execute.
Are you sure you want to execute the migrations? (yes/no) [yes]:
```

4. Load the fixtures:
```
bin/console sylius:fixtures:load -n
```

---

## Screenshots

![Demo](https://raw.githubusercontent.com/majerome/sylius-workshop-plugin/master/docs/demo.png)

