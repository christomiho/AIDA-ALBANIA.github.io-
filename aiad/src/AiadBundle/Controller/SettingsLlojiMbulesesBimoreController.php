<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\SettingsLlojiMbulesesBimore;
use AiadBundle\Form\SettingsLlojiMbulesesBimoreType;

/**
 * SettingsLlojiMbulesesBimore controller.
 *
 * @Route("/konfigurime/lloji_mbuleses_bimore")
 */
class SettingsLlojiMbulesesBimoreController extends Controller
{
    /**
     * Lists all SettingsLlojiMbulesesBimore entities.
     *
     * @Route("/", name="settingsllojimbulesesbimore_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $settingsLlojiMbulesesBimores = $em->getRepository('AiadBundle:SettingsLlojiMbulesesBimore')->findAll();

        return $this->render('settingsllojimbulesesbimore/index.html.twig', array(
            'settingsLlojiMbulesesBimores' => $settingsLlojiMbulesesBimores,
        ));
    }

    /**
     * Creates a new SettingsLlojiMbulesesBimore entity.
     *
     * @Route("/new", name="settingsllojimbulesesbimore_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $settingsLlojiMbulesesBimore = new SettingsLlojiMbulesesBimore();
        $form = $this->createForm('AiadBundle\Form\SettingsLlojiMbulesesBimoreType', $settingsLlojiMbulesesBimore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsLlojiMbulesesBimore);
            $em->flush();

            return $this->redirectToRoute('settingsllojimbulesesbimore_index');
        }

        return $this->render('settingsllojimbulesesbimore/new.html.twig', array(
            'settingsLlojiMbulesesBimore' => $settingsLlojiMbulesesBimore,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SettingsLlojiMbulesesBimore entity.
     *
     * @Route("/{id}", name="settingsllojimbulesesbimore_show")
     * @Method("GET")
     */
    public function showAction(SettingsLlojiMbulesesBimore $settingsLlojiMbulesesBimore)
    {
        $deleteForm = $this->createDeleteForm($settingsLlojiMbulesesBimore);

        return $this->render('settingsllojimbulesesbimore/show.html.twig', array(
            'settingsLlojiMbulesesBimore' => $settingsLlojiMbulesesBimore,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SettingsLlojiMbulesesBimore entity.
     *
     * @Route("/{id}/edit", name="settingsllojimbulesesbimore_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, SettingsLlojiMbulesesBimore $settingsLlojiMbulesesBimore)
    {
        $deleteForm = $this->createDeleteForm($settingsLlojiMbulesesBimore);
        $editForm = $this->createForm('AiadBundle\Form\SettingsLlojiMbulesesBimoreType', $settingsLlojiMbulesesBimore);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($settingsLlojiMbulesesBimore);
            $em->flush();

            return $this->redirectToRoute('settingsllojimbulesesbimore_index');
        }

        return $this->render('settingsllojimbulesesbimore/edit.html.twig', array(
            'settingsLlojiMbulesesBimore' => $settingsLlojiMbulesesBimore,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SettingsLlojiMbulesesBimore entity.
     *
     * @Route("/{id}", name="settingsllojimbulesesbimore_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, SettingsLlojiMbulesesBimore $settingsLlojiMbulesesBimore)
    {
        $form = $this->createDeleteForm($settingsLlojiMbulesesBimore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($settingsLlojiMbulesesBimore);
            $em->flush();
        }

        return $this->redirectToRoute('settingsllojimbulesesbimore_index');
    }

    /**
     * Creates a form to delete a SettingsLlojiMbulesesBimore entity.
     *
     * @param SettingsLlojiMbulesesBimore $settingsLlojiMbulesesBimore The SettingsLlojiMbulesesBimore entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SettingsLlojiMbulesesBimore $settingsLlojiMbulesesBimore)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('settingsllojimbulesesbimore_delete', array('id' => $settingsLlojiMbulesesBimore->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
