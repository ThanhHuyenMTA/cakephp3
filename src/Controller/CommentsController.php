<?php
	namespace App\Controller;
	use Cake\Core\Configure;
	use Cake\Network\Exception\ForbiddenException;
	use Cake\Network\Exception\NotFoundException;
	use Cake\View\Exception\MissingTemplateException;

	class CommentsController extends AppController
	{
		public function initialize()
	    {
	         parent::initialize();
	         $this->Auth->allow();
	    }
       // didn't use 
	    public function loadcomment($id)
	    {
	    	$cm = $this->Comments->find('all',['conditions' => ['Comments.id_article' =>$id]]);   
	    	$this->set(compact('cm'));
	    } 
        //end

        public function  addcomment($id)
	    {
	    	//call session
	    	$Sessionname= $this->request->session()->read('Auth.User.username');
	    	//pr($Sessionname);die();
	    	if($Sessionname){
	    		 // $article = $this->Users->get($id);
	    		$id_article=$this->Articles->get($id) ;
	    		pr($id_article);die();
	    		$this->request->data['id-article']=$id_article;
	    		$id_user=$this->request->session()->read('Auth.User.id'); 
	    		$this->request->data['id-user']=$id_user;
	    		
				$comment  = $this->Comments->newEntity($this->request->data);
				if ($this->request->is('post')) {
		            if($comment->errors()){
		            	$this->Flash->error(__('Unable to add your comment.'));
		        }else{
		            	if ($this->Comments->save($comment)) {
			                return $this->redirect(['action' => '../Articles/view/1']);
		                }      
		            }
		        }
		        $this->set('comment', $comment);  
	    	}else{
	    		return $this->redirect(['action' => '../users/login']);
	    	}
     	}	
	}
?>


