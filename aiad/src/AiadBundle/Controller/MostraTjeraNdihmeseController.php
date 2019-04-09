<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraTjeraNdihmese;
use AiadBundle\Form\MostraTjeraNdihmeseType;

/**
 * MostraTjeraNdihmese controller.
 *
 * @Route("/mostratjerandihmese")
 */
class MostraTjeraNdihmeseController extends Controller
{
    /**
     * Lists all MostraTjeraNdihmese entities.
     *
     * @Route("/", name="mostratjerandihmese_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraTjeraNdihmese = $em->getRepository('AiadBundle:MostraTjeraNdihmese')->findBy(array('parcela'=>$parcela));

        return $this->render('mostratjerandihmese/index.html.twig', array(
            'mostraTjeraNdihmese' => $mostraTjeraNdihmese,
        ));
    }

    /**
     * Creates a new MostraTjeraNdihmese entity.
     *
     * @Route("/new", name="mostratjerandihmese_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraTjeraNdihmese = new MostraTjeraNdihmese();
        $form = $this->createForm('AiadBundle\Form\MostraTjeraNdihmeseType', $mostraTjeraNdihmese);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraTjeraNdihmese);
            $em->flush();

            //return $this->redirectToRoute('mostratjerandihmese_show', array('id' => $mostraTjeraNdihmese->getId()));
            return $this->redirectToRoute('mostratjerandihmese_index');
        }

        return $this->render('mostratjerandihmese/new.html.twig', array(
            'mostraTjeraNdihmese' => $mostraTjeraNdihmese,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraTjeraNdihmese entity.
     *
     * @Route("/{id}", name="mostratjerandihmese_show")
     * @Method("GET")
     */
    public function showAction(MostraTjeraNdihmese $mostraTjeraNdihmese)
    {
        $deleteForm = $this->createDeleteForm($mostraTjeraNdihmese);

        return $this->render('mostratjerandihmese/show.html.twig', array(
            'mostraTjeraNdihmese' => $mostraTjeraNdihmese,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraTjeraNdihmese entity.
     *
     * @Route("/{id}/edit", name="mostratjerandihmese_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraTjeraNdihmese $mostraTjeraNdihmese)
    {
        $deleteForm = $this->createDeleteForm($mostraTjeraNdihmese);
        $editForm = $this->createForm('AiadBundle\Form\MostraTjeraNdihmeseType', $mostraTjeraNdihmese);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraTjeraNdihmese);
            $em->flush();

            //return $this->redirectToRoute('mostratjerandihmese_edit', array('id' => $mostraTjeraNdihmese->getId()));
            return $this->redirectToRoute('mostratjerandihmese_index');
        }

        return $this->render('mostratjerandihmese/edit.html.twig', array(
            'mostraTjeraNdihmese' => $mostraTjeraNdihmese,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraTjeraNdihmese entity.
     *
     * @Route("/{id}", name="mostratjerandihmese_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraTjeraNdihmese $mostraTjeraNdihmese)
    {
        $form = $this->createDeleteForm($mostraTjeraNdihmese);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraTjeraNdihmese);
            $em->flush();
        }

        return $this->redirectToRoute('mostratjerandihmese_index');
    }

    /**
     * Creates a form to delete a MostraTjeraNdihmese entity.
     *
     * @param MostraTjeraNdihmese $mostraTjeraNdihmese The MostraTjeraNdihmese entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraTjeraNdihmese $mostraTjeraNdihmese)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostratjerandihmese_delete', array('id' => $mostraTjeraNdihmese->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
