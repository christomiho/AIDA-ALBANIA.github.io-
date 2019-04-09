<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsProduktiKomercial;
use AiadBundle\Form\SettingsProduktiKomercialType;

/**
 * SettingsProduktiKomercial controller.
 *
 * @Route("/konfigurime/produkti_komercial")
 */
class SettingsProduktiKomercialController extends Controller
{
    /**
     * Lists all SettingsProduktiKomercial entities.
     *
     * @Route("/", name="settingsproduktikomercial_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsProduktiKomercials = $em->getRepository('AiadBundle:SettingsProduktiKomercial')->findAll();

        return $this->render('settingsproduktikomercial/index.html.twig', array(
            'settingsProduktiKomercials' => $settingsProduktiKomercials,
        ));
    }

    /**
     * Creates a new SettingsProduktiKomercial entity.
     *
     * @Route("/new", name="settingsproduktikomercial_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsProduktiKomercial = new SettingsProduktiKomercial();
        $form = $this->createForm('AiadBundle\Form\SettingsProduktiKomercialType', $settingsProduktiKomercial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsProduktiKomercial);
            $em->flush();

            return $this->redirectToRoute('settingsproduktikomercial_show', array('id' => $settingsProduktiKomercial->getId()));
        }

        return $this->render('settingsproduktikomercial/new.html.twig', array(
            'settingsProduktiKomercial' => $settingsProduktiKomercial,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsProduktiKomercial entity.
     *
     * @Route("/{id}", name="settingsproduktikomercial_show")
     * @Method("GET")
     */
    public function showAction(SettingsProduktiKomercial $settingsProduktiKomercial)
    {
        $deleteForm = $this->createDeleteForm($settingsProduktiKomercial);

        return $this->render('settingsproduktikomercial/show.html.twig', array(
            'settingsProduktiKomercial' => $settingsProduktiKomercial,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsProduktiKomercial entity.
     *
     * @Route("/{id}/edit", name="settingsproduktikomercial_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsProduktiKomercial $settingsProduktiKomercial)
    {
        $deleteForm = $this->createDeleteForm($settingsProduktiKomercial);
        $editForm = $this->createForm('AiadBundle\Form\SettingsProduktiKomercialType', $settingsProduktiKomercial);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsProduktiKomercial);
            $em->flush();

            return $this->redirectToRoute('settingsproduktikomercial_edit', array('id' => $settingsProduktiKomercial->getId()));
        }

        return $this->render('settingsproduktikomercial/edit.html.twig', array(
            'settingsProduktiKomercial' => $settingsProduktiKomercial,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsProduktiKomercial entity.
     *
     * @Route("/{id}", name="settingsproduktikomercial_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsProduktiKomercial $settingsProduktiKomercial)
    {
        $form = $this->createDeleteForm($settingsProduktiKomercial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsProduktiKomercial);
            $em->flush();
        }

        return $this->redirectToRoute('settingsproduktikomercial_index');
    }

    /**
     * Creates a form to delete a SettingsProduktiKomercial entity.
     *
     * @param SettingsProduktiKomercial $settingsProduktiKomercial The SettingsProduktiKomercial entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsProduktiKomercial $settingsProduktiKomercial)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsproduktikomercial_delete', array('id' => $settingsProduktiKomercial->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
