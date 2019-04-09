<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraPraisFilofage;
use AiadBundle\Form\MostraPraisFilofageType;

/**
 * MostraPraisFilofage controller.
 *
 * @Route("/mostrapraisfilofage")
 */
class MostraPraisFilofageController extends Controller
{
    /**
     * Lists all MostraPraisFilofage entities.
     *
     * @Route("/", name="mostrapraisfilofage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraPraisFilofages = $em->getRepository('AiadBundle:MostraPraisFilofage')->findBy(array('parcela'=>$parcela));

        return $this->render('mostrapraisfilofage/index.html.twig', array(
            'mostraPraisFilofages' => $mostraPraisFilofages,
        ));
    }

    /**
     * Creates a new MostraPraisFilofage entity.
     *
     * @Route("/new", name="mostrapraisfilofage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraPraisFilofage = new MostraPraisFilofage();
        $form = $this->createForm('AiadBundle\Form\MostraPraisFilofageType', $mostraPraisFilofage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraPraisFilofage);
            $em->flush();

            //return $this->redirectToRoute('mostrapraisfilofage_show', array('id' => $mostraPraisFilofage->getId()));
            return $this->redirectToRoute('mostrapraisfilofage_index');

        }

        return $this->render('mostrapraisfilofage/new.html.twig', array(
            'mostraPraisFilofage' => $mostraPraisFilofage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraPraisFilofage entity.
     *
     * @Route("/{id}", name="mostrapraisfilofage_show")
     * @Method("GET")
     */
    public function showAction(MostraPraisFilofage $mostraPraisFilofage)
    {
        $deleteForm = $this->createDeleteForm($mostraPraisFilofage);

        return $this->render('mostrapraisfilofage/show.html.twig', array(
            'mostraPraisFilofage' => $mostraPraisFilofage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraPraisFilofage entity.
     *
     * @Route("/{id}/edit", name="mostrapraisfilofage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraPraisFilofage $mostraPraisFilofage)
    {
        $deleteForm = $this->createDeleteForm($mostraPraisFilofage);
        $editForm = $this->createForm('AiadBundle\Form\MostraPraisFilofageType', $mostraPraisFilofage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraPraisFilofage);
            $em->flush();

            return $this->redirectToRoute('mostrapraisfilofage_index');
            //return $this->redirectToRoute('mostrapraisfilofage_edit', array('id' => $mostraPraisFilofage->getId()));
        }

        return $this->render('mostrapraisfilofage/edit.html.twig', array(
            'mostraPraisFilofage' => $mostraPraisFilofage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraPraisFilofage entity.
     *
     * @Route("/{id}", name="mostrapraisfilofage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraPraisFilofage $mostraPraisFilofage)
    {
        $form = $this->createDeleteForm($mostraPraisFilofage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraPraisFilofage);
            $em->flush();
        }

        return $this->redirectToRoute('mostrapraisfilofage_index');
    }

    /**
     * Creates a form to delete a MostraPraisFilofage entity.
     *
     * @param MostraPraisFilofage $mostraPraisFilofage The MostraPraisFilofage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraPraisFilofage $mostraPraisFilofage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostrapraisfilofage_delete', array('id' => $mostraPraisFilofage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
