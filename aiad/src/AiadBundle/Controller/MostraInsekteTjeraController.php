<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraInsekteTjera;
use AiadBundle\Form\MostraInsekteTjeraType;

/**
 * MostraInsekteTjera controller.
 *
 * @Route("/mostrainsektetjera")
 */
class MostraInsekteTjeraController extends Controller
{
    /**
     * Lists all MostraInsekteTjera entities.
     *
     * @Route("/", name="mostrainsektetjera_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraInsekteTjeras = $em->getRepository('AiadBundle:MostraInsekteTjera')->findBy(array('parcela'=>$parcela));

        return $this->render('mostrainsektetjera/index.html.twig', array(
            'mostraInsekteTjeras' => $mostraInsekteTjeras,
        ));
    }

    /**
     * Creates a new MostraInsekteTjera entity.
     *
     * @Route("/new", name="mostrainsektetjera_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraInsekteTjera = new MostraInsekteTjera();
        $form = $this->createForm('AiadBundle\Form\MostraInsekteTjeraType', $mostraInsekteTjera);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraInsekteTjera);
            $em->flush();

//            return $this->redirectToRoute('mostrainsektetjera_show', array('id' => $mostraInsekteTjera->getId()));
            return $this->redirectToRoute('mostrainsektetjera_index');
        }

        return $this->render('mostrainsektetjera/new.html.twig', array(
            'mostraInsekteTjera' => $mostraInsekteTjera,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraInsekteTjera entity.
     *
     * @Route("/{id}", name="mostrainsektetjera_show")
     * @Method("GET")
     */
    public function showAction(MostraInsekteTjera $mostraInsekteTjera)
    {
        $deleteForm = $this->createDeleteForm($mostraInsekteTjera);

        return $this->render('mostrainsektetjera/show.html.twig', array(
            'mostraInsekteTjera' => $mostraInsekteTjera,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraInsekteTjera entity.
     *
     * @Route("/{id}/edit", name="mostrainsektetjera_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraInsekteTjera $mostraInsekteTjera)
    {
        $deleteForm = $this->createDeleteForm($mostraInsekteTjera);
        $editForm = $this->createForm('AiadBundle\Form\MostraInsekteTjeraType', $mostraInsekteTjera);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraInsekteTjera);
            $em->flush();

//            return $this->redirectToRoute('mostrainsektetjera_edit', array('id' => $mostraInsekteTjera->getId()));
            return $this->redirectToRoute('mostrainsektetjera_index');
        }

        return $this->render('mostrainsektetjera/edit.html.twig', array(
            'mostraInsekteTjera' => $mostraInsekteTjera,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraInsekteTjera entity.
     *
     * @Route("/{id}", name="mostrainsektetjera_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraInsekteTjera $mostraInsekteTjera)
    {
        $form = $this->createDeleteForm($mostraInsekteTjera);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraInsekteTjera);
            $em->flush();
        }

        return $this->redirectToRoute('mostrainsektetjera_index');
    }

    /**
     * Creates a form to delete a MostraInsekteTjera entity.
     *
     * @param MostraInsekteTjera $mostraInsekteTjera The MostraInsekteTjera entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraInsekteTjera $mostraInsekteTjera)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostrainsektetjera_delete', array('id' => $mostraInsekteTjera->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
