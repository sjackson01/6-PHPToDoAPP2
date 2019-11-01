<?php
/* !Foreach Loops! */ 

include ('list.php');

//Create status flag
$status = false; //Make changes to what the script display based on true/false/all 

//Create filter array 
$filter = array();

/* Foreach Loop key and value */

foreach ($list as $key => $item){
    //As long as one is true satisfy condtion
    //All: Satisfies first condition pulling all keys
    //True: Only pulls 'complete' values = to true
    //False: Ony pulls 'complete' values = to false
    if($status === 'all' || $item['complete'] == $status) { 
        $filter[] = $key; 
    }   
}
/* !All!
Title	Priority	Due Date	Complete
Laundry		2		06/09/2016		No	
Dishes		2				No	
Dust		3				No	
Vacuum		1		06/09/2016		No	
Make Dinner		1				No	
Clean Out Fridge		2		07/30/2016		Yes	
*/

/* True 
Title	Priority	Due Date	Complete
Clean Out Fridge		2		07/30/2016		Yes	
*/

/* !False! 
Title	Priority	Due Date	Complete
Laundry		2		06/09/2016		No	
Dishes		2				No	
Dust		3				No	
Vacuum		1		06/09/2016		No	
Make Dinner		1				No
*/

//Used to show example of string 'all' === 'true'
//An empty string == 'false'
 echo '<pre>';
var_dump($status, boolval('all'), $status === 'all');
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
foreach($filter as $id){//Change array to $filter and $item to $id because it identifies list item
    echo '<tr>';//Each iteration add table row
    //echo /*Each iteration add table cell */ '<td>' . $item['title'] . "</td> \n";//Echo value of 'title' on each iteration
    echo '<td>' . $list[$id]['title'] . "<td> \n";//Reference list directly through its indexed $id
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