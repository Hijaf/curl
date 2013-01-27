<?php
    class M_Curl extends CI_Model
    {
        public function inserer($dataForm)
        {
            $data = array(
                'titre' => $dataForm['titre'] ,
                'description' => $dataForm['description'] ,
                'image' => $dataForm['image'],
                'urlSite'=> $dataForm['urlSite'],
                'temps' => $dataForm['temps']
            );

            $this->db->insert('ci_curl', $data); 
        }
        
        public function lister()
        {
            $this->db->select('id, titre, description, image, urlSite, temps');
            $this->db->from('ci_curl');
            $this->db->order_by('id', "desc"); 
            
            $query = $this->db->get();
            return $query->result();
        }
        
        public function delete($id)
        {
            $this->db->delete('ci_curl', array('id' => $id)); 
        }
        
        public function recupererLigne($id)
        {
           $query = $this->db->get_where('ci_curl', array('id' => $id)); 
           return $query->row();
        }
        
        public function update($dataForm)
        {
            $data = array(
               'titre' => $dataForm['titre'],
               'description' => $dataForm['description']
            );

            $this->db->where('id', $dataForm['id']);
            $this->db->update('ci_curl', $data); 
        }
    }
