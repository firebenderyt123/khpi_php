<?php

namespace Lab8\classes;

abstract class Base
{
    public function get(int $id): array
    {
        $this->beforeGet();
        if (!is_numeric($id))
        {
            return $this->response(400, "Invalid ID: ID must be a number");
        }

        $obj = $this->getObject($id);
        return $this->afterGet($obj);
    }

    public function update(array $data): array
    {
        $this->beforeSave();
        if (!isset($data['id']) || !is_numeric($data['id']))
        {
            return $this->response(400, "Invalid ID: ID must be a number");
        }

        $obj = $this->getObject($data['id']);
        if (!$obj)
        {
            return $this->response(404, "Object not found");
        }

        if (!$this->validate($data))
        {
            return $this->response(400, "Validation failed");
        }

        $this->save($obj, $data);
        return $this->afterSave($obj);
    }

    abstract protected function getObject(int $id): ?array;

    abstract protected function validate(array $data): bool;

    abstract protected function save(array &$obj, array $data): void;

    protected function beforeSave(): void {}

    protected function afterSave(array $obj): array
    {
        return $this->response(200, "Update successful");
    }

    protected function beforeGet(): void {}
    protected function afterGet(?array $obj): array
    {
        $response = $this->response(200, isset($obj) ? "Success" : "Nothing found");
        if (isset($obj))
        {
            $response['data'] = $obj;
        }
        return $response;
    }

    public static function response(int $code, string $message): array
    {
        return [
            "code" => $code,
            "message" => $message
        ];
    }
}