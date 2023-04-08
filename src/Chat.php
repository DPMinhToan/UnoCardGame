<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use HandInfoController;
use UserController;
use InfoController;

class Chat implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;
        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
            , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');
        $data = json_decode($msg, true);
        
        $handInfoController = new HandInfoController;
        $roomInfoController = new InfoController;
        $userController = new UserController;

        switch($data['type'])
        {
            case 'on-join-room':
                $roomInfo = $roomInfoController->get_room_info($data['idRoom']);
                $arrayHandInfo = $handInfoController->get_all_hand_info($data['idRoom']);

                $arrayNamePlayer = array();
                $arrayCardNum = array();
                $arrayOrderNum = array();
                $yourOrder = 1;

                foreach($arrayHandInfo as $player){
                    $user = $userController->get_user_by_id($player->memberID);
                    array_push($arrayNamePlayer,$user->name);
                    array_push($arrayCardNum, $player->count_card());
                    array_push($arrayOrderNum, $player->orderNum);
                }

                for($i = 1; $i<5; $i++){
                    if(!in_array($i,$arrayOrderNum)){
                        $yourOrder=$i;
                        break;
                    }
                }

                $sendMsg = array(
                    'type'=> "on-join-room",
                    'isPLaying' => $roomInfo->isPlaying,
                    'isASC' => $roomInfo->isASC,
                    'member' => $arrayNamePlayer,
                    'player-order' => $arrayOrderNum,
                    'card-number' => $arrayCardNum,
                    'your-order' => $yourOrder,
                );
                $from->send(json_encode($sendMsg));
                break;

            case 'start-game':
                $roomInfoController->change_isPlaying( $data['idRoom'],true);
                $hands = $handInfoController->get_all_hand_info($data['idRoom']);
                
                $randArray = array();
                for( $i=0; $i<202; $i++){
                    array_push($randArray, false);
                }

                foreach($hands as $hand){
                    $hand->initHand($randArray);
                    $handInfoController->update_hand_info($hand); 
                }  
                break;

            case 'draw-card':

                break;
            case 'play-card':
               
                break;
        }

        // foreach ($this->clients as $client) {
        //     if ($from !== $client) {
        //         // The sender is not the receiver, send to each client connected
        //         //$client->send($msg);
        //     }
        // }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
?>