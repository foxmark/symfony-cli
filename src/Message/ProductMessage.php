<?php

namespace App\Message;

class ProductMessage implements MessageInterface
{

    private string $title;
    private int $product_id;
    private bool $extra;

    public function __construct(string $title, int $product_id, bool $extra = false)
    {
        $this->title = $title;
        $this->product_id = $product_id;
        $this->extra = $extra;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'product_id' => $this->product_id,
            'extra' => $this->extra
        ];
    }
}
