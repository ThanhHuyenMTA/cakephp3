<?php
	namespace App\Controller;

	use Cake\Core\Configure;
	use Cake\Network\Exception\ForbiddenException;
	use Cake\Network\Exception\NotFoundException;
	use Cake\View\Exception\MissingTemplateException;

	class ArticlesController extends AppController
	{
		public function initialize()
	    {
	        parent::initialize();
	        $this->Auth->allow();
	        $this->loadModel('Department');
	       
	       
	    }

		public function home()
		{ 
			$baidang = $this->Articles->find('all');	
			 $this->set('baidang', $this->paginate($baidang,['limit' => 4,
	        'order' => [
	            'Articles.id' => 'asc'
	        ]]));
		}

		public function view($id)
		{
			$this->request->data['id'] = $id; 
			$viewAr= $this->Articles->get($id);
			$this->set(compact('viewAr'));
			
			//propose comment
			if($this->loadModel('Comments')){
	            $id=$this->request->data['id']; 
	            $comments = $this->Comments->find('all',['conditions' => ['Comments.id_article' =>$id]])->contain(['Users']);
	            $this->set(compact('comments')); 
            }
        }

		public function articlesinmenu($id)
	    { 	
	    	 $query = $this->Articles->findalldl($id); //function is called in model
	    	 $this->set('query', $this->paginate($query,['limit' => 4,
            'order' => [
                'Articles.id' => 'asc'
            ]]));
	    }
	}
?>