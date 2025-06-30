<?php

namespace App\Config\Cron;

interface CronInterface
{
    public function run(): void;

}
