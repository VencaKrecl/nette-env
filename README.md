ENV variables helper for Nette framework
========================================

[![Packagist version][packagist]](https://packagist.org/packages/vencakrecl/nette-env)
[![License][license]](https://github.com/VencaKrecl/nette-env/blob/master/LICENSE)
[![Last test status][ci]](https://github.com/VencaKrecl/nette-env/actions?query=workflow%3ACI)

Installation
-------

```bash
composer install vencakrecl/nette-env
```

Usage
-----

* bootstrap.php
```php
use Nette\Configurator;
use NetteEnv\NetteEnv;

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

* config.neon
```neon
database:
    dsn: 'mysql:host=%MYSQL_HOST%:%MYSQL_PORT%;dbname=%MYSQL_DBNAME%'
    user: %MYSQL_USER%
    password: %MYSQL_PASSWORD%
```

[packagist]: https://img.shields.io/packagist/v/vencakrecl/nette-env
[license]: https://img.shields.io/packagist/l/vencakrecl/nette-env.svg?style=flat-square
[ci]: https://img.shields.io/github/workflow/status/VencaKrecl/nette-env/CI