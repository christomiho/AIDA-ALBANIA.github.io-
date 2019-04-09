<?php
/**
 * Created by PhpStorm.
 * User: Dorjan
 * Date: 6/25/16
 * Time: 10:12 PM
 */

namespace AiadBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

class RaportController extends Controller{


    /**
     * @param Request $request
     * @Route("/raport_mostra", name="raportMostra")
     */
    public function createRaportMostra(){
        $post = Request::createFromGlobals();
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
        $parcel = $session->get('parcelId');
        $start='';
        $end='';
        $all_data='';
        $format_doc='';

        if ($post->request->has('submit')) {
            $start = $post->request->get('start_date');
            $end = $post->request->get('end_date');
            $all_data = $post->request->get('all_doc');
            $format_doc=$post->request->get('formati_doc');

            if($format_doc== 1){
                //pdf
                if($all_data==1){
                    //get all
//WHERE `parcela` = $parcel

                    //0
                    $fenologjia_sql="SELECT * FROM `mostra_fenologjia` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($fenologjia_sql);
                    $stmt->execute();
                    $fenologjia_data=$stmt->fetchAll();
                    //1
                    $akariosis_sql="SELECT * FROM `mostra_akariosis` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($akariosis_sql);
                    $stmt->execute();
                    $akariosis_data=$stmt->fetchAll();
//2
                    $barrenijo_sql="SELECT * FROM `mostra_barrenijo` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($barrenijo_sql);
                    $stmt->execute();
                    $barrenijo_data=$stmt->fetchAll();
//3
                    $euzolera_sql="SELECT * FROM `mostra_euzolera` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($euzolera_sql);
                    $stmt->execute();
                    $euzolera_data=$stmt->fetchAll();
//4
                    $glifodes_sql="SELECT * FROM `mostra_glifodes` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($glifodes_sql);
                    $stmt->execute();
                    $glifodes_data=$stmt->fetchAll();
//5
                    $insekteTjera_sql="SELECT * FROM `mostra_insekte_tjera` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($insekteTjera_sql);
                    $stmt->execute();
                    $insekteTjera_data=$stmt->fetchAll();
//6
                    $kocinija_sql="SELECT * FROM `mostra_kocinija` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($kocinija_sql);
                    $stmt->execute();
                    $kocinija_data=$stmt->fetchAll();
//7
                    $lastareRinj_sql="SELECT * FROM `mostra_lastare_rinj` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($lastareRinj_sql);
                    $stmt->execute();
                    $lastareRinj_data=$stmt->fetchAll();
//8
                    $mizaBiologjike_sql="SELECT * FROM `mostra_miza_biologjike` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($mizaBiologjike_sql);
                    $stmt->execute();
                    $mizaBiologjike_data=$stmt->fetchAll();
//9
                    $mizaUllirit_sql="SELECT * FROM `mostra_miza_ullirit` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($mizaUllirit_sql);
                    $stmt->execute();
                    $mizaUllirit_data=$stmt->fetchAll();
//10
                    $negrija_sql="SELECT * FROM `mostra_negrija` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($negrija_sql);
                    $stmt->execute();
                    $negrija_data=$stmt->fetchAll();
//11
                    $nematodat_sql="SELECT * FROM `mostra_nematodat` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($nematodat_sql);
                    $stmt->execute();
                    $nematodat_data=$stmt->fetchAll();
//12
                    $otiorrinko_sql="SELECT * FROM `mostra_otiorrinko` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($otiorrinko_sql);
                    $stmt->execute();
                    $otiorrinko_data=$stmt->fetchAll();
//13
                    $praisAntofage_sql="SELECT * FROM `mostra_prais_antofage` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisAntofage_sql);
                    $stmt->execute();
                    $praisAntofage_data=$stmt->fetchAll();
//14
                    $praisFilofage_sql="SELECT * FROM `mostra_prais_filofage` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisFilofage_sql);
                    $stmt->execute();
                    $praisFilofage_data=$stmt->fetchAll();
//15
                    $praisKarpofage_sql="SELECT * FROM `mostra_prais_karpofage` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisKarpofage_sql);
                    $stmt->execute();
                    $praisKarpofage_data=$stmt->fetchAll();
//16
                    $praisStadilarvor_sql="SELECT * FROM `mostra_prais_stadi_larvor` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisStadilarvor_sql);
                    $stmt->execute();
                    $praisStadiLarvor_data=$stmt->fetchAll();
//17
                    $prodhimiParashikuar_sql="SELECT * FROM `mostra_prodhimi_parashikuar` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($prodhimiParashikuar_sql);
                    $stmt->execute();
                    $prodhimiParashikuar_data=$stmt->fetchAll();
//18
                    $semundjeTjera_sql="SELECT * FROM `mostra_semundje_tjera` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($semundjeTjera_sql);
                    $stmt->execute();
                    $semundjeTjera_data=$stmt->fetchAll();
//19
                    $syriPalloit_sql="SELECT * FROM `mostra_syri_palloit` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($syriPalloit_sql);
                    $stmt->execute();
                    $syriPalloit_data=$stmt->fetchAll();
//20
                    $ndihmese_sql="SELECT * FROM `mostra_tjera_ndihmese` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($ndihmese_sql);
                    $stmt->execute();
                    $ndihmese_data=$stmt->fetchAll();
//21
                    $verticilium_sql="SELECT * FROM `mostra_verticilium` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($verticilium_sql);
                    $stmt->execute();
                    $verticilium_data=$stmt->fetchAll();
//22
                    $kalimiPragut_sql="SELECT * FROM `mostra_kalimi_pragut` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($kalimiPragut_sql);
                    $stmt->execute();
                    $kalimiPragut_data=$stmt->fetchAll();


                return $this->render('AiadBundle:Raporte:raport_mostra_pdf.html.twig', array(
                    'fenologjia_data'=>$fenologjia_data,
                    'akariosis_data'=>$akariosis_data,
                    'barrenijo_data'=>$barrenijo_data,
                    'euzolera_data'=>$euzolera_data,
                    'glifodes_data'=>$glifodes_data,
                    'insekteTjera_data'=>$insekteTjera_data,
                    'kocinija_data'=>$kocinija_data,
                    'lastareRinj_data'=>$lastareRinj_data,
                    'mizaBiologjike_data'=>$mizaBiologjike_data,
                    'mizaUllirit_data'=>$mizaUllirit_data,
                    'negrija_data'=>$negrija_data,
                    'nematodat_data'=>$nematodat_data,
                    'otiorrinko_data'=>$otiorrinko_data,
                    'praisAntofage_data'=>$praisAntofage_data,
                    'praisFilofage_data'=>$praisFilofage_data,
                    'praisKarpofage_data'=>$praisKarpofage_data,
                    'praisStadiLarvor_data'=>$praisStadiLarvor_data,
                    'prodhimiParashikuar_data'=>$prodhimiParashikuar_data,
                    'semundjeTjera_data'=>$semundjeTjera_data,
                    'syriPalloit_data'=>$syriPalloit_data,
                    'ndihmese_data'=>$ndihmese_data,
                    'verticilium_data'=>$verticilium_data,
                    'kalimiPragut_data'=>$kalimiPragut_data,
                ));
                }else{
                    //get between dates
                    //WHERE `parcela` = $parcel
//0
                    $fenologjia_sql="SELECT * FROM `mostra_fenologjia` WHERE  `data_fenologjia` BETWEEN '$start' and '$end'  AND `parcela`='$parcel'   AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($fenologjia_sql);
                    $stmt->execute();
                    $fenologjia_data=$stmt->fetchAll();
                    //1
                    $akariosis_sql="SELECT * FROM `mostra_akariosis` WHERE  `data_akariosis` BETWEEN '$start' and '$end'  AND `parcela`='$parcel'   AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($akariosis_sql);
                    $stmt->execute();
                    $akariosis_data=$stmt->fetchAll();
//2
                    $barrenijo_sql="SELECT * FROM `mostra_barrenijo` WHERE  `data_barrenijo` BETWEEN '$start' and '$end'  AND `parcela`='$parcel'   AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($barrenijo_sql);
                    $stmt->execute();
                    $barrenijo_data=$stmt->fetchAll();
//3
                    $euzolera_sql="SELECT * FROM `mostra_euzolera` WHERE  `data_euzolera` BETWEEN '$start' and '$end'  AND `parcela`='$parcel'   AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($euzolera_sql);
                    $stmt->execute();
                    $euzolera_data=$stmt->fetchAll();
//4
                    $glifodes_sql="SELECT * FROM `mostra_glifodes` WHERE  `data_glifodes` BETWEEN '$start' and '$end'  AND `parcela`='$parcel'   AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($glifodes_sql);
                    $stmt->execute();
                    $glifodes_data=$stmt->fetchAll();
//5
                    $insekteTjera_sql="SELECT * FROM `mostra_insekte_tjera` WHERE  `data_insekte_tjera` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($insekteTjera_sql);
                    $stmt->execute();
                    $insekteTjera_data=$stmt->fetchAll();
//6
                    $kocinija_sql="SELECT * FROM `mostra_kocinija` WHERE  `data_kocinija` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($kocinija_sql);
                    $stmt->execute();
                    $kocinija_data=$stmt->fetchAll();
//7
                    $lastareRinj_sql="SELECT * FROM `mostra_lastare_rinj` WHERE  `data_lastare_rinj` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($lastareRinj_sql);
                    $stmt->execute();
                    $lastareRinj_data=$stmt->fetchAll();
//8
                    $mizaBiologjike_sql="SELECT * FROM `mostra_miza_biologjike` WHERE  `data_miza_biologjike` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($mizaBiologjike_sql);
                    $stmt->execute();
                    $mizaBiologjike_data=$stmt->fetchAll();
//9
                    $mizaUllirit_sql="SELECT * FROM `mostra_miza_ullirit` WHERE  `data_miza_ullirit` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($mizaUllirit_sql);
                    $stmt->execute();
                    $mizaUllirit_data=$stmt->fetchAll();
//10
                    $negrija_sql="SELECT * FROM `mostra_negrija` WHERE  `data_negrija` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($negrija_sql);
                    $stmt->execute();
                    $negrija_data=$stmt->fetchAll();
//11
                    $nematodat_sql="SELECT * FROM `mostra_nematodat` WHERE  `data_nematodat` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($nematodat_sql);
                    $stmt->execute();
                    $nematodat_data=$stmt->fetchAll();
//12
                    $otiorrinko_sql="SELECT * FROM `mostra_otiorrinko` WHERE  `data_otirrinko` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($otiorrinko_sql);
                    $stmt->execute();
                    $otiorrinko_data=$stmt->fetchAll();
//13
                    $praisAntofage_sql="SELECT * FROM `mostra_prais_antofage` WHERE  `data_prais_antofage` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisAntofage_sql);
                    $stmt->execute();
                    $praisAntofage_data=$stmt->fetchAll();
//14
                    $praisFilofage_sql="SELECT * FROM `mostra_prais_filofage` WHERE  `data_prais_filofage` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisFilofage_sql);
                    $stmt->execute();
                    $praisFilofage_data=$stmt->fetchAll();
//15
                    $praisKarpofage_sql="SELECT * FROM `mostra_prais_karpofage` WHERE  `data_prais_karpofage` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisKarpofage_sql);
                    $stmt->execute();
                    $praisKarpofage_data=$stmt->fetchAll();
//16
                    $praisStadilarvor_sql="SELECT * FROM `mostra_prais_stadi_larvor` WHERE  `data_prais_stadi_larvor` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisStadilarvor_sql);
                    $stmt->execute();
                    $praisStadiLarvor_data=$stmt->fetchAll();
//17
                    $prodhimiParashikuar_sql="SELECT * FROM `mostra_prodhimi_parashikuar` WHERE  `data_prodhimi_parashikuar` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($prodhimiParashikuar_sql);
                    $stmt->execute();
                    $prodhimiParashikuar_data=$stmt->fetchAll();
//18
                    $semundjeTjera_sql="SELECT * FROM `mostra_semundje_tjera` WHERE  `data_semundje_tjera` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($semundjeTjera_sql);
                    $stmt->execute();
                    $semundjeTjera_data=$stmt->fetchAll();
//19
                    $syriPalloit_sql="SELECT * FROM `mostra_syri_palloit` WHERE  `data_syri_palloit` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($syriPalloit_sql);
                    $stmt->execute();
                    $syriPalloit_data=$stmt->fetchAll();
//20
                    $ndihmese_sql="SELECT * FROM `mostra_tjera_ndihmese` WHERE  `data_tjera_ndihmese` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($ndihmese_sql);
                    $stmt->execute();
                    $ndihmese_data=$stmt->fetchAll();
//21
                    $verticilium_sql="SELECT * FROM `mostra_verticilium` WHERE  `data_verticilium` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($verticilium_sql);
                    $stmt->execute();
                    $verticilium_data=$stmt->fetchAll();
//22
                    $kalimiPragut_sql="SELECT * FROM `mostra_kalimi_pragut` WHERE  `data_kalimipragut` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($kalimiPragut_sql);
                    $stmt->execute();
                    $kalimiPragut_data=$stmt->fetchAll();

                    return $this->render('AiadBundle:Raporte:raport_mostra_pdf.html.twig', array(
                        'fenologjia_data'=>$fenologjia_data,
                        'akariosis_data'=>$akariosis_data,
                        'barrenijo_data'=>$barrenijo_data,
                        'euzolera_data'=>$euzolera_data,
                        'glifodes_data'=>$glifodes_data,
                        'insekteTjera_data'=>$insekteTjera_data,
                        'kocinija_data'=>$kocinija_data,
                        'lastareRinj_data'=>$lastareRinj_data,
                        'mizaBiologjike_data'=>$mizaBiologjike_data,
                        'mizaUllirit_data'=>$mizaUllirit_data,
                        'negrija_data'=>$negrija_data,
                        'nematodat_data'=>$nematodat_data,
                        'otiorrinko_data'=>$otiorrinko_data,
                        'praisAntofage_data'=>$praisAntofage_data,
                        'praisFilofage_data'=>$praisFilofage_data,
                        'praisKarpofage_data'=>$praisKarpofage_data,
                        'praisStadiLarvor_data'=>$praisStadiLarvor_data,
                        'prodhimiParashikuar_data'=>$prodhimiParashikuar_data,
                        'semundjeTjera_data'=>$semundjeTjera_data,
                        'syriPalloit_data'=>$syriPalloit_data,
                        'ndihmese_data'=>$ndihmese_data,
                        'verticilium_data'=>$verticilium_data,
                        'kalimiPragut_data'=>$kalimiPragut_data,
                    ));
                }
            }else{
                //excel
                if($all_data==1){
                    //get all
                    $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
                    $phpExcelObject->getProperties()->setCreator("Aiad")
                        ->setLastModifiedBy("Dorjan Hitaj")
                        ->setTitle("Office 2005 XLSX Test Document")
                        ->setSubject("Office 2005 XLSX Test Document")
                        ->setDescription("Raport Mostra")
                        ->setKeywords("office 2005 openxml php")
                        ->setCategory("Test result file");
//WHERE `parcela` = $parcel

                    //0
                    $fenologjia_sql="SELECT * FROM `mostra_fenologjia` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($fenologjia_sql);
                    $stmt->execute();
                    $fenologjia_data=$stmt->fetchAll();
                    //1
                    $akariosis_sql="SELECT * FROM `mostra_akariosis` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($akariosis_sql);
                    $stmt->execute();
                    $akariosis_data=$stmt->fetchAll();
//2
                    $barrenijo_sql="SELECT * FROM `mostra_barrenijo` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($barrenijo_sql);
                    $stmt->execute();
                    $barrenijo_data=$stmt->fetchAll();
//3
                    $euzolera_sql="SELECT * FROM `mostra_euzolera` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($euzolera_sql);
                    $stmt->execute();
                    $euzolera_data=$stmt->fetchAll();
//4
                    $glifodes_sql="SELECT * FROM `mostra_glifodes` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($glifodes_sql);
                    $stmt->execute();
                    $glifodes_data=$stmt->fetchAll();
//5
                    $insekteTjera_sql="SELECT * FROM `mostra_insekte_tjera` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($insekteTjera_sql);
                    $stmt->execute();
                    $insekteTjera_data=$stmt->fetchAll();
//6
                    $kocinija_sql="SELECT * FROM `mostra_kocinija` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($kocinija_sql);
                    $stmt->execute();
                    $kocinija_data=$stmt->fetchAll();
//7
                    $lastareRinj_sql="SELECT * FROM `mostra_lastare_rinj` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($lastareRinj_sql);
                    $stmt->execute();
                    $lastareRinj_data=$stmt->fetchAll();
//8
                    $mizaBiologjike_sql="SELECT * FROM `mostra_miza_biologjike` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($mizaBiologjike_sql);
                    $stmt->execute();
                    $mizaBiologjike_data=$stmt->fetchAll();
//9
                    $mizaUllirit_sql="SELECT * FROM `mostra_miza_ullirit` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($mizaUllirit_sql);
                    $stmt->execute();
                    $mizaUllirit_data=$stmt->fetchAll();
//10
                    $negrija_sql="SELECT * FROM `mostra_negrija` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($negrija_sql);
                    $stmt->execute();
                    $negrija_data=$stmt->fetchAll();
//11
                    $nematodat_sql="SELECT * FROM `mostra_nematodat` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($nematodat_sql);
                    $stmt->execute();
                    $nematodat_data=$stmt->fetchAll();
//12
                    $otiorrinko_sql="SELECT * FROM `mostra_otiorrinko` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($otiorrinko_sql);
                    $stmt->execute();
                    $otiorrinko_data=$stmt->fetchAll();
//13
                    $praisAntofage_sql="SELECT * FROM `mostra_prais_antofage` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisAntofage_sql);
                    $stmt->execute();
                    $praisAntofage_data=$stmt->fetchAll();
//14
                    $praisFilofage_sql="SELECT * FROM `mostra_prais_filofage` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisFilofage_sql);
                    $stmt->execute();
                    $praisFilofage_data=$stmt->fetchAll();
//15
                    $praisKarpofage_sql="SELECT * FROM `mostra_prais_karpofage` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisKarpofage_sql);
                    $stmt->execute();
                    $praisKarpofage_data=$stmt->fetchAll();
//16
                    $praisStadilarvor_sql="SELECT * FROM `mostra_prais_stadi_larvor` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisStadilarvor_sql);
                    $stmt->execute();
                    $praisStadiLarvor_data=$stmt->fetchAll();
//17
                    $prodhimiParashikuar_sql="SELECT * FROM `mostra_prodhimi_parashikuar` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($prodhimiParashikuar_sql);
                    $stmt->execute();
                    $prodhimiParashikuar_data=$stmt->fetchAll();
//18
                    $semundjeTjera_sql="SELECT * FROM `mostra_semundje_tjera` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($semundjeTjera_sql);
                    $stmt->execute();
                    $semundjeTjera_data=$stmt->fetchAll();
//19
                    $syriPalloit_sql="SELECT * FROM `mostra_syri_palloit` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($syriPalloit_sql);
                    $stmt->execute();
                    $syriPalloit_data=$stmt->fetchAll();
//20
                    $ndihmese_sql="SELECT * FROM `mostra_tjera_ndihmese` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($ndihmese_sql);
                    $stmt->execute();
                    $ndihmese_data=$stmt->fetchAll();
//21
                    $verticilium_sql="SELECT * FROM `mostra_verticilium` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($verticilium_sql);
                    $stmt->execute();
                    $verticilium_data=$stmt->fetchAll();
//22
                    $kalimiPragut_sql="SELECT * FROM `mostra_kalimi_pragut` WHERE `parcela` = '$parcel' ";
                    $stmt = $em->getConnection()->prepare($kalimiPragut_sql);
                    $stmt->execute();
                    $kalimiPragut_data=$stmt->fetchAll();


                    $phpExcelObject->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Sythe Dimerore')
                        ->setCellValue('C1', 'Sythe Ne Zhvillim')
                        ->setCellValue('D1', 'Lulezimi')
                        ->setCellValue('E1', 'Lidhja Frutit')
                        ->setCellValue('F1', 'Ngjyra Jeshile')
                        ->setCellValue('G1', 'Ngjyra verdhe')
                        ->setCellValue('H1', 'Ngjyra Violet')
                        ->setCellValue('I1', 'Ngjyra Zeze')
                        ->setCellValue('J1', 'Frut Te Pjekur')
                        ->setCellValue('K1', 'Lulezimi (%)');


                    $f=2;
                    foreach($fenologjia_data as $row){
                        $phpExcelObject->getActiveSheet()
                            ->setCellValue('A'.$f, $row['data_fenologjia'])
                            ->setCellValue('B'.$f, $row['sythe_dimerore'])
                            ->setCellValue('C'.$f, $row['sythe_zhvillim'])
                            ->setCellValue('D'.$f, $row['lulezimi'])
                            ->setCellValue('E'.$f, $row['lidhja_frutit'])
                            ->setCellValue('F'.$f, $row['ngjyre_jeshile'])
                            ->setCellValue('G'.$f, $row['ngjyre_verdhe'])
                            ->setCellValue('H'.$f, $row['ngjyre_violet'])
                            ->setCellValue('I'.$f, $row['ngjyre_zeze'])
                            ->setCellValue('J'.$f, $row['frut_tejpjekur'])
                            ->setCellValue('K'.$f, $row['lulezimi_perqindje']);
                        $f++;
                    }

                    $f++;
                    $phpExcelObject->getActiveSheet()
                        ->setCellValue('A'.$f, 'Jo Prezente')
                        ->setCellValue('B'.$f, 'Prezente')
                        ->setCellValue('C'.$f, 'Stadi Mbizotrues');
                    $f++;
                    $phpExcelObject->getActiveSheet()
                        ->setCellValue('A'.$f, '0')
                        ->setCellValue('B'.$f, '1')
                        ->setCellValue('C'.$f, '2');

                    $phpExcelObject->getActiveSheet()->setTitle('Fenologjia');


                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(1)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Degeza Prekur(%)')
                        ->setCellValue('C1', 'Lastare Prekur(%)')
                        ->setCellValue('D1', 'Fruta te Deformuar');

                    $f=2;
                    foreach($akariosis_data as $row){
                        $phpExcelObject->getSheet(1)
                            ->setCellValue('A'.$f, $row['data_akariosis'])
                            ->setCellValue('B'.$f, $row['perqindje_degezaprekur'])
                            ->setCellValue('C'.$f, $row['perqindje_lastareprekur'])
                            ->setCellValue('D'.$f, $row['perqindje_frutadeformuar']);

                        $f++;
                    }
                    $phpExcelObject->getSheet(1)->setTitle('Akariosis');


                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(2)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Vrima Hyrje / Njesi')
                        ->setCellValue('C1', 'Vrima Dalje / Njesi')
                        ->setCellValue('D1', 'lastare te Prekur (%)')
                        ->setCellValue('E1', 'Lastare te prekur / Forma te Gjalla ');

                    $f=2;
                    foreach($barrenijo_data as $row){
                        $phpExcelObject->getSheet(2)
                            ->setCellValue('A'.$f, $row['data_barrenijo'])
                            ->setCellValue('B'.$f, $row['ratio_vrimahyrje_njesimostre'])
                            ->setCellValue('C'.$f, $row['ratio_vrimadalje_njesimostre'])
                            ->setCellValue('D'.$f, $row['perqindje_lastarprekur'])
                            ->setCellValue('E'.$f, $row['ratio_lastarprekur_formagjalla']);

                        $f++;
                    }
                    $phpExcelObject->getSheet(2)->setTitle('Barrenijo');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(3)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Jashteqitje / Peme')
                        ->setCellValue('C1', 'Te Rritur / Gracka');
                    $f=2;
                    foreach($euzolera_data as $row){
                        $phpExcelObject->getSheet(3)
                            ->setCellValue('A'.$f, $row['data_euzolera'])
                            ->setCellValue('B'.$f, $row['ratio_jashtqitje_peme'])
                            ->setCellValue('C'.$f, $row['ratio_territur_gracke']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(3)->setTitle('Euzolera');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(4)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Te rritur / Gracka')
                        ->setCellValue('C1', 'Degeza te Prekura (%)')
                        ->setCellValue('D1', 'Lastare te Prekur (%)');
                    $f=2;
                    foreach($glifodes_data as $row){
                        $phpExcelObject->getSheet(4)
                            ->setCellValue('A'.$f, $row['data_glifodes'])
                            ->setCellValue('B'.$f, $row['ratio_territur_grackadite'])
                            ->setCellValue('C'.$f, $row['perqindje_degezaprekur'])
                            ->setCellValue('D'.$f, $row['perqindje_lastarprekur']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(4)->setTitle('Glifodes');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(5)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Pambuku/Forma Gjalla')
                        ->setCellValue('C1', 'Aranjelo (%)')
                        ->setCellValue('D1', 'Aranjelo/Larva Gjate shkundjes')
                        ->setCellValue('E1', 'Gusano-Bardhe/Gracka')
                        ->setCellValue('F1', 'Gusano Bardhe/Vrimadalje')
                        ->setCellValue('G1', 'Gusano Bardhe/ Peme me Simptoma')
                        ->setCellValue('H1', 'Mushkonja Kurores/Gracka')
                        ->setCellValue('I1', 'Mushkonja Kurores/Dege te Prekura')
                        ->setCellValue('J1', 'Zeusera/Gracka');


                    $f=2;
                    foreach($insekteTjera_data as $row){
                        $phpExcelObject->getSheet(5)
                            ->setCellValue('A'.$f, $row['data_insekte_tjera'])
                            ->setCellValue('B'.$f, $row['ratio_pambuku_formagjalla_lule'])
                            ->setCellValue('C'.$f, $row['perqindje_aranjelo_lastarprekur'])
                            ->setCellValue('D'.$f, $row['aranjelo_larvagjateshkundjes'])
                            ->setCellValue('E'.$f, $row['ratio_gusanobardhe_territur_grackadite'])
                            ->setCellValue('F'.$f, $row['ratio_gusanobardhe_vrimadalje_peme'])
                            ->setCellValue('G'.$f, $row['perqindje_gusanobardhe_pememesimptoma'])
                            ->setCellValue('H'.$f, $row['ratio_mushkonjakurores_territur_grackedite'])
                            ->setCellValue('I'.$f, $row['ratio_mushkonjakurores_degezaprekura_peme'])
                            ->setCellValue('J'.$f, $row['ratio_zeusera_territur_grackedite']);
                        $f++;
                    }

                    $phpExcelObject->getSheet(5)->setTitle('Insekte te Tjera');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(6)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Adulte te gjalle jo parazit / Lastar')
                        ->setCellValue('C1', 'Te Gjalla total / lastare')
                        ->setCellValue('D1', 'Veze te Celura(%)')
                        ->setCellValue('E1', 'Te Rritur Parazit(%)');
                    $f=2;
                    foreach($kocinija_data as $row){
                        $phpExcelObject->getSheet(6)
                            ->setCellValue('A'.$f, $row['data_kocinija'])
                            ->setCellValue('B'.$f, $row['ratio_adulttegjallejoparazite_lastar'])
                            ->setCellValue('C'.$f, $row['ratio_tegjallatotal_lastar'])
                            ->setCellValue('D'.$f, $row['perqindje_vezetecelura'])
                            ->setCellValue('E'.$f, $row['perqindje_territur_parazit']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(6)->setTitle('Kocinija');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(7)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Gjatesia Mesatare')
                        ->setCellValue('C1', 'Numri mesatar i nyjeve');
                    $f=2;
                    foreach($lastareRinj_data as $row){
                        $phpExcelObject->getSheet(7)
                            ->setCellValue('A'.$f, $row['data_lastare_rinj'])
                            ->setCellValue('B'.$f, $row['gjatesia_mesatare'])
                            ->setCellValue('C'.$f, $row['nr_mesatar_nyjesh']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(7)->setTitle('Lastare te Rinj');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(8)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Fruta te Vezhguara')
                        ->setCellValue('C1', 'Fruta te Pickuara')
                        ->setCellValue('D1', 'Pickime pa veze')
                        ->setCellValue('E1', 'Veze te gjalla')
                        ->setCellValue('F1', 'Veze te vdekura')
                        ->setCellValue('G1', 'Larva te gjalla')
                        ->setCellValue('H1', 'Larva te ngordhura')
                        ->setCellValue('I1', 'Nimfa te gjalla')
                        ->setCellValue('J1', 'Nimfa te ngordhura')
                        ->setCellValue('K1', 'Galeri Bosh');
                    $f=2;
                    foreach($mizaBiologjike_data as $row){
                        $phpExcelObject->getSheet(8)
                            ->setCellValue('A'.$f, $row['data_miza_biologjike'])
                            ->setCellValue('B'.$f, $row['fruta_vezhguara'])
                            ->setCellValue('C'.$f, $row['fruta_pickuara'])
                            ->setCellValue('D'.$f, $row['ratio_pickimepaveze'])
                            ->setCellValue('E'.$f, $row['ratio_vezetegjalla'])
                            ->setCellValue('F'.$f, $row['ratio_vezetevdekura'])
                            ->setCellValue('G'.$f, $row['ratio_larvategjalla'])
                            ->setCellValue('H'.$f, $row['ratio_larvatengordhura'])
                            ->setCellValue('I'.$f, $row['ratio_nimfategjalla'])
                            ->setCellValue('J'.$f, $row['ratio_nimfatengordhura'])
                            ->setCellValue('K'.$f, $row['ratio_galeribosh']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(8)->setTitle('Miza Biologjike');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(9)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Numri Mizave / Kurth ne dite')
                        ->setCellValue('C1', 'Numri femrave te vezhguara')
                        ->setCellValue('D1', 'Femra me veze(%)')
                        ->setCellValue('E1', 'Indeksi i Rrezikut')
                        ->setCellValue('F1', 'Nr Mizave/ Pllake ne dite')
                        ->setCellValue('G1', 'Fruta te pickuara(%)')
                        ->setCellValue('H1', 'Fruta me mize te gjalle(%)')
                        ->setCellValue('I1', 'Fruta me vrime dalje mize')
                        ->setCellValue('J1', 'Miza Parazite (%)');
                    $f=2;
                    foreach($mizaUllirit_data as $row){
                        $phpExcelObject->getSheet(9)
                            ->setCellValue('A'.$f, $row['data_miza_ullirit'])
                            ->setCellValue('B'.$f, $row['ratio_nrmiza_kurthdite'])
                            ->setCellValue('C'.$f, $row['nr_femra_vezhguara'])
                            ->setCellValue('D'.$f, $row['perqindje_femraveze'])
                            ->setCellValue('E'.$f, $row['indeksi_rrezikut'])
                            ->setCellValue('F'.$f, $row['ratio_nrmiza_pllakedite'])
                            ->setCellValue('G'.$f, $row['perqindje_fruta_pickuara'])
                            ->setCellValue('H'.$f, $row['perqindje_fruta_mizegjalle'])
                            ->setCellValue('I'.$f, $row['fruta_vrimedaljemize'])
                            ->setCellValue('J'.$f, $row['perqindje_mizaparazite']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(9)->setTitle('Miza Ullirit');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(10)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Lastare te Prekur (%)')
                        ->setCellValue('C1', 'Perqindje mesatare e prekshmerise');

                    $f=2;
                    foreach($negrija_data as $row){
                        $phpExcelObject->getSheet(10)
                            ->setCellValue('A'.$f, $row['data_negrija'])
                            ->setCellValue('B'.$f, $row['perqindje_lastarprekur'])
                            ->setCellValue('C'.$f, $row['perqindje_mesatare_prekshmerise']);

                        $f++;
                    }
                    $phpExcelObject->getSheet(10)->setTitle('Negrija');


                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(11)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Peme te Prekura');

                    $f=2;
                    foreach($nematodat_data as $row){
                        $phpExcelObject->getSheet(11)
                            ->setCellValue('A'.$f, $row['data_nematodat'])
                            ->setCellValue('B'.$f, $row['peme_prekura']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(11)->setTitle('Nematodat');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(12)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Te rritur / Peme')
                        ->setCellValue('C1', 'Lastare te Prekur(%)');

                    $f=2;
                    foreach($otiorrinko_data as $row){
                        $phpExcelObject->getSheet(12)
                            ->setCellValue('A'.$f, $row['data_otirrinko'])
                            ->setCellValue('B'.$f, $row['ratio_territur_pemedite'])
                            ->setCellValue('C'.$f, $row['perqindje_lastarprekur']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(12)->setTitle('Otiorrinoko');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(13)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Lule te Prekura(%)')
                        ->setCellValue('C1', '%Lule te Prekura / Forma te Gjalla')
                        ->setCellValue('D1', 'Prais Antofage / Lastar')
                        ->setCellValue('E1', 'Lastare te Infektuar(%)')
                        ->setCellValue('F1', 'Veze ne Celje(%)');

                    $f=2;
                    foreach($praisAntofage_data as $row){
                        $phpExcelObject->getSheet(13)
                            ->setCellValue('A'.$f, $row['data_prais_antofage'])
                            ->setCellValue('B'.$f, $row['perqindje_lule_prekura'])
                            ->setCellValue('C'.$f, $row['ratio_perqindjeluleprekura_formagjalla'])
                            ->setCellValue('D'.$f, $row['ratio_praisantofage_lastar'])
                            ->setCellValue('E'.$f, $row['perqindje_lastareinfektuar'])
                            ->setCellValue('F'.$f, $row['perqindje_vezenecelje']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(13)->setTitle('Prais Antofage');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(14)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Lastare te Prekur(%)')
                        ->setCellValue('C1', 'Lastare te Prekur / Forma te gjalla');

                    $f=2;
                    foreach($praisFilofage_data as $row){
                        $phpExcelObject->getSheet(14)
                            ->setCellValue('A'.$f, $row['data_prais_filofage'])
                            ->setCellValue('B'.$f, $row['perqindje_lastarprekur'])
                            ->setCellValue('C'.$f, $row['ratio_lastarprekur_formagjalla']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(14)->setTitle('Prais Filofage');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(15)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', '(%)Fruta te Prekur / Forma te gjalla')
                        ->setCellValue('C1', 'Veze te Celura (%)')
                        ->setCellValue('D1', 'Veze Bosh(%)')
                        ->setCellValue('E1', 'Fruta ne Toke(Total) / Peme')
                        ->setCellValue('F1', 'Fruta ne Toke(Prais) / Peme');

                    $f=2;
                    foreach($praisKarpofage_data as $row){
                        $phpExcelObject->getSheet(15)
                            ->setCellValue('A'.$f, $row['data_prais_karpofage'])
                            ->setCellValue('B'.$f, $row['perqindje_frutaprekura_formategjalla'])
                            ->setCellValue('C'.$f, $row['perqindje_vezetecelura'])
                            ->setCellValue('D'.$f, $row['perqindje_vezebosh'])
                            ->setCellValue('E'.$f, $row['ratio_frutanetoketotal_peme'])
                            ->setCellValue('F'.$f, $row['ratio_frutanetokeprais_peme']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(15)->setTitle('Prais Karpofage');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(16)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Nr Prais / Kurthe ne dite');

                    $f=2;
                    foreach($praisStadiLarvor_data as $row){
                        $phpExcelObject->getSheet(16)
                            ->setCellValue('A'.$f, $row['data_prais_stadi_larvor'])
                            ->setCellValue('B'.$f, $row['ratio_nrprais_kurthdite']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(16)->setTitle('Prais stadi larvor');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(17)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Lulezim / Lastare total')
                        ->setCellValue('C1', 'Lulezim fertil/ Lastare total')
                        ->setCellValue('D1', 'Fruta para renies / Lastare total')
                        ->setCellValue('E1', 'Fruta pas renies / Lastare total')
                        ->setCellValue('F1', 'Fruta para renies se dyte / Lastare total')
                        ->setCellValue('G1', 'Pesha mesatare e frutit')
                        ->setCellValue('H1', 'Parashikimi i Prodhimit (Ha)')
                        ->setCellValue('I1', 'Parashikimi i Prodhimit per parcele')
                        ->setCellValue('J1', 'Lule fertile (%)')
                        ->setCellValue('K1', 'Gjatesia e Frutit(cm)')
                        ->setCellValue('L1', 'Diametri i Frutit(cm)');

                    $f=2;
                    foreach($prodhimiParashikuar_data as $row){
                        $phpExcelObject->getSheet(17)
                            ->setCellValue('A'.$f, $row['data_prodhimi_parashikuar'])
                            ->setCellValue('B'.$f, $row['ratio_meslulezim_lastartotal'])
                            ->setCellValue('C'.$f, $row['ratio_meslulezimfertil_lastartotal'])
                            ->setCellValue('D'.$f, $row['ratio_frutapararenies_lastaretotal'])
                            ->setCellValue('E'.$f, $row['ratio_frutapasrenies_lastaretotal'])
                            ->setCellValue('F'.$f, $row['ratio_frutaparareniesdyte_lastaretotal'])
                            ->setCellValue('G'.$f, $row['pesha_mesatare_frutit'])
                            ->setCellValue('H'.$f, $row['parashikimi_prodhimit_ha'])
                            ->setCellValue('I'.$f, $row['parashikimi_prodhimit_parcele'])
                            ->setCellValue('J'.$f, $row['perqindje_lulesh_fertile'])
                            ->setCellValue('K'.$f, $row['gjatesia_frutit'])
                            ->setCellValue('L'.$f, $row['diametri_frutit']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(17)->setTitle('Prodhimi i Parashikuar');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(18)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', '(%)Fruta te Sapunifikuara / Fruta me Simptoma')
                        ->setCellValue('C1', '(%) Eskudete / Fruta me Simptoma ')
                        ->setCellValue('D1', '(%)Lepra / Fruta me Simptoma')
                        ->setCellValue('E1', '(%)Fruta te Kalbura / Fruta me Simptoma')
                        ->setCellValue('F1', 'Turbekuloza Simptoma(%)')
                        ->setCellValue('G1', 'Asfiksia e Rrenjeve / Peme te Infektuara');

                    $f=2;
                    foreach($semundjeTjera_data as $row){
                        $phpExcelObject->getSheet(18)
                            ->setCellValue('A'.$f, $row['data_semundje_tjera'])
                            ->setCellValue('B'.$f, $row['perqindje_frutasapunifikuara_frutasimptoma'])
                            ->setCellValue('C'.$f, $row['perqindje_eskudete_frutasimptoma'])
                            ->setCellValue('D'.$f, $row['perqindje_lepra_frutasimptoma'])
                            ->setCellValue('E'.$f, $row['perqindje_frutakalbura_frutasimptoma'])
                            ->setCellValue('F'.$f, $row['turbekuloza_simptoma'])
                            ->setCellValue('G'.$f, $row['asfiksia_rrenjeve_pemeinfektuara']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(18)->setTitle('Kerpudha');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(19)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Lastare te Infektuar(%)')
                        ->setCellValue('C1', 'Gjethe te Demtuara(%)')
                        ->setCellValue('D1', 'Demtues te inkubuar ne gjethe(%)')
                        ->setCellValue('E1', 'Flete me Simptoma(%)')
                        ->setCellValue('F1', 'Kushte te Favorshme(%)');

                    $f=2;
                    foreach($syriPalloit_data as $row){
                        $phpExcelObject->getSheet(19)
                            ->setCellValue('A'.$f, $row['data_syri_palloit'])
                            ->setCellValue('B'.$f, $row['perqindje_lastareinfektuar'])
                            ->setCellValue('C'.$f, $row['perqindje_gjethe_infektuara'])
                            ->setCellValue('D'.$f, $row['perqindje_demtues_inkubuar_gjethe'])
                            ->setCellValue('E'.$f, $row['perqindje_fleta_simptoma'])
                            ->setCellValue('F'.$f, $row['kushte_favorshme']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(19)->setTitle('Syri i Palloit');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(20)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Skutelista te rritur parazite(%)')
                        ->setCellValue('C1', 'Metafikus Kocinija parazite(%)')
                        ->setCellValue('D1', 'Anthokoris Kocinija parazite / Njesi mostre')
                        ->setCellValue('E1', 'Ageniaspis te rritur / Gracke ne dite');

                    $f=2;
                    foreach($ndihmese_data as $row){
                        $phpExcelObject->getSheet(20)
                            ->setCellValue('A'.$f, $row['data_tjera_ndihmese'])
                            ->setCellValue('B'.$f, $row['perqindje_skutelista_territurparazite'])
                            ->setCellValue('C'.$f, $row['perqindje_metafikus_kocinijaparazite'])
                            ->setCellValue('D'.$f, $row['ratio_anthokoris_kocinijaparazite_njesimostre'])
                            ->setCellValue('E'.$f, $row['ratio_ageniaspis_territur_grackedite']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(20)->setTitle('Te Tjera Ndihmese');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(21)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Peme me simptoma te reja)')
                        ->setCellValue('C1', 'Peme me simptoma (%)');

                    $f=2;
                    foreach($verticilium_data as $row){
                        $phpExcelObject->getSheet(21)
                            ->setCellValue('A'.$f, $row['data_verticilium'])
                            ->setCellValue('B'.$f, $row['peme_simptoma_reja'])
                            ->setCellValue('C'.$f, $row['perqindje_pemeve_simptoma']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(21)->setTitle('Verticilium');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(22)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Kocinija')
                        ->setCellValue('C1', 'Prais Filofage')
                        ->setCellValue('D1', 'Prais Antofage')
                        ->setCellValue('E1', 'Prais Karpofage')
                        ->setCellValue('F1', 'Prais Stadi Larvor')
                        ->setCellValue('G1', 'Miza')
                        ->setCellValue('H1', 'Barrenijo')
                        ->setCellValue('I1', 'Syri i Palloit')
                        ->setCellValue('J1', 'Verticilium');

                    $f=2;
                    foreach($kalimiPragut_data as $row){
                        $phpExcelObject->getSheet(22)
                            ->setCellValue('A'.$f, $row['data_kalimipragut'])
                            ->setCellValue('B'.$f, $row['kocinija'])
                            ->setCellValue('C'.$f, $row['prais_filofage'])
                            ->setCellValue('D'.$f, $row['prais_antofage'])
                            ->setCellValue('E'.$f, $row['prais_karpofage'])
                            ->setCellValue('F'.$f, $row['prais_stadi_larvor'])
                            ->setCellValue('G'.$f, $row['miza'])
                            ->setCellValue('H'.$f, $row['barrenijo'])
                            ->setCellValue('I'.$f, $row['syri_palloit'])
                            ->setCellValue('J'.$f, $row['verticilium']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(22)->setTitle('Kalimi i Pragut');



                    $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
                    // create the response
                    $response = $this->get('phpexcel')->createStreamedResponse($writer);

                    // adding headers
                    $dispositionHeader = $response->headers->makeDisposition(
                        ResponseHeaderBag::DISPOSITION_ATTACHMENT,
                        'raport_mostra.xls'
                    );
                    $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
                    $response->headers->set('Pragma', 'public');
                    $response->headers->set('Cache-Control', 'maxage=1');
                    $response->headers->set('Content-Disposition', $dispositionHeader);

                    return $response;

                }else{
                    //get between dates
                    $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
                    $phpExcelObject->getProperties()->setCreator("Aiad")
                        ->setLastModifiedBy("Dorjan Hitaj")
                        ->setTitle("Office 2005 XLSX Test Document")
                        ->setSubject("Office 2005 XLSX Test Document")
                        ->setDescription("Raport Mostra")
                        ->setKeywords("office 2005 openxml php")
                        ->setCategory("Test result file");
//WHERE `parcela` = $parcel

                    //0
                    $fenologjia_sql="SELECT * FROM `mostra_fenologjia` WHERE  `data_fenologjia` BETWEEN '$start' and '$end'  AND `parcela`='$parcel'   AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($fenologjia_sql);
                    $stmt->execute();
                    $fenologjia_data=$stmt->fetchAll();
                    //1
                    $akariosis_sql="SELECT * FROM `mostra_akariosis` WHERE  `data_akariosis` BETWEEN '$start' and '$end'  AND `parcela`='$parcel'   AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($akariosis_sql);
                    $stmt->execute();
                    $akariosis_data=$stmt->fetchAll();
//2
                    $barrenijo_sql="SELECT * FROM `mostra_barrenijo` WHERE  `data_barrenijo` BETWEEN '$start' and '$end'  AND `parcela`='$parcel'   AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($barrenijo_sql);
                    $stmt->execute();
                    $barrenijo_data=$stmt->fetchAll();
//3
                    $euzolera_sql="SELECT * FROM `mostra_euzolera` WHERE  `data_euzolera` BETWEEN '$start' and '$end'  AND `parcela`='$parcel'   AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($euzolera_sql);
                    $stmt->execute();
                    $euzolera_data=$stmt->fetchAll();
//4
                    $glifodes_sql="SELECT * FROM `mostra_glifodes` WHERE  `data_glifodes` BETWEEN '$start' and '$end'  AND `parcela`='$parcel'   AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($glifodes_sql);
                    $stmt->execute();
                    $glifodes_data=$stmt->fetchAll();
//5
                    $insekteTjera_sql="SELECT * FROM `mostra_insekte_tjera` WHERE  `data_insekte_tjera` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($insekteTjera_sql);
                    $stmt->execute();
                    $insekteTjera_data=$stmt->fetchAll();
//6
                    $kocinija_sql="SELECT * FROM `mostra_kocinija` WHERE  `data_kocinija` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($kocinija_sql);
                    $stmt->execute();
                    $kocinija_data=$stmt->fetchAll();
//7
                    $lastareRinj_sql="SELECT * FROM `mostra_lastare_rinj` WHERE  `data_lastare_rinj` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($lastareRinj_sql);
                    $stmt->execute();
                    $lastareRinj_data=$stmt->fetchAll();
//8
                    $mizaBiologjike_sql="SELECT * FROM `mostra_miza_biologjike` WHERE  `data_miza_biologjike` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($mizaBiologjike_sql);
                    $stmt->execute();
                    $mizaBiologjike_data=$stmt->fetchAll();
//9
                    $mizaUllirit_sql="SELECT * FROM `mostra_miza_ullirit` WHERE  `data_miza_ullirit` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($mizaUllirit_sql);
                    $stmt->execute();
                    $mizaUllirit_data=$stmt->fetchAll();
//10
                    $negrija_sql="SELECT * FROM `mostra_negrija` WHERE  `data_negrija` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($negrija_sql);
                    $stmt->execute();
                    $negrija_data=$stmt->fetchAll();
//11
                    $nematodat_sql="SELECT * FROM `mostra_nematodat` WHERE  `data_nematodat` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($nematodat_sql);
                    $stmt->execute();
                    $nematodat_data=$stmt->fetchAll();
//12
                    $otiorrinko_sql="SELECT * FROM `mostra_otiorrinko` WHERE  `data_otirrinko` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($otiorrinko_sql);
                    $stmt->execute();
                    $otiorrinko_data=$stmt->fetchAll();
//13
                    $praisAntofage_sql="SELECT * FROM `mostra_prais_antofage` WHERE  `data_prais_antofage` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisAntofage_sql);
                    $stmt->execute();
                    $praisAntofage_data=$stmt->fetchAll();
//14
                    $praisFilofage_sql="SELECT * FROM `mostra_prais_filofage` WHERE  `data_prais_filofage` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisFilofage_sql);
                    $stmt->execute();
                    $praisFilofage_data=$stmt->fetchAll();
//15
                    $praisKarpofage_sql="SELECT * FROM `mostra_prais_karpofage` WHERE  `data_prais_karpofage` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisKarpofage_sql);
                    $stmt->execute();
                    $praisKarpofage_data=$stmt->fetchAll();
//16
                    $praisStadilarvor_sql="SELECT * FROM `mostra_prais_stadi_larvor` WHERE  `data_prais_stadi_larvor` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($praisStadilarvor_sql);
                    $stmt->execute();
                    $praisStadiLarvor_data=$stmt->fetchAll();
//17
                    $prodhimiParashikuar_sql="SELECT * FROM `mostra_prodhimi_parashikuar` WHERE  `data_prodhimi_parashikuar` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($prodhimiParashikuar_sql);
                    $stmt->execute();
                    $prodhimiParashikuar_data=$stmt->fetchAll();
//18
                    $semundjeTjera_sql="SELECT * FROM `mostra_semundje_tjera` WHERE  `data_semundje_tjera` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($semundjeTjera_sql);
                    $stmt->execute();
                    $semundjeTjera_data=$stmt->fetchAll();
//19
                    $syriPalloit_sql="SELECT * FROM `mostra_syri_palloit` WHERE  `data_syri_palloit` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($syriPalloit_sql);
                    $stmt->execute();
                    $syriPalloit_data=$stmt->fetchAll();
//20
                    $ndihmese_sql="SELECT * FROM `mostra_tjera_ndihmese` WHERE  `data_tjera_ndihmese` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($ndihmese_sql);
                    $stmt->execute();
                    $ndihmese_data=$stmt->fetchAll();
//21
                    $verticilium_sql="SELECT * FROM `mostra_verticilium` WHERE  `data_verticilium` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($verticilium_sql);
                    $stmt->execute();
                    $verticilium_data=$stmt->fetchAll();
//22
                    $kalimiPragut_sql="SELECT * FROM `mostra_kalimi_pragut` WHERE  `data_kalimipragut` BETWEEN '$start' and '$end'  AND `parcela`='$parcel' ";
                    $stmt = $em->getConnection()->prepare($kalimiPragut_sql);
                    $stmt->execute();
                    $kalimiPragut_data=$stmt->fetchAll();


                    $phpExcelObject->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Sythe Dimerore')
                        ->setCellValue('C1', 'Sythe Ne Zhvillim')
                        ->setCellValue('D1', 'Lulezimi')
                        ->setCellValue('E1', 'Lidhja Frutit')
                        ->setCellValue('F1', 'Ngjyra Jeshile')
                        ->setCellValue('G1', 'Ngjyra verdhe')
                        ->setCellValue('H1', 'Ngjyra Violet')
                        ->setCellValue('I1', 'Ngjyra Zeze')
                        ->setCellValue('J1', 'Frut Te Pjekur')
                        ->setCellValue('K1', 'Lulezimi (%)');


                    $f=2;
                    foreach($fenologjia_data as $row){
                        $phpExcelObject->getActiveSheet()
                            ->setCellValue('A'.$f, $row['data_fenologjia'])
                            ->setCellValue('B'.$f, $row['sythe_dimerore'])
                            ->setCellValue('C'.$f, $row['sythe_zhvillim'])
                            ->setCellValue('D'.$f, $row['lulezimi'])
                            ->setCellValue('E'.$f, $row['lidhja_frutit'])
                            ->setCellValue('F'.$f, $row['ngjyre_jeshile'])
                            ->setCellValue('G'.$f, $row['ngjyre_verdhe'])
                            ->setCellValue('H'.$f, $row['ngjyre_violet'])
                            ->setCellValue('I'.$f, $row['ngjyre_zeze'])
                            ->setCellValue('J'.$f, $row['frut_tejpjekur'])
                            ->setCellValue('K'.$f, $row['lulezimi_perqindje']);
                        $f++;
                    }

                    $f++;
                    $phpExcelObject->getActiveSheet()
                        ->setCellValue('A'.$f, 'Jo Prezente')
                        ->setCellValue('B'.$f, 'Prezente')
                        ->setCellValue('C'.$f, 'Stadi Mbizotrues');
                    $f++;
                    $phpExcelObject->getActiveSheet()
                        ->setCellValue('A'.$f, '0')
                        ->setCellValue('B'.$f, '1')
                        ->setCellValue('C'.$f, '2');

                    $phpExcelObject->getActiveSheet()->setTitle('Fenologjia');


                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(1)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Degeza Prekur(%)')
                        ->setCellValue('C1', 'Lastare Prekur(%)')
                        ->setCellValue('D1', 'Fruta te Deformuar');

                    $f=2;
                    foreach($akariosis_data as $row){
                        $phpExcelObject->getSheet(1)
                            ->setCellValue('A'.$f, $row['data_akariosis'])
                            ->setCellValue('B'.$f, $row['perqindje_degezaprekur'])
                            ->setCellValue('C'.$f, $row['perqindje_lastareprekur'])
                            ->setCellValue('D'.$f, $row['perqindje_frutadeformuar']);

                        $f++;
                    }
                    $phpExcelObject->getSheet(1)->setTitle('Akariosis');


                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(2)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Vrima Hyrje / Njesi')
                        ->setCellValue('C1', 'Vrima Dalje / Njesi')
                        ->setCellValue('D1', 'lastare te Prekur (%)')
                        ->setCellValue('E1', 'Lastare te prekur / Forma te Gjalla ');

                    $f=2;
                    foreach($barrenijo_data as $row){
                        $phpExcelObject->getSheet(2)
                            ->setCellValue('A'.$f, $row['data_barrenijo'])
                            ->setCellValue('B'.$f, $row['ratio_vrimahyrje_njesimostre'])
                            ->setCellValue('C'.$f, $row['ratio_vrimadalje_njesimostre'])
                            ->setCellValue('D'.$f, $row['perqindje_lastarprekur'])
                            ->setCellValue('E'.$f, $row['ratio_lastarprekur_formagjalla']);

                        $f++;
                    }
                    $phpExcelObject->getSheet(2)->setTitle('Barrenijo');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(3)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Jashteqitje / Peme')
                        ->setCellValue('C1', 'Te Rritur / Gracka');
                    $f=2;
                    foreach($euzolera_data as $row){
                        $phpExcelObject->getSheet(3)
                            ->setCellValue('A'.$f, $row['data_euzolera'])
                            ->setCellValue('B'.$f, $row['ratio_jashtqitje_peme'])
                            ->setCellValue('C'.$f, $row['ratio_territur_gracke']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(3)->setTitle('Euzolera');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(4)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Te rritur / Gracka')
                        ->setCellValue('C1', 'Degeza te Prekura (%)')
                        ->setCellValue('D1', 'Lastare te Prekur (%)');
                    $f=2;
                    foreach($glifodes_data as $row){
                        $phpExcelObject->getSheet(4)
                            ->setCellValue('A'.$f, $row['data_glifodes'])
                            ->setCellValue('B'.$f, $row['ratio_territur_grackadite'])
                            ->setCellValue('C'.$f, $row['perqindje_degezaprekur'])
                            ->setCellValue('D'.$f, $row['perqindje_lastarprekur']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(4)->setTitle('Glifodes');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(5)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Pambuku/Forma Gjalla')
                        ->setCellValue('C1', 'Aranjelo (%)')
                        ->setCellValue('D1', 'Aranjelo/Larva Gjate shkundjes')
                        ->setCellValue('E1', 'Gusano-Bardhe/Gracka')
                        ->setCellValue('F1', 'Gusano Bardhe/Vrimadalje')
                        ->setCellValue('G1', 'Gusano Bardhe/ Peme me Simptoma')
                        ->setCellValue('H1', 'Mushkonja Kurores/Gracka')
                        ->setCellValue('I1', 'Mushkonja Kurores/Dege te Prekura')
                        ->setCellValue('J1', 'Zeusera/Gracka');


                    $f=2;
                    foreach($insekteTjera_data as $row){
                        $phpExcelObject->getSheet(5)
                            ->setCellValue('A'.$f, $row['data_insekte_tjera'])
                            ->setCellValue('B'.$f, $row['ratio_pambuku_formagjalla_lule'])
                            ->setCellValue('C'.$f, $row['perqindje_aranjelo_lastarprekur'])
                            ->setCellValue('D'.$f, $row['aranjelo_larvagjateshkundjes'])
                            ->setCellValue('E'.$f, $row['ratio_gusanobardhe_territur_grackadite'])
                            ->setCellValue('F'.$f, $row['ratio_gusanobardhe_vrimadalje_peme'])
                            ->setCellValue('G'.$f, $row['perqindje_gusanobardhe_pememesimptoma'])
                            ->setCellValue('H'.$f, $row['ratio_mushkonjakurores_territur_grackedite'])
                            ->setCellValue('I'.$f, $row['ratio_mushkonjakurores_degezaprekura_peme'])
                            ->setCellValue('J'.$f, $row['ratio_zeusera_territur_grackedite']);
                        $f++;
                    }

                    $phpExcelObject->getSheet(5)->setTitle('Insekte te Tjera');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(6)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Adulte te gjalle jo parazit / Lastar')
                        ->setCellValue('C1', 'Te Gjalla total / lastare')
                        ->setCellValue('D1', 'Veze te Celura(%)')
                        ->setCellValue('E1', 'Te Rritur Parazit(%)');
                    $f=2;
                    foreach($kocinija_data as $row){
                        $phpExcelObject->getSheet(6)
                            ->setCellValue('A'.$f, $row['data_kocinija'])
                            ->setCellValue('B'.$f, $row['ratio_adulttegjallejoparazite_lastar'])
                            ->setCellValue('C'.$f, $row['ratio_tegjallatotal_lastar'])
                            ->setCellValue('D'.$f, $row['perqindje_vezetecelura'])
                            ->setCellValue('E'.$f, $row['perqindje_territur_parazit']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(6)->setTitle('Kocinija');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(7)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Gjatesia Mesatare')
                        ->setCellValue('C1', 'Numri mesatar i nyjeve');
                    $f=2;
                    foreach($lastareRinj_data as $row){
                        $phpExcelObject->getSheet(7)
                            ->setCellValue('A'.$f, $row['data_lastare_rinj'])
                            ->setCellValue('B'.$f, $row['gjatesia_mesatare'])
                            ->setCellValue('C'.$f, $row['nr_mesatar_nyjesh']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(7)->setTitle('Lastare te Rinj');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(8)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Fruta te Vezhguara')
                        ->setCellValue('C1', 'Fruta te Pickuara')
                        ->setCellValue('D1', 'Pickime pa veze')
                        ->setCellValue('E1', 'Veze te gjalla')
                        ->setCellValue('F1', 'Veze te vdekura')
                        ->setCellValue('G1', 'Larva te gjalla')
                        ->setCellValue('H1', 'Larva te ngordhura')
                        ->setCellValue('I1', 'Nimfa te gjalla')
                        ->setCellValue('J1', 'Nimfa te ngordhura')
                        ->setCellValue('K1', 'Galeri Bosh');
                    $f=2;
                    foreach($mizaBiologjike_data as $row){
                        $phpExcelObject->getSheet(8)
                            ->setCellValue('A'.$f, $row['data_miza_biologjike'])
                            ->setCellValue('B'.$f, $row['fruta_vezhguara'])
                            ->setCellValue('C'.$f, $row['fruta_pickuara'])
                            ->setCellValue('D'.$f, $row['ratio_pickimepaveze'])
                            ->setCellValue('E'.$f, $row['ratio_vezetegjalla'])
                            ->setCellValue('F'.$f, $row['ratio_vezetevdekura'])
                            ->setCellValue('G'.$f, $row['ratio_larvategjalla'])
                            ->setCellValue('H'.$f, $row['ratio_larvatengordhura'])
                            ->setCellValue('I'.$f, $row['ratio_nimfategjalla'])
                            ->setCellValue('J'.$f, $row['ratio_nimfatengordhura'])
                            ->setCellValue('K'.$f, $row['ratio_galeribosh']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(8)->setTitle('Miza Biologjike');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(9)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Numri Mizave / Kurth ne dite')
                        ->setCellValue('C1', 'Numri femrave te vezhguara')
                        ->setCellValue('D1', 'Femra me veze(%)')
                        ->setCellValue('E1', 'Indeksi i Rrezikut')
                        ->setCellValue('F1', 'Nr Mizave/ Pllake ne dite')
                        ->setCellValue('G1', 'Fruta te pickuara(%)')
                        ->setCellValue('H1', 'Fruta me mize te gjalle(%)')
                        ->setCellValue('I1', 'Fruta me vrime dalje mize')
                        ->setCellValue('J1', 'Miza Parazite (%)');
                    $f=2;
                    foreach($mizaUllirit_data as $row){
                        $phpExcelObject->getSheet(9)
                            ->setCellValue('A'.$f, $row['data_miza_ullirit'])
                            ->setCellValue('B'.$f, $row['ratio_nrmiza_kurthdite'])
                            ->setCellValue('C'.$f, $row['nr_femra_vezhguara'])
                            ->setCellValue('D'.$f, $row['perqindje_femraveze'])
                            ->setCellValue('E'.$f, $row['indeksi_rrezikut'])
                            ->setCellValue('F'.$f, $row['ratio_nrmiza_pllakedite'])
                            ->setCellValue('G'.$f, $row['perqindje_fruta_pickuara'])
                            ->setCellValue('H'.$f, $row['perqindje_fruta_mizegjalle'])
                            ->setCellValue('I'.$f, $row['fruta_vrimedaljemize'])
                            ->setCellValue('J'.$f, $row['perqindje_mizaparazite']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(9)->setTitle('Miza Ullirit');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(10)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Lastare te Prekur (%)')
                        ->setCellValue('C1', 'Perqindje mesatare e prekshmerise');

                    $f=2;
                    foreach($negrija_data as $row){
                        $phpExcelObject->getSheet(10)
                            ->setCellValue('A'.$f, $row['data_negrija'])
                            ->setCellValue('B'.$f, $row['perqindje_lastarprekur'])
                            ->setCellValue('C'.$f, $row['perqindje_mesatare_prekshmerise']);

                        $f++;
                    }
                    $phpExcelObject->getSheet(10)->setTitle('Negrija');


                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(11)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Peme te Prekura');

                    $f=2;
                    foreach($nematodat_data as $row){
                        $phpExcelObject->getSheet(11)
                            ->setCellValue('A'.$f, $row['data_nematodat'])
                            ->setCellValue('B'.$f, $row['peme_prekura']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(11)->setTitle('Nematodat');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(12)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Te rritur / Peme')
                        ->setCellValue('C1', 'Lastare te Prekur(%)');

                    $f=2;
                    foreach($otiorrinko_data as $row){
                        $phpExcelObject->getSheet(12)
                            ->setCellValue('A'.$f, $row['data_otirrinko'])
                            ->setCellValue('B'.$f, $row['ratio_territur_pemedite'])
                            ->setCellValue('C'.$f, $row['perqindje_lastarprekur']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(12)->setTitle('Otiorrinoko');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(13)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Lule te Prekura(%)')
                        ->setCellValue('C1', '%Lule te Prekura / Forma te Gjalla')
                        ->setCellValue('D1', 'Prais Antofage / Lastar')
                        ->setCellValue('E1', 'Lastare te Infektuar(%)')
                        ->setCellValue('F1', 'Veze ne Celje(%)');

                    $f=2;
                    foreach($praisAntofage_data as $row){
                        $phpExcelObject->getSheet(13)
                            ->setCellValue('A'.$f, $row['data_prais_antofage'])
                            ->setCellValue('B'.$f, $row['perqindje_lule_prekura'])
                            ->setCellValue('C'.$f, $row['ratio_perqindjeluleprekura_formagjalla'])
                            ->setCellValue('D'.$f, $row['ratio_praisantofage_lastar'])
                            ->setCellValue('E'.$f, $row['perqindje_lastareinfektuar'])
                            ->setCellValue('F'.$f, $row['perqindje_vezenecelje']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(13)->setTitle('Prais Antofage');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(14)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Lastare te Prekur(%)')
                        ->setCellValue('C1', 'Lastare te Prekur / Forma te gjalla');

                    $f=2;
                    foreach($praisFilofage_data as $row){
                        $phpExcelObject->getSheet(14)
                            ->setCellValue('A'.$f, $row['data_prais_filofage'])
                            ->setCellValue('B'.$f, $row['perqindje_lastarprekur'])
                            ->setCellValue('C'.$f, $row['ratio_lastarprekur_formagjalla']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(14)->setTitle('Prais Filofage');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(15)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', '(%)Fruta te Prekur / Forma te gjalla')
                        ->setCellValue('C1', 'Veze te Celura (%)')
                        ->setCellValue('D1', 'Veze Bosh(%)')
                        ->setCellValue('E1', 'Fruta ne Toke(Total) / Peme')
                        ->setCellValue('F1', 'Fruta ne Toke(Prais) / Peme');

                    $f=2;
                    foreach($praisKarpofage_data as $row){
                        $phpExcelObject->getSheet(15)
                            ->setCellValue('A'.$f, $row['data_prais_karpofage'])
                            ->setCellValue('B'.$f, $row['perqindje_frutaprekura_formategjalla'])
                            ->setCellValue('C'.$f, $row['perqindje_vezetecelura'])
                            ->setCellValue('D'.$f, $row['perqindje_vezebosh'])
                            ->setCellValue('E'.$f, $row['ratio_frutanetoketotal_peme'])
                            ->setCellValue('F'.$f, $row['ratio_frutanetokeprais_peme']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(15)->setTitle('Prais Karpofage');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(16)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Nr Prais / Kurthe ne dite');

                    $f=2;
                    foreach($praisStadiLarvor_data as $row){
                        $phpExcelObject->getSheet(16)
                            ->setCellValue('A'.$f, $row['data_prais_stadi_larvor'])
                            ->setCellValue('B'.$f, $row['ratio_nrprais_kurthdite']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(16)->setTitle('Prais stadi larvor');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(17)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Lulezim / Lastare total')
                        ->setCellValue('C1', 'Lulezim fertil/ Lastare total')
                        ->setCellValue('D1', 'Fruta para renies / Lastare total')
                        ->setCellValue('E1', 'Fruta pas renies / Lastare total')
                        ->setCellValue('F1', 'Fruta para renies se dyte / Lastare total')
                        ->setCellValue('G1', 'Pesha mesatare e frutit')
                        ->setCellValue('H1', 'Parashikimi i Prodhimit (Ha)')
                        ->setCellValue('I1', 'Parashikimi i Prodhimit per parcele')
                        ->setCellValue('J1', 'Lule fertile (%)')
                        ->setCellValue('K1', 'Gjatesia e Frutit(cm)')
                        ->setCellValue('L1', 'Diametri i Frutit(cm)');

                    $f=2;
                    foreach($prodhimiParashikuar_data as $row){
                        $phpExcelObject->getSheet(17)
                            ->setCellValue('A'.$f, $row['data_prodhimi_parashikuar'])
                            ->setCellValue('B'.$f, $row['ratio_meslulezim_lastartotal'])
                            ->setCellValue('C'.$f, $row['ratio_meslulezimfertil_lastartotal'])
                            ->setCellValue('D'.$f, $row['ratio_frutapararenies_lastaretotal'])
                            ->setCellValue('E'.$f, $row['ratio_frutapasrenies_lastaretotal'])
                            ->setCellValue('F'.$f, $row['ratio_frutaparareniesdyte_lastaretotal'])
                            ->setCellValue('G'.$f, $row['pesha_mesatare_frutit'])
                            ->setCellValue('H'.$f, $row['parashikimi_prodhimit_ha'])
                            ->setCellValue('I'.$f, $row['parashikimi_prodhimit_parcele'])
                            ->setCellValue('J'.$f, $row['perqindje_lulesh_fertile'])
                            ->setCellValue('K'.$f, $row['gjatesia_frutit'])
                            ->setCellValue('L'.$f, $row['diametri_frutit']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(17)->setTitle('Prodhimi i Parashikuar');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(18)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', '(%)Fruta te Sapunifikuara / Fruta me Simptoma')
                        ->setCellValue('C1', '(%) Eskudete / Fruta me Simptoma ')
                        ->setCellValue('D1', '(%)Lepra / Fruta me Simptoma')
                        ->setCellValue('E1', '(%)Fruta te Kalbura / Fruta me Simptoma')
                        ->setCellValue('F1', 'Turbekuloza Simptoma(%)')
                        ->setCellValue('G1', 'Asfiksia e Rrenjeve / Peme te Infektuara');

                    $f=2;
                    foreach($semundjeTjera_data as $row){
                        $phpExcelObject->getSheet(18)
                            ->setCellValue('A'.$f, $row['data_semundje_tjera'])
                            ->setCellValue('B'.$f, $row['perqindje_frutasapunifikuara_frutasimptoma'])
                            ->setCellValue('C'.$f, $row['perqindje_eskudete_frutasimptoma'])
                            ->setCellValue('D'.$f, $row['perqindje_lepra_frutasimptoma'])
                            ->setCellValue('E'.$f, $row['perqindje_frutakalbura_frutasimptoma'])
                            ->setCellValue('F'.$f, $row['turbekuloza_simptoma'])
                            ->setCellValue('G'.$f, $row['asfiksia_rrenjeve_pemeinfektuara']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(18)->setTitle('Kerpudha');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(19)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Lastare te Infektuar(%)')
                        ->setCellValue('C1', 'Gjethe te Demtuara(%)')
                        ->setCellValue('D1', 'Demtues te inkubuar ne gjethe(%)')
                        ->setCellValue('E1', 'Flete me Simptoma(%)')
                        ->setCellValue('F1', 'Kushte te Favorshme(%)');

                    $f=2;
                    foreach($syriPalloit_data as $row){
                        $phpExcelObject->getSheet(19)
                            ->setCellValue('A'.$f, $row['data_syri_palloit'])
                            ->setCellValue('B'.$f, $row['perqindje_lastareinfektuar'])
                            ->setCellValue('C'.$f, $row['perqindje_gjethe_infektuara'])
                            ->setCellValue('D'.$f, $row['perqindje_demtues_inkubuar_gjethe'])
                            ->setCellValue('E'.$f, $row['perqindje_fleta_simptoma'])
                            ->setCellValue('F'.$f, $row['kushte_favorshme']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(19)->setTitle('Syri i Palloit');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(20)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Skutelista te rritur parazite(%)')
                        ->setCellValue('C1', 'Metafikus Kocinija parazite(%)')
                        ->setCellValue('D1', 'Anthokoris Kocinija parazite / Njesi mostre')
                        ->setCellValue('E1', 'Ageniaspis te rritur / Gracke ne dite');

                    $f=2;
                    foreach($ndihmese_data as $row){
                        $phpExcelObject->getSheet(20)
                            ->setCellValue('A'.$f, $row['data_tjera_ndihmese'])
                            ->setCellValue('B'.$f, $row['perqindje_skutelista_territurparazite'])
                            ->setCellValue('C'.$f, $row['perqindje_metafikus_kocinijaparazite'])
                            ->setCellValue('D'.$f, $row['ratio_anthokoris_kocinijaparazite_njesimostre'])
                            ->setCellValue('E'.$f, $row['ratio_ageniaspis_territur_grackedite']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(20)->setTitle('Te Tjera Ndihmese');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(21)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Peme me simptoma te reja)')
                        ->setCellValue('C1', 'Peme me simptoma (%)');

                    $f=2;
                    foreach($verticilium_data as $row){
                        $phpExcelObject->getSheet(21)
                            ->setCellValue('A'.$f, $row['data_verticilium'])
                            ->setCellValue('B'.$f, $row['peme_simptoma_reja'])
                            ->setCellValue('C'.$f, $row['perqindje_pemeve_simptoma']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(21)->setTitle('Verticilium');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(22)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Kocinija')
                        ->setCellValue('C1', 'Prais Filofage')
                        ->setCellValue('D1', 'Prais Antofage')
                        ->setCellValue('E1', 'Prais Karpofage')
                        ->setCellValue('F1', 'Prais Stadi Larvor')
                        ->setCellValue('G1', 'Miza')
                        ->setCellValue('H1', 'Barrenijo')
                        ->setCellValue('I1', 'Syri i Palloit')
                        ->setCellValue('J1', 'Verticilium');

                    $f=2;
                    foreach($kalimiPragut_data as $row){
                        $phpExcelObject->getSheet(22)
                            ->setCellValue('A'.$f, $row['data_kalimipragut'])
                            ->setCellValue('B'.$f, $row['kocinija'])
                            ->setCellValue('C'.$f, $row['prais_filofage'])
                            ->setCellValue('D'.$f, $row['prais_antofage'])
                            ->setCellValue('E'.$f, $row['prais_karpofage'])
                            ->setCellValue('F'.$f, $row['prais_stadi_larvor'])
                            ->setCellValue('G'.$f, $row['miza'])
                            ->setCellValue('H'.$f, $row['barrenijo'])
                            ->setCellValue('I'.$f, $row['syri_palloit'])
                            ->setCellValue('J'.$f, $row['verticilium']);
                        $f++;
                    }
                    $phpExcelObject->getSheet(22)->setTitle('Kalimi i Pragut');


                    $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
                    // create the response
                    $response = $this->get('phpexcel')->createStreamedResponse($writer);

                    // adding headers
                    $dispositionHeader = $response->headers->makeDisposition(
                        ResponseHeaderBag::DISPOSITION_ATTACHMENT,
                        'raport_mostra.xls'
                    );
                    $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
                    $response->headers->set('Pragma', 'public');
                    $response->headers->set('Cache-Control', 'maxage=1');
                    $response->headers->set('Content-Disposition', $dispositionHeader);

                    return $response;

                }
            }

        }else{
            return $this->render('AiadBundle:Raporte:raport_mostra.html.twig');
        }

    }



    /**
     * @param Request $request
     * @Route("/raport_nderhyrje", name="raportNderhyrje")
     */
    public function createRaportNderhyrje(){
        $post = Request::createFromGlobals();
        $em = $this->getDoctrine()->getManager();
        $session = $this->getRequest()->getSession();
//        $parcela = $session->get('foo');
        $start='';
        $end='';
        $all_data='';
        $format_doc='';

        if ($post->request->has('submit')) {
            $start = $post->request->get('start_date');
            $end = $post->request->get('end_date');
            $all_data = $post->request->get('all_doc');
            $format_doc=$post->request->get('formati_doc');

            if($format_doc== 1){
                //pdf
                if($all_data==1){
                    //0
                    $eliminimi_mbetjes=$em->getRepository('AiadBundle:NderhyrjetEliminimiMbetjes')->findBy(array('parcela'=>1));
                    //1
                    $gracka_masive=$em->getRepository('AiadBundle:NderhyrjetGrackaMasive')->findBy(array('parcela'=>1));
                    //2
                    $krasitje=$em->getRepository('AiadBundle:NderhyrjetKrasitje')->findBy(array('parcela'=>1));
                    //3
                    $mbulesa_tokes=$em->getRepository('AiadBundle:NderhyrjetMbulesaTokes')->findBy(array('parcela'=>1));
                    //4
                    $punimi_tokes=$em->getRepository('AiadBundle:NderhyrjetPunimitokes')->findBy(array('parcela'=>1));
                    //5
                    $ujitje=$em->getRepository('AiadBundle:NderhyrjetUjitje')->findBy(array('parcela'=>1));
                    //6
                    $vjelja=$em->getRepository('AiadBundle:NderhyrjetVjelja')->findBy(array('parcela'=>1));

                    return $this->render('AiadBundle:Raporte:raport_nderhyrje_pdf.html.twig', array(
                        'eliminimi_mbetjes'=>$eliminimi_mbetjes,
                        'gracka_masive'=>$gracka_masive,
                        'krasitje'=>$krasitje,
                        'mbulesa_tokes'=>$mbulesa_tokes,
                        'punimi_tokes'=>$punimi_tokes,
                        'ujitje'=>$ujitje,
                        'vjelja'=>$vjelja,

                    ));

                }else{

                    $query = $em->createQuery(
                        'SELECT p
                        FROM AiadBundle:NderhyrjetEliminimiMbetjes p
                        WHERE p.dataEliminimit BETWEEN :start AND :endd
                        '
                    )->setParameter('start', $start)
                        ->setParameter('endd', $end);

                    $eliminimi_mbetjes = $query->getResult();

                    $query = $em->createQuery(
                        'SELECT p
                        FROM AiadBundle:NderhyrjetGrackaMasive p
                        WHERE p.dataNderhyrjes BETWEEN :start AND :endd
                        '
                    )->setParameter('start', $start)
                        ->setParameter('endd', $end);

                    $gracka_masive = $query->getResult();

                    $query = $em->createQuery(
                        'SELECT p
                        FROM AiadBundle:NderhyrjetKrasitje p
                        WHERE p.dataEliminimiMbetjeve BETWEEN :start AND :endd
                        '
                    )->setParameter('start', $start)
                        ->setParameter('endd', $end);

                    $krasitje = $query->getResult();

                    $query = $em->createQuery(
                        'SELECT p
                        FROM AiadBundle:NderhyrjetMbulesaTokes p
                        WHERE p.dataEliminimit BETWEEN :start AND :endd
                        '
                    )->setParameter('start', $start)
                        ->setParameter('endd', $end);

                    $mbulesa_tokes = $query->getResult();

                    $query = $em->createQuery(
                        'SELECT p
                        FROM AiadBundle:NderhyrjetPunimitokes p
                        WHERE p.dataPunimitTokes BETWEEN :start AND :endd
                        '
                    )->setParameter('start', $start)
                        ->setParameter('endd', $end);

                    $punimi_tokes = $query->getResult();

                    $query = $em->createQuery(
                        'SELECT p
                        FROM AiadBundle:NderhyrjetUjitje p
                        WHERE p.dataUjitjes BETWEEN :start AND :endd
                        '
                    )->setParameter('start', $start)
                        ->setParameter('endd', $end);

                    $ujitje = $query->getResult();

                    $query = $em->createQuery(
                        'SELECT p
                        FROM AiadBundle:NderhyrjetVjelja p
                        WHERE p.dataVjeljes BETWEEN :start AND :endd
                        '
                    )->setParameter('start', $start)
                        ->setParameter('endd', $end);

                    $vjelja = $query->getResult();

                    return $this->render('AiadBundle:Raporte:raport_nderhyrje_pdf.html.twig', array(
                        'eliminimi_mbetjes'=>$eliminimi_mbetjes,
                        'gracka_masive'=>$gracka_masive,
                        'krasitje'=>$krasitje,
                        'mbulesa_tokes'=>$mbulesa_tokes,
                        'punimi_tokes'=>$punimi_tokes,
                        'ujitje'=>$ujitje,
                        'vjelja'=>$vjelja,

                    ));
                }

            }else{
                //excel
                if($all_data==1){
//get all
                    $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
                    $phpExcelObject->getProperties()->setCreator("Aiad")
                        ->setLastModifiedBy("Dorjan Hitaj")
                        ->setTitle("Office 2005 XLSX Test Document")
                        ->setSubject("Office 2005 XLSX Nderhyjet")
                        ->setDescription("Raport Nderhyrjet")
                        ->setKeywords("office 2005 openxml php")
                        ->setCategory("Test result file");

     //0
                $eliminimi_mbetjes=$em->getRepository('AiadBundle:NderhyrjetEliminimiMbetjes')->findBy(array('parcela'=>1));
               //1
                $gracka_masive=$em->getRepository('AiadBundle:NderhyrjetGrackaMasive')->findBy(array('parcela'=>1));
                //2
                $krasitje=$em->getRepository('AiadBundle:NderhyrjetKrasitje')->findBy(array('parcela'=>1));
                //3
                $mbulesa_tokes=$em->getRepository('AiadBundle:NderhyrjetMbulesaTokes')->findBy(array('parcela'=>1));
                //4
                $punimi_tokes=$em->getRepository('AiadBundle:NderhyrjetPunimitokes')->findBy(array('parcela'=>1));
                //5
                $ujitje=$em->getRepository('AiadBundle:NderhyrjetUjitje')->findBy(array('parcela'=>1));
                //6
                $vjelja=$em->getRepository('AiadBundle:NderhyrjetVjelja')->findBy(array('parcela'=>1));



                    $phpExcelObject->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Lloji i Mbetjeve')
                        ->setCellValue('C1', 'Menyra e Eleminimit')
                        ->setCellValue('D1', 'Vezhgime');


                    $f=2;
                    foreach($eliminimi_mbetjes as $row){
                        $phpExcelObject->getActiveSheet()
                            ->setCellValue('A'.$f, date_format($row->getDataEliminimit(), 'Y-m-d'))
                            ->setCellValue('B'.$f, $row->getLlojiMbetjeve())
                            ->setCellValue('C'.$f, $row->getMenyraEliminimit())
                            ->setCellValue('D'.$f, $row->getVezhgime());
                        $f++;
                    }

                    $phpExcelObject->getActiveSheet()->setTitle('Eliminimi i Mbetjeve');


                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(1)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Tipi')
                        ->setCellValue('C1', 'Objektivi i Semundjes')
                        ->setCellValue('D1', 'Tipi i Grackes')
                        ->setCellValue('E1', 'Numri i Grackave')
                        ->setCellValue('F1', 'Ferromoni')
                        ->setCellValue('G1', 'Kompania Prodhuese')
                        ->setCellValue('H1', 'Kompania Shperndarese')
                        ->setCellValue('I1', 'Vezhgime');

                    $f=2;
                    foreach($gracka_masive as $row){
                        $phpExcelObject->getSheet(1)
                            ->setCellValue('A'.$f, date_format($row->getDataNderhyrjes(), 'Y-m-d'))
                            ->setCellValue('B'.$f, $row->getTipi())
                            ->setCellValue('C'.$f, $row->getObjektiviSemundjes())
                            ->setCellValue('D'.$f, $row->getTipiGrackesDifuzorit())
                            ->setCellValue('E'.$f, $row->getNumriGrackave())
                            ->setCellValue('F'.$f, $row->getFerromoni())
                            ->setCellValue('G'.$f, $row->getFerromoniKompaniaProdhuese())
                            ->setCellValue('H'.$f, $row->getFerromoniKompaniaShperndarese())
                            ->setCellValue('I'.$f, $row->getVezhgime());

                        $f++;
                    }
                    $phpExcelObject->getSheet(1)->setTitle('Gracka Masive');


                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(2)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Tipi')
                        ->setCellValue('C1', 'Kohezgjatja')
                        ->setCellValue('D1', 'Mjeti i Perdorur')
                        ->setCellValue('E1', 'Produkti Dizinfektues')
                        ->setCellValue('F1', 'Menyra e Eliminimit')
                        ->setCellValue('G1', 'Vezhgime');

                    $f=2;
                    foreach($krasitje as $row){
                        $phpExcelObject->getSheet(2)
                            ->setCellValue('A'.$f, date_format($row->getDataEliminimiMbetjeve(), 'Y-m-d'))
                            ->setCellValue('B'.$f, $row->getTipiKrasitjes())
                            ->setCellValue('C'.$f, $row->getKohezgjatja()."  dite")
                            ->setCellValue('D'.$f, $row->getMjetetPerdorura())
                            ->setCellValue('E'.$f, $row->getProduktiDizinfektim())
                            ->setCellValue('F'.$f, $row->getMenyraEliminimit())
                            ->setCellValue('G'.$f, $row->getVezhgime());

                        $f++;
                    }
                    $phpExcelObject->getSheet(2)->setTitle('Krasitje');


                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(3)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Specia e Mbjelle')
                        ->setCellValue('C1', 'Doza e Mbjelle')
                        ->setCellValue('D1', 'Siperfaqja e Mbjelle')
                        ->setCellValue('E1', 'menyra e Eliminimit')
                        ->setCellValue('F1', 'Vezhgime');

                    $f=2;
                    foreach($mbulesa_tokes as $row){
                        $phpExcelObject->getSheet(3)
                            ->setCellValue('A'.$f, date_format($row->getDataEliminimit(), 'Y-m-d'))
                            ->setCellValue('B'.$f, $row->getSpeciaMbjelle())
                            ->setCellValue('C'.$f, $row->getDozaMbjelljes())
                            ->setCellValue('D'.$f, $row->getSipMbjelljes())
                            ->setCellValue('E'.$f, $row->getMenyraEliminimit())
                            ->setCellValue('F'.$f, $row->getVezhgime());

                        $f++;
                    }
                    $phpExcelObject->getSheet(3)->setTitle('Mbulesa e Tokes');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(4)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Mjeti i Perdorur')
                        ->setCellValue('C1', 'Shperndarja e Punimit')
                        ->setCellValue('D1', 'Siperfaqja e Punuar')
                        ->setCellValue('E1', 'Thellesia max e punimit')
                        ->setCellValue('F1', 'Tipi i Punimit')
                        ->setCellValue('G1', 'Arsyeja e Punimit')
                        ->setCellValue('H1', 'Vezhgime');

                    $f=2;
                    foreach($punimi_tokes as $row){
                        $phpExcelObject->getSheet(4)
                            ->setCellValue('A'.$f, date_format($row->getDataPunimitTokes(), 'Y-m-d'))
                            ->setCellValue('B'.$f, $row->getMjetiPerdorur())
                            ->setCellValue('C'.$f, $row->getShperndarjaPunimit())
                            ->setCellValue('D'.$f, $row->getSipPunuar())
                            ->setCellValue('E'.$f, $row->getThellesiaMaxPunimit())
                            ->setCellValue('F'.$f, $row->getTipiPunimit())
                            ->setCellValue('G'.$f, $row->getTipiPunimitArsyeja())
                            ->setCellValue('H'.$f, $row->getVezhgime());

                        $f++;
                    }
                    $phpExcelObject->getSheet(4)->setTitle('Punimi i Tokes');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(5)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Origjina e Ujit')
                        ->setCellValue('C1', 'Sistemi i Ujitjes')
                        ->setCellValue('D1', 'Cilesia e Ujit')
                        ->setCellValue('E1', 'Sasia e Ujit')
                        ->setCellValue('F1', 'Arsyeja e Ujitjes')
                        ->setCellValue('G1', 'Vezhgime');

                    $f=2;
                    foreach($ujitje as $row){
                        $phpExcelObject->getSheet(5)
                            ->setCellValue('A'.$f, date_format($row->getDataUjitjes(), 'Y-m-d'))
                            ->setCellValue('B'.$f, $row->getOrigjinaUjit())
                            ->setCellValue('C'.$f, $row->getSistemiUjitjes())
                            ->setCellValue('D'.$f, $row->getCilesiaUjit())
                            ->setCellValue('E'.$f, $row->getSasiaUjit())
                            ->setCellValue('F'.$f, $row->getArsyejaUjitjes())
                            ->setCellValue('G'.$f, $row->getVezhgime());

                        $f++;
                    }
                    $phpExcelObject->getSheet(5)->setTitle('Ujitje');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(6)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Lloji i Ullinjve')
                        ->setCellValue('C1', 'Menyra e Vjeljes')
                        ->setCellValue('D1', 'Cilesia e Vajit')
                        ->setCellValue('E1', 'Destinacioni')
                        ->setCellValue('F1', 'Prejardhja e Frutit')
                        ->setCellValue('G1', 'Rendimenti')
                        ->setCellValue('H1', 'Indeksi i Pjekjes')
                        ->setCellValue('I1', '% rendimenti yndyror')
                        ->setCellValue('J1', '% aciditeti')
                        ->setCellValue('K1', 'Vezhgime');

                    $f=2;
                    foreach($ujitje as $row){
                        $phpExcelObject->getSheet(6)
                            ->setCellValue('A'.$f, date_format($row->getDataVjeljes(), 'Y-m-d'))
                            ->setCellValue('B'.$f, $row->getLlojiUllinjve())
                            ->setCellValue('C'.$f, $row->getMenyraVjeljes())
                            ->setCellValue('D'.$f, $row->getCilesiaVajit())
                            ->setCellValue('E'.$f, $row->getVjeljaDestinacioni())
                            ->setCellValue('F'.$f, $row->getPrejardhjaFrutit())
                            ->setCellValue('G'.$f, $row->getRendimenti())
                            ->setCellValue('G'.$f, $row->getIndeksiPjekjes())
                            ->setCellValue('G'.$f, $row->getPerqindjeRendimentiYndyror())
                            ->setCellValue('G'.$f, $row->getPerqindjeAciditeti())
                            ->setCellValue('G'.$f, $row->getVezhgime());

                        $f++;
                    }
                    $phpExcelObject->getSheet(6)->setTitle('Vjelja');

                    $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
                    // create the response
                    $response = $this->get('phpexcel')->createStreamedResponse($writer);

                    // adding headers
                    $dispositionHeader = $response->headers->makeDisposition(
                        ResponseHeaderBag::DISPOSITION_ATTACHMENT,
                        'raport_nderhyrje.xls'
                    );
                    $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
                    $response->headers->set('Pragma', 'public');
                    $response->headers->set('Cache-Control', 'maxage=1');
                    $response->headers->set('Content-Disposition', $dispositionHeader);

                    return $response;

//                    return $this->render('AiadBundle:Raporte:raport_nderhyrje_pdf.html.twig', array('mbetjet'=>$eliminimi_mbetjes));

                }else{

                    $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();
                    $phpExcelObject->getProperties()->setCreator("Aiad")
                        ->setLastModifiedBy("Dorjan Hitaj")
                        ->setTitle("Office 2005 XLSX Test Document")
                        ->setSubject("Office 2005 XLSX Nderhyjet")
                        ->setDescription("Raport Nderhyrjet")
                        ->setKeywords("office 2005 openxml php")
                        ->setCategory("Test result file");


                    $query = $em->createQuery(
                        'SELECT p
                        FROM AiadBundle:NderhyrjetEliminimiMbetjes p
                        WHERE p.parcela = :parcel AND p.dataEliminimit BETWEEN :start AND :endd
                        '
                    )->setParameter('parcel', 2)
                     ->setParameter('start', $start)
                     ->setParameter('endd', $end);

                    $eliminimi_mbetjes = $query->getResult();

                    $query = $em->createQuery(
                        'SELECT p
                        FROM AiadBundle:NderhyrjetGrackaMasive p
                        WHERE p.dataNderhyrjes BETWEEN :start AND :endd
                        '
                    )->setParameter('start', $start)
                        ->setParameter('endd', $end);

                    $gracka_masive = $query->getResult();

                    $query = $em->createQuery(
                        'SELECT p
                        FROM AiadBundle:NderhyrjetKrasitje p
                        WHERE p.dataEliminimiMbetjeve BETWEEN :start AND :endd
                        '
                    )->setParameter('start', $start)
                        ->setParameter('endd', $end);

                    $krasitje = $query->getResult();

                    $query = $em->createQuery(
                        'SELECT p
                        FROM AiadBundle:NderhyrjetMbulesaTokes p
                        WHERE p.dataEliminimit BETWEEN :start AND :endd
                        '
                    )->setParameter('start', $start)
                        ->setParameter('endd', $end);

                    $mbulesa_tokes = $query->getResult();

                    $query = $em->createQuery(
                        'SELECT p
                        FROM AiadBundle:NderhyrjetPunimitokes p
                        WHERE p.dataPunimitTokes BETWEEN :start AND :endd
                        '
                    )->setParameter('start', $start)
                        ->setParameter('endd', $end);

                    $punimi_tokes = $query->getResult();

                    $query = $em->createQuery(
                        'SELECT p
                        FROM AiadBundle:NderhyrjetUjitje p
                        WHERE p.dataUjitjes BETWEEN :start AND :endd
                        '
                    )->setParameter('start', $start)
                        ->setParameter('endd', $end);

                    $ujitje = $query->getResult();

                    $query = $em->createQuery(
                        'SELECT p
                        FROM AiadBundle:NderhyrjetVjelja p
                        WHERE p.dataVjeljes BETWEEN :start AND :endd
                        '
                    )->setParameter('start', $start)
                        ->setParameter('endd', $end);

                    $vjelja = $query->getResult();



                    $phpExcelObject->setActiveSheetIndex(0)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Lloji i Mbetjeve')
                        ->setCellValue('C1', 'Menyra e Eleminimit')
                        ->setCellValue('D1', 'Vezhgime');


                    $f=2;
                    foreach($eliminimi_mbetjes as $row){
                        $phpExcelObject->getActiveSheet()
                            ->setCellValue('A'.$f, date_format($row->getDataEliminimit(), 'Y-m-d'))
                            ->setCellValue('B'.$f, $row->getLlojiMbetjeve())
                            ->setCellValue('C'.$f, $row->getMenyraEliminimit())
                            ->setCellValue('D'.$f, $row->getVezhgime());
                        $f++;
                    }

                    $phpExcelObject->getActiveSheet()->setTitle('Eliminimi i Mbetjeve');


                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(1)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Tipi')
                        ->setCellValue('C1', 'Objektivi i Semundjes')
                        ->setCellValue('D1', 'Tipi i Grackes')
                        ->setCellValue('E1', 'Numri i Grackave')
                        ->setCellValue('F1', 'Ferromoni')
                        ->setCellValue('G1', 'Kompania Prodhuese')
                        ->setCellValue('H1', 'Kompania Shperndarese')
                        ->setCellValue('I1', 'Vezhgime');

                    $f=2;
                    foreach($gracka_masive as $row){
                        $phpExcelObject->getSheet(1)
                            ->setCellValue('A'.$f, date_format($row->getDataNderhyrjes(), 'Y-m-d'))
                            ->setCellValue('B'.$f, $row->getTipi())
                            ->setCellValue('C'.$f, $row->getObjektiviSemundjes())
                            ->setCellValue('D'.$f, $row->getTipiGrackesDifuzorit())
                            ->setCellValue('E'.$f, $row->getNumriGrackave())
                            ->setCellValue('F'.$f, $row->getFerromoni())
                            ->setCellValue('G'.$f, $row->getFerromoniKompaniaProdhuese())
                            ->setCellValue('H'.$f, $row->getFerromoniKompaniaShperndarese())
                            ->setCellValue('I'.$f, $row->getVezhgime());

                        $f++;
                    }
                    $phpExcelObject->getSheet(1)->setTitle('Gracka Masive');


                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(2)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Tipi')
                        ->setCellValue('C1', 'Kohezgjatja')
                        ->setCellValue('D1', 'Mjeti i Perdorur')
                        ->setCellValue('E1', 'Produkti Dizinfektues')
                        ->setCellValue('F1', 'Menyra e Eliminimit')
                        ->setCellValue('G1', 'Vezhgime');

                    $f=2;
                    foreach($krasitje as $row){
                        $phpExcelObject->getSheet(2)
                            ->setCellValue('A'.$f, date_format($row->getDataEliminimiMbetjeve(), 'Y-m-d'))
                            ->setCellValue('B'.$f, $row->getTipiKrasitjes())
                            ->setCellValue('C'.$f, $row->getKohezgjatja()."  dite")
                            ->setCellValue('D'.$f, $row->getMjetetPerdorura())
                            ->setCellValue('E'.$f, $row->getProduktiDizinfektim())
                            ->setCellValue('F'.$f, $row->getMenyraEliminimit())
                            ->setCellValue('G'.$f, $row->getVezhgime());

                        $f++;
                    }
                    $phpExcelObject->getSheet(2)->setTitle('Krasitje');


                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(3)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Specia e Mbjelle')
                        ->setCellValue('C1', 'Doza e Mbjelle')
                        ->setCellValue('D1', 'Siperfaqja e Mbjelle')
                        ->setCellValue('E1', 'menyra e Eliminimit')
                        ->setCellValue('F1', 'Vezhgime');

                    $f=2;
                    foreach($mbulesa_tokes as $row){
                        $phpExcelObject->getSheet(3)
                            ->setCellValue('A'.$f, date_format($row->getDataEliminimit(), 'Y-m-d'))
                            ->setCellValue('B'.$f, $row->getSpeciaMbjelle())
                            ->setCellValue('C'.$f, $row->getDozaMbjelljes())
                            ->setCellValue('D'.$f, $row->getSipMbjelljes())
                            ->setCellValue('E'.$f, $row->getMenyraEliminimit())
                            ->setCellValue('F'.$f, $row->getVezhgime());

                        $f++;
                    }
                    $phpExcelObject->getSheet(3)->setTitle('Mbulesa e Tokes');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(4)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Mjeti i Perdorur')
                        ->setCellValue('C1', 'Shperndarja e Punimit')
                        ->setCellValue('D1', 'Siperfaqja e Punuar')
                        ->setCellValue('E1', 'Thellesia max e punimit')
                        ->setCellValue('F1', 'Tipi i Punimit')
                        ->setCellValue('G1', 'Arsyeja e Punimit')
                        ->setCellValue('H1', 'Vezhgime');

                    $f=2;
                    foreach($punimi_tokes as $row){
                        $phpExcelObject->getSheet(4)
                            ->setCellValue('A'.$f, date_format($row->getDataPunimitTokes(), 'Y-m-d'))
                            ->setCellValue('B'.$f, $row->getMjetiPerdorur())
                            ->setCellValue('C'.$f, $row->getShperndarjaPunimit())
                            ->setCellValue('D'.$f, $row->getSipPunuar())
                            ->setCellValue('E'.$f, $row->getThellesiaMaxPunimit())
                            ->setCellValue('F'.$f, $row->getTipiPunimit())
                            ->setCellValue('G'.$f, $row->getTipiPunimitArsyeja())
                            ->setCellValue('H'.$f, $row->getVezhgime());

                        $f++;
                    }
                    $phpExcelObject->getSheet(4)->setTitle('Punimi i Tokes');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(5)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Origjina e Ujit')
                        ->setCellValue('C1', 'Sistemi i Ujitjes')
                        ->setCellValue('D1', 'Cilesia e Ujit')
                        ->setCellValue('E1', 'Sasia e Ujit')
                        ->setCellValue('F1', 'Arsyeja e Ujitjes')
                        ->setCellValue('G1', 'Vezhgime');

                    $f=2;
                    foreach($ujitje as $row){
                        $phpExcelObject->getSheet(5)
                            ->setCellValue('A'.$f, date_format($row->getDataUjitjes(), 'Y-m-d'))
                            ->setCellValue('B'.$f, $row->getOrigjinaUjit())
                            ->setCellValue('C'.$f, $row->getSistemiUjitjes())
                            ->setCellValue('D'.$f, $row->getCilesiaUjit())
                            ->setCellValue('E'.$f, $row->getSasiaUjit())
                            ->setCellValue('F'.$f, $row->getArsyejaUjitjes())
                            ->setCellValue('G'.$f, $row->getVezhgime());

                        $f++;
                    }
                    $phpExcelObject->getSheet(5)->setTitle('Ujitje');

                    $phpExcelObject->createSheet();
                    $phpExcelObject->getSheet(6)
                        ->setCellValue('A1', 'Data')
                        ->setCellValue('B1', 'Lloji i Ullinjve')
                        ->setCellValue('C1', 'Menyra e Vjeljes')
                        ->setCellValue('D1', 'Cilesia e Vajit')
                        ->setCellValue('E1', 'Destinacioni')
                        ->setCellValue('F1', 'Prejardhja e Frutit')
                        ->setCellValue('G1', 'Rendimenti')
                        ->setCellValue('H1', 'Indeksi i Pjekjes')
                        ->setCellValue('I1', '% rendimenti yndyror')
                        ->setCellValue('J1', '% aciditeti')
                        ->setCellValue('K1', 'Vezhgime');

                    $f=2;
                    foreach($ujitje as $row){
                        $phpExcelObject->getSheet(6)
                            ->setCellValue('A'.$f, date_format($row->getDataVjeljes(), 'Y-m-d'))
                            ->setCellValue('B'.$f, $row->getLlojiUllinjve())
                            ->setCellValue('C'.$f, $row->getMenyraVjeljes())
                            ->setCellValue('D'.$f, $row->getCilesiaUjit())
                            ->setCellValue('E'.$f, $row->getVjeljaDestinacioni())
                            ->setCellValue('F'.$f, $row->getPrejardhjaFrutit())
                            ->setCellValue('G'.$f, $row->getRendimenti())
                            ->setCellValue('G'.$f, $row->getIndeksiPjekjes())
                            ->setCellValue('G'.$f, $row->getPerqindjeRendimentiYndyror())
                            ->setCellValue('G'.$f, $row->getPerqindjeAciditeti())
                            ->setCellValue('G'.$f, $row->getVezhgime());

                        $f++;
                    }
                    $phpExcelObject->getSheet(6)->setTitle('Vjelja');

                    $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
                    // create the response
                    $response = $this->get('phpexcel')->createStreamedResponse($writer);

                    // adding headers
                    $dispositionHeader = $response->headers->makeDisposition(
                        ResponseHeaderBag::DISPOSITION_ATTACHMENT,
                        'raport_nderhyrje.xls'
                    );
                    $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
                    $response->headers->set('Pragma', 'public');
                    $response->headers->set('Cache-Control', 'maxage=1');
                    $response->headers->set('Content-Disposition', $dispositionHeader);

                    return $response;
                }

            }
        }else{
         return $this->render('AiadBundle:Raporte:raport_nderhyrje.html.twig');
        }

    }

} 