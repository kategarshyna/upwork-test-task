<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class ItemsController extends Controller
{
    /**
     * @Route("/items")
     */
    public function itemsAction(Request $request)
    {
        return new JsonResponse($this->container->getParameter('items'));
    }
}
