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
$header_id=$_POST['header_id'];
if($header_id){
    $sql="SELECT
    imdl.map_segment_name,
    imdl.maping_segment_title,
    imdl.required_flag
    FROM
    haa_integration_mapping_def_headers imdh,
    haa_integration_mapping_def_lines imdl
    WHERE
    1 = 1
    AND imdh.deleted = 0
    AND imdl.deleted = 0
    AND imdl.haa_integration_mapping_def_headers_id_c = imdh.id
    AND imdh.id = '".$header_id."'"."order by imdl.line_number";
    $result=$db->query($sql);
    while ($row=$db->fetchByAssoc($result)) {
        $line_data[] = $row;
    }
    echo json_encode($line_data);
}
?>
