<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsMenyraEleminimit;
use AiadBundle\Form\SettingsMenyraEleminimitType;

/**
 * SettingsMenyraEleminimit controller.
 *
 * @Route("/konfigurime/menyra_eleminimit")
 */
class SettingsMenyraEleminimitController extends Controller
{
    /**
     * Lists all SettingsMenyraEleminimit entities.
     *
     * @Route("/", name="settingsmenyraeleminimit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsMenyraEleminimits = $em->getRepository('AiadBundle:SettingsMenyraEleminimit')->findAll();

        return $this->render('settingsmenyraeleminimit/index.html.twig', array(
            'settingsMenyraEleminimits' => $settingsMenyraEleminimits,
        ));
    }

    /**
     * Creates a new SettingsMenyraEleminimit entity.
     *
     * @Route("/new", name="settingsmenyraeleminimit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsMenyraEleminimit = new SettingsMenyraEleminimit();
        $form = $this->createForm('AiadBundle\Form\SettingsMenyraEleminimitType', $settingsMenyraEleminimit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsMenyraEleminimit);
            $em->flush();

            return $this->redirectToRoute('settingsmenyraeleminimit_index');
        }

        return $this->render('settingsmenyraeleminimit/new.html.twig', array(
            'settingsMenyraEleminimit' => $settingsMenyraEleminimit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsMenyraEleminimit entity.
     *
     * @Route("/{id}", name="settingsmenyraeleminimit_show")
     * @Method("GET")
     */
    public function showAction(SettingsMenyraEleminimit $settingsMenyraEleminimit)
    {
        $deleteForm = $this->createDeleteForm($settingsMenyraEleminimit);

        return $this->render('settingsmenyraeleminimit/show.html.twig', array(
            'settingsMenyraEleminimit' => $settingsMenyraEleminimit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsMenyraEleminimit entity.
     *
     * @Route("/{id}/edit", name="settingsmenyraeleminimit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsMenyraEleminimit $settingsMenyraEleminimit)
    {
        $deleteForm = $this->createDeleteForm($settingsMenyraEleminimit);
        $editForm = $this->createForm('AiadBundle\Form\SettingsMenyraEleminimitType', $settingsMenyraEleminimit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsMenyraEleminimit);
            $em->flush();

            return $this->redirectToRoute('settingsmenyraeleminimit_index');
        }

        return $this->render('settingsmenyraeleminimit/edit.html.twig', array(
            'settingsMenyraEleminimit' => $settingsMenyraEleminimit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsMenyraEleminimit entity.
     *
     * @Route("/{id}", name="settingsmenyraeleminimit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsMenyraEleminimit $settingsMenyraEleminimit)
    {
        $form = $this->createDeleteForm($settingsMenyraEleminimit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsMenyraEleminimit);
            $em->flush();
        }

        return $this->redirectToRoute('settingsmenyraeleminimit_index');
    }

    /**
     * Creates a form to delete a SettingsMenyraEleminimit entity.
     *
     * @param SettingsMenyraEleminimit $settingsMenyraEleminimit The SettingsMenyraEleminimit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsMenyraEleminimit $settingsMenyraEleminimit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsmenyraeleminimit_delete', array('id' => $settingsMenyraEleminimit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
