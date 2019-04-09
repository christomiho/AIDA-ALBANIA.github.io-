<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\TabelaPermbledheseAplikimSemundjesh;
use AiadBundle\Form\TabelaPermbledheseAplikimSemundjeshType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


/**
 * TabelaPermbledheseAplikimSemundjesh controller.
 *
 * @Route("/tabelapermbledheseaplikimsemundjesh")
 */
class TabelaPermbledheseAplikimSemundjeshController extends Controller
{
    /**
     * Lists all TabelaPermbledheseAplikimSemundjesh entities.
     *
     * @Route("/", name="tabelapermbledheseaplikimsemundjesh_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $tabelaPermbledheseAplikimSemundjeshes = $em->getRepository('AiadBundle:TabelaPermbledheseAplikimSemundjesh')->findBy(array('parcela'=>$parcela));

        return $this->render('tabelapermbledheseaplikimsemundjesh/index.html.twig', array(
            'tabelaPermbledheseAplikimSemundjeshes' => $tabelaPermbledheseAplikimSemundjeshes,
        ));
    }

    /**
     * Creates a new TabelaPermbledheseAplikimSemundjesh entity.
     *
     * @Route("/new", name="tabelapermbledheseaplikimsemundjesh_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $tabelaPermbledheseAplikimSemundjesh = new TabelaPermbledheseAplikimSemundjesh();
        $form = $this->createForm('AiadBundle\Form\TabelaPermbledheseAplikimSemundjeshType', $tabelaPermbledheseAplikimSemundjesh);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tabelaPermbledheseAplikimSemundjesh);
            $em->flush();

            return $this->redirectToRoute('tabelapermbledheseaplikimsemundjesh_show', array('id' => $tabelaPermbledheseAplikimSemundjesh->getId()));
        }

        return $this->render('tabelapermbledheseaplikimsemundjesh/new.html.twig', array(
            'tabelaPermbledheseAplikimSemundjesh' => $tabelaPermbledheseAplikimSemundjesh,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TabelaPermbledheseAplikimSemundjesh entity.
     *
     * @Route("/{id}", name="tabelapermbledheseaplikimsemundjesh_show")
     * @Method("GET")
     */
    public function showAction(TabelaPermbledheseAplikimSemundjesh $tabelaPermbledheseAplikimSemundjesh)
    {
        $deleteForm = $this->createDeleteForm($tabelaPermbledheseAplikimSemundjesh);

        return $this->render('tabelapermbledheseaplikimsemundjesh/show.html.twig', array(
            'tabelaPermbledheseAplikimSemundjesh' => $tabelaPermbledheseAplikimSemundjesh,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing TabelaPermbledheseAplikimSemundjesh entity.
     *
     * @Route("/{id}/edit", name="tabelapermbledheseaplikimsemundjesh_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TabelaPermbledheseAplikimSemundjesh $tabelaPermbledheseAplikimSemundjesh)
    {
        $deleteForm = $this->createDeleteForm($tabelaPermbledheseAplikimSemundjesh);
        $editForm = $this->createForm('AiadBundle\Form\TabelaPermbledheseAplikimSemundjeshType', $tabelaPermbledheseAplikimSemundjesh);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tabelaPermbledheseAplikimSemundjesh);
            $em->flush();
            $session = $this->getRequest()->getSession();
            $check=$session->set('aplikim_number', 9999);

            return $this->redirectToRoute('tabelapermbledheseaplikimsemundjesh_index');
        }

        return $this->render('tabelapermbledheseaplikimsemundjesh/edit.html.twig', array(
            'tabelaPermbledheseAplikimSemundjesh' => $tabelaPermbledheseAplikimSemundjesh,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a TabelaPermbledheseAplikimSemundjesh entity.
     *
     * @Route("/{id}", name="tabelapermbledheseaplikimsemundjesh_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TabelaPermbledheseAplikimSemundjesh $tabelaPermbledheseAplikimSemundjesh)
    {
        $form = $this->createDeleteForm($tabelaPermbledheseAplikimSemundjesh);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($tabelaPermbledheseAplikimSemundjesh);
            $em->flush();
            //ketu behet delete i aplikimit
        }

        return $this->redirectToRoute('tabelapermbledheseaplikimsemundjesh_index');
    }

    /**
     * Creates a form to delete a TabelaPermbledheseAplikimSemundjesh entity.
     *
     * @param TabelaPermbledheseAplikimSemundjesh $tabelaPermbledheseAplikimSemundjesh The TabelaPermbledheseAplikimSemundjesh entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TabelaPermbledheseAplikimSemundjesh $tabelaPermbledheseAplikimSemundjesh)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tabelapermbledheseaplikimsemundjesh_delete', array('id' => $tabelaPermbledheseAplikimSemundjesh->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
