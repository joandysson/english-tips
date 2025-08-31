<?php

namespace App\Service;

use App\Models\Contact;
use App\Repository\NotificationRepository;

class ContactService
{

    private Contact $contact;

    public function __construct()
    {
        $this->contact = new Contact();
    }

    public function create(array $data)
    {
        $created = $this->contact->create([
            'name' => $data['name'],
            'email' =>  $data['email'],
            'comment' => $data['comment'],
            'created_at' => date('Y-m-d H:i:s')
        ]);

        if (!$created || empty($created)) {
            return $created;
        }

        $html = view('contact', [
            'name' => $data['name'],
            'email' => $data['email'],
            'comment' => nl2br($data['comment'])
        ], true);

        (new NotificationRepository())->create($data, $html);

        return $created;
    }
}
