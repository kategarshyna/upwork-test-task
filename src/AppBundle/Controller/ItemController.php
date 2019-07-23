<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ItemController extends Controller
{
    /**
     * @Route("/items")
     */
    public function itemsAction(Request $request)
    {
        return [
            "items" => $this->container->getParameter('items')
        ];
    }
}
