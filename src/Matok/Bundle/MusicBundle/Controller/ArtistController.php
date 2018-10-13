<?php

namespace Matok\Bundle\MusicBundle\Controller;

use Matok\Bundle\MusicBundle\Entity\Artist;
use Matok\Bundle\MusicBundle\Form\Type\ArtistType;
use Matok\Bundle\MusicBundle\Form\Type\DeleteEntryType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArtistController extends Controller
{
    public function listAction(Request $request): Response
    {
        $artists = $this->getDoctrine()->getRepository(Artist::class)->findAll();

        return $this->render('@Music/artist/list.html.twig', [
            'artists' => $artists
        ]);
    }

    public function addAction(Request $request): Response
    {
        $form = $this->createForm(ArtistType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $artist = $form->getData();
            $this->getDoctrine()->getRepository(Artist::class)->save($artist);

            return $this->redirectToRoute('matok_artist_list');
        }

        return $this->render('@Music/artist/add.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function editAction(Request $request, int $id): Response
    {
        $artistRepository = $this->getDoctrine()->getRepository(Artist::class);
        $artist = $artistRepository->find($id);
        $this->checkArtist($artist);

        $form = $this->createForm(ArtistType::class, $artist);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $artist = $form->getData();
            $artistRepository->save($artist);

            return $this->redirectToRoute('matok_artist_list');
        }

        return $this->render('@Music/artist/edit.html.twig', [
            'artist' => $artist,
            'form' => $form->createView(),
        ]);
    }

    public function removeAction(Request $request, int $id): Response
    {
        $artistRepository = $this->getDoctrine()->getRepository(Artist::class);
        $artist = $artistRepository->find($id);
        $this->checkArtist($artist);

        $form = $this->createForm(DeleteEntryType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('delete')->isClicked()) {
                $artistRepository->remove($id);
                $this->addFlash('deleted', sprintf('Artist "%s" was deleted!', $artist->getTitle()));
            }

            return $this->redirectToRoute('matok_artist_list');
        }

        return $this->render('@Music/artist/remove.html.twig', [
            'artist' => $artist,
            'delete_form' => $form->createView(),
        ]);
    }

    private function checkArtist(?Artist $artist)
    {
        if (null == $artist) {
            throw new NotFoundHttpException("Artist not found!");
        }
    }
}
