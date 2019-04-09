<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraVerticilium;
use AiadBundle\Form\MostraVerticiliumType;

/**
 * MostraVerticilium controller.
 *
 * @Route("/mostraverticilium")
 */
class MostraVerticiliumController extends Controller
{
    /**
     * Lists all MostraVerticilium entities.
     *
     * @Route("/", name="mostraverticilium_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraVerticilia = $em->getRepository('AiadBundle:MostraVerticilium')->findBy(array('parcela'=>$parcela));

        return $this->render('mostraverticilium/index.html.twig', array(
            'mostraVerticilia' => $mostraVerticilia,
        ));
    }

    /**
     * Creates a new MostraVerticilium entity.
     *
     * @Route("/new", name="mostraverticilium_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraVerticilium = new MostraVerticilium();
        $form = $this->createForm('AiadBundle\Form\MostraVerticiliumType', $mostraVerticilium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraVerticilium);
            $em->flush();

//            return $this->redirectToRoute('mostraverticilium_show', array('id' => $mostraVerticilium->getId()));
            return $this->redirectToRoute('mostraverticilium_index');
        }

        return $this->render('mostraverticilium/new.html.twig', array(
            'mostraVerticilium' => $mostraVerticilium,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraVerticilium entity.
     *
     * @Route("/{id}", name="mostraverticilium_show")
     * @Method("GET")
     */
    public function showAction(MostraVerticilium $mostraVerticilium)
    {
        $deleteForm = $this->createDeleteForm($mostraVerticilium);

        return $this->render('mostraverticilium/show.html.twig', array(
            'mostraVerticilium' => $mostraVerticilium,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraVerticilium entity.
     *
     * @Route("/{id}/edit", name="mostraverticilium_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraVerticilium $mostraVerticilium)
    {
        $deleteForm = $this->createDeleteForm($mostraVerticilium);
        $editForm = $this->createForm('AiadBundle\Form\MostraVerticiliumType', $mostraVerticilium);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraVerticilium);
            $em->flush();

            //return $this->redirectToRoute('mostraverticilium_edit', array('id' => $mostraVerticilium->getId()));
            return $this->redirectToRoute('mostraverticilium_index');

        }

        return $this->render('mostraverticilium/edit.html.twig', array(
            'mostraVerticilium' => $mostraVerticilium,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraVerticilium entity.
     *
     * @Route("/{id}", name="mostraverticilium_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraVerticilium $mostraVerticilium)
    {
        $form = $this->createDeleteForm($mostraVerticilium);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraVerticilium);
            $em->flush();
        }

        return $this->redirectToRoute('mostraverticilium_index');
    }

    /**
     * Creates a form to delete a MostraVerticilium entity.
     *
     * @param MostraVerticilium $mostraVerticilium The MostraVerticilium entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraVerticilium $mostraVerticilium)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostraverticilium_delete', array('id' => $mostraVerticilium->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
