<?php

namespace App\Controllers;

use App\Services\ContactService;

class ContactController
{
    private ContactService $contactService;

    public function __construct() {
        $this->contactService = new ContactService();
    }

    public function store(array $request): void
    {
        if(empty($request['name']) || empty($request['email']) || empty($request['comment'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid data']);
            exit;
        }

        $this->contactService->create($request);


        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode(['msg' => 'Contact created']);
    }
}
