<?php

class trung_DtnOffice_indexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        //test load model
        /*$testdepartment = Mage::getModel('DtnOffice/department');
        echo $testdepartment->load(1)->name;*/
        // test load url
       /* $params = $this->getRequest()->getParams();
        $test = Mage::getModel('DtnOffice/department');
        echo "Loading the $test with an ID of ".$params['id'];
        echo "<br/>";
        $test->load($params['id']);
        $data = $test->getData();
        print_r($data);*/
       //test method getname
       /* $test = Mage::getModel('DtnOffice/department');
        $test->load(1);
        echo $test->getName();*/
       // test add pt
        /*$test = Mage::getModel('DtnOffice/department');
        $test->setName('KE');
        $test->save();*/
        //test sua pt
       /* $test = Mage::getModel('DtnOffice/department');
        $test->load(2);
        $test->setName('Kế Toán');
        $test->save()*/;
        //test xoa
       /* $test = Mage::getModel('DtnOffice/department');
        $test->load(2);
        $test->delete();*/
       //sư dụng collection
        $test= Mage::getModel('DtnOffice/department')->getCollection();
        echo "<table border='1' cellspacing='0' cellpadding='5' style='text-align: center; margin: 0 auto;'>";
        echo "<thead>";
        echo "<th>ID</th>";
        echo "<th>Department</th>";
        echo "</thead>";
        foreach ($test as $value){
            echo "<tr>";
            echo "<td>".$value->getId()."</td>";
            echo "<td>".$value->getName()."</td>";
            echo "</tr>";
        }
        echo"</table>";
    }
}
