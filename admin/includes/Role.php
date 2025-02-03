<?php

class Role extends Db_object
{
    protected static $table_name = 'roles';
    public $id;
    public $name;

    public static function find_all_roles()
    {
        return self::find_this_query("SELECT * FROM " . self::$table_name);
    }
}