<?php
/**
 * Created by PhpStorm.
 * User: rblloshmi12
 * Date: 6/4/2016
 * Time: 1:28 PM
 */

namespace AiadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class AplikimeController extends Controller {

    /**
     * @Route("/aplikimi_pleherimi_lista", name="aplikimi_pleherimi_lista")
     */
    public function apListAction()
    {
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        $aplikime_pleherimi = $em->getRepository('AiadBundle:AplikimePleherimi')->findBy(array('parcela'=>$parcela));
        return $this->render('AiadBundle:Aplikime:aplikime_pleherimi_lista.html.twig', array('aplikime_pleherimi'=>$aplikime_pleherimi));
    }

    /**
     * @Route("/aplikimi_pleherimi_form", name="aplikimi_pleherimi_form")
     */
    public function apFormAction()
    {

        $em = $this->getDoctrine()->getManager();
        $tipi = $em->getRepository('AiadBundle:SettingsPleherimiTipi')->findAll();
        $modeli = $em->getRepository('AiadBundle:SettingsModeliPleherimit')->findAll();
        $produkti = $em->getRepository('AiadBundle:SettingsProduktiKomercial')->findAll();
        $njesia = $em->getRepository('AiadBundle:SettingsDozaNjesia')->findAll();
        $firma = $em->getRepository('AiadBundle:SettingsFirmaProdukteve')->findAll();
        $justifikimi = $em->getRepository('AiadBundle:SettingsPleherimiJustifikim')->findAll();
        return $this->render('AiadBundle:Aplikime:aplikime_form.html.twig', array('tipi'=>$tipi, 'modeli'=>$modeli, 'produkti'=>$produkti, 'njesia'=>$njesia, 'firma'=>$firma, 'justifikimi'=>$justifikimi));

    }
    /**
     * @param $id
     * @Route("/aplikimi_pleherimi_edit/{id}", name="aplikimi_pleherimi_edit")
     */
    public function apEditAction($id)
    {

        $em = $this->getDoctrine()->getManager();
        $tipi = $em->getRepository('AiadBundle:SettingsPleherimiTipi')->findAll();
        $modeli = $em->getRepository('AiadBundle:SettingsModeliPleherimit')->findAll();
        $produkti = $em->getRepository('AiadBundle:SettingsProduktiKomercial')->findAll();
        $njesia = $em->getRepository('AiadBundle:SettingsDozaNjesia')->findAll();
        $firma = $em->getRepository('AiadBundle:SettingsFirmaProdukteve')->findAll();
        $justifikimi = $em->getRepository('AiadBundle:SettingsPleherimiJustifikim')->findAll();
        $aplikimi = $em->getRepository('AiadBundle:AplikimePleherimi')->find($id);
        return $this->render('AiadBundle:Aplikime:aplikime_edit_form.html.twig', array('ap'=>$aplikimi, 'tipi'=>$tipi, 'modeli'=>$modeli, 'produkti'=>$produkti, 'njesia'=>$njesia, 'firma'=>$firma, 'justifikimi'=>$justifikimi));

    }

    /**
     * @param Request $request
     * @Route("/shto_pleherim", name="post_aplikimi_pleherimi")
     */

