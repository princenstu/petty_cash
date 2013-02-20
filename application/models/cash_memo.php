<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/BaseModel.php';

class Cash_memo extends BaseModel
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('cash_memo', 'memo_id');

    }
    public function getById($id)
    {
        return $this->findBy('company_id', $id);
    }

    public function create($data)
    {
        $this->insert($data);
    }

    public function save($data, $id)
    {
        $this->update($data, $id);
    }

    public function delete($id)
    {
        $this->remove($id);
    }

    public function getCompany()
    {
        $stSql = sprintf("select  projects.company_id, projects.name as project_name,companies.name from projects INNER JOIN companies on projects.company_id=companies.company_id group by companies.name");
        $query = $this->db->query($stSql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getProjectById(){

        $this->db->select('*');
        $this->db->from('projects');
        $resultSet = $this->db->get();
        return $resultSet->result();
    }
    public function getCompanyForProject(){

        $this->db->select('*');
        $this->db->from('companies');

        $resultSet = $this->db->get();
        return $resultSet->result();

    }

    public function getCashmemo()
    {

        $stSql = sprintf("SELECT
                            cash_memo.memo_id,
                            cash_memo.memo_no,
                            cash_memo.amount,
                            cash_memo.amount_in_words,
                            cash_memo.create_date,
                            cash_memo.disbursed_by,
                            cash_memo.received_by,
                            cash_memo.create_by,
                            groups.name as group_name,
                            users.username,
                            companies.name,
                            projects.name as project_name
                            FROM cash_memo
                            INNER
                              JOIN groups
                                ON groups.id = cash_memo.disbursed_by
                            INNER
                              JOIN users
                                ON users.id = cash_memo.received_by
                            INNER
                              JOIN companies
                                ON companies.company_id = cash_memo.company_id
                            INNER
                              JOIN projects
                                ON projects.project_id = cash_memo.project_id
                             GROUP
                                BY cash_memo.memo_id
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

    public function detail($id){

        $stSql = sprintf("SELECT
                            cash_memo.memo_id,
                            cash_memo.memo_no,
                            cash_memo.amount,
                            cash_memo.purpose,
                            cash_memo.amount_in_words,
                            cash_memo.create_date,
                            cash_memo.disbursed_by,
                            cash_memo.received_by,
                            cash_memo.create_by,
                            groups.name as group_name,
                            users.username,
                            companies.name,
                            projects.name as project_name
                            FROM cash_memo
                            INNER
                              JOIN groups
                                ON groups.id = cash_memo.disbursed_by
                            INNER
                              JOIN users
                                ON users.id = cash_memo.received_by
                            INNER
                              JOIN companies
                                ON companies.company_id = cash_memo.company_id
                            INNER
                              JOIN projects
                                ON projects.project_id = cash_memo.project_id
                             WHERE cash_memo.memo_id = '$id'");


        $query = $this->db->query($stSql);

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }


    }
    public function recordCount()
    {
        return $this->db->count_all("{$this->table}");
    }
    public function projectNameById($id)
    {
        $stSql = sprintf("SELECT project_id, name from projects where company_id='{$id}'");
        $query = $this->db->query($stSql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }

    public function cashMemoById($id)
    {

        return $this->findBy('memo_id', $id);

    }
    public function getRecive()
    {
        $stSql = sprintf("select * from users  ");
        $query = $this->db->query($stSql);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }

    }



}