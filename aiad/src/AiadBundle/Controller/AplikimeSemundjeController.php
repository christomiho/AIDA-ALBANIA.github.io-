<?php
/**
 * Created by PhpStorm.
 * User: Dorjan
 * Date: 6/8/16
 * Time: 10:48 AM
 */

namespace AiadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class AplikimeSemundjeController extends Controller {

    /**
     * @Route("/lista_aplikimeve_semundje", name="listaAplikimeveSemundje")
     */
    public function ListaAplikimeveSemundjeAction(){
        $em = $this->getDoctrine()->getManager();
        //get the user has pacrcels and then according to that get all Aplikime semundje (tabela permbledhese) per ato parcela
        return $this->render('AiadBundle:AplikimeSemundje:index.html.twig');
    }

    /**
     * @Route("/set_aplikim", name="set_session_aplikim")
     */
    public function setAplikimAction()
    {
        $session = $this->getRequest()->getSession();
// store an attribute for reuse during a later user request
        $session->set('aplikim_number', '1');
        return $this->redirect($this->generateUrl('home'));
    }

    /**
     * @Route("/new_aplikim_semundje", name="newAplikimSemundje")
     */
    public function newAplikimSemundjeAction(){
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcela=$session->get('parcelId');
        $check=$session->get('aplikim_number', 9999);
        if($check==9999){
            $permbledhsja_sql="INSERT INTO `tabela_permbledhese_aplikim_semundjesh`(`id`, `data_trajnimit`, `numri_aplikimit`, `sasia_trajtimit`, `shperndarja_trajtimit`, `siperfaqja_trajtuar_hektar`, `siperfaqja_trajtuar_perqindje`, `presioni_trajtimit`, `shpejtesia_trajtimit`, `parcela`) VALUES ('',NULL, NULL, NULL,NULL,NULL,NULL,NULL,NULL,'$parcela')";
            $stmt = $em->getConnection()->prepare($permbledhsja_sql);
            $stmt->execute();
            $last_id = $em->getConnection()->lastInsertId();
            // store an attribute for reuse during a later user request
            $session->set('aplikim_number', $last_id);
        }


        $produkte_herbicid=$em->getRepository('AiadBundle:SettingsProduktiKomercial')->findBy(array('kategoriaProduktitKomercial'=>1));
        $produkte_insekticid=$em->getRepository('AiadBundle:SettingsProduktiKomercial')->findBy(array('kategoriaProduktitKomercial'=>2));
        $produkte_fungicid=$em->getRepository('AiadBundle:SettingsProduktiKomercial')->findBy(array('kategoriaProduktitKomercial'=>3));
        $produkte_other=$em->getRepository('AiadBundle:SettingsProduktiKomercial')->findBy(array('kategoriaProduktitKomercial'=>4));
        $arsye_aplikimi=$em->getRepository('AiadBundle:SettingsArsyeAplikimiSemundje')->findAll();
        $justifikim_aplikimi=$em->getRepository('AiadBundle:SettingsJustifikimAplikimiSemundje')->findAll();
        $njesia=$em->getRepository('AiadBundle:SettingsDozaNjesia')->findAll();

        //get the user has pacrcels and then according to that get all Aplikime semundje (tabela permbledhese) per ato parcela
        return $this->render('AiadBundle:AplikimeSemundje:new.html.twig', array('produkte_herbicid'=>$produkte_herbicid, 'produkte_insekticid'=>$produkte_insekticid,
                                           'produkte_fungicid'=>$produkte_fungicid, 'produkte_other'=>$produkte_other, 'arsye_aplikimi'=>$arsye_aplikimi, 'justifikim_aplikimi'=>$justifikim_aplikimi, 'doza_njesia'=>$njesia));
    }




    /**
     * @param Request $request
     * @Method({"GET"})
     * @Route("/submitHerbicide", name="submit_herbicide")
     * @Template()
     */
    public function submitHerbicideAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();
        $id = '';
        $data_aplikim_herbicide='';
        $produkti_herbicid='';
        $doza_herbicid='';
        $njesia_herbicid='';
        $lenda_aktive_herbicid='';
        $pastertia_herbicid='';
        $firma_herbicid='';
        $arsyeja_paresore_herbicid='';
        $arsyeja_dytesore_herbicid='';
        $justifikim_herbicid='';
        $vezhgime_herbicid='';