    public function insertNewAplikimiAction(){

        $post = Request::createFromGlobals();
        $em = $this->getDoctrine()->getManager();

        if ($post->request->has('submit')) {
            //insert all data into aplikime_pleherimi table
            $data=$post->request->get('data');
            $tipi=$post->request->get('tipi');
            $modeli=$post->request->get('modeli');
            $sip=$post->request->get('sip');
            $prod_komercial=$post->request->get('prod_komercial');
            $lenda_aktive=$post->request->get('lenda_aktive');
            $doza=$post->request->get('doza');
            $njesia=$post->request->get('njesia');
            $nitrat=$post->request->get('nitrat');
            $fosfor=$post->request->get('fosfor');
            $potassium=$post->request->get('potassium');
            $nitrat_uf=$post->request->get('nitrat_uf');
            $fosfor_uf=$post->request->get('fosfor_uf');
            $potassium_uf=$post->request->get('potassium_uf');
            $kalcium=$post->request->get('kalcium');
            $magnez=$post->request->get('magnez');
            $zink=$post->request->get('zink');
            $hekur=$post->request->get('hekur');
            $squfur=$post->request->get('squfur');
            $mangan=$post->request->get('mangan');
            $molibdenum=$post->request->get('molibdenum');
            $bor=$post->request->get('bor');
            $klor=$post->request->get('klor');
            $baker=$post->request->get('baker');
            $firma=$post->request->get('firma');
            $justifikimi=$post->request->get('justifikimi');
            $dendesia=$post->request->get('dendesia');
            $pleherimi=$post->request->get('pleherimi');
            $vezhgime=$post->request->get('vezhgime');
            $parcela=$post->request->get('parcela');


            $sql="INSERT INTO `aplikime_pleherimi`(`id`, `data_aplikimit`, `tipi_aplikimit`, `modeli_aplikimit`,
`siperfaqja_aplikimit`, `produkti_komercial_pleherimit`, `lenda_aktive`, `doza_aplikimit`, `njesia_aplikimit`,
 `nitrat`, `fosfor`, `potasium`, `nitrat_uf`, `fosfor_uf`, `potasium_uf`, `calcium`, `magnez`, `squfur`, `hekur`,
  `zink`, `mangan`, `molibdenum`, `bor`, `klor`,`baker`, `firma_shperndarese`, `justifikimi_aplikimit`,
  `densiteti_pleherimit`, `aplikime_pleherim_ujitje`, `aplikime_pleherimi_aplikuar`, `vezhgime`, `parcela`) VALUES (
'','$data','$tipi','$modeli','$sip','$prod_komercial','$lenda_aktive','$doza',
'$njesia','$nitrat','$fosfor','$potassium','$nitrat_uf','$fosfor_uf','$potassium_uf','$kalcium',
'$magnez','$squfur','$hekur','$zink','$mangan','$molibdenum','$bor','$klor','$baker',
'','$justifikimi','$dendesia','','$pleherimi','$vezhgime','$parcela')";
            $stmt = $em->getConnection()->prepare($sql);
            $stmt->execute();


            return $this->redirect($this->generateUrl('aplikimi_pleherimi_lista'));
        }else {

            return new Response('Something went wrong');
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @Route("/shto_pleherim/{id}", name="post_aplikimi_pleherimi_edit")
     */

    public function insertEditAplikimiAction($id){

        $post = Request::createFromGlobals();
        $em = $this->getDoctrine()->getManager();

        if ($post->request->has('submit')) {
            //insert all data into aplikime_pleherimi table
            $data=$post->request->get('data');
            $tipi=$post->request->get('tipi');
            $modeli=$post->request->get('modeli');
            $sip=$post->request->get('sip');
            $prod_komercial=$post->request->get('prod_komercial');
            $lenda_aktive=$post->request->get('lenda_aktive');
            $doza=$post->request->get('doza');
            $njesia=$post->request->get('njesia');
            $nitrat=$post->request->get('nitrat');
            $fosfor=$post->request->get('fosfor');
            $potassium=$post->request->get('potassium');
            $nitrat_uf=$post->request->get('nitrat_uf');
            $fosfor_uf=$post->request->get('fosfor_uf');
            $potassium_uf=$post->request->get('potassium_uf');
            $kalcium=$post->request->get('kalcium');
            $magnez=$post->request->get('magnez');
            $zink=$post->request->get('zink');
            $hekur=$post->request->get('hekur');
            $squfur=$post->request->get('squfur');
            $mangan=$post->request->get('mangan');
            $molibdenum=$post->request->get('molibdenum');
            $bor=$post->request->get('bor');
            $klor=$post->request->get('klor');
            $baker=$post->request->get('baker');
            $firma=$post->request->get('firma');
            $justifikimi=$post->request->get('justifikimi');
            $dendesia=$post->request->get('dendesia');
            $pleherimi=$post->request->get('pleherimi');
            $vezhgime=$post->request->get('vezhgime');
            $parcela=$post->request->get('parcela');




            $sql="UPDATE `aplikime_pleherimi` SET `data_aplikimit`='$data',
`tipi_aplikimit`='$tipi',`modeli_aplikimit`='$modeli',`siperfaqja_aplikimit`='$sip',
`produkti_komercial_pleherimit`='$prod_komercial',`lenda_aktive`='$lenda_aktive',`doza_aplikimit`='$doza',
`njesia_aplikimit`='$njesia',`nitrat`='$tipi',`fosfor`='$fosfor',`potasium`='$potassium',
`nitrat_uf`='$nitrat_uf',`fosfor_uf`='$fosfor_uf',`potasium_uf`='$potassium_uf',`calcium`='$kalcium',
`magnez`='$magnez',`squfur`='$squfur',`hekur`='$hekur',`zink`='$zink',`mangan`='$mangan',
`molibdenum`='$molibdenum',`bor`='$bor',`klor`='$klor',`baker`='$baker',`justifikimi_aplikimit`='$justifikimi',
`densiteti_pleherimit`='$dendesia',`aplikime_pleherim_ujitje`='',
`aplikime_pleherimi_aplikuar`='$pleherimi',`vezhgime`='$vezhgime',`parcela`='$parcela' WHERE `id`='$id'";
            $stmt = $em->getConnection()->prepare($sql);
            $stmt->execute();


            return $this->redirect($this->generateUrl('aplikimi_pleherimi_lista'));
        }else {

            return new Response('Something went wrong');
        }
    }


} 