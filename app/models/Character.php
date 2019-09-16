<?php 
class Character extends Database
{
    public function getAllItems()
    {
        $items = $this->getLines('SELECT * FROM characters');
        return $items;
    }
  
    public function getItemById($item_id) {
        $item = $this->getLines("SELECT * FROM characters WHERE id = $item_id");
        return $item;
    }

    public function searchCharacter($keyword) {
        $item = $this->getLines("SELECT * FROM characters WHERE 
        glyph LIKE '%$keyword%' or pronounce LIKE '%$keyword%'");
        return $item;
    }

    public function getItemByName($glyph) {
        $item = $this->getLines("SELECT * FROM characters WHERE glyph = '$glyph'");
        return $item;
    }

    public function getCharPronounce($glyph) {
        $item = $this->getLines("SELECT * FROM pronounces WHERE glyph = '$glyph'");
        if (!isset($item[0]['hanviet'])) {
            $item[0]['hanviet'] = "unknown";
        }
        if (!isset($item[0]['radical'])) {
            $item[0]['radical'] = "-";
        }
        return $item;
    }

    public function addItem($glyph,$radical,$pronounce,$classify,$phonetic,$semantic,$layout="",$optional)
    {
        if(isset($optional['part4'])) {
            $part1 = $optional['part1'];
            $part2 = $optional['part2'];
            $part3 = $optional['part3'];
            $part4 = $optional['part4'];
        } else if (isset($optional['part3'])) {
            $part1 = $optional['part1'];
            $part2 = $optional['part2'];
            $part3 = $optional['part3']; 
        } else if (isset($optional['part2'])) {
            $part1 = $optional['part1'];
            $part2 = $optional['part2'];
        } else if (isset($optional['part1'])) {
            $part1 = $optional['part1'];      
        }

        $query = parent::$connection->prepare('INSERT INTO characters(
            glyph,radical,pronounce,classify,phonetic,semantic,
            layout,part1,part2,part3,part4)
        VALUE (?,?,?,?,?,?,?,?,?,?,?)');
        $query->bind_param('sssssssssss', $glyph,$radical,$pronounce,$classify,$phonetic,$semantic,
        $layout,$part1,$part2,$part3,$part4);
        return $query->execute();
    }
}
 ?>