        if($request->isXmlHttpRequest()) {
            $id = '';
            $id = $request->get('aplikimi_number_herbicid');
            $data_aplikim_herbicide=$request->get('data_aplikim_herbicid');
            $produkti_herbicid=$request->get('produkti_herbicid',NULL);
            $doza_herbicid=$request->get('doza_herbicid',NULL);
            $njesia_herbicid=$request->get('njesia_herbicid',NULL);
            $lenda_aktive_herbicid=$request->get('lenda_aktive_herbicid',NULL);
            $pastertia_herbicid=$request->get('pastertia_herbicid',NULL);
            $firma_herbicid=$request->get('firma_herbicid',NULL);
            $arsyeja_paresore_herbicid=$request->get('arsyeja_paresore_herbicid',NULL);
            $arsyeja_dytesore_herbicid=$request->get('arsyeja_dytesore_herbicid',NULL);
            $justifikim_herbicid=$request->get('justifikim_herbicid',NULL);
            $vezhgime_herbicid=$request->get('vezhgime_herbicid');

            if ($id != '') {

                //insert aplikim
                $herbicide_sql="INSERT INTO `aplikime_semundje_tedhena`(`id`, `lloji_aplikimit`, `referimi_tabela_permbledhese`, `data_aplikimit`, `produkti_komercial_emri`, `produkti_komercial_doza`, `produkti_komercial_njesia`, `materiali_aktiv_lenda_aktive`, `materiali_aktiv_pastertia`, `emri_firmes`, `arsyeja_aplikimit_1`, `arsyeja_aplikimit_2`, `justifikimi`, `vezhgime`) VALUES ('','1','$id','$data_aplikim_herbicide','$produkti_herbicid','$doza_herbicid','$njesia_herbicid','$lenda_aktive_herbicid','$pastertia_herbicid','$firma_herbicid','$arsyeja_paresore_herbicid','$arsyeja_dytesore_herbicid','$justifikim_herbicid','$vezhgime_herbicid')";
//                $herbicide_sql="INSERT INTO `aplikime_semundje_tedhena`(`id`, `lloji_aplikimit`, `referimi_tabela_permbledhese`, `data_aplikimit`, `vezhgime`) VALUES ('', '1','3','$data_aplikim_herbicide','$data_aplikim_herbicide' )";
                $stmt = $em->getConnection()->prepare($herbicide_sql);
                $stmt->execute();

                $tabBrands=array();
                $tabBrands[1]['aplikimi']=$data_aplikim_herbicide;
                $response = new Response();
                $data = json_encode($tabBrands); // formater le résultat de la requête en json
                $response->headers->set('Content-Type', 'application/json');
                $response->setContent($data);
                return $response;
            }
        } else {
            return new Response('no ajax');
        }
    }



    /**
     * @param Request $request
     * @Method({"GET"})
     * @Route("/submitInsekticide", name="submit_insekticide")
     * @Template()
     */
    public function submitInsekticideAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        if($request->isXmlHttpRequest()) {
            $id = '';
            $id = $request->get('aplikimi_number_insekticid');
            $data_aplikim_insekticid=$request->get('data_aplikim_insekticid');
            $produkti_insekticid=$request->get('produkti_insekticid');
            $doza_insekticid=$request->get('doza_insekticid');
            $njesia_insekticid=$request->get('njesia_insekticid');
            $lenda_aktive_insekticid=$request->get('lenda_aktive_insekticid');
            $pastertia_insekticid=$request->get('pastertia_insekticid');
            $firma_insekticid=$request->get('firma_insekticid');
            $arsyeja_paresore_insekticid=$request->get('arsyeja_paresore_insekticid');
            $arsyeja_dytesore_insekticid=$request->get('arsyeja_dytesore_insekticid');
            $justifikim_insekticid=$request->get('justifikim_insekticid');
            $vezhgime_insekticid=$request->get('vezhgime_insekticid');

            if ($id != '') {

                //insert aplikim
                $insekticide_sql="INSERT INTO `aplikime_semundje_tedhena`(`id`, `lloji_aplikimit`, `referimi_tabela_permbledhese`, `data_aplikimit`, `produkti_komercial_emri`, `produkti_komercial_doza`, `produkti_komercial_njesia`, `materiali_aktiv_lenda_aktive`, `materiali_aktiv_pastertia`, `emri_firmes`, `arsyeja_aplikimit_1`, `arsyeja_aplikimit_2`, `justifikimi`, `vezhgime`)
                VALUES ('','2','$id','$data_aplikim_insekticid','$produkti_insekticid','$doza_insekticid','$njesia_insekticid','$lenda_aktive_insekticid','$pastertia_insekticid','$firma_insekticid','$arsyeja_paresore_insekticid','$arsyeja_dytesore_insekticid','$justifikim_insekticid','$vezhgime_insekticid')";
                $stmt = $em->getConnection()->prepare($insekticide_sql);
                $stmt->execute();

                $tabBrands=array();
                $tabBrands[1]['aplikimi']=$id;
                $response = new Response();
                $data = json_encode($tabBrands); // formater le résultat de la requête en json
                $response->headers->set('Content-Type', 'application/json');
                $response->setContent($data);
                return $response;
            }
        } else {
            return new Response('no ajax');
        }
    }




    /**
     * @param Request $request
     * @Method({"GET"})
     * @Route("/submitFungicide", name="submit_fungicide")
     * @Template()
     */
    public function submitFungicideAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        if($request->isXmlHttpRequest()) {
            $id = '';
            $id = $request->get('aplikimi_number_fungicid');
            $data_aplikim_fungicid=$request->get('data_aplikim_fungicid');
            $produkti_fungicid=$request->get('produkti_fungicid');
            $doza_fungicid=$request->get('doza_fungicid');
            $njesia_fungicid=$request->get('njesia_fungicid');
            $lenda_aktive_fungicid=$request->get('lenda_aktive_fungicid');
            $pastertia_fungicid=$request->get('pastertia_fungicid');
            $firma_fungicid=$request->get('firma_fungicid');
            $arsyeja_paresore_fungicid=$request->get('arsyeja_paresore_fungicid');
            $arsyeja_dytesore_fungicid=$request->get('arsyeja_dytesore_fungicid');
            $justifikim_fungicid=$request->get('justifikim_fungicid');
            $vezhgime_fungicid=$request->get('vezhgime_fungicid');

            if ($id != '') {
                //insert aplikim
                $fungicide_sql="INSERT INTO `aplikime_semundje_tedhena`(`id`, `lloji_aplikimit`, `referimi_tabela_permbledhese`, `data_aplikimit`, `produkti_komercial_emri`, `produkti_komercial_doza`, `produkti_komercial_njesia`, `materiali_aktiv_lenda_aktive`, `materiali_aktiv_pastertia`, `emri_firmes`, `arsyeja_aplikimit_1`, `arsyeja_aplikimit_2`, `justifikimi`, `vezhgime`)
                VALUES ('','3','$id','$data_aplikim_fungicid','$produkti_fungicid','$doza_fungicid','$njesia_fungicid','$lenda_aktive_fungicid','$pastertia_fungicid','$firma_fungicid','$arsyeja_paresore_fungicid','$arsyeja_dytesore_fungicid','$justifikim_fungicid','$vezhgime_fungicid')";
                $stmt = $em->getConnection()->prepare($fungicide_sql);
                $stmt->execute();

                $tabBrands=array();
                $tabBrands[1]['aplikimi']=$id;
                $response = new Response();
                $data = json_encode($tabBrands); // formater le résultat de la requête en json
                $response->headers->set('Content-Type', 'application/json');
                $response->setContent($data);
                return $response;
            }
        } else {
            return new Response('no ajax');
        }
    }


    /**
     * @param Request $request
     * @Method({"GET"})
     * @Route("/submitOthers", name="submit_others")
     * @Template()
     */
    public function submitOthersAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        if($request->isXmlHttpRequest()) {
            $id = '';
            $id = $request->get('aplikimi_number_other');
            $data_aplikim_other=$request->get('data_aplikim_other');
            $produkti_other=$request->get('produkti_other');
            $doza_other=$request->get('doza_other');
            $njesia_other=$request->get('njesia_other');
            $lenda_aktive_other=$request->get('lenda_aktive_other');
            $pastertia_other=$request->get('pastertia_other');
            $firma_other=$request->get('firma_other');
            $arsyeja_paresore_other=$request->get('arsyeja_paresore_other');
            $arsyeja_dytesore_other=$request->get('arsyeja_dytesore_other');
            $justifikim_other=$request->get('justifikim_other');
            $vezhgime_other=$request->get('vezhgime_other');

            if ($id != '') {

                //insert aplikim
                $others_sql="INSERT INTO `aplikime_semundje_tedhena`(`id`, `lloji_aplikimit`, `referimi_tabela_permbledhese`, `data_aplikimit`, `produkti_komercial_emri`, `produkti_komercial_doza`, `produkti_komercial_njesia`, `materiali_aktiv_lenda_aktive`, `materiali_aktiv_pastertia`, `emri_firmes`, `arsyeja_aplikimit_1`, `arsyeja_aplikimit_2`, `justifikimi`, `vezhgime`)
                      VALUES ('','4','$id','$data_aplikim_other','$produkti_other','$doza_other','$njesia_other','$lenda_aktive_other','$pastertia_other','$firma_other','$arsyeja_paresore_other','$arsyeja_dytesore_other','$justifikim_other','$vezhgime_other')";
                $stmt = $em->getConnection()->prepare($others_sql);
                $stmt->execute();

                $tabBrands=array();
                $tabBrands[1]['aplikimi']=$id;
                $response = new Response();
                $data = json_encode($tabBrands); // formater le résultat de la requête en json
                $response->headers->set('Content-Type', 'application/json');
                $response->setContent($data);
                return $response;
            }
        } else {
            return new Response('no ajax');
        }
    }

} 