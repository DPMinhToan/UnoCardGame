<?php

    class UnoRoomInfo{
        public $roomID;
        public $isASC;
        public $isPlaying;
        public $validColor;
        public $validValue;
        public $plusAmount;

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
            $this->isASC = $data['isASC'];
            $this->isPlaying = $data['isPlaying'];
            $this->validColor = $data['validColor'];
            $this->validValue = $data['validValue'];
            $this->plusAmount = $data['plusAmount'];

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

    }
?>