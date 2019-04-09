<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\AplikimeSemundjeTedhena;
use AiadBundle\Form\AplikimeSemundjeTedhenaType;

/**
 * AplikimeSemundjeTedhena controller.
 *
 * @Route("/aplikimesemundjetedhena")
 */
class AplikimeSemundjeTedhenaController extends Controller
{
    /**
     * Lists all AplikimeSemundjeTedhena entities.
     *
     * @Route("/details/{id}", name="aplikimesemundjetedhena_index")
     * @Method("GET")
     */
    public function indexAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $aplikimeSemundjeTedhenas = $em->getRepository('AiadBundle:AplikimeSemundjeTedhena')->findBy(array('referimiTabelaPermbledhese'=>$id));

        return $this->render('aplikimesemundjetedhena/index.html.twig', array(
            'aplikimeSemundjeTedhenas' => $aplikimeSemundjeTedhenas,
        ));
    }

    /**
     * Creates a new AplikimeSemundjeTedhena entity.
     *
     * @Route("/new", name="aplikimesemundjetedhena_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $aplikimeSemundjeTedhena = new AplikimeSemundjeTedhena();
        $form = $this->createForm('AiadBundle\Form\AplikimeSemundjeTedhenaType', $aplikimeSemundjeTedhena);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aplikimeSemundjeTedhena);
            $em->flush();

            return $this->redirectToRoute('aplikimesemundjetedhena_show', array('id' => $aplikimeSemundjeTedhena->getId()));
        }

        return $this->render('aplikimesemundjetedhena/new.html.twig', array(
            'aplikimeSemundjeTedhena' => $aplikimeSemundjeTedhena,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a AplikimeSemundjeTedhena entity.
     *
     * @Route("/{id}", name="aplikimesemundjetedhena_show")
     * @Method("GET")
     */
    public function showAction(AplikimeSemundjeTedhena $aplikimeSemundjeTedhena)
    {
        $deleteForm = $this->createDeleteForm($aplikimeSemundjeTedhena);

        return $this->render('aplikimesemundjetedhena/show.html.twig', array(
            'aplikimeSemundjeTedhena' => $aplikimeSemundjeTedhena,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing AplikimeSemundjeTedhena entity.
     *
     * @Route("/{id}/edit", name="aplikimesemundjetedhena_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, AplikimeSemundjeTedhena $aplikimeSemundjeTedhena)
    {
        $deleteForm = $this->createDeleteForm($aplikimeSemundjeTedhena);
        $editForm = $this->createForm('AiadBundle\Form\AplikimeSemundjeTedhenaType', $aplikimeSemundjeTedhena);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aplikimeSemundjeTedhena);
            $em->flush();

            return $this->redirectToRoute('tabelapermbledheseaplikimsemundjesh_index');
        }

        return $this->render('aplikimesemundjetedhena/edit.html.twig', array(
            'aplikimeSemundjeTedhena' => $aplikimeSemundjeTedhena,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a AplikimeSemundjeTedhena entity.
     *
     * @Route("/{id}", name="aplikimesemundjetedhena_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, AplikimeSemundjeTedhena $aplikimeSemundjeTedhena)
    {
        $form = $this->createDeleteForm($aplikimeSemundjeTedhena);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($aplikimeSemundjeTedhena);
            $em->flush();
        }

        return $this->redirectToRoute('tabelapermbledheseaplikimsemundjesh_index');
    }

    /**
     * Creates a form to delete a AplikimeSemundjeTedhena entity.
     *
     * @param AplikimeSemundjeTedhena $aplikimeSemundjeTedhena The AplikimeSemundjeTedhena entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(AplikimeSemundjeTedhena $aplikimeSemundjeTedhena)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aplikimesemundjetedhena_delete', array('id' => $aplikimeSemundjeTedhena->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
