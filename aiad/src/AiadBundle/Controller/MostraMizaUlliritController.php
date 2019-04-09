<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraMizaUllirit;
use AiadBundle\Form\MostraMizaUlliritType;

/**
 * MostraMizaUllirit controller.
 *
 * @Route("/mostramizaullirit")
 */
class MostraMizaUlliritController extends Controller
{
    /**
     * Lists all MostraMizaUllirit entities.
     *
     * @Route("/", name="mostramizaullirit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraMizaUllirits = $em->getRepository('AiadBundle:MostraMizaUllirit')->findBy(array('parcela'=>$parcela));

        return $this->render('mostramizaullirit/index.html.twig', array(
            'mostraMizaUllirits' => $mostraMizaUllirits,
        ));
    }

    /**
     * Creates a new MostraMizaUllirit entity.
     *
     * @Route("/new", name="mostramizaullirit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraMizaUllirit = new MostraMizaUllirit();
        $form = $this->createForm('AiadBundle\Form\MostraMizaUlliritType', $mostraMizaUllirit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraMizaUllirit);
            $em->flush();

//            return $this->redirectToRoute('mostramizaullirit_show', array('id' => $mostraMizaUllirit->getId()));
            return $this->redirectToRoute('mostramizaullirit_index');
        }

        return $this->render('mostramizaullirit/new.html.twig', array(
            'mostraMizaUllirit' => $mostraMizaUllirit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraMizaUllirit entity.
     *
     * @Route("/{id}", name="mostramizaullirit_show")
     * @Method("GET")
     */
    public function showAction(MostraMizaUllirit $mostraMizaUllirit)
    {
        $deleteForm = $this->createDeleteForm($mostraMizaUllirit);

        return $this->render('mostramizaullirit/show.html.twig', array(
            'mostraMizaUllirit' => $mostraMizaUllirit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraMizaUllirit entity.
     *
     * @Route("/{id}/edit", name="mostramizaullirit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraMizaUllirit $mostraMizaUllirit)
    {
        $deleteForm = $this->createDeleteForm($mostraMizaUllirit);
        $editForm = $this->createForm('AiadBundle\Form\MostraMizaUlliritType', $mostraMizaUllirit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraMizaUllirit);
            $em->flush();

//            return $this->redirectToRoute('mostramizaullirit_edit', array('id' => $mostraMizaUllirit->getId()));
            return $this->redirectToRoute('mostramizaullirit_index');
        }

        return $this->render('mostramizaullirit/edit.html.twig', array(
            'mostraMizaUllirit' => $mostraMizaUllirit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraMizaUllirit entity.
     *
     * @Route("/{id}", name="mostramizaullirit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraMizaUllirit $mostraMizaUllirit)
    {
        $form = $this->createDeleteForm($mostraMizaUllirit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraMizaUllirit);
            $em->flush();
        }

        return $this->redirectToRoute('mostramizaullirit_index');
    }

    /**
     * Creates a form to delete a MostraMizaUllirit entity.
     *
     * @param MostraMizaUllirit $mostraMizaUllirit The MostraMizaUllirit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraMizaUllirit $mostraMizaUllirit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostramizaullirit_delete', array('id' => $mostraMizaUllirit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
