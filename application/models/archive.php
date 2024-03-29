<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/BaseModel.php';

class Archive extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->loadTable('archives', 'archive_id');

    }

    public function create($data)
    {
       // var_dump($data);die;
        $this->insert($data);

    }

    public function getArchive()
    {$stSql = sprintf("SELECT
                      archives.memo_no,
                      archives.memo_id,
                      archives.amount,
                      archives.amount_in_words,
                      archives.purpose,
                      archives.memo_no,
                      archives.create_date,
                      companies.name as company_name,
                      projects.name as project_name,
                      groups.name,
                      users.username
                       from archives
                       INNER
                          JOIN users
                          ON users.id=archives.received_by
                          INNER
                            JOIN groups
                           ON  groups.id=archives.disburesed_by
                           INNER
                            JOIN companies
                           ON  companies.company_id=archives.company_id
                           INNER
                            JOIN projects
                           ON  projects.project_id=archives.project_id


                            ");


        $query = $this->db->query($stSql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    public function getCashmemoById($id)
    {
        $this->db->select('*, projects.name as project_name, companies.name as company_name,
                            received.first_name as received_first_name, disbursed.first_name as disbursed_first_name,
                             received.last_name as received_last_name, disbursed.last_name as disbursed_last_name');
        $this->db->from('cash_memo');
        $this->db->join('companies', 'companies.company_id = cash_memo.company_id');
        $this->db->join('projects', 'projects.project_id = cash_memo.project_id');
        $this->db->join('users', 'users.id = cash_memo.create_by');
        $this->db->join('meta as received', 'received.user_id = cash_memo.received_by');
        $this->db->join('meta as disbursed', 'disbursed.user_id = cash_memo.disbursed_by');
        $this->db->where('memo_id',$id);
        $resultSet= $this->db->get ();
        return $resultSet->row();
    }
    public function getDisbursedBy()
    {
        $this->db->select('*');
        $this->db->from('groups');
        $this->db->where_IN('id',array( 1, 2));
        $resultSet= $this->db->get ();
        return $resultSet->result();
    }
    public function getReceivedBy()
    {
        $this->db->select('*');
        $this->db->from('users');
        $resultSet= $this->db->get ();
        return $resultSet->result();
    }
    public function getById($id)
    {

        return $this->findBy('memo_id', $id);
    }

    public function delete($id)
    {
        $this->loadTable('cash_memo', 'memo_id');
        return $this->remove($id);
    }

    function get_unique_states() {
        $query = $this->db->query("SELECT DISTINCT projects.company_id, projects.project_id, projects.name as project_name, companies.name as company_name  FROM projects INNER JOIN companies ON companies.company_id = projects.company_id");

        if ($query->num_rows > 0) {
            return $query->result();
        }
    }

    /**
     * This function will take the state as argument
     * and then return the cities which fall under that particular state.
     */
    function get_project_from_company($state) {
        $query = $this->db->query("SELECT project_id, name FROM projects WHERE company_id = '{$state}'");

        if ($query->num_rows > 0) {
            return $query->result();
        }
    }

    public function save($data,$id)
    {

        $this->loadTable('cash_memo', 'memo_id');

        $data1=array(
            'memo_id'=>$data->memo_id,
            'memo_no'=>$data->memo_no,
            'amount'=>$data->amount,
            'purpose'=>$data->purpose,
            'project_id'=>$data->project_id,
            'amount_in_words'=>$data->amount_in_words,
            'disbursed_by'=>$data->disburesed_by,
            'received_by'=>$data->received_by,
            'create_by'=>$this->session->userdata('user_id'),
            'company_id'=>$data->company_id
        );
        $this->insert($data1,$id);
    }

    public function getUnarchive($id)
    {
        $stSql = sprintf("SELECT
                            archives.memo_id,
                            archives.memo_no,
                            archives.amount,
                            archives.purpose,
                            archives.project_id,
                            archives.amount_in_words,
                            archives.create_date,
                            archives.disburesed_by,
                            archives.received_by,
                            archives.company_id,
                            groups.name as group_name,
                            users.username,
                            companies.name,
                            projects.name as project_name
                            FROM archives
                            INNER
                              JOIN groups
                                ON groups.id = archives.disburesed_by
                            INNER
                              JOIN users
                                ON users.id = archives.received_by
                            INNER
                              JOIN companies
                                ON companies.company_id = archives.company_id
                            INNER
                              JOIN projects
                                ON projects.project_id = archives.project_id
                             WHERE archives.memo_id = '$id'");


       $query = $this->db->query($stSql);
       // echo $stSql;die;
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

}