<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    include_once __DIR__ . '/BaseModel.php';

    class Category extends BaseModel
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('product_category','category_id');

    }

    public function create($data)
    {
       $this->insert($data);
        $this->loadTable('product_category_lang');
        $last_id = $this->db->insert_id();
        $category_de=array(
            'category_id'=> $last_id,
            'name'=> $data['name_de'],
            'lang'=>'german'

        );
        $category=array(
            'category_id'=> $last_id,
            'name'=> $data['name'],
            'lang'=>'english'

        );
        //var_dump($category);die;
        $this->insert($category_de);
        $this->insert($category);
        return true;

    }

    public function save($data, $id)
    {
       $this->update($data, $id);
       $this->loadTable('product_category_lang', 'category_id');


        $location_de=array(
            'category_id'=>$category_id= $data['category_id'],
            'name'=> $name=$data['name_de'],
            'lang'=>'german'
        );
        $this->update($data, $id);
        return  $this->db->query("UPDATE product_category_lang  SET  name ='{$name}' where category_id='{$category_id}' and lang='german'");
       }

    public function delete($id)
    {
        return $this->remove($id);
    }

    public function getCategory()
    {
        $this->db->select('*');
        $this->db->from('product_category');
        $resultSet= $this->db->get ();
        return $resultSet->result();

    }

    public function getById($id)
    {

        return $this->findBy('category_id', $id);
   }
  public function getByLang($id){
            $this->db->select('product_category_lang.name');
            $this->db-> from ('product_category','product_category_lang');
            $this->db->join('product_category_lang','product_category.category_id = product_category_lang.category_id');
            $this->db->where('product_category.category_id',$id);
            $this->db->where('product_category_lang.lang','german');
            $resultSet = $this->db->get();
            return $resultSet->row();

        }


    }