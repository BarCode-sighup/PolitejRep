<?php
//получаем данные для записи в БД
$data = json_encode($_POST);

// записываем данные в бд
Database::getInstance()->addName($data['NAME']);

// класс для работы с БД - вообще надо выносить также в отдельный файл
class Database
{
    protected static $instance;

    /**
     * @var \mysqli|null
     */
    protected $connection = null;

    protected function __construct()
    {
        $config = static::getConfig();
        $this->connection = mysqli_connect(
            $config['host'],
            $config['login'],
            $config['password'],
            $config['name']
        );
        if ($this->connection->connect_errno)
        {
            throw new \Exception('Database connect error:' . $this->connection->connect_error);
        }
    }

    protected static function getConfig()
    {
        $config = array();
        include $_SERVER['DOCUMENT_ROOT'] . '/config.php'; // тута твои данные от БД

        return $config['db'];
    }

    /**
     * @return static
     */
    public static function getInstance()
    {
        if (!static::$instance)
        {
            static::$instance = new Database();
        }

        return static::$instance;
    }

    protected function checkDatabase()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS my_data(
ID INT(11) NOT NULL AUTO_INCREMENT,
NAME VARCHAR(100),
PRIMARY KEY (ID)
);';
        $result = $this->connection->query($sql);
        if (!$result)
        {
            throw new \Exception('Database query error: ' . $this->connection->error);
        }
    }

    public function addName($name)
    {
        $this->checkDatabase();
        $stmt = $this->connection->prepare('INSERT INTO my_data(NAME) VALUES(?)');
        $stmt->bind_param('s', $name);
        $stmt->execute();
    }
}

?>






