<?php

    class UnoHandInfo{
        public $roomID;
        public $memberID;
        public $orderNum;

        public $plusFour;

        public $redOne;
        public $redTwo;
        public $redThree;
        public $redFour;
        public $redFive;
        public $redSix;
        public $redSeven;
        public $redEight;
        public $redNine;
        public $redPlusTwo;
        public $redChange;
        public $redBan;

        public $blueOne;
        public $blueTwo;
        public $blueThree;
        public $blueFour;
        public $blueFive;
        public $blueSix;
        public $blueSeven;
        public $blueEight;
        public $blueNine;
        public $bluePlusTwo;
        public $blueBan;
        public $blueChange;

        public $yellowOne;
        public $yellowTwo;
        public $yellowThree;
        public $yellowFour;
        public $yellowFive;
        public $yellowSix;
        public $yellowSeven;
        public $yellowEight;
        public $yellowNine;
        public $yellowPlusTwo;
        public $yellowBan;
        public $yellowChange;

        public $greenOne;
        public $greenTwo;
        public $greenThree;
        public $greenFour;
        public $greenFive;
        public $greenSix;
        public $greenSeven;
        public $greenEight;
        public $greenNine;
        public $greenPlusTwo;
        public $greenChange;
        public $greenBan;

        function object_from_JSOn($data){
            $this->roomID = $data['roomID'];
            $this->memberID = $data['memberID'];
            $this->orderNum = $data['orderNum'];

            $this->redOne = $data['redOne'];
            $this->redTwo = $data['redTwo'];
            $this->redThree = $data['redThree'];
            $this->redFour = $data['redFour'];
            $this->redFive = $data['redFive'];
            $this->redSix = $data['redSix'];
            $this->redSeven = $data['redSeven'];
            $this->redEight = $data['redEight'];
            $this->redNine = $data['redNine'];
            $this->redPlusTwo = $data['redPlusTwo'];
            $this->redChange = $data['redChange'];
            $this->redBan = $data['redBan'];

            $this->blueOne = $data['blueOne'];
            $this->blueTwo = $data['blueTwo'];
            $this->blueThree = $data['blueThree'];
            $this->blueFour = $data['blueFour'];
            $this->blueFive = $data['blueFive'];
            $this->blueSix = $data['blueSix'];
            $this->blueSeven = $data['blueSeven'];
            $this->blueEight = $data['blueEight'];
            $this->blueNine = $data['blueNine'];
            $this->bluePlusTwo = $data['bluePlusTwo'];
            $this->blueChange = $data['blueChange'];
            $this->blueBan = $data['blueBan'];

            $this->yellowOne = $data['yellowOne'];
            $this->yellowTwo = $data['yellowTwo'];
            $this->yellowThree = $data['yellowThree'];
            $this->yellowFour = $data['yellowFour'];
            $this->yellowFive = $data['yellowFive'];
            $this->yellowSix = $data['yellowSix'];
            $this->yellowSeven = $data['yellowSeven'];
            $this->yellowEight = $data['yellowEight'];
            $this->yellowNine = $data['yellowNine'];
            $this->yellowPlusTwo = $data['yellowPlusTwo'];
            $this->yellowChange = $data['yellowChange'];
            $this->yellowBan = $data['yellowBan'];
            
            $this->greenOne = $data['greenOne'];
            $this->greenTwo = $data['greenTwo'];
            $this->greenThree = $data['greenThree'];
            $this->greenFour = $data['greenFour'];
            $this->greenFive = $data['greenFive'];
            $this->greenSix = $data['greenSix'];
            $this->greenSeven = $data['greenSeven'];
            $this->greenEight = $data['greenEight'];
            $this->greenNine = $data['greenNine']; 
            $this->greenPlusTwo = $data['greenPlusTwo'];
            $this->greenChange = $data['greenChange'];
            $this->greenBan = $data['greenBan'];

            $this->plusFour = $data['plusFour'];

        }

        public function count_card(){
            $result = $this->redOne + $this->redTwo + $this->redThree + $this->redFour + $this->redFive
                + $this->redSix + $this->redSeven + $this->redEight + $this->redNine + $this->redBan
                + $this->redPlusTwo + $this->redChange + $this->blueOne + $this->blueTwo + $this->blueThree + $this->blueFour + $this->blueFive
                + $this->blueSix + $this->blueSeven + $this->blueEight + $this->blueNine + $this->blueBan
                + $this->bluePlusTwo + $this->blueChange + $this->yellowOne + $this->yellowTwo + $this->yellowThree + $this->yellowFour + $this->yellowFive
                + $this->yellowSix + $this->yellowSeven + $this->yellowEight + $this->yellowNine + $this->yellowBan
                + $this->yellowPlusTwo + $this->yellowChange + $this->greenOne + $this->greenTwo + $this->greenThree + $this->greenFour + $this->greenFive
                + $this->greenSix + $this->greenSeven + $this->greenEight + $this->greenNine + $this->greenBan
                + $this->greenPlusTwo + $this->greenChange;
            return $result;
        }

        public function initHand( array $randArray){
            
            for($i = 0; $i<7; $i++){
                do{
                    $card = rand(0, 269);
                }while($randArray[$card]);
                if($card>259){
                    $this->plusFour ++;
                }else{
                    $card = $card%5;
                    switch ($card)
                    {
                        case 0:
                            $this->redOne ++;
                            break;
                        case 1:
                            $this->redTwo ++;
                            break;
                        case 2:
                            $this->redThree ++;
                            break;
                        case 3:
                            $this->redFour ++;
                            break;
                        case 4:
                            $this->redFive ++;
                            break;
                        case 5:
                            $this->redSix ++;
                            break;
                        case 6:
                            $this->redSeven ++;
                            break;
                        case 7:
                            $this->redEight ++;
                            break;
                        case 8:
                            $this->redNine ++;
                            break;
                        case 9:
                            $this->redChange ++;
                            break;
                        case 10:
                            $this->redPlusTwo ++;
                            break;
                        case 11:
                            $this->redBan ++;
                            break;
                        case 12:
                            $this->blueOne ++;
                            break;
                        case 13:
                            $this->blueTwo ++;
                            break;
                        case 14:
                            $this->blueThree ++;
                            break;
                        case 15:
                            $this->blueFour ++;
                            break;
                        case 16:
                            $this->blueFive ++;
                            break;
                        case 17:
                            $this->blueSix ++;
                            break;
                        case 18:
                            $this->blueSeven ++;
                            break;
                        case 19:
                            $this->blueEight ++;
                            break;
                        case 20:
                            $this->blueNine ++;
                            break;
                        case 21:
                            $this->blueChange ++;
                            break;
                        case 22:
                            $this->bluePlusTwo ++;
                            break;
                        case 23:
                            $this->blueBan ++;
                            break;
                        case 24:
                            $this->yellowOne ++;
                            break;
                        case 25:
                            $this->yellowTwo ++;
                            break;
                        case 26:
                            $this->yellowThree ++;
                            break;
                        case 27:
                            $this->yellowFour ++;
                            break;
                        case 28:
                            $this->yellowFive ++;
                            break;
                        case 29:
                            $this->yellowSix ++;
                            break;
                        case 30:
                            $this->yellowSeven ++;
                            break;
                        case 31:
                            $this->yellowEight ++;
                            break;
                        case 32:
                            $this->yellowNine ++;
                            break;
                        case 33:
                            $this->yellowChange ++;
                            break;
                        case 34:
                            $this->yellowPlusTwo ++;
                            break;
                        case 35:
                            $this->yellowBan ++;
                            break;                           
                        case 36:
                            $this->greenOne ++;
                            break;
                        case 37:
                            $this->greenTwo ++;
                            break;
                        case 38:
                            $this->greenThree ++;
                            break;
                        case 39:
                            $this->greenFour ++;
                            break;
                        case 40:
                            $this->greenFive ++;
                            break;
                        case 41:
                            $this->greenSix ++;
                            break;
                        case 42:
                            $this->greenSeven ++;
                            break;
                        case 43:
                            $this->greenEight ++;
                            break;
                        case 44:
                            $this->greenNine ++;
                            break;
                        case 45:
                            $this->greenChange ++;
                            break;
                        case 46:
                            $this->greenPlusTwo ++;
                            break;
                        case 47:
                            $this->greenBan ++;
                            break;
                    }
                        
                }

            }
        }

    }
?>