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

    public function getReport()
    {

    }


    function memoList($action = 'count', $per_page = 0, $start = 0, $order_field = FALSE, $order = 'ASC')
    {
        $field = ($this->input->post('field'))?$this->input->post('field'):'any';
        $value = trim(($this->input->post('value'))?$this->input->post('value'):'');
        $arr_field_item = array('companies.name'=>'company_name','projects.name'=>'project_name');
//
        $filter_field = 'companies.company_id';
        $filter_value = ($this->input->post('filter_value'))?$this->input->post('filter_value'):'any';

        $filter_field1 = 'projects.project_id';
        $filter_value1 = ($this->input->post('filter_value1'))?$this->input->post('filter_value1'):'any';

        $filter_field2 = 'groups.id';
        $filter_value2 = ($this->input->post('filter_value2'))?$this->input->post('filter_value2'):'any';

        $filter_field3 = 'users.id';
        $filter_value3 = ($this->input->post('filter_value3'))?$this->input->post('filter_value3'):'any';

        $arr_order_field_item = array(
            'cash_memo.memo_id'=>'memo_id',
            'cash_memo.memo_no'=>'memo_no',
            'companies.name'=>'name',
            'project_name'=>'project_name',
            'group_name'=>'group_name',
            'users.username'=>'username',
            'cash_memo.amount'=>'amount',
            'cash_memo.create_date'=>'create_date',
        );

        //mandatory where string
        $str_where = "cash_memo.memo_id != '0' ";
        //other string during search
        $str_like = '';$str_filter = '';

        if(strtolower($filter_value) != 'any'){
            $str_filter .= " AND ".$filter_field." = '".$filter_value."'";
        }
        if(strtolower($filter_value1) != 'any'){
            $str_filter .= " AND ".$filter_field1." = '".$filter_value1."'";
        }
        if(strtolower($filter_value2) != 'any'){
            $str_filter .= " AND ".$filter_field2." = '".$filter_value2."'";
        }
        if(strtolower($filter_value3) != 'any'){
            $str_filter .= " AND ".$filter_field3." = '".$filter_value3."'";
        }

        $value = $this->db->escape_like_str($value);
        if($value!='')
        {
            if($field!='any')
            {
                foreach($arr_field_item as $dbfnm => $fnm)
                {
                    if($field == $fnm){
                        $str_like .= " AND ".$dbfnm." LIKE '%".$value."%'";
                    }
                }
            }
            else
           {
                $arr_value = explode(" ",$value);
                $i = 0;
                foreach($arr_value as $v)
                {
                    foreach($arr_field_item as $dbfnm => $fnm)
                    {
                        if($i){
                            $str_like .= " OR ".$dbfnm." LIKE '%".$v."%'";
                        }else{
                            $str_like .= " AND ( ".$dbfnm." LIKE '%".$v."%'";
                        }
                        $i++;
                    }
                }
                $str_like .= ")";
            }
        }

        //full where
        $this->db->where($str_where.$str_like.$str_filter);
        //order
        if($order_field){
            foreach($arr_order_field_item as $dbofnm => $ofnm)
            {
                if($order_field == $ofnm){
                    $this->db->order_by($dbofnm, $order);
                }
            }
        }
        //query count
        if($action!='count'){
            $this->db->limit($per_page, $start);
        }

        $this->db->select("cash_memo.memo_id,
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
                            projects.name as project_name");
        $this->db->from('cash_memo');
        $this->db->join('groups', 'groups.id = cash_memo.disbursed_by');
        $this->db->join('users', 'users.id = cash_memo.received_by');
        $this->db->join('companies', 'companies.company_id = cash_memo.company_id');
        $this->db->join('projects', 'projects.project_id = cash_memo.project_id');
        $this->db->order_by('cash_memo.memo_id');

        $query = $this->db->get();
        if($action=='count')
            return $query->num_rows();
        else
            return $query->result();
    }


     function order_work($url,$order_field,$order_no,$page_no)
    {
        $page_no = ($this->uri->segment($page_no))?'/'.$this->uri->segment($page_no):'';
        $x = explode("/",$url);
        if(isset($x[$order_no-1])){
            $x[$order_no-1] = $order_field;
        }

        if($x[$order_no]=='asc'){
            $x[$order_no] = 'desc';
            return implode("/",$x).$page_no;
        }
        else{
            $x[$order_no] = 'asc';
            return implode("/",$x).$page_no;
        }
    }





}