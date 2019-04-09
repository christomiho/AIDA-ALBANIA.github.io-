<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsFirmaProdukteve;
use AiadBundle\Form\SettingsFirmaProdukteveType;

/**
 * SettingsFirmaProdukteve controller.
 *
 * @Route("/konfigurime/firma_produkteve")
 */
class SettingsFirmaProdukteveController extends Controller
{
    /**
     * Lists all SettingsFirmaProdukteve entities.
     *
     * @Route("/", name="settingsfirmaprodukteve_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsFirmaProdukteves = $em->getRepository('AiadBundle:SettingsFirmaProdukteve')->findAll();

        return $this->render('settingsfirmaprodukteve/index.html.twig', array(
            'settingsFirmaProdukteves' => $settingsFirmaProdukteves,
        ));
    }

    /**
     * Creates a new SettingsFirmaProdukteve entity.
     *
     * @Route("/new", name="settingsfirmaprodukteve_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsFirmaProdukteve = new SettingsFirmaProdukteve();
        $form = $this->createForm('AiadBundle\Form\SettingsFirmaProdukteveType', $settingsFirmaProdukteve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsFirmaProdukteve);
            $em->flush();

            return $this->redirectToRoute('settingsfirmaprodukteve_show', array('id' => $settingsFirmaProdukteve->getId()));
        }

        return $this->render('settingsfirmaprodukteve/new.html.twig', array(
            'settingsFirmaProdukteve' => $settingsFirmaProdukteve,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsFirmaProdukteve entity.
     *
     * @Route("/{id}", name="settingsfirmaprodukteve_show")
     * @Method("GET")
     */
    public function showAction(SettingsFirmaProdukteve $settingsFirmaProdukteve)
    {
        $deleteForm = $this->createDeleteForm($settingsFirmaProdukteve);

        return $this->render('settingsfirmaprodukteve/show.html.twig', array(
            'settingsFirmaProdukteve' => $settingsFirmaProdukteve,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsFirmaProdukteve entity.
     *
     * @Route("/{id}/edit", name="settingsfirmaprodukteve_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsFirmaProdukteve $settingsFirmaProdukteve)
    {
        $deleteForm = $this->createDeleteForm($settingsFirmaProdukteve);
        $editForm = $this->createForm('AiadBundle\Form\SettingsFirmaProdukteveType', $settingsFirmaProdukteve);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsFirmaProdukteve);
            $em->flush();

            return $this->redirectToRoute('settingsfirmaprodukteve_edit', array('id' => $settingsFirmaProdukteve->getId()));
        }

        return $this->render('settingsfirmaprodukteve/edit.html.twig', array(
            'settingsFirmaProdukteve' => $settingsFirmaProdukteve,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsFirmaProdukteve entity.
     *
     * @Route("/{id}", name="settingsfirmaprodukteve_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsFirmaProdukteve $settingsFirmaProdukteve)
    {
        $form = $this->createDeleteForm($settingsFirmaProdukteve);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsFirmaProdukteve);
            $em->flush();
        }

        return $this->redirectToRoute('settingsfirmaprodukteve_index');
    }

    /**
     * Creates a form to delete a SettingsFirmaProdukteve entity.
     *
     * @param SettingsFirmaProdukteve $settingsFirmaProdukteve The SettingsFirmaProdukteve entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsFirmaProdukteve $settingsFirmaProdukteve)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsfirmaprodukteve_delete', array('id' => $settingsFirmaProdukteve->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
