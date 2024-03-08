<?php

namespace Zoo\Logger {

    use Zoo\Logger\Grade;
    use Zoo\Logger\TypeLog;
    use Zoo\Logger\GradeScore;

    class Logger
    {
        public $loger = [];
        private GradeScore $score;
        public function __construct()
        {
            $this->score = new GradeScore();
            $this->loger [ ] = "Открытие зоопарка" . PHP_EOL . "Время: " . date("Y-m-d H:i:s") . PHP_EOL;
        }
        public function clientKickFromAwaitRoom(string $clientName)
        {
            $this->writeLog(TypeLog::Zoo, "Клиент " . $clientName . " Покинул зоопарк из-за закрытия", Grade::Bad);
        }
        public function clientEnteredFishSection(string $clientName)
        {
            $this->writeLog(TypeLog::Zoo, "Клиент " . $clientName . " Смотрит на рыб", Grade::Good);
        }
        public function animalGetViews(string $animalName, int $views)
        {
            $this->writeLog(TypeLog::Zoo, "Животное с именем " . $animalName . " Получило просмотр. Всего просмотров: " . $views);
        }
        public function clientSetAnimal(string $clientName, string $animalName)
        {
            $this->writeLog(TypeLog::Zoo, "Клиент " . $clientName . " Отдал животное с именем: " . $animalName);
        }
        public function clientGetAnimal(string $clientName, string $animalName)
        {
            $this->writeLog(TypeLog::Zoo, "Клиент " . $clientName . " Получил животное с именем: " . $animalName, Grade::Good);
        }
        public function enterClient(string $clientName, string $clientInteres)
        {
            $this->writeLog(TypeLog::Zoo, "Зашёл клиент " . $clientName . " С интересом: " . $clientInteres);
        }
        public function leaveClient(string $clientName, int $countClient, ?Grade $grade = null)
        {
            $this->writeLog(TypeLog::Zoo, "Клиент " . $clientName . " Покинул зоопарк " . "Количество клиентов: " . $countClient, $grade);
        }
        public function writeLog(TypeLog $typeMessage, string $message, ?Grade $grade = null)
        {
            if ($typeMessage == TypeLog::Client) {
                $this->loger[] = "Тема: Клиент " . PHP_EOL .  " Тело: " . $message . PHP_EOL . PHP_EOL;
            }
            if ($typeMessage == TypeLog::Zoo) {
                $this->loger[] = "Тема: Зоопарк " . PHP_EOL .  " Тело: " . $message . PHP_EOL . PHP_EOL ;
            }
            if ($grade != null) {
                if ($grade == Grade::Bad) {
                    $this->score->badScore++;
                }
                if ($grade == Grade::Good) {
                    $this->score->goodScore++;
                }
            }
        }
        public function readAllLog(): void
        {
            foreach ($this->loger as $id => $message) {
                echo "Номер: " . $id . PHP_EOL . " " . $message . PHP_EOL;
            }
        }
        public function end()
        {
            $badScore = $this->score->badScore;
            $goodScore = $this->score->goodScore;
            $countPeople = $badScore + $goodScore;
            $this->readAllLog();
            $this->loger[] = "Зоопарк закрывается" . PHP_EOL . "Время: " . date("Y-m-d H:i:s") . PHP_EOL;
            echo " Всего зоопарк посетило: " . $countPeople . PHP_EOL
            . "Плохих отзывов: " . $badScore . PHP_EOL
            . "Хороших отзывов: " . $goodScore . PHP_EOL;
        }
    }
}
