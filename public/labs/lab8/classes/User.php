<?php

namespace Lab8\classes;

class User extends Base
{
    private static array $objects = [
        [
            "id" => 1,
            "name" => "John Doe",
            "email" => "john.doe@example.com"
        ],
        [
            "id" => 2,
            "name" => "Jane Smith",
            "email" => "jane.smith@example.com"
        ],
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
        if (isset($data['email']))
        {
            return false;
        }

        if (isset($data['name'])) {
            if (!preg_match('/^[a-zA-Z\s]+$/', $data['name'])) {
                return false;
            }
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

    protected function afterGet(?array $obj): array
    {
        $response = $this->response(200, isset($obj) ? "Success" : "Nothing found");
        if (isset($obj))
        {
            $response['user'] = $obj;
        }
        return $response;
    }
}