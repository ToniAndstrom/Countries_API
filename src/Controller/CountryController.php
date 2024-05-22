<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CountryController extends AbstractController
{
    #[Route('/', name: 'app_country')]
    public function index(): Response
    {
        $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://restcountries.com/v3.1/all');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

$data = json_decode($result,true);


        return $this->render('country/index.html.twig', [
            'result' => $result, 'data' => $data
        ]);
    }
}
