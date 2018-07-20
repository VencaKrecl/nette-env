<?php
/**
 * Created by PhpStorm.
 * User: Václav Krecl
 * Date: 20.7.18
 * Time: 14:51
 */

namespace NetteEnv;

/**
 * Class NetteEnv
 *
 * @package NetteEnv
 */
class NetteEnv
{

    /**
     * @var array
     */
    private $envs = [];

    /**
     * @param $name
     * @param $defaultValue
     *
     * @return NetteEnv
     */
    public function add($name, $defaultValue)
    {
        $this->envs[$name] = $defaultValue;

        return $this;
    }

    /**
     * @return array
     */
    public function getEnvs()
    {
        $envs = [];
        foreach ($this->envs as $name => $defaultValue) {
            $value = getenv($name);

            if ($value) {
                $envs[$name] = $value;
            } else {
                $envs[$name] = $defaultValue;
            }
        }

        return $envs;
    }

}