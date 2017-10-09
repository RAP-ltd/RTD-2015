<?php
/**
 * Created by PhpStorm.
 * User: alex1rap
 * Date: 09.10.2017
 * Time: 9:43
 */


namespace sys\base;


class FileLoader
{
    protected $file;

    /**
     * FileLoader constructor.
     * @param $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    /**
     * @param $name
     * @param bool $doMkDir
     * @return bool
     */
    public function saveAs($name, $doMkDir = false)
    {
        $dir = WEB_ROOT;
        $path = explode("/", str_replace("\\", "/", $name));
        for ($i = 0; $i < count($path) - 1; $i++) {
            $dir .= "/{$path[$i]}";
            if ($doMkDir && !file_exists($dir)) {
                mkdir($dir, 0777);
            }
        }
        if (copy($this->file["tmp_name"], $dir . '/' . $path[$i + 1])) {
            return $name;
        }
        return false;
    }

    /**
     * @param $params
     * @return $this|bool
     */
    public function validate($params)
    {
        foreach ($params as $param => $value) {
            if ((!$this->file[$param] || !preg_match($value, $this->file[$param]))) {
                return false;
            }
        }
        return true;
    }
}

