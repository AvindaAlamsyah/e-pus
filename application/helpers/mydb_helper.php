<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('insert_batch_string'))
{
    function insert_batch_string($table='',$data=[],$ignore=false){
        $CI = &get_instance();
        $sql = '';

        if ($table && !empty($data)){
            $rows = [];

            foreach ($data as $row) {
                $insert_string = $CI->db->insert_string($table,$row);
                if(empty($rows) && $sql ==''){
                    $sql = substr($insert_string,0,stripos($insert_string,'VALUES'));
                }
                $rows[] = trim(substr($insert_string,stripos($insert_string,'VALUES')+6));
            }

            $sql.=' VALUES '.implode(',',$rows);

            if ($ignore) $sql = str_ireplace('INSERT INTO', 'INSERT IGNORE INTO', $sql);
        }
        return $sql;
    }
}