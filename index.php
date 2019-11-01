<?php
/* !Foreach Loops! */ 

include ('list.php');

//Create status flag
$status = 'all'; //Make changes to what the script display based on true/false/all 

//Create variable so we can sort by value
$field = 'title';

//Create filter array 
$filter = array();

/* Foreach Loop key and value */

foreach ($list as $originalKey => $item){
    if($status === 'all' || $item['complete'] == $status) { 
        //If value($field) is set and exists
        if (isset($field) && isset($item[$field])){
        //Place value in filter array    
            $filter[$originalKey] = $item[$field];
        }else{
        //If not set and doesn't esist place value priority in filter array
        //Add 12 after priority to push empty due dates back   
        $filter[$originalKey] = $item['priority']+12; 
        }
    }   
}
//Sort filter by value keeping key association
asort($filter);
/* Items are displayed in order of priority
array(6) {
  [3]=>
  int(1)
  [4]=>
  int(1)
  [0]=>
  int(2)
  [1]=>
  int(2)
  [5]=>
  int(2)
  [2]=>
  int(3)
}
*/
//Used to show example of string 'all' === 'true'
//An empty string == 'false'
 echo '<pre>';
var_dump($filter);
echo '</pre>';



/* Create Table */
//Recieve filter keys and echo defined values
echo '<table>';
echo '<tr>';//Table row
echo '<th>Title</th>';//Table header
echo '<th>Priority</th>';
echo '<th>Due Date</th>';
echo '<th>Complete</th>';
echo '</th>';
foreach($filter as $id => $value){//Pull key value pair
    echo '<tr>'; //Grab value by key($id) and ignore value($value) 
    echo '<td>' . $list[$id]['title'] . "<td> \n";
    echo '<td>' . $list[$id]['priority'] . "<td> \n";
    echo '<td>' . $list[$id]['due'] . "<td> \n";
    echo '<td>'; 
    if ($list[$id]['complete']){ //Add condtional true/false complete/incomplete 
           echo 'Yes';//Print yes if true
    } else {
        echo 'No';//Print no if false      
    }
    echo "<td> \n";
    echo '</tr>';
}
echo '</table>';

?>