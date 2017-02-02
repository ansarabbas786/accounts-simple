<?php

class Session
{

    private $logged_in = false;
    public $user_id;

    /**
     * Session constructor.
     */
    public function __construct()
    {
        session_start();
        $this->check_log_in();
    }

    public function is_logged_in()
    {
        return $this->logged_in;
    }

    private function check_log_in()
    {
        if (isset($_SESSION['user_id'])) {

            $this->logged_in = true;
            $this->user_id = $_SESSION['user_id'];
        } else {

            $this->logged_in = false;
            unset($this->user_id);
        }
    }

    public function login($user)
    {
        if(isset($user->id)){

            $this->user_id = $_SESSION['user_id'] = $user->id;

            $this->logged_in = true;
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($this->user_id);

        setcookie('user_id', null, time() - (60*60*60*24*8));

        $this->logged_in = false;
    }

    public function put_content($key, $content)
    {
        $_SESSION[$key] = $content;
    }

    public function get_content($key)
    {
        return $_SESSION[$key];
    }

    public function remove_content($key)
    {
        $_SESSION[$key] = null;
    }

}

$session  = new Session();

?>