<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraAkariosis;
use AiadBundle\Form\MostraAkariosisType;
use Symfony\Component\HttpFoundation\Session\Session;
/**
 * MostraAkariosis controller.
 *
 * @Route("/mostraakariosis")
 */
class MostraAkariosisController extends Controller
{
    /**
     * Lists all MostraAkariosis entities.
     *
     * @Route("/", name="mostraakariosis_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //the listing will contain only observations belonging only to the current selected parcel
        $mostraAkarioses = $em->getRepository('AiadBundle:MostraAkariosis')->findBy(array('parcela'=>$parcela));

        return $this->render('mostraakariosis/index.html.twig', array(
            'mostraAkarioses' => $mostraAkarioses,
        ));
    }

    /**
     * Creates a new MostraAkariosis entity.
     *
     * @Route("/new", name="mostraakariosis_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraAkariosi = new MostraAkariosis();
        $form = $this->createForm('AiadBundle\Form\MostraAkariosisType', $mostraAkariosi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraAkariosi);
            $em->flush();

//            return $this->redirectToRoute('mostraakariosis_show', array('id' => $mostraAkariosi->getId()));
            return $this->redirectToRoute('mostraakariosis_index');
        }

        return $this->render('mostraakariosis/new.html.twig', array(
            'mostraAkariosi' => $mostraAkariosi,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraAkariosis entity.
     *
     * @Route("/{id}", name="mostraakariosis_show")
     * @Method("GET")
     */
    public function showAction(MostraAkariosis $mostraAkariosi)
    {
        $deleteForm = $this->createDeleteForm($mostraAkariosi);

        return $this->render('mostraakariosis/show.html.twig', array(
            'mostraAkariosi' => $mostraAkariosi,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraAkariosis entity.
     *
     * @Route("/{id}/edit", name="mostraakariosis_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraAkariosis $mostraAkariosi)
    {
        $deleteForm = $this->createDeleteForm($mostraAkariosi);
        $editForm = $this->createForm('AiadBundle\Form\MostraAkariosisType', $mostraAkariosi);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraAkariosi);
            $em->flush();

            return $this->redirectToRoute('mostraakariosis_index');
        }

        return $this->render('mostraakariosis/edit.html.twig', array(
            'mostraAkariosi' => $mostraAkariosi,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraAkariosis entity.
     *
     * @Route("/{id}", name="mostraakariosis_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraAkariosis $mostraAkariosi)
    {
        $form = $this->createDeleteForm($mostraAkariosi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraAkariosi);
            $em->flush();
        }

        return $this->redirectToRoute('mostraakariosis_index');
    }

    /**
     * Creates a form to delete a MostraAkariosis entity.
     *
     * @param MostraAkariosis $mostraAkariosi The MostraAkariosis entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraAkariosis $mostraAkariosi)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostraakariosis_delete', array('id' => $mostraAkariosi->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
