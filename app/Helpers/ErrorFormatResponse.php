<?php

namespace App\Helpers;

use Symfony\Component\HttpFoundation\Response;

class ErrorFormatResponse
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
            'success' => $this->isSuccess(),
            'status' => $this->getStatus(),
            'message' => $this->getMessage()
        ];
    }

    public static function create($message, $status = Response::HTTP_BAD_REQUEST, $success = false): self
    {
        return new static($message, $status, $success);
    }
}
