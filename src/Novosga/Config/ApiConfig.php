<?php

/*
 * This file is part of the Novo SGA project.
 *
 * (c) Rogerio Lino <rogeriolino@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Novosga\Config;

/**
 * Api configuration file.
 *
 * @author Rogerio Lino <rogeriolino@gmail.com>
 */
class ApiConfig extends ConfigFile
{
    private static $instance;

    /**
     * @param array $prop
     *
     * @return ApiConfig
     */
    public static function getInstance($prop = null)
    {
        if (!self::$instance) {
            self::$instance = new AppConfig($prop);
        }

        return self::$instance;
    }

    public function name()
    {
        return 'api.php';
    }

    /**
     * Extra  configuration.
     *
     * @return array
     */
    public function extra()
    {
        return \Novosga\Util\Arrays::value($this->values(), 'extra', []);
    }

    /**
     * Extra route configuration.
     *
     * @return array
     */
    public function routes()
    {
        return \Novosga\Util\Arrays::value($this->extra(), 'routes', []);
    }
}
