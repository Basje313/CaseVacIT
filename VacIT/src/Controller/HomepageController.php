<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use App\Entity\Vacature;

/**
 * @Route("/")
 */
class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function index()
    {
        $rep = $this->getDoctrine()->getRepository(Vacature::class);
        $data = $rep->getAllVacatures();

        return array("vacatures" => $data);
    }
}