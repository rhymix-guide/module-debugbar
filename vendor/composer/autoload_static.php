<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1d7ff4069bceab7bdaeace8c0e1a7947
{
    public static $files = array (
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php',
        'e57afc364d29a530a0874cbbfdf689e7' => __DIR__ . '/../..' . '/src/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
            'Symfony\\Component\\VarDumper\\' => 28,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'D' => 
        array (
            'DebugBar\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Php80\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php80',
        ),
        'Symfony\\Component\\VarDumper\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/var-dumper',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'DebugBar\\' => 
        array (
            0 => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar',
        ),
    );

    public static $classMap = array (
        'Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'DebugBar\\DataCollector\\AggregatedCollector' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/AggregatedCollector.php',
        'DebugBar\\DataCollector\\AssetProvider' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/AssetProvider.php',
        'DebugBar\\DataCollector\\ConfigCollector' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/ConfigCollector.php',
        'DebugBar\\DataCollector\\DataCollector' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/DataCollector.php',
        'DebugBar\\DataCollector\\DataCollectorInterface' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/DataCollectorInterface.php',
        'DebugBar\\DataCollector\\ExceptionsCollector' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/ExceptionsCollector.php',
        'DebugBar\\DataCollector\\LocalizationCollector' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/LocalizationCollector.php',
        'DebugBar\\DataCollector\\MemoryCollector' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/MemoryCollector.php',
        'DebugBar\\DataCollector\\MessagesAggregateInterface' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/MessagesAggregateInterface.php',
        'DebugBar\\DataCollector\\MessagesCollector' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/MessagesCollector.php',
        'DebugBar\\DataCollector\\PDO\\PDOCollector' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/PDO/PDOCollector.php',
        'DebugBar\\DataCollector\\PDO\\TraceablePDO' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/PDO/TraceablePDO.php',
        'DebugBar\\DataCollector\\PDO\\TraceablePDOStatement' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/PDO/TraceablePDOStatement.php',
        'DebugBar\\DataCollector\\PDO\\TracedStatement' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/PDO/TracedStatement.php',
        'DebugBar\\DataCollector\\PhpInfoCollector' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/PhpInfoCollector.php',
        'DebugBar\\DataCollector\\Renderable' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/Renderable.php',
        'DebugBar\\DataCollector\\RequestDataCollector' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/RequestDataCollector.php',
        'DebugBar\\DataCollector\\TimeDataCollector' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataCollector/TimeDataCollector.php',
        'DebugBar\\DataFormatter\\DataFormatter' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataFormatter/DataFormatter.php',
        'DebugBar\\DataFormatter\\DataFormatterInterface' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataFormatter/DataFormatterInterface.php',
        'DebugBar\\DataFormatter\\DebugBarVarDumper' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataFormatter/DebugBarVarDumper.php',
        'DebugBar\\DataFormatter\\VarDumper\\DebugBarHtmlDumper' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DataFormatter/VarDumper/DebugBarHtmlDumper.php',
        'DebugBar\\DebugBar' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DebugBar.php',
        'DebugBar\\DebugBarException' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/DebugBarException.php',
        'DebugBar\\HttpDriverInterface' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/HttpDriverInterface.php',
        'DebugBar\\JavascriptRenderer' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/JavascriptRenderer.php',
        'DebugBar\\OpenHandler' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/OpenHandler.php',
        'DebugBar\\PhpHttpDriver' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/PhpHttpDriver.php',
        'DebugBar\\RequestIdGenerator' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/RequestIdGenerator.php',
        'DebugBar\\RequestIdGeneratorInterface' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/RequestIdGeneratorInterface.php',
        'DebugBar\\StandardDebugBar' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/StandardDebugBar.php',
        'DebugBar\\Storage\\FileStorage' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/Storage/FileStorage.php',
        'DebugBar\\Storage\\MemcachedStorage' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/Storage/MemcachedStorage.php',
        'DebugBar\\Storage\\PdoStorage' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/Storage/PdoStorage.php',
        'DebugBar\\Storage\\RedisStorage' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/Storage/RedisStorage.php',
        'DebugBar\\Storage\\StorageInterface' => __DIR__ . '/..' . '/maximebf/debugbar/src/DebugBar/Storage/StorageInterface.php',
        'PhpToken' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/PhpToken.php',
        'Psr\\Log\\AbstractLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/AbstractLogger.php',
        'Psr\\Log\\InvalidArgumentException' => __DIR__ . '/..' . '/psr/log/Psr/Log/InvalidArgumentException.php',
        'Psr\\Log\\LogLevel' => __DIR__ . '/..' . '/psr/log/Psr/Log/LogLevel.php',
        'Psr\\Log\\LoggerAwareInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareInterface.php',
        'Psr\\Log\\LoggerAwareTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareTrait.php',
        'Psr\\Log\\LoggerInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerInterface.php',
        'Psr\\Log\\LoggerTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerTrait.php',
        'Psr\\Log\\NullLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/NullLogger.php',
        'Psr\\Log\\Test\\DummyTest' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/DummyTest.php',
        'Psr\\Log\\Test\\LoggerInterfaceTest' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/LoggerInterfaceTest.php',
        'Psr\\Log\\Test\\TestLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/TestLogger.php',
        'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
        'Symfony\\Component\\VarDumper\\Caster\\AmqpCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/AmqpCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\ArgsStub' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/ArgsStub.php',
        'Symfony\\Component\\VarDumper\\Caster\\Caster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/Caster.php',
        'Symfony\\Component\\VarDumper\\Caster\\ClassStub' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/ClassStub.php',
        'Symfony\\Component\\VarDumper\\Caster\\ConstStub' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/ConstStub.php',
        'Symfony\\Component\\VarDumper\\Caster\\CutArrayStub' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/CutArrayStub.php',
        'Symfony\\Component\\VarDumper\\Caster\\CutStub' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/CutStub.php',
        'Symfony\\Component\\VarDumper\\Caster\\DOMCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/DOMCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\DateCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/DateCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\DoctrineCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/DoctrineCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\DsCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/DsCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\DsPairStub' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/DsPairStub.php',
        'Symfony\\Component\\VarDumper\\Caster\\EnumStub' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/EnumStub.php',
        'Symfony\\Component\\VarDumper\\Caster\\ExceptionCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/ExceptionCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\FiberCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/FiberCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\FrameStub' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/FrameStub.php',
        'Symfony\\Component\\VarDumper\\Caster\\GmpCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/GmpCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\ImagineCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/ImagineCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\ImgStub' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/ImgStub.php',
        'Symfony\\Component\\VarDumper\\Caster\\IntlCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/IntlCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\LinkStub' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/LinkStub.php',
        'Symfony\\Component\\VarDumper\\Caster\\MemcachedCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/MemcachedCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\MysqliCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/MysqliCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\PdoCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/PdoCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\PgSqlCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/PgSqlCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\ProxyManagerCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/ProxyManagerCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\RdKafkaCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/RdKafkaCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\RedisCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/RedisCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\ReflectionCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/ReflectionCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\ResourceCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/ResourceCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\SplCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/SplCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\StubCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/StubCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\SymfonyCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/SymfonyCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\TraceStub' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/TraceStub.php',
        'Symfony\\Component\\VarDumper\\Caster\\UuidCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/UuidCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\XmlReaderCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/XmlReaderCaster.php',
        'Symfony\\Component\\VarDumper\\Caster\\XmlResourceCaster' => __DIR__ . '/..' . '/symfony/var-dumper/Caster/XmlResourceCaster.php',
        'Symfony\\Component\\VarDumper\\Cloner\\AbstractCloner' => __DIR__ . '/..' . '/symfony/var-dumper/Cloner/AbstractCloner.php',
        'Symfony\\Component\\VarDumper\\Cloner\\ClonerInterface' => __DIR__ . '/..' . '/symfony/var-dumper/Cloner/ClonerInterface.php',
        'Symfony\\Component\\VarDumper\\Cloner\\Cursor' => __DIR__ . '/..' . '/symfony/var-dumper/Cloner/Cursor.php',
        'Symfony\\Component\\VarDumper\\Cloner\\Data' => __DIR__ . '/..' . '/symfony/var-dumper/Cloner/Data.php',
        'Symfony\\Component\\VarDumper\\Cloner\\DumperInterface' => __DIR__ . '/..' . '/symfony/var-dumper/Cloner/DumperInterface.php',
        'Symfony\\Component\\VarDumper\\Cloner\\Stub' => __DIR__ . '/..' . '/symfony/var-dumper/Cloner/Stub.php',
        'Symfony\\Component\\VarDumper\\Cloner\\VarCloner' => __DIR__ . '/..' . '/symfony/var-dumper/Cloner/VarCloner.php',
        'Symfony\\Component\\VarDumper\\Command\\Descriptor\\CliDescriptor' => __DIR__ . '/..' . '/symfony/var-dumper/Command/Descriptor/CliDescriptor.php',
        'Symfony\\Component\\VarDumper\\Command\\Descriptor\\DumpDescriptorInterface' => __DIR__ . '/..' . '/symfony/var-dumper/Command/Descriptor/DumpDescriptorInterface.php',
        'Symfony\\Component\\VarDumper\\Command\\Descriptor\\HtmlDescriptor' => __DIR__ . '/..' . '/symfony/var-dumper/Command/Descriptor/HtmlDescriptor.php',
        'Symfony\\Component\\VarDumper\\Command\\ServerDumpCommand' => __DIR__ . '/..' . '/symfony/var-dumper/Command/ServerDumpCommand.php',
        'Symfony\\Component\\VarDumper\\Dumper\\AbstractDumper' => __DIR__ . '/..' . '/symfony/var-dumper/Dumper/AbstractDumper.php',
        'Symfony\\Component\\VarDumper\\Dumper\\CliDumper' => __DIR__ . '/..' . '/symfony/var-dumper/Dumper/CliDumper.php',
        'Symfony\\Component\\VarDumper\\Dumper\\ContextProvider\\CliContextProvider' => __DIR__ . '/..' . '/symfony/var-dumper/Dumper/ContextProvider/CliContextProvider.php',
        'Symfony\\Component\\VarDumper\\Dumper\\ContextProvider\\ContextProviderInterface' => __DIR__ . '/..' . '/symfony/var-dumper/Dumper/ContextProvider/ContextProviderInterface.php',
        'Symfony\\Component\\VarDumper\\Dumper\\ContextProvider\\RequestContextProvider' => __DIR__ . '/..' . '/symfony/var-dumper/Dumper/ContextProvider/RequestContextProvider.php',
        'Symfony\\Component\\VarDumper\\Dumper\\ContextProvider\\SourceContextProvider' => __DIR__ . '/..' . '/symfony/var-dumper/Dumper/ContextProvider/SourceContextProvider.php',
        'Symfony\\Component\\VarDumper\\Dumper\\ContextualizedDumper' => __DIR__ . '/..' . '/symfony/var-dumper/Dumper/ContextualizedDumper.php',
        'Symfony\\Component\\VarDumper\\Dumper\\DataDumperInterface' => __DIR__ . '/..' . '/symfony/var-dumper/Dumper/DataDumperInterface.php',
        'Symfony\\Component\\VarDumper\\Dumper\\HtmlDumper' => __DIR__ . '/..' . '/symfony/var-dumper/Dumper/HtmlDumper.php',
        'Symfony\\Component\\VarDumper\\Dumper\\ServerDumper' => __DIR__ . '/..' . '/symfony/var-dumper/Dumper/ServerDumper.php',
        'Symfony\\Component\\VarDumper\\Exception\\ThrowingCasterException' => __DIR__ . '/..' . '/symfony/var-dumper/Exception/ThrowingCasterException.php',
        'Symfony\\Component\\VarDumper\\Server\\Connection' => __DIR__ . '/..' . '/symfony/var-dumper/Server/Connection.php',
        'Symfony\\Component\\VarDumper\\Server\\DumpServer' => __DIR__ . '/..' . '/symfony/var-dumper/Server/DumpServer.php',
        'Symfony\\Component\\VarDumper\\Test\\VarDumperTestTrait' => __DIR__ . '/..' . '/symfony/var-dumper/Test/VarDumperTestTrait.php',
        'Symfony\\Component\\VarDumper\\VarDumper' => __DIR__ . '/..' . '/symfony/var-dumper/VarDumper.php',
        'Symfony\\Polyfill\\Php80\\Php80' => __DIR__ . '/..' . '/symfony/polyfill-php80/Php80.php',
        'Symfony\\Polyfill\\Php80\\PhpToken' => __DIR__ . '/..' . '/symfony/polyfill-php80/PhpToken.php',
        'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
        'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1d7ff4069bceab7bdaeace8c0e1a7947::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1d7ff4069bceab7bdaeace8c0e1a7947::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1d7ff4069bceab7bdaeace8c0e1a7947::$classMap;

        }, null, ClassLoader::class);
    }
}
