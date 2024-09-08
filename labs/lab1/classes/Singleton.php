<?php

require_once __DIR__ . '/../interfaces/SingletonInterface.php';

abstract class Singleton implements SingletonInterface
{
    private static array $instances = [];

    protected function __constructor(): void {}

    protected function __clone(): void {}

    /**
     * @throws Exception
     */
    public function __wakeup(): void
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): static
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls]))
            self::$instances[$cls] = new static();

        return self::$instances[$cls];
    }
}