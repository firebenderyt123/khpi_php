<?php

namespace Lab8\classes;

class Product extends Base
{
    private static array $objects = [
        [
            "id" => 1,
            "name" => "Sample Product 1",
            "price" => 100
        ],
        [
            "id" => 2,
            "item" => "Sample Product 3",
            "price" => 50
        ]
    ];

    protected function getObject(int $id): ?array
    {
        foreach (self::$objects as $object)
        {
            if ($object['id'] === $id)
            {
                return $object;
            }
        }
        return null;
    }

    protected function save(array &$obj, array $data): void
    {
        foreach (self::$objects as &$object)
        {
            if ($object['id'] === $obj['id'])
            {
                foreach ($data as $key => $value)
                {
                    if (array_key_exists($key, $object))
                    {
                        $object[$key] = $value;
                        $obj[$key] = $value;
                    }
                }
            }
        }
    }

    protected function validate(array $data): bool
    {
        if (isset($data['price']) && $data['price'] <= 0)
        {
            $this->notifyAdmin();
            return false;
        }
        return true;
    }

    protected function notifyAdmin(): void
    {
        echo "Admin notified that product is not valid";
    }
}