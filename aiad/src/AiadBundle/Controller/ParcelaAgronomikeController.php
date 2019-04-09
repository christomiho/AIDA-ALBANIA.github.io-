<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\ParcelaAgronomike;
use AiadBundle\Form\ParcelaAgronomikeType;

/**
 * ParcelaAgronomike controller.
 *
 * @Route("/parcelaagronomike")
 */
class ParcelaAgronomikeController extends Controller
{
    /**
     * Lists all ParcelaAgronomike entities.
     *
     * @Route("/", name="parcelaagronomike_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $parcelaAgronomikes = $em->getRepository('AiadBundle:ParcelaAgronomike')->findBy(array('parcela'=>$parcela));

        return $this->render('parcelaagronomike/index.html.twig', array(
            'parcelaAgronomikes' => $parcelaAgronomikes,
        ));
    }

    /**
     * Creates a new ParcelaAgronomike entity.
     *
     * @Route("/new", name="parcelaagronomike_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $parcelaAgronomike = new ParcelaAgronomike();
        $form = $this->createForm('AiadBundle\Form\ParcelaAgronomikeType', $parcelaAgronomike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parcelaAgronomike);
            $em->flush();

            return $this->redirectToRoute('parcelaagronomike_index');
        }

        return $this->render('parcelaagronomike/new.html.twig', array(
            'parcelaAgronomike' => $parcelaAgronomike,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ParcelaAgronomike entity.
     *
     * @Route("/{id}", name="parcelaagronomike_show")
     * @Method("GET")
     */
    public function showAction(ParcelaAgronomike $parcelaAgronomike)
    {
        $deleteForm = $this->createDeleteForm($parcelaAgronomike);

        return $this->render('parcelaagronomike/show.html.twig', array(
            'parcelaAgronomike' => $parcelaAgronomike,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ParcelaAgronomike entity.
     *
     * @Route("/{id}/edit", name="parcelaagronomike_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ParcelaAgronomike $parcelaAgronomike)
    {
        $deleteForm = $this->createDeleteForm($parcelaAgronomike);
        $editForm = $this->createForm('AiadBundle\Form\ParcelaAgronomikeType', $parcelaAgronomike);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parcelaAgronomike);
            $em->flush();

            return $this->redirectToRoute('parcelaagronomike_index');
        }

        return $this->render('parcelaagronomike/edit.html.twig', array(
            'parcelaAgronomike' => $parcelaAgronomike,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ParcelaAgronomike entity.
     *
     * @Route("/{id}", name="parcelaagronomike_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ParcelaAgronomike $parcelaAgronomike)
    {
        $form = $this->createDeleteForm($parcelaAgronomike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($parcelaAgronomike);
            $em->flush();
        }

        return $this->redirectToRoute('parcelaagronomike_index');
    }

    /**
     * Creates a form to delete a ParcelaAgronomike entity.
     *
     * @param ParcelaAgronomike $parcelaAgronomike The ParcelaAgronomike entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ParcelaAgronomike $parcelaAgronomike)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parcelaagronomike_delete', array('id' => $parcelaAgronomike->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
