<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraPraisAntofage;
use AiadBundle\Form\MostraPraisAntofageType;

/**
 * MostraPraisAntofage controller.
 *
 * @Route("/mostrapraisantofage")
 */
class MostraPraisAntofageController extends Controller
{
    /**
     * Lists all MostraPraisAntofage entities.
     *
     * @Route("/", name="mostrapraisantofage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraPraisAntofages = $em->getRepository('AiadBundle:MostraPraisAntofage')->findBy(array('parcela'=>$parcela));

        return $this->render('mostrapraisantofage/index.html.twig', array(
            'mostraPraisAntofages' => $mostraPraisAntofages,
        ));
    }

    /**
     * Creates a new MostraPraisAntofage entity.
     *
     * @Route("/new", name="mostrapraisantofage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraPraisAntofage = new MostraPraisAntofage();
        $form = $this->createForm('AiadBundle\Form\MostraPraisAntofageType', $mostraPraisAntofage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraPraisAntofage);
            $em->flush();

//            return $this->redirectToRoute('mostrapraisantofage_show', array('id' => $mostraPraisAntofage->getId()));
            return $this->redirectToRoute('mostrapraisantofage_index');
        }

        return $this->render('mostrapraisantofage/new.html.twig', array(
            'mostraPraisAntofage' => $mostraPraisAntofage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraPraisAntofage entity.
     *
     * @Route("/{id}", name="mostrapraisantofage_show")
     * @Method("GET")
     */
    public function showAction(MostraPraisAntofage $mostraPraisAntofage)
    {
        $deleteForm = $this->createDeleteForm($mostraPraisAntofage);

        return $this->render('mostrapraisantofage/show.html.twig', array(
            'mostraPraisAntofage' => $mostraPraisAntofage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraPraisAntofage entity.
     *
     * @Route("/{id}/edit", name="mostrapraisantofage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraPraisAntofage $mostraPraisAntofage)
    {
        $deleteForm = $this->createDeleteForm($mostraPraisAntofage);
        $editForm = $this->createForm('AiadBundle\Form\MostraPraisAntofageType', $mostraPraisAntofage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraPraisAntofage);
            $em->flush();

//            return $this->redirectToRoute('mostrapraisantofage_edit', array('id' => $mostraPraisAntofage->getId()));
            return $this->redirectToRoute('mostrapraisantofage_index');
        }

        return $this->render('mostrapraisantofage/edit.html.twig', array(
            'mostraPraisAntofage' => $mostraPraisAntofage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraPraisAntofage entity.
     *
     * @Route("/{id}", name="mostrapraisantofage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraPraisAntofage $mostraPraisAntofage)
    {
        $form = $this->createDeleteForm($mostraPraisAntofage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraPraisAntofage);
            $em->flush();
        }

        return $this->redirectToRoute('mostrapraisantofage_index');
    }

    /**
     * Creates a form to delete a MostraPraisAntofage entity.
     *
     * @param MostraPraisAntofage $mostraPraisAntofage The MostraPraisAntofage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraPraisAntofage $mostraPraisAntofage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostrapraisantofage_delete', array('id' => $mostraPraisAntofage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
