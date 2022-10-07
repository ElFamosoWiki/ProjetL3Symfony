<?php

namespace Container92zxPxv;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/src/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder01986 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerb7a0f = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesafe75 = [
        
    ];

    public function getConnection()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'getConnection', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'getMetadataFactory', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'getExpressionBuilder', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'beginTransaction', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->beginTransaction();
    }

    public function getCache()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'getCache', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->getCache();
    }

    public function transactional($func)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'transactional', array('func' => $func), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'wrapInTransaction', array('func' => $func), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'commit', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->commit();
    }

    public function rollback()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'rollback', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'getClassMetadata', array('className' => $className), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'createQuery', array('dql' => $dql), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'createNamedQuery', array('name' => $name), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'createQueryBuilder', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'flush', array('entity' => $entity), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'clear', array('entityName' => $entityName), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->clear($entityName);
    }

    public function close()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'close', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->close();
    }

    public function persist($entity)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'persist', array('entity' => $entity), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'remove', array('entity' => $entity), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'refresh', array('entity' => $entity), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'detach', array('entity' => $entity), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'merge', array('entity' => $entity), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'getRepository', array('entityName' => $entityName), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'contains', array('entity' => $entity), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'getEventManager', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'getConfiguration', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'isOpen', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'getUnitOfWork', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'getProxyFactory', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'initializeObject', array('obj' => $obj), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'getFilters', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'isFiltersStateClean', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'hasFilters', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return $this->valueHolder01986->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializerb7a0f = $initializer;

        return $instance;
    }

    public function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config)
    {
        static $reflection;

        if (! $this->valueHolder01986) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder01986 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder01986->__construct($conn, $config);
    }

    public function & __get($name)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, '__get', ['name' => $name], $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        if (isset(self::$publicPropertiesafe75[$name])) {
            return $this->valueHolder01986->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder01986;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder01986;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder01986;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder01986;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, '__isset', array('name' => $name), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder01986;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder01986;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, '__unset', array('name' => $name), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder01986;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder01986;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, '__clone', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        $this->valueHolder01986 = clone $this->valueHolder01986;
    }

    public function __sleep()
    {
        $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, '__sleep', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;

        return array('valueHolder01986');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerb7a0f = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerb7a0f;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerb7a0f && ($this->initializerb7a0f->__invoke($valueHolder01986, $this, 'initializeProxy', array(), $this->initializerb7a0f) || 1) && $this->valueHolder01986 = $valueHolder01986;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder01986;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder01986;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
