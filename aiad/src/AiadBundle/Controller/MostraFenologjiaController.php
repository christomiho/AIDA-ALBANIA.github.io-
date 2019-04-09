<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraFenologjia;
use AiadBundle\Form\MostraFenologjiaType;
use Symfony\Component\HttpFoundation\Session\Session;


/**
 * MostraFenologjia controller.
 *
 * @Route("/mostrafenologjia")
 */
class MostraFenologjiaController extends Controller
{
    /**
     * Lists all MostraFenologjia entities.
     *
     * @Route("/", name="mostrafenologjia_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        $mostraFenologjias = $em->getRepository('AiadBundle:MostraFenologjia')->findBy(array('parcela'=>$parcela));

        return $this->render('mostrafenologjia/index.html.twig', array(
            'mostraFenologjias' => $mostraFenologjias,
        ));
    }

    /**
     * Creates a new MostraFenologjia entity.
     *
     * @Route("/new", name="mostrafenologjia_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraFenologjium = new MostraFenologjia();
        $form = $this->createForm('AiadBundle\Form\MostraFenologjiaType', $mostraFenologjium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraFenologjium);
            $em->flush();

//            return $this->redirectToRoute('mostrafenologjia_show', array('id' => $mostraFenologjium->getId()));
            return $this->redirectToRoute('mostrafenologjia_index');
        }

        return $this->render('mostrafenologjia/new.html.twig', array(
            'mostraFenologjium' => $mostraFenologjium,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraFenologjia entity.
     *
     * @Route("/{id}", name="mostrafenologjia_show")
     * @Method("GET")
     */
    public function showAction(MostraFenologjia $mostraFenologjium)
    {
        $deleteForm = $this->createDeleteForm($mostraFenologjium);

        return $this->render('mostrafenologjia/show.html.twig', array(
            'mostraFenologjium' => $mostraFenologjium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraFenologjia entity.
     *
     * @Route("/{id}/edit", name="mostrafenologjia_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraFenologjia $mostraFenologjium)
    {
        $deleteForm = $this->createDeleteForm($mostraFenologjium);
        $editForm = $this->createForm('AiadBundle\Form\MostraFenologjiaType', $mostraFenologjium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraFenologjium);
            $em->flush();

//            return $this->redirectToRoute('mostrafenologjia_edit', array('id' => $mostraFenologjium->getId()));
            return $this->redirectToRoute('mostrafenologjia_index');
        }

        return $this->render('mostrafenologjia/edit.html.twig', array(
            'mostraFenologjium' => $mostraFenologjium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraFenologjia entity.
     *
     * @Route("/{id}", name="mostrafenologjia_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraFenologjia $mostraFenologjium)
    {
        $form = $this->createDeleteForm($mostraFenologjium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraFenologjium);
            $em->flush();
        }

        return $this->redirectToRoute('mostrafenologjia_index');
    }

    /**
     * Creates a form to delete a MostraFenologjia entity.
     *
     * @param MostraFenologjia $mostraFenologjium The MostraFenologjia entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraFenologjia $mostraFenologjium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostrafenologjia_delete', array('id' => $mostraFenologjium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
