<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        
        $config['upload_path'] = "./public/uploads/";
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $this->load->library('upload', $config);
    }
    
    /*
     * inserts data to DB using CSV file 
     * 
     */
    public function importCsv()
    {
        
        $key = $this->input->post("key", true);
        $table_name = $this->getTableName($key);
        
        if (!$table_name) {
            $this->session->set_userdata("status", 0);
            $this->session->set_userdata("stat_msg", "<b>Error!</b> Something went wrong.");
            redirect($_SERVER["HTTP_REFERER"]);
            return;
        }
        
        $is_uploaded = $this->upload->do_upload("csv_file");
        if (!$is_uploaded) {
            $this->session->set_userdata("status", 0);
            $this->session->set_userdata("stat_msg", "<b>Error!</b> ".$this->upload->display_errors());
            redirect($_SERVER["HTTP_REFERER"]);
            return;
        }
        
        $file_info = $this->upload->data();
        $csv_file = $file_info["full_path"];
        $handle = fopen($csv_file, "r");
        
        if (!$handle) {
            $this->session->set_userdata("import_status", 0);
            $this->session->set_userdata("stat_msg", "<b>Error!</b> Error opening CSV file.");
            redirect($_SERVER["HTTP_REFERER"]);
        }
        
        $ctr = 0;
        $columns = array();
        while (($content = fgetcsv($handle)) !== false) {
            if ($ctr == 0) {
                $columns = $content;
                $ctr++;
                continue;
            }
            
            $data = array_combine($columns, $content);
            
            if(!$this->db->insert($table_name, $data)) {
                $this->session->set_userdata("import_status", 0);
                $this->session->set_userdata("stat_msg", "<b>Error!</b> ".$this->db->_error_message());
                fclose($handle);
                redirect($_SERVER["HTTP_REFERER"]);
                return;
            }
        }
        
        $this->session->set_userdata("import_status", 1);
        $this->session->set_userdata("stat_msg", "<b>Done!</b> Importing CSV file Successful.");
        fclose($handle);
        redirect($_SERVER["HTTP_REFERER"]);
    }
    
    private function getTableName($key)
    {
        switch ($key) {
            case "cl":
                return "tbl_company";
            case "co":
                return "tbl_contacts";
            case "w":
                return "tbl_work_cover";
            case "p":
                return "tbl_position";
            default:
                return false;
        }
    }
}

/* End of file excel_import.php */
/* Location: ./application/controllers/excel_import.php */