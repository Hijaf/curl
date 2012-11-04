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
           

            if(isset($urlValid))
            {
                $urlValid = $urlValid;
            }
            else
            {
                $urlValid=false;
            }
            $this->lister($urlValid);
            
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
                $urlValid=true;
                $dataLayout['vue'] = $this->load->view('curl_choisir', $dataList, TRUE);
                $this->load->view('layout', $dataLayout);
            }
            else
            {
                //test si html renvoyé est invalide
                $urlValid=false;
                $this->lister($urlValid);
                redirect('');
            }  
        }
        
        public function lister($urlValid)
        {
            $this->load->helper('form');
            $this->load->helper('date');
            $this->load->model("M_Curl");
            
            $dataList['articles'] = $this->M_Curl->lister();
            $dataList['urlValid'] = $urlValid;
            
            $dataLayout['vue'] = $this->load->view('curl_form', $dataList, TRUE);
            $this->load->view('layout', $dataLayout);
        }
        
        public function choisir()
        {
            $titre = $this->input->post('titre');
            $description = $this->input->post('description');
            $image = $this->input->post('image');
            $time = time();
            $this->load->model("M_Curl");
            
            $dataForm = array( 'titre'=> $titre,'description'=> $description, 'image'=> $image, 'temps'=>$time);
            
            $this->M_Curl->inserer($dataForm);
            
            redirect('');
        }
        
        public function supprimer()
        {
            $this->load->helper('form');
            $this->load->model("M_Curl");
            $id = $this->uri->segment(3);
            if($this->input->is_ajax_request())
            {
                $this->M_Curl->delete($id);
            }
            else
            {
                $this->M_Curl->delete($id);
                redirect('');
            }
        } 
        
        public function modifier()
        {
            $this->load->helper('form');
            $this->load->model("M_Curl");
            $id = $this->uri->segment(3);
            
            $dataList['art'] = $this->M_Curl->recupererLigne($id);
            
            $dataLayout['vue'] = $this->load->view('curl_modif', $dataList, TRUE);
            $this->load->view('layout', $dataLayout);
        }
        
        public function maj()
        {
            $this->load->helper('form');
            $this->load->model('M_Curl');
            
            if($this->input->is_ajax_request())
            {
               $titre = $this->input->post('titre');
               $description = $this->input->post('description');
               $id = $this->input->post('id');
               $dataForm = array( 'titre'=> $titre,'description'=> $description, 'id'=>$id);
               $this->M_Curl->update($dataForm);
            }
            else
            {
               $titre = $this->input->post('titre');
               $description = $this->input->post('description');
               $id = $this->input->post('id');
               $dataForm = array( 'titre'=> $titre,'description'=> $description, 'id'=>$id);
               $this->M_Curl->update($dataForm);

               redirect('');   
            }
        }
}

/* End of file curl.php */
/* Location: ./application/controllers/curl.php */