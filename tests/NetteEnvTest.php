<?php
/**
 * Created by PhpStorm.
 * User: Václav Krecl
 * Date: 20.7.18
 * Time: 10:24
 */

namespace Tests;

use Nette\DI\Container;
use NetteEnv\NetteEnv;
use PHPUnit\Framework\TestCase;

/**
 * Class NetteEnvTest
 *
 * @package Tests
 */
class NetteEnvTest extends TestCase
{

    /**
     * @covers NetteEnv::add()
     * @covers NetteEnv::getEnv()
     */
    public function testLoadEnvs()
    {
        putenv('MYSQL_HOST=test_host');
        putenv('MYSQL_PASSWORD=');

        $envs = new NetteEnv();
        $envs
            ->add('MYSQL_HOST', 'mariadb')
            ->add('MYSQL_PORT', '3306')
            ->add('MYSQL_USER', 'root')
            ->add('MYSQL_PASSWORD', 'root')
            ->add('MYSQL_DBNAME', 'test');

        $container = new Container($envs->getEnvs());

        $parameters = $container->getParameters();

        $this->assertArrayHasKey('MYSQL_HOST', $parameters);
        $this->assertSame('test_host', $parameters['MYSQL_HOST']);
        $this->assertArrayHasKey('MYSQL_PORT', $parameters);
        $this->assertSame('3306', $parameters['MYSQL_PORT']);
        $this->assertArrayHasKey('MYSQL_USER', $parameters);
        $this->assertSame('root', $parameters['MYSQL_USER']);
        $this->assertArrayHasKey('MYSQL_PASSWORD', $parameters);
        $this->assertSame('root', $parameters['MYSQL_PASSWORD']);
        $this->assertArrayHasKey('MYSQL_DBNAME', $parameters);
        $this->assertSame('test', $parameters['MYSQL_DBNAME']);
    }

}