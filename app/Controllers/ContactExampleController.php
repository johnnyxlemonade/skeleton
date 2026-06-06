<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Navigation\MainNavigation;
use App\Validation\ContactFormValidator;
use Psr\Http\Message\ResponseInterface;

final class ContactExampleController extends AppController
{
    public function __construct(
        MainNavigation $navigation,
        private readonly ContactFormValidator $validator,
    ) {
        parent::__construct($navigation);
    }

    public function index(): ResponseInterface
    {
        return $this->renderForm(
            errors: [],
            values: $this->defaultValues(),
        );
    }

    public function submit(): ResponseInterface
    {
        $post = $this->postAll();
        $result = $this->validator->validate($post);

        if (!$result->isValid()) {
            return $this->renderForm(
                errors: $result->errors(),
                values: $this->valuesFrom($post),
                status: 422,
            );
        }

        $this->flash()->set('success', 'Thanks, your message has been received by the skeleton demo.');

        return $this->redirect($this->url()->route('examples.contact'));
    }

    /**
     * @param array<string, string> $errors
     * @param array{name:string,email:string,message:string} $values
     */
    private function renderForm(array $errors, array $values, int $status = 200): ResponseInterface
    {
        return $this->page('pages.examples.contact', [
            'title' => 'Contact form example',
            'errors' => $errors,
            'values' => $values,
        ], $status);
    }

    /**
     * @return array{name:string,email:string,message:string}
     */
    private function defaultValues(): array
    {
        return [
            'name' => '',
            'email' => '',
            'message' => '',
        ];
    }

    /**
     * @param array<string, mixed> $post
     * @return array{name:string,email:string,message:string}
     */
    private function valuesFrom(array $post): array
    {
        return [
            'name' => $this->stringValue($post['name'] ?? ''),
            'email' => $this->stringValue($post['email'] ?? ''),
            'message' => $this->stringValue($post['message'] ?? ''),
        ];
    }

    private function stringValue(mixed $value): string
    {
        if (is_scalar($value) || $value instanceof \Stringable) {
            return (string) $value;
        }

        return '';
    }
}
