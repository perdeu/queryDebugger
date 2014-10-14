<?php

include 'queryDebugger.php';

$queries = array(
    'INSERT INTO tabela(nome, email, idade, endereco) VALUES (:nome, :email, :idade, :endereco)',
    'SELECT * FROM tabela WHERE id IN(:id_1, :id2)',
    'DELETE FROM tabela where id = ::_id',
    'DELETE FROM tabela where id IN(?,?,?)'

);


$values = array(
    array('joao', 'joao@gmail.com', '20', 'rua xx'),
    array(99, 70),
    array(48),
    array(10,20,30)

);

$qd = new queryDebugger();


foreach($queries as $index => $query){
    echo $qd->setValues($query, $values[$index]) .'<br>';
}