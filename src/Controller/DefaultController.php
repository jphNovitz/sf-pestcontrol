<?php

namespace App\Controller;

use App\Entity\InterventionRequest;
use App\Form\InterventionRequestType;
use App\Repository\InterventionZoneRepository;
use App\Repository\LandingAdviceRepository;
use App\Repository\SiteSettingsRepository;
use App\Service\InterventionRequestHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(
        Request $request,
        SiteSettingsRepository $siteSettingsRepository,
        InterventionZoneRepository $zoneRepository,
        LandingAdviceRepository $adviceRepository,
        InterventionRequestHandler $interventionRequestHandler,
    ): Response
    {
        $settings = $siteSettingsRepository->getCurrent();
        $interventionRequest = new InterventionRequest();
        $form = $this->createForm(InterventionRequestType::class, $interventionRequest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $interventionRequestHandler->handle($interventionRequest, $settings, $form->get('photo')->getData());
            $this->addFlash('success', 'Votre demande a bien été envoyée.');

            return $this->redirectToRoute('app_default', ['_fragment' => 'demande-intervention']);
        }

        return $this->render('default/index.html.twig', [
            'settings' => $settings,
            'zones' => $zoneRepository->findActiveOrdered(),
            'advices' => $adviceRepository->findActiveOrdered(),
            'interventionForm' => $form,
        ]);
    }
}
