<?php

namespace Matok\Bundle\MusicBundle\Controller;

use Matok\Bundle\MusicBundle\Form\Type\AlbumType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AlbumController extends Controller
{
    public function listAction(Request $request): Response
    {
        return $this->render('@Music/album/list.html.twig');
    }

    public function addAction(Request $request): Response
    {
        $form = $this->createForm(AlbumType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $artist = $form->getData();
            dump($artist);
        }

        return $this->render('@Music/album/add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
