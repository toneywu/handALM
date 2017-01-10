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
 */

global $db;
//$batchId=$_REQUEST['record'];
$sql="SELECT
	a.id,a.name,a.interface_code
FROM
	haa_interfaces a,
	haa_codes hc
WHERE
	1 = 1
AND a.haa_frameworks_id_c = '".$_SESSION["current_framework"]."'
AND hc.id = a.haa_codes_id_c
AND hc.code_tag = 'HAP'
AND based_flag = 1";
	$html="";
	$result=$db->query($sql);
	while($row=$db->fetchByAssoc($result)){
		$interface_code=strtolower($row["interface_code"]);
		$html.='<div class="col-md-12"><div class="col-md-5">'.$row["name"].'</div><div class="col-md-7"><input type="checkbox" name="'.$interface_code.'" id="'.$interface_code.'" value="'.$row["id"].'"/></div></div>';
	}
	echo $html;
?>
