<?php
/**
 * @author Renan Liberato <renan.libsantana@gmail.com>
 */

namespace Auth\Service\TableGateway\Factory;

use Auth\Model\User;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

/**
 * DESCRIPTION
 * PHP Version: 7.0.6
 * Class UserTableFactory
 * @package Auth\Service\TableGateway\Factory
 * @author Renan Liberato <renan.libsantana@gmail.com>
 */
class UserTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $dbAdapter = $serviceLocator->get('authAdapter');
        $resultSetPrototype = new ResultSet();
        $resultSetPrototype->setArrayObjectPrototype(new User());

        return new TableGateway(User::TABLE, $dbAdapter, null, $resultSetPrototype);
    }
}