<?php

class Core_Model_Resource_Collection_Abstract
{
    protected $_resource = null, $_model = null, $_select = [], $_data = [];
    public function __construct()
    {
    }
    public function setResource($resource)
    {
        $this->_resource = $resource;
        return $this;
    }
    public function setModel($model)
    {
        $this->_model = $model;
        return $this;
    }
    public function select()
    {
        $this->_select['FROM'] = $this->_resource->getTableName();
        return $this;
    }
    public function addFieldToFilter($field, $value)
    {
        $this->_select['WHERE'][$field][] = $value;
        return $this;
    }
    public function addLimit($limit)
    {
        $this->_select['LIMIT'] = $limit;
        return $this;
    }
    public function addOffset($offset)
    {
        $this->_select['OFFSET'] = $offset;
        return $this;
    }
    public function addCount($column, $newColumnName)
    {
        $this->_select["COUNT"] = "Count($column) AS " . $newColumnName;
        return $this;
    }
    public function addSum($column, $newColumnName)
    {
        $this->_select["SUM"] = "SUM($column) AS " . $newColumnName;
        return $this;
    }

    public function addGroupBy($column)
    {
        $this->_select['GROUP_BY'][] = $column;
        return $this;
    }
    public function addOrderBy($column, $type = 'ASC')
    {
        $this->_select['ORDER_BY'][] = "{$column} {$type}";
        return $this;
    }
    public function load()
    {
        $sql = "SELECT *";

        if (isset ($this->_select["SUM"])) {
            $sql .= ",{$this->_select['SUM']}";
        }
        if (isset ($this->_select["COUNT"])) {
            $sql .= ",{$this->_select['COUNT']}";
        }

        $sql .= " FROM {$this->_select['FROM']}";

        if (isset ($this->_select["WHERE"])) {
            $whereCondition = [];
            foreach ($this->_select["WHERE"] as $column => $value) {
                foreach ($value as $_value) {
                    if (!is_array($_value)) {
                        $_value = array('eq' => $_value);
                    }
                    foreach ($_value as $_condition => $_v) {
                        if (is_array($_v)) {
                            $_v = array_map(function ($v) {
                                return "'{$v}'";
                            }, $_v);
                            $_v = implode(',', $_v);
                        }
                        switch ($_condition) {
                            case 'eq':
                                $whereCondition[] = "{$column} = '{$_v}'";
                                break;
                            case 'in':
                                $whereCondition[] = "{$column} IN ({$_v})";
                                break;
                            case 'like':
                                $whereCondition[] = "{$column} LIKE '{$_v}'";
                                break;
                            case 'is_null':
                                $whereCondition[] = "{$column} IS NULL";
                                break;
                        }
                    }
                }
            }
            $sql .= " WHERE " . implode(" AND ", $whereCondition);
        }

        if (isset ($this->_select['GROUP_BY'])) {
            $groupBy = implode(", ", array_values($this->_select['GROUP_BY']));
            $sql .= " GROUP BY '{$groupBy}'";
        }

        if (isset ($this->_select['ORDER_BY'])) {
            $orderBy = implode(", ", array_values($this->_select['ORDER_BY']));
            $sql .= " ORDER BY {$orderBy}";
        }

        if (isset ($this->_select['LIMIT'])) {
            $sql .= " LIMIT {$this->_select['LIMIT']}";
        }

        if (isset ($this->_select['OFFSET'])) {
            $sql .= " OFFSET {$this->_select['OFFSET']}";
        }
        $result = $this->_resource->getAdapter()->fetchAll($sql);
        foreach ($result as $row) {
            $modelObj = new $this->_model;
            $this->_data[] = $modelObj->setData($row);
        }
    }
    public function getData()
    {
        $this->load();
        return $this->_data;
    }
    public function getFirstItem()
    {
        $this->load();
        return isset ($this->_data[0]) ? $this->_data[0] : null;
    }
}
