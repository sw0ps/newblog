<?php

namespace Application\Models;

use Application\Core\Model;

class Main extends Model {

    public function getUsers() {
      $result = $this->db->row("Select * from users");
      return $result;
//      debug($result);
    }

}