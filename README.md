# extend-example

1. A directory `src` created.
2. Controller was moved to the file `src\Controller\IndexControoler`.
3. Namespace `Example` registered in a composer as PSR-4 because PSR-0 is deprecated.
4. Autoload file of composer added to `public/index.php`.
5. A storage `CsvFileStorage` for work with csv files created in a folder `src/Storage`.
6. A model `IndexModel` keep a logic, to get data from a storage and to give data to a controller.
7. A `AbstractController` with a constructor created.
8. A `RestController` with default methods created.
9. A simple `JsonView` class created for use in controllers.