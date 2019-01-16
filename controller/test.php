<?php
/**
 * Controller pour effectuer des tests
 * 
 * @author Adrien Lafage
 */
class test extends Controller
{
    public function chart()
    {
        $this->view('test/chart',array());
    }

    public function map()
    {
        $this->view('test/map', array());
    }

    public function analyse()
    {
        /*
        $data = array(
            array(16, 2, 4), 
            array(12, 4, 8), 
            array(5, 8, 16),
            array(13, 9, 15),
        );

        $uni = new AnalyseUni(
            $data,
            2
        );

        $biv = new AnaQuanQuan(
            $data,
            0,
            2
        );

        $quanqual = new AnaQualQuan(
            array(
                array('homme',280),
                array('femme',163),
                array('homme',275),
                array('femme',168),
                array('homme',290),
                array('femme',180),
                array('homme',278),
                array('femme',170),
                array('homme',284),
                array('femme',172),
            ),
            0,
            1
        );
        */

        $ca = $this->model('analyseModel')->univar('CA', 'commandes');

        if ($ca == null) {
            $ca = array(array('FAIL'));
        }else{
            $uni = new AnalyseUni($ca, 0);
        }

        $fam_ca = $this->model('analyseModel')->bivar('codeFamille', 'CA', 'commandes');

        if ($fam_ca == null) {
            $fam_ca = array(array('FAIL'));
        }else{
            $qua = new AnaQualQuan($fam_ca, 0, 1);
        }

        $this->view('test/analyse', array(
            /*
            'uni'    => $uni,
            'biv'    => $biv,
            'qua'    => $quanqual
            */
            'test' => $fam_ca,
            'uni'  => $uni,
            'qua'  => $qua
        ));
    }    
    public function board()
    {
        $famille = $this->model('boardModel')->famille();
        $sousFamille = $this->model('boardModel')->sousFamille();
        $clientN = $this->model('boardModel')->clientAnneeN("2017");
        $clientN1 = $this->model('boardModel')->clientAnneeN("2016");
        $margeCATotalN = $this->model('boardModel')->margeCATotal("2017");
        $margeCATotalN1 = $this->model('boardModel')->margeCATotal("2016");
        $this->view('board',array(
            'famille' => $famille,
            'sousFamille' => $sousFamille,
            'clientN' => $clientN,
            'clientN1' => $clientN1,
            'margeCATotalN'=> $margeCATotalN,
            'margeCATotalN1'=> $margeCATotalN1

        ));
    }

    public function majDataGraph()
    {  
		$this->model('boardModel')->dataGraph();
        //$this->view('boardModel/verif',array());
    }

    public function majGeo()
    {  
		$this->model('boardModel')->dataGeo();
        //$this->view('boardModel/verif',array());
    }

    public function maths()
    {  
        $dataset1 = $this->model('analyseModel')->bivar('codeFamille', 'CA', 'commandes');
        //$dataset2 = $this->model('analyseModel')->bivar('codeFamille', 'marge', 'commandes');
        //$dataset3 = $this->model('analyseModel')->bivar('codeSousFamille', 'CA', 'commandes');
        //$dataset4 = $this->model('analyseModel')->bivar('codeSousFamille', 'marge', 'commandes');
        //$dataset5 = $this->model('analyseModel')->bivar('CA', 'marge', 'commandes');
        //$dataset6 = $this->model('analyseModel')->univar('CA', 'commandes');
        //$dataset7 = $this->model('analyseModel')->univar('CA', 'commandes');

        $A_biv1 = new AnaQualQuan(
            $dataset1,
            0,
            1
        );
        /*
        $A_biv2 = new AnalyseQualQuan(
            $dataset2,
            0,
            1
        );

        $A_biv5 = new AnalyseQuanQuan(
            $dataset5,
            0,
            1
        );

        $A_uni1 = new AnalyseUni(
            $dataset6,
            0
        );

        $A_uni2 = new AnalyseUni(
            $dataset7,
            0
        );
        */
        $this->view('board',array(
            'correlFaCA'=> $A_biv1->getRpcorrel(),
            //'correlFama'=> $A_biv2->getRpcorrel(),
            //'correlSFaCA'=> $A_biv3->getRpcorrel(),
            //'correlSFama'=> $A_biv4->getRpcorrel(),
            //'correlCama'=> $A_biv5->getPearson(),
            //'averageCa'=> $A_uni1->getAverage(),
            //'medianCa'=> $A_uni1->getMedian(),
            //'averageMa'=> $A_uni2->getAverage(),
            //'medianMa'=> $A_uni2->getMedian()
        ));
    }

    public function majFamilleSousFam()
    {  
		$this->model('boardModel')->familleSousFam();
        //$this->view('boardModel/verif',array());
    }

    public function modelFamille()
    {		
		$this->model('boardModel')->famille();
        //$this->view('boardModel/verif',array());
    }

    public function index()
    {
        $this->view('board',array());
    }
}