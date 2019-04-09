<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraBarrenijo;
use AiadBundle\Form\MostraBarrenijoType;
use Symfony\Component\HttpFoundation\Session\Session;
/**
 * MostraBarrenijo controller.
 *
 * @Route("/mostrabarrenijo")
 */
class MostraBarrenijoController extends Controller
{
    /**
     * Lists all MostraBarrenijo entities.
     *
     * @Route("/", name="mostrabarrenijo_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        $mostraBarrenijos = $em->getRepository('AiadBundle:MostraBarrenijo')->findBy(array('parcela'=>$parcela));

        return $this->render('mostrabarrenijo/index.html.twig', array(
            'mostraBarrenijos' => $mostraBarrenijos,
        ));
    }

    /**
     * Creates a new MostraBarrenijo entity.
     *
     * @Route("/new", name="mostrabarrenijo_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraBarrenijo = new MostraBarrenijo();
        $form = $this->createForm('AiadBundle\Form\MostraBarrenijoType', $mostraBarrenijo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraBarrenijo);
            $em->flush();

//            return $this->redirectToRoute('mostrabarrenijo_show', array('id' => $mostraBarrenijo->getId()));
           return $this->redirectToRoute('mostrabarrenijo_index');
        }

        return $this->render('mostrabarrenijo/new.html.twig', array(
            'mostraBarrenijo' => $mostraBarrenijo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraBarrenijo entity.
     *
     * @Route("/{id}", name="mostrabarrenijo_show")
     * @Method("GET")
     */
    public function showAction(MostraBarrenijo $mostraBarrenijo)
    {
        $deleteForm = $this->createDeleteForm($mostraBarrenijo);

        return $this->render('mostrabarrenijo/show.html.twig', array(
            'mostraBarrenijo' => $mostraBarrenijo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraBarrenijo entity.
     *
     * @Route("/{id}/edit", name="mostrabarrenijo_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraBarrenijo $mostraBarrenijo)
    {
        $deleteForm = $this->createDeleteForm($mostraBarrenijo);
        $editForm = $this->createForm('AiadBundle\Form\MostraBarrenijoType', $mostraBarrenijo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraBarrenijo);
            $em->flush();

//            return $this->redirectToRoute('mostrabarrenijo_edit', array('id' => $mostraBarrenijo->getId()));
            return $this->redirectToRoute('mostrabarrenijo_index');
        }

        return $this->render('mostrabarrenijo/edit.html.twig', array(
            'mostraBarrenijo' => $mostraBarrenijo,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraBarrenijo entity.
     *
     * @Route("/{id}", name="mostrabarrenijo_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraBarrenijo $mostraBarrenijo)
    {
        $form = $this->createDeleteForm($mostraBarrenijo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraBarrenijo);
            $em->flush();
        }

        return $this->redirectToRoute('mostrabarrenijo_index');
    }

    /**
     * Creates a form to delete a MostraBarrenijo entity.
     *
     * @param MostraBarrenijo $mostraBarrenijo The MostraBarrenijo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraBarrenijo $mostraBarrenijo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostrabarrenijo_delete', array('id' => $mostraBarrenijo->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
