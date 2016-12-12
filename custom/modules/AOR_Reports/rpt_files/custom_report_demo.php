<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/**
 * Products, Quotations & Invoices modules.
 * Extensions to SugarCRM
 * @package Advanced OpenSales for SugarCRM
 * @subpackage Products
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
 * @author Salesagility Ltd <info@salesagility.com>
 */
//创建收支项公用函数
function custom_report_main($paraArray=array()){
  /*global $beanList;
  ini_set('zlib.output_compression', 'Off');

  ob_start();
  require_once('include/export_utils.php');

  $delimiter = getDelimiter();
  $csv = '';
        //text/comma-separated-values

  $sql = "SELECT id FROM aor_fields WHERE aor_report_id = '".$this->id."' AND deleted = 0 ORDER BY field_order ASC";
  $result = $this->db->query($sql);

  $fields = array();
  $i = 0;
  while ($row = $this->db->fetchByAssoc($result)) {

    $field = new AOR_Field();
    $field->retrieve($row['id']);

    $path = unserialize(base64_decode($field->module_path));
    $field_bean = new $beanList[$this->report_module]();
    $field_module = $this->report_module;
    $field_alias = $field_bean->table_name;

    if($path[0] != $this->report_module){
        foreach($path as $rel){
            if(empty($rel)){
                continue;
            }
            $field_module = getRelatedModule($field_module,$rel);
            $field_alias = $field_alias . ':'.$rel;
        }
    }
    $label = str_replace(' ','_',$field->label).$i;
    $fields[$label]['field'] = $field->field;
    $fields[$label]['display'] = $field->display;
    $fields[$label]['function'] = $field->field_function;
    $fields[$label]['module'] = $field_module;
    $fields[$label]['alias'] = $field_alias;
    $fields[$label]['params'] = $field->format;

    if($field->display){
        $csv.= $this->encloseForCSV($field->label);
        $csv .= $delimiter;
    }
    ++$i;
}

$sql = $this->build_report_query();
$result = $this->db->query($sql);

while ($row = $this->db->fetchByAssoc($result)) {
    $csv .= "\r\n";
    foreach($fields as $name => $att){
        $currency_id = isset($row[$att['alias'].'_currency_id']) ? $row[$att['alias'].'_currency_id'] : '';
        if($att['display']){
            if($att['function'] != '' ||  $att['params'] != '')
                $csv .= $this->encloseForCSV($row[$name]);
            else
                $csv .= $this->encloseForCSV(trim(strip_tags(getModuleField($att['module'], $att['field'], $att['field'], 'DetailView',$row[$name],'',$currency_id))));
            $csv .= $delimiter;
        }
    }
}

$csv= $GLOBALS['locale']->translateCharset($csv, 'UTF-8', $GLOBALS['locale']->getExportCharset());

ob_clean();
header("Pragma: cache");
header("Content-type: text/comma-separated-values; charset=".$GLOBALS['locale']->getExportCharset());
header("Content-Disposition: attachment; filename=\"{$this->name}.csv\"");
header("Content-transfer-encoding: binary");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header("Last-Modified: " . TimeDate::httpTime() );
header("Cache-Control: post-check=0, pre-check=0", false );
header("Content-Length: ".mb_strlen($csv, '8bit'));
if (!empty($sugar_config['export_excel_compatible'])) {
    $csv = chr(255) . chr(254) . mb_convert_encoding($csv, 'UTF-16LE', 'UTF-8');
}
print $csv;

sugar_cleanup(true);*/
echo "1111";
}