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
$interface_code=$_POST['interface_code'];
$haa_frameworks_id=$_POST['haa_frameworks_id'];
if($interface_code && $haa_frameworks_id){
    $sql="SELECT
            isdl.column_name,
            isdl.column_title,
            isdl.required_flag
            FROM
            haa_interfaces inter,
            haa_integration_system_def_headers isdh,
            haa_integrbaeddef_lines_c ihlc,
            haa_integration_system_def_lines isdl
            where 1=1
            and inter.deleted=0
            and isdh.deleted=0
            and ihlc.deleted=0
            and isdl.deleted=0
            and isdh.haa_interfaces_id_c=inter.id
            and ihlc.haa_integrc471headers_ida=isdh.id
            and ihlc.haa_integrd80ef_lines_idb=isdl.id
            and isdl.enabled_flag=1
            AND inter.interface_code='".$interface_code."'".
            "and inter.haa_frameworks_id_c='".$haa_frameworks_id."'".
            " order by isdl.line_number";
    $result=$db->query($sql);
    while ($row=$db->fetchByAssoc($result)) {
        $line_data[] = $row;
    }
    echo json_encode($line_data);
}

?>
