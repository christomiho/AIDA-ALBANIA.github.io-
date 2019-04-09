<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraNegrija;
use AiadBundle\Form\MostraNegrijaType;

/**
 * MostraNegrija controller.
 *
 * @Route("/mostranegrija")
 */
class MostraNegrijaController extends Controller
{
    /**
     * Lists all MostraNegrija entities.
     *
     * @Route("/", name="mostranegrija_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraNegrijas = $em->getRepository('AiadBundle:MostraNegrija')->findBy(array('parcela'=>$parcela));

        return $this->render('mostranegrija/index.html.twig', array(
            'mostraNegrijas' => $mostraNegrijas,
        ));
    }

    /**
     * Creates a new MostraNegrija entity.
     *
     * @Route("/new", name="mostranegrija_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraNegrija = new MostraNegrija();
        $form = $this->createForm('AiadBundle\Form\MostraNegrijaType', $mostraNegrija);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraNegrija);
            $em->flush();

//            return $this->redirectToRoute('mostranegrija_show', array('id' => $mostraNegrija->getId()));
            return $this->redirectToRoute('mostranegrija_index');
        }

        return $this->render('mostranegrija/new.html.twig', array(
            'mostraNegrija' => $mostraNegrija,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraNegrija entity.
     *
     * @Route("/{id}", name="mostranegrija_show")
     * @Method("GET")
     */
    public function showAction(MostraNegrija $mostraNegrija)
    {
        $deleteForm = $this->createDeleteForm($mostraNegrija);

        return $this->render('mostranegrija/show.html.twig', array(
            'mostraNegrija' => $mostraNegrija,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraNegrija entity.
     *
     * @Route("/{id}/edit", name="mostranegrija_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraNegrija $mostraNegrija)
    {
        $deleteForm = $this->createDeleteForm($mostraNegrija);
        $editForm = $this->createForm('AiadBundle\Form\MostraNegrijaType', $mostraNegrija);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraNegrija);
            $em->flush();

//            return $this->redirectToRoute('mostranegrija_edit', array('id' => $mostraNegrija->getId()));
            return $this->redirectToRoute('mostranegrija_index');
        }

        return $this->render('mostranegrija/edit.html.twig', array(
            'mostraNegrija' => $mostraNegrija,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraNegrija entity.
     *
     * @Route("/{id}", name="mostranegrija_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraNegrija $mostraNegrija)
    {
        $form = $this->createDeleteForm($mostraNegrija);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraNegrija);
            $em->flush();
        }

        return $this->redirectToRoute('mostranegrija_index');
    }

    /**
     * Creates a form to delete a MostraNegrija entity.
     *
     * @param MostraNegrija $mostraNegrija The MostraNegrija entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraNegrija $mostraNegrija)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostranegrija_delete', array('id' => $mostraNegrija->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
