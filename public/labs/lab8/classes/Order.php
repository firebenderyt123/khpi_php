<?php

namespace Lab8\classes;

class Order extends Base
{
    private static array $objects = [
        [
            "id" => 1,
            "item" => "Sample Item 1",
            "quantity" => 1
        ],
        [
            "id" => 2,
            "item" => "Sample Item 2",
            "quantity" => 3
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

    protected function validate(array $data): bool
    {
        if (isset($data['quantity']) && $data['quantity'] <= 0)
        {
            return false;
        }
        return true;
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

    protected function afterSave(array $obj): array
    {
        $response = parent::afterSave($obj);
        $response['order'] = $obj;
        return $response;
    }
}