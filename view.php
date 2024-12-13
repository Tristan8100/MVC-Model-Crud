<?php

    class productview {

        public function viewall2($values){
            foreach($values as $value) {
                echo '<tr>
                    <th scope="row">'.$value['item_ID'].'</th>
                    <td>'.$value['item_name'].'</td>
                    <td>'.$value['item_price'].'</td>
                    <td>'.$value['item_time'].'</td>
                    <td><a href="mainindex.php?val='.$value['item_ID'].'">editsss</a></td>
                    <td><a href="mainindex.php?del='.$value['item_ID'].'">delete</a></td>
                    </tr>
                    <tr>';
            }
        }

        public function edit($values){
            return $values;
        }
    }

?>