<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\ParcelaIdentifikimi;
use AiadBundle\Form\ParcelaIdentifikimiType;

/**
 * ParcelaIdentifikimi controller.
 *
 * @Route("/parcelaidentifikimi")
 */
class ParcelaIdentifikimiController extends Controller
{
    /**
     * Lists all ParcelaIdentifikimi entities.
     *
     * @Route("/", name="parcelaidentifikimi_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $parcelaIdentifikimis = $em->getRepository('AiadBundle:ParcelaIdentifikimi')->findAll();

        return $this->render('parcelaidentifikimi/index.html.twig', array(
            'parcelaIdentifikimis' => $parcelaIdentifikimis,
        ));
    }

    /**
     * Creates a new ParcelaIdentifikimi entity.
     *
     * @Route("/new", name="parcelaidentifikimi_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $parcelaIdentifikimi = new ParcelaIdentifikimi();
        $form = $this->createForm('AiadBundle\Form\ParcelaIdentifikimiType', $parcelaIdentifikimi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parcelaIdentifikimi);
            $em->flush();

            return $this->redirectToRoute('parcelaidentifikimi_show', array('id' => $parcelaIdentifikimi->getId()));
        }

        return $this->render('parcelaidentifikimi/new.html.twig', array(
            'parcelaIdentifikimi' => $parcelaIdentifikimi,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ParcelaIdentifikimi entity.
     *
     * @Route("/{id}", name="parcelaidentifikimi_show")
     * @Method("GET")
     */
    public function showAction(ParcelaIdentifikimi $parcelaIdentifikimi)
    {
        $deleteForm = $this->createDeleteForm($parcelaIdentifikimi);

        return $this->render('parcelaidentifikimi/show.html.twig', array(
            'parcelaIdentifikimi' => $parcelaIdentifikimi,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ParcelaIdentifikimi entity.
     *
     * @Route("/{id}/edit", name="parcelaidentifikimi_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ParcelaIdentifikimi $parcelaIdentifikimi)
    {
        $deleteForm = $this->createDeleteForm($parcelaIdentifikimi);
        $editForm = $this->createForm('AiadBundle\Form\ParcelaIdentifikimiType', $parcelaIdentifikimi);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parcelaIdentifikimi);
            $em->flush();

            return $this->redirectToRoute('listo_parcelat');
        }

        return $this->render('parcelaidentifikimi/edit.html.twig', array(
            'parcelaIdentifikimi' => $parcelaIdentifikimi,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ParcelaIdentifikimi entity.
     *
     * @Route("/{id}", name="parcelaidentifikimi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ParcelaIdentifikimi $parcelaIdentifikimi)
    {
        $form = $this->createDeleteForm($parcelaIdentifikimi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($parcelaIdentifikimi);
            $em->flush();
        }

        return $this->redirectToRoute('parcelaidentifikimi_index');
    }

    /**
     * Creates a form to delete a ParcelaIdentifikimi entity.
     *
     * @param ParcelaIdentifikimi $parcelaIdentifikimi The ParcelaIdentifikimi entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ParcelaIdentifikimi $parcelaIdentifikimi)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parcelaidentifikimi_delete', array('id' => $parcelaIdentifikimi->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
