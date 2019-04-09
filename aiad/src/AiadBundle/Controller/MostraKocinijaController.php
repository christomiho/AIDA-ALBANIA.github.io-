<?php

namespace AiadBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AiadBundle\Entity\MostraKocinija;
use AiadBundle\Form\MostraKocinijaType;

/**
 * MostraKocinija controller.
 *
 * @Route("/mostrakocinija")
 */
class MostraKocinijaController extends Controller
{
    /**
     * Lists all MostraKocinija entities.
     *
     * @Route("/", name="mostrakocinija_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        //findBy(array('parcela'=>$parcela))
        $mostraKocinijas = $em->getRepository('AiadBundle:MostraKocinija')->findBy(array('parcela'=>$parcela));

        return $this->render('mostrakocinija/index.html.twig', array(
            'mostraKocinijas' => $mostraKocinijas,
        ));
    }

    /**
     * Creates a new MostraKocinija entity.
     *
     * @Route("/new", name="mostrakocinija_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $mostraKocinija = new MostraKocinija();
        $form = $this->createForm('AiadBundle\Form\MostraKocinijaType', $mostraKocinija);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraKocinija);
            $em->flush();

//            return $this->redirectToRoute('mostrakocinija_show', array('id' => $mostraKocinija->getId()));
            return $this->redirectToRoute('mostrakocinija_index');
        }

        return $this->render('mostrakocinija/new.html.twig', array(
            'mostraKocinija' => $mostraKocinija,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a MostraKocinija entity.
     *
     * @Route("/{id}", name="mostrakocinija_show")
     * @Method("GET")
     */
    public function showAction(MostraKocinija $mostraKocinija)
    {
        $deleteForm = $this->createDeleteForm($mostraKocinija);

        return $this->render('mostrakocinija/show.html.twig', array(
            'mostraKocinija' => $mostraKocinija,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing MostraKocinija entity.
     *
     * @Route("/{id}/edit", name="mostrakocinija_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, MostraKocinija $mostraKocinija)
    {
        $deleteForm = $this->createDeleteForm($mostraKocinija);
        $editForm = $this->createForm('AiadBundle\Form\MostraKocinijaType', $mostraKocinija);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mostraKocinija);
            $em->flush();

//            return $this->redirectToRoute('mostrakocinija_edit', array('id' => $mostraKocinija->getId()));
            return $this->redirectToRoute('mostrakocinija_index');
        }

        return $this->render('mostrakocinija/edit.html.twig', array(
            'mostraKocinija' => $mostraKocinija,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a MostraKocinija entity.
     *
     * @Route("/{id}", name="mostrakocinija_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, MostraKocinija $mostraKocinija)
    {
        $form = $this->createDeleteForm($mostraKocinija);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mostraKocinija);
            $em->flush();
        }

        return $this->redirectToRoute('mostrakocinija_index');
    }

    /**
     * Creates a form to delete a MostraKocinija entity.
     *
     * @param MostraKocinija $mostraKocinija The MostraKocinija entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(MostraKocinija $mostraKocinija)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mostrakocinija_delete', array('id' => $mostraKocinija->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
