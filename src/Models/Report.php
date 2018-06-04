<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2018-05-31
 * Time: 16:20
 */

namespace App\Models;


class Report
{
    public static $id = 0;
    protected $date;
    protected $time;
    protected $content;

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

    /**
     * @param mixed $date
     */
    public function setDate(\DateTime $date = null)
    {
        $this->date = $date;
    }

    /**
     * @param mixed $time
     */
    public function setTime(\DateTime $time = null)
    {
        $this->time = $time;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

}