<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RentBook
{
    public function __invoke($data, Request $request)
    {
        // do some stuff

        return new Response('stuff', Response::HTTP_OK);
        // return new Response(); // own response
        // return $data; // the api platform way
        // both possible
    }
}
