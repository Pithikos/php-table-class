<?php
/* Author: Johan Hanssen Seferidis
 *
 * Description:
 *    A simple dynamic table class. You don't have to specify the table's size.
 *    The table grows automatically when it's needed.
 *
 * Created: 2013-03-25
 * Updated: 2013-03-25
 *
 * */
class Table
{
   
   private $data;        // the table's header
   private $header;      // the actual table's data

   private $biggestRow;  // number of cells of the longest row


	public function __construct() {
      $this->data=array();
      $this->header=array();
      $this->biggestRow=0;
	}
   
   
   /* Add/change header of table
    * 
    * Takes: Variable number of strings
    *
    * */
   public function makeHeader(){

      $this->header=func_get_args();
      
      // Check if biggestRow should be updated
      $rowLength=func_num_args();
      if ($rowLength>$this->biggestRow)
         $this->biggestRow=$rowLength;

   }
   
   
   /* Add a record to the table
    * 
    * Takes: Variable number of strings
    * 
    * Returns: TRUE  on success
    *          FALSE on failure
    * */
   public function addRecord(){
      $row=func_get_args();

      if(!array_push($this->data, $row))
         return FALSE;
      
      // Check if biggestRow should be updated
      $rowLength=count($row);
      if ($rowLength>$this->biggestRow)
         $this->biggestRow=$rowLength;
      
      return TRUE;
   }
   
   
   /* Print the table in raw format
    *
    * */
   public function showTable() {
      echo '<pre>';
      echo '<b>Number of cells in longest row:</b><br />';
      echo $this->biggestRow . '<br />';
      echo '<br /><b>Header:</b><br />';
      print_r($this->header);
      echo '<br /><b>Data:</b><br />';
      print_r($this->data);
      echo '</pre>';
   }
   

   /* Convert table to HTML code
    *
    * Gives: string with formatted table in HTML
    * 
    * */
   public function tableToHTML() {
      $cellsX=$this->biggestRow;
      $string="<table>\n";
      // th case
      if (!empty($this->header)) {
         $header=$this->header;
         $string.="\t<tr>\n";
         for ($i=0; $i<$cellsX; $i++){
            $string.="\t\t<th>";
            if (isset($header[$i]))
               $string.=$header[$i];
            $string.="</th>\n";
         }
         $string.="\t</tr>\n";
      }
      // td case
      foreach($this->data as $row){
         $string.="\t<tr>\n";
         for ($i=0; $i<$cellsX; $i++){
            $string.="\t\t<td>";
            if (isset($row[$i]))
               $string.=$row[$i];
            $string.="</td>\n";
         }
         $string.="\t</tr>\n";
      }
      
      $string.='</table>';
      return $string;
   }

}
?>
