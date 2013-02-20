<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/BaseModel.php';

class Company extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->loadTable('companies', 'company_id');

    }

    public function create($data)
    {
        $this->insert($data);

    }
    public function save($data, $id)
    {
        $this->update($data, $id);
    }

    public function getCompany()
    {
        $this->db->select('*');
        $this->db->from('companies');
        $this->db->join('users', 'users.id = companies.create_by');
        $resultSet= $this->db->get ();
        return $resultSet->result();

    }
    public function getById($id)
    {

        return $this->findBy('company_id', $id);
    }

    public function delete($id)
    {
        return $this->remove($id);
    }

}