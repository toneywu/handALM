<?php
/**
 * Advanced OpenSales, Advanced, robust set of sales modules.
 * @package Advanced OpenSales for SugarCRM
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SalesAgility <info@salesagility.com>
 */
global $db;
$contrtempid=$_POST['contr_temp_id'];

if($contrtempid){
    require_once('modules/AOS_Products_Quotes/AOS_Products_Quotes.php');
    require_once('modules/AOS_Line_Item_Groups/AOS_Line_Item_Groups.php');
        $sql = "SELECT pg.id, pg.group_id FROM aos_products_quotes pg LEFT JOIN aos_line_item_groups lig ON pg.group_id = lig.id WHERE 1=1 AND pg.parent_id = '" .$contrtempid ."' AND pg.deleted = 0 ORDER BY lig.number ASC, pg.number ASC";
        $result=$db->query($sql);
        $item="";
        $group="";
         while ($row = $db->fetchByAssoc($result)) {
                $line_item = new AOS_Products_Quotes();
                $line_item->retrieve($row['id']);
                $line_item = $line_item->toArray();

                $group_item = 'null';
                if ($row['group_id'] != null) {
                    $group_item = new AOS_Line_Item_Groups();
                    $group_item->retrieve($row['group_id']);
                    $group_item = $group_item->toArray();
                }
                /*$html .= "<script>
                        insertLineItems(" . $line_item . "," . $group_item . ");
                    </script>";*/
                $item[]=$line_item;
                $group[]=$group_item;
            }
        $return_data=array('line_item'=>$item,'group_item'=>$group);
       echo json_encode($return_data); 
    }
?>
