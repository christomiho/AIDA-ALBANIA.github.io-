<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraPraisKarpofage;
use AiadBundle\Form\MostraPraisKarpofageType;

/**
 * MostraPraisKarpofage controller.
 *
 * @Route("/mostrapraiskarpofage")
 */
class MostraPraisKarpofageController extends Controller
{
    /**
     * Lists all MostraPraisKarpofage entities.
     *
     * @Route("/", name="mostrapraiskarpofage_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraPraisKarpofages = $em->getRepository('AiadBundle:MostraPraisKarpofage')->findBy(array('parcela'=>$parcela));

        return $this->render('mostrapraiskarpofage/index.html.twig', array(
            'mostraPraisKarpofages' => $mostraPraisKarpofages,
        ));
    }

    /**
     * Creates a new MostraPraisKarpofage entity.
     *
     * @Route("/new", name="mostrapraiskarpofage_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraPraisKarpofage = new MostraPraisKarpofage();
        $form = $this->createForm('AiadBundle\Form\MostraPraisKarpofageType', $mostraPraisKarpofage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraPraisKarpofage);
            $em->flush();

//            return $this->redirectToRoute('mostrapraiskarpofage_show', array('id' => $mostraPraisKarpofage->getId()));
            return $this->redirectToRoute('mostrapraiskarpofage_index');
        }

        return $this->render('mostrapraiskarpofage/new.html.twig', array(
            'mostraPraisKarpofage' => $mostraPraisKarpofage,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraPraisKarpofage entity.
     *
     * @Route("/{id}", name="mostrapraiskarpofage_show")
     * @Method("GET")
     */
    public function showAction(MostraPraisKarpofage $mostraPraisKarpofage)
    {
        $deleteForm = $this->createDeleteForm($mostraPraisKarpofage);

        return $this->render('mostrapraiskarpofage/show.html.twig', array(
            'mostraPraisKarpofage' => $mostraPraisKarpofage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraPraisKarpofage entity.
     *
     * @Route("/{id}/edit", name="mostrapraiskarpofage_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraPraisKarpofage $mostraPraisKarpofage)
    {
        $deleteForm = $this->createDeleteForm($mostraPraisKarpofage);
        $editForm = $this->createForm('AiadBundle\Form\MostraPraisKarpofageType', $mostraPraisKarpofage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraPraisKarpofage);
            $em->flush();

//            return $this->redirectToRoute('mostrapraiskarpofage_edit', array('id' => $mostraPraisKarpofage->getId()));
            return $this->redirectToRoute('mostrapraiskarpofage_index');

        }

        return $this->render('mostrapraiskarpofage/edit.html.twig', array(
            'mostraPraisKarpofage' => $mostraPraisKarpofage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraPraisKarpofage entity.
     *
     * @Route("/{id}", name="mostrapraiskarpofage_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraPraisKarpofage $mostraPraisKarpofage)
    {
        $form = $this->createDeleteForm($mostraPraisKarpofage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraPraisKarpofage);
            $em->flush();
        }

        return $this->redirectToRoute('mostrapraiskarpofage_index');
    }

    /**
     * Creates a form to delete a MostraPraisKarpofage entity.
     *
     * @param MostraPraisKarpofage $mostraPraisKarpofage The MostraPraisKarpofage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraPraisKarpofage $mostraPraisKarpofage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostrapraiskarpofage_delete', array('id' => $mostraPraisKarpofage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
