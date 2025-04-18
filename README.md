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
It allows you to add a custom “Brand” resource, with those features :

- Back Office Grid: creation, edition, deletion,
- Assignment to a category "automotive" or "electronics.",
- Workflow for brand validation by State Machine, 
- Association brands-products, and listing of branded products.
</p>

---

## Installation (Docker)
>**Note:** Only tested on a **Sylius v1.13 Docker Project**

1. Add the plugin to your `composer.json` file:
    ```
    docker compose exec php composer require majerome/sylius-workshop-plugin
    ```

2. Apply the git patch to set up the plugin:
    ```
    git apply vendor/majerome/sylius-workshop-plugin/src/Installer/majerome-workshop-plugin-sylius-1.13.patch
    ```

    > **Note:** You can revert that patch using *majerome-workshop-plugin-sylius-1.13-revert.patch* file instead

3. Get into the php container and flush the cache:
    ```
    make php-shell
    ```
    Then run:
    ```
    bin/console cache:clear
    ```
4. Generate the migrations:
    ```
    bin/console doctrine:migrations:diff
    ```
    >**Note:** Choose namespace ```[0] App\Migrations```.

5. Run the migration
    ```
    bin/console doctrine:migrations:execute --up "App\\Migrations\\VersionYYYYMMDDHHMMSSS"
    ```
    >**Note:** Replace YYYYMMDDHHMMSSS with the actual timestamp of the migration.

6. Load the fixtures:
    ```
    bin/console sylius:fixtures:load -n
    ```

7. Play with your new Brand resource! 

---

## Screenshots

![Demo](https://raw.githubusercontent.com/majerome/sylius-workshop-plugin/master/docs/demo.png)

