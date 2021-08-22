<?php

namespace App\Controller;

use App\Entity\AgentVaccin;
use App\Form\AgentVaccinType;
use App\Repository\AgentVaccinRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/agent/vaccin")
 */
class AgentVaccinController extends AbstractController
{
    /**
     * @Route("/", name="agent_vaccin_index", methods={"GET"})
     */
    public function index(AgentVaccinRepository $agentVaccinRepository): Response
    {
        return $this->render('agent_vaccin/index.html.twig', [
            'agent_vaccins' => $agentVaccinRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="agent_vaccin_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $agentVaccin = new AgentVaccin();
        $form = $this->createForm(AgentVaccinType::class, $agentVaccin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($agentVaccin);
            $entityManager->flush();

            return $this->redirectToRoute('agent_vaccin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('agent_vaccin/new.html.twig', [
            'agent_vaccin' => $agentVaccin,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="agent_vaccin_show", methods={"GET"})
     */
    public function show(AgentVaccin $agentVaccin): Response
    {
        return $this->render('agent_vaccin/show.html.twig', [
            'agent_vaccin' => $agentVaccin,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="agent_vaccin_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AgentVaccin $agentVaccin): Response
    {
        $form = $this->createForm(AgentVaccinType::class, $agentVaccin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('agent_vaccin_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('agent_vaccin/edit.html.twig', [
            'agent_vaccin' => $agentVaccin,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="agent_vaccin_delete", methods={"POST"})
     */
    public function delete(Request $request, AgentVaccin $agentVaccin): Response
    {
        if ($this->isCsrfTokenValid('delete'.$agentVaccin->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($agentVaccin);
            $entityManager->flush();
        }

        return $this->redirectToRoute('agent_vaccin_index', [], Response::HTTP_SEE_OTHER);
    }
}
