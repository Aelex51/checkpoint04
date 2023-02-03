<?php

namespace App\Service\Cart;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService {

    private $session;

    public function __construct(SessionInterface $session)  {

        $this->session = $session;
    }

    public function add(int $id): void
    {

    }

    public function remove(int $id) {}

    public function getFullCart(): array {}

    public function getTotal(): float {}
}