<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curl extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $this->load->helper('form');
           
            $dataLayout['titre'] = 'CURL - Recupération URL';
         
            $this->lister();
            
	}
        
        public function ajouter()
        {
            $this->load->helper('form');
            $url = $this->input->post('url');
            
            $ch=curl_init();
            curl_setopt($ch,CURLOPT_HEADER, 0);
            curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_FOLLOWLOCATION, 1);
            $html=curl_exec($ch);
            curl_close($ch);

            $dom = new DomDocument();
            @$dom->loadHTML($html);
            
            //titre
            $nodes = $dom->getElementsByTagName("title");
            $dataList['titre'] = $nodes->item(0)->nodeValue;
            
            //meta
            $nodes = $dom->getElementsByTagName("meta");
            foreach($nodes as $node)
            {
                if(strtolower($node->getAttribute("name"))=="description")
                {
                    $plein = $node->getAttribute("content");
                    if($plein)
                    {
                        $dataList['description'] = $plein;
                    }
                    else
                    {
                        $dataList['description'] = $dataList['titre'];
                    }   
                }
            }
            
            //img
            $nodes = $dom->getElementsByTagName("img");
            foreach($nodes as $key=>$img)
            {
                $dataList['imgs'][$key] = $img->getAttribute('src');
            }
            
            
            $dataLayout['vue'] = $this->load->view('curl_choisir', $dataList, TRUE);
            $this->load->view('layout', $dataLayout);
        }
        
        public function lister()
        {
            $this->load->helper('form');
            $this->load->model("M_Curl");
            
            $dataList['articles'] = $this->M_Curl->lister();
            
            $dataLayout['vue'] = $this->load->view('curl_form', $dataList, TRUE);
            $this->load->view('layout', $dataLayout);
        }
        
        public function choisir()
        {
            $titre = $this->input->post('titre');
            $description = $this->input->post('description');
            $image = $this->input->post('image');
            $this->load->model("M_Curl");
            
            $dataForm = array( 'titre'=> $titre,'description'=> $description, 'image'=> $image);
            
            $this->M_Curl->inserer($dataForm);
            
            redirect('');
        }
        
        public function supprimer()
        {
            $this->load->helper('form');
            $this->load->model("M_Curl");
            $id = $this->uri->segment(3);
            
            $this->M_Curl->delete($id);
            redirect('');
        }     
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */