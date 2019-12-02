<?php



// Cristina Castillo Obregón
// Desarrollo Web en Entorno Servidor
// curso 2019/20
// Proyecto Mi Fiel Amigo




class Database
{

    private $host = "localhost";
    private $user;
    private $pass;
    private $dbname;
    private $consulta;

    private $db = null;
    private $error;
    private $result = null;
    private static $instance = null;

    /**
     * @param $dbu  - usuario
     * @param $dbp  - contraseña
     * @param $dbn  - nombre de la base de datos
     */
    private function __construct($dbu, $dbp, $dbn)
    {

        $this->user = $dbu;
        $this->pass = $dbp;
        $this->dbname = $dbn;

        $this->connect();
    }

    /**
     * destructor de la clase
     */
    public function __destruct()
    {
        $this->db = null;
    }


    /**
     * A traves de la función connect estableceremos conexión con la base de datos
     */
    private function connect()
    {

        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Creamos una instancia 
        try {
            $this->db = new PDO($dsn, $this->user, $this->pass, $options);
            $this->db->exec("SET NAMES UTF8");
        }
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    /**
     * utilizamos el patrón de diseño SINGLETON que nos permitirá
     * tener una única instancia de la clase DATABASE.
     *
     * @param $dbu 
     * @param $dbp
     * @param $dbn
     */
    public static function getInstance($dbu, $dbp, $dbn)
    {
        // si no existe instancia la creamos
        if (Database::$instance == null)
            Database::$instance = new Database($dbu, $dbp, $dbn);

        // devolvemos la instancia
        return Database::$instance;
    }


    /**
     * Mediante execute se ejecutaran las consultas sql que se pasen como parametro
     */
    public function execute($query, $params = null)
    {

        $this->consulta = $this->db->prepare($query);

        if ($this->consulta->execute($params)) {

            if ($this->consulta->rowCount() > 0) {

                return true;
            } else {
                return false;
            }
        }
        return false;
    }


    /**
     * devuelve el resultado de la consulta en formato
     * de objeto
     *
     * @param $cls (optativo, valor por defecto stdClass)
     * @return
     */
    public function getObject($cls = "StdClass")
    {
        if (is_null($this->consulta)) return null;

        // si tenemos un resultado, lo devolvemos
        return $this->consulta->fetchObject($cls);
    }
}
