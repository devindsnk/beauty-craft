<?php
/*
    * PDO Dtabase Class
    * Connect to database
    * Create prepared statements
    * Bind values
    * Return rows and results
    */

class Database
{
   private $host = DB_HOST;
   private $user = DB_USER;
   private $pass = DB_PASS;
   private $dbname = DB_NAME;

   private static $dbh = null;
   private $error;

   public function __construct()
   {
      // data source name
      $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
      $options = array(
         PDO::ATTR_PERSISTENT => true,
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );

      try
      {
         self::$dbh = new PDO($dsn, $this->user, $this->pass, $options);
      }
      catch (PDOException $e)
      {
         $this->error = $e->getMessage();
         echo $this->error;
      }
   }

   public function getConnection()
   {
      return self::$dbh;
   }

   //////////////////////////////////////////////////////////////////////
   // public function __construct()
   // {
   //    // data source name
   //    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
   //    $options = array(
   //       PDO::ATTR_PERSISTENT => true,
   //       PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
   //    );

   //    try
   //    {
   //       $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
   //    }
   //    catch (PDOException $e)
   //    {
   //       $this->error = $e->getMessage();
   //       echo $this->error;
   //    }
   //    return $this->dbh;
   // }

   // public function getConnection()
   // {
   //    return $this->dbh;
   // }

   ///////////////////////////////////////////////////////////////////////////
}
