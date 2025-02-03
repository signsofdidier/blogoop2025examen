<?php

class User extends Db_object
{
    //properties
    //public,private, protected
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $created_at;
    public $deleted_at;
    public $role_id;
    protected static $table_name = 'users';
    //methods

    public static function verify_user($username, $password)
    {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::$table_name . " WHERE ";
        $sql .= "username = ? ";
        $sql .= "AND password = ?";
        $sql .= " LIMIT 1";

        $the_result_array = self::find_this_query($sql, [$username, $password]);

        if (!empty($the_result_array)) {
            $user = array_shift($the_result_array);
            $_SESSION['user_id'] = $user->id; // Sla de ID van de ingelogde gebruiker op
            $_SESSION['user_role'] = $user->role_id; // Sla de rol van de gebruiker op
            return $user;
        } else {
            return false;
        }
    }

    /* CRUD */
    /*properties als array voorzien*/
    public function get_properties(){
        return[
            'id'=> $this->id,
            'username'=>$this->username,
            'password'=>$this->password,
            'first_name'=>$this->first_name,
            'last_name'=>$this->last_name,
            'created_at'=>$this->created_at,
            'deleted_at'=>$this->deleted_at,
            'role_id' => $this->role_id,
        ];
    }




}