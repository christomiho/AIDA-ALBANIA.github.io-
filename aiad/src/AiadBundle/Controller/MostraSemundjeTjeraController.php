<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraSemundjeTjera;
use AiadBundle\Form\MostraSemundjeTjeraType;

/**
 * MostraSemundjeTjera controller.
 *
 * @Route("/mostrakerpudhatjera")
 */
class MostraSemundjeTjeraController extends Controller
{
    /**
     * Lists all MostraSemundjeTjera entities.
     *
     * @Route("/", name="mostrasemundjetjera_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraSemundjeTjeras = $em->getRepository('AiadBundle:MostraSemundjeTjera')->findBy(array('parcela'=>$parcela));

        return $this->render('mostrasemundjetjera/index.html.twig', array(
            'mostraSemundjeTjeras' => $mostraSemundjeTjeras,
        ));
    }

    /**
     * Creates a new MostraSemundjeTjera entity.
     *
     * @Route("/new", name="mostrasemundjetjera_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraSemundjeTjera = new MostraSemundjeTjera();
        $form = $this->createForm('AiadBundle\Form\MostraSemundjeTjeraType', $mostraSemundjeTjera);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraSemundjeTjera);
            $em->flush();

            //return $this->redirectToRoute('mostrasemundjetjera_show', array('id' => $mostraSemundjeTjera->getId()));
            return $this->redirectToRoute('mostrasemundjetjera_index');
        }

        return $this->render('mostrasemundjetjera/new.html.twig', array(
            'mostraSemundjeTjera' => $mostraSemundjeTjera,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraSemundjeTjera entity.
     *
     * @Route("/{id}", name="mostrasemundjetjera_show")
     * @Method("GET")
     */
    public function showAction(MostraSemundjeTjera $mostraSemundjeTjera)
    {
        $deleteForm = $this->createDeleteForm($mostraSemundjeTjera);

        return $this->render('mostrasemundjetjera/show.html.twig', array(
            'mostraSemundjeTjera' => $mostraSemundjeTjera,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraSemundjeTjera entity.
     *
     * @Route("/{id}/edit", name="mostrasemundjetjera_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraSemundjeTjera $mostraSemundjeTjera)
    {
        $deleteForm = $this->createDeleteForm($mostraSemundjeTjera);
        $editForm = $this->createForm('AiadBundle\Form\MostraSemundjeTjeraType', $mostraSemundjeTjera);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraSemundjeTjera);
            $em->flush();

            //return $this->redirectToRoute('mostrasemundjetjera_edit', array('id' => $mostraSemundjeTjera->getId()));
            return $this->redirectToRoute('mostrasemundjetjera_index');
        }

        return $this->render('mostrasemundjetjera/edit.html.twig', array(
            'mostraSemundjeTjera' => $mostraSemundjeTjera,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraSemundjeTjera entity.
     *
     * @Route("/{id}", name="mostrasemundjetjera_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraSemundjeTjera $mostraSemundjeTjera)
    {
        $form = $this->createDeleteForm($mostraSemundjeTjera);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraSemundjeTjera);
            $em->flush();
        }

        return $this->redirectToRoute('mostrasemundjetjera_index');
    }

    /**
     * Creates a form to delete a MostraSemundjeTjera entity.
     *
     * @param MostraSemundjeTjera $mostraSemundjeTjera The MostraSemundjeTjera entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraSemundjeTjera $mostraSemundjeTjera)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostrasemundjetjera_delete', array('id' => $mostraSemundjeTjera->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
