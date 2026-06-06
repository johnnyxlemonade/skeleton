<?php

declare(strict_types=1);

namespace App\Validation;

use Lemonade\Framework\Validation\FormValidation;
use Lemonade\Framework\Validation\ValidationResult;

final class ContactFormValidator
{
    public function __construct(
        private readonly FormValidation $validator,
    ) {}

    /**
     * @param array<string, mixed> $data
     */
    public function validate(array $data): ValidationResult
    {
        return $this->validator
            ->field('name', 'Name')
                ->required()
                ->maxLength(100)
            ->field('email', 'E-mail')
                ->required()
                ->email()
                ->maxLength(150)
            ->field('message', 'Message')
                ->required()
                ->minLength(10)
                ->maxLength(1000)
            ->validate($data);
    }
}