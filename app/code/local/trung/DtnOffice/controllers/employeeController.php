<?php

class trung_DtnOffice_employeeController extends Mage_Core_Controller_Front_Action
{
    // dùng collection class load toàn bộ employee trong database và hiển thị dưới dạng table html.
    public function indexAction()
    {
        $employee = Mage::getModel('DtnOffice/employee')->getCollection();
        //load Bootstrap
        echo "<link rel='stylesheet' type='text/css' href='http://127.0.0.1:8686/css/bootstrap.min.css'>";
        echo "<center><h2 class='m-3'>Employee Management</h2></center>";
        // create table display employee
        echo "<table class='table table-stripe table-hover table-bordered col-11 mx-auto'>";
        echo "<thead style='text-align: center' class='thead-dark'>";
        echo "<th>ID</th>";
        echo "<th>Deparment_id</th>";
        echo "<th>Email</th>";
        echo "<th>FirstName</th>";
        echo "<th>LastName</th>";
        echo "<th>Working years</th>";
        echo "<th>Date Of Birth</th>";
        echo "<th>Salary</th>";
        echo "<th>Note</th>";
        echo "<th>Action</th>";
        echo "</thead>";
        echo "<tbody style='text-align: center'>";
        // load each employe Element  one by one
        foreach ($employee as $value) {
            echo "<tr>";
            echo "<td>" . $value->getId() . "</td>";
            echo "<td>" . $value->getdepartment_id() . "</td>";
            echo "<td>" . $value->getemail() . "</td>";
            echo "<td>" . $value->getfirstname() . "</td>";
            echo "<td>" . $value->getlastname() . "</td>";
            echo "<td>" . $value->getworking_years() . "</td>";
            echo "<td>" . $value->getdob() . "</td>";
            echo "<td>" . $value->getsalary() . "</td>";
            echo "<td>" . $value->getnote() . "</td>";
            echo "<td><a href='#'>Edit</a> || <a href='http://127.0.0.1:8686/magento/dtn/employee/delete/id/".$value->getid()."'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        // link redirect to create employee
        echo "<center><a href='http://127.0.0.1:8686/magento/dtn/employee/create' class='btn btn-primary'>Add Employee</a></center>";

    }

    // tạo mới 1 employee
    public function createAction()
    {
        //add Bootstrap
        echo "<link rel='stylesheet' type='text/css' href='http://127.0.0.1:8686/css/bootstrap.min.css'>";
        echo "<div class='jumbotron col-5 mx-auto m-5'>";
        echo "<center><h2 class='mb-5'>Add Employee</h2></center>";
        // form add a employee
        echo "<form method='post'>";
        echo "<div class='form-group'>";
        $department = mage::getModel('DtnOffice/department')->getCollection();
        echo "Department Name";
        // load Dropdown Departmnet
        echo "<select name='department_id' class='form-control'>";
        foreach ($department as $value) {
            echo "<option value='" . $value->getId() . "'>" . $value->getName() . "</option>";
        }
        echo "</select>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "Email: <input type='email' name='epl_email' class='form-control' placeholder='Enter Email Employee...' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "First Name: <input type='text' name='epl_fn' class='form-control' placeholder='Enter First Name Employee...' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "Last Name: <input type='text' name='epl_ln' class='form-control' placeholder='Enter Last Name Employee...' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "Working Years: <input type='number' name='epl_wy' class='form-control' placeholder='Enter Working years Employee...' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "Date Of Birth: <input type='datetime-local' name='epl_dob' class='form-control' placeholder='Enter Date Of Birth Employee...' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "Salary: <input type='number' name='epl_slr' class='form-control' placeholder='Enter Salary Employee...' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "Note:";
        echo "<textarea class='form-control' name='epl_note' rows='5'></textarea>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<input type='submit' class='btn btn-success ml-5' name='add' value='Add Employee'><input type='reset' class='btn btn-danger ml-3' value='Reset'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";
        //handle create employee
        if (isset($_POST['add'])) {
            $add = mage::getModel('DtnOffice/employee');
            $add->setdepartment_id($_POST['department_id']);
            $add->setEmail($_POST['epl_email']);
            $add->setFirstname($_POST['epl_fn']);
            $add->setLastname($_POST['epl_ln']);
            $add->setWorking_years($_POST['epl_wy']);
            $add->setDob($_POST['epl_dob']);
            $add->setSalary($_POST['epl_slr']);
            $add->setnote($_POST['epl_note']);
            $add->save();
            $this->_redirect('dtn/employee');
            /*$add = mage::getModel('DtnOffice/employee');
            echo $_POST['department_id'];
            echo $_POST['epl_email'];
            echo $_POST['epl_fn'];
            echo $_POST['epl_ln'];
            echo $_POST['epl_wk'];
            echo $_POST['epl_dob'];
            echo $_POST['epl_slr'];
            echo $_POST['note'];*/
        }
    }

    public function getAction()
    {
        //add Bootstrap
        echo "<link rel='stylesheet' type='text/css' href='http://127.0.0.1:8686/css/bootstrap.min.css'>";
        $param = $this->getRequest()->getParams();
        $get_employee = mage::getModel('DtnOffice/employee')->load($param);
        echo "<div class='jumbotron col-5' style='position:absolute;top:50%;left: 50%;
transform: translate(-50%,-50%); '>";
        //Check id exist
        if (mage::getModel('DtnOffice/employee')->load($param)->getId()) {
            echo "<center><h3 class='mb-5'>LOAD INFO WITH ID =" . $get_employee->getId() . "</h3></center>";
            echo "ID: " . $get_employee->getId() . "</br>";
            echo "Department_id: " . $get_employee->getdepartment_id() . "</br>";
            echo "Email: " . $get_employee->getemail() . "</br>";
            echo "First Name: " . $get_employee->getfirstname() . "</br>";
            echo "Last Name: " . $get_employee->getlastname() . "</br>";
            echo "Working years: " . $get_employee->getworking_years() . "</br>";
            echo "Date of Birth: " . $get_employee->getdob() . "</br>";
            echo "Salary : " . $get_employee->getsalary() . "</br>";
            echo "Note: " . $get_employee->getnote() . "</br>";
            echo "</br>";
            echo "<center><a href='" . mage::getUrl('dtn/employee') . "' class='btn btn-danger'>Go Home</a></center>";
        } else {
            echo "Id not exist !!!";
            echo "<center><a href='" . mage::getUrl('dtn/employee') . "' class='btn btn-danger'>Go Home</a></center>";
        }
        echo "</div>";
    }

    public function updateAction()
    {
        $test = mage::getModel('DtnOffice/employee')->load(1);
        echo $test->getdob();
    }

    public function deleteAction()
    {
        // get parameter on url
        $params = $this->getRequest()->getParams('id');
        //load bootstrap
        echo "<link rel='stylesheet' type='text/css' href='http://127.0.0.1:8686/css/bootstrap.min.css'>";
        $get_element = mage::getModel('DtnOffice/employee')->load($params);
        echo "<div class='jumbotron col-5' style='position:absolute;top:50%;left: 50%;
transform: translate(-50%,-50%); '>";
        //Check id exist
        if (mage::getModel('DtnOffice/employee')->load($params)->getId()) {
            $get_element->delete();
            $this->_redirect('dtn/employee/index');
        } else {
            echo "Id not exist !!!";
        }
        echo "</div>";
    }
}