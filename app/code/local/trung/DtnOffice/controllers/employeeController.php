<?php

class trung_DtnOffice_employeeController extends Mage_Core_Controller_Front_Action
{
    // dùng collection class load toàn bộ employee trong database và hiển thị dưới dạng table html.
    public function indexAction()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        //load Bootstrap
        echo "<link rel='stylesheet' type='text/css' href='http://127.0.0.1:8686/css/bootstrap.min.css'>";
        $employee = Mage::getModel('DtnOffice/employee')->getCollection();
        /* //	Chỉ hiển thị những Employee nằm trong department ID = 5
         $employee->addFieldToFilter('department_id',array('eq'=>'5'));
         //•	Chỉ hiển thị những Employee có số năm làm việc >= 2
         $employee->addFieldToFilter('working_years',array('gteq'=>'2'));
         //•	Chỉ hiển thị những Employee có lương >= 10 triệu
         $employee->addFieldToFilter('salary',array('gteq'=>'10'));*/
        echo "<center><h2 class='m-3'>Employee Management</h2></center>";
        echo "<form method='post' class='col-8 mx-auto'>";
        echo "<div class='form-inline' style='margin-left: 250px'>";
        echo "<input type='number' name='day' class='form-control col-3' >";
        echo "<input type='submit' name='searh' class='btn btn-warning ml-3' value='Tìm kiếm theo ngày sinh'>";
        echo "</div>";
        echo "<div class='form-inline' style='margin-left: 150px'>";
        echo "<input type='date' name='start_day' class='form-control col-4' >";
        echo "<input type='submit' name='day_create_searh' class='btn btn-success m-3' value='Tìm kiếm theo ngày tạo'>";
        echo "<input type='date' name='end_day' class='form-control col-4' >";
        echo "</div>";
        echo "</form>";
        //•	Chỉ hiển thị những Employee có ngày sinh = 1 ngày tùy chọn
        if (isset($_POST['searh'])) {
            ;
            $this->_redirect('dtn/employee/index/day/' . $_POST['day']);
        }
        // load param
        $param = $this->getRequest()->getParams();
        $day = $param['day'];
        if (!$day) {
        } else {
            // check day invalid
            if ($day > 0 && $day < 31) {
                $condition = array('like' => '________' . $day . '%');
                /*var_dump($condition);*/
                $employee->addFieldToFilter('dob', $condition);
            } else {
                echo "nhập chính xác ngày";
            }
        }
        //•	Chỉ hiển thị những Employee được tạo mới trong khoảng thời gian từ date1 đến date2 tùy chọn
        if (isset($_POST['day_create_searh'])) {
            if ($_POST['start_day'] && $_POST['end_day'] && strtotime($_POST['end_day'])>strtotime($_POST['start_day'])) {
                $condition = array('from'=>$_POST['start_day'].'%','to'=>$_POST['end_day'].'%');
                $employee->addFieldToFilter('create_at',$condition);
            }
            else{
                echo "Nhập đầy đủ hoặc theo quy luật trái là ngày bắt đầu phải là ngày kết thúc !!";
            }
        }
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
        echo "<th>Create at</th>";
        echo "<th>Update at</th>";
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
            echo "<td>" . $value->getcreate_at() . "</td>";
            echo "<td>" . $value->getupdate_at() . "</td>";
            echo "<td><a href='http://127.0.0.1:8686/magento/dtn/employee/update/id/" . $value->getid() . "'>Edit</a> || <a href='http://127.0.0.1:8686/magento/dtn/employee/delete/id/" . $value->getid() . "'>Delete</a></td>";
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
        echo "Salary: <input type='number' name='epl_slr' step='0.01' class='form-control' placeholder='Enter Salary Employee...' required>";
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
            // get curent time
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y-m-d H:i:s');
            $array_current_time = explode(' ', $date);
            // convert time
            $current_time = $array_current_time[0] . 'T' . $array_current_time[1];
            $add->setCreate_at($current_time);
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
        $param = $this->getRequest()->getParams();
        $employ_id = (int)$param['id'];
        $employee = mage::getModel("DtnOffice/employee")->load($employ_id);
        //add Bootstrap
        echo "<link rel='stylesheet' type='text/css' href='http://127.0.0.1:8686/css/bootstrap.min.css'>";
        echo "<div class='jumbotron col-5 mx-auto m-5'>";
        echo "<center><h2 class='mb-5'>Edit Employee</h2></center>";
        // form add a employee
        echo "<form method='post'>";
        echo "<div class='form-group'>";
        $department = mage::getModel('DtnOffice/department')->getCollection();
        echo "Department Name";
        // load Dropdown Departmnet
        echo "<select name='department_id' class='form-control'>";
        foreach ($department as $value) {
            if ($value->getid() == $employee->getdepartment_id()) {
                echo "<option value='" . $value->getId() . "' selected='true'>" . $value->getName() . "</option>";
            } else {
                echo "<option value='" . $value->getId() . "'>" . $value->getName() . "</option>";
            }
        }
        echo "</select>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "Email: <input type='email' name='epl_email' class='form-control' value='" . $employee->getemail() . "' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "First Name: <input type='text' name='epl_fn' class='form-control' value='" . $employee->getfirstname() . "' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "Last Name: <input type='text' name='epl_ln' class='form-control' value='" . $employee->getlastname() . "' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "Working Years: <input type='number' name='epl_wy' class='form-control' value='" . $employee->getworking_years() . "' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        $time_dob = explode(' ', $employee->getdob());
        echo "Date Of Birth: <input type='datetime-local' name='epl_dob' class='form-control' value='" . $time_dob[0] . "T" . $time_dob[1] . "' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "Salary: <input type='number' name='epl_slr' step='0.01' class='form-control' value='" . $employee->getsalary() . "' required>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "Note:";
        echo "<textarea class='form-control' name='epl_note' rows='5'>" . $employee->getnote() . "</textarea>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<input type='submit' class='btn btn-success ml-5' name='edit' value='Edit Employee'><input type='reset' class='btn btn-danger ml-3' value='Reset'>";
        echo "</div>";
        echo "</form>";
        echo "</div>";
        if (isset($_POST['edit'])) {
            $employee->setdepartment_id($_POST['department_id']);
            $employee->setEmail($_POST['epl_email']);
            $employee->setFirstname($_POST['epl_fn']);
            $employee->setLastname($_POST['epl_ln']);
            $employee->setWorking_years($_POST['epl_wy']);
            $employee->setDob($_POST['epl_dob']);
            $employee->setSalary($_POST['epl_slr']);
            $employee->setnote($_POST['epl_note']);
            // get curent time
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y-m-d H:i:s');
            $array_current_time = explode(' ', $date);
            // convert time
            $current_time = $array_current_time[0] . 'T' . $array_current_time[1];
            $employee->setUpdate_at($current_time);
            $employee->save();
            $this->_redirect('dtn/employee');
        }
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