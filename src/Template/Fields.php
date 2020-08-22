<?php declare(strict_types=1);

namespace App\Template;

use App\Annotation\Template;

class Fields
{
    @@Template("Current date", "currentDate")
    public function getCurrentDate(): string
    {
        return date("d/m/Y");
    }

    @@Template("Random number", "randomNumber")
    public function getRandomNumber(): int
    {
        return mt_rand();
    }
}
