<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraEuzolera;
use AiadBundle\Form\MostraEuzoleraType;

/**
 * MostraEuzolera controller.
 *
 * @Route("/mostraeuzolera")
 */
class MostraEuzoleraController extends Controller
{
    /**
     * Lists all MostraEuzolera entities.
     *
     * @Route("/", name="mostraeuzolera_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela)
        $mostraEuzoleras = $em->getRepository('AiadBundle:MostraEuzolera')->findBy(array('parcela'=>$parcela));

        return $this->render('mostraeuzolera/index.html.twig', array(
            'mostraEuzoleras' => $mostraEuzoleras,
        ));
    }

    /**
     * Creates a new MostraEuzolera entity.
     *
     * @Route("/new", name="mostraeuzolera_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraEuzolera = new MostraEuzolera();
        $form = $this->createForm('AiadBundle\Form\MostraEuzoleraType', $mostraEuzolera);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraEuzolera);
            $em->flush();

//            return $this->redirectToRoute('mostraeuzolera_show', array('id' => $mostraEuzolera->getId()));
            return $this->redirectToRoute('mostraeuzolera_index');
        }

        return $this->render('mostraeuzolera/new.html.twig', array(
            'mostraEuzolera' => $mostraEuzolera,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraEuzolera entity.
     *
     * @Route("/{id}", name="mostraeuzolera_show")
     * @Method("GET")
     */
    public function showAction(MostraEuzolera $mostraEuzolera)
    {
        $deleteForm = $this->createDeleteForm($mostraEuzolera);

        return $this->render('mostraeuzolera/show.html.twig', array(
            'mostraEuzolera' => $mostraEuzolera,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraEuzolera entity.
     *
     * @Route("/{id}/edit", name="mostraeuzolera_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraEuzolera $mostraEuzolera)
    {
        $deleteForm = $this->createDeleteForm($mostraEuzolera);
        $editForm = $this->createForm('AiadBundle\Form\MostraEuzoleraType', $mostraEuzolera);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraEuzolera);
            $em->flush();

//            return $this->redirectToRoute('mostraeuzolera_edit', array('id' => $mostraEuzolera->getId()));
            return $this->redirectToRoute('mostraeuzolera_index');
        }

        return $this->render('mostraeuzolera/edit.html.twig', array(
            'mostraEuzolera' => $mostraEuzolera,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraEuzolera entity.
     *
     * @Route("/{id}", name="mostraeuzolera_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraEuzolera $mostraEuzolera)
    {
        $form = $this->createDeleteForm($mostraEuzolera);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraEuzolera);
            $em->flush();
        }

        return $this->redirectToRoute('mostraeuzolera_index');
    }

    /**
     * Creates a form to delete a MostraEuzolera entity.
     *
     * @param MostraEuzolera $mostraEuzolera The MostraEuzolera entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraEuzolera $mostraEuzolera)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostraeuzolera_delete', array('id' => $mostraEuzolera->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
