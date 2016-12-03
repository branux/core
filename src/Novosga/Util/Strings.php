<?php

/*
 * This file is part of the Novo SGA project.
 *
 * (c) Rogerio Lino <rogeriolino@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Novosga\Util;

/**
 * Strings Utils.
 *
 * @author Rogerio Lino <rogeriolino@gmail.com>
 */
class Strings
{
    const REGEX_PARAMS = '/{([A-z0-9}]*)}/';

    public static function getParameters($str)
    {
        $matchs = [];
        preg_match_all(self::REGEX_PARAMS, $str, $matchs);

        return $matchs;
    }

    public static function format($str, array $args = [])
    {
        foreach ($args as $k => $v) {
            $str = str_replace('{'.$k.'}', $v, $str);
        }

        return $str;
    }

    public static function doubleQuoteSlash($str)
    {
        return str_replace('"', '\"', $str);
    }

    public static function sqlLikeParam($str, $leftWildcard = true, $rightWildcard = true)
    {
        $str = implode('%', explode(' ', trim($str)));
        if ($leftWildcard) {
            $str = "%{$str}";
        }
        if ($rightWildcard) {
            $str = "{$str}%";
        }

        return $str;
    }
}
