<?php
namespace App\Helpers;

use Respect\Validation\Rules\Type;

class Helper
{

    public static function rootPath()
    {
        return $_SERVER['DOCUMENT_ROOT'];
    }


    public static function number_format($number, $length)
    {
        return sprintf("%0{$length}d", $number);
    }

    public static function build_update_query($tables, $data)
    {
        $data = (array)$data;
        $query = 'UPDATE ' . self::build_tables_list($tables) .
            ' SET ' . self::build_update_args($data) .
            ' WHERE ' . self::build_where_clause($tables);

        return $query;
    }

    public static function build_update_query_data($data)
    {
        $update_query_data = '';
        foreach ($data as $key => $item) {
            if ($item === end($data)) {
                $update_query_data .= $key . ' = ' . $item;
            } else {
                $update_query_data .= $key . ' = ' . $item . ', ';
            }
        }
        return $update_query_data;
    }

    public static function build_tables_list(array $tables)
    {
        $tables_list = '';
        $count = count($tables);

        for ($i = 0; $i < $count; $i++) {

            //if tables array have only one table or the last table
            if ($count === 1 || $i == $count - 1) {
                $tables_list .= $tables[$i] . '     ';
            } else {
                $tables_list .= $tables[$i] . ' JOIN ';
            }
        }
        return $tables_list;
    }

    private static function build_update_args(array $data)
    {
        $query_args = '';

        foreach ($data as $key => $item) {
            $query_args .= $key . ' = ' . ':' . $key . ', ';
        }

        $query_args = rtrim($query_args, ", ");

        return $query_args;
    }

    public static function build_where_clause(array $tables)
    {
        $where_clause = '';

        for ($i = 0; $i < count($tables); $i++) {
            if ($i === 0) {
                $where_clause .= $tables[$i] . '.user_id  = :user_id  AND ' . $tables[0] . '.' . $tables[0] . '_id = :' .
                    $tables[0] . '_id ';
            } else {
                $where_clause .= ' AND ' . $tables[0] . '.' . $tables[0] . '_id = ' . $tables[$i] . '.' . $tables[0] . '_id ';
            }
        }
        return $where_clause;
    }

    public static function build_where_clause_for_find(array $tables)
    {
        $where_clause = '';

        for ($i = 0; $i < count($tables); $i++) {
            if ($i === 0) {
                $where_clause .= $tables[$i] . '.user_id  = :user_id ';
            } else {
                $where_clause .= ' AND ' . $tables[0] . '.' . $tables[0] . '_id = ' . $tables[$i] . '.' . $tables[0] . '_id ';
            }
        }
        return $where_clause;
    }

    public static function to_mysql_date($date)
    {
        $date = str_replace('/', '-', $date);
        $date = strtotime($date);
        return date('Y-m-d', $date);
    }

    public static function process_image($imageInfo)
    {

        if ($imageInfo->type == 'image/png' || $imageInfo->type == 'image/jpg' || $imageInfo->type == 'image/jpeg' || $imageInfo == 'image/gif') {

            $imagePath = 'images/' . $imageInfo->name;

            if (move_uploaded_file($imageInfo->tmp_name, $imagePath)) {
                return $imagePath;
            } else {
                return 'file could be moved!';
            }

        } else {
            return false;
        }
    }
}

?>