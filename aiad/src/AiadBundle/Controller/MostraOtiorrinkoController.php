<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraOtiorrinko;
use AiadBundle\Form\MostraOtiorrinkoType;

/**
 * MostraOtiorrinko controller.
 *
 * @Route("/mostraotiorrinko")
 */
class MostraOtiorrinkoController extends Controller
{
    /**
     * Lists all MostraOtiorrinko entities.
     *
     * @Route("/", name="mostraotiorrinko_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraOtiorrinkos = $em->getRepository('AiadBundle:MostraOtiorrinko')->findBy(array('parcela'=>$parcela));

        return $this->render('mostraotiorrinko/index.html.twig', array(
            'mostraOtiorrinkos' => $mostraOtiorrinkos,
        ));
    }

    /**
     * Creates a new MostraOtiorrinko entity.
     *
     * @Route("/new", name="mostraotiorrinko_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraOtiorrinko = new MostraOtiorrinko();
        $form = $this->createForm('AiadBundle\Form\MostraOtiorrinkoType', $mostraOtiorrinko);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraOtiorrinko);
            $em->flush();

//            return $this->redirectToRoute('mostraotiorrinko_show', array('id' => $mostraOtiorrinko->getId()));
            return $this->redirectToRoute('mostraotiorrinko_index');
        }

        return $this->render('mostraotiorrinko/new.html.twig', array(
            'mostraOtiorrinko' => $mostraOtiorrinko,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraOtiorrinko entity.
     *
     * @Route("/{id}", name="mostraotiorrinko_show")
     * @Method("GET")
     */
    public function showAction(MostraOtiorrinko $mostraOtiorrinko)
    {
        $deleteForm = $this->createDeleteForm($mostraOtiorrinko);

        return $this->render('mostraotiorrinko/show.html.twig', array(
            'mostraOtiorrinko' => $mostraOtiorrinko,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraOtiorrinko entity.
     *
     * @Route("/{id}/edit", name="mostraotiorrinko_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraOtiorrinko $mostraOtiorrinko)
    {
        $deleteForm = $this->createDeleteForm($mostraOtiorrinko);
        $editForm = $this->createForm('AiadBundle\Form\MostraOtiorrinkoType', $mostraOtiorrinko);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraOtiorrinko);
            $em->flush();

//            return $this->redirectToRoute('mostraotiorrinko_edit', array('id' => $mostraOtiorrinko->getId()));
            return $this->redirectToRoute('mostraotiorrinko_index');

        }

        return $this->render('mostraotiorrinko/edit.html.twig', array(
            'mostraOtiorrinko' => $mostraOtiorrinko,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraOtiorrinko entity.
     *
     * @Route("/{id}", name="mostraotiorrinko_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraOtiorrinko $mostraOtiorrinko)
    {
        $form = $this->createDeleteForm($mostraOtiorrinko);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraOtiorrinko);
            $em->flush();
        }

        return $this->redirectToRoute('mostraotiorrinko_index');
    }

    /**
     * Creates a form to delete a MostraOtiorrinko entity.
     *
     * @param MostraOtiorrinko $mostraOtiorrinko The MostraOtiorrinko entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraOtiorrinko $mostraOtiorrinko)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostraotiorrinko_delete', array('id' => $mostraOtiorrinko->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
