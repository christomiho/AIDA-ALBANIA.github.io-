<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\ParcelaKultivari;
use AiadBundle\Form\ParcelaKultivariType;

/**
 * ParcelaKultivari controller.
 *
 * @Route("/parcelakultivari")
 */
class ParcelaKultivariController extends Controller
{
    /**
     * Lists all ParcelaKultivari entities.
     *
     * @Route("/", name="parcelakultivari_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $parcelaKultivaris = $em->getRepository('AiadBundle:ParcelaKultivari')->findBy(array('parcela'=>$parcela));

        return $this->render('parcelakultivari/index.html.twig', array(
            'parcelaKultivaris' => $parcelaKultivaris,
        ));
    }

    /**
     * Creates a new ParcelaKultivari entity.
     *
     * @Route("/new", name="parcelakultivari_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $parcelaKultivari = new ParcelaKultivari();
        $form = $this->createForm('AiadBundle\Form\ParcelaKultivariType', $parcelaKultivari);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parcelaKultivari);
            $em->flush();

            return $this->redirectToRoute('parcelakultivari_show', array('id' => $parcelaKultivari->getId()));
        }

        return $this->render('parcelakultivari/new.html.twig', array(
            'parcelaKultivari' => $parcelaKultivari,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ParcelaKultivari entity.
     *
     * @Route("/{id}", name="parcelakultivari_show")
     * @Method("GET")
     */
    public function showAction(ParcelaKultivari $parcelaKultivari)
    {
        $deleteForm = $this->createDeleteForm($parcelaKultivari);

        return $this->render('parcelakultivari/show.html.twig', array(
            'parcelaKultivari' => $parcelaKultivari,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ParcelaKultivari entity.
     *
     * @Route("/{id}/edit", name="parcelakultivari_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ParcelaKultivari $parcelaKultivari)
    {
        $deleteForm = $this->createDeleteForm($parcelaKultivari);
        $editForm = $this->createForm('AiadBundle\Form\ParcelaKultivariType', $parcelaKultivari);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($parcelaKultivari);
            $em->flush();

            return $this->redirectToRoute('parcelakultivari_edit', array('id' => $parcelaKultivari->getId()));
        }

        return $this->render('parcelakultivari/edit.html.twig', array(
            'parcelaKultivari' => $parcelaKultivari,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ParcelaKultivari entity.
     *
     * @Route("/{id}", name="parcelakultivari_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ParcelaKultivari $parcelaKultivari)
    {
        $form = $this->createDeleteForm($parcelaKultivari);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($parcelaKultivari);
            $em->flush();
        }

        return $this->redirectToRoute('parcelakultivari_index');
    }

    /**
     * Creates a form to delete a ParcelaKultivari entity.
     *
     * @param ParcelaKultivari $parcelaKultivari The ParcelaKultivari entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ParcelaKultivari $parcelaKultivari)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('parcelakultivari_delete', array('id' => $parcelaKultivari->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
