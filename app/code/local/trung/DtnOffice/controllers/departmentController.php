<?php

class trung_DtnOffice_departmentController extends Mage_Core_Controller_Front_Action
{
    // dùng collection class load toàn bộ deparment trong database và hiển thị dưới dạng table html.
    public function indexAction()
    {
        $department = Mage::getModel("DtnOffice/department")->getCollection();
        // load Bootstrap
        echo "<link rel='stylesheet' type='text/css' href='http://127.0.0.1:8686/css/bootstrap.min.css'>";
        echo "<center><h2 class='m-3'>Department Management</h2></center>";
        // table display department
        echo "<table class='table table-stripe table-hover table-bordered col-6 mx-auto'>";
        echo "<thead style='text-align: center' class='thead-dark'>";
        echo "<th>ID</th>";
        echo "<th>Department Name</th>";
        echo "<th>Action</th>";
        echo "</thead>";
        echo "<tbody style='text-align: center'>";
        // load each element one by one
        foreach ($department as $value) {
            echo "<tr>";
            echo "<td>" . $value->getId() . "</td>";
            echo "<td>" . $value->getName() . "</td>";
            echo "<td><a href='http://127.0.0.1:8686/magento/dtn/department/update/id/" . $value->getId() . "'>Edit</a> || <a href='http://127.0.0.1:8686/magento/dtn/department/delete/id/" . $value->getId() . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        // link create a department
        echo "<center><a href='" . mage::getUrl('dtn/department/create') . "' class='btn btn-primary'>Add Department</a></center>";
        echo "</tbody>";
    }

    // tạo mới 1 department
    public function createAction()
    {
        //add Bootstrap
        echo "<link rel='stylesheet' type='text/css' href='http://127.0.0.1:8686/css/bootstrap.min.css'>";
        echo "<div class='jumbotron col-5' style='position:absolute;top:50%;left: 50%;
transform: translate(-50%,-50%); '>";
        echo "<center><h2 class='mb-5'>Add Department</h2></center>";
        // form add a department
        echo "<form method='post'>";
        echo "<div class='form-group'>";
        echo "Department Name: <input type='text' name='dpmname' class='form-control' placeholder='Enter Department Name...' required>";
        echo "</div>";
        echo "<center><input type='submit' class='btn btn-success' name='add' value='Add Department'></center>";
        echo "</form>";
        echo "</div>";
        // handle create a department
        if (isset($_POST['add'])) {
            $add = mage::getModel('DtnOffice/department');
            $dpmnmae = $_POST['dpmname'];
            $add->setName($dpmnmae);
            $add->save();
            $this->_redirect('dtn/department/index');
        }

    }

    //lấy thông tin 1 department theo ID. Cần check sự tồn tại của department.
    public function getAction()
    {
        // get parameter on url
        $params = $this->getRequest()->getParams('id');
        //load bootstrap
        echo "<link rel='stylesheet' type='text/css' href='http://127.0.0.1:8686/css/bootstrap.min.css'>";
        $get_element = mage::getModel('DtnOffice/department')->load($params);
        echo "<div class='jumbotron col-5' style='position:absolute;top:50%;left: 50%;
transform: translate(-50%,-50%); '>";
        //Check id exist
        if (mage::getModel('DtnOffice/department')->load($params)->getId()) {
            echo "<center><h3 class='mb-5'>LOAD INFO WITH ID =" . $get_element->getId() . "</h3></center>";
            echo "ID: " . $get_element->getId();
            echo "</br>";
            echo "Department Name: " . $get_element->getName();
        } else {
            echo "Id not exist !!!";
        }
        echo "</div>";
    }

    //update thông tin 1 departement theo ID. Cần check sự tồn tại của department.
    public function updateAction()
    {
        // get parameter on url
         $params = $this->getRequest()->getParams();
         $department_id = (int) $params['id'];
         echo "<link rel='stylesheet' type='text/css' href='http://127.0.0.1:8686/css/bootstrap.min.css'>";
        $element_need_edit= Mage::getModel('DtnOffice/department')->load($department_id);
        echo "<div class='jumbotron col-5' style='position:absolute;top:50%;left: 50%;
transform: translate(-50%,-50%); '>";
        echo "<center><h2 class='mb-5'>Edit Department</h2></center>";
        // form edit a department
        echo "<form method='post'>";
        echo "<div class='form-group'>";
        echo "Department Name: <input type='text' name='dpmname' class='form-control' value='".$element_need_edit->getName()."'>";
        echo "</div>";
        echo "<center><input type='submit' class='btn btn-success' name='edit' value='Edit Department'></center>";
        echo "</form>";
        echo "</div>";
        // handle edit a department
        if (isset($_POST['edit'])) {
            $dpmnmae = $_POST['dpmname'];
            $element_need_edit->setName($dpmnmae);
            $element_need_edit->save();
            $this->_redirect('dtn/department');
        }
    }

    public function deleteAction()
    {
    // get parameter on url
        $params = $this->getRequest()->getParams('id');
        //load bootstrap
        echo "<link rel='stylesheet' type='text/css' href='http://127.0.0.1:8686/css/bootstrap.min.css'>";
        $get_element = mage::getModel('DtnOffice/department')->load($params);
        echo "<div class='jumbotron col-5' style='position:absolute;top:50%;left: 50%;
transform: translate(-50%,-50%); '>";
        //Check id exist
        if (mage::getModel('DtnOffice/department')->load($params)->getId()) {
            $get_element->delete();
            $this->_redirect('dtn/department/index');
        } else {
            echo "Id not exist !!!";
        }
        echo "</div>";
    }
}
