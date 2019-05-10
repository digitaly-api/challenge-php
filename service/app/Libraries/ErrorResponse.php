<?php

namespace App\Libraries;

use Symfony\Component\HttpFoundation\Response;

class ErrorResponse
{
    private $message;
    private $status;
    private $success;

    public function __construct(string $message, int $status = Response::HTTP_BAD_REQUEST, bool $success = false)
    {
        $this->message = $message;
        $this->status = $status;
        $this->success = $success;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function toArray(): array
    {
        return [
            'error' => [
                'status' => $this->getStatus(),
                'message' => $this->getMessage()
            ]
        ];
    }
}
