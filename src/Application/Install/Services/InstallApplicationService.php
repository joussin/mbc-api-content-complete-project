<?php

namespace MbcApiContent\Application\Install\Services;


class InstallApplicationService
{

    public const INSTALL_DIR = 'src/Application/Install/';

    public const CONFIG_FILE = 'mbc-api-content.php';


    public function installFiles()
    {
        try {
            $this->configUp();
            $this->publicUp();
            $this->viewsUp();
            $this->routesUp();
        }
        catch (\Exception $e)
        {
            throw new \Exception('Error installing files' . $e->getMessage());
        }
    }

    public function uninstallFiles()
    {
        try {
            $this->configDown();
            $this->publicDown();
            $this->viewsDown();
            $this->routesDown();
        }
        catch (\Exception $e)
        {
            throw new \Exception('Error uninstalling files' . $e->getMessage());
        }
    }

    public  function create(string $from, string $to, bool $isDir = false, bool $override = false) : bool|string
    {
//        $this->publishes([
//            $from => $to,
//        ]);

        if($isDir)
        {
            try{
                exec("cp -r $from $to");
                return true;
            } catch (\Exception $e)
            {
                return false;
            }
        }
        else {
            return copy($from, $to);
        }
    }

    public  function delete(string $path, bool $isDir = false) : bool|string
    {
        if($isDir)
        {
            try{
                exec("rm -Rf $path");
                return true;
            } catch (\Exception $e)
            {
                return false;
            }
        }
        else {
            return unlink($path);
        }
    }



    public  function configUp()
    {
        $from = base_path(self::INSTALL_DIR . 'config/' . self::CONFIG_FILE);
        $to = config_path(self::CONFIG_FILE);

        $this->create($from, $to);
    }

    public  function publicUp()
    {
        $from = base_path(self::INSTALL_DIR . 'public/api/');
        $to = public_path("api/");

        $this->create($from, $to, true);
    }

    public  function viewsUp()
    {
//        $resource_vendor_path = resource_path("views/vendor/");
//        if( !is_dir($resource_vendor_path) )
//        {
//            exec("mkdir $resource_vendor_path");
//        }

    // views
        $from = base_path(self::INSTALL_DIR . 'resources/views/api/');
        $to = resource_path("views/api/");

        $this->create($from, $to, true);

        // views
        $from = base_path(self::INSTALL_DIR . 'resources/views/backoffice/');
        $to = resource_path("views/backoffice/");

        $this->create($from, $to, true);
    }

    public  function routesUp()
    {
        $from = base_path(self::INSTALL_DIR . 'routes/');
        $to = base_path("routes/");

        $this->create($from, $to, true);
    }



    public  function configDown()
    {
        $from = config_path(self::CONFIG_FILE);

        $this->delete($from);
    }

    public  function publicDown()
    {
         $from = public_path("api/");

        $this->delete($from, true);
    }

    public  function viewsDown()
    {
        $from = resource_path("views/api/");
        $this->delete($from, true);

        $from = resource_path("views/backoffice/");
        $this->delete($from, true);
    }

    public  function routesDown()
    {
        $from = base_path("routes/api-content.php");
        $this->delete($from);
        $from = base_path("routes/backoffice.php");
        $this->delete($from);
    }

}
