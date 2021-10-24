<?php

class Event extends Model
{
    public function findByMatchId($matchId)
    {
        $sql = "SELECT  id, side, type_of_event as e_type_of_event, player as e_player, time as e_time
              FROM team_events
              WHERE fifa_id = {$matchId}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($matches)
    {
        $sql = "INSERT INTO team_events (`id`,`fifa_id`,`side_status`,`side`,`type_of_event`,`player`,`time`) VALUES ";
        $values = [];
        foreach ($matches as $match) {
            foreach (['home_team_events' => 0, 'away_team_events' => 1] as $side => $sideStatus) {
                foreach ($match[$side] as $event){
                    $values[] = "({$event['id']}, {$match['fifa_id']}," . intval($side === 'home_team_events') .  ",'" . ($side === 'home_team_events' ? 'HOME' : 'AWAY') . "', '" . $event['type_of_event'] . "', '" . $event['player'] . "', " . $this->db->quote($event['time']) . ")";
                }
            }
        }
        $sql .= implode(',', $values) . " ON DUPLICATE KEY UPDATE type_of_event = VALUES(type_of_event), player = VALUES(player), time = VALUES(time)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
}