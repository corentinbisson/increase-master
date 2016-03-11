<?php

class IndexController extends ControllerBase
{
	public function initialize(){
		$this->view->setVar("jquery",$this->jquery->genCDNs());
	}

    public function indexAction()
    {
		$jquery = $this->jquery;
		$jquery->compile($this->view);
    }

    public function usecasesAction(){
    	$usecases=Usecase::find();
    	foreach ($usecases as $usecase){
    		echo $usecase->getNom()." ".$usecase->getDeveloppeur()->getIdentite()."<br>";
    	}
    }

    public function autreAction(){
    	$ids = $this->modelsManager->createBuilder()->columns('idProjet')
    	->from('Usecase')
    	->groupBy('Usecase.idProjet')
    	->where("idDev=5")
    	->getQuery()
    	->execute();
        	foreach ($ids as $id){
    		echo $id->idProjet."<br>";
    	}
    }

}

