ENV variables for Nette framework
================================= 

```php
// load configurator
$configurator = new Configurator();

$envs = new NetteEnv();
$envs
    ->add('MYSQL_HOST', 'mariadb')
    ->add('MYSQL_PORT', '3306')
    ->add('MYSQL_USER', 'root')
    ->add('MYSQL_PASSWORD', 'root')
    ->add('MYSQL_DBNAME', 'test');
    
$configurator->addDynamicParameters($envs->getEnvs());
```

```neon
database:
    dsn: 'mysql:host=%MYSQL_HOST%:%MYSQL_PORT%;dbname=%MYSQL_DBNAME%'
    user: %MYSQL_USER%
    password: %MYSQL_PASSWORD%
```