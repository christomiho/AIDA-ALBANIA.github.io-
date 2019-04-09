<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraLastareRinj;
use AiadBundle\Form\MostraLastareRinjType;

/**
 * MostraLastareRinj controller.
 *
 * @Route("/mostralastarerinj")
 */
class MostraLastareRinjController extends Controller
{
    /**
     * Lists all MostraLastareRinj entities.
     *
     * @Route("/", name="mostralastarerinj_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraLastareRinjs = $em->getRepository('AiadBundle:MostraLastareRinj')->findBy(array('parcela'=>$parcela));

        return $this->render('mostralastarerinj/index.html.twig', array(
            'mostraLastareRinjs' => $mostraLastareRinjs,
        ));
    }

    /**
     * Creates a new MostraLastareRinj entity.
     *
     * @Route("/new", name="mostralastarerinj_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraLastareRinj = new MostraLastareRinj();
        $form = $this->createForm('AiadBundle\Form\MostraLastareRinjType', $mostraLastareRinj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraLastareRinj);
            $em->flush();

//            return $this->redirectToRoute('mostralastarerinj_show', array('id' => $mostraLastareRinj->getId()));
            return $this->redirectToRoute('mostralastarerinj_index');
        }

        return $this->render('mostralastarerinj/new.html.twig', array(
            'mostraLastareRinj' => $mostraLastareRinj,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraLastareRinj entity.
     *
     * @Route("/{id}", name="mostralastarerinj_show")
     * @Method("GET")
     */
    public function showAction(MostraLastareRinj $mostraLastareRinj)
    {
        $deleteForm = $this->createDeleteForm($mostraLastareRinj);

        return $this->render('mostralastarerinj/show.html.twig', array(
            'mostraLastareRinj' => $mostraLastareRinj,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraLastareRinj entity.
     *
     * @Route("/{id}/edit", name="mostralastarerinj_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraLastareRinj $mostraLastareRinj)
    {
        $deleteForm = $this->createDeleteForm($mostraLastareRinj);
        $editForm = $this->createForm('AiadBundle\Form\MostraLastareRinjType', $mostraLastareRinj);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraLastareRinj);
            $em->flush();

//            return $this->redirectToRoute('mostralastarerinj_edit', array('id' => $mostraLastareRinj->getId()));
            return $this->redirectToRoute('mostralastarerinj_index');
        }

        return $this->render('mostralastarerinj/edit.html.twig', array(
            'mostraLastareRinj' => $mostraLastareRinj,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraLastareRinj entity.
     *
     * @Route("/{id}", name="mostralastarerinj_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraLastareRinj $mostraLastareRinj)
    {
        $form = $this->createDeleteForm($mostraLastareRinj);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraLastareRinj);
            $em->flush();
        }

        return $this->redirectToRoute('mostralastarerinj_index');
    }

    /**
     * Creates a form to delete a MostraLastareRinj entity.
     *
     * @param MostraLastareRinj $mostraLastareRinj The MostraLastareRinj entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraLastareRinj $mostraLastareRinj)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostralastarerinj_delete', array('id' => $mostraLastareRinj->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
