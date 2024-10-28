<?php

namespace Lab8\classes;

class APIController
{
    protected array $entityMap = array(
        'user' => User::class,
        'product' => Product::class,
        'order' => Order::class,
    );

    public function getDataEntity(string $entityType, int $id): array
    {
        if (!array_key_exists($entityType, $this->entityMap))
        {
            return Base::response(400, 'Invalid entity type');
        }

        $entity = new $this->entityMap[$entityType]();
        return $entity->get($id);
    }

    public function updateEntity(string $entityType, array $data): array
    {
        if (!array_key_exists($entityType, $this->entityMap))
        {
            return Base::response(400, 'Invalid entity type');
        }

        $entity = new $this->entityMap[$entityType]();
        return $entity->update($data);
    }
}