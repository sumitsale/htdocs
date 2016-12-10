<?php

class Dbop {

    private $connection;
    public static $tableArr = array();

    public function getObject($database) {
        $this->connection = DbConn::getDBObject($database);
    }

    private function getParamType($type) {
        switch ($type) {
            case 'integer':
                $returnValue = 'i';
                break;
            case 'double':
                $returnValue = 'd';
                break;
            default:
                $returnValue = 's';
        }
        return $returnValue;
    }

    public function select($sql, $params = array(), $database = DB_FRESHER) {
        $resultArr = array();
        $paramType = '';
        $bindParams = array();
        $bindParams[0] = '';
        $i = 0;
        $this->getObject($database);
        $statement = $this->connection->prepare($sql);

        if (!$statement) {
            echo $this->getError();
            echo '<br><br>';
            echo $sql;
            echo '<br>';
        }
        //error_log($sql);
        if (is_array($params)) {
            foreach ($params as $param) {
                $i++;
                $bindParams[0] .= $this->getParamType(gettype($param));
                $bindParams[$i] = $param;
            }
            $tmp = array();
            foreach ($bindParams as $key => $value)
                $tmp[$key] = &$bindParams[$key];
            call_user_func_array(array($statement, "bind_param"), $tmp);
        }

        $statement->execute();

        $allFieldsArr = $statement->result_metadata()->fetch_fields();
        foreach ($allFieldsArr as $fields) {
            $allFields[] = trim($fields->name);
        }

        for ($fieldI = 0; $fieldI < $statement->field_count; $fieldI++) {
            $fieldArray[$fieldI] = '';
        }

        $tmp = array();
        foreach ($fieldArray as $key => $value)
            $tmp[$key] = &$fieldArray[$key];
        call_user_func_array(array($statement, "bind_result"), $tmp);

        $i = 0;
        while ($row = $statement->fetch()) {
            $j = 0;
            foreach ($fieldArray as $key => $value) {
                $resultArr[$i][$allFields[$j]] = $value;
                $j++;
            }
            $i++;
        }
        $statement->close();
        return $resultArr;
    }

    public function update($sql, $params = array(), $database = DB_FRESHER) {
        $resultArr = array();
        $paramType = '';
        $bindParams = array();
        $bindParams[0] = '';
        $i = 0;
        $this->getObject($database);
        $statement = $this->connection->prepare($sql);

        if (!$statement) {
            echo $this->getError();
            echo '<br><br>';
            echo $sql;
            echo '<br>';
        }

        if (is_array($params)) {
            foreach ($params as $param) {
                $i++;
                $bindParams[0] .= $this->getParamType(gettype($param));
                $bindParams[$i] = $param;
            }
            $tmp = array();
            foreach ($bindParams as $key => $value)
                $tmp[$key] = &$bindParams[$key];
            call_user_func_array(array($statement, "bind_param"), $tmp);
        }

        $statement->execute();
        $affectedRows = $statement->affected_rows;
        $statement->close();
        return $affectedRows;
    }

    protected function delete($sql, $params = array(), $database = DB_FRESHER) {
        $resultArr = array();
        $paramType = '';
        $bindParams = array();
        $bindParams[0] = '';
        $i = 0;
        $this->getObject($database);
        $statement = $this->connection->prepare($sql);

        if (!$statement) {
            echo $this->getError();
            echo '<br><br>';
            echo $sql;
            echo '<br>';
        }

        if (is_array($params)) {
            foreach ($params as $param) {
                $i++;
                $bindParams[0] .= $this->getParamType(gettype($param));
                $bindParams[$i] = $param;
            }
            $tmp = array();
            foreach ($bindParams as $key => $value)
                $tmp[$key] = &$bindParams[$key];
            call_user_func_array(array($statement, "bind_param"), $tmp);
        }

        $statement->execute();
        $affectedRows = $statement->affected_rows;
        $statement->close();
        return $affectedRows;
    }

    protected function insert($sql, $params = array(), $database = DB_FRESHER) {
        $resultArr = array();
        $paramType = '';
        $bindParams = array();
        $bindParams[0] = '';
        $i = 0;
        $this->getObject($database);
        $statement = $this->connection->prepare($sql);

        if (!$statement) {
            echo $this->getError();
            echo '<br><br>';
            echo $sql;
            echo '<br>';
        }

        if (is_array($params)) {
            foreach ($params as $param) {
                $i++;
                $bindParams[0] .= $this->getParamType(gettype($param));
                $bindParams[$i] = $param;
            }
            $tmp = array();
            foreach ($bindParams as $key => $value)
                $tmp[$key] = &$bindParams[$key];
            call_user_func_array(array($statement, "bind_param"), $tmp);
        }

        $statement->execute();
        $insertID = $statement->insert_id;
        $statement->close();
        return $insertID;
    }

    protected function execQuery($sql, $database) {
        $this->getObject($database);
        try {
            return $this->connection->query($sql);
        } catch (Exception $err) {
            $err = $this->connection->error;
            throw new Exception($err);
        }
    }

    protected function getError() {
        return $this->connection->error;
    }

    protected function multiQuery($sql, $database) {

        $this->getObject($database);
        try {
            return $this->connection->multi_query($sql);
        } catch (Exception $err) {
            $err = $this->connection->error;
            throw new Exception($err);
        }
    }

    /**
     * getUUID create unique ID through uuid() of mysqli
     * @param Array $database contains the details of database
     * <p> This function creates UUID which is a 128-bit number represented by a utf8 string of five hexadecimal numbers in aaaaaaaa-bbbb-cccc-dddd-eeeeeeeeeeee format:  </p>
     * @return String Returns a Universal Unique Identifier
     */
    protected function getUUID($database) {
        $this->getObject($database);
        try {
            $query = 'select uuid() as uuid';
            $uidArr = $this->select($query, '', $database);
            return $uidArr[0]['uuid'];
        } catch (Exception $err) {
            $err = $this->connection->error;
            throw new Exception($err);
        }
        return '';
    }

    public static function getTableName($table) {
        if (isset(self::$tableArr[$table])) {
            return self::$tableArr[$table];
        }
        return $table;
    }

    public static function setTableName($table) {
        self::$tableArr = $table;
    }

}
