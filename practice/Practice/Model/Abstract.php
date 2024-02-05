<?php

class Model_Abstract
{
    public function __construct()
    {
    }

    public function getQueryBuilder()
    {
        return new Lib_Sql_QueryBuilder();
    }
    public function getQueryExecutor()
    {
        return new Lib_Sql_QueryExecutor();
    }
}