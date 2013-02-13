<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/BaseModel.php';

class Product extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->loadTable('products', 'product_id');

    }

    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('status !=', 'deleted');

        $resultSet = $this->db->get();
        return $resultSet->result();
    }

    public function getById($id)
    {
        return $this->findBy('product_id', $id);
    }

    public function create($data)
    {
        $this->insert($data);

        $this->loadTable('products_lang', 'product_info_id');

        $last_id = $this->db->insert_id();
        $data_lang = array(
            'product_info_id'=>$last_id,
            'title'=>$data['title_de'],
            'description'=>$data['description_de'],
            'lang'=>'german',

                );

        $data['product_info_id']=$last_id;
        $data['lang']='english';

        $this->insert($data_lang);
        $this->insert($data);
    }

    public function save($data, $id)
    {

        $this->update($data, $id);
        $this->loadTable('products_lang', 'product_info_id');


        $data_lang = array(
            'product_info_id'=> $product_id = $data['product_id'],
            'title'=> $title_de = $data['title_de'],
            'description'=> $description_de = $data['description_de'],
            'lang'=>'german'
        );

        $this->update($data, $id);
    return  $this->db->query("UPDATE products_lang  SET  title='{$title_de}',description ='{$description_de}' where product_info_id='{$product_id}' and lang='german'");

    }

    public function delete($data, $id)
    {
          $this->update($data, $id);
    }

    public function getCategory()
    {
        $this->db->select('*');
        $this->db->from('product_category');

        $resultSet = $this->db->get();
        return $resultSet->result();
    }

    public function recordCount()
    {
        return $this->db->count_all("{$this->table}");
    }

    public function fetchRows($per_page, $limit)
    {
        $stSql = sprintf("SELECT * FROM products WHERE status != 'deleted' LIMIT %d,%d", $limit, $per_page);

        $query = $this->db->query($stSql);

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getProductInfo($products, $day)
    {
        if (empty($products) AND (empty($day))) {
            return false;
        }

        $productList = implode(",", array_values($products));

        $sql = "SELECT *
                FROM products
                WHERE product_id IN ($productList)";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            $result = $query->result_array();

            foreach ($result AS $key => $value) {
                if ($day > 7) {
                    $result[$key]['price'] = $value["price_7"] + ($day - 7) * $value['price_increment'];
                } else {
                    $result[$key]['price'] = $value["price_$day"];
                }
            }

            return $result;

        } else {

            return array();

        }
    }

 public function getProductInfoLang($products, $day,$lang)
    {
        if (empty($products) AND (empty($day))) {
            return false;
        }

        $productList = implode(",", array_values($products));

        $sql = "SELECT *,  p_lang.title as product_title, p_lang.description as product_description
                FROM products
                LEFT JOIN products_lang p_lang ON products.product_id = p_lang.product_info_id
                WHERE product_id IN ($productList) and p_lang.lang= '$lang'";

        $query = $this->db->query($sql);

        if ($query->num_rows() > 0) {

            $result = $query->result_array();

            foreach ($result AS $key => $value) {
                if ($day > 7) {
                    $result[$key]['price'] = $value["price_7"] + ($day - 7) * $value['price_increment'];
                } else {
                    $result[$key]['price'] = $value["price_$day"];
                }
            }

            return $result;

        } else {

            return array();

        }
    }


    public function getProductsByCategory()
    {
        $sql = "SELECT p.*, c.name AS category_name, c.image AS category_image
                FROM products p
                LEFT JOIN product_category c ON p.category_id = c.category_id
                WHERE p.status <> 'deleted'
                ORDER BY category_name, price_1";

        $result = $this->db->query($sql)->result_array();
        $products = array();

        foreach ($result as $row) {
            $products[$row['category_name']][] = $row;
        }

        return $products;
    }
    public function getProductsByCategoryLang($lang)
    {
        $sql = "SELECT p.*, p_lang.title, p_lang.description, c_lang.name AS cate_name, c.name AS category_name, c.image AS category_image
                FROM products p
                LEFT JOIN product_category c ON p.category_id = c.category_id
                LEFT JOIN product_category_lang c_lang ON p.category_id = c_lang.category_id
                LEFT JOIN products_lang p_lang ON p.product_id = p_lang.product_info_id
                WHERE p.status <> 'deleted' and c_lang.lang='$lang' and p_lang.lang='$lang'
                ORDER BY category_name, price_1";

        $result = $this->db->query($sql)->result_array();
        $products = array();

        foreach ($result as $row) {
            $products[$row['category_name']][] = $row;
        }

        return $products;
    }

    public function getLangByID($id)
    {
        $this->db->select('products_lang.title,products_lang.description,products_lang.product_info_id');
        $this->db->from('products_lang','products');
        $this->db->join('products', 'products.product_id = products_lang.product_info_id');
        $this->db->where('products_lang.lang =','german');
        $this->db->where('products_lang.product_info_id =',$id);
        $result = $this->db->get();
        return $result->row();
    }

}