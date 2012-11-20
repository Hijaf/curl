<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curl extends CI_Controller {

	public function __construct()
        {
            parent::__construct();
            
            $this->load->model("M_Curl");
            $this->load->helper('form');
        }
        
	public function index($urlValid = 1)
        {
            $this->load->helper('date');
            
            $dataList['articles'] = $this->M_Curl->lister();
            $dataList['urlValid'] = $urlValid;
            
            $dataLayout['vue'] = $this->load->view('curl_form', $dataList, TRUE);
            $this->load->view('layout', $dataLayout);
	}
        
        public function ajouter()
        {
            $url = $this->input->post('url');
            
            $ch=curl_init();
            curl_setopt($ch,CURLOPT_HEADER, 0);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_FOLLOWLOCATION, 1);
            $html=curl_exec($ch);
            curl_close($ch);

            $dom = new DomDocument('1.0', 'UTF-8');
            @$dom->loadHTML($html);

            if($html)
            {
                //titre
                $nodes = $dom->getElementsByTagName("title");
                $dataList['titre'] = $nodes->item(0)->nodeValue;

                //meta
                $nodes = $dom->getElementsByTagName("meta");
                foreach($nodes as $node)
                {
                    if(strtolower($node->getAttribute("name"))=="description")
                    {  
                        $dataList['description'] = $node->getAttribute("content");
                    }
                }
                if(!isset($dataList['description']))
                {
                    $dataList['description'] = "Pas de description pour ".$dataList['titre'];
                }

                //img
                $nodes = $dom->getElementsByTagName("img");
                foreach($nodes as $key=>$img)
                {
                    $dataList['imgs'][$key] = $img->getAttribute('src');
                    if(!strstr($url, "http://"))
                    {
                        $url = prep_url($url);
                    }
                    $this->rel2abs();
                    if(!strstr($dataList['imgs'][$key], "http://"))
                    {
                        if($dataList['imgs'][$key][0]!=="/")
                        {
                            $dataList['imgs'][$key] = $url."/".$dataList['imgs'][$key];
                        }
                        else
                        {
                            $dataList['imgs'][$key] = $url.$dataList['imgs'][$key];
                        }
                    }
                    else
                    {
                        $dataList['imgs'][$key] = $img->getAttribute('src');
                    }
                }
                
                $dataLayout['vue'] = $this->load->view('curl_choisir', $dataList, TRUE);
                $this->load->view('layout', $dataLayout);
            }
            else
            {
                //test si html renvoyé est invalide
                redirect('curl/index/0');
            }  
        }
        
        public function choisir()
        {           
            $dataForm = array( 
                'titre'=> $this->input->post('titre'),
                'description'=> $this->input->post('description'), 
                'image'=> $this->input->post('image'), 
                'temps'=> time()
            );
            
            $this->M_Curl->inserer($dataForm);
            
            redirect('');
        }
        
        public function supprimer($id)
        {
            $this->M_Curl->delete($id);
            
            if(!$this->input->is_ajax_request())
            {
                redirect('');
            }
        } 
        
        public function modifier($id)
        {
            
            $dataList['art'] = $this->M_Curl->recupererLigne($id);
            
            $dataLayout['vue'] = $this->load->view('curl_modif', $dataList, TRUE);
            $this->load->view('layout', $dataLayout);
        }
        
        public function maj()
        {
            $titre = $this->input->post('titre');
            $description = $this->input->post('description');
            $id = $this->input->post('id');
            $dataForm = array( 'titre'=> $titre,'description'=> $description, 'id'=>$id);
            $this->M_Curl->update($dataForm);
            
            if(!$this->input->is_ajax_request())
            {
               redirect('');   
            }
        }
        
        private function rel2abs()
        {
            
        }
}

/* End of file curl.php */
/* Location: ./application/controllers/curl.php */