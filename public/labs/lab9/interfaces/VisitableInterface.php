<?php

namespace Lab9\interfaces;

interface VisitableInterface
{
    public function accept(VisitorInterface $visitor);
}