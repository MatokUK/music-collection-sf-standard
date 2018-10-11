<?php

namespace Matok\Bundle\MusicBundle\Controller;

use Matok\Bundle\MusicBundle\Form\Type\ArtistType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArtistController extends Controller
{
    public function listAction(Request $request): Response
    {
        return $this->render('@Music/artist/list.html.twig');
    }

    public function addAction(Request $request): Response
    {
        $form = $this->createForm(ArtistType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $artist = $form->getData();
            dump($artist);
        }

        return $this->render('@Music/artist/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function editAction(Request $request): Response
    {
        return $this->render('@Music/artist/edit.html.twig');
    }

    public function deleteAction(Request $request): Response
    {
        return $this->render('@Music/artist/delete.html.twig');
    }
}
