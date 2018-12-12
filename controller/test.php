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
        $uni = new AnalyseUni(
            array(
                array(16, 2, 3), 
                array(12, 4, 5), 
                array(5, 6, 7),
                array(13, 4, 11),
            ),
            0
        );

        $this->view('test/analyse', array(
            'uni'    => $uni,
        ));
    }    
    public function board()
    {
        $this->view('board',array());
    }

    public function modelTest()
    {		
		$this->model('boardModel')->verif();
        //$this->view('boardModel/verif',array());
    }

    public function index()
    {
        $this->view('board',array());
    }
}