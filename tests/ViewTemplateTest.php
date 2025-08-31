<?php

use PHPUnit\Framework\TestCase;

class ViewTemplateTest extends TestCase
{
    public function testContactTemplateRendersWithProvidedData(): void
    {
        $html = view('contact', [
            'name' => 'Alice',
            'email' => 'alice@example.com',
            'comment' => 'Olá, tudo bem?'
        ], true);

        $this->assertIsString($html);
        $this->assertStringContainsString('Novo contato recebido', $html);
        $this->assertStringContainsString('Alice', $html);
        $this->assertStringContainsString('alice@example.com', $html);
        $this->assertStringContainsString('Olá, tudo bem?', $html);
    }
}

