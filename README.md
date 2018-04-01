# Yii2 rbac example
------

need php support pdo_sqlite

1.  install
    composer update --prefer-dist

2.  applying migrations if you have them.

   ```
   ./yii migrate --migrationPath=@yii/rbac/migrations
   ./yii migrate
   ```


3. Start web server:

    ```
    ./yii serve
    ```

4. Now you can run all available tests

   ```
   # run all available tests
   vendor/bin/codecept run

   # run acceptance tests
   vendor/bin/codecept run acceptance

   # run only unit and functional tests
   vendor/bin/codecept run unit,functional
   
   # run single test
   vendor/bin/codecept run -- unit models/RbacTest
   
   # more
   # create new test
   vendor/bin/codecept ge:test unit models/Rbac
   ```
   
References:
- [Yii2 Security Authorization](https://www.yiiframework.com/doc/guide/2.0/en/security-authorization)