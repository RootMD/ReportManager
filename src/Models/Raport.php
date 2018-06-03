<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2018-05-31
 * Time: 16:20
 */

namespace App\Models;


class Raport
{
    public static $id = 0;
    public $date;
    public $time;
    public $content;

    public function __construct($date, $time, $content)
    {
        $this->date=$date;
        $this->time=$time;
        $this->content=$content;
        self::$id++;
    }
    public static function Count(){
        return self::$id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

}