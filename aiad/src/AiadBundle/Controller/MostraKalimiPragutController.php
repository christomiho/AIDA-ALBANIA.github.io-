<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraKalimiPragut;
use AiadBundle\Form\MostraKalimiPragutType;

/**
 * MostraKalimiPragut controller.
 *
 * @Route("/mostrakalimipragut")
 */
class MostraKalimiPragutController extends Controller
{
    /**
     * Lists all MostraKalimiPragut entities.
     *
     * @Route("/", name="mostrakalimipragut_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraKalimiPraguts = $em->getRepository('AiadBundle:MostraKalimiPragut')->findBy(array('parcela'=>$parcela));

        return $this->render('mostrakalimipragut/index.html.twig', array(
            'mostraKalimiPraguts' => $mostraKalimiPraguts,
        ));
    }

    /**
     * Creates a new MostraKalimiPragut entity.
     *
     * @Route("/new", name="mostrakalimipragut_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraKalimiPragut = new MostraKalimiPragut();
        $form = $this->createForm('AiadBundle\Form\MostraKalimiPragutType', $mostraKalimiPragut);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraKalimiPragut);
            $em->flush();

            //return $this->redirectToRoute('mostrakalimipragut_show', array('id' => $mostraKalimiPragut->getId()));
            return $this->redirectToRoute('mostrakalimipragut_index');
        }

        return $this->render('mostrakalimipragut/new.html.twig', array(
            'mostraKalimiPragut' => $mostraKalimiPragut,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraKalimiPragut entity.
     *
     * @Route("/{id}", name="mostrakalimipragut_show")
     * @Method("GET")
     */
    public function showAction(MostraKalimiPragut $mostraKalimiPragut)
    {
        $deleteForm = $this->createDeleteForm($mostraKalimiPragut);

        return $this->render('mostrakalimipragut/show.html.twig', array(
            'mostraKalimiPragut' => $mostraKalimiPragut,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraKalimiPragut entity.
     *
     * @Route("/{id}/edit", name="mostrakalimipragut_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraKalimiPragut $mostraKalimiPragut)
    {
        $deleteForm = $this->createDeleteForm($mostraKalimiPragut);
        $editForm = $this->createForm('AiadBundle\Form\MostraKalimiPragutType', $mostraKalimiPragut);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraKalimiPragut);
            $em->flush();

            //return $this->redirectToRoute('mostrakalimipragut_edit', array('id' => $mostraKalimiPragut->getId()));
            return $this->redirectToRoute('mostrakalimipragut_index');
        }

        return $this->render('mostrakalimipragut/edit.html.twig', array(
            'mostraKalimiPragut' => $mostraKalimiPragut,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraKalimiPragut entity.
     *
     * @Route("/{id}", name="mostrakalimipragut_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraKalimiPragut $mostraKalimiPragut)
    {
        $form = $this->createDeleteForm($mostraKalimiPragut);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraKalimiPragut);
            $em->flush();
        }

        return $this->redirectToRoute('mostrakalimipragut_index');
    }

    /**
     * Creates a form to delete a MostraKalimiPragut entity.
     *
     * @param MostraKalimiPragut $mostraKalimiPragut The MostraKalimiPragut entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraKalimiPragut $mostraKalimiPragut)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostrakalimipragut_delete', array('id' => $mostraKalimiPragut->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
