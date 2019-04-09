<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsTipiKrasitjes;
use AiadBundle\Form\SettingsTipiKrasitjesType;

/**
 * SettingsTipiKrasitjes controller.
 *
 * @Route("/konfigurime/tipi_krasitjes")
 */
class SettingsTipiKrasitjesController extends Controller
{
    /**
     * Lists all SettingsTipiKrasitjes entities.
     *
     * @Route("/", name="settingstipikrasitjes_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsTipiKrasitjes = $em->getRepository('AiadBundle:SettingsTipiKrasitjes')->findAll();

        return $this->render('settingstipikrasitjes/index.html.twig', array(
            'settingsTipiKrasitjes' => $settingsTipiKrasitjes,
        ));
    }

    /**
     * Creates a new SettingsTipiKrasitjes entity.
     *
     * @Route("/new", name="settingstipikrasitjes_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsTipiKrasitje = new SettingsTipiKrasitjes();
        $form = $this->createForm('AiadBundle\Form\SettingsTipiKrasitjesType', $settingsTipiKrasitje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsTipiKrasitje);
            $em->flush();

            return $this->redirectToRoute('settingstipikrasitjes_index');
        }

        return $this->render('settingstipikrasitjes/new.html.twig', array(
            'settingsTipiKrasitje' => $settingsTipiKrasitje,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsTipiKrasitjes entity.
     *
     * @Route("/{id}", name="settingstipikrasitjes_show")
     * @Method("GET")
     */
    public function showAction(SettingsTipiKrasitjes $settingsTipiKrasitje)
    {
        $deleteForm = $this->createDeleteForm($settingsTipiKrasitje);

        return $this->render('settingstipikrasitjes/show.html.twig', array(
            'settingsTipiKrasitje' => $settingsTipiKrasitje,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsTipiKrasitjes entity.
     *
     * @Route("/{id}/edit", name="settingstipikrasitjes_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsTipiKrasitjes $settingsTipiKrasitje)
    {
        $deleteForm = $this->createDeleteForm($settingsTipiKrasitje);
        $editForm = $this->createForm('AiadBundle\Form\SettingsTipiKrasitjesType', $settingsTipiKrasitje);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsTipiKrasitje);
            $em->flush();

            return $this->redirectToRoute('settingstipikrasitjes_index');
        }

        return $this->render('settingstipikrasitjes/edit.html.twig', array(
            'settingsTipiKrasitje' => $settingsTipiKrasitje,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsTipiKrasitjes entity.
     *
     * @Route("/{id}", name="settingstipikrasitjes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsTipiKrasitjes $settingsTipiKrasitje)
    {
        $form = $this->createDeleteForm($settingsTipiKrasitje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsTipiKrasitje);
            $em->flush();
        }

        return $this->redirectToRoute('settingstipikrasitjes_index');
    }

    /**
     * Creates a form to delete a SettingsTipiKrasitjes entity.
     *
     * @param SettingsTipiKrasitjes $settingsTipiKrasitje The SettingsTipiKrasitjes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsTipiKrasitjes $settingsTipiKrasitje)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingstipikrasitjes_delete', array('id' => $settingsTipiKrasitje->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
