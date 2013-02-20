<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/BaseModel.php';

class Project extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->loadTable('projects', 'project_id');

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
        $resultSet= $this->db->get ();
        return $resultSet->result();

    }
    public function getProject()
    {
        $this->db->select('*, projects.name as project_name, companies.name as company_name');
        $this->db->from('projects');
        $this->db->join('users', 'users.id = projects.create_by');
        $this->db->join('companies', 'companies.company_id = projects.company_id');
        $resultSet= $this->db->get ();
        return $resultSet->result();

    }
    public function getById($id)
    {

        return $this->findBy('project_id', $id);
    }

    public function delete($id)
    {
        return $this->remove($id);
    }

}