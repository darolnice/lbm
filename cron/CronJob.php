<?php


class CronJob extends Database
{

    public function delperhour(){
        $q = parent::getDb()->prepare("DELETE * FROM users WHERE time - create_at > 1 AND actived = 1");
        $q->execute();
    }
}