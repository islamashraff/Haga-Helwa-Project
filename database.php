<?php

namespace exam_2;

interface database{

    public function selectAll($column,$table);


    public function selectWhere($column,$table,$condition,$value);


    public function selectOne($column,$table,$condition,$value); 


    public function Insert($column,$table,$value);


    public function Update($table,$oldData,$newData,$condition,$value);


    public function Delete($table,$condition,$value);

}

