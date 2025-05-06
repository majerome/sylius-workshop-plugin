<h1 align="center">Majerome Sylius Workshop Plugin</h1> 

<div align="center">

![Sylius](https://img.shields.io/badge/sylius-1.14-brightgreen)
![Packagist Version](https://img.shields.io/packagist/v/majerome/sylius-workshop-plugin)
![Packagist Downloads](https://img.shields.io/packagist/dt/majerome/sylius-workshop-plugin)
![Maintenance](https://img.shields.io/maintenance/no/2025)
![License](https://img.shields.io/badge/license-MIT-blue)

</div>

<div align="center">

<p align="center">
    <a href="https://sylius.com" target="_blank">
        <picture>
          <source media="(prefers-color-scheme: dark)" srcset="https://media.sylius.com/sylius-logo-800-dark.png">
          <source media="(prefers-color-scheme: light)" srcset="https://media.sylius.com/sylius-logo-800.png">
          <img alt="Sylius Logo." src="https://media.sylius.com/sylius-logo-800.png">
        </picture>
    </a>
</p>

[Sylius Practical Mastery Course](https://academy.sylius.com/course/sylius-practical-mastery-course/)

[Chapter 25.2 - How to create a Plugin](https://academy.sylius.com/lesson/25-2-how-to-create-a-plugin/)

[Chapter 26.3 - How to upgrade plugin to 1.14](https://academy.sylius.com/lesson/26-3-how-to-upgrade-plugin-to-1-14/)

</div>

---

<p>
This plugin is the product of Sylius training. 
It allows you to add a custom “Brand” resource, with those features :

- Back Office Grid: creation, edition, deletion,
- Assignment to a category "automotive" or "electronics",
- Workflow for brand validation by API / State Machine, 
- Association brands-products, and listing of branded products.
</p>

---

## Installation (Docker)
>**Notes:** 
> - 1st tested on a **Sylius v1.13 Docker Project**
> - Then tested on a **Sylius v1.14 Docker Project**
> - Make sure you're running a correctly installed version of the Sylius Docker project, and that you've **performed all the necessary migrations beforehand**.


1. Get the plugin from Composer
    ```
    docker compose exec php composer require majerome/sylius-workshop-plugin --no-scripts
    ```

2. Apply the git patch to set up the plugin:
    ```
    git apply vendor/majerome/sylius-workshop-plugin/src/Installer/majerome-workshop-plugin-sylius-1.14.patch
    ```

    > **Notes:** 
      > - You can revert that patch using *majerome-workshop-plugin-sylius-1.14-reverse.patch* file instead
      > - If you are using a Sylius v1.13 project, you can use the *majerome-workshop-plugin-sylius-1.13.patch* file instead.

3. Get into the php container and flush the cache:
    ```
    make php-shell
    ```
    Then run:
    ```
    bin/console cache:clear
    ```

4. Check if a migration is available:
   ```
   bin/console doctrine:migrations:list
   ```
   > **Note:** Available migrations have the status "not migrated".

   If not, create a new migration file:
   ```
   bin/console doctrine:migrations:diff
   ```
   >**Note:** Choose namespace ```[0] App\Migrations```.

5. Run the migration
   ```
   bin/console doctrine:migrations:migrate
   ```

6. Load the fixtures:
    ```
    bin/console sylius:fixtures:load -n
    ```

7. Play with your brand new "Brand" resource! 

---

## Screenshots

![Demo](https://raw.githubusercontent.com/majerome/sylius-workshop-plugin/master/docs/demo.png)
