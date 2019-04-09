<?php

namespace AiadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        if($this->get('security.authorization_checker')->isGranted('ROLE_SUPERADMIN')) {
//            return $this->render("AiadBundle:Default:index.html.twig");
            return $this->redirect($this->generateUrl('listo_parcelat_admin'));
        }else if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')){

            return $this->redirect($this->generateUrl('listo_parcelat_admin'));
        }else if($this->get('security.authorization_checker')->isGranted('ROLE_OPERATOR')){
            return $this->redirect($this->generateUrl('listo_parcelat'));
        }else{
            return $this->redirect($this->generateUrl('login'));
        }


    }

    /**
     * @param Request $request

     * @Route("/set_data/{id}", name="set_session")
     */
    public function setAction($id)
    {
        $session = $this->getRequest()->getSession();
        $em = $this->getDoctrine()->getManager();
        $parcela=$em->getRepository('AiadBundle:ParcelaIdentifikimi')->find($id);
        // store an attribute for reuse during a later user request
        $session->set('parcelId', $parcela->getId());
        $session->set('emriParceles', $parcela->getEmriParceles());
        $session->set('kodiParceles', $parcela->getKodi());
        $parcela_agro=$em->getRepository('AiadBundle:ParcelaAgronomike')->findBy(array('parcela'=>$id));
        foreach($parcela_agro as $p){
        $session->set('sip_ha', $p->getSiperfaqja());
        }
     return $this->redirect($this->generateUrl('home'));
//     return $this->render('AiadBundle:Default:index.html.twig');
    }



    /**
     * @Route("/lista_parcelave", name="listo_parcelat")
     */
    public function listoParcelatAction(){
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $id=$user->getId();
        $parcelat=$em->getRepository('AiadBundle:UserHasParcel')->findBy(array('user'=>$id));

        return $this->render('AiadBundle:Parcela:listo_parcelat.html.twig', array('parcelat'=>$parcelat));
    }




    /**
     * @Route("/lista_parcelave_admin", name="listo_parcelat_admin")
     */
    public function listoParcelatAdminAction(){
        $em = $this->getDoctrine()->getManager();
        $parcelat=$em->getRepository('AiadBundle:ParcelaIdentifikimi')->findAll();

        return $this->render('AiadBundle:Parcela:list_parcel_admin.html.twig', array('parcelat'=>$parcelat));
    }

    /**
     * @param Request $request
     * @Route("/shto_parcel", name="new_parcel")
     */

    public function insertNewParcelAction(){

        $post = Request::createFromGlobals();
        $em = $this->getDoctrine()->getManager();
        $parcel_name='';
        $kodi='';
        $kord_x='';
        $kord_y='';
        $lartesia='';
        $viti_prodhimit='';
        $fshati='';

        $pronari_group='';

        $name='';
        $surname='';
        $numri_id='';
        $telefoni='';
        $email='';


        if ($post->request->has('submit')) {
            //insert all data into parcela_identifikimi table
            $parcel_name = $post->request->get('parcel_name');
            $kodi=$post->request->get('parcel_code');
            $kord_x=$post->request->get('parcel_cord_x');
            $kord_y=$post->request->get('parcel_cord_y');
            $lartesia=$post->request->get('lartesia');
            $viti_prodhimit=$post->request->get('viti');
            $fshati=$post->request->get('fshati');
            $pronaret_group=$post->request->get('pronari_group');

            if($pronaret_group == 1){
                //merr id e pronarit te zgjedhur
                $pronari_id=$post->request->get('pronari');
                //insert parcelen
                $parcela_sql="INSERT INTO `parcela_identifikimi`(`id`, `pronari`, `emri_parceles`, `kodi`, `kordinata_x`, `kordinata_y`, `lartesia`, `fshati`, `viti_prodhimit`) VALUES ('','$pronari_id','$parcel_name','$kodi','$kord_x','$kord_y','$lartesia','$fshati','$viti_prodhimit')";
                $stmt = $em->getConnection()->prepare($parcela_sql);
                $stmt->execute();

            }elseif($pronaret_group == 2){
                //merr te dhenat e pronarit dhe futi ne db, and merr id e pronarit te ri per te be queryn
                $name=$post->request->get('emri');
                $surname=$post->request->get('mbiemri');
                $numri_id=$post->request->get('numri_id');
                $telefoni=$post->request->get('telefoni');
                $email=$post->request->get('email');

                $pronar_sql="INSERT INTO `pronari`(`id`, `emer`, `mbiemer`, `numri_id`, `numer_telefoni`, `email`) VALUES ('','$name','$surname','$numri_id','$telefoni','$email')";
                $stmt = $em->getConnection()->prepare($pronar_sql);
                $stmt->execute();
                $last_id=$em->getConnection()->lastInsertId();

                //insert parcelen
                $parcela_sql="INSERT INTO `parcela_identifikimi`(`id`, `pronari`, `emri_parceles`, `kodi`, `kordinata_x`, `kordinata_y`, `lartesia`, `fshati`, `viti_prodhimit`) VALUES ('','$last_id','$parcel_name','$kodi','$kord_x','$kord_y','$lartesia','$fshati','$viti_prodhimit')";
                $stmt = $em->getConnection()->prepare($parcela_sql);
                $stmt->execute();


            }
            return $this->redirect($this->generateUrl('listo_parcelat'));
        }else{
            //display new parcel form
            $qarqet = $em->getRepository('AiadBundle:VendndodhjaQarku')->findAll();
            $pronaret = $em->getRepository('AiadBundle:Pronari')->findAll();
            return $this->render('AiadBundle:Parcela:shto_parcel.html.twig', array('qarqet'=>$qarqet, 'pronaret'=>$pronaret));

        }
        return new Response('');
    }



    /**
     * @param Request $request
     * @Method({"GET"})
     * @Route("/listBashkite", name="list_bashkite")
     * @Template()
     */
    public function formZonesAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        if($request->isXmlHttpRequest()) {
            $id = '';
            $id = $request->get('id');
            if ($id != '') {
                $bashkite = $em->getRepository('AiadBundle:VendndodhjaBashkia')->findBy(array('perkatesiaQarku'=>$id));
                $tabBrands = array();
                $i = 0;
                    foreach($bashkite as $b) {
                        $tabBrands[$i]['id'] = $b->getId();
                        $tabBrands[$i]['bashkia'] = $b->getEmriBashkia();
                        $i++;
                    }
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
     * @Route("/listFshatrat", name="list_villages")
     * @Template()
     */
    public function fshatratAction() {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getManager();

        if($request->isXmlHttpRequest()) {
            $id = '';
            $id = $request->get('id');
            if ($id != '') {
                $bashkite = $em->getRepository('AiadBundle:VendndodhjaFshati')->findBy(array('perkatesiaBashki'=>$id));
                $tabBrands = array();
                $i = 0;
                foreach($bashkite as $b) {
                    $tabBrands[$i]['id'] = $b->getId();
                    $tabBrands[$i]['fshati'] = $b->getEmriFshati();
                    $i++;
                }
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
     * @Route("/welcome", name="vanoman_landing")
     * @Template()
     */
    public function landingAction()
    {
        return $this->render('AiadBundle:Default:test.html.twig');

//        return new Response();

    }
    /**
     * @Route("/bejExcel", name="excel_create")
     * @Template()
     */
    public function bejExcelAction(){
        // ask the service for a Excel5
        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

        $phpExcelObject->getProperties()->setCreator("liuggio")
            ->setLastModifiedBy("Giulio De Donato")
            ->setTitle("Office 2005 XLSX Test Document")
            ->setSubject("Office 2005 XLSX Test Document")
            ->setDescription("Test document for Office 2005 XLSX, generated using PHP classes.")
            ->setKeywords("office 2005 openxml php")
            ->setCategory("Test result file");
        $phpExcelObject->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!');

        $phpExcelObject->getActiveSheet()->setCellValue('B3', 'Xhina!');

        $phpExcelObject->getActiveSheet()->setTitle('Simple');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet


        $phpExcelObject->createSheet();
        $phpExcelObject->getSheet(1)->setCellValue('B3', 'Xhina!');

        $phpExcelObject->getSheet(1)->setTitle('dddd');
        // create the writer
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);

        // adding headers
        $dispositionHeader = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'stream-file.xls'
        );
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response;
    }







}
