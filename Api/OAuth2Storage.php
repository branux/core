<?php

/*
 * This file is part of the Novo SGA project.
 *
 * (c) Rogerio Lino <rogeriolino@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Novosga\Api;

use Novosga\Security;
use OAuth2\Storage\Pdo;

/**
 * OAuth2Storage.
 *
 * @author Rogerio Lino <rogeriolino@gmail.com>
 */
class OAuth2Storage extends Pdo
{
    private $em;

    public function __construct(\Doctrine\ORM\EntityManager $em, $config = [])
    {
        $conn = $em->getConnection()->getWrappedConnection();
        parent::__construct($conn, $config);
        $tableName = $em->getClassMetadata('Novosga\Entity\OAuthClient')->getTableName();
        $this->config['client_table'] = $tableName;
        $this->em = $em;
    }

    protected function checkPassword($user, $password)
    {
        return $user['senha'] == Security::passEncode($password);
    }

    public function getUser($username)
    {
        $query = $this->em->createQuery('SELECT e FROM Novosga\Entity\Usuario e WHERE e.login = :username');
        $query->setParameter('username', $username);
        $user = $query->getOneOrNullResult();

        if (!$user) {
            return false;
        }

        // the default behavior is to use "username" as the user_id
        return array_merge(['user_id' => $username], $user->jsonSerialize());
    }

    public function setUser($username, $password, $firstName = null, $lastName = null)
    {
    }
}
