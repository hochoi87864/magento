<?php

class trung_DtnOffice_departmentController extends Mage_Core_Controller_Front_Action
{
    public function indexAction(){
        // test	/dtn_office/department/: dùng collection class load toàn bộ deparment trong database và hiển thị dưới dạng table html.
        /*$department = Mage::getModel("DtnOffice/department")->getCollection();
        echo "<link <link rel='stylesheet' type='text/css' href='http://127.0.0.1:8686/css/bootstrap.min.css'>";
        echo "<center class='mt-5'><h2>Department Management</h2></center>";
        echo "<table class='table table-stripe table-hover table-bordered col-6 mt-5 mx-auto'>";
        echo "<thead style='text-align: center' class='thead-dark'>";
        echo "<th>ID</th>";
        echo "<th>Department Name</th>";
        echo "<th>Action</th>";
        echo "</thead>";
        echo "<tbody style='text-align: center'>";
        foreach ($department as $value){
            echo "<tr>";
            echo "<td>".$value->id."</td>";
            echo "<td>".$value->name."</td>";
            echo "<td><a href='#'>Edit</a> || <a href='#'>Delete</a></td>";
            echo "</tr>";
        }
        echo"</table>";
        echo "<center><a href='http://127.0.0.1:8686/magento/dtn/department/create' class='btn btn-primary'>Add Department</a></center>";
        echo "</tbody>";*/
        $this->loadLayout();
        $this->renderLayout();

    }
    public function createAction(){
    }
    public function getAction(){

    }
    public function updateAction(){

    }
    public function deleteAction(){

    }
}
