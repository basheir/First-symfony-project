<?php



namespace  App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class HomeController
 *
 * This controller handles the home page logic.
 */

class HomeController  extends AbstractController{

    #[Route('/')]
    public function index() : Response
    {

        $content = $this->renderView("home/index.html.twig");
        return new Response($content);
    }
}