<?php

class DB
{
    protected static $table;

    static function connect()
    {
        try{
            $pdo = new PDO( DSN , DB_USER , DB_PASS );

            // 오류 모드를 설정하였다.
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepared Statements를 이용할 수 있도록
            // 에뮬레이터 기능을 FALSE로 하였다. (DB Injection 공격 방어에 유용)
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        }    
        
        catch(PDOException $Exception)
        {
            die('DB 접속 오류:'.$Exception->getMessage( ));
        }
    
        return $pdo;
    }
    public static function query($sql)
    {
       // sql문은 이름있는 플레이스 홀더를 포함하여 적을 것.
       $stmt = Self::connect()->prepare($sql);
    }
}

