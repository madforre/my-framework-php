<?php

class DB
{
    public static $userName;
    public static $dbType;
    public static $host;
    public static $dbName;
    public static $password;

    static function connect()
    {
        /* 
        * Prepared Statements를 이용할 수 있도록
        * 에뮬레이터 기능을 FALSE로 하였다. (DB Injection 공격 방어에 유용)
        * 또한 오류 모드를 설정하였다.        
        */

        $options = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        
        try {
            // $pdo = new PDO(Self::$dbType.":host=".Self::$host.";dbname=".Self::$dbName.";charset=utf8mb4", Self::$userName, Self::$password, $options);
            $pdo = new PDO('mysql:host=;dbname=mvc;charset=utf8mb4', 'root' , 'fire0428' , $options);
        }    
        
        catch (PDOException $Exception)
        {
            die('DB 접속 오류:'.$Exception->getMessage( ));
        }
    
        // PDO 객체 반환
        return $pdo;
    }

    public static function stmt($query, $params = array())
    {
        // DB Injection 공격을 방지하려면 stmt 메서드 사용시 쿼리문에 플레이스 홀더를 포함하여 적고
        // 두번째 인자로 플레이스 홀더를 전달하자.
        $stmt = Self::connect()->prepare($query);
        $stmt->execute($params); 

        $toDo = explode(' ', $query)[0];

        // 입력한 쿼리문 마다 리턴값을 다르게 생성 (용도 - 쿼리별 반환 값 확인)
        switch ($toDo) {
        case $toDo == 'SELECT':
            $data = $stmt->fetchAll();          
            break;
        case $toDo == 'INSERT':
            $data = "글 생성";
            break;
        case $toDo == 'UPDATE':
            $data = "글 수정";
            break;
        case $toDo == 'DELETE':
            $data = "글 삭제";
            break;
        default:
            $data = "쿼리문이 아닙니다.";
        }

        return $data;
        
    }
